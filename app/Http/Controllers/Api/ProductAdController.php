<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductAdCollection;
use App\Http\Resources\ProductAdResource;
use App\PhoneNumber;
use App\ProductAd;
use App\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductAdController extends Controller
{
    public function index()
    {
        $productAds = ProductAd::with([
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
            'views',
            'premium'
        ])
            ->paginate(4);

        return new ProductAdCollection($productAds);
    }


    public function show(ProductAd $productAd)
    {
        $productAd->load([
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
            'views',
            'premium'
        ]);

        return new ProductAdResource($productAd);
    }

    public function fav(ProductAd $productAd, $id)
    {
        try {

            $productAd->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'ProductAd has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(ProductAd $productAd, $id)
    {
        try {

            $productAd->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'ProductAd has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(ProductAd $productAd, Request $request)
    {
        View::new($productAd, $request);
    }

    public function search(Request $request)
    {
        $productAds = ProductAd::fetch($request);

        if (count($productAds)) {
            return new ProductAdCollection($productAds);
        } else {
            return null;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'title' => 'required | min:3',
            'price' => 'required',
            'description' => 'required | min:20',
            'status' => 'required',
            'categoryId' => 'required',
            'regionId' => 'required',
            'cityId' => 'required',
            'address' => 'required',
            'phone' => 'required',

        ]);
        $product = new ProductAd;
        $product->user_id = $request->userId;
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

        if($request->has('img')) {
            $product->appUploadImage($request);
        }
        $product->save();
        if(count((array) $request->phone) > 2) {
            for($i=0;$i<count($request->phone);$i++) {
                if($i==2) {
                    break;
                }
                $phone = new PhoneNumber;
                $phone->number = $phone[$i];
                $product->phoneNumbers()->save($phone);
            }
        } else {
            foreach((array) $request->phone as $number) {
                $phone = new PhoneNumber();
                $phone->number = $number;
                $product->phoneNumbers()->save($phone);
            }
        }
        return response()->json($product, 201);

    }
}
