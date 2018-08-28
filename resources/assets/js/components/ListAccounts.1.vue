<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{account_name}}</h2>
                    </div>
                    <div class="card-body">
                        <table style="width:100%">
                            <tr>
                                <th>Name</th>
                                <th>Email</th> 
                                <th>Phone Numeber</th>
                            </tr>
                            <tr>
                                <td>Jill</td>
                                <td>Smith</td> 
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Eve</td>
                                <td>Jackson</td> 
                                <td>94</td>
                            </tr>
                        </table>
                        <div>{{result}}</div>
                        <div>
                            <br>
                            <h2>Pagination</h2>
                            <p> Current Page {{currentPage}}</p>
                            <a @click.prevent="getNext()">Next Page</a><br>
                            <a @click.prevent="getPrevious()">Previous Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['url', 'account_name'],
    data() {
        return {
            result:null,
            currentPage:null,
        }
    },
    methods:{
        getNext(){
            let vm = this;
            if(this.result.links.next !== null){
                axios.get(this.result.links.next)
                .then(function(res){
                    vm.result = res.data;
                    vm.currentPage = res.data.meta.current_page;
                });
            }
        },
        getPrevious(){
            let vm = this;
            if(this.result.links.prev !== null) {
                axios.get(this.result.links.prev)
                .then(function(res){
                    vm.result = res.data;
                    vm.currentPage = res.data.meta.current_page;
                });
            }
        },
    },

    mounted() {
        let vm = this;
        axios.get(this.url)
        .then(function(res){
            vm.result = res.data;
            vm.currentPage = res.data.meta.current_page;
        });

        


    }

};
</script>