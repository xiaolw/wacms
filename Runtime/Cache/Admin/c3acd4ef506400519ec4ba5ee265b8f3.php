<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>音乐人合作 - 登录</title>
</head>
<body>

<link href="/wacms/Public/page/css/main.css" rel="stylesheet" type="text/css" />
<script src="/wacms/Public/page/js/jquery-1.11.1.min.js"></script>
<div class="main">
    <h1 class="title4"> 欢迎回来<br/>
        现在登录 </h1>
    <form aciton="<?php echo U('Admin/Public/login');?>">
        <input id='type' type="hidden" name="type" value="1"/>
        <ul class="reg">
            <li>
                <input id="user" class="text" name="username" type="text" placeholder="用户名或邮箱" tag="不能为空" />
                <span class="tag"></span></li>
            <li>
                <input id="pwd" class="text" type="password" name="password" placeholder="密码" tag="不能为空"/>
                <span class="tag"></span> </li>
            <li><a class="forgetpwd" href="<?php echo U('admin/Member/mi');?>" title="重设密码" style="color:#666">忘记密码？</a></li>
            <li>
                <input class="btn1 transfrom" type="submit" value="登录" />
                <span id="err" class="tag" style="color:red" ></span> </li>
        </ul>
    </form>
    <div class="footer transfrom"><a href="<?php echo U('admin/Member/register');?>" title="">注册</a> <a href="<?php echo U('Home/index/index');?>" title="">返回首页</a></div>
</div>


<script>
    $(function(){

        var user = $("#user");
        var pwd =  $("#pwd");
        var err = $("#err");
        var vtype = $("#type");

        function popTag(dom, str, color){
            var tag = dom.next(".tag");
            tag.html(str).css("color",color).fadeIn();
        }

        $("input").on("focus", function(){
            var that = $(this);
            that.data("value",that.val());
            if(that.val() == ""){
                popTag(that, that.attr("tag"), "#666");
            }
        }).on("blur", function(){
            var that = $(this);
            if(that.val() != that.data("value")){
                that.next(".tag").html("").hide();
            }
        })

        $("form").submit(function(){

            err.html("").css("display","none");

            if(user.val() == ''){
                user.focus();
                return false;
            }else{
                var i = user.val().search("@");
                if(i>0){
                    vtype.attr('value',2);
                }
            }

            if(pwd.val() == ''){
                pwd.focus();
                return false;
            }

            var self = $(this);




            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data){

                if(data.status){
                    window.location.href = data.url;
                } else {
                    self.find("#err").text(data.info).css("display","inline-block");

                }
            }

        })

        function errTag(str){  //错误提示
            err.html(str).css("display","inline-block");
        }

        function userTag(str){  //用户名错误提示
            popTag(user, str, "red");
        }

        function emailTag(str){  //邮箱提示
            popTag(email, str, "red");
        }


        //userTag("很抱歉，该用户名已被使用")
    })
</script>




</body>
</html>