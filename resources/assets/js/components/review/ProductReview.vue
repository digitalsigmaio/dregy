<template>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product List <small>view</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <p>Pick a product for review</p>

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
                        <tr class="even pointer" v-for="product in products">
                            <td class=" ">{{ product.en_name }}</td>
                            <td class=" " :href="">{{ product.user.name }}</td>
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
        props: ['productList'],
        data() {
            return {

            }
        },
        computed: {
            products() {
                return this.productList;
            }
        }
    }
</script>