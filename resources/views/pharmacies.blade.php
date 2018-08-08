@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')
    <pharmacies-component 
        :user = "{{Auth::check() ? Auth::user()->load(['favoritePharmacies']) : 'null'  }}"
        :filters = "{{ $filters->toJson() }}"
        :auth_user = "{{ json_encode(Auth::check()) }}" >
    </pharmacies-component>
@endsection