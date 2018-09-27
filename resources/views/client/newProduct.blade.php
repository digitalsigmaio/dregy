@extends('layouts.client')

@section('content')

<clientproduct-new  :errors="{{ json_encode($errors) }}"
                    :session="{{ json_encode(session())}}"
                    :product_regions="{{json_encode($regions)}}"
                    :product_categories="{{json_encode($categories)}}"
></clientproduct-new>

@endsection
