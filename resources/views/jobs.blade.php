@extends('layouts.main')

@section('content')

   <job-ads-list :regions="{{ $regions }}"></job-ads-list>

@endsection