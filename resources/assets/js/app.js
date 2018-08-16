/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery.barrating.min');
window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
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

//Admin Components
Vue.component('user-info', require('./components/UserInfo.vue'));
Vue.component('create-user', require('./components/CreateUser.vue'));
Vue.component('list-accounts', require('./components/ListAccounts.vue'));
Vue.component('phone-numbers', require('./components/PhoneNumbers.vue'));
Vue.component('phone-input', require('./components/PhoneInput.vue'));


Vue.component('modal', require('./components/Modal.vue'));
Vue.component('region-city', require('./components/RegionCity.vue'));
Vue.component('premium-check', require('./components/PremiumCheck.vue'));



const app = new Vue({
    el: '#app',

});


