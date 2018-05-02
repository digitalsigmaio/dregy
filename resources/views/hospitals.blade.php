@extends('layouts.main')

@section('content')

   <hospitals-list :filters="{{ $filtersJson }}"></hospitals-list>

@endsection