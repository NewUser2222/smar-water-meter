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
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><strong>Tổng quan</strong></span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"><strong>Khách hàng</strong></span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <router-link to="/tracuu" class="nav-link px-0"> <span class="d-none d-sm-inline">Tra cứu</span></router-link>
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
            <div id="overview">
                Overview
            </div>
        </div>
    </div>
</div>
    <FooTer></FooTer>    
</template>

<script>

import HeaderComponent from './header.vue'
import FooTer from '../components/footer.vue'

export default {
    name: 'AdminPage',
    data () {
        return {
            overview: true,
            tracuu: false,
        }
    },
    methods: {
        logout() 
        {
            localStorage.clear();
            this.$router.push('/login')
        },
        get_adname(){
            return localStorage.getItem('user-infor');
        }
    },
    components: {
        FooTer,
        HeaderComponent
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

</style>