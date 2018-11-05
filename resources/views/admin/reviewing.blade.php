@extends('admin.app')

@section('content')
    <review-ads :jobad="{{ json_encode($jobAd) }}"></review-ads>
@endsection