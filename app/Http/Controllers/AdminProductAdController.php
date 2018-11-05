<?php

namespace App\Http\Controllers;

use App\ProductAd;
use Illuminate\Http\Request;
use App\ProductAdCategory;
use App\Region;
use App\PhoneNumber;
use App\Http\Resources\ProductAdResource;
use Illuminate\Support\Facades\Auth;
use App\Events\ReviewProduct;

class AdminProductAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user_id = $id;
        $admin = Auth('admin')->user();
        $categories = ProductAdCategory::all();
        $regions = Region::with('cities')->get();

        return view('admin.ads.newProduct', compact(['admin','categories', 'regions','user_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required | min:3',
            'price' => 'required | numeric',
            'description' => 'required | min:20',
            'status' => 'required',
            'categoryId' => 'required',
            'region_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'phone.*' => 'required | numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = new ProductAd;
        $product->user_id = $request->user_id;
        $product->admin_id = $request->admin_id;
        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->ref_id = 'pro-'. str_random(6) . '-' . time();
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->product_ad_category_id = $request->categoryId;
        $product->region_id = $request->region_id;
        $product->city_id = $request->city_id;
        $product->address = $request->address;
        $product->expires_at = now()->addDays(30);
        $product->approved = true;
        try {
            $product->uploadImage($request->img);
            $product->save();
            $phonesarray = $request->phones;
            if (count($phonesarray)) {
                foreach ($phonesarray as $number) {
                    $phone = new PhoneNumber;
                    $phone->number = $number;
                    $product->phoneNumbers()->save($phone);
                }
            }
            //session()->flash('success', 'Product has been added and waiting for review');
            return response()->json(['success' => 'Job has been added and waiting for review'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAd  $productAd
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAd $productAd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAd  $productAd
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAd $productAd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAd  $productAd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAd $productAd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAd  $productAd
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAd $productAd)
    {
        //
    }

    public function pendingProducts()
    {
        $admin = Auth('admin')->user();
        $products = ProductAdResource::collection(ProductAd::pending()->get());
        return view('admin.products.pending', compact(['products', 'admin']));
    }

    public function pendingProductsOnHold()
    {
        $admin = Auth('admin')->user();
        $products = ProductAdResource::collection($admin->productsOnHold);
        return view('admin.products.on-hold', compact(['products', 'admin']));
    }

    public function productReview(ProductAd $productAd)
    {
        $adminId = Auth::guard('admin')->user()->id;
        broadcast(new ReviewProduct($productAd, $adminId));
    }
    
}
