@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

  <clinics-component
    :filters = "{{ $filters->toJson() }}"
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteProductAds']) : 'null' }}"
    :auth_user = "{{ json_encode(Auth::check()) }}">
  </clinics-component>

@endsection