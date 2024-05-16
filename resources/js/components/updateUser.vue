<template>
    <h3 style="text-align: center; margin-top: 50px">Update User</h3>
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
                <span class="text-danger" v-if="errors?.name">{{
                    errors.name[0]
                }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    v-model="formValues.email"
                    type="text"
                    class="form-control"
                    placeholder="name@example.com"
                />
                <span class="text-danger" v-if="errors?.email">{{
                    errors.email[0]
                }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input
                    v-model="formValues.phone_number"
                    type="text"
                    class="form-control"
                    placeholder="Phone Number"
                />
                <span class="text-danger" v-if="errors?.phone_number">{{
                    errors.phone_number[0]
                }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input
                    v-model="formValues.address"
                    type="text"
                    class="form-control"
                    placeholder="Address"
                />
                <span class="text-danger" v-if="errors?.address">{{
                    errors.address[0]
                }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Country</label>
                <input
                    v-model="formValues.country"
                    type="text"
                    class="form-control"
                    placeholder="Country"
                />
                <span class="text-danger" v-if="errors?.country">{{
                    errors.country[0]
                }}</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Occupation</label>
                <input
                    v-model="formValues.occupation"
                    type="text"
                    class="form-control"
                    placeholder="Occupation"
                />
                <span class="text-danger" v-if="errors?.occupation">{{
                    errors.occupation[0]
                }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "create-user",
    data() {
        return {
            formValues: {
                name: "",
                email: "",
                phone_number: "",
                address: "",
                country: "",
                occupation: "",
                id: "",
            },
            errors: {},
        };
    },
    mounted() {
        this.getUserDetail();
    },
    methods: {
        getUserDetail() {
            axios
                .post("/api/get-user-details", { id: this.$route.params.id })
                .then((response) => {
                    this.formValues.name = response.data.user.name;
                    this.formValues.email = response.data.user.email;
                    this.formValues.phone_number =
                        response.data.user.phone_number;
                    this.formValues.address = response.data.user.address;
                    this.formValues.country = response.data.user.country;
                    this.formValues.occupation = response.data.user.occupation;
                    this.formValues.id = response.data.user.id;
                })
                .catch((error) => {});
        },
        submitForm(event) {
            event.preventDefault();

            //calling API for creating user
            axios
                .post("/api/create-user", this.formValues)
                .then((response) => {
                    this.$router.push({ path: "/" });
                    this.ShowToastMessage("User Updated Successfully");
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },

        ShowToastMessage(title) {
            Swal.fire({
                icon: "success",
                title: title,
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000, // Close after 5 seconds
            });
        },
    },
};
</script>

<style></style>
