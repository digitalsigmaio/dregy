@extends('layouts.main')

@section('content')

   <product-ads-list :filters="{{ $filtersJson }}"></product-ads-list>

@endsection