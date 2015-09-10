<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Admin\Builder\AdminConfigBuilder;
use Admin\Builder\AdminListBuilder;
use Admin\Builder\AdminSortBuilder;
use Common\Model\MemberModel;
use User\Api\UserApi;

/**
 * 后台用户控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class UserController extends AdminController
{

    /**
     * 用户管理首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index()
    {
        $nickname = I('nickname');
        $map['status'] = array('egt', 0);
        if (is_numeric($nickname)) {
            $map['uid|nickname'] = array(intval($nickname), array('like', '%' . $nickname . '%'), '_multi' => true);
        } else {
            $map['nickname'] = array('like', '%' . (string)$nickname . '%');
        }
        $list = $this->lists('Member', $map);
        int_to_string($list);
        $this->assign('_list', $list);
        $this->meta_title = '用户信息';
        $this->display();
    }

    /**
     * 重置用户密码
     * @author 郑钟良<zzl@ourstu.com>
     */
    public function initPass(){
        $uids=I('id');
        !is_array($uids)&&$uids=explode(',',$uids);
        foreach($uids as $key=>$val){
            if(!query_user('uid',$val)){
                unset($uids[$key]);
            }
        }
        if(!count($uids)){
            $this->error('前选择要重置的用户！');
        }
        $ucModel=UCenterMember();
        $data=$ucModel->create(array('password'=>'123456'));
        $res=$ucModel->where(array('id'=>array('in',$uids)))->save(array('password'=>$data['password']));
        if($res){
            $this->success('密码重置成功！');
        }else{
            $this->error('密码重置失败！可能密码重置前就是“123456”。');
        }
    }

    public function changeGroup()
    {

        if ($_POST['do'] == 1) {
            //清空group
            $aAll = I('post.all', 0, 'intval');
            $aUids = I('post.uid', array(), 'intval');
            $aGids = I('post.gid', array(), 'intval');

            if ($aAll) {//设置全部用户
                $prefix = C('DB_PREFIX');
                D('')->execute("TRUNCATE TABLE {$prefix}auth_group_access");
                $aUids = UCenterMember()->getField('id', true);

            } else {
                M('AuthGroupAccess')->where(array('uid' => array('in', implode(',', $aUids))))->delete();;
            }
            foreach ($aUids as $uid) {
                foreach ($aGids as $gid) {
                    M('AuthGroupAccess')->add(array('uid' => $uid, 'group_id' => $gid));
                }
            }


            $this->success('成功。');
        } else {
            $aId = I('post.id', array(), 'intval');

            foreach ($aId as $uid) {
                $user[] = query_user(array('space_link', 'uid'), $uid);
            }


            $groups = M('AuthGroup')->where(array('status'=>1))->select();
            $this->assign('groups', $groups);
            $this->assign('users', $user);
            $this->display();
        }

    }
    
    /**
     * 用户信息
     * @author huajie <banhuajie@163.com>
     */
    public function info()
    {
    	$member = M('Member')->where("uid=".UID)->find();
    	$detail = D('Udetail')->where("uid=".UID)->find();
    	
    	$area = D('Addons://ChinaCity/District')->getFieldById($member['pos_province'], 'name');
    	$area .= D('Addons://ChinaCity/District')->getFieldById($member['pos_city'], 'name');
    	$member['area'] = $area;
    	$data =  array_merge($member,$detail);
    	
    	$this->assign('info', $data);
    	$this->meta_title = '个人资料';
    	$this->display();
    }
    
    
    /**
     * 保存用户信息
     * @author lipeng@wawa.fm
     */
    public function save()
    {
    	
    	$aCity = I('pos_city', 0, 'intval');
    	$aProvince = I('pos_province', 0, 'intval');
    	
    	$aSign_status = I('sign_status', 0, 'intval');
    	$aCompany = I('company', '', 'op_t');
    	
    	if($aSign_status==2&&$aCompany==''){
    		$this->error("公司名称不能为空");
    	}
    	
    	if($aCity==0||$aProvince==0){
    		$this->error("地区不能为空");
    	}
    	
    	$Member = D('User/Member');
    	$uid = I('id');
    //	$password = $Member->getFieldByUid($uid,'password');
    	
    	if($Member->field('uid,username,email,sex,pos_province,pos_city')->create()){
    		$status = $Member->field('uid,username,email,sex,pos_province,pos_city')->save();
    		if(false === $status){
    			$this->error = '更新个人信息出错出错！';
    			return false;		
    		}
    	}else{
    		$this->error($Member->getErrorMessage($Member->getError()));
    	}
    	
    
    	
    	
    	
    	
    	$Udetail = D('Udetail'); 
    		 
    	if($Udetail->create()){
    		$status =  $Udetail->save();
    		if(false === $status){
    			$this->error = '更新个人信息出错出错！';
    			return false;
    		}
    	}else{
    		$this->error($Udetail->getError());
    	}
    	 
    	 
    	
    	$this->success('修改个人信息成功！');
    	
    	$this->display('edit');
    }
    
   
    /**
     * 用户编辑
     * @author huajie <banhuajie@163.com>
     */
    public function edit()
    {
    	
    	$uid = I('uid');
    	$member = M('Member')->where("uid=".$uid)->find();
    	$detail = D('Udetail')->where("uid=".$uid)->find();
    	 
    	$area = D('Addons://ChinaCity/District')->getFieldById($member['pos_province'], 'name');
    	$area .= D('Addons://ChinaCity/District')->getFieldById($member['pos_city'], 'name');
    	$member['area'] = $area;
    	$data =  array_merge($member,$detail);
    	 
    	$this->assign('info', $data);
    	$this->meta_title = '个人资料';
    	$this->display();
    }
    
    

   


 
    /**
     * 修改昵称初始化
     * @author huajie <banhuajie@163.com>
     */
    public function updateNickname()
    {
        $nickname = M('Member')->getFieldByUid(UID, 'nickname');
        $this->assign('nickname', $nickname);
        $this->meta_title = '修改昵称';
        $this->display();
    }

    /**
     * 修改昵称提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitNickname()
    {
        //获取参数
        $nickname = I('post.nickname');
        $password = I('post.password');
        empty($nickname) && $this->error('请输入昵称');
        empty($password) && $this->error('请输入密码');

        //密码验证
        $User = new UserApi();
        $uid = $User->login(UID, $password, 4);
        ($uid == -2) && $this->error('密码不正确');

        $Member = D('Member');
        $data = $Member->create(array('nickname' => $nickname));
        if (!$data) {
            $this->error($Member->getError());
        }

        $res = $Member->where(array('uid' => $uid))->save($data);

        if ($res) {
            $user = session('user_auth');
            $user['username'] = $data['nickname'];
            session('user_auth', $user);
            session('user_auth_sign', data_auth_sign($user));
            $this->success('修改昵称成功！');
        } else {
            $this->error('修改昵称失败！');
        }
    }

    /**
     * 修改密码初始化
     * @author huajie <banhuajie@163.com>
     */
    public function updatePassword()
    {
        $this->meta_title = '修改密码';
        $this->display();
    }

    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitPassword()
    {
        //获取参数
        $password = I('post.old');
        empty($password) && $this->error('请输入原密码');
        $data['password'] = I('post.password');
        empty($data['password']) && $this->error('请输入新密码');
        $repassword = I('post.repassword');
        empty($repassword) && $this->error('请输入确认密码');

        if ($data['password'] !== $repassword) {
            $this->error('您输入的新密码与确认密码不一致');
        }

        $Api = new UserApi();
        $res = $Api->updateInfo(UID, $password, $data);
        if ($res['status']) {
            $this->success('修改密码成功！');
        } else {
            $this->error(UCenterMember()->getErrorMessage($res['info']));
        }
    }

    /**
     * 用户行为列表
     * @author huajie <banhuajie@163.com>
     */
    public function action()
    {
        //获取列表数据
        $Action = M('Action')->where(array('status' => array('gt', -1)));
        $list = $this->lists($Action);
        int_to_string($list);
        // 记录当前列表页的cookie
        Cookie('__forward__', $_SERVER['REQUEST_URI']);

        $this->assign('_list', $list);
        $this->meta_title = '用户行为';
        $this->display();
    }

    /**
     * 新增行为
     * @author huajie <banhuajie@163.com>
     */
    public function addAction()
    {
        $this->meta_title = '新增行为';


        $module = D('Module')->getAll();
        $this->assign('module',$module);
        $this->assign('data', null);
        $this->display('editaction');
    }

    /**
     * 编辑行为
     * @author huajie <banhuajie@163.com>
     */
    public function editAction()
    {
        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');
        $data = M('Action')->field(true)->find($id);

        $module = D('Module')->getAll();
        $this->assign('module',$module);
        $this->assign('data', $data);
        $this->meta_title = '编辑行为';
        $this->display();
    }

    /**
     * 更新行为
     * @author huajie <banhuajie@163.com>
     */
    public function saveAction()
    {
        $res = D('Action')->update();
        if (!$res) {
            $this->error(D('Action')->getError());
        } else {
            $this->success($res['id'] ? '更新成功！' : '新增成功！', Cookie('__forward__'));
        }
    }

    /**
     * 会员状态修改
     * @author 朱亚杰 <zhuyajie@topthink.net>
     */
    public function changeStatus($method = null)
    {
        $id = array_unique((array)I('id', 0));
        if (in_array(C('USER_ADMINISTRATOR'), $id)) {
            $this->error("不允许对超级管理员执行该操作!");
        }
        $id = is_array($id) ? implode(',', $id) : $id;
        if (empty($id)) {
            $this->error('请选择要操作的数据!');
        }
        $map['uid'] = array('in', $id);
        switch (strtolower($method)) {
            case 'forbiduser':
                $this->forbid('Member', $map);
                break;
            case 'resumeuser':
                $this->resume('Member', $map);
                break;
            case 'deleteuser':
                $this->delete('Member', $map);
                break;
            default:
                $this->error('参数非法');

        }
    }


    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0)
    {
        switch ($code) {
            case -1:
                $error = '用户名长度必须在32个字符以内！';
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
                $error = '邮箱长度必须在1-32个字符之间！';
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
            case -12:
                $error = '用户名必须以中文或字母开始，只能包含拼音数字，字母，汉字！';
                break;
            default:
                $error = '未知错误';
        }
        return $error;
    }


    
    public function getNickname(){
        $uid = I('get.uid',0,'intval');
        if($uid){
            $user = query_user(null,$uid);
            $this->ajaxReturn($user);
        }
        else{
            $this->ajaxReturn(null);
        }

    }

    public function setTypeStatus($ids, $status)
    {
        $builder = new AdminListBuilder();
        $builder->doSetStatus('ucenter_score_type', $ids, $status);

    }

    public function delType($ids){
        $model = D('Ucenter/Score');
        $res = $model->delType($ids);
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
 


}
