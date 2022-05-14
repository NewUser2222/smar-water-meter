<template>
    <HeaderComponent></HeaderComponent>
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="dropdown pb-4">
                <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">{{get_adname()}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a @click="logout()" class="dropdown-item" href="#">Đăng xuất</a></li>
                </ul>
            </div>
            <hr>
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <router-link to="/admin" class="nav-link px-2"><span class="d-none d-sm-inline"><strong>Tổng quan</strong></span></router-link>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"><strong>Khách hàng</strong></span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <router-link to="" class="nav-link px-0"> <span class="d-none d-sm-inline text-black">Tra cứu</span></router-link>
                            </li>
                            <li>
                                <router-link to="" class="nav-link px-0"> <span class="d-none d-sm-inline">Yêu cầu</span></router-link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"><strong>Cài đặt</strong></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <div id="search" class="input-group">
                <input id="tukhoa" v-model="tukhoa" type="text" class="form-control" placeholder="Nhập từ khóa..." aria-label="Username" aria-describedby="input-group-button-right">
                <button @click="find()" type="button" class="btn btn-outline-primary" id="input-group-button-right">Tìm kiếm</button>
            </div>
            <div v-if="this.res != ''" id="table" class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>User Name</th>
                    <th>Khách hàng</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <tr v-for="row in res">
                    <td>{{ row.username }}</td>
                    <td>{{ row.name }}</td>
                    <td><button type="button" name="view" class="btn btn-success view" @click="deleteData(row.id)">Xem</button></td>
                    <td><button type="button" name="edit" class="btn btn-primary edit" @click="fetchData(row.id)">Sửa</button></td>
                    <td><button type="button" name="delete" class="btn btn-danger delete" @click="deleteData(row.id)">Xóa</button></td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</div>
    <FooTer></FooTer>    
</template>

<script>

import axios from 'axios'
import HeaderComponent from './header.vue'
import FooTer from '../components/footer.vue'
import UserPage from '../components/user.vue'

export default {
    name: 'Tracuu',
    data () {
        return {
            overview: true,
            tracuu: false,
            myfee: 4500,
            tukhoa: '',
            res: ''
        }
    },
    methods: {
        find: function() {
            if (document.getElementById('tukhoa').value == '') window.alert("Vui lòng nhập từ khóa để tìm kiếm")
            else{
                var self = this;
                axios.post('http://localhost/php/index.php', {
                    action: 'find',
                    keyword: this.tukhoa,
                }).then(function(response){
                    self.res = response?.data;
                    console.log(self.res); 
                }).catch(function (error){
                    console.log(error);
                });
            }
        },
        logout() 
        {
            localStorage.clear();
            this.$router.push('/login')
        },
        get_adname(){
            return localStorage.getItem('user-infor');
        },
    },
    components: {
        FooTer,
        HeaderComponent,
        UserPage
    }
}
</script>

<style scoped>

.infor {
    float: right;
}

.clear {
    clear: both;
}

button {
    width: 100px;
    margin: auto;
}

#find {
    width: 50vw;
    align-self: ;
}

#search {
    padding: 60px;
}

#table {
    padding: 0px 50px 0px 50px;
}

</style>