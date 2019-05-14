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
		    line-height: 60px;
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
		    line-height: 160px;
		  }
	</style>
</head>
<body>

	<div id="app">

		  <el-container style="height: 800px;">
		    <el-aside width="600px">
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
										  <el-col :span="6":index="menu.id +'-'+child.id+'-'+p.product_id"  v-for="p in child.children"  :key="p.product_id" :offset="2">
										    <el-card :body-style="{ padding: '0px' }">
										      <img :src="p.product_images" class="image" style="width: 100%;height:100px;">
										      <div style="padding: 14px;">
										        <span>{{p.product_name}}</span>
										        <div class="bottom clearfix">
										          <p class="time">{{p.unit_price}}$/{{p.unit_quantity}}</p>
										          <p class="time">For Sale:{{p.in_stock}}</p>
										          <el-button type="text" class="button">操作按钮</el-button>
										        </div>
										      </div>
										    </el-card>
										  </el-col>
										</el-row>
		
					        		<!-- </el-submenu> -->
					        	</el-submenu>
					        	
					        	<el-submenu :index="menu.id +'-'+menu.children.product_id" v-else-if="p.product_id" v-for="p in menu.children">
					        		<p>{{p}}</p>
					        		<template slot="title"></template>
					          			<el-row>
										  <el-col :span="6":index="menu.id +'-'+p.product_id" :key="p.product_id" :offset="2">
										    <el-card :body-style="{ padding: '0px' }">
										      <img :src="p.product_images" class="image" style="width: 100%;height:100px;">
										      <div style="padding: 14px;">
										        <span>{{p.product_name}}</span>
										        <div class="bottom clearfix">
										          <p class="time">{{p.unit_price}}$/{{p.unit_quantity}}</p>
										          <p class="time">For Sale:{{p.in_stock}}</p>
										          <el-button type="text" class="button">操作按钮</el-button>
										        </div>
										      </div>
										    </el-card>
										  </el-col>
										</el-row>
					        	</el-submenu>
					        	<el-menu-item v-else index="menu.id +'-'+child.id" v-show="!child.product_id">{{child.name}}</el-menu-item>
					        	</el-submenu>
					        
					    </el-menu>
					  </el-col>
					</el-row>
		    </el-aside>
		    <el-container>
		      <el-main>Main</el-main>
		      <el-footer>Footer</el-footer>
		    </el-container>
		  </el-container>
	</div>
</body>
<script type="text/javascript">
	var Main = {
	  data() {
	    return {
	    	menudata:  <?php echo $goods;?>
        }
	  },
	  methods: {
      		handleOpen(key, keyPath) {
        	console.log(key, keyPath);
	      },
	        handleClose(key, keyPath) {
	        console.log(key, keyPath);
	      }
      }
  }
	
var Ctor = Vue.extend(Main)
new Ctor().$mount('#app')
</script>
</html>
