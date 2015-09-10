<?php
namespace Admin\Controller;

use Think\Controller;
use User\Api\UserApi;



/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class MemberController extends Controller
{

    /**
     * 用户注册
     */
    public function register()
    {


        if (IS_POST) { //注册用户

            $Username = I('post.username', '', 'op_t');
            $Eamil = I('post.email', '', 'op_t');
            $Password = I('post.password', '', 'op_t');

            /* 注册用户 */
            $uid = Member()->register($Username, null, $Password, $Eamil, null, 2);
            if (0 < $uid) { //注册成功

                $verify = D('Verify')->addVerify($Eamil, 'email', $uid);
                $res = $this->sendActivateEmail($Eamil, $verify, $uid, $Username); //发送激活邮件

                $data = array("uid" => $uid);

                $this->success('注册成功，请登录邮箱进行激活', U('Admin/Member/activate', $data));


            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }
        } else { //显示注册表单

            $this->display();
        }
    }


    /* 验证码，用于登录和注册 */
    public function verify()
    {
        verify();
        //  $verify = new \Think\Verify();
        //  $verify->entry(1);
    }

    /* 用户密码找回首页 */
    public function mi($email = '')
    {
        $email = strval($email);

        if (IS_POST) { //登录验证
            //检测验证码


            //根据用户名获取用户UID
            $user = Member()->where(array('email' => $email))->find();
            $uid = $user['uid'];
            if (!$uid) {
                $this->error("该邮箱还未注册");
            }

            //生成找回密码的验证码
            $verify = $this->getResetPasswordVerifyCode($uid);

            //发送验证邮箱
            $url = 'http://' . $_SERVER['HTTP_HOST'] . U('member/reset?uid=' . $uid . '&verify=' . $verify);
            $content = C('USER_RESPASS') . "<br/>" . $url . "<br/>" . modC('WEB_SITE_NAME', '音乐人开放平台', 'Config') . "系统自动发送--请勿直接回复<br/>" . date('Y-m-d H:i:s', TIME()) . "</p>";
            send_mail($email, modC('WEB_SITE_NAME', '音乐人开放平台', 'Config') . "密码找回", $content);
            $this->success('重设密码邮件发送成功,请注意查收');
        } else {


            $this->display();
        }
    }

    /**
     * 重置密码
     */
    public function reset($uid, $verify)
    {
        //检查参数
        $uid = intval($uid);
        $verify = strval($verify);
        if (!$uid || !$verify) {
            $this->error("参数错误");
        }

        //确认邮箱验证码正确
        $expectVerify = $this->getResetPasswordVerifyCode($uid);
        if ($expectVerify != $verify) {
            $this->error("参数错误");
        }

        //将邮箱验证码储存在SESSION
        session('reset_password_uid', $uid);
        session('reset_password_verify', $verify);

        //显示新密码页面
        $this->display();
    }

    public function doReset($password, $repassword)
    {
        //确认两次输入的密码正确
        if ($password != $repassword) {
            $this->error('两次输入的密码不一致');
        }

        //读取SESSION中的验证信息
        $uid = session('reset_password_uid');
        $verify = session('reset_password_verify');

        //确认验证信息正确
        $expectVerify = $this->getResetPasswordVerifyCode($uid);
        if ($expectVerify != $verify) {
            $this->error("验证信息无效");
        }

        //将新的密码写入数据库
        $data = array('id' => $uid, 'password' => $password);
        $model = Member();
        $data = $model->create($data);
        if (!$data) {
            $this->error('密码格式不正确');
        }
        $result = $model->where(array('uid' => $uid))->save($data);
        if ($result === false) {
            $this->error('数据库写入错误');
        }

        //显示成功消息
        $this->success('密码重置成功', U('Admin/public/login'));
    }

    private function getResetPasswordVerifyCode($uid)
    {
        $user = Member()->where(array('id' => $uid))->find();
        $clear = implode('|', array($user['uid'], $user['username'], $user['last_login_time'], $user['password']));
        $verify = thinkox_hash($clear, UC_AUTH_KEY);
        return $verify;
    }

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    public function showRegError($code = 0)
    {
        switch ($code) {
            case -1:
                $error = '用户名长度必须在4-32个字符以内！';
                break;
            case -2:
                $error = '用户名被禁止注册！';
                break;
            case -3:
                $error = '用户名被占用！';
                break;
            case -4:
                $error = '密码长度必须在6-30个字符之间！';
                break;
            case -5:
                $error = '邮箱格式不正确！';
                break;
            case -6:
                $error = '邮箱长度必须在4-32个字符之间！';
                break;
            case -7:
                $error = '邮箱被禁止注册！';
                break;
            case -8:
                $error = '邮箱被占用！';
                break;
            case -9:
                $error = '手机格式不正确！';
                break;
            case -10:
                $error = '手机被禁止注册！';
                break;
            case -11:
                $error = '手机号被占用！';
                break;
            case -20:
                $error = '用户名只能由数字、字母和"_"组成！';
                break;
            case -30:
                $error = '昵称被占用！';
                break;
            case -31:
                $error = '昵称被禁止注册！';
                break;
            case -32:
                $error = '昵称只能由数字、字母、汉字和"_"组成！';
                break;
            case -33:
                $error = '昵称不能少于四个字！';
                break;
            default:
                $error = '未知错误24';
        }
        return $error;
    }


    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function profile()
    {
        if (!is_login()) {
            $this->error('您还没有登陆', U('User/login'));
        }
        if (IS_POST) {
            //获取参数
            $uid = is_login();
            $password = I('post.old');
            $repassword = I('post.repassword');
            $data['password'] = I('post.password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if ($data['password'] !== $repassword) {
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if ($res['status']) {
                $this->success('修改密码成功！');
            } else {
                $this->error($res['info']);
            }
        } else {
            $this->display();
        }
    }

    /**
     * doSendVerify  发送验证码
     * @param $account
     * @param $verify
     * @param $type
     * @return bool|string
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function doSendVerify($account, $verify, $type)
    {
        switch ($type) {
            case 'mobile':
                $content = modC('SMS_CONTENT', '{$verify}', 'USERCONFIG');
                $content = str_replace('{$verify}', $verify, $content);
                $content = str_replace('{$account}', $account, $content);
                $res = sendSMS($account, $content);
                return $res;
                break;
            case 'email':
                //发送验证邮箱
                $content = modC('REG_EMAIL_VERIFY', '{$verify}', 'USERCONFIG');
                $content = str_replace('{$verify}', $verify, $content);
                $content = str_replace('{$account}', $account, $content);
                $res = send_mail($account, modC('WEB_SITE_NAME', 'OpenSNS开源社交系统', 'Config') . '邮箱验证', $content);
                return $res;
                break;
        }

    }

    /**
     * activate  提示激活页面
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function activate()
    {

        $aUid = I('get.uid', 0, 'intval');
//        $aUid = session('temp_login_uid');
        $info = Member()->where(array('uid' => $aUid))->find();


        $this->assign($info);
        $this->display();
    }

    /**
     * reSend  重发邮件
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function reSend()
    {
        $res = $this->activateVerify();
        if ($res === true) {
            $this->success('发送成功', 'refresh');
        } else {
            $this->error('发送失败，请稍候再试！' . $res, 'refresh');
        }

    }

    /**
     * changeEmail  更改邮箱
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function changeEmail()
    {
        $aEmail = I('post.email', '', 'op_t');
        $aUid = session('temp_login_uid');
        $ucenterMemberModel = Member();
        $status = $ucenterMemberModel->where(array('uid' => $aUid))->getField('status');
        if ($status != 3) {
            $this->error('权限不足！');
        }
        $ucenterMemberModel->where(array('uid' => $aUid))->setField('email', $aEmail);
        clean_query_user_cache($aUid, 'email');
        $res = $this->activateVerify();
        $this->success('更换成功，请登录邮箱进行激活！如没收到激活信请稍候再试！', 'refresh');
    }

    /**
     * activateVerify 添加激活验证
     * @return bool|string
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    private function activateVerify()
    {
        $aUid = session('temp_login_uid');
        $info = Member()->field('email,username')->where(array('uid' => $aUid))->find();
        $verify = D('Verify')->addVerify($info['email'], 'email', $aUid);
        $res = $this->sendActivateEmail($info['email'], $verify, $aUid, $info['username']); //发送激活邮件
        return $res;
    }

    /**
     * sendActivateEmail   发送激活邮件
     * @param $account
     * @param $verify
     * @return bool|string
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    private function sendActivateEmail($account, $verify, $uid, $username)
    {

        $url = 'http://' . $_SERVER['HTTP_HOST'] . U('member/doActivate?account=' . $account . '&verify=' . $verify . '&type=email&uid=' . $uid);
        $content = modC('REG_EMAIL_ACTIVATE', '{$url}', 'USERCONFIG');
        $content = str_replace('{$url}', $url, $content);
        $content = str_replace('{$username}', $username, $content);
        $content = str_replace('{$title}', modC('WEB_SITE_NAME', '音乐人合作系统', 'Config'), $content);
        $res = send_mail($account, modC('WEB_SITE_NAME', '音乐人合作系统', 'Config') . '激活信', $content);


        return $res;
    }


    /**
     * doActivate  激活步骤
     * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
     */
    public function doActivate()
    {
        $aAccount = I('get.account', '', 'op_t');
        $aVerify = I('get.verify', '', 'op_t');
        $aType = I('get.type', '', 'op_t');
        $aUid = I('get.uid', 0, 'intval');
        $check = D('Verify')->checkVerify($aAccount, $aType, $aVerify, $aUid);
        if ($check) {
            set_user_status($aUid, USER_ACTIVE);


            $username = Member()->field('username')->where("uid=" . $aUid)->find();

            $this->success('激活成功', U('Member/info', array('uid' => $aUid, 'username' => $username['username'])));

        } else {
            $this->error("激活失败");
        }

    }

    /**
     *
     */
    public function info()
    {
        // var_dump($_POST);
        $uid = I('param.uid');
        if (IS_POST) {

            $member = D('Member');
            if ($data = $member->create()) {
                $member->save($data);

                $ucmember = $member->field('email,username')->where("uid=" . $uid)->find();
                $this->success('完善资料成功', U('Member/wcheck', array('email' => $ucmember['email'], 'name' => $ucmember['username'])));
            } else {
                $this->error($member->getError());
            }

        } else {

            if ($uid) {
                $reason = I('reason');
                $member = Member()->where("uid=" . $uid)->find();

                $this->assign('info', $member);
                $this->assign('reason', $reason);
            }
            $this->display();
        }


    }


    /**
     * 设置用户标签
     * @author 郑钟良<zzl@ourstu.com>
     */
    public function set_tag()
    {
        $result = A('Ucenter/RegStep', 'Widget')->do_set_tag();
        if ($result['status']) {
            $result['url'] = U('Ucenter/member/step', array('step' => get_next_step('set_tag')));
        } else {
            !isset($result['info']) && $result['info'] = '没有要保存的信息！';
        }
        $this->ajaxReturn($result);
    }


}