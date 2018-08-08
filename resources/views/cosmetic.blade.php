@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<cosmetic-component
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteCosmeticClinics', 'rateForCosmeticClinics']) : 'null' }}"
    :cosmetics = "{{$relatedCosmeticClinicsChunks}}"
    :cosmetic = "{{$cosmetic}}"
    :auth_user = "{{ json_encode(Auth::check()) }}" >
</cosmetic-component>

@endsection