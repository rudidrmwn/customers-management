<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Detail Customers</div>
                    <div class='card-body'>
                        <div class='form-group'>
                            <label htmlFor='name'>Name</label>
                            <input type="text" class="form-control" id="name" v-model="customer.name" disabled>
                        </div>
                        <div class='form-group'>
                            <label htmlFor='email'>Email</label>
                            <input type="text" class="form-control" id="email" v-model="customer.email" disabled>
                        </div>
                        <div class='form-group'>
                            <label htmlFor='gender'>Gender</label>
                            <input type="text" class="form-control" id="gender" v-model="customer.gender" disabled>
                        </div>
                        <div class='form-group'>
                            <label htmlFor='married'>is Married?</label>
                            <input type="text" class="form-control" id="married" v-model="customer.married" disabled>
                        </div>
                        <div class='form-group'>
                            <label htmlFor='address'>Address</label>
                            <textarea type="text" class="form-control" id="address" v-model="customer.address" rows="5" disabled></textarea>
                        </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                        </div>
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
        }
    },
    created() {
        let uri = `/api/customers/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.customer = response.data;
        });
    },
    method: {
 
    }
  }
</script>