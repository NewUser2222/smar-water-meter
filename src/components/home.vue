<template>
  <HeaderComponent></HeaderComponent>
  <NavBar></NavBar>
  <div class="container-fluid">
    <div id="search-receipt">
      <label id="label" for="search-receipt">Tra cứu tiền nước - Chỉ số nước</label>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Số danh bộ..." aria-label="" aria-describedby="basic-addon1">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">Tra cứu</button>
        </div>
      </div>
    </div>
    <div class="news">
      <p></p>
    </div>
    <div class="pay" id="hd-pay">
      <p id="hd-label">HƯỚNG DẪN THANH TOÁN TIỀN NƯỚC</p>
      <div>
        <div id="st-pay">
          <p id="st-name">Thanh toán tại <br> <span>điểm thanh toán</span></p>
        </div>
        <div id="nd-pay">
          <p id="nd-name">Thanh toán <br> <span> trực tuyến</span></p>

        </div>
        <div class="clear"></div>
      </div>
    </div>
    <FooTer></FooTer>
  </div>
</template>

<script>

import HeaderComponent from './header.vue'
import NavBar from './navbar.vue'
import FooTer from "./footer.vue"

export default {
  name: 'HomePage',
  components: {
    HeaderComponent,
    NavBar,
    FooTer,
  }
}
</script>

<style scoped>

.container-fluid {
  background-color: beige;
  margin: 0px;
  padding: 0px;
}

#search-receipt {
  width: 40vw;
  margin: auto;
  padding: 20px 0px 20px;
}

label {
  font-size: 18px;
  font-weight: bold;
  color: darkgoldenrod;
}


#hd-pay {
  text-align: center;
}

#hd-label {
  font-size: 300%;
  font-weight: bold;
  color: darkgoldenrod;
}

#st-pay {
  background-color: hsl(221, 93%, 43%);
  position: relative;
  display: inline-block;
  width: 150px;
  height: 150px;
  margin: 10px;
  margin-right: 80px;
  border-radius: 100px;
}

#st-name {
  color: white;
  position: absolute;
  margin-top: 50px;
  margin-left: 12px;
  font-weight: bold;
}

#nd-name {
  color: white;
  position: absolute;
  margin-top: 50px;
  margin-left: 30px;
  font-weight: bold;
}

#nd-pay {
  background-color: hsl(221, 93%, 43%);
  position: relative;
  display: inline-block;
  width: 150px;
  height: 150px;
  margin: 10px;
  margin-left: 80px;
  border-radius: 100px;
}

#st-pay:hover {
  color:  darkgoldenrod;
  background-color: blue;
  cursor: pointer;
  border: 5px solid darkgoldenrod;
}

#nd-pay:hover {
  color:  darkgoldenrod;
  background-color: blue;
  cursor: pointer;
  border: 5px solid darkgoldenrod;
}

.clear {
  clear: both;
}

</style>
