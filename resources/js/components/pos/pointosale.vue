<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pos</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
        </div>
        <div class="row mb-3">
            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
                        <a class="btn btn-sm btn-info" style="color: #fff;"> Add Customer</a>
                    </div>

                    <div class="table-responsive" style="font-size: 12px;">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cartproduct in cartproducts" :key="cartproduct.id">
                                    <td>{{cartproduct.product_name}}</td>
                                    <td class="quality">
                                        <input type="text" :value="cartproduct.product_quantity" readonly style="width:45px;">
                                        <button class="btn btn-success btn-sm m-1" @click.prevent="increment(cartproduct.id)">+</button>
                                        <button class="btn btn-danger btn-sm m-1" @click.prevent="decrement(cartproduct.id)" v-if="cartproduct.product_quantity >=2">-</button>
                                        <button v-else="" class="btn  btn-danger btn-sm m-1" disabled>-</button>
                                    </td>
                                    <td>{{cartproduct.product_price}}</td>
                                    <td>{{cartproduct.sub_total}}</td>
                                    <td><a @click="itemRemove(cartproduct.id)" class="btn btn-sm btn-primary">X</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity: <strong>{{qty}}</strong></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total: <strong>{{subtotal}} $</strong></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Vat : <strong>{{allvats.vat}} %</strong></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Total : <strong>{{subtotal*allvats.vat / 100 + subtotal}} $</strong></li>
                        </ul>
                        <br />
                        <br />

                        <form @submit.prevent="orderDone">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <select class="form-control" v-model="customer_id">
                                    <option v-for="customer in customers" :value="customer.id" :key="customer.id">{{customer.name}}</option>
                                </select>
                                 <small class="text-danger" v-if="errors.customer_id">{{errors.customer_id[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label >Pay</label>
                                <input type="text"  class="form-control" v-model="pay" />
                                <small class="text-danger" v-if="errors.pay">{{errors.pay[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label >Due</label>

                                <input type="text"  class="form-control" v-model="due" value="" />
                            </div>
                            <div class="form-group">
                                <label>Pay By</label>
                                <select class="form-control" v-model="payby">
                                    <option value="Hand Cash">Hand Cash</option>
                                    <option value="Check">Check</option>
                                    <option value="Gift Card">Gift Card</option>
                                </select>
                            </div>
                             <small class="text-danger" v-if="errors.payby">{{errors.payby[0]}}</small>
                            <br>
                            <input type="submit" class="btn btn-success" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-7 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">All Product</button>
                        </li>
                        <li class="nav-item" role="presentation" v-for="category in categories" :key="category.id">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" @click="allproduct(category.id)">
                                {{category.category_name}}
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                <input type="text" v-model="searchItem" placeholder="Search Your Item" class="form-control" />
                                <hr />
                                <div class="row">
                                    <div class="col-md-3 col-lg-3" v-for="item in filterSearch" :key="item.key">
                                        <button style="border:none" @click.prevent="AddToCart(item.id)">
                                           <div  style="width:8.5rem;margin-bottom:5px">
                                                <img class="card-img-top" src="" :alt="item.product_name" />
                                                <h5 class="card-title">{{item.product_name}}</h5>
                                                <span v-if="item.product_quantity >=1 "><span class="badge badge-success">Available {{item.product_quantity}}</span></span>
                                                <span v-else=""><span class="badge badge-danger">Stock Out</span></span>
                                                <hr />
                                           </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body">
                                <input type="text" v-model="searchTerm" placeholder="Search Your Item" class="form-control" />
                                <hr />
                                <div class="row">
                                    <div class="col-md-3 col-lg-3" v-for="getallpro in getfilterSearch" :key="getallpro.key">
                                         <button style="border:none" @click.prevent="AddToCart(getallpro.id)">
                                               <div  style="width:8.5rem;margin-bottom:5px">
                                        <img class="card-img-top" src="" :alt="getallpro.product_name" />
                                        <h5 class="card-title">{{getallpro.product_name}}</h5>
                                        <span v-if="getallpro.product_quantity >=1 "><span class="badge badge-success">Available {{getallpro.product_quantity}}</span></span>
                                        <span v-else=""><span class="badge badge-danger">Stock Out</span></span>
                                        <hr />
                                               </div>
                                         </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
</template>



<script>
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'login'})
        }
    },
    created(){
        this.index();
        this.getcategory();
        this.allcustomer();
        this.allcartProduct();
        this.getallvat();
        Reload.$on('AfterAdd',()=>{
             this.allcartProduct();
        })
    },
    data(){
        return{
            customer_id:'',
            pay:'',
            due:'',
            payby:'',

            proudcts:[],
            categories:'',
            searchItem:'',
            getallproduct:[],
            searchTerm:'',
            customers:'',
            cartproducts:'',
            allvats:'',
            errors:{},
        }
    },
    computed:{
        filterSearch(){
            return this.proudcts.filter(item=>{
                return item.product_name.match(this.searchItem)
            })
        },
        getfilterSearch(){
            return this.getallproduct.filter(getallpro=>{
                return getallpro.product_name.match(this.searchTerm)
            })
        },
        qty(){
            let sum=0;
            for(let i=0;i<this.cartproducts.length;i++){
                sum+=(parseFloat(this.cartproducts[i].product_quantity))
            }
            return sum;
        },
         subtotal(){
            let sum=0;
            for(let i=0;i<this.cartproducts.length;i++){
                sum+=(parseFloat(this.cartproducts[i].product_quantity) * parseFloat(this.cartproducts[i].product_price))
            }
            return sum;
        },

    },
    methods:{

        orderDone(){
            let total=this.subtotal * this.allvats.vat / 100 + this.subtotal;
            var data ={qty:this.qty,subtotal:this.subtotal,customer_id:this.customer_id,payby:this.payby,pay:this.pay,due:this.due,vat:this.allvats.vat,total:total}
            axios.post('/api/order/done',data)
            .then(res=>{
                this.$router.push({name:'home'})
                Notify.success();
            })
            .catch(error=>this.errors=error.response.data.errors)
       },
        AddToCart(id){
            axios.get('/api/add/cart/'+id)
            .then(()=>{
                Reload.$emit('AfterAdd');
                Notify.add_cart();
            })
            .catch()
        },
        itemRemove(id)
        {
            axios.delete('/api/remove/cart/'+id)
            .then(()=>{
                Reload.$emit('AfterAdd');
                Notify.remove_cart();
            })
            .catch()
        },
        allcartProduct()
        {
            axios.get('/api/get/card/product')
            .then(({data})=>(this.cartproducts=data))
            .catch()
        },

        increment(id)
        {
            axios.get('/api/cart/product/increment/'+id)
            .then(()=>{
                Reload.$emit('AfterAdd');
                Notify.add_cart();
            })
            .catch()
        },
        decrement(id)
        {
            axios.get('/api/cart/product/decrement/'+id)
            .then(()=>{
                Reload.$emit('AfterAdd');
                Notify.remove_cart();
            })
            .catch()
        },
        getallvat(){
            axios.get('/api/get/vat')
            .then(({data})=>(this.allvats=data))
            .catch()
        },
    //card method end

        index(){
            axios.get('/api/products')
            .then(({data})=>(this.proudcts=data))
            .catch()
        },
        getcategory(){
           axios.get('/api/category')
            .then(({data})=>(this.categories=data))
            .catch()
        },

        allproduct(id)
        {
            axios.get('/api/category/product/'+id)
            .then(({data})=>(this.getallproduct=data))
            .catch()
        },
        allcustomer()
        {
            axios.get('/api/customer')
            .then(({data})=>(this.customers=data))
            .catch()
        }

    }
}
</script>

<style>
    .quality{
        display: flex;
    }
</style>>

</style>
