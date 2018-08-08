@extends('client.home')

@section('title')
    Favorite Hospitals
@endsection

@section('userContent')
    <favorite-hospitals
    :user = "{{ json_encode($user) }}"
    :hospitals = "{{ $hospitals }}">
    </favorite-hospitals>
@endsection