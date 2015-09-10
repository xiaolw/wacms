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
class MusicController extends HomeController
{
	
	protected $Notice;
	protected $Ndetail;
	
	protected $Youpin;
	protected $Ydetail;
	
	public function _initialize(){
		parent::_initialize();
		$this->Notice=M('notice');
		$this->Ndetail=M('noticeDetail');
		
		$this->Youpin=M('youpin');
		$this->Ydetail=M('youpinDetail');
	}
	
	public function index(){
		echo date("Y-m-d");
	}

	//公告
	public function notice(){
		
		
		$tjnotice = M('Tjnotice');
		
		
		
		$mid = I('param.mid');
		$Music = M('Muisc');
		$ggid = $Music->cache(true)->getFieldById($mid,'ggid');
		$map['id'] = $ggid;
		
		

		
		$tjnotice->addhits($ggid);
		
		$info = $this->Notice->cache(true)->where($map)->find();
		$this->ajaxReturn($info);
	}
	
	//公告详情
	public function noticeDetail(){
		
		$tjnotice = M('Tjnotice');
		
		
		$mid = I('param.mid');
		$Music = M('Muisc');
		$ggid = $Music->cache(true)->getFieldById($mid,'ggid');
		$map['id'] = 1;
		

		$tjnotice->addview($ggid);
		
		$notice = $this->Notice->cache(true)->where($map)->find();
		
		
		$detail = $this->Ndetail->cache(true)->where($map)->find();
		$info = array_merge($notice,$detail);
		$this->ajaxReturn($info);
	}
	
	
	//广告
	public function youpin(){
		$tjyoupin = M('Tjyoupin');

		
		
		
		$mid = I('param.mid');
		$Music = M('Muisc');
		$ypid = $Music->cache(true)->getFieldById($mid,'ypid');
		$map['id'] = $ypid;
		
		
	
		
		$tjyoupin->addhits($ypid);
		
		$info = $this->Youpin->cache(true)->where($map)->find();
		$this->ajaxReturn($info);
	}
	
	
	//广告详情
	public function youpinDetail(){
			$tjyoupin = M('Tjyoupin');

		
		$mid = I('param.mid');
		$Music = M('Muisc');
		$ypid = $Music->cache(true)->getFieldById($mid,'ypid');
		$map['id'] = 1;
		
	
		$tjyoupin->addview($ypid);
		
		$notice = $this->Youpin->cache(true)->where($map)->find();
		
		
		$detail = $this->Ydetail->cache(true)->where($map)->find();
		$info = array_merge($notice,$detail);
		$this->ajaxReturn($info);
	}
	
	
	
	
	
	
	
	
	
	
	
	
    



}