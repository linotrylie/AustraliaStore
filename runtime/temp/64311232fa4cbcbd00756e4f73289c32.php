<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\wwwroot\AustraliaStore\public_html/../application/index\view\index\index.html";i:1557835889;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
	<!-- import Vue before Element -->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<!-- import JavaScript -->
	<script src='https://unpkg.com/axios@0.18.0/dist/axios.min.js'></script>
	<script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<style type="text/css">
		.el-header, .el-footer {
	    background-color: #B3C0D1;
	    color: #333;
	    text-align: center;
		line-height:80px;
	  }
		.el-header{
			font-size:24px;
		}
	  
	  .el-aside {
	    background-color: #D3DCE6;
	    color: #333;
	    text-align: center;

	  }
	  
	  .el-main {
	    background-color: #E9EEF3;
	    color: #333;
	    text-align: center;
	    height: 100%;
	  }
	 .el-menu-vertical-demo:not(.el-menu--collapse) {
	    width: 200px;
	    min-height: 400px;
	  }
	  body > .el-container {
            margin: auto 0 auto 0;
            height: 762px;
        }
      .el-menu--collapse{
      	width: 199px;
      	height: 760px;
      }
		.time {
			font-size: 13px;
			color: #999;
		}

		.bottom {
			margin-top: 13px;
			line-height: 12px;
		}

		.button {
			padding: 0;
			float: right;
		}

		.image {
			width: 100%;
			display: block;
		}

		.clearfix:before,.clearfix:after {
			display: table;
			content: "";
		}

		.clearfix:after {
			clear: both
		}
        .el-col-8 {
            width: 15%;
        }
	</style>
</head>
<body>
	<div id="app">
		
		<el-container>
		  <el-header height="100px">Grocery Store</el-header>
		  <el-container>
		    <el-aside style="width: 200px;height: 760px;">
					<el-menu default-active="1-4-1" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
					  <el-submenu index="1">
					    <template slot="title">
					      <i class="">鱼肉</i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-submenu index="1-1">
					      <span slot="title">选项4</span>
					      <el-menu-item index="1-1-1" @click="getGoods" >选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu>
					</el-menu>

		    </el-aside>
		    <el-container >
		      <el-main style="height: 762px;">
				  <el-row >
					  <el-col :span="8" v-for="good in goods"  :offset="0">
						  <el-card style="padding: 20px;margin-top:10px;margin-left:10px;">
							  <img :src="good.img" class="image">
							  <div style="padding: 14px;">
								  <span>{{good.name}}</span>
								  <div class="bottom clearfix">
									  <time class="time">{{ good.date }}</time>
									  <p>{{ good.price }}</p>
                                      <el-popover
                                              placement="right"
                                              width="800"
                                              height="800"
                                              trigger="click">
                                          <img :src="goodData.img" class="image" style="float:left;">
                                          <p>{{goodData.name}}</p>
                                          <p>{{goodData.price}}</p>
                                          <el-button slot="reference" class="button" type="primary">Check</el-button>
                                      </el-popover>
                                      <el-button  class="button" type="primary">Add</el-button>

								  </div>
							  </div>
						  </el-card>
					  </el-col>
				  </el-row>
			  </el-main>
		      <el-footer style="height:100px;">
                  <span style="margin-left:-580px;">总价：${{totalPrice()}}<span>
                      <span style="margin-left:240px;"><el-button type="primary">购物车</el-button></span>
			  </el-footer>
		    </el-container>
		  </el-container>
		</el-container>
	</div>
</body>
<script type="text/javascript">
	var Main = {
	  data() {
	    return {
	      isCollapse: true,
            goods:[
                {name:'火鸡',price:123,date:'2019-05-14',img:'http://img.qa.douguo.com/upload/caiku/e/e/1/690x390_ee5a7c73df44cf5389584745bea243f1.jpg'},
                {name:'火鸡',price:123,date:'2019-05-14',img:'http://img.qa.douguo.com/upload/caiku/e/e/1/690x390_ee5a7c73df44cf5389584745bea243f1.jpg'},
                {name:'火鸡',price:123,date:'2019-05-14',img:'http://img.qa.douguo.com/upload/caiku/e/e/1/690x390_ee5a7c73df44cf5389584745bea243f1.jpg'},
                {name:'火鸡',price:123,date:'2019-05-14',img:'http://img.qa.douguo.com/upload/caiku/e/e/1/690x390_ee5a7c73df44cf5389584745bea243f1.jpg'},
                {name:'火鸡',price:123,date:'2019-05-14',img:'http://img.qa.douguo.com/upload/caiku/e/e/1/690x390_ee5a7c73df44cf5389584745bea243f1.jpg'},
			],
            goodData:{
	          name:'火鸡',price:123,date:'2019-05-14',img:'http://img.qa.douguo.com/upload/caiku/e/e/1/690x390_ee5a7c73df44cf5389584745bea243f1.jpg'
            }

        }
	  },
	  methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      },
	  totalPrice : function(){
                  var totalP = 0;
                  // for (var i = 0,len = this.Ip_Json.length;i<len;i++) {
                  //     totalP+=this.Ip_Json[i].price*this.Ip_Json[i].count;
                  // }
                  return totalP;
              }
        }
	}
var Ctor = Vue.extend(Main)
new Ctor().$mount('#app')
</script>
</html>
