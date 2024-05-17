<template>
    <div style="display: flex; justify-content: center">
   <div>
            <h1 class="text-center" style="margin-top: 50px">List of Users</h1>
            <div
                class="text-right"
                style="display: flex; justify-content: right"
            >
                <router-link to="create-user" class="btn btn-primary"
                    >Create User</router-link
                >
            </div>
            <hr />
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Occupation</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(userList, index) in userLists" :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>{{ userList.name }}</td>
                        <td>{{ userList.address }}</td>
                        <td>{{ userList.phone_number }}</td>
                        <td>{{ userList.occupation }}</td>
                        <td>{{ userList.country }}</td>
                        <td>
                            <button
                                type="button"
                                class="btn btn-info"
                                style="margin-right: 10px"
                                @click="
                                    this.$router.push(
                                        '/update-user/' + userList.id
                                    )
                                "
                            >
                                Update
                            </button>
                            <button
                                type="button"
                                class="btn btn-danger"
                                @click="deleteUser(userList.id, index)"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
              <pagination :total-items="totalItems" :items-per-page="itemsPerPage" @page-change="handlePageChange"/>
        </div>
    </div>
</template>

<script>

import Pagination from './paginate.vue';
import axios from "axios";
import SwalMixin from "../mixins/swalMixin.js";


export default {
    name: "homePage",
    components: {
    Pagination
},
   mixins: [SwalMixin],
    data() {
        return {
            userLists: [],
            currentPage: 1,
            totalItems: 10,
            itemsPerPage: 5,
            lastPage: 0,
            toastMessage: ''
        };
    },
    mounted() {
        this.getUsers();

    },
    methods: {
        handlePageChange(page) {
        this.currentPage = page;
        this.getUsers(); // Call getUsers method to fetch data for the current page
    },
       getUsers() {
        axios
            .get("/api/get-users", {
                params: {
                    page: this.currentPage
                }
            })
            .then((response) => {
                this.userLists = response.data.users.data;
                // For Pagination
                this.currentPage = response.data.users.current_page;
                this.totalItems = response.data.users.total;
                this.itemsPerPage = response.data.users.per_page;
                this.lastPage = response.data.users.last_page;
            })
            .catch((error) => {
                console.error("Error fetching users:", error);
            });
    },
    deleteUser(user_id, index) {
        axios
            .post("api/delete-user/", { id: user_id })
            .then((response) => {
                this.userLists.splice(index, 1);
                this.fireSwal('User Deleted Successfully', 'success');
            })
            .catch((error) => {});
    },   
},
};
</script>

<style></style>
