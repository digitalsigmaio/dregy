
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/*
Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('top-clients', require('./components/TopClients.vue'));
Vue.component('main-jobs', require('./components/MainJobs.vue'));
Vue.component('last-products', require('./components/LastProducts.vue'));
Vue.component('job-ads-list', require('./components/JobAds.vue'));
Vue.component('product-ads-list', require('./components/ProductAds.vue'));
Vue.component('hospitals-list', require('./components/Hospitals.vue'));
Vue.component('clinics-list', require('./components/Clinics.vue'));
Vue.component('cosmetics-list', require('./components/CosmeticClinics.vue'));
Vue.component('pharmacies-list', require('./components/Pharmacies.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
*/

//Layout Components
Vue.component('clinics-component', require('./components/Clinics.vue'));
Vue.component('clinic-component', require('./components/Clinic.vue'));
Vue.component('hospitals-component', require('./components/Hospitals.vue'));
Vue.component('hospital-component', require('./components/Hospital.vue'));
Vue.component('cosmetics-component', require('./components/Cosmetics.vue'));
Vue.component('cosmetic-component', require('./components/Cosmetic.vue'));
Vue.component('jobs-component', require('./components/Jobs.vue'));
Vue.component('job-component', require('./components/Job.vue'));
Vue.component('pharmacies-component', require('./components/Pharmacies.vue'));
Vue.component('pharmacy-component', require('./components/Pharmacy.vue'));
Vue.component('products-component', require('./components/Products.vue'));
Vue.component('product-component', require('./components/Product.vue'));
Vue.component('lastproducts-component', require('./components/LastProducts.vue'));
Vue.component('mainjobs-component', require('./components/MainJobs.vue'));
Vue.component('topclients-component', require('./components/TopClients.vue'));


//Client Components
Vue.component('favorite-clinics', require('./components/FavoriteClinics.vue'));
Vue.component('favorite-cosmetic-clinics', require('./components/FavoriteCosmeticClinics.vue'));
Vue.component('favorite-hospitals', require('./components/FavoriteHospitals.vue'));
Vue.component('favorite-jobs', require('./components/FavoriteJobs.vue'));
Vue.component('favorite-pharmacies', require('./components/FavoritePharmacies.vue'));
Vue.component('favorite-products', require('./components/FavoriteProducts.vue'));


//Vue.component('job-edit', require('./components/JobEdit.vue'));
Vue.component('job-list', require('./components/JobList.vue'));
//Vue.component('new-job', require('./components/NewJob.vue'));

const app = new Vue({
    el: '#app'

});


