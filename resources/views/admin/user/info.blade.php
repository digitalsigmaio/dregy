@extends('admin.app')

@section('content')
<user-info :admin="{{ Auth::guard('admin')->user() }}"></user-info>
@endsection
