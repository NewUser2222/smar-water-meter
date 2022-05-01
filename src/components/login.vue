<template>
    <div class="container-fluid">
        <div class="head">
            <router-link to="/">Trang chủ</router-link>
        </div>
        <div class="clear"></div>
        <br>
        <form class="login">
            <div class="form-group">
                <label for="formGroupExampleInput">Mã danh bộ</label>
                <input type="text" v-model="username" class="form-control" id="usr" placeholder="Mã danh bộ...">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Mật khẩu</label>
                <input type="password" v-model="pass" class="form-control" id="pass" placeholder="Mật khẩu...">
            </div>
            <p>Quên mật khẩu?</p>
            <button @click="login" class="form-control btn-primary">Đăng nhập</button>
        </form>
        <div class="foot"></div>
    </div>
    <FooTer></FooTer>
</template>

<script>

import axios from 'axios'
import FooTer from '../components/footer.vue'

export default {
    name: 'LoginPage',
    data() {
        return {
            errors: [],
            username:'',
            pass:'',
            usrcheck: true,
            passcheck: true
        }
    },
    methods: {
        login () {
            if (this.username == "abcd@01" && this.pass == "123456")
            {
                localStorage.setItem("user-infor", 'Nguyễn Văn A');
                localStorage.setItem("user-id", this.username);
                this.$router.push('/user');
            }
            else if (this.username == "admin@001" && this.pass == "000000") 
            {
                localStorage.setItem("user-infor", 'Huynh Huu B');
                localStorage.setItem("user-id", this.username);
                this.$router.push('/admin');
            }
            else if(document.getElementById('usr').value == '') {
                if(document.getElementById('pass').value == '') window.alert('Vui lòng nhập mã danh bộ và mật khẩu');
                else window.alert('Vui lòng nhập mã danh bộ');
            } 
            else if(document.getElementById('pass').value == '') window.alert('Vui lòng nhập mật khẩu');
            else window.alert('Thông tin đăng nhập không chính xác...');
        },
    },
    components: {
        FooTer
    }
}
</script>

<style scoped>

label {
    font-size: 20px;
    font-weight: bold;
    color: blue;
}

.login {
    border: 2px solid blue;
    border-radius: 20px;
    padding: 20px;
    width: 400px;
    margin: auto;
}

p {
    margin-top: 5px;
    text-align: end;
}

.head {
    width: fit-content;
    display: inline-block;
    float: right;
    margin: 10px;
}
.foot {
    height: 45vh;
}

.container-fluid {
    height: 100%;
    background-image: url("../assets/background.webp");
    padding: 0px;
}

.clear {
    clear: both;
}

</style>