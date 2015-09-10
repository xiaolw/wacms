<?php
/**
 * @description 字典
 * @Author: lipeng
 * @CreateTime: 2015-08-04 10:41:09
 */

namespace Admin\Controller;

class DictsController extends AdminController{

    protected $Dicts;

    public function _initialize(){
        parent::_initialize();
        $this->Dicts=D('dicts');
    }

    // 字典 - 列表
    public function index(){
        $list=$this->lists($this->Dicts,null,'create_time desc',true);
        $this->assign('list',$list);
        $this->assign('meta_title','字典管理');
        $this->display();
    }

    // 字典 - 查看
    public function form(){
        if(I('param.id')){
            $this->assign('info',$this->Dicts->find(I('param.id')));
            $this->assign('meta_title','编辑字典');
     
        }
        else{
            $this->assign('meta_title','添加字典');
            
        }
        $this->display();
    }

    // 字典 - 编辑
    public function save(){
        if(I('param.id')){
            $_POST['update_date'] = NOW_TIME;
            if($this->Dicts->create() && $this->Dicts->save()){
                $this->success('字典更新成功',U('index'));
            }
            else{
                $this->error('Err: '.$this->Dicts->getDbError());
            }
        } else{
            $_POST['update_date'] = NOW_TIME;
            $_POST['create_date'] = NOW_TIME;
            if($this->Dicts->create() && $this->Dicts->add()){
                $this->success('字典更新成功',U('index'));
            }
            else{
                $this->error('Err: '.$this->Dicts->getDbError());
            }
        }
    }

    // 字典 - 删除
    public function del(){
        $id = array_unique((array) I('id', 0));
        if (empty($id)) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id));
        if ($this->Dicts->where($map)->delete()) {
            $this->success('字典删除成功');
        } else {
            $this->error('字典删除失败！' . $this->{__MODULE_NAME__}->getLastSql());
        }
    }
}