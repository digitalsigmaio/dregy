@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')
<clinic-component
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteClinics', 'rateForClinics']) : 'null' }}" 
    :clinics = "{{ $relatedClinicsChunks }}" 
    :clinic = "{{ $clinic}}" 
    :auth_user = "{{ json_encode(Auth::check()) }}">
</clinic-component>
@endsection