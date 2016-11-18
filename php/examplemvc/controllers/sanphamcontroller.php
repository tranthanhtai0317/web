<?php 
	class SanphamController extends BaseController{
		public function __construct($action,$url){
			require("models/SanphamModel.php");
			require("models/TheloaiModel.php");
			require("models/AnhsanphamModel.php");
			$this->TheloaiModel = new TheloaiModel();
			$this->SanphamModel = new SanphamModel();
			$this->AnhsanphamModel = new AnhsanphamModel();
			parent::__construct($action, $url);


			$array = $this->SanphamModel->layTatCaSanPham();
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
			$sanpham = $this->SanphamModel->laySanPham($this->start,$this->limit);
			$data = array("sanpham" => $sanpham,"total_page" =>$this->total_page);
			$this->view->output("admin/sanpham/index",$data,"admintemplate");
		}

		public function them(){
			$theloai = $this->TheloaiModel->layTatCaTheLoai();

			if (isset($_POST['submit'])) {
				$error = array();

				if (isset($_POST['tensanpham']) && $_POST['tensanpham'] != "") {
					$tensanpham = $_POST['tensanpham'];
				}else{
					$error['error_tensanpham'] = "Bạn chưa nhập tên sản phẩm.";
				}

				if (isset($_POST['giaca']) && $_POST['giaca'] != "") {
					$giaca = $_POST['giaca'];
				}else{
					$error['error_giaca'] = "Bạn chưa nhập giá sản phẩm.";
				}

				if (isset($_POST['soluong']) && $_POST['soluong'] != "") {
					$soluong = $_POST['soluong'];
				}else{
					$error['error_soluong'] = "Bạn chưa nhập số lượng sản phẩm.";
				}

				if (isset($_POST['gioithieu'])  && $_POST['gioithieu'] != "") {
					$gioithieu = $_POST['gioithieu'];
				}else{
					$error['error_gioithieu'] = "Bạn chưa nhập giới thiệu sản phẩm.";
				}

				if (isset($_POST['sale'])  && $_POST['sale'] != "") {
					$sale = $_POST['sale'];
				}else{
					$error['error_sale'] = "Bạn chưa nhập sale sản phẩm.";
				}

				if (isset($_POST['noibat'])  && $_POST['noibat'] != "") {
					$noibat = $_POST['noibat'];
				}else{
					$noibat = 0;
				}
				if (isset($_POST['theloai_id'])  && $_POST['theloai_id'] != "") {
					$theloai_id = $_POST['theloai_id'];
				}				
				$created_at = gmdate('Y:m:d H:i:s',time() + 7*3600);
				if (!$error) {
					$lastID = $this->SanphamModel->Them($tensanpham,$giaca,$soluong,$gioithieu,$sale,$noibat,$theloai_id,$created_at);
					if ($lastID) {
						$message['thanhcong'] = "Thêm sản phẩm thành công.";
					}else{
						$message = array();
					}
				}else{
					$message = array();
				}
				

				if (isset($_FILES['anh'])) {
					$count = 0;
					foreach ($_FILES['anh']['name'] as $key => $value) {
						if ($_FILES['anh']['error'][$key] > 0) {

						}else{
							$client_path = $_FILES['anh']['tmp_name'][$key];
							$server_path = "upload/sanpham/".rand()."_".$value;
							if ($count == 0) {
								$this->SanphamModel->SuaAnh($tensanpham,$giaca,$soluong,$gioithieu,$server_path,$theloai_id,$created_at,$lastID);
								$count++;
							}
							move_uploaded_file($client_path,$server_path);
							$this->AnhsanphamModel->Them($server_path,$lastID);
						}
						
					}
				}
			}else{
				$error = array();
				$message = array();
			}
			$data = array("theloai" => $theloai,"error"=>$error,"message" =>$message);
			$this->view->output("admin/sanpham/index",$data,"admintemplate");
		}

		public function sua(){
			$id = (int)$_GET['id'];
			
			$theloai = $this->TheloaiModel->layTatCaTheLoai();
		
			if (isset($_POST['submit'])) {
				$error = array();

				if (isset($_POST['tensanpham']) && $_POST['tensanpham'] != "") {
					$tensanpham = $_POST['tensanpham'];
				}else{
					$error['error_tensanpham'] = "Bạn chưa nhập tên sản phẩm.";
				}

				if (isset($_POST['giaca']) && $_POST['giaca'] != "") {
					$giaca = $_POST['giaca'];
				}else{
					$error['error_giaca'] = "Bạn chưa nhập giá sản phẩm.";
				}

				if (isset($_POST['soluong']) && $_POST['soluong'] != "") {
					$soluong = $_POST['soluong'];
				}else{
					$error['error_soluong'] = "Bạn chưa nhập số lượng sản phẩm.";
				}

				if (isset($_POST['gioithieu'])  && $_POST['gioithieu'] != "") {
					$gioithieu = $_POST['gioithieu'];
				}else{
					$error['error_gioithieu'] = "Bạn chưa nhập giới thiệu sản phẩm.";
				}

				if (isset($_POST['theloai_id'])  && $_POST['theloai_id'] != "") {
					$theloai_id = $_POST['theloai_id'];
				}else{
					$error['error_gioithieu'] = "Bạn chưa nhập giới thiệu sản phẩm.";
				}
				$created_at = gmdate('Y:m:d H:i:s',time() + 7*3600);
				if (!$error) {
					$rowCount = $this->SanphamModel->Sua($tensanpham,$giaca,$soluong,$gioithieu,$theloai_id,$created_at,$id);
					if ($rowCount) {
						$message['thanhcong'] = "Sửa sản phẩm thành công.";
					}else{
						$message = array();
					}
				}else{
					$message = array();
				}
				

				if (isset($_FILES['anh'])) {
					
					$count = 0;
					foreach ($_FILES['anh']['name'] as $key => $value) {
						if ($_FILES['anh']['error'][$key] > 0) {

						}else{
							$client_path = $_FILES['anh']['tmp_name'][$key];
							$server_path = "upload/sanpham/".rand()."_".$value;
							if ($count == 0) {
								$this->SanphamModel->SuaAnh($tensanpham,$giaca,$soluong,$gioithieu,$server_path,$theloai_id,$created_at,$id);
								$count++;
							}
							move_uploaded_file($client_path,$server_path);
							$this->AnhsanphamModel->Them($server_path,$id);
						}
						
					}
				}
				
			}else{
				$error = array();
				$message = array();
			}
			$anhsanpham = $this->AnhsanphamModel->layAnhTheoSanPhamId($id);
			$motsanpham = $this->SanphamModel->laySanPhamTheoId($id);
			$data = array("theloai" => $theloai,"motsanpham" => $motsanpham,"anhsanpham"=>$anhsanpham,"error"=>$error,"message" =>$message);
			$this->view->output("admin/sanpham/index",$data,"admintemplate");
		}

		public function xoa(){
			$id = (int) $_GET['id'];
			
			$anh = $this->AnhsanphamModel->layAnhTheoSanPhamId($id);
			foreach ($anh as $key => $value) {
				unlink($value['duongdan']);
			}
			$this->SanphamModel->Xoa($id);
			$this->AnhsanphamModel->XoaTheoSanPhamId($id);
			$this->view->redirect("index.php?controller=sanpham&action=danhsach");
		}

		public function xoaanh(){

			$anh_id =(int) $_GET['anh'];
			$sanpham_id =(int) $_GET['id'];
			$anh = $this->AnhsanphamModel->layAnh($anh_id);
			unlink($anh['duongdan']);
			$this->AnhsanphamModel->Xoa($anh_id);
			
			//$data = array("theloai" => $theloai,"motsanpham" => $motsanpham,"anhsanpham"=>$anhsanpham,"error"=>$error,"message" =>$message);
			$this->view->redirect("index.php?controller=sanpham&action=sua&id=$sanpham_id");
		}

	}

		