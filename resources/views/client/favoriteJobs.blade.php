@extends('client.home')

@section('title')
    Favorite Jobs
@endsection

@section('userContent')
    <favorite-jobs
    :user_object = "{{ json_encode($user) }}"
    :jobs = "{{ $jobs }}">
    </favorite-jobs>
@endsection