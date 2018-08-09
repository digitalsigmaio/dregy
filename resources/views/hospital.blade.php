@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<hospital-component 
    :user_object = "{{ Auth::check() ? Auth::user()->load(['favoriteHospitals', 'rateForHospitals']) : 'null' }}"
    :hospitals = "{{ $relatedHospitalsChunks }}" 
    :hospital_object = "{{ $hospital }}"
    :auth_user = "{{ json_encode(Auth::check())}}" 
    :lang = "{{ json_encode(session()->get('locale')) }}" >
</hospital-component>

@endsection
