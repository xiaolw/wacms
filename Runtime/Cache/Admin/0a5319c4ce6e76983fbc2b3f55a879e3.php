<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>挖哇音乐人平台</title>

		<!-- Bootstrap Core CSS -->
		<link href="/wacms/Public/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="/wacms/Public/css/sb-admin.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="/wacms/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

		<!-- jQuery -->
		<script src="/wacms/Public/js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="/wacms/Public/js/bootstrap.js"></script>

		<!-- common JavaScript -->
		<script src="/wacms/Public/js/common.js"></script>
	</head>

	<body>
		<div id="wrapper">

			<!-- 菜单 -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- 响应式导航 -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand logo" href="<?php echo U('Index/index');?>" title="1">挖哇音乐人平台</a> </div>
				<!-- 响应式导航 -->
				<!-- 顶部导航 -->
				<ul class="nav navbar-right top-nav">
					<li class="dropdown"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user"></i> 【<?php echo (session('user_auth_username')); ?>】 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li> <a id="userinfo" href="<?php echo U('Index/userinfo');?>"><i class="fa fa-fw fa-user"></i> 个人资料</a> </li>
							<li> <a id="updatepassword" href="<?php echo U('Index/updatepassword');?>"><i class="fa fa-fw fa-lock"></i> 修改密码</a> </li>
							<li> <a id="userlogout" href="<?php echo U('Public/logout');?>"><i class="fa fa-fw fa-power-off"></i> 注销</a> </li>
						</ul>
					</li>
				</ul>
				<!-- 顶部导航 -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav" id="navs">
						<li> <a id="index" href="<?php echo U('Index/index');?>" class="link"><i class="fa fa-fw fa-dashboard"></i> 控制面板</a> </li>
						<li> <a href="javascript:;" data-toggle="collapse" data-target="#music"><i class="fa fa-fw fa-music"></i> 音乐管理</a>
							<ul id="music" class="collapse">
								<li> <a id="trackadd" href="<?php echo U('Index/trackadd');?>" class="link">发布音乐</a> </li>
								<li> <a id="tracklist" href="<?php echo U('Index/tracklist');?>" class="link"> 音乐管理</a> </li>
							</ul>
						</li>
						<li> <a href="javascript:;" data-toggle="collapse" data-target="#info"><i class="fa fa-fw fa-bullhorn"></i> 公告服务</a>
							<ul id="info" class="collapse">
								<li> <a id="noticeadd" href="<?php echo U('Index/noticeadd');?>" class="link">发布公告</a> </li>
								<li> <a id="noticelist" href="<?php echo U('Index/noticelist');?>" class="link"> 公告管理</a> </li>
							</ul>
						</li>
						<li> <a href="javascript:;" data-toggle="collapse" data-target="#ads"><i class="fa fa-fw fa-desktop"></i> 广告服务</a>
							<ul id="ads" class="collapse">
								<li> <a id="advertadd" href="<?php echo U('Index/advertadd');?>" class="link">发布广告</a> </li>
								<li> <a id="advertlist" href="<?php echo U('Index/advertlist');?>" class="link"> 广告管理</a> </li>
							</ul>
						</li>
						<li> <a href="javascript:;" data-toggle="collapse" data-target="#data"><i class="fa fa-fw fa-bar-chart" class="href"></i> 数据统计</a>
							<ul id="data" class="collapse">
								<li> <a id="trackscount" href="<?php echo U('Index/trackscount');?>" class="link"> 音乐播放量</a> </li>
								<li> <a id="trackcount" href="<?php echo U('Index/trackcount');?>" class="link"> 单曲播放量</a> </li>
								<li> <a id="noticecount" href="<?php echo U('Index/noticecount');?>" class="link"> 公告浏览量</a> </li>
								<li> <a id="advertcount" href="<?php echo U('Index/advertcount');?>" class="link"> 广告浏览量</a> </li>
							</ul>
						</li>
						<li> <a id="account" href="<?php echo U('Index/account');?>" class="link"><i class="fa fa-fw fa-rmb" class="href"></i> 结算管理</a> </li>
					</ul>
				</div>
				<!-- 侧边栏 -->
			</nav>
			<!-- 菜单 -->

			<!-- 内容 -->
			<div id="page-wrapper">
				<div id="page" class="container-fluid"></div>
				<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> <a>宋冬野</a> <a href="<?php echo U('Index/useredit');?>" class="pull-right add_music s_btn href" id="user_edit"><i class="fa fa-fw fa-edit"></i>编辑资料</a></h1>
  </div>
</div>
<div id="alerts" class="alert alert-warning" role="alert" style="display:none" ></div>
<div class="row">
  <div class="col-lg-12">
    <ul class="list-unstyled user_info">
      <li>
        <label>性别</label>
        男</li>
      <li>
        <label>地区</label>
        中国北京</li>
      <li>
        <label>角色</label>
        独立音乐人</li>
      <li>
        <label>电话</label>
        1358565390</li>
      <li>
        <label>邮箱</label>
        dskkilw@163.com</li>
      <li>
        <label>签约状态</label>
        摩登天空</li>
      <li>
        <label>简介</label>
        爱上一匹野马，可我家里没有草原。</li>
    </ul>
    <br />
    <br />
    <br />
    <br />
  </div>
</div>

			</div>
			<!-- 内容 -->

			<script>
				$(function() {
					var url = window.location.href;
					var page = url.replace(/(.*\/)*([^.]+).*/ig, "$2");
					$("a.link").each(function(index) {
						var that = $(this);
						if (that.attr("id") == "account") {
							that.parent("li").addClass("curs").parent("ul").addClass("in");
							return false;
						}
					});
				})
			</script>
	</body>

</html>