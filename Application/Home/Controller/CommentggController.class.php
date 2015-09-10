<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;


/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class CommentggController extends HomeController
{
	

	
	public function _initialize(){
	
	}
	
	public function index(){
		echo date("Y-m-d");
	}
	
	public function mlist(){
	
	   
		$commentgg = D('Common/Commentgg');
		$tjnotice = D('Tjnotice');
		$user = D('Common/User');
	

		$map['content_id'] = I('content_id');
		
		$list=$this->lists($commentgg,$map,'id desc',true);
	
	    $len  = count($list);
	    for($i=0;$i<$len;$i++){
	    	$data = $list[$i];
	    	$data['createUser'] = $user->find($data['create_user_id']);
	    	if($data['rid']){
	    		$ee = $commentgg->find($data['rid']);
	    		$data['replyUser'] = $user->find($ee['create_user_id']);	
	    	}
	    	$data['result'] = $len;
	    	$list[$i] = $data;
	    }
		
	
		$this->ajaxReturn($list);
	}
	
	

	//公告
	public function msave(){
		
		$uid = I('create_user_id');
		
		$return = check_action_limit('commentgg_msave','Commentgg',$uid,$uid);
		if($return && !$return['state']){
			return $return['info'];
		}
		
		$commentgg = D('Common/Commentgg');
		$tjnotice = D('Tjnotice');
		$user = D('Common/User');
		$data = date("Y-m-d H:i:s");
		$comment['create_date'] = $data;
		$comment['content'] = I('content');
		
		if(transgress_keyword(I('content'))){
			$mr['result'] = '1';
			$mr['message'] = '请修改一下评论内容！';		
			
			$this->ajaxReturn($mr);
		}
		
		$comment['content_id'] = I('content_id');
		$comment['create_user_id'] = I('create_user_id');
		$comment['rid'] = I('rid');
		
		
		
		$rid = I('rid');
		if($rid){
			$comment['type'] = 2;
			$ruid =  $commentgg->findFieldById($rid,'create_user_id');
		}else{
			$comment['type'] = 1;
		}
				
	    $nid =  $commentgg->add($comment);
		$tjnotice->addcits($nid);
		
		$data = $commentgg->find($nid);
		$data['createUser'] = $user->find($data['create_user_id']);
		
		if($data['rid']){
			$ee = $commentgg->find($data['rid']);
			$data['replyUser'] = $user->find($ee['create_user_id']);
		}
		$data['result'] = '0';
		$data['message'] = '评论成功';
		
		action_log('commentgg_msave','commentgg',$uid,$uid);
		
		$this->ajaxReturn($data);
	}
	
	
	
	//公告
	public function mdelete(){
	
	
		$commentgg = D('Common/Commentgg');
		$tjnotice = D('Tjnotice');
		
		$uid = I('uid');
		$id = I('id');
		$list = $commentgg->where("rid=".$id)->select();
		
		foreach($list as $data ){
			$commentgg->delete($data['id']);
		    $tjnotice->lostcits($data['id']);
		}
		
		$commentgg->delete($id);
		$tjnotice->lostcits($id);
		
		$cm['result'] = '0';
		$cm['message'] = '删除评论成功';
	
		$this->ajaxReturn($cm);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    



}