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

class DevnoticeModel extends Model {

 

    /* 自动验证规则 */
    protected $_validate = array(

    );
    /* 自动完成规则 */
    protected $_auto = array(

    );
    
    
    public function getExist($nid,$type){
    	$deviceid = I('deviceid');
    	$map['nid'] = $nid;
    	$map['deviceid'] = $deviceid;
    	$map['type'] = $type;
    	
    	$data = $this->where($map)->find();
    	if($data){
    		return true;
    	}else{
    		$map['create_time'] = NOW_TIME;
    		$this->add($map);
    		return false;
    	}
    }
}