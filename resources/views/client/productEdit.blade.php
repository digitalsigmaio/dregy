@extends('layouts.client')
@section('content')
<clientproduct-edit     :product_categories="{{ json_encode($categories) }}"
                        :product_regions="{{ json_encode($regions) }}"
                        :productad="{{ json_encode($productAd) }}"
></clientproduct-edit>
@endsection
