<template>
   <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <router-link to="/stock" class="btn btn-success">Go Back</router-link>
        <div class="card shadow-sm my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Product Stock Update</h1>
                            </div>
                            <form @submit.prevent="StockUpdate" enctype="multipart/form-data">
                                <div class="row">
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" v-model="form.product_quantity" class="form-control" id="product_quantity" placeholder="Product Quantity" />
                                            <small class="text-danger" v-if="errors.product_quantity">{{errors.product_quantity[0]}}</small>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </form>
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
        axios.get('/api/products/'+id)
        .then(({data})=>(this.form=data))
        .catch("error");
    },
    data(){
        return{
            form:{
                product_quantity:'',
            },
            errors:{}
        }
    },
    methods:{
        StockUpdate(){
               let id=this.$route.params.id;
                axios.put('/api/stock/update/'+id,this.form)
                .then(res=>{
                    this.$router.push({name:'Stock'})
                    Notify.success()
                })
                .catch(error=>this.errors=error.response.data.errors)
                .catch( Notify.error())
        },
    }
}
</script>

<style>

</style>
