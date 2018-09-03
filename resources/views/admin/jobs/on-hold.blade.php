@extends('admin.app')

@section('content')
    <on-hold-jobs :joblist="{{ json_encode($jobs) }}"></on-hold-jobs>
@endsection