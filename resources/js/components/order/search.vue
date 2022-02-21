<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <router-link to="/order" class="btn btn-success">Go Back</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Search</h1>
                                </div>
                                <form @submit.prevent="Search" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Search By Date</label>
                                                <input type="date" v-model="date" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Qty</th>
                                        <th>SubTotal</th>
                                        <th>Vat</th>
                                        <th>Total</th>
                                        <th>Pay</th>
                                        <th>Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" item in orders" :key="item.id">
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.qty }}</td>
                                        <td>{{ item.sub_total }}</td>
                                        <td>{{ item.vat }}</td>
                                        <td>{{item.total}}</td>
                                        <td>{{ item.pay }}</td>
                                        <td>{{ item.due }}</td>
                                        <router-link :to="{ name: 'order-view', params: { id: item.id }}" class="btn btn-info btn-sm m-1">View</router-link>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer"></div>
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
          date:'',
          orders:{},
        }
    },
    methods:{
         Search(){
            var data={date:this.date}
            axios.post('/api/search/order',data)
            .then(({data})=>(this.orders=data))
        }
    }
}
</script>

<style>

</style>
