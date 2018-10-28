@extends('client.home')

@section('userContent')
<clientjob-list
:jobs = "{{ json_encode($jobs) }}">
</clientjob-list>
@endsection