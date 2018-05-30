@extends('client.home')

@section('userContent')
    <div id="productList">
        <h2 class="blue-grey-text">My Products</h2>
        <section class="mt-5">
            @if($products->count())
                <div class="col-md-8 card">

                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th width="50px">#</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Favorites</th>
                                <th width="100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $index => $product)
                                <tr>
                                    <th scope="row">{{ ++$index }}</th>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->views ? $product->views->count : '0' }}</td>
                                    <td>{{ $product->favorites ? $product->favorites->count : '0    '}}</td>
                                    <td>
                                        <a class="blue-text pr-2" data-toggle="tooltip" data-placement="top" title="View" @click.prevent="show({{$product->id}})"><i class="fa fa-user"></i></a>
                                        <a class="teal-text pr-2" data-toggle="tooltip" data-placement="top" title="Edit" href="/product-ads/{{ $product->id }}/edit"><i class="fa fa-pencil"></i></a>
                                        <a class="red-text pr-2 delete" data-toggle="tooltip" data-placement="top" title="Remove" href="/product-ads/{{$product->id}}/delete"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="row p-5 rgba-grey-light z-depth-1">
                    <div class="container p-5 text-center white-text">
                        <h1>You have no product listed yet</h1>
                    </div>
                </div>
            @endif

        <!-- Modal: modalQuickView -->
            <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="productDetails" aria-hidden="true" v-if="product">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!--Carousel Wrapper-->
                                    <img :src="product.img" class="img-fluid" alt="">
                                    <!--/.Carousel Wrapper-->
                                </div>
                                <div class="col-lg-7">

                                    <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                                        <strong>@{{ product.title }}</strong>
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                <span class="badge mb-2 p-2" :class="{ 'badge-success': product.status == 1, 'badge-warning': product.status == 2 }">
                                    @{{ product.status == '1' ? 'New' : 'Used' }}
                                </span>
                                        </div>
                                    </div>

                                    <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4" v-if="product.price">
                            <span class="red-text font-weight-bold">
                                <strong>@{{ product.price }} L.E</strong>
                            </span>
                                    </h3>

                                    <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4" v-else>
                            <span class="red-text font-weight-bold">
                                <strong>Negotiable</strong>
                            </span>
                                    </h3>

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
                                                    <p>@{{ product.description }}.</p>
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
                                                    <p>@{{ product.region.en_name }}, @{{ product.city.en_name }}, @{{ product.address }}</p>
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

                                                    <p v-for="phone in product.phone"><i class="fa fa-phone pr-2 blue-text"></i>@{{ phone }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.Accordion wrapper-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal: modalQuickView -->

        </section>
    </div>
@endsection

@push('scripts')
<script>
    const productList = new Vue({
        el: '#productList',
        data() {
            return {
                product: null,
                products: {!! $products->toJson() !!}
            }
        },
        methods: {
            show(id) {
                this.product = this.products.filter(function (product) { return product.id === id }).shift();
                $('#modalQuickView').modal('show');
            }
        },
        mounted() {
            this.product = this.products[0];
        }
    });
    $('.delete').on('click', function () {
        return confirm('Are you sure?');
    })
</script>
@endpush