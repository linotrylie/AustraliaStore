<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
		 .el-footer {
		    background-color: #B3C0D1;
		    color: #333;
		    text-align: center;

		  }
		  
		  .el-aside {
		    background-color: #D3DCE6;
		    color: #333;
		    text-align: center;

		  }
		  
		  .el-main {
		    background-color: #E9EEF3;
		    color: #333;
		  }
          #app{
              overflow-x: hidden;
              overflow-y: scroll;
          }
         #app::-webkit-scrollbar {
             display: none;
         }
         .bar-wrapper{
             width: 60%;
             height: 42px;
             position: fixed;
             bottom: 11px;
             z-index: 99;
         }
         .bar-wrapper .bar-right{
             float: right;
             color: #3c3c3c;
         }
         .bar-wrapper .bar-right strong{
             color: #900;
         }

         .bar-wrapper .bar-right .piece{
             float: left;
             min-width: 110px;
             margin-right: 20px;
             height: 50px;
             line-height: 50px;
         }
         .bar-wrapper .bar-right .piece .piece_num{
             display: inline-block;
             padding: 0 10px;
             font-weight: 700;
             font-size: 18px;
             font-family: tohoma,arial;
         }
         .bar-wrapper .bar-right .totalMoney{
             float: left;
             min-width: 100px;
             height: 50px;
             line-height: 50px;
         }
         .bar-wrapper .bar-right .totalMoney .total_text{
             float: right;
             font-weight: 400;
             font-size: 20px;
             font-family: Arial;
             vertical-align: middle;
             margin-right: 10px;
             margin-left: 15px;
         }
         .bar-wrapper .bar-right .calBtn{
             float: left;
         }
         .bar-wrapper .bar-right .calBtn a{
             display: block;
             width: 120px;
             height: 50px;
             color: #fff;
             background: #B0B0B0;
             cursor: not-allowed;
             font-size: 22px;
             letter-spacing: 5px;
             text-decoration: none;
             line-height: 50px;
             text-align: center;
             border-radius: 2px;
         }
         .bar-wrapper .bar-right .calBtn a.btn_sty{
             background: #ff873e;
             cursor: pointer;
         }
	</style>
</head>
<body>

	<div id="app">

		  <el-container style="height: 950px;">
		    <el-aside width="660px">
		    	<el-row class="tac">
					  <el-col :span="24">
					    <h5>Grocery Store</h5>
					    <el-menu
					      default-active="2"
					      class="el-menu-vertical-demo"
					      @open="handleOpen"
					      @close="handleClose" v-model="menudata" v-for="menu in menudata">

					      <el-submenu :index="menu.id">
					        <template slot="title">
					          <i class="el-icon-location"></i>
					          <span>{{menu.name}}</span>
					        </template>
					        <el-submenu :index="menu.id +'-'+child.id" v-if="menu.children" v-for="child in menu.children">
					        	<!-- <el-submenu :index="menu.id +'-'+child.id+'-'+c.product_id" v-if="child.children" v-for="c in child.children"> -->
					        		<template slot="title">{{child.name}}</template>
					          		
					          			<el-row>
										  <el-col :span="6":index="menu.id +'-'+child.id+'-'+p.product_id"  v-for="p in child.children"  :key="p.product_id" :offset="1">
										    <el-card :body-style="{ padding: '0px' }">
										      <img :src="p.product_images" class="image" style="width: 100%;height:100px;">
										      <div style="padding: 14px;">
										        <span>{{p.product_name}}</span>
										        <div class="bottom clearfix">
										          <p class="time">{{p.unit_price}}$/{{p.unit_quantity}}</p>
										          <p class="time">For Sale:{{p.in_stock}}</p>
										          <el-button type="text" class="button" @click="getContent(p)" >操作按钮</el-button>
										        </div>
										      </div>
										    </el-card>
										  </el-col>
										</el-row>
		
					        		<!-- </el-submenu> -->
					        	</el-submenu>
					        	
					        	<el-submenu :index="menu.id +'-'+p.product_id" v-else-if="!p.product_id" v-for="p in menu.children">
					        		<p>{{p}}</p>
					        		<template slot="title"></template>
					          			<el-row>
										  <el-col :span="6":index="menu.id +'-'+p.product_id" :key="p.product_id" :offset="1">
										    <el-card :body-style="{ padding: '0px' }">
										      <img :src="p.product_images" class="image" style="width: 100%;height:100px;">
										      <div style="padding: 14px;">
										        <span>{{p.product_name}}</span>
										        <div class="bottom clearfix">
										          <p class="time">{{p.unit_price}}$/{{p.unit_quantity}}</p>
										          <p class="time">For Sale:{{p.in_stock}}</p>
										          <el-button type="text" class="button" @click="getContent(p)">操作按钮</el-button>
										        </div>
										      </div>
										    </el-card>
										  </el-col>
										</el-row>
					        	</el-submenu>
					        	<el-menu-item v-else index="menu.id" >{{menu.name}}</el-menu-item>
					        	</el-submenu>
					        
					    </el-menu>
					  </el-col>
					</el-row>
		    </el-aside>
		    <el-container style="height:100%;">
		      <el-main style="height:600px;">
                  <div v-if="p">
                          <el-container >
                              <el-aside width="400px" height="300px">
                                      <el-image :src="p.product_images" style="width:100%;height:100%;border-radius: 30px;"></el-image>
                              </el-aside>
                              <el-main>
                                  <table style="width: 100%; height:100%;box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04);">
                                        <tr>
                                              <th>ProductName</th>
                                              <th>Price</th>
                                              <th>Quantity</th>
                                              <th>Stock</th>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <td>{{p.product_name}}</td>
                                            <td>{{p.unit_price}}$</td>
                                            <td>{{p.unit_quantity}}</td>
                                            <td>{{p.in_stock}}</td>
                                        </tr>
                                  </table>
                              </el-main>
                          </el-container>
                          <div style="width:100%">
                              <el-aside style="width:100%;height:400px;box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04);">

                                  <el-main style="height:260px;line-height:40px;margin-top:20px;text-align:left;">
                                      {{p.product_content}}
                                  </el-main>
                                  <el-button style="float:right;" @click="addCart(p)">ADD</el-button>
                              </el-aside>




                          </div>
                  </div>
                  <el-container v-else>
                      <el-main style="height:300px;line-height:160px;text-align:center;">
                          <h2>Welcome to My Store!</h2>
                      </el-main>
                  </el-container>
              </el-main>
                <el-footer style="height:400px;">
                    <tamplate >
                        <el-table :data="list.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))" border style="width: 100%; height:100%;" height="350" v-show="list.length" highlight-current-row>
                            <el-table-column fixed label="复选框" width="120" style="color:red" :render-header="renderHeader">
                                <template scope="scope">
                                    <el-checkbox v-model="scope.row.checked"></el-checkbox>
                                </template>
                            </el-table-column>
                            <el-table-column  prop="product_name" label="商品名称" width="180">
                            </el-table-column>
                            <el-table-column  prop="unit_price" label="商品价钱" width="180">
                            </el-table-column>
                            <el-table-column  label="商品数量" width="380">
                                <template scope="scope">
                                    <el-input-number v-model="scope.row.in_stock" controls-position="right" :min="1" :max="scope.row.number"></el-input-number>
                                </template>

                            </el-table-column>
                            <el-table-column fixed label="商品总价">
                                <template scope="scope">
                                    <div>{{scope.row.unit_price*scope.row.in_stock}}</div>

                                </template>
                            </el-table-column>
                            <el-table-column
                                    align="right">
                                <template scope="scope">
                                    <el-popover placement="top" width="280" v-model="scope.row.remove">
                                        <p>亲！确定删除此商品吗？</p>
                                        <div style="text-align: right; margin: 0">
                                            <el-button size="mini" type="text" @click="scope.row.remove=false">取消</el-button>
                                            <el-button type="primary" size="mini" @click="removeId(scope.row)">确定</el-button>
                                        </div>
                                        <el-button slot="reference">删除</el-button>
                                    </el-popover>

                                </template>
                                <template slot="header" slot-scope="scope">
                                    <el-input
                                            v-model="search"
                                            size="mini"
                                            placeholder="输入关键字搜索"/>
                                </template>

                            </el-table-column>

                        </el-table>
                    </tamplate>
                    <div v-show="list.length==0" style="font-size:20px;color:red;display:none">商品全部为空</div>

<!--                    <div>总价钱:<span>{{countList}}</span></div>-->
                    <div class="bar-wrapper">
                        <div class="bar-right">
                            <div class="piece">已选商品<strong class="piece_num">{{allnum}}</strong>件</div>
                            <div class="totalMoney">共计: <strong class="total_text">{{countList}}$</strong></div>
                            <el-button type="primary">Check Out</el-button>
                        </div>
                    </div>
                </el-footer>
		    </el-container>
		  </el-container>
	</div>
</body>
<script type="text/javascript">
	var Main = {
	  data() {
	    return {
	    	menudata:  <?php echo $goods;?>,
            list: [],
            count: 0,
            istrue: false,
            p:'',
            search:'',
            allnum:0
        }
	  },
        computed: {
            countList: function () {
                var a = 0;
                var b = 0;
                for (let i = 0; i < this.list.length; i++) {
                    if (this.list[i].checked == true) {
                        a += this.list[i].product_price * this.list[i].in_stock;
                        b += this.list[i].in_stock;
                    }
                }
                this.allnum = b;
                this.count = a;
                return this.count;
            }
        },
        watch: {
            istrue: function () {
                if (this.istrue == true) {
                    for (let k = 0; k < this.list.length; k++) {
                        this.list[k].checked = true;
                    }
                } else {
                    for (let k = 0; k < this.list.length; k++) {
                        this.list[k].checked = false;
                    }
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
          getContent:function(e){
      		this.p = e;
          }
          ,removeId(value) {
              var ids = value.id
              for (var i = 0; i < this.list.length; i++) {
                  if (ids == this.list[i].product_id) {
                      this.list.splice(i, 1)
                  }
              }
          },
          renderHeader: function (h, params) {//实现table表头添加
              var self = this;
              return h('div', [
                  h('el-checkbox', {
                      on: {
                          change: (i) => {
                              self.istrue = i;
                          }
                      }
                  }, '全选')
              ]);

          },
          addCart:function(e){
              a = this.list;
              var max = 0;
              for ( var i = 0; i < this.list.length;i++)
              {
                  if(e.product_id == this.list[i].product_id)
                  {
                      for ( var ii = 0; ii < this.menuData.length;ii++)
                      {
                          if(e.product_id == this.menuData[ii].product_id && this.list[i].product_id == this.menuData[ii].product_id)
                          {
                                max = e.in_stock + this.list[i].in_stock;
                                if(max > this.menuData[ii].in_stock){
                                    alert(e.product_name+'You buy more than you sell.');
                                }
                          }
                      }
                  }
              }
              let l = a.push(e);
          }
      }
  }
var Ctor = Vue.extend(Main)
new Ctor().$mount('#app')
</script>
</html>
