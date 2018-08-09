<template>
   <div class="container" v-cloak>
       <div class="row pb-5">
           <h1 class="blue-grey-text">Favorite Products</h1>
       </div>
       <div class="row mt-4" v-if="products.length">

           <div class="col-lg-3 col-md-6 mb-4" v-for="product in products" :id="'favorite' + product.id">

               <!--Collection card-->
               <div class="card collection-card z-depth-1-half">
                   <!--Card image-->
                   <div class="view zoom">
                       <img :src="product.img" class="img-responsive" alt="">
                       <div class="stripe dark">
                           <a :href="'/products/' + product.id + '/' + product.slug" target="_blank">
                               <p>{{ product.title }}
                                   <i class="fa fa-angle-right"></i>
                               </p>
                           </a>
                       </div>
                   </div>
                   <!--Card image-->
               </div>
               <!--Collection card-->

               <a class="btn-floating btn-sm rgba-pink-strong dismiss-favorite" @click.prevent="removeFavorite(product.id)"><i class="fa fa-times"></i></a>

           </div>

       </div>
       <div class="row mt-4  rgba-grey-light z-depth-1 p-5" v-else>
           <div class="col-md-12 text-center  white-text p-5">
               <h1>Nothing in Favorites</h1>
           </div>
       </div>
   </div>
</template>

<script>
    export default{
       props:['user_object', 'products'],
        data() {
           return {
               user: this.user_object
           }
        },
        methods: {
           removeFavorite(id) {
               let div = $('#favorite' + id);
               div.addClass('animated zoomOut');
               let user = this.user;
               let favorites = this.user.favorite_product_ads;
               for(let i = 0; i < favorites.length; i++ ){
                   if(favorites[i].favourable_id === id) {

                       favorites.splice(i, 1);
                   }
               }

               axios.delete('/api/product-ads/' + id + '/users/' + user.id + '/fav')
                   .then(function (res) {
                        div.remove()
                   })
           }
        }
    };

</script>