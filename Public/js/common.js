$(function(){

	
	window.result = function(status,text,url){  //反馈
		$("html,body").animate({"scrollTop": 0}, "fast");
		var classname = ["alert alert-success", "alert alert-warning", "alert alert-danger","alert alert-info"]; //1成功、2警告、3失败、4提示
		var alerts = $("#alerts");
		alerts.attr("class",classname[status]).html(text);	
		if(alerts.css("display") == "none"){alerts.fadeIn()}
		setTimeout(function(){
			alerts.alert('close');
			if(url != undefined){window.location.href = url};
		}, 2000)		
	}
	
	window.input_focus = function(input){  //聚焦和提示
		input.focus(function(){
			$(this).next("p").removeClass("hiddens");	
		}).blur(function(){
			var that = $(this);
			that.next("p").addClass("hiddens").removeClass("tip-danger").html(that.attr("tip"));	
		});
		input.first().focus();
	}
	
	window.input_validate = function(input){ //判空和验证
		var res = true;	
		var error = function(dom,text){
			$("html,body").animate({"scrollTop": (dom.offset().top - 80) +"px"}, "fast");
			dom.focus();
			dom.next("p").addClass("tip-danger").html(text);
			res = false;	
		}
		input.each(function(){
			var that = $(this);
			switch(that.attr("rule")){
				case "password":
					if(!that.val().match(/^[a-zA-Z0-9]{6,20}$/)){
						error(that, "请填写正确的密码格式：6~16字符，可由字母、数字组成");
						return false;						
					}
					break;
				case "username":
					if(!that.val().match(/^[a-zA-Z0-9_]{2,20}$/)){
						error(that, "请填写正确的昵称格式：6~20字符，可由字母、数字组成");
						return false;						
					}				
					break;
				case "email":
					if(!that.val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
						error(that, "请填写正确的邮箱格式");
						return false;						
					}				
					break;
				case "phone":
					if(!that.val().match(/^[0-9-]{4,20}$/)){
						error(that, "请填写正确的电话号码格式");
						return false;						
					}				
					break;					
				case "full":
					if(that.val() == ''){
						error(that, that.attr("desc")+"不能为空");
						return false;						
					}					
					break;						
				default:
					break;	
			}
		})
		return res;
	}
	
	window.btn_submit = function(obj){ //ajax提交
		var btn = obj["btn"]; 
		$.ajax({
			type: obj["type"],
			url: obj["url"],
			data: obj["data"],
			type: obj["type"],
			beforeSend: function(){
				btn.button('loading');
			},
			success: function(data){
			  	obj["fnSuccess"](data);
			},
			error: function(){ 
				result(3,"网络出错了，请重试");
			},
			complete: function(){
				btn.button('reset')
			}
		});	
		return false;
	}
	
});

function getQueryString(url,name) { 
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
	var r = url.substr(1).match(reg); 
	if (r != null) return unescape(r[2]); return null; 
}