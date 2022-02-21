<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Today Order</h1>
                                </div>
                                <input type="text" v-model="searchItem" placeholder="Search Your Item" class="form-control" style="width:300px;">
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                              <th>Name</th>
                                                <th>Total Amount</th>
                                                <th>Pay</th>
                                                <th>Due</th>
                                                <th>PayBy</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Total Amount</th>
                                                <th>Pay</th>
                                                <th>Due</th>
                                                <th>PayBy</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="item in filterSearch" :key="item.id">
                                                <td>{{item.name}}</td>
                                                <td>{{item.total}}</td>
                                                <td>{{item.pay}}</td>
                                                <td>{{item.due}}</td>
                                                <td>{{item.payby}}</td>
                                                <td style="display:flex">
                                                    <router-link :to="{ name: 'order-view', params: { id: item.id }}" class="btn btn-info btn-sm m-1">View</router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'login'})
        }
    },
    data(){
        return{
            order:[],
            searchItem:''
        }
    },
    computed:{
        filterSearch(){
            return this.order.filter(item=>{
                return item.name.match(this.searchItem)
            })
        }
    },
    methods:{
        allOrder(){
            axios.get('/api/order/')
            .then(({data})=>(this.order=data))
            .catch()
        },
    },
    created(){
        this.allOrder();
    }
}
</script>

<style>

</style>
