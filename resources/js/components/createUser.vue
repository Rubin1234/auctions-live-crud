<template>
    <h3 style="text-align: center; margin-top: 50px">Create User</h3>
    <div class="d-flex justify-content-center">
        <form
            @submit="submitForm"
            style="width: 400px; background: aliceblue; padding: 38px"
        >
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    v-model="formValues.name"
                    type="text"
                    class="form-control"
                    placeholder="Name"
                />
                <span class="text-danger" v-if="errors?.name">{{ errors.name[0] }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    v-model="formValues.email"
                    type="text"
                    class="form-control"
                    placeholder="name@example.com"
                />
                   <span class="text-danger" v-if="errors?.email">{{ errors.email[0] }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input
                    v-model="formValues.phone_number"
                    type="text"
                    class="form-control"
                    placeholder="Phone Number"
                />
                   <span class="text-danger" v-if="errors?.phone_number">{{ errors.phone_number[0] }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input
                    v-model="formValues.address"
                    type="text"
                    class="form-control"
                    placeholder="Address"
                />
                   <span class="text-danger" v-if="errors?.address">{{ errors.address[0] }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Country</label>
                <input
                    v-model="formValues.country"
                    type="text"
                    class="form-control"
                    placeholder="Country"
                />
                   <span class="text-danger" v-if="errors?.country">{{ errors.country[0] }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Occupation</label>
                <input
                    v-model="formValues.occupation"
                    type="text"
                    class="form-control"
                    placeholder="Occupation"
                />
                   <span class="text-danger" v-if="errors?.occupation">{{ errors.occupation[0] }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import SwalMixin from "../mixins/swalMixin.js";

export default {
    name: "create-user",
    mixins: [SwalMixin],
    data() {
        return {
            formValues: {
                name: "",
                email: "",
                phone_number: "",
                address: "",
                country: "",
                occupation: "",
            },
            errors: {}
        };
    },
    methods: {
        submitForm(event) {
            event.preventDefault();

            //calling API for creating user
            axios.post("api/create-user", this.formValues).then((response) => {
                this.fireSwal('User Created Successfully', 'success');
                this.$router.push({ path: '/'})
            }).catch(error => {
                    if (error.response.status === 422) {
                this.errors = error.response.data.errors
            }
            });
        },
    },
};
</script>

<style></style>
