<?php

/**
 * @description 音乐人音乐
 * @Author: lipeng
 * @CreateTime: 2015-07-28 09:51:06
 */
namespace Admin\Controller;
use Think\Controller;

class MusicController extends Controller {
	protected $Music;
	public function _initialize() {
		//parent::_initialize ();
		$this->Music = M ( 'music' );
	}

    public function add(){
      $this->display();
    }

	// 音乐人音乐 - 列表
	public function index() {
		
		$group  =   AuthGroupModel::getUserGroup(UID);
		if($group[0]['group_id']==2){
			$map['uid'] =UID;
		}

		$list = $this->lists ( $this->Music, $map, 'create_time desc', true );

		$this->assign ( 'list', $list );
		$this->assign ( 'meta_title', '音乐人音乐管理' );
		$this->display ();
	}

	// 音乐人音乐 - 查看
	public function form() {
		if (I ( 'param.id' )) {
			$this->assign ( 'info', $this->Music->find ( I ( 'param.id' ) ) );
			$this->assign ( 'meta_title', '编辑音乐人音乐' );
		} else {
			$this->assign ( 'meta_title', '添加音乐人音乐' );
		}
		$this->display ();
	}

	// 音乐人音乐 - 编辑
	public function save() {
		$songphoto = I ( 'param.songphoto' );
		if (empty ( $songphoto )) {
			$this->error ( "配图不能为空" );
		} else {
			$_POST ['thumbnail_url'] = D ( 'picture' )->getFieldByUrl ( $songphoto, 'thumbnail_url' );
		}

		if (I ( 'param.id' )) {
			$_POST ['update_date'] = NOW_TIME;

			$_POST ['del_flag'] = 2;

			if ($this->Music->create () && $this->Music->save ()) {
				$this->success ( '音乐人音乐更新等待审核', U ( 'index' ) );
			} else {
				$this->error ( 'Err: ' . $this->Music->getDbError () );
			}
		} else {
			$_POST ['update_date'] = NOW_TIME;
			$_POST ['create_date'] = NOW_TIME;
			$_POST ['del_flag'] = 2;
			if ($this->Music->create () && $this->Music->add ()) {
				$this->success ( '音乐人音乐新增等待审核', U ( 'index' ) );
			} else {
				$this->error ( 'Err: ' . $this->Music->getDbError () );
			}
		}
	}

	// 音乐人音乐 - 审核
	public function audit() {
		$songphoto = I ( 'param.songphoto' );
		if (empty ( $songphoto )) {
			$this->error ( "配图不能为空" );
		} else {
			$_POST ['thumbnail_url'] = D ( 'picture' )->getFieldByUrl ( $songphoto, 'thumbnail_url' );
		}

		$_POST ['update_date'] = NOW_TIME;
		$del_flag = I ( 'param.del_flag' );
		$reason = I ( 'param.reason' );

		if ($del_flag == 4) {
			// 发送验证邮箱
			$url = 'http://' . $_SERVER ['HTTP_HOST'];
			$content = "审核未通过 <br/>" . $url . "<br/>" . modC ( 'WEB_SITE_NAME', '音乐人开放平台', 'Config' ) . "系统自动发送--请勿直接回复<br/>" . date ( 'Y-m-d H:i:s', TIME () ) . "</p>";
			send_mail ( $email, modC ( 'WEB_SITE_NAME', '音乐人开放平台', 'Config' ) . "音乐审核未通过", $content );
		}

		if ($this->Music->create () && $this->Music->save ()) {
			if ($del_flag == 4) {
				$this->success ( '音乐人音乐驳回成功', U ( 'index' ) );
			} else if ($del_flag == 2) {
				$this->success ( '音乐人音乐更新成功', U ( 'index' ) );
			} else if ($del_flag == 1) {
				$this->success ( '音乐人音乐审核成功', U ( 'index' ) );
			}
		} else {
			$this->error ( 'Err: ' . $this->Music->getDbError () );
		}
	}

	// 音乐人音乐 - 删除
	public function del() {
		$id = array_unique ( ( array ) I ( 'id', 0 ) );
		if (empty ( $id )) {
			$this->error ( '请选择要操作的数据!' );
		}
		$map = array (
				'id' => array (
						'in',
						$id
				)
		);
		$data = array (
				'del_flag' => '0'
		);
		if ($this->Music->where ( $map )->save ( $data )) {
			$this->success ( '音乐人音乐删除成功' );
		} else {
			$this->error ( '音乐人音乐删除失败！' . $this->{__MODULE_NAME__}->getLastSql () );
		}
	}
}