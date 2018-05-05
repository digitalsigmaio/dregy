@extends('layouts.main')

@section('content')

    <!-- Main Container -->
    <div class="container mt-5 pt-3">

        <!--Section: Product detail -->
        <section id="productDetails" class="pb-5">

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5 pb-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <img src="{{ $productAd->img }}" class="img-fluid"/>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                            <strong>{{ $productAd->title }}</strong>
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="badge mb-2 p-2 {{
                            $productAd->status == '1' ? 'badge-success' : 'badge-warning'
                        }}">{{ $productAd->status == '1' ? 'New' : 'Used' }}</span>
                            </div>
                        </div>
                        @if($productAd->price)
                            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                            <span class="red-text font-weight-bold">
                                <strong>{{ $productAd->price }} L.E</strong>
                            </span>
                            </h3>
                        @else
                            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                            <span class="red-text font-weight-bold">
                                <strong>Negotiable</strong>
                            </span>
                            </h3>
                        @endif
                        <!--Accordion wrapper-->
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0">
                                            Description
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="description" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>{{ $productAd->description }}.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#address" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="mb-0">
                                            Address
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="address" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>{{ $productAd->region->en_name }}, {{ $productAd->city->en_name }}, {{ $productAd->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#phone" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            Phone
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="phone" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        @foreach($productAd->phoneNumbers as $phone)
                                            <p><i class="fa fa-phone pr-2 blue-text"></i>{{ $phone->number }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Accordion wrapper-->
                    </div>
                </div>
                <div class="card-footer p-2 pr-5">
                    <div class="row">
                            <div class="col-md-6 pl-5">
                                {{ $productAd->created_at->diffForHumans() }}
                            </div>
                            <div class="col-md-6 text-right">
                                <span class="light-green-text"><a href="#"><i class="fa fa-heart grey-text pr-2"></i></a>{{ $productAd->favorites->count() }}</span>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Product detail -->

        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold blue-text mx-3">Related Products</h3>
        </div>

        <!--Section: Products v.5-->
        <section id="products" class="pb-5">


            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            @if(count($relatedProductsChunks) > 1)
                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
                <!--Controls-->
            @endif

            @if(count($relatedProductsChunks) > 1)
                <!--Indicators-->
                <ol class="carousel-indicators">
                    @for($i = 0; $i < count($relatedProductsChunks); $i++)
                        <li class="primary-color {{ $i == 0 ? 'active': '' }}" data-target="#multi-item-example" data-slide-to="{{$i}}" ></li>
                    @endfor
                </ol>
                <!--Indicators-->
            @endif
                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    @for($i = 0; $i < count($relatedProductsChunks); $i++)
                        <div class="carousel-item {{ $i == 0 ? 'active': '' }}">
                        @foreach($relatedProductsChunks[$i] as $product)
                            <!--Grid column-->
                            <div class="col-md-4 mb-4">
                                <!--Card-->
                                <div class="card card-cascade narrower card-ecommerce">
                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="{{ $product->img }}" class="card-img-top" alt="sample photo">
                                        <a href="/products/{{ $product->id }}/{{ $product->slug }}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->
                                    <!--Card content-->
                                    <div class="card-body text-center">
                                        <!--Category & Title-->
                                        <a class="grey-text">
                                            <h5>{{ $product->category->en_name }}</h5>
                                        </a>
                                        <h4 class="card-title">
                                            <strong>
                                                <a href="/products/{{ $product->id }}/{{ $product->slug }}">{{ $product->title }}</a>
                                            </strong>
                                        </h4>

                                        <span class="badge mb-2 p-2 {{
                                            $product->status == '1' ? 'badge-success' : 'badge-warning'
                                        }}">{{ $product->status == '1' ? 'New' : 'Used'}}</span>

                                        <!--Description-->
                                        <p class="card-text">
                                            {{ $product->description }}
                                        </p>
                                        <!--Card footer-->
                                        <div class="card-footer">
                                                <span class="float-left font-weight-bold">
                                                  <strong>{{ $product->price }} L.E</strong>
                                                </span>
                                            <span class="float-right">
                                                  <a data-toggle="tooltip" data-placement="top" title="Added to Favorite" class="light-green-text">
                                                    <i class="fa fa-heart ml-3 pr-1 grey-text"></i> {{ $product->favorites->count() }}
                                                  </a>
                                                </span>
                                        </div>
                                    </div>
                                    <!--Card content-->
                                </div>
                                <!--Card-->

                            </div>
                            <!--Grid column-->
                        @endforeach
                        </div>
                    @endfor

                </div>
                <!--Slides-->

            </div>
            <!--Carousel Wrapper-->

        </section>
        <!--Section: Products v.5-->

    </div>
    <!-- /.Main Container -->


@endsection