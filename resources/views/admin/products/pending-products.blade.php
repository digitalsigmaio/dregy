@extends('admin.app')

@section('content')
    <pending-products :productlist="{{ json_encode($products) }}"></pending-products>
@endsection