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
        <h1 class="page-header"> 发布音乐</h1>
        <br />
    </div>
</div>
<!-- 顶部导航 -->
<!-- 错误提示 -->
<div id="alerts" class="alert alert-warning" role="alert" style="display:none"></div>
<!-- 错误提示 -->

<div class="row">
    <div class="col-lg-6">
        <form id="form" role="form">
            <div class="form-group">
                <label>歌曲名<?php echo ($tag); ?></label>

                <input id="song_name" class="form-control"  type="text" desc="歌曲名" rule="full" tip="输入歌曲名称">
                <p class="help-block hiddens">输入歌曲名称</p>
            </div>
            <div class="form-group">
                <label>专辑名称</label>
                <input id="song_album" class="form-control" type="password"  desc="专辑名称" tip="输入专辑名称">
                <p class="help-block  hiddens">输入专辑名称</p>
            </div>
            <div class="form-group">
                <label>歌词</label>
                <div class="form-upload">
                    <div class="upload-body" id="pre_lrc" draggable="true" ><h5 class="text-center text-info">可将歌词文件拖致此处上传</h5></div>
                    <div class="upload-footer">
                        <input id="song_lrc" name="song_lrc" type="file" class="file_input" isfull="0" target="#pre_lrc" value="" desc="歌词">
                        <p class="help-block pull-left">仅支持LRC格式，选填</p>
                        <button type="button" class="btn btn-xs upload_btn btn-primary upload_file" target="#song_lrc">上传</button><button type="button" class="btn btn-xs upload_btn btn-default select_file" target="#song_lrc">选择文件</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>专辑封面</label>
                <div class="form-upload">
                    <div class="upload-body" id="pre_pic" draggable="true" ><h5 class="text-center text-info">可将图片文件拖致此处上传</h5></div>
                    <div class="upload-footer">
                        <input id="song_pic" name="song_pic" type="file" class="file_input full_file" isfull="0" target="#pre_pic" value=""  desc="专辑封面">
                        <p class="help-block pull-left">仅限png、jpg格式， 400px*400px</p>
                        <button type="button" class="btn btn-xs upload_btn btn-primary upload_file" target="#song_pic">上传</button><button type="button" class="btn btn-xs upload_btn btn-default select_file" target="#song_pic">选择文件</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>音频文件[320kbps/mp3]</label>
                <div class="form-upload">
                    <div class="upload-body" id="pre_song320" draggable="true" ><h5 class="text-center text-info">可将音频文件拖致此处上传</h5></div>
                    <div class="upload-footer">
                        <input id="song320" name="song320" type="file" class="file_input full_file" isfull="0" target="#pre_song320"  value="" desc="音频文件[320kbps/mp3]">
                        <p class="help-block pull-left">仅限mp3格式</p>
                        <button type="button" class="btn btn-xs upload_btn btn-primary upload_file" target="#song320">上传</button><button type="button" class="btn btn-xs upload_btn btn-default select_file" target="#song320">选择文件</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>音频文件[192kbps/mp3]</label>
                <div class="form-upload">
                    <div class="upload-body" id="pre_song192" draggable="true" ><h5 class="text-center text-info">可将音频文件拖致此处上传</h5></div>
                    <div class="upload-footer">
                        <input id="song192" name="song192" type="file" class="file_input" isfull="0" target="#pre_song192"  value="" desc="音频文件[192kbps/mp3]">
                        <p class="help-block pull-left">仅限mp3格式，选填</p>
                        <button type="button" class="btn btn-xs upload_btn btn-primary upload_file" target="#song192">上传</button><button type="button" class="btn btn-xs upload_btn btn-default select_file" target="#song192">选择文件</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>音频文件[128kbps/mp3]</label>
                <div class="form-upload">
                    <div class="upload-body" id="pre_song128" draggable="true" ><h5 class="text-center text-info">可将音频文件拖致此处上传</h5></div>
                    <div class="upload-footer">
                        <input id="song128" name="song128" type="file" class="file_input" isfull="0" target="#pre_song128" value="" desc="音频文件[128kbps/mp3]">
                        <p class="help-block pull-left">仅限mp3格式，选填</p>
                        <button type="button" class="btn btn-xs upload_btn btn-primary upload_file" target="#song128">上传</button><button type="button" class="btn btn-xs upload_btn btn-default select_file" target="#song128">选择文件</button>
                    </div>
                </div>
            </div>
            <br />
            <button id="btn" type="submit" class="btn btn-primary mr10" data-loading-text="Loading...">提交</button> <button id="save" type="submit" class="btn btn-default" data-loading-text="Loading...">保存并发布下一首</button>
            <br />
            <br />
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>
<script src="js/ajaxfileupload.js"></script>
<script>

    $(function(){
        var btn = $("#btn");
        var save = $("#save");
        var input = $("input");
        var file_input = $(".file_input");
        var upload_file = $(".upload_file");

        window.input_focus(input);

        $(".select_file").on("click", function(){
            var file = $($(this).attr("target"));
            file.trigger("click");
            return false;
        })

        file_input.on("change", function(){
            var that = $(this);
            that.next("p").removeClass("tip-danger").html(that.val());
            that.attr("isfull",1);
        })

        upload_file.on("click", function(){
            var that = $(this);
            var input = $(that.attr("target"));
            if(input.attr("isfull") == "1"){
                //$(input.attr("target")).html("<img src='http://wawa.fm/img/bg2.jpg' style='max-width:100%; margin:0 auto' />");
                //$(input.attr("target")).html('<audio controls preload="none" src="http://cdn.wawa.fm/group1/M00/00/0E/CvrcZ1UsueOADNgGADnGWLB7Vjw783.mp3" style="width:100%;"></audio>');
                //$(input.attr("target")).html('<iframe src="huaxin.lrc" style="width:100%; border:none; height:300px"></iframe>');
            }else{
                input.next("p").html("请选择文件");
            }
            return false;
        })

        /* 拖动上传 */
        $(document).on({
            dragleave:function(e){    //拖离
                e.preventDefault();
            },
            drop:function(e){  //拖后放
                e.preventDefault();
            },
            dragenter:function(e){    //拖进
                e.preventDefault();
            },
            dragover:function(e){    //拖来拖去
                e.preventDefault();
            }
        })

        var upload_body = $(".upload-body");
        for(var i = 0; i < upload_body.length; i++){
            upload_body[i].addEventListener("dragenter", function(e){
                this.style.background = "#e5e5e5";
                return false;
            },false);
            upload_body[i].addEventListener("dragleave", function(e){
                this.style.background = "#f4f4f4";
                return false;
            },false);
            upload_body[i].addEventListener("drop", function(e){

                var p = $(this).next("div").children("p.help-block");
                e.preventDefault(); //取消默认浏览器拖拽效果
                var fileList = e.dataTransfer.files; //获取文件对象
                this.style.background = "#f4f4f4";

                //检测是否是拖拽文件到页面的操作
                if(fileList.length == 0){
                    return false;
                }

                alert(fileList[0].type);
                //检测文件是不是图片
                /*				if(fileList[0].type.indexOf('image') === -1){
                 alert("您拖的不是图片！");
                 return false;
                 }*/

                //拖拉图片到浏览器，可以实现预览功能
                var file = window.webkitURL.createObjectURL(fileList[0]);
                var filename = fileList[0].name; //图片名称
                p.removeClass("tip-danger").html(filename)

                /*上传
                 xhr = new XMLHttpRequest();
                 xhr.open("post", "upload.php", true);
                 xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

                 var fd = new FormData();
                 fd.append('mypic', fileList[0]);

                 xhr.send(fd);
                 */

                //var str = "<img src='"+img+"' style='max-width:100%; margin:0 auto' />";
                //var str = "<iframe src='"+ file +"' style='width:100%; border:none; height:300px'></iframe>";
                //var str = '<audio controls preload="none" src="http://cdn.wawa.fm/group1/M00/00/0E/CvrcZ1UsueOADNgGADnGWLB7Vjw783.mp3" style="width:100%;"></audio>';
                $(this).html(str);
            },false)
        }

        /* 提交 */
        btn.on("click", function(){

            var full_file = $(".full_file");

            if(!window.input_validate(input)){
                return false;
            }

            for(var i = 0; i < full_file.length; i++){
                if(full_file.eq(i).val() == ''){
                    var that = full_file.eq(i);
                    $("html,body").animate({"scrollTop": (that.parent("div").parent("div").offset().top - 80) +"px"}, "fast");
                    that.next("p").addClass("tip-danger").html(that.attr("desc")+"不能为空");
                    return false;
                }
            }
            /*			if(.attr("url") == ''){
             alert($(this).index());
             $(this).next("p").html("不能为空");
             return false;
             }*/

            var data = {
                "song_name": $("#song_name").val(),
                "song_album": $("#song_album").val(),
                "song_lrc": $("#song_lrc").val(),
                "song_pic": $("#song_pic").val(),
                "song128": $("#song128").val(),
                "song192": $("#song192").val(),
                "song320": $("#song320").val(),
            }

            //ajax提交

            return false;
        });

        /* 保存 */
        save.on("click", function(){
            alert("<?php echo I('param.tag');?>");

            if(!window.input_validate(input)){
                return false;
            }

            var data = {
                "song_name": $("#song_name").val(),
                "song_album": $("#song_album").val(),
                "song_lrc": $("#song_lrc").val(),
                "song_pic": $("#song_pic").val(),
                "song128": $("#song128").val(),
                "song192": $("#song192").val(),
                "song320": $("#song320").val(),
            }

            //ajax保存
        });

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