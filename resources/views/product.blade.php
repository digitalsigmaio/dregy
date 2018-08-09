@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<product-component
    :user_object = "{{ Auth::check() ? Auth::user()->load(['favoriteProductAds']) : 'null' }}"
    :products = "{{ $relatedProductsChunks }}"
    :product_object = "{{ $productAd }}"
    :auth_user = "'{{ Auth::check() }}'">
</product-component>

@endsection