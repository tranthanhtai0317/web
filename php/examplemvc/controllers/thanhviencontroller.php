<?php
	class ThanhvienController extends BaseController{
		public function __construct($action,$url){
			require("models/ThanhvienModel.php");
			$this->ThanhvienModel = new ThanhvienModel();
			parent::__construct($action,$url);

			$array = $this->ThanhvienModel->layTatCaThanhVien();
			/*Tổng record*/
			$this->total_record = count($array);
			/*$limit: Số record hiển thị trên web*/
			$this->limit = 9;
			/*$total_page: tổng số trang*/
			$this->total_page = ceil($this->total_record/$this->limit);
			/*$current_page: trang hiện tại*/
			if (isset($_GET['page'])) {
				$this->current_page = $_GET['page'];
			}else{
				$this->current_page = 1;
			}

			$this->start = ($this->current_page - 1) * $this->limit;	
		}

		public function danhsach(){
			$thanhvien = $this->ThanhvienModel->layThanhVien($this->start,$this->limit);
			$data = array("thanhvien" => $thanhvien,"total_page" =>$this->total_page);
			$this->view->output("admin/thanhvien/index",$data,"admintemplate");
		}

		public function them(){
			if (isset($_POST['submit'])) {
				$error = array();
				if (isset($_POST['hoten']) && $_POST['hoten'] != "") {
					$hoten = $_POST['hoten'];
				}else{
					$error['error_hoten'] = "Bạn chưa nhập họ tên.";
				}
				if (isset($_POST['email']) && $_POST['email'] != "") {
					$email = $_POST['email'];
				}else{
					$error['error_email'] = "Bạn chưa nhập email.";
				}
				if (isset($_POST['password']) && $_POST['password'] != "") {
					$password = $_POST['password'];
				}else{
					$error['error_password'] = "Bạn chưa nhập password.";
				}
				if (isset($_POST['level']) && $_POST['level'] != "") {
					$level = $_POST['level'];
				}else{
					$error['error_level'] = "Bạn chưa nhập level.";
				}
				if (!$error) {
					$created_at = gmdate('Y:m:d H:i:s',time() + 7*3600);
					$rowCount = $this->ThanhvienModel->Them($hoten,$email,$password,$level,$created_at);
					if ($rowCount) {
						$message['thanhcong'] = "Thêm thành viên thành công.";
					}else{
						$message = array();
					}
				}else{
					$message = array();
				}												
			}else{
				$error = array();
				$message = array();
			}

			$data = array("error"=>$error,"message"=>$message);
			$this->view->output("admin/thanhvien/index",$data,"admintemplate");
		}

		public function sua(){
			$id = (int)$_GET['id'];
			if (isset($_POST['submit'])) {
				$error = array();
				if (isset($_POST['hoten']) && $_POST['hoten'] != "") {
					$hoten = $_POST['hoten'];
				}else{
					$error['error_hoten'] = "Bạn chưa nhập họ tên.";
				}
				if (isset($_POST['email']) && $_POST['email'] != "") {
					$email = $_POST['email'];
				}else{
					$error['error_email'] = "Bạn chưa nhập email.";
				}
				if (isset($_POST['password']) && $_POST['password'] != "") {
					$password = $_POST['password'];
				}else{
					$error['error_password'] = "Bạn chưa nhập password.";
				}
				if (isset($_POST['level']) && $_POST['level'] != "") {
					$level = $_POST['level'];
				}else{
					$error['error_level'] = "Bạn chưa nhập level.";
				}
				if (!$error) {
					$updated_at = gmdate('Y:m:d H:i:s',time() + 7*3600);
					$rowCount = $this->ThanhvienModel->Sua($hoten,$email,$password,$level,$updated_at,$id);
					if ($rowCount) {
						$message['thanhcong'] = "Sửa thành viên thành công.";
					}else{
						$message = array();
					}
				}else{
					$message = array();
				}												
			}else{
				$error = array();
				$message = array();
			}
			$motthanhvien = $this->ThanhvienModel->layThanhVienTheoId($id);
			$data = array("motthanhvien"=>$motthanhvien,"error"=>$error,"message"=>$message);
			$this->view->output("admin/thanhvien/index",$data,"admintemplate");
		}

		public function xoa($id){
			$id = (int)$_GET['id'];
			$this->ThanhvienModel->Xoa($id);
			$this->view->redirect("index.php?controller=thanhvien&action=danhsach");
		}		
	}