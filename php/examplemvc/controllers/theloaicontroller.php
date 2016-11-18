<?php
	class TheloaiController extends BaseController{
		public function __construct($action,$url){
			session_start();
			require("models/TheloaiModel.php");
			$this->model = new TheloaiModel();
			parent::__construct($action, $url);

			/*

			*/

		}
		public function danhsach(){
			$theloai = $this->model->layTatCaTheLoai();
			//$theloai_phantrang = $this->phantrang($this->start,$this->limit);
			$data = array("theloai"=>$theloai);

			$this->view->output('admin/theloai/index',$data,"admintemplate");
		}
		public function them(){
			$error = array();
			/*Kiểm tra tên thể loại nhập vào có khác rỗng không*/
			if (!isset($_POST['tentheloai'])) {
				$error = array();
			}else if (isset($_POST['tentheloai']) && $_POST['tentheloai'] == "") {
				$error['error'] = "Bạn chưa nhập tên thể loại";	
			}else{
				$tentheloai = $_POST['tentheloai'];
			}

			if (isset($_POST['theloai_id'])) {
				$theloai_id = $_POST['theloai_id'];
			}


			//$theloai_phantrang = $this->phantrang($this->start,$this->limit);

			$theloai = $this->model->layTatCaTheLoai();

			if (isset($tentheloai) && isset($theloai_id)) {
				$created_at = gmdate('Y:m:d H:i:s',time() + 7*3600);
				$rowCount = $this->model->Them($tentheloai,$created_at,$theloai_id);
				if ($rowCount > 0) {
					$theloai = $this->model->layTatCaTheLoai();
					$message['message'] = "Thêm thành công";
				}
			}else{
				$message = array();
			}

			$data = array("theloai" => $theloai,"error" => $error,"message" => $message);
			$this->view->output("admin/theloai/index",$data,"admintemplate");

		}
		public function sua(){
			$error = array();
			$id = $_GET['id'];
			/*Kiểm tra tên thể loại nhập vào có khác rỗng không*/
			if (!isset($_POST['tentheloai'])) {
				$error = array();
			}else if (isset($_POST['tentheloai']) && $_POST['tentheloai'] == "") {
				$error['error'] = "Bạn chưa nhập tên thể loại";	
			}else{
				$tentheloai = $_POST['tentheloai'];
			}

			if (isset($_POST['theloai_id'])) {
				$theloai_id = $_POST['theloai_id'];
			}


			$theloai = $this->model->layTatCaTheLoai();

			
			$mottheloai = $this->model->layTheLoaiTheoId($id);
			if (isset($tentheloai) && isset($theloai_id)) {
				$created_at = gmdate('Y:m:d H:i:s',time() + 7*3600);
				$rowCount = $this->model->Sua($tentheloai,$created_at,$theloai_id,$id);
				$mottheloai = $this->model->layTheLoaiTheoId($id);
				$theloai = $this->model->layTatCaTheLoai();
				if ($rowCount > 0) {
					$message['message'] = "Sửa thành công";
				}
			}else{
				$message = array();
			}

			$data = array("theloai" => $theloai,"error" => $error,"message" => $message,"mottheloai"=>$mottheloai);
			$this->view->output("admin/theloai/index",$data,"admintemplate");
		}
		public function xoa(){
			$id =(int) $_GET['id'];
			$rowCount = $this->model->Xoa($id);
			$this->view->redirect("index.php?controller=theloai&action=danhsach");
		}
		/*
			Phương thức trả về mảng các thẻ loại theo câu lệnh sql:
			SELECT * FROM theloai LIMIT start,limit
		*/
		public function phantrang($start,$limit){

			/*$data: trả về mảng dữ liệu*/
			$data = $this->model->laytheloai($start,$limit);
			return $data;
		}


	}