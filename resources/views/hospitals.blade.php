@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

    <hospitals-component
        :filters = "{{ $filters->toJson() }}"
        :user = "{{ Auth::check() ? Auth::user()->load(['favoriteHospitals']) : 'null' }}"
        :auth_user = "{{ json_encode(Auth::check()) }}">
    </hospitals-component>

@endsection