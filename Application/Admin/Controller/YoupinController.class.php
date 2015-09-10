<?php
/**
 * @description 有品
 * @Author: lipeng
 * @CreateTime: 2015-08-11 16:01:28
 */

namespace Admin\Controller;

class YoupinController extends AdminController{

    protected $Youpin;
    protected $Ydetail;

    public function _initialize(){
        parent::_initialize();
        $this->Youpin=M('youpin');
        $this->Ydetail=M('youpinDetail');
    }

    // 有品 - 列表
    public function index(){
    	
    	$group  =   AuthGroupModel::getUserGroup(UID);
    	if($group[0]['group_id']==2){
    		$map['uid'] =UID;
    	}
    	
    	$id = I('param.id');
    	if(!empty($id)){
    		$map['id'] = $id;
    	}
    	
    	$title = I('param.title');
    	if(!empty($title)){
    		$map['title'] = array('like','%'.$title.'%');
    	}
    	
    	
    	$uid = I('param.uid');
    	if(!empty($uid)){
    		$map['uid'] = $uid;
    	}
    	
    	
        $list=$this->lists($this->Youpin,$map,'create_time desc',true);
        $this->assign('list',$list);
        $this->assign('meta_title','有品管理');
        $this->display();
    }

    // 有品 - 查看
    public function form(){
        if(I('param.id')){
        	
        	$ydetail =   $this->Ydetail->find(I('param.id'));
        	$youpin =  $this->Youpin->find(I('param.id'));
        	$info = array_merge($ydetail,$youpin);
        	
            $this->assign('info',$info);
            $this->assign('meta_title','编辑有品');
        }
        else{
            $this->assign('meta_title','添加有品');
       
        }
        $this->display();
    }

    // 有品 - 编辑
    public function save(){
        if(I('param.id')){
            $_POST['update_date'] = NOW_TIME;
            
            
            if($this->Youpin->create() && $this->Youpin->save()){
            }
            else{
                $this->error('Err: '.$this->Youpin->getDbError());
            }
            
            if($this->Ydetail->create() && $this->Ydetail->save()){
            	$this->success('有品更新成功',U('index'));
            }
            else{
            	$this->Youpin->where('id='.I('param.id'))->delete();
            	$this->error('Err: '.$this->Ydetail->getDbError());
            }
        } else{
            $_POST['update_date'] = NOW_TIME;
            $_POST['create_date'] = NOW_TIME;
            
            if($this->Ydetail->create() && $this->Ydetail->add()){
            	
            }
            else{
            	$this->error('Err: '.$this->Ydetail->getDbError());
            }
            
            if($this->Youpin->create() && $this->Youpin->add()){
                $this->success('有品新增成功',U('index'));
            }
            else{
                $this->error('Err: '.$this->Youpin->getDbError());
            }
        }
    }
    
    /**
     * 广告选择列表
     */
    function  selectList() {
    	$list=$this->lists($this->Youpin,null,'create_time desc',true);
    	$this->assign('list',$list);
    	$this->assign('meta_title','公告管理');
    	$this->display();
    }
    
    
    //通过ID获取列表
    public function findByIds() {
    	$id = array_unique((array) I('id', 0));
    	$map = array('id' => array('in', $id));
    	$info = $this->Youpin->field('id,title')->where($map)->select();
    	$this->ajaxReturn($info);
    }
    
    

    // 有品 - 删除
    public function del(){
        $id = array_unique((array) I('id', 0));
        if (empty($id)) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id));
        $data = array('status'=>0);
        if ($this->Youpin->where($map)->save($data)) {
            $this->success('有品删除成功');
        } else {
            $this->error('有品删除失败！' . $this->{__MODULE_NAME__}->getLastSql());
        }
    }
    
    
    
    
    
}