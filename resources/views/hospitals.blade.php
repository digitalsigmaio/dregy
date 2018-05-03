@extends('layouts.main')

@section('content')

   <hospitals-list :filters="{{ $filtersJson }}" :hospitals="{{ $hospitals }}"></hospitals-list>

@endsection