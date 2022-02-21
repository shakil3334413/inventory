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
                                    <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <!-- Simple Tables -->
                                        <div class="card">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Oder Details</h6>
                                            </div>
                                            <div class="table-responsive">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Name : {{ orders.name }}</li>
                                                    <li class="list-group-item">Phone : {{ orders.phone }}</li>
                                                    <li class="list-group-item">Address : {{ orders.address }}</li>
                                                    <li class="list-group-item">Date : {{ orders.order_date }}</li>
                                                    <li class="list-group-item">Pay Through : {{ orders.payby }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <!-- Simple Tables -->
                                        <div class="card">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Oder Details</h6>
                                            </div>
                                            <div class="table-responsive">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Sub Total : {{ orders.sub_total }} $</li>
                                                    <li class="list-group-item">Vat : {{ orders.vat }} $</li>
                                                    <li class="list-group-item">Total : {{ orders.total }} $</li>
                                                    <li class="list-group-item">Pay Amount : {{ orders.pay }} $</li>
                                                    <li class="list-group-item">Due Amount : {{ orders.due }} $</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <!-- Simple Tables -->
                                        <div class="card">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Image</th>
                                                            <th>Qty</th>
                                                            <th>Unite Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for=" item in details" :key="item.id">
                                                            <td>{{ item.product_name }}</td>
                                                            <td>{{ item.product_code }}</td>
                                                            <td><img :src="item.image" alt=""></td>
                                                            <td>{{ item.product_quantity }}</td>
                                                            <td>{{ item.product_price }}</td>
                                                            <td>{{ item.sub_total }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>


export default {
    created(){
        let id=this.$route.params.id;
        axios.get('/api/order/details/'+id)
        .then(({data})=>(this.orders=data))
        .catch("error");
         axios.get('/api/order/order-details/'+id)
        .then(({data})=>(this.details=data))
        .catch("error");
    },
    data(){
        return{
            errors:{},
            orders:{},
            details:{},
        }
    },
    methods:{
        
    }
}
</script>

<style>

</style>
