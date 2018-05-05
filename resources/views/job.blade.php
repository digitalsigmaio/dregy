@extends('layouts.main')

@section('content')

    <!-- Main Container -->
    <div class="container mt-5 pt-3">

        <!--Section: Job detail -->
        <section id="jobDetails" class="pb-5">

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5 pb-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <img src="{{ $jobAd->img }}" class="img-fluid"/>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                            <strong>{{ $jobAd->title }}</strong>
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="badge mb-2 p-2 {{
                            $jobAd->type->en_name == 'Employer' ? 'blue-gradient' : 'aqua-gradient'
                        }}">{{ $jobAd->type->en_name }}</span>
                            </div>
                        </div>
                        @if($jobAd->salary)
                            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                            <span class="red-text font-weight-bold">
                                <strong>{{ $jobAd->salary }} L.E</strong>
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
                                        <p>{{ $jobAd->description }}.</p>
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
                                        <p>{{ $jobAd->region->en_name }}, {{ $jobAd->city->en_name }}, {{ $jobAd->address }}</p>
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
                                        @foreach($jobAd->phoneNumbers as $phone)
                                            <p><i class="fa fa-phone pr-2 blue-text"></i>{{ $phone->number }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#requirements" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            More Info
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="requirements" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        @if($jobAd->experienceLevel)
                                            <p><i class="fa fa-arrow-right pr-2 blue-text"></i><strong>Experience Level: </strong>{{ $jobAd->experienceLevel->en_name }}</p>
                                        @endif

                                        @if($jobAd->educationLevel)
                                            <p><i class="fa fa-arrow-right pr-2 blue-text"></i><strong>Education Level: </strong>{{ $jobAd->educationLevel->en_name }}</p>
                                        @endif

                                            @if($jobAd->employmentType)
                                                <p><i class="fa fa-arrow-right pr-2 blue-text"></i><strong>Employment Type: </strong>{{ $jobAd->employmentType->en_name }}</p>
                                            @endif
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
                                {{ $jobAd->created_at->diffForHumans() }}
                            </div>
                            <div class="col-md-6 text-right">
                                <span class="light-green-text"><a href="#"><i class="fa fa-heart grey-text pr-2"></i></a>{{ $jobAd->favorites->count() }}</span>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Job detail -->

        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold blue-text mx-3">Related Jobs</h3>
        </div>

        <!--Section: Products v.5-->
        <section id="products" class="pb-5">


            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

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

                <!--Indicators-->
                <ol class="carousel-indicators">
                    @for($i = 0; $i < count($relatedJobsChunks); $i++)
                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="{{$i}}" class="{{ $i == 0 ? 'active': '' }}"></li>
                    @endfor
                </ol>
                <!--Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    @for($i = 0; $i < count($relatedJobsChunks); $i++)
                        <div class="carousel-item {{ $i == 0 ? 'active': '' }}">
                        @foreach($relatedJobsChunks[$i] as $job)
                                <div class="col-md-4 mb-4">
                                    <!--Card-->
                                    <div class="card card-ecommerce">

                                        <!--Card image-->
                                        <div class="view overlay">
                                            <img src="{{ $job->img }}" class="img-fluid" alt="">
                                            <a href="/jobs/{{ $job->id }}/{{ $job->slug }}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <!--Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Category & Title-->

                                            <h5 class="card-title mb-1"><strong><a href="/jobs/{{ $job->id }}/{{ $job->slug }}" class="dark-grey-text">{{ $job->title }}</a></strong></h5>
                                            <span class="badge mb-2 p-2 {{
                                                $job->type->en_name == 'Employer' ? 'blue-gradient' : 'aqua-gradient'
                                            }}">{{ $job->type->en_name }}</span>
                                            <!-- Rating -->
                                            <ul class="rating">

                                                @foreach($job->phoneNumbers as $phone)
                                                    <li class="text-grey d-block">
                                                        <i class="fa fa-phone blue-text"></i> <strong class="teal-text">{{ $phone->number }}</strong>
                                                    </li>
                                                @endforeach

                                            </ul>



                                            <!--Card footer-->
                                            <div class="card-footer pb-0">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <p><i class="fa fa-bullseye pink-text"></i><strong class="p-2">{{ $job->salary }} L.E</strong></p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="footer-address">
                                                            {{ $job->created_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--Card content-->

                                    </div>
                                    <!--Card-->
                                </div>
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