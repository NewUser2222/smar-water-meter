<template>
    <HeaderComponent></HeaderComponent>
    <div class="infor">   
        <p>Xin chào, Khách hàng {{get_usrname()}}</p>
        <button @click="logout" class="form-control btn-primary">Đăng xuất</button>
    </div>
    <div class="clear"></div>
    <div class="row">
        <div :key="reload" class="col">
            <area-chart :colors="['#063970', '#76b3fb']" :data=this.infor  ></area-chart>
        </div>
        <div id="bill" class="col">
            <div class="card">
                <div class="card-header">
                    <span> <strong>HÓA ĐƠN TẠM THỜI</strong></span>
                </div>
                <div class="card-body">
                    <div id="time" class="col md-4">
                        <span>Tính đến &emsp; {{printTime()}} &ensp; {{ formatDate(printDate()) }} </span>
                    </div>
                    <div id="infor" class="col md-2">
                        <h5 class="card-title">Chủ hộ: {{ get_usrname() }}</h5>
                        <h5>Số danh bộ: {{ get_usrid() }}</h5>
                    </div>
                    <div class="row">
                        <div class="col md-2">
                            <p class="card-text">Chỉ số đầu chỉ số đầu: </p>
                        </div>
                        <div class="col md-4">
                            <p class="card-text"> {{chisocu}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col md-2">
                            <p class="card-text">Chỉ số đầu chỉ số cuối: </p>
                        </div>
                        <div class="col md-4">
                            <p class="card-text"> {{chisomoi}} </p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col md-2">
                            <p class="card-text">Số m3 đã sử dụng: </p>
                        </div>
                        <div class="col md-4">
                            <p class="card-text"> {{ chisomoi - chisocu }}</p>
                        </div>
                    </div>
                                    <div class="row ">
                        <div class="col md-2">
                            <p class="card-text">Thành tiền: </p>
                        </div>
                        <div class="col md-4">
                            <p class="card-text"> {{ hienthi }} <span>VNĐ</span></p>
                        </div>
                    </div>
                    <div id="payment">
                        <a href="#" class="btn btn-primary">Thanh toán</a>
                    </div>                </div>
                <div class="card-footer text-muted">
                    @copyright
                </div>
                <button class="btn-primary" @click="fetch_data()">Getdata</button>
            </div>
        </div>
    </div>
    <FooTer></FooTer>
</template>

<script>
import axios from 'axios'
import { format } from "date-fns"
import HeaderComponent from './header.vue'
import FooTer from '../components/footer.vue'

export default {
    name: 'UserPage',
    data: () => ({
        date: '',
        time: '',
        res: '',
        totalfee: 0,
        chisomoi: 0,
        chisocu: 0,
        res: '',
        date: '',
        reload: 0,
        infor: []
    }),
    computed: {
        hienthi () {
            this.totalfee = 4500 * (this.chisomoi - this.chisocu);
            return (this.totalfee.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,'))
        }
    },
    methods: {
        forceRerender() {
            this.reload += 1;
        },
        logout() 
            {
                localStorage.clear();
                this.$router.push('/login')
        },
        get_usrname(){
            return localStorage.getItem('user-infor');
        },
        get_usrid(){
            return localStorage.getItem('user-id');
        },
        printTime: function () {
            return new Date().toLocaleTimeString();
        },
        printDate: function () {
            return new Date().toLocaleDateString();
        },
        formatDate(strDate) {
        return format(new Date(strDate), "dd/MM/yyyy")
        },
        async getdata () {
            const result = await axios.get('https://io.adafruit.com/api/v2/ManhTran/feeds/smart-water-meter/data?limit=3')
            this.res = result.data;
            this.res.forEach(element => {
                var tmp = JSON.parse(element.value);
                let ndata = [];
                ndata[0] = tmp.DATE;
                ndata[1] = parseInt(tmp.LIT);
                this.infor.push(ndata);
            });
            this.forceRerender();
            this.update_data();
            console.log(this.infor);
        },
        update_data: function(){
            let n_data = '';
            let size = this.infor.length - 1;
            let m3 = (this.infor[size]);
            this.chisocu = m3[1];
            m3 = this.infor[0];
            this.chisomoi = m3[1];
            let tmp = this.res[0].value;
            if(this.infor.length > 30) this.infor = [];
        },
        fetch_data: function(){
            axios.post('http://localhost/php/index.php',{
                action: 'fetchdata',
            }).then(function(response){
                console.log(response.data);
            }).catch(function (error){
                console.log(error);
            });
        }
    },

    components: {
        FooTer,
        HeaderComponent,
    },
    mounted () {
        this.getdata();
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

div .row {
    margin-top: 10px;
    margin-bottom: 10px;
}

.card-header {
    text-align: center;
}

#time {
    text-align: center;
    margin-top: 5px;
    margin-bottom: 10px;
}

.card {
    width: inherit;
}

</style>