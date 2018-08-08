@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<pharmacy-component 
    :user = "{{ Auth::check() ? Auth::user()->load(['favoritePharmacies', 'rateForPharmacies']) : 'null' }}"
    :pharmacies = "{{ $relatedPharmaciesChunks }}"
    :pharmacy = "{{ $pharmacy }}"
    :auth_user = "{{ json_encode(Auth::check()) }}" >
</pharmacy-component>
@endsection