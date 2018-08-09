@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<job-component
    :user_object = "{{ Auth::check() ? Auth::user()->load(['favoriteJobAds']) : 'null' }}"
    :jobs = "{{ $relatedJobsChunks }}" 
    :job_object = "{{ $jobAd }}"
    :auth_user = "{{ json_encode(Auth::check()) }}">
</job-component>

@endsection

