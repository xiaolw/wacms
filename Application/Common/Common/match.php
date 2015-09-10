<?php

/**
 * 所属项目 ThinkOX.
 * 开发者: 想天
 * 创建日期: 3/25/14
 * 创建时间: 9:27 AM
 * 版权所有 想天工作室(www.ourstu.com)
 */



function transgress_keyword($content){                  //定义处理违法关键字的方法
//	$keyword = array ('明日科技', '编程词典', '明日图书', '明日软件' ); //定义敏感词
	require('ThinkPHP/Library/Org/badword.class.php');
	$keyword = $badword;
	$m = 0;
	for($i = 0; $i < count ( $keyword ); $i ++) {    //根据数组元素数量执行for循环
		//应用substr_count检测文章的标题和内容中是否包含敏感词
		if (substr_count ( $content, $keyword [$i] ) > 0) {
			return true;
		}
	}
	return false;              //返回变量值，根据变量值判断是否存在敏感词
}



/**
 *
 * @param
 *        	$content
 * @return mixed
 */
function match_users($content) {
	$user_pattern = "/\@([^\#|\s]+)\s/"; // 匹配用户
	preg_match_all ( $user_pattern, $content, $user_math );
	return $user_math;
}

// 验证设备id
function encrypt() {
	$code =  I('devicecode');
	$key = I('code');
	$deviceid = I('deviceid');
	if(empty($code)||empty($deviceid)){
		return false;
	}
	
//	$bcode = getChar($code); 
   $bkey = $key;
  $bcode = $code;
 
   $de = $bcode['2'];

	$len =strlen( $bcode );
	$tmp="";
	for($i =0;$i<$len;$i++)
	{
	//	$bcode [$i] = ($bcode[$i]^$bkey);
		$bcode[$i]=($bcode[$i] ^ ($bkey));
	}
	
//	echo $bcode;
	
	if( $deviceid==$bcode){
		return true;
	}else{
		return false;
	};
}

/**
 *
 * 转换一个String字符串为byte数组
 *
 * @param $str 需要转换的字符串        	
 *
 * @param $bytes 目标byte数组        	
 *
 * @author Zikie
 *        
 *        
 */
function getChar($string) {
	$bytes = array ();
	for($i = 0; $i < strlen ( $string ); $i ++) {
		$bytes [] =  $string [$i];
	}
	return $bytes;
}

/**
 *
 * 将字节数组转化为String类型的数据
 *
 * @param $bytes 字节数组        	
 *
 * @param $str 目标字符串        	
 *
 * @return 一个String类型的数据
 *
 *
 */
function toStr($bytes) {
	$str = '';
	foreach ( $bytes as $ch ) {
		$str .= chr ( $ch );
	}
	
	return $str;
} 