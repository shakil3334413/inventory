<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
             <router-link to="/supplier/create" class="btn btn-success">Supplier Create</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Supplier</h1>
                                </div>
                                <input type="text" v-model="searchItem" placeholder="Search Your Item" class="form-control" style="width:300px;">
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Shop Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Shop Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="supplier in filterSearch" :key="supplier.id">
                                                <td>{{supplier.name}}</td>
                                                <td>{{supplier.email}}</td>
                                                <td>{{supplier.phone}}</td>
                                                <td>{{supplier.address}}</td>
                                                <td>{{supplier.shop_name}}</td>
                                                <td style="display: flex;">
                                                    <router-link :to="{ name: 'SupplierEdit', params: { id: supplier.id }}" class="btn btn-info btn-sm m-1">Edit</router-link>
                                                    <a @click="supplierDelete(supplier.id)" class="btn btn-danger btn-sm m-1">Delete</a>
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
            suppliers:[],
            searchItem:''
        }
    },
    computed:{
        filterSearch(){
            return this.suppliers.filter(supplier=>{
                return supplier.name.match(this.searchItem)
            })
        }
    },
    methods:{
        index(){
            axios.get('/api/supplier')
            .then(({data})=>(this.suppliers=data))
            .catch()
        },
        supplierDelete(id){
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
                axios.delete('/api/supplier/'+id)
                .then(()=>{
                    this.suppliers=this.suppliers.filter(suppler=>{
                        return suppler.id !=id
                    })
                })
                .catch(()=>{
                     this.$router.push({name:'SupplierAll'})
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
