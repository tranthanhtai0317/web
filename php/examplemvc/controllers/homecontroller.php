<?php 
	class HomeController extends BaseController{
		public function __construct($action,$url){
			
			require("Models/TheloaiModel.php");
			require("Models/SanphamModel.php");
			require("Models/AnhsanphamModel.php");
			$this->SanphamModel = new SanphamModel();
			$this->TheloaiModel = new TheloaiModel();
			$this->AnhsanphamModel = new AnhsanphamModel();
			parent::__construct($action,$url);
		}

		public function index(){
			$theloai = $this->TheloaiModel->layTatCaTheLoai();
			$sanpham_moi = $this->SanphamModel->laySanPham(0,9);
			$sanpham_noibat = $this->SanphamModel->laySanPhamTheoDieuKien("noibat = ?",array(1));
			$sanpham_sale = $this->SanphamModel->laySanPhamTheoDieuKien("sale >= ?",array(10));
			$data = array("theloai" => $theloai,"sanpham_moi" =>$sanpham_moi,"sanpham_noibat" => $sanpham_noibat,"sanpham_sale" =>$sanpham_sale);
			$this->view->output("frontend/index",$data,"frontendtemplate");
		}

		public function chitiet(){
			$id = (int)$_GET['id'];
			$start = 0;
			$limit = 9;
			$chitietsanpham = $this->SanphamModel->laySanPhamTheoId($id);
			$sanphamcungdanhmuc = $this->SanphamModel->laySanPhamTheoDieuKien("theloai_id = ? LIMIT ?,?",array((int)$chitietsanpham['theloai_id'],$start,$limit));
			$sanpham_noibat = $this->SanphamModel->laySanPhamTheoDieuKien("noibat = ? LIMIT ?,?",array(1,$start,$limit));
			$anh = $this->AnhsanphamModel->layAnhTheoSanPhamId($id);
			$data = array("chitietsanpham" =>$chitietsanpham,"anh"=>$anh,"sanphamcungdanhmuc" =>$sanphamcungdanhmuc,"sanpham_noibat" => $sanpham_noibat);
			$this->view->output("frontend/chitietsanpham",$data,"frontendtemplate");
		}
	}