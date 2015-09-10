<?php

/**
 * @description 有品
 * @Author: lipeng
 * @CreateTime: 2015-08-11 16:01:28
 */

namespace Common\Model;
use Think\Model;

/**
* 有品模型
* @author lipeng
*/

class TjnoticeModel extends Model {

 

    /* 自动验证规则 */
    protected $_validate = array(

    );
    /* 自动完成规则 */
    protected $_auto = array(

    );
    
    
    public function getExist($nid){
    	$date = date("Y-m-d");
    	$platform = I('platform','others');
    	$map['create_time'] = $date;
    	$map['nid'] = $nid;	
    	$map['platform'] = $platform;
    	 
    	$data = $this->where($map)->find();
    	if($data){
    		return $data[id];
    	}else{
    		$id =  $this->add($map);
    		return $id;
    	}
    }

    
    public function addiits($nid){
    	$id = $this->getExist($nid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setInc('iits');
    }
    
    
    
    public function addoits($nid){
    	$id = $this->getExist($nid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setInc('oits');
    }
    
    
    public function addhits($yid){
    	$id = $this->getExist($yid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setInc('hits');
    }
    
    public function addview($yid){
    	$id = $this->getExist($yid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setInc('view');
    }
    
    public function addcits($yid){
    	$id = $this->getExist($yid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setInc('cits');
    }
    
    public function lostcits($yid){
    	$id = $this->getExist($yid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setDec('cits');
    }
}