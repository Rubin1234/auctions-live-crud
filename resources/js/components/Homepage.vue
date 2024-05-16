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
                                @click="this.$router.push('/update-user/' + userList.id)"
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
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "homePage",
    data() {
        return {
            userLists: [],
        };
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios
                .get("/api/get-users")
                .then((response) => {
                    this.userLists = response.data.users.data;
                })
                .catch((error) => {
                    console.error("Error fetching users:", error);
                });

            // axios.get('https://6645b17cb8925626f892bb46.mockapi.io/auction-live/users').then((response)=>{
            //    this.userLists = response.data
            // }).catch((error)=> {
            //     console.error('Error fetching users:', error);
            // })
        },
        updateUser(user_id){
            //  axios
            //     .post("api/create-user", { id: user_id })
            //     .then((response) => {
            //     })
            //     .catch((error) => {
                    
            //     });
        },
        deleteUser(user_id, index) {
            axios
                .post("api/delete-user/", { id: user_id })
                .then((response) => {
                    this.userLists.splice(index, 1);
                })
                .catch((error) => {

                });
        },
    },
};
</script>

<style></style>
