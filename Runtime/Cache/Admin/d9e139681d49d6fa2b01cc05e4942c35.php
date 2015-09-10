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

<!-- 下线 -->
<div class="modal fade bs-example-modal-sm" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" id="confirm_modal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div  id="confirm_body" class="modal-body" >
      	<p class="text-danger" style="padding:10px 0 00px 0" id="confirm_title"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary btn-sm" id="song_off">下线</button>
      </div>
    </div>
  </div>
</div>
<!-- 下线 --> 

<!-- 歌词 -->
<div class="modal fade" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" id="pop_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
     	 <h4 class="modal-title" id="pop_header"></h4>
      </div>
      <iframe  id="pop_body" class="modal-body" frameborder="0" src="" width="100%" height="520px" ></iframe>
    </div>
  </div>
</div>
<!-- 歌词 --> 

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">音乐管理<div class="pull-right" style="margin-top:11px">
    	<select class="form-control" style="width: 100px; float:left; height:28px; line-height:28px; padding:2px"><option>所有 40</option><option>已上线 35</option><option>审核中 3</option><option>未提交 1</option><option>已下线 1</option></select>
    	<!--<div class="form-group input-group" style="width:270px; float:right">
            <input type="text" class="form-control" placeholder="歌名">
            <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
        </div>--></div></h1><br />
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th width="15%">歌曲名称</th>
            <th width="10%">专辑名称</th>
            <th width="5%">歌词</th>            
            <th width="80">专辑封面</th>
            <th width="30%">音档试听</th>         
            <th >更新时间</th>
            <th width="8%">状态</th>               
            <th width="10%">操作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a data-toggle="tooltip" data-placement="right" title="代表作">我的名字叫做安</a></td>
            <td>难得</td>
            <td><a href="javascript:;" class="pre_lrc" url="huaxin.lrc" title="《难得》歌词">预览</a></td>            
            <td><img src="http://cdn.wawa.fm/group1/M00/00/B0/wKjHx1Q4qMqAGqskAAAMCam74Do391.jpg" width="70" style="margin:0 5px"></td>
            <td><audio controls preload="none" src="http://cdn.wawa.fm/group1/M00/00/0E/CvrcZ1UsueOADNgGADnGWLB7Vjw783.mp3" style="width:94%; margin:0 3%"></audio></td>
            <td>2015-05-23 23:00:00</td>
            <td sid="12123">审核中</td>
			<td><a class="song_edit" sid="123123">修改</a>&nbsp;<a href="javascript:;" class="put_off" title="难得" sid="12123">下线</a></td>
          </tr>
          <tr>
            <td>我的名字叫做安</td>
            <td>难得</td>
            <td><a >预览</a></td>            
            <td><img src="http://cdn.wawa.fm/group1/M00/00/B0/wKjHx1Q4qMqAGqskAAAMCam74Do391.jpg" width="70" style="margin:0 5px"></td>
            <td><audio controls preload="none" src="http://cdn.wawa.fm/group1/M00/00/0E/CvrcZ1UsueOADNgGADnGWLB7Vjw783.mp3" style="width:94%; margin:0 3%"></audio></td>
            <td>2015-05-23 23:00:00</td>
            <td>审核中</td>
			<td><a>修改</a>&nbsp;<a>下线</a></td>
          </tr>
          <tr>
            <td>我的名字叫做安</td>
            <td>难得</td>
            <td><a>预览</a></td>            
            <td><img src="http://cdn.wawa.fm/group1/M00/00/B0/wKjHx1Q4qMqAGqskAAAMCam74Do391.jpg" width="70" style="margin:0 5px"></td>
            <td><audio controls preload="none" src="http://cdn.wawa.fm/group1/M00/00/0E/CvrcZ1UsueOADNgGADnGWLB7Vjw783.mp3" style="width:94%; margin:0 3%"></audio></td>
            <td>2015-05-23 23:00:00</td>
            <td>审核中</td>
			<td><a>修改</a>&nbsp;<a>下线</a></td>
          </tr>                    
        </tbody>
      </table>
    </div>
  </div>
</div>



<script>

$(function(){
	
	$('[data-toggle="tooltip"]').tooltip();
	
	var pop_header = $("#pop_header");
	var pop_body = $("#pop_body");
	var pop_modal = $("#pop_modal");
	var confirm_modal = $("#confirm_modal");		
	var confirm_title = $("#confirm_title");
	var song_off = $("#song_off");
	
	$(document).on("click", ".pre_lrc", function(){
		var that = $(this);
		pop_header.html(that.attr("title"));
		pop_body.attr("src", that.attr("url"));
		pop_modal.modal();
		return false;
	}).on("click", ".put_off", function(){
		var that = $(this);
		confirm_title.html("您确认将歌曲《"+ that.attr('title') +"》下线？"+"<p style='color:#333; margin-top:18px; font-size:12px'>下线需要审核通过后才能生效，提交后我们将会在一个工作日内进行审核。</p>");
		song_off.attr("sid", that.attr("sid"));
		confirm_modal.modal();
		return false;
	}).on("click", "#song_off", function(){
		
		return false;	
	}).on("click", ".song_edit", function(){
		window.location.href = "index.html#music_edit";
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