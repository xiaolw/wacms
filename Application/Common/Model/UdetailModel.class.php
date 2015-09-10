<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-1-26
 * Time: 下午4:29
 * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
 */

namespace Common\Model;

use Think\Model;

class UdetailModel extends Model
{
    protected $tableName = 'users_detail';
    
    protected $_validate = array(
    		 array('name','require','艺名必须！'),
    		array('summary','require','简介不能为空！'),
    		array('phone','require','电话不能为空！'),
    
    );
  


}















