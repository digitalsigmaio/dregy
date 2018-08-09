@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<cosmetic-component
    :user_object = "{{ Auth::check() ? Auth::user()->load(['favoriteCosmeticClinics', 'rateForCosmeticClinics']) : 'null' }}"
    :cosmetics = "{{$relatedCosmeticClinicsChunks}}"
    :cosmetic_object = "{{$cosmetic}}"
    :auth_user = "{{ json_encode(Auth::check()) }}" >
</cosmetic-component>

@endsection