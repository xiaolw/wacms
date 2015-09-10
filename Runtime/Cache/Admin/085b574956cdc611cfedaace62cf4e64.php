<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>挖哇音乐人平台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/oxwawa/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/oxwawa/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS 表格 -->
    <!--<link href="css/plugins/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="/oxwawa/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <!-- jQuery -->
    <script src="/oxwawa/Public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/oxwawa/Public/js/bootstrap.js"></script>

    <!-- common JavaScript -->
    <script src="/oxwawa/Public/js/common.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">

    <!-- 菜单 -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- 响应式导航 -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand logo" href="index.html">挖哇音乐人平台</a> </div>
        <!-- 响应式导航 -->
        <!-- 顶部导航 -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user"></i> 【<?php echo (session('user_auth_username')); ?>】 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li> <a id="user_info" href="user_info.html" class="href"><i class="fa fa-fw fa-user"></i> 个人资料</a> </li>
                    <li> <a id="pwd_edit" href="pwd_edit.html" class="href"><i class="fa fa-fw fa-lock"></i> 修改密码</a> </li>
                    <li> <a id="user_logout" href="<?php echo U('Public/logout');?>" ><i class="fa fa-fw fa-power-off"></i> 注销</a> </li>
                </ul>
            </li>
        </ul>
        <!-- 顶部导航 -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav" id="navs">
                <li> <a id="main" href="main.html" class="href"><i class="fa fa-fw fa-dashboard"></i> 控制面板</a> </li>
                <li> <a href="javascript:;" data-toggle="collapse" data-target="#music"><i class="fa fa-fw fa-music"></i> 音乐管理</a>
                    <ul id="music" class="collapse">
                        <li> <a id="music_add" href="music_add.html" class="href">发布音乐</a> </li>
                        <li> <a id="music_list" href="music_list.html" class="href"> 音乐管理</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:;"data-toggle="collapse" data-target="#info"><i class="fa fa-fw fa-bullhorn"></i> 公告服务</a>
                    <ul id="info" class="collapse">
                        <li> <a id="info_add" href="info_add.html" class="href">发布公告</a> </li>
                        <li> <a id="info_list" href="info.list.html" class="href"> 公告管理</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:;"data-toggle="collapse" data-target="#ads"><i class="fa fa-fw fa-desktop"></i> 广告服务</a>
                    <ul id="ads" class="collapse">
                        <li> <a id="ads_add" href="ads_add.html" class="href">发布广告</a> </li>
                        <li> <a id="ads_list" href="ads_list.html" class="href"> 广告管理</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:;"data-toggle="collapse" data-target="#data"><i class="fa fa-fw fa-bar-chart" class="href"></i> 数据统计</a>
                    <ul id="data" class="collapse">
                        <li> <a id="musics_data" href="musics_data.html" class="href"> 音乐播放量</a> </li>
                        <li> <a id="music_data" href="music_data.html" class="href"> 单曲播放量</a> </li>
                        <li> <a id="info_data" href="info_data.html" class="href"> 公告浏览量</a> </li>
                        <li> <a id="ads_data" href="ads_data.html" class="href"> 广告浏览量</a> </li>
                    </ul>
                </li>
                <li> <a id="account" href="account.html"  class="href"><i class="fa fa-fw fa-rmb" class="href"></i> 结算管理</a> </li>
            </ul>x
        </div>
        <!-- 侧边栏 -->
    </nav>
    <!-- 菜单 -->

    <!-- 内容 -->
    <div id="page-wrapper">
        <div id="page" class="container-fluid">


            <!-- 顶部导航 -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> 控制面板</h1>
        <br />
    </div>
</div>
<!-- 顶部导航 -->
<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"> <i class="fa fa-user fa-5x"></i> </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">宋冬野</div>
                        <div>个人资料</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer"> <span class="pull-left">查看详情</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a> </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"> <i class="fa fa-tasks fa-5x"></i> </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>New Tasks!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer"> <span class="pull-left">View Details</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a> </div>
    </div>
    <div class="col-lg-3"> 发布公告 </div>
    <div class="col-lg-3"> 发布广告 </div>
</div>

<!-- page -->
<script>
    $(function(){

    })
</script> 
        </div>
    </div>
    <!-- 内容 -->


    <script>

        function logout(){
            alert('logout');
        }

        $(function(){
            var page = $("#page");
            var href = $("a.href");
            var lastpage = 'main';
            var navs = $("#navs");
            var bodyh = $("html,body");

            var url = {
                "main": "<?php echo U('Index/index');?>",
                "music_add": "<?php echo U('Index/trackAdd');?>",
                "music_edit": "<?php echo U('Index/trackEdit');?>",
                "music_list": "<?php echo U('Index/trackList');?>",
                "info_add": "<?php echo U('Index/noticeAdd');?>",
                "info_list": "<?php echo U('Index/noticeList');?>",
                "ads_add": "<?php echo U('Index/adAdd');?>",
                "ads_list": "<?php echo U('Index/addList');?>",
                "music_data": "<?php echo U('Index/trackCountList');?>",
                "musics_data": "<?php echo U('Index/tracksCountList');?>",
                "ads_data": "<?php echo U('Index/adCount');?>",
                "info_data": "<?php echo U('Index/noticeCount');?>",
                "account": "<?php echo U('Index/trackAdd');?>",
                "user_info": "<?php echo U('Index/trackAdd');?>",
                "user_edit": "<?php echo U('Index/trackAdd');?>",
                "pwd_edit": "<?php echo U('Index/updatePassword');?>"
            }

            var hash = location.hash != '' ? location.hash.substring(1) : "main";
            route(hash);

            $(document).on("click", "a.href", function(){
                var key = $(this).attr('id');
                var target = url[key];
                window.location.href = target;
                alert("<?php echo ($tag); ?>");
                $(".dropdown").removeClass("open");
                return false;
            })

            page.load(lastpage);

            $(window).on('hashchange', function() {
                //page.load(url[location.hash.substring(1)]);
            });

            /*	if (window.history && window.history.pushState) {
             //url(location.hash);
             alert(location.hash)
             return false;
             }*/

            function route(hash){
//                navs.find("li").removeClass("curs");
//                bodyh.animate({"scrollTop": 0}, "fast");
//                $("#"+hash).parent("li").addClass("curs").parent("ul").addClass("in");
//                lastpage = url[hash];
//
//                location.hash = hash;

            }


        })
    </script>

    <!-- Morris Charts JavaScript 表格 -->
    <!--<script src="js/plugins/morris/raphael.min.js"></script> -->
    <!--<script src="js/plugins/morris/morris.min.js"></script> -->
    <!--<script src="js/plugins/morris/morris-data.js"></script>-->
</body>
</html>