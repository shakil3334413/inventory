<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
             <router-link to="/customer/create" class="btn btn-success">Customer Create</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Customer</h1>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="item in filterSearch" :key="item.id">
                                                <td>{{item.name}}</td>
                                                <td>{{item.email}}</td>
                                                <td>{{item.phone}}</td>
                                                <td>{{item.address}}</td>
                                                <td style="display: flex;">
                                                    <router-link :to="{ name: 'CustomerEdit', params: { id: item.id }}" class="btn btn-info btn-sm m-1">Edit</router-link>
                                                    <a @click="customerDelete(item.id)" class="btn btn-danger btn-sm m-1">Delete</a>
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
            customers:[],
            searchItem:''
        }
    },
    computed:{
        filterSearch(){
            return this.customers.filter(item=>{
                return item.name.match(this.searchItem)
            })
        }
    },
    methods:{
        index(){
            axios.get('/api/customer')
            .then(({data})=>(this.customers=data))
            .catch()
        },
        customerDelete(id){
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
                axios.delete('/api/customer/'+id)
                .then(()=>{
                    this.customers=this.customers.filter(item=>{
                        return item.id !=id
                    })
                })
                .catch(()=>{
                     this.$router.push({name:'Customer'})
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
