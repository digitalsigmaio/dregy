<template>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product List <small>review</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <p>Pending products for review</p>

                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Title</th>
                            <th class="column-title" style="display: table-cell;">User</th>
                            <th class="column-title" style="display: table-cell;">Created</th>
                            <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="even pointer" :class="'product-' + product.id" v-for="product in products">
                            <td class="">{{ product.title }}</td>
                            <td class="">{{ product.user_email }}</td>
                            <td class="">{{ product.created_at }}</td>
                            <td class=""><a :href="'/admin/pending-products/' + product.id" class="btn btn-info" :class="'product-' + product.id + '-btn'">{{ status(product.id) }}</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['productlist'],
        data() {
            return {
                products: this.productlist,
                reviewing: []
            }
        },
        computed: {
        },
        methods: {
            underReview(id) {
                this.reviewing.push(id);
                let productDiv = '.product-' + id;
                let div = $(productDiv);
                div.addClass('warning');
                let button = $(productDiv + '-btn');
                button.addClass('btn-warning disabled');
            },
            logIndex(id) {
                let index = this.products.filter(function(product) {
                    return product.id === id;
                });
                let product = this.products.indexOf(index[0]);
                this.products.splice(product, 1)
            },
            status(id) {
                if(this.reviewing.includes(id)) {
                    return 'Under review'
                } else {
                    return 'Review'
                }
            }
        },
        mounted() {
            Echo.private(`review-product`)
                .listen('ReviewProduct', (e) => {
                    console.log(e.product_id);
                    this.underReview(e.product_id);
                });
        }
    }
</script>