@extends('client.home')

@section('title')
    Favorite Pharmacies
@endsection

@section('userContent')
    <favorite-pharmacies
    :user_object = "{{ json_encode($user) }}"
    :pharmacies = "{{ $pharmacies }}">
    </favorite-pharmacies>
@endsection