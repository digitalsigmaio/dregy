@extends('client.home')

@section('title')
    Favorite Products
@endsection

@section('userContent')
   <favorite-products
    :user_object = "{{ json_encode($user)}}"
    :products = "{{ $products }}">
   </favorite-products>
@endsection