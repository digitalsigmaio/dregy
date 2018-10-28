@extends('client.home')

@section('userContent')
<clientproduct-list :products="{{json_encode($products)}}"></clientproduct-list>
@endsection
