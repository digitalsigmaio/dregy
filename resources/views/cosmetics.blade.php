@extends('layouts.main')

@section('content')

   <cosmetics-list :filters="{{ $filtersJson }}"></cosmetics-list>

@endsection