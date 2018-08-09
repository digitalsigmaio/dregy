@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<cosmetics-component
    :filters = "{{$filters->toJson()}}" 
    :user ="{{ Auth::check() ? Auth::user()->load(['favoriteCosmeticClinics']) : 'null' }}"
    :auth_user = "{{ json_encode(Auth::check()) }}">
</cosmetics-component>

@endsection