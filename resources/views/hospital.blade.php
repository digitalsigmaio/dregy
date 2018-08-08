@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<hospital-component 
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteHospitals', 'rateForHospitals']) : 'null' }}"
    :hospitals = "{{ $relatedHospitalsChunks }}" 
    :hospital = "{{ $hospital }}" 
    :auth_user = "{{ json_encode(Auth::check())}}" 
    :lang = "{{session()->get('local')}}" >
</hospital-component>

@endsection
