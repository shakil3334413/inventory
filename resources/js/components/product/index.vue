<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
             <router-link to="/product/create" class="btn btn-success">Product Create</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Product</h1>
                                </div>
                                <input type="text" v-model="searchItem" placeholder="Search Your Item" class="form-control" style="width:300px;">
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Supplier Name</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Buying Price</th>
                                                <th>Selling Price</th>
                                                <th>Quantity</th>
                                                <th>Buying Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Category Name</th>
                                                <th>Supplier Name</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Buying Price</th>
                                                <th>Selling Price</th>
                                                <th>Quantity</th>
                                                <th>Buying Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="item in filterSearch" :key="item.id">
                                                <td>{{item.category.category_name}}</td>
                                                 <td>{{item.supplier.name}}</td>
                                                 <td>{{item.product_name}}</td>
                                                 <td>{{item.product_code}}</td>
                                                 <td>{{item.buying_price}}</td>
                                                 <td>{{item.selling_price}}</td>
                                                 <td>{{item.product_quantity}}</td>
                                                 <td>{{item.buying_date}}</td>
                                                <td style="display: flex;">
                                                    <router-link :to="{ name: 'ProductEdit', params: { id: item.id }}" class="btn btn-info btn-sm m-1">Edit</router-link>
                                                    <a @click="productDelete(item.id)" class="btn btn-danger btn-sm m-1">Delete</a>
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
            proudcts:[],
            searchItem:''
        }
    },
    computed:{
        filterSearch(){
            return this.proudcts.filter(item=>{
                return item.product_name.match(this.searchItem)
            })
        }
    },
    methods:{
        index(){
            axios.get('/api/products')
            .then(({data})=>(this.proudcts=data))
            .catch()
        },
        productDelete(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't delete your data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/api/products/'+id)
                .then(()=>{
                    this.proudcts=this.proudcts.filter(item=>{
                        return item.id !=id
                    })
                })
                .catch(()=>{
                     this.$router.push({name:'Product'})
                })
                Swal.fire(
                'Deleted!',
                'Your Data has been deleted.',
                'success'
                )
            }
            })
        }
    },
    created(){
        this.index();
    }
}
</script>

<style>

</style>
