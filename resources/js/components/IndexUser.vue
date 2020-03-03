<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title"> User's list | <a href="http://127.0.0.1:8000/user/create">Add User | </a>
                    filter
                    <select style="font-size:15px" @change="req" v-model="type_id">
                        <option
                        v-bind:key="1"
                        v-bind:value="1"
                        >system users</option>
                        <option
                                v-bind:key="2"
                                v-bind:value="2"
                        >participants</option>
                        <option
                                v-bind:key="3"
                                v-bind:value="3"
                        >organizer</option>
                    </select></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-secondary">
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Type</th>
                            <th>Action</th>
                            </thead>


                            <tbody v-for="u in users" :key="u.id">

                            <td> {{u.first_name}}</td>
                            <td> {{u.middle_name}}</td>
                            <td> {{u.last_name}}</td>
                            <td> {{u.role.role}}</td>
                            <td> {{u.type.type}}</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import axios from 'axios'
    let api = 'http://127.0.0.1:8000/api'
    export default {
        mounted() {
            console.log('Component mounted.')
            axios.get(api + '/system-user').then( (r)=>{
                this.users = r.data.data
            })
        },

        data(){
            return{
                users:[],
                roles:[
                    [
                        id =>1,
                         role => 'system user'
                    ],
                    [
                        id =>2,
                        role => 'participant'
                    ],
                    [
                        id =>1,
                        role => 'organizer'
                    ],
                ],
                type_id:''
            }
        },


        methods:{

                req($id){
                    if(this.type_id == 1){
                        axios.get(api + '/system-user').then( (r)=>{
                            this.users = r.data.data
                        })
                    }else if(this.type_id == 2){
                        this.participants()
                    }else if(this.type_id == 3){
                        this.organizers()
                    }
            },
            participants(){
                axios.get(api + '/participant').then( (r)=>{
                    this.users = r.data.data
                })
            },
            organizers(){
                axios.get(api + '/organizer').then( (r)=>{
                    this.users = r.data.data
                })
            }

        }
    }
</script>


<!--<select id="input1" style="width: 550px;background-color: #d5d5d5;height: 40px"-->
        <!--v-model="department_id">-->
    <!--<option v-for="d in departments_"-->
            <!--v-bind:key="d.id"-->
            <!--v-bind:value="d.id"-->
    <!--&gt;{{d.department}}-->
    <!--</option>-->