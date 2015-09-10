<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Think\Controller;
use User\Api\UserApi as UserApi;

/**
 * 后台首页控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class IndexController extends AdminController
{



    /**
	 * 后台首页
	 */
    public function index()
    {

        $map = array();
        $map['id']=UID;
        $user = D('Member')->where($map)->find();
        $this->assign("user",$user);
        $this->assign('tag', 2);

        if (UID) {

            if(IS_POST){
                $count_day=I('post.count_day', C('COUNT_DAY'),'intval');
                if(M('Config')->where(array('name'=>'COUNT_DAY'))->setField('value',$count_day)===false){
                    $this->error('设置失败。');
                }else{
                   S('DB_CONFIG_DATA',null);
                    $this->success('设置成功。','refresh');
                }

            }else{
                $this->meta_title = '管理首页';

                $this->display();
            }


        } else {
            $this->redirect('Public/login');
        }

    }


    /**
     * 新增音乐
     */
    public function trackAdd(){
        $this->assign('tag', 2);
        if(IS_POST){

        }else{
            $this->display();
        }
    }


/**
 * 修改音乐
 */
    public function trackEdit(){
        if(IS_POST){

        }else{
            $this->display();
        }
    }


/**
 * 修改密码
 */
    public function updatePassword(){
        if(IS_POST){

        }else if(IS_AJAX){
            $this->ajaxReturn($_POST);
        }
        else{
            $this->display();
        }

    }
	
	
	


    public function  test(){
        $data['tag']=1;
        $data['name']='fighting';
        $this->ajaxReturn($data);
     // echo 'hello';

    }




}
