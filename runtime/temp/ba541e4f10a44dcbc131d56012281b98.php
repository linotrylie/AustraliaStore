<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"F:\Code\AustraliaStore\public_html/../application/index\view\index\index.html";i:1557768322;}*/ ?>
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
	<style type="text/css">
		.el-header, .el-footer {
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
	</style>
</head>
<body>
	<div id="app">
		
		<el-container>
		  <el-header height="100px">Header</el-header>
		  <el-container>
		    <el-aside style="width: 200px;height: 760px;">
					<el-menu default-active="1-4-1" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
					  <el-submenu index="1">
					    <template slot="title">
					      <i class="">鱼肉</i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-menu-item-group>
					      <span slot="title">分组一</span>
					      <el-menu-item index="1-1">选项1</el-menu-item>
					      <el-menu-item index="1-2">选项2</el-menu-item>
					    </el-menu-item-group>
					    <el-menu-item-group title="分组2">
					      <el-menu-item index="1-3">选项3</el-menu-item>
					    </el-menu-item-group>
					    <el-submenu index="1-4">
					      <span slot="title">选项4</span>
					      <el-menu-item index="1-4-1">选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu>
					 <el-submenu index="2">
					    <template slot="title">
					      <i class="">鱼肉</i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-menu-item-group>
					      <span slot="title">分组一</span>
					      <el-menu-item index="2-1">选项1</el-menu-item>
					      <el-menu-item index="2-2">选项2</el-menu-item>
					    </el-menu-item-group>
					    <el-menu-item-group title="分组2">
					      <el-menu-item index="2-3">选项3</el-menu-item>
					    </el-menu-item-group>
					    <el-submenu index="2-4">
					      <span slot="title">选项4</span>
					      <el-menu-item index="2-4-1">选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu>
					  <el-submenu index="3">
					    <template slot="title">
					      <i class="">鱼肉</i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-menu-item-group>
					      <span slot="title">分组一</span>
					      <el-menu-item index="3-1">选项1</el-menu-item>
					      <el-menu-item index="3-2">选项2</el-menu-item>
					    </el-menu-item-group>
					    <el-menu-item-group title="分组2">
					      <el-menu-item index="3-3">选项3</el-menu-item>
					    </el-menu-item-group>
					    <el-submenu index="3-4">
					      <span slot="title">选项4</span>
					      <el-menu-item index="3-4-1">选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu>
					  <el-submenu index="4">
					    <template slot="title">
					      <i class="">鱼肉</i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-menu-item-group>
					      <span slot="title">分组一</span>
					      <el-menu-item index="4-1">选项1</el-menu-item>
					      <el-menu-item index="4-2">选项2</el-menu-item>
					    </el-menu-item-group>
					    <el-menu-item-group title="分组2">
					      <el-menu-item index="4-3">选项3</el-menu-item>
					    </el-menu-item-group>
					    <el-submenu index="4-4">
					      <span slot="title">选项4</span>
					      <el-menu-item index="4-4-1">选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu><el-submenu index="5">
					    <template slot="title">
					      <i class="">鱼肉</i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-menu-item-group>
					      <span slot="title">分组一</span>
					      <el-menu-item index="5-1">选项1</el-menu-item>
					      <el-menu-item index="5-2">选项2</el-menu-item>
					    </el-menu-item-group>
					    <el-menu-item-group title="分组2">
					      <el-menu-item index="5-3">选项3</el-menu-item>
					    </el-menu-item-group>
					    <el-submenu index="5-4">
					      <span slot="title">选项4</span>
					      <el-menu-item index="5-4-1">选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu>
					</el-menu>

		    </el-aside>
		    <el-container >
		      <el-main style="height: 762px;">Main</el-main>
		      <el-footer>Footer</el-footer>
		    </el-container>
		  </el-container>
		</el-container>
	</div>
</body>
<script type="text/javascript">
	var Main = {
	  data() {
	    return {
	      isCollapse: true
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