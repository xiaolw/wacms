<?php

/**
 * @description 公告
 * @Author: lipeng
 * @CreateTime: 2015-08-11 16:02:05
 */

namespace Common\Model;
use Think\Model;

/**
* 公告模型
* @author lipeng
*/

class UserModel extends Model{
	
	protected $connection = 'DB_CONFIG2';

    protected $trueTableName = 'sys_user_detail';

    /* 自动验证规则 */
    protected $_validate = array(
    );
    /* 自动完成规则 */
    protected $_auto = array(

    );
}