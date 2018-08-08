@extends('client.home')

@section('userContent')
<job-list
:jobs = {{ $jobs->toJson() }}>
</job-list>
@endsection