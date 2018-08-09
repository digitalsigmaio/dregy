@extends('client.home')

@section('title')
    Favorite Clinics
@endsection

@section('userContent')
    <favorite-clinics
    :user_object = "{{ json_encode($user) }}"
    :clinics = "{{ $clinics }}">
    </favorite-clinics>
@endsection