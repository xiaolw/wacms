<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use User\Api\UserApi;

/**
 * 后台首页控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class PublicController extends \Think\Controller
{

    /**
     * 后台用户登录
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function login($username = null, $password = null,$type=1, $verify = null)
    {
        layout(false);
        if (IS_POST) {
            /* 检测验证码 TODO: */
//             if (APP_DEBUG==false){
//                 if(!check_verify($verify)){
//                     $this->error('验证码输入错误！');
//                 }
//             }


            /* 调用UC登录接口登录 */
            $User = new UserApi;
            $uid = $User->login($username, $password,$type);

            if (99 < $uid) { //UC登录成功

                //TODO:跳转到登录前页面


                $this->success('登录成功！', U('Admin/Index/index'));


            } else { //登录失败


                switch ($uid) {
                    case -1:
                        $error = '用户不存在！';
                        break; //系统级别禁用
                    case -2:
                        $error = '密码错误！';
                        break;
                    case 0:
                        $error = '用户未激活！';
                        break;
                    case 1:
                        $error = '用户在审核过程中，请耐心等待！';
                        break;
                    case 3:
                        $error = '用户审核未通过！';
                        break;
                    default:
                        $error = '未知错误！';
                        break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }
        } else {
            if (is_login()) {
                $this->redirect('Admin/Index/index');
            } else {
                /* 读取数据库中的配置 */
                $config = S('DB_CONFIG_DATA');
                if (!$config) {
                    $config = D('Config')->lists();
                    S('DB_CONFIG_DATA', $config);
                }
                C($config); //添加配置

                $this->display();
            }
        }
    }

    /* 退出登录 */
    public function logout()
    {
        if (is_login()) {
          //  D('Member')->logout();
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }

    }

    public function verify()
    {
        verify();
        // $verify = new \Think\Verify();
        // $verify->entry(1);
    }


    public function test(){
        var_dump($_GET);
    }

}