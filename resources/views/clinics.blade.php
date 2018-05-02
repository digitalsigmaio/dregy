@extends('layouts.main')

@section('content')

   <clinics-list :filters="{{ $filtersJson }}"></clinics-list>

@endsection