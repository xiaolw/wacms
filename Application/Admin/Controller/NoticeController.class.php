<?php
/**
 * @description 公告
 * @Author: lipeng
 * @CreateTime: 2015-08-11 16:02:05
 */

namespace Admin\Controller;

class NoticeController extends AdminController{

    protected $Notice;
    protected $Ndetail;

    public function _initialize(){
        parent::_initialize();
        $this->Notice=M('notice');
        $this->Ndetail=M('noticeDetail');
    }

    // 公告 - 列表
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
    	  	
        $list=$this->lists($this->Notice,$map,'create_time desc',true);
        $this->assign('list',$list);
        $this->assign('meta_title','公告管理');
        $this->display();
    }

    // 公告 - 查看
    public function form(){
        if(I('param.id')){
        	
        	$ndetail =   $this->Ndetail->find(I('param.id'));
        	$notice =  $this->Notice->find(I('param.id'));
        	$info = array_merge($ndetail,$notice);
        	
            $this->assign('info', $info);
            $this->assign('meta_title','编辑公告');
     
        } else{
            $this->assign('meta_title','添加公告');
            
        }
        $this->display();
    }

    // 公告 - 编辑
    public function save(){
    	
    	$group  =   AuthGroupModel::getUserGroup(UID);
    	if($group[0]['group_id']==1){
    		$_POST['uid'] = 1;
    	}
    	
    	$id = I('param.id');
        if($id){
        	
        	$Music = M('Muisc');
        	$gdlist = $Music->field('id')->where('ggid='.$id)->select();
        	if(!empty($gdlist)){
	        	foreach ($gdlist as $gd){
	        		$Music-> where('id='.$gd['id'])->setField('del_flag','2');
	        	}
        	}
        	
        	
            $_POST['update_date'] = NOW_TIME;
            
           
            
            if($this->Notice->create() && $this->Notice->save()){
               
            }
            else{
                $this->error('Err: '.$this->Notice->getDbError());
            }
            
            if($this->Ndetail->create() && $this->Ndetail>save()){
            	$this->success('公告更新成功',U('index'));
            }
            else{
            	$this->Notice->where('id='.I('param.id'))->delete();
            	$this->error('Err: '.$this->Notice->getDbError());
            }
        } else{
            $_POST['update_date'] = NOW_TIME;
            $_POST['create_date'] = NOW_TIME;
            
            
            if($this->Ndetail->create() && $this->Ndetail>add()){
            	$this->success('公告更新成功',U('index'));
            }
            else{
            	
            	$this->error('Err: '.$this->Ndetail->getDbError());
            }
            
            if($this->Notice->create() && $this->Notice->add()){
                $this->success('公告更新成功',U('index'));
            }
            else{
                $this->error('Err: '.$this->Notice->getDbError());
            }
        }
    }
    
    
    
    /**
     * 公告选择列表
     */
   function  selectList() {
    	$list=$this->lists($this->Notice,null,'create_time desc',true);
        $this->assign('list',$list);
        $this->assign('meta_title','公告管理');
        $this->display();
    }
    
    
    //通过ID获取列表
    public function findByIds() {
    	$id = array_unique((array) I('id', 0));
        $map = array('id' => array('in', $id));
    	$info = $this->Notice->field('id,title')->where($map)->select();
    	$this->ajaxReturn($info);
    }
    

    
    

    // 公告 - 删除
    public function del(){
        $id = array_unique((array) I('id', 0));
        if (empty($id)) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id));
        $data = array('status'=>0);
        if ($this->Notice->where($map)->save($data)) {
            $this->success('公告删除成功');
        } else {
            $this->error('公告删除失败！' . $this->{__MODULE_NAME__}->getLastSql());
        }
    }
    

    
    
}