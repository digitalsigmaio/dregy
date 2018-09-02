@extends('admin.app')

@section('content')
    <on-hold-products :productlist="{{ json_encode($products) }}"></on-hold-products>
@endsection