<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductAdResource;
use App\PhoneNumber;
use App\ProductAd;
use App\ProductAdCategory;
use App\Region;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ProductAdController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $categories = ProductAdCategory::all();
        $status = ['new', 'used'];
        $filters = collect([
            'regions' => $regions,
            'categories' => $categories,
            'status' => $status
        ]);

        return view('products', compact(['filters']));
    }

    public function show(ProductAd $productAd, $slug){
        $relatedProducts = $productAd->category->productAds()->inrandomOrder()->take(9)->get();

        $relatedProducts = $relatedProducts->reject(function ($item) use ($productAd) {
            return $item->id == $productAd->id;
        });

        $relatedProducts = ProductAdResource::collection($relatedProducts);
        $relatedProductsChunks = $relatedProducts->chunk(3);
        $relatedProductsChunks = json_encode($relatedProductsChunks);

        $productAd = new ProductAdResource($productAd);
        $productAd = json_encode($productAd);

        return view('product', compact(['productAd', 'relatedProductsChunks']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:3',
            'price' => 'required',
            'description' => 'required | min:20',
            'status' => 'required',
            'categoryId' => 'required',
            'regionId' => 'required',
            'cityId' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = new ProductAd;
        $product->user_id = Auth::user()->id;
        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->ref_id = 'pro-'. str_random(6) . '-' . time();
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->product_ad_category_id = $request->categoryId;
        $product->region_id = $request->regionId;
        $product->city_id = $request->cityId;
        $product->address = $request->address;
        $product->expires_at = now()->addDays(30);
        try {
            $product->uploadImage($request);
            $product->save();
            if(count($request->phone) > 2) {
                for($i=0;$i<count($request->phone);$i++) {
                    if($i==2) {
                        break;
                    }
                    $phone = new PhoneNumber;
                    $phone->number = $phone[$i];
                    $product->phoneNumbers()->save($phone);
                }
            } else {
                foreach($request->phone as $number) {
                    $phone = new PhoneNumber;
                    $phone->number = $number;
                    $product->phoneNumbers()->save($phone);
                }
            }
            session()->flash('success', 'Product has been added and waiting for review');
            return redirect()->back();
        } catch (QueryException $e) {
            return $e->getMessage();
        }



    }
}
