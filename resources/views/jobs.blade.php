@extends('layouts.main')

@section('content')

   <job-ads-list :filters="{{ $filtersJson }}"></job-ads-list>

@endsection