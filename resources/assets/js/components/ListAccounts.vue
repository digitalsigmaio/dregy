<template>
    <div class="container">
        <modal v-show="isModalVisible" @close="closeModal" :url="deleteUrl" :title="title"/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{account_name}}</h2>
                    </div>
                    <div class="card-body">
                        
                        <!-- Search -->
                        <div class="md-form form-lg ml-1">
                            <input type="text" id="keyword" class="form-control form-control-lg" placeholder="Search" v-model="search.keyword" @keyup="searchByKeyword">
                            <label for="keyword"></b></label>
                        </div>

                        <!-- Account Grid -->
                        <section class="fetching" >
                            <div class="row">
                                <div class="preloader-wrapper big active crazy m-auto">
                                    <div class="spinner-layer spinner-blue-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="gap-patch">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </section>

                        <section class="accounts" id="accounts">
                            <table class="table table-hover">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Region</th>
                                        <th>Owner [Ref-id]</th>
                                        <th class="text-center">Premium</th> 
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                    <tr v-for="(account, index) in accounts">
                                        <td>{{ account.en_name }}</td>
                                        <td>{{ account.email }}</td>
                                        <td>{{ account.website }}</td>
                                        <td>{{ account.region.en_name }}</td>
                                        <td>{{ account.user.name+"   ["+account.user.ref_id+"]" }}</td>
                                        <td class="text-center">{{ premiumCheck(account.premium) }}</td>
                                        <td class="text-center"><button class="btn btn-secondary btn-sm"><a :href="edit_url + account.id">Edit</a></button></td> 
                                        <td class="text-center"><button class="btn btn-danger btn-sm" @click="showModal(account.id)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--Pagination -->
                            <nav class="mb-12 col-md-offset-5">
                                <ul class="pagination pagination-circle pg-blue">
                                    <!--First-->
                                    <li class="page-item d-none d-md-block">
                                        <a class="page-link waves-effect waves-effect"
                                        :class="{ disabled: endpoint == links.first || endpoint == pagination.path }"
                                        @click.prevent="changeEndpoint(1)">First</a>
                                    </li>

                                    <!--Arrow left-->
                                    <li class="page-item">
                                        <a class="page-link waves-effect waves-effect" aria-label="Previous"
                                        :class="{ disabled: links.prev == null }"
                                        @click.prevent="navigate(links.prev)">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!--Numbers-->
                                    <li class="page-item" :class="{ active: n == pagination.current_page }" v-for="n in pagination.last_page" v-show="( pagination.current_page <=3 && n <= 5 ) || (n <= (pagination.current_page + 2) && n >= (pagination.current_page - 2))" >
                                        <a class="page-link waves-effect waves-effect" @click.prevent="changeEndpoint(n)">{{ n }}</a>
                                    </li>


                                    <!--Arrow right-->
                                    <li class="page-item">
                                        <a class="page-link waves-effect waves-effect" aria-label="Next"
                                        :class="{ disabled: links.next == null }"
                                        @click.prevent="navigate(links.next)">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>

                                    <!--First-->
                                    <li class="page-item d-none d-md-block">
                                        <a class="page-link waves-effect waves-effect"
                                        :class="{ disabled: endpoint == links.last }"
                                        @click.prevent="changeEndpoint(pagination.last_page)">Last</a>
                                    </li>

                                </ul>
                            </nav>
                            <!--/Pagination -->
                        </section>
                        <!-- Accounts Grid -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['account_url', 'account_name', 'delete_url', 'edit_url'],
    data () {
        return {
            endpoint: this.account_url,
            accounts: {},
            links: {},
            pagination: {},
            search: {
                region: '',
                city: '',
                keyword: '',
            },
            isModalVisible: false,
            title:"Are you Sure You want to Delete this account?",
            account_id:null,
        }
    },
    methods: {
        fetchAccounts(){
            let vm = this;
            $('.accounts').hide();
            $('.fetching').show();
            axios.post(vm.endpoint, vm.search)
                .then(function (response) {
                    $('.fetching').hide();
                    $('.accounts').show();
                    if (typeof response.data.data !== 'undefined') {
                        let data = response.data;
                        vm.accounts = data.data;
                        vm.links = data.links;
                        vm.pagination = data.meta;
                        vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                    } else if (typeof response.status !== 'undefined') {
                        vm.accounts = null;
                        console.log(response.data.message)
                    }

                })
                .catch((response) => {
                    console.log(response);
                });
        },
        changeEndpoint(page) {
            let url = this.pagination.path + '?page=' + page;
            let cosmeticDiv = document.getElementById('accounts');
            cosmeticDiv.scrollIntoView();
            this.endpoint = url;

            return this.fetchAccounts();
        },
        navigate(url){
            this.endpoint = url;
            return this.fetchAccounts();
        },
        fetchFilter($key, $value){
            let vm = this;
            vm.search[$key] = $value;
            vm.endpoint = '/api/cosmetic-clinics/search';
            this.fetchAccounts();
        },
        
        
        searchByKeyword: _.debounce(function () {
            this.endpoint = '/api/cosmetic-clinics/search';
            this.fetchAccounts()
        }, 500),
        
        showModal(id) {
        this.account_id = id
        this.isModalVisible = true;
        },
        closeModal() {
            this.isModalVisible = false;
        },
        premiumCheck(status)
        {
            if(status === true)
            {
                return "Yes";
            }else{
                return "No";
            }
        },
        
    },
    mounted() {
        this.fetchAccounts();
    },
    watch: {
        
    },
    computed: {
        deleteUrl(){
            return this.delete_url + this.account_id;
        },
    }
}
</script>