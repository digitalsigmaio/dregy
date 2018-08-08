@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<product-component
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteProductAds']) : 'null' }}"
    :products = "{{ $relatedProductsChunks }}"
    :product = "{{ $productAd }}"
    :auth_user = "'{{ Auth::check() }}'">
</product-component>

@endsection