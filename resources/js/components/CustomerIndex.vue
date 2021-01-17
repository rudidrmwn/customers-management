<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>All Customers</div>
                <div class='card-body'>
                    <router-link :to="{ name: 'create' }" class="btn btn-primary">Create new customer</router-link>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Married</th>
                                    <th>Address</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(customer, index) in customers" :key="customer.id">
                                    <td width="50" class="text-center">{{ index + 1 }}</td>
                                    <td>{{ customer.name }}</td>
                                    <td>{{ customer.email }}</td>
                                    <td>{{ customer.gender }}</td>
                                    <td>{{ customer.married }}</td>
                                    <td>{{ customer.address }}</td>
                                    <td width="200" class="text-center">
                                        <div class="btn-group">
                                            <router-link :to="{name: 'show', params: { id: customer.id }}" class="btn btn-primary">Detail</router-link>
                                            <router-link :to="{name: 'edit', params: { id: customer.id }}" class="btn btn-success">Edit</router-link>
                                            <button class="btn btn-danger" @click = "deletePost(customer.id)">Delete</button>
                                        </div>
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
</template>
 
<script>
  export default {
      data() {
        return {
          customers: []
        }
      },
      created() {
        let uri = '/api/customers';
        this.axios.get(uri).then(response => {
            this.customers = response.data;
        });
    },
    methods: {
        deletePost(id)
        {
            this.$swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Deh',
                cancelButtonText: 'Nggak Jadi'
                }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'Customer deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = '/api/customers/delete/'+id;
                    this.axios.delete(uri).then(response => {
                        this.customers.splice(this.customers.indexOf(id), 1);
                    });
                    console.log("Deleted customer with id ..." +id);
                }
            })
        }
    }
  }
</script>