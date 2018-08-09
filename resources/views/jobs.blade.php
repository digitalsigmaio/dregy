@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')
    <jobs-component 
        :user_object = "{{Auth::check() ? Auth::user()->load(['favoriteJobAds']) : 'null'}}"
        :filters = "{{ $filters->toJson() }}"
        :auth_user = "{{ json_encode(Auth::check()) }}" >
    </jobs-component>
@endsection

