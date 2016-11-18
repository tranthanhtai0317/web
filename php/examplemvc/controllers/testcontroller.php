<?php
	class TestController extends BaseController{
		public function dangky(){
			$data = array('title' =>'My title');
			$this->view->output('user/dangky',$data);
		}
		public function index(){
			$this->view->output('admin/themsanpham');
		}
	}