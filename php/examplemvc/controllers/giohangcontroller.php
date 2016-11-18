<?php 
	class GiohangController extends BaseController{
		public function __construct($action,$url){
			session_start();
			parent::__construct($action,$url);
			require("libs/giohang.php");
			$this->giohang  = new Giohang();
		}

		public function xem(){
			$sanpham = array();
			if (isset($_SESSION['giohang'])) {
				foreach ($_SESSION['giohang'] as $key => $value) {
					$sanpham[$key] = $this->giohang->getSanPham($value['id']);
					$sanpham[$key]['soluong_giohang'] = $value['soluong'];
				}
			}
			$tongtien = $this->tongtien();
			$data = array("sanpham"=>$sanpham,"tongtien"=>$tongtien);
			$this->view->output("frontend/giohang",$data,"frontendtemplate");
		}
		public function sua(){
			$id = (int)$_GET['id'];
			$soluong = $_POST['soluong'];
			$this->giohang->sua_sanpham($id,$soluong);
			$this->view->redirect("index.php?controller=giohang&action=xem");
		}
		public function them(){
			$id = (int)$_GET['id'];
			$this->giohang->them_sanpham($id);
			$this->view->redirect("index.php?controller=giohang&action=xem");
		}

		public function xoa(){
			$id =(int) $_GET['id'];
			$this->giohang->xoa_sanpham($id);
			$this->view->redirect("index.php?controller=giohang&action=xem");
		}
		public function tongtien(){
			return $this->giohang->tongtien();
		}
	}