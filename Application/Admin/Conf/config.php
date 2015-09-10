<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.thinkphp.cn>
// +----------------------------------------------------------------------

/**
 * 前台配置文件
 * 所有除开系统级别的前台配置
 */

define("USER_ACTIVE",1); //用户激活
define("USER_CHECKED_SUCESS",2);//用户通过审核
define("USER_CHECKED_DENY",3);//用户未通过审核

return array(
    /* 数据缓存设置 */
    'DATA_CACHE_PREFIX' => 'onethink_', // 缓存前缀
    'DATA_CACHE_TYPE' => 'File', // 数据缓存类型
    'URL_MODEL' => 3, //URL模式
    'LAYOUT_ON'=>false,
    'LAYOUT_NAME'=>'layout',



    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
    		'__ADMIN__' => __ROOT__ . '/Public/admin',
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__' =>  __ROOT__ . '/Application/' . MODULE_NAME . '/Static/images',
        '__CSS__' =>  __ROOT__ . '/Application/' . MODULE_NAME . '/Static/css',
        '__JS__' =>  __ROOT__ . '/Application/' . MODULE_NAME . '/Static/js',
        '__ZUI__' =>  __ROOT__ . '/Application/' . MODULE_NAME . '/Static/zui'
    ),

    /* SESSION 和 COOKIE 配置 */
    'SESSION_PREFIX' => 'onethink_admin', //session前缀
    'COOKIE_PREFIX' => 'onethink_admin_', // Cookie前缀 避免冲突
    'VAR_SESSION_ID' => 'session_id',    //修复uploadify插件无法传递session_id的bug

    /* 后台错误页面模板 */
    'TMPL_ACTION_ERROR' => MODULE_PATH . 'View/default/Public/error.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => MODULE_PATH . 'View/default/Public/success.html', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE' => MODULE_PATH . 'View/default/Public/exception.html',// 异常页面的模板文件
    'DEFAULT_THEME' => 'default', // 默认模板主题名称
);
