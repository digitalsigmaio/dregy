@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')
    <jobs-component 
        :user = "{{Auth::check() ? Auth::user()->load(['favoriteJobAds']) : 'null'}}"
        :filters = "{{$filters->toJson()}}" >
    </jobs-component>
@endsection