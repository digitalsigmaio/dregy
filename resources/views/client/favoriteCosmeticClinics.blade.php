@extends('client.home')

@section('title')
    Favorite Cosmetic Clinics
@endsection

@section('userContent')
   <favorite-cosmetic-clinics
    :user_object = "{{ json_encode($user)}}"
    :cosmetics = "{{ $cosmeticClinics }}">
   </favorite-cosmetic-clinics>
@endsection