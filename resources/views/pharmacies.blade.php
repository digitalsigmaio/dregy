@extends('layouts.main')

@section('content')

   <pharmacies-list :filters="{{ $filtersJson }}"></pharmacies-list>

@endsection