<?php

/**
 * @description 音乐人音乐
 * @Author: lipeng
 * @CreateTime: 2015-07-28 09:51:06
 */

namespace Common\Model;
use Think\Model;

/**
* 音乐人音乐模型
* @author lipeng
*/

class MusicModel extends Model {

	protected $connection = 'DB_CONFIG2';
	
    protected $trueTableName = 'cms_resource';

    
    
    /* 自动验证规则 */
    protected $_validate = array(
    		array('filename', 'require', '128音档不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    		array('filename192', 'require', '192音档不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    		array('songphoto', 'require', '192音档不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    		array('songer', 'require', '歌手不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    		array('songname', 'require', '歌名不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    /* 自动完成规则 */
    protected $_auto = array(
    		array('resourcecode', 'getCode', self::MODEL_INSERT, 'function'),
    );
    
    function getCode(){
    	return uniqid();
    }
    
    
    public function getExist($rid){
    	$date = date("Y-m-d");
    	$platform = I('platform','others');
    	$map['create_time'] = $date;
    	$map['id'] = $nid;
    	$map['platform'] = $platform;
    
    	$data = $this->where($map)->find();
    	if($data){
    		return $data[id];
    	}else{
    		$id =  $this->add($map);
    		return $id;
    	}
    }
    
    
    public function addypits($rid){
    	$id = $this->getExist($rid);
    	$map['id'] = $id;
    	$data = $this->where($map)->setInc('ypits');
    }
    
}