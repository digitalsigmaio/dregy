@extends('layouts.client')

@section('content')
<new-job
:regions =  "{{ $regions }}",
:categories =  "{{ $categories }}",
:experienceLevels =  "{{ $experienceLevels }}",
:educationLevels =  "{{ $educationLevels }}",
:employmentTypes =  "{{ $employmentTypes }}",
:errors = "{{ $errors }}">
</new-job>
@endsection