<?php

namespace Home\Controller;


/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class MController extends HomeController
{
	
	protected $Notice;
	protected $Ndetail;
	
	protected $Youpin;
	protected $Ydetail;
	
	public function _initialize(){
		parent::_initialize();
		$this->Notice=D('notice');
		$this->Ndetail=D('noticeDetail');
		
		$this->Youpin=D('youpin');
		$this->Ydetail=D('youpinDetail');
	}
	
	public function index(){
		echo date("Y-m-d");
	}

	//公告
	public function notice(){
		
		
		$tjnotice = D('Common/Tjnotice');
		$devnotice = D('Common/Devnotice');
		
		
		
		$mid = I('param.mid');
		$Music = D('Music');
		$ggid = $Music->cache(true)->getFieldById($mid,'ggid');
		
		
		if(empty($ggid)){
			$ndata = $this->Notice->field('id')->where('uid=1 and status=1')->limit(1)->order('rand()')->find();
			$ggid = $ndata['id'];
		}
			
		$map['id'] = $ggid;
			
		
		$info = $this->Notice->cache(true)->where($map)->find();
		$this->ajaxReturn($info);
	}
	
	
	public function tjnotice(){
	
	
		$tjnotice = D('Common/Tjnotice');
		$devnotice = D('Common/Devnotice');
	
	
	 $ggid = I('ggid');
		$mid = I('param.ggid');
		$map['id'] = $ggid;
			
		//验证验证码
		if(encrypt()){
			//验证设备
			if(!$devnotice->getExist($ggid,1)){
				$tjnotice->addiits($ggid);
			}
		}else{
			$return['result'] = 002;
			$return['meassage'] ="验证错误";
			//	$this->ajaxReturn($return);
		}
		$tjnotice->addhits($ggid);	
		$return['result'] = 0;
		$return['meassage'] ="统计成功";
		$this->ajaxReturn($return);
	}
	
	
	//公告详情
	public function noticeDetail(){
		
		$tjnotice = D('Tjnotice');
		$devnotice = D('Devnotice');
		
	   $ggid = I('param.ggid');
	   $cache = I('param.cache');
	   $b=123;
	   if($cache=='false'){
	   	  $b = false;
	   }
	  // echo $b.'我的';
	//	$Music = M('Muisc');
	//	$ggid = $Music->cache(true)->getFieldById($mid,'ggid');
		
		
		$map['id'] = $ggid;
		
			
		$notice = $this->Notice->cache($b)->where($map)->find();
		//$hits = $tjnotice->where('nid='.$$ggid)->sum("hits");
		$tj =   $tjnotice->query("select sum(view) as view,sum(cits) as cits from oc_tjnotice where nid=".$ggid);
		$notice['view'] = $tj['0']['view'];
		$notice['cits'] = $tj['0']['cits'];
		$detail = $this->Ndetail->cache($b)->where($map)->find();
		$info = array_merge($notice,$detail);
		$this->ajaxReturn($info);
	}
	
	//公告详情点击
	public function tjnoticeDetail(){
	
		$tjnotice = D('Tjnotice');
		$devnotice = D('Devnotice');
	
		$ggid = I('param.ggid');
		//	$Music = M('Muisc');
		//	$ggid = $Music->cache(true)->getFieldById($mid,'ggid');
	
	
		$map['id'] = $ggid;
	
	
		if(encrypt()){
			if(!$devnotice->getExist($ggid,2)){
				$tjnotice->addoits($ggid);
			}
		}else{
			//	$return['result'] = 102;
			//	$return['meassage'] ="验证错误";
			//	$this->ajaxReturn($return);
		}
		$tjnotice->addview($ggid);
	
	
	
		$return['result'] = 0;
		$return['meassage'] ="点击成功";
		$this->ajaxReturn($return);
	}
	
	
	
	
	
	//广告
	public function youpin(){
		$tjyoupin = D('Tjyoupin');
		
		$devyoupin = D('Devyoupin');
		
		
		
		$mid = I('param.mid');
		$Music = D('Common/Music');
		$ypid = $Music->cache(true)->getFieldById($mid,'ypid');
		//$ypid = $Music->where("id=".$mid)->find();
		
		if(empty($ypid)){
			$ndata = $this->Youpin->field('id')->where('uid=1 and status=1')->limit(1)->order('rand()')->find();
			$ypid = $ndata['id'];
		}
		$map['id'] = $ypid;
		
		$detail = $this->Ydetail->cache(true)->where($map)->find();
		
		$youpin = $this->Youpin->cache(true)->where($map)->find();
		
		unset($detail['id']);
		$info = array_merge($youpin,$detail);
		
		$this->ajaxReturn($info);
	}
	
	
	public function tjyoupin(){
		$tjyoupin = D('Tjyoupin');
		$devyoupin = D('Devyoupin');
		$Music = D('Music');
	
	
		$ypid = I('param.ypid');
		
		$mid = I('mid');
	
		$map['id'] = $ypid;
	
	
		//验证验证码
		if(encrypt()){
			//验证设备
			if(!$devyoupin->getExist($ypid,1)){
				$tjyoupin->addiits($ypid);
				$Music->addypits($mid);
			}
		}else{
		
			//	$this->ajaxReturn($return);
		}
	
		$tjyoupin->addhits($ypid);	
		$return['result'] = 0;
		$return['meassage'] ="点击成功";
		$this->ajaxReturn($return);
	}
	
	
	//广告点击
	public function tjyoupinDetail(){
			$tjyoupin = D('Tjyoupin');
		$devyoupin = D('Devyoupin');
		
		$ypid = I('param.ypid');

		$map['id'] = $ypid;
		
		if(encrypt()){
			if(!$devyoupin->getExist($ypid,2)){
			  $tjyoupin->addoits($ypid);
			}
		}else{
			
		//	$this->ajaxReturn($return);
		}
		$tjyoupin->addview($ypid);
		
// 		$notice = $this->Youpin->cache(true)->where($map)->find();
		
		
// 		$detail = $this->Ydetail->cache(true)->where($map)->find();
// 		$info = array_merge($notice,$detail);
		$return['result'] = 0;
		$return['meassage'] ="点击成功";
		$this->ajaxReturn($return);
	}
	
	
	
	
	
	
	
	
	
	
	
	
    



}