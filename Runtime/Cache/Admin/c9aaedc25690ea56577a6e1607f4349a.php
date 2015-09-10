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
					<li class="dropdown"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user"></i> 【用户名】 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li> <a id="userinfo" href="<?php echo U('Index/userinfo');?>"><i class="fa fa-fw fa-user"></i> 个人资料</a> </li>
							<li> <a id="updatepassword" href="<?php echo U('Index/updatepassword');?>"><i class="fa fa-fw fa-lock"></i> 修改密码</a> </li>
							<li> <a id="userlogout" href="javascript:;"><i class="fa fa-fw fa-power-off"></i> 注销</a> </li>
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
				<!-- 顶部导航 -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> 发布广告</h1>
    <br />
  </div>
</div>
<!-- 顶部导航 --> 
<!-- 错误提示 -->
<div id="alerts" class="alert alert-warning" role="alert" style="display:none"></div>
<!-- 错误提示 --> 
<!-- 编辑资料 -->
<div class="row">
  <div class="col-lg-6">
    <form id="form" role="form">
      <div class="form-group">
        <label>标题</label>
        <input id="old_pwd" class="form-control"  type="text" desc="标题" rule="full" tip="请填写公告标题">
        <p class="help-block hiddens">请填写公告标题</p>
      </div>
      <div class="form-group">
        <label>公告配图</label>
        <div class="form-upload">
        	<div class="upload-body" id="pre_pic" draggable="true" ><h5 class="text-center text-info">可将图片文件拖致此处上传</h5></div>
            <div class="upload-footer">
                <input id="song_pic" name="song_pic" type="file" class="file_input" isfull="0" target="#pre_pic" value=""  desc="公告配图">
        		<p class="help-block pull-left">仅限png、jpg格式， 540px*360px</p>
                <button type="button" class="btn btn-xs upload_btn btn-primary upload_file" target="#song_pic">上传</button><button type="button" class="btn btn-xs upload_btn btn-default select_file" target="#song_pic">选择文件</button>
            </div>
        </div>
      </div>  
      <div class="form-group">
        <label>链接页面</label>
        <input id="new_pwds" class="form-control" type="text"  desc="链接页面" rule="full" tip="请填写您的链接URL">
        <p class="help-block  hiddens">请填写您的链接URL</p>
      </div>
      <div class="form-group">
        <label>简介</label>
        <textarea id="desc" class="form-control" rows="3" data-toggle="tooltip" data-placement="top" title="选填，限制100中文字以内"></textarea>
      </div>           
      <br />
      <button id="btn" type="submit" class="btn btn-primary" data-loading-text="Loading...">提交</button>
      <br />
      <br />
    </form>
  </div>
  <div class="col-lg-6"></div>
</div>
<!-- 编辑资料 --> 

<!-- page --> 
<script>
$(function(){

		var old_pwd = $("#old_pwd");
		var new_pwd = $("#new_pwd");
		var new_pwds = $("#new_pwds");
		var btn = $("#btn");
		var input = $("input");
		
		window.input_focus(input);

		$("#form").on("submit", function(){
			
			$("#alerts").hide();	
			if(!window.input_validate(input)){
				return false;	
			}
			
			if(new_pwd.val() != new_pwds.val()){
				window.result(2,"新密码和重复新密码不一致");
				return false;
			}

/*			window.btn_submit({
				"type": "post",
				"data": {"old_pwd":old_pwd.val(), "new_pwd": old_pwd.val(), "new_pwds":new_pwds.val()},
				"url":"",
				"fnSuccess": function(){
					alert(123123);	
				}
			})*/

			return false;

		})
		
})
</script> 
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