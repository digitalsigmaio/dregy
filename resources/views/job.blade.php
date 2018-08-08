@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

<job-component
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteJobAds']) : 'null' }}"
    :jobs = "{{ $relatedJobsChunks }}" 
    :job = "{{ $jobAd }}" 
    :auth_user = "{{ Auth::check() }}"

@endsection