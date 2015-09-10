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
		<h1 class="page-header"> 编辑资料</h1>
		<br />
	</div>
</div>
<div id="alerts" class="alert alert-warning" role="alert" style="display:none"> </div>
<div class="row">
	<div class="col-lg-6">
		<form id="form">
			<div class="form-group">
				<label>常用艺名</label>
				<input type="hidden" id="uid" >
				<input id="nickname" class="form-control input" value="小小" rule="full" desc="常用艺名" tip="如果是乐队请填写乐队名">
				<p class="help-block hiddens">如果是乐队请填写乐队名</p>
			</div>
			<div class="form-group">
				<label>地区</label>
				<select class="form-control mb5" id="pos_province">
					<option>广东</option>
				</select>
				<select class="form-control" id="pos_city">
					<option>广州</option>
				</select>
			</div>
			<div class="form-group">
				<label>性别&nbsp;&nbsp;</label>
				<label class="radio-inline">
					<input type="radio" name="sex" class="sex" value="1" checked=""> 男 </label>
				<label class="radio-inline">
					<input type="radio" name="sex" class="sex" value="2"> 女 </label>
				<label class="radio-inline">
					<input type="radio" name="sex" class="sex" value="0"> 乐队组合 </label>
			</div>
			<div class="form-group">
				<label>角色&nbsp;&nbsp;</label>
				<label class="radio-inline">
					<input type="radio" name="role" class="u_role" value="独立音乐人" checked=""> 独立音乐人
				</label>
				<label class="radio-inline">
					<input type="radio" name="role" class="u_role" value="乐队代表"> 乐队代表 
				</label>
			</div>
			<div class="form-group">
				<label>电话</label>
				<input id="tel" class="form-control input" value="1367871002" rule="phone" desc="电话" tip="仅用于方便联系，我们保证不会泄露您的电话号码">
				<p class="help-block hiddens">仅用于方便联系，我们保证不会泄露您的电话号码</p>
			</div>
			<div class="form-group">
				<label>邮箱</label>
				<input id="email" class="form-control input" value="dkko23@163.com" rule="email" desc="邮箱" tip="请确认邮箱的准确性，审核完成后会以邮件形式通知您">
				<p class="help-block hiddens">请确认邮箱的准确性，审核完成后会以邮件形式通知您</p>
			</div>
			<div class="form-group">
				<label>签约状态&nbsp;&nbsp;</label>
				<label class="radio-inline">
					<input type="radio" class="sig_status" name="sign" id="indie" value="独立音乐人" checked=""> 独立音乐人 </label>
				<label class="radio-inline" data-toggle="tooltip" data-placement="top" title="选择此项请填写您的公司名称">
					<input type="radio" class="sig_status" name="sign" id="companys" value=""> 厂牌／唱片公司 </label>
				<input id="company_name" class="form-control input" value="摩登天空" style="display:none">
				<p class="help-block hiddens"></p>
			</div>
			<div class="form-group">
				<label>简介</label>
				<textarea id="signature" class="form-control" rows="3" data-toggle="tooltip" data-placement="top" title="选填，限制100中文字以内">爱上一匹野马，可我的家里没有草原</textarea>
			</div>
			<br />
			<button id="btn" type="submit" class="btn btn-warning">确认</button>
			<br />
			<br />
		</form>
	</div>
	<div class="col-lg-6"></div>
</div>
<div class="modal fade" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" id="check_form">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">个人资料</h4>
			</div>
			<div class="modal-body" style="margin-left:20px">
				<ul class="list-unstyled user_info">
					<li>
						<label>艺名</label>
						<a id="name"></a>
					</li>
					<li>
						<label>性别</label>
						<a id="sex"></a>
					</li>
					<li>
						<label>地区</label>
						<a id="site"></a>
					</li>
					<li>
						<label>角色</label>
						<a id="role"></a>
					</li>
					<li>
						<label>电话</label>
						<a id="phone"></a>
					</li>
					<li>
						<label>邮箱</label>
						<a id="email"></a>
					</li>
					<li>
						<label>签约状态</label>
						<a id="sign"></a>
					</li>
					<li style="height:80px; position:relative">
						<label style="height:60px;">简介</label>
						<p id="descs" style="position:absolute; left:80px; top:0; height:60px; width:420px; color:#337ab7;"></p>
					</li>
				</ul>
			</div>
			<div class="modal-footer"><small class="pull-left mt5 text-info">提交后会在2个工作日内进行审核，审核通过后才能生效</small>
				<button type="button" class="btn btn-default" data-dismiss="modal">重新编辑</button>
				<button type="button" class="btn btn-primary" id="submit">提交</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		var $company_name = $("#company_name");
		var $company = $("#companys");
		var $input = $("input.input");
		var $indie = $("#indie");
		var $btn = $("#btn");
		var $submit = $("#submit");
		var $check_form = $("#check_form");
		var $data = '';
		window.input_focus(input);
		$('[data-toggle="tooltip"]').tooltip();
		$indie.on("click", function() {
			$company_name.hide();
			return false;
		});
		$company.on("click", function() {
			$company_name.fadeIn();
			return false;
		});
		$company_name.on("blur", function() {
			if ($(this).val() == '') {
				$indie.trigger("click");
				return false;
			}
		})
		if ($company.attr("checked")) {
			$company_name.fadeIn();
		}
		$btn.on("click", function() {
			$("#alerts").hide();
			if (!window.input_validate(input)) {
				return false;
			}
			data = {
				"uid": $("#uid").val(),
				"nickname": $("#nickname").val(),
				"pos_province": $("#pos_province").find("option:selected").text(),
				"pos_city": $("#pos_city").find("option:selected").text(),
				"sex": $(".sex:checked").val(),
				"u_role": $(".u_role:checked").val(),
				"tel": $("#tel").val(),
				"email": $("#email").val(),
				"sig_status": $(".sig_status:checked").val() != '' ? $(".sig_status:checked").val() : $company_name.val(),
				"signature": $("#signature").val().replace(/(^\s*)|(\s*$)/g, "")
			}
			$("#name").html(data["name"]);
			$("#site").html(data["pos_province"]+data["pos_city"]);
			$("#sex").html(data["sex"]);
			$("#role").html(data["u_role"]);
			$("#phone").html(data["tel"]);
			$("#email").html(data["email"]);
			$("#sign").html(data["sign"]);
			$("#descs").html(data["signature"]);
			$('#check_form').modal();
			return false;
		})
		$submit.on("click", function() {
			check_form.modal('hide')
			window.btn_submit({
				"btn": $submit,
				"type": "post",
				"data": data,
				"url": "test.php",
				"fnSuccess": function(data) {
					if (1) { //成功
						window.result(1, "资料已经提交，我们将会尽快进行审核。", "index.html#user_info");
						return false;
					} else { //失败
						window.result(3, "修改失败");
						return false;
					}
				},
			})
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