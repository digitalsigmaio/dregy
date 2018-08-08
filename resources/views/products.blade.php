@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

    <products-component
        :user = "{{ Auth::check() ? Auth::user()->load(['favoriteProductAds']) : 'null' }}"
        :filters = "{{ $filters->toJson() }}"
        :auth_user = "{{ json_encode(Auth::check()) }}">
    </products-component>
@endsection