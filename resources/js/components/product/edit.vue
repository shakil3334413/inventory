<template>
   <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <router-link to="/product" class="btn btn-success">All Product</router-link>
        <div class="card shadow-sm my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                            </div>
                            <form @submit.prevent="update" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select v-model="form.category_id" id="category_id" class="form-control">
                                                <option :value="category.id" v-for="category in categories">{{category.category_name}}</option>
                                            </select>
                                            <small class="text-danger" v-if="errors.category_id">{{errors.category_id[0]}}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <select v-model="form.supplier_id" id="supplier_id" class="form-control">
                                                 <option :value="supplier.id" v-for="supplier in suppliers">{{supplier.name}}</option>
                                            </select>
                                            <small class="text-danger" v-if="errors.supplier_id">{{errors.supplier_id[0]}}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" v-model="form.product_name" class="form-control" id="product_name" placeholder="Enter Product Name" />
                                            <small class="text-danger" v-if="errors.product_name">{{errors.product_name[0]}}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input type="text" v-model="form.product_code" class="form-control" id="product_code" placeholder="Enter Product Code" />
                                            <small class="text-danger" v-if="errors.product_code">{{errors.product_code[0]}}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" v-model="form.product_quantity" class="form-control" id="product_quantity" placeholder="Product Quantity" />
                                            <small class="text-danger" v-if="errors.product_quantity">{{errors.product_quantity[0]}}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Root</label>
                                            <input type="text" v-model="form.root" class="form-control" id="root" placeholder="Root" />
                                            <small class="text-danger" v-if="errors.root">{{errors.root[0]}}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Buying Price</label>
                                            <input type="text" v-model="form.buying_price" class="form-control" id="buying_price" placeholder="Buying Price" />
                                            <small class="text-danger" v-if="errors.buying_price">{{errors.buying_price[0]}}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selling Price</label>
                                            <input type="text" v-model="form.selling_price" class="form-control" id="selling_price" placeholder="Selling Price" />
                                            <small class="text-danger" v-if="errors.selling_price">{{errors.selling_price[0]}}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Buying Date</label>
                                            <input type="date" v-model="form.buying_date" class="form-control" id="buying_date" />
                                            <small class="text-danger" v-if="errors.buying_date">{{errors.buying_date[0]}}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected" />
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <small class="text-danger" v-if="errors.image"> {{ errors.image[0] }} </small>
                                        </div>
                                        <div class="col-md-6">
                                            <img :src="form.image" style="height: 40px; width: 40px;" />
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
        axios.get('/api/category')
        .then(({data})=>(this.categories=data))
        axios.get('/api/supplier')
            .then(({data})=>(this.suppliers=data))
    },
    data(){
        return{
            form:{
                category_id:'',
                supplier_id:'',
                product_name:'',
                product_code:'',
                root:'',
                buying_price:'',
                selling_price:'',
                product_quantity:'',
                buying_date:'',
                image:'',
            },
            errors:{},
            categories:{},
            suppliers:{},
        }
    },
    methods:{
        onFileSelected(event){
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notify.image_validation()
            }else{
            let reader = new FileReader();
            reader.onload = event =>{
                this.form.image = event.target.result
            // console.log(event.target.result);
            };
            reader.readAsDataURL(file);
            }
        },
        update(){
               let id=this.$route.params.id;
                axios.patch('/api/products/'+id,this.form)
                .then(res=>{
                    this.$router.push({name:'Product'})
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
