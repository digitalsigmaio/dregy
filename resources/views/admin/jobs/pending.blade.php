@extends('admin.app')

@section('content')
    <pending-jobs :joblist="{{ json_encode($jobs) }}"></pending-jobs>
@endsection