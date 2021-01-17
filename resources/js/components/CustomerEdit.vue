<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Edit Customer</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>
 
                        <form @submit.prevent="updateCustomer">
                            <div class='form-group'>
                                <label htmlFor='name'>Name</label>
                                <input type="text" class="form-control" id="name" v-model="customer.name">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='email'>Email</label>
                                <input type="text" class="form-control" id="email" v-model="customer.email">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='password'>Password</label>
                                <input type="password" class="form-control" id="password" v-model="customer.password">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='gender'>Gender</label>
                                <div class="form-check">
                                    <input type="radio" @change="onChange($event)" v-model="customer.gender" value="Pria"> Pria
                                </div>
                                <div class="form-check">
                                    <input type="radio" @change="onChange($event)" v-model="customer.gender" value="Wanita"> Wanita
                                </div>
                            </div>
                             <div class='form-group'>
                                <label htmlFor='married'>Status Penikahan</label>
                                <div class="form-check">
                                    <input type="radio" v-model="customer.married" value="Menikah"> Menikah
                                </div>  
                                <div class="form-check">
                                    <input type="radio" v-model="customer.married" value="Belum Menikah"> Belum Menikah
                                </div>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='address'>Address</label>
                                <textarea type="text" class="form-control" id="address" v-model="customer.address" rows="5"></textarea>
                            </div>
                            <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                                  
                                  
                                <button class='btn btn-primary'>Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            customer:{},
            errors: [],
            name: null,
            email: null,
            password: null,
            gender: null,
            married: null,
            address: null
        }
    },
    created() {
        let uri = `/api/customers/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.customer = response.data;
        });
    },
    methods: {
        updateCustomer(e){
             
            if (this.$data.customer.name != null && this.$data.customer.email != null && this.$data.customer.password != null && this.$data.customer.gender != null && this.$data.customer.married != null && this.$data.customer.address != null) {
                 
                this.$swal.fire({
                    title: 'Success',
                    text: "Customer created successfully",
                    icon: 'success',
                    timer: 1000
                });
                let uri = `/api/customers/update/${this.$route.params.id}`;
                this.axios.put(uri, this.customer).then((response) => {
                    this.$router.push({name: 'home'});
                });
                return true;
            }
 
 
            this.errors = [];
 
            if (!this.name) {
                    this.errors.push('Nama wajib diisi !');
                }
                if (!this.email) {
                    this.errors.push('Email wajib diisi !');
                }
                if (!this.password) {
                    this.errors.push('Password wajib diisi !');
                }
                if (!this.gender) {
                    this.errors.push('Gender wajib diisi !');
                }

                if (!this.is_married) {
                    this.errors.push('Status Pernikahan wajib diisi !');
                }
                if (!this.address) {
                    this.errors.push('Alamat wajib diisi !');
                }
 
            e.preventDefault();
        },
        onChange(e) {
            var data = e.target.value;
            console.log(data);
        }
    }
  }
</script>