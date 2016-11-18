<?php 
	class Giohang {
		public function __construct(){
			require("Models/SanphamModel.php");
			$this->SanphamModel = new SanphamModel();

		}
		public function getSanPham($id){
			return $this->SanphamModel->laySanPhamTheoId($id);
		}

		public function tongtien(){
			$sum = 0;
			if (isset($_SESSION['giohang'])) {
				foreach ($_SESSION['giohang'] as $key => $value) {
				$id = (int)$value['id'];
				$soluong = (int)$value['soluong'];
				$sanpham = $this->getSanPham($id);
				$giaca = $sanpham['giaca'];
				$sale = $sanpham['sale'];
				$sum = $sum + (($giaca * $soluong) - ($giaca * $soluong) * $sale/100);
			}			
			}

			return $sum;
		}

		public function xoa_sanpham($id){
			$id = (int)$id;
			$max = count($_SESSION['giohang']);
			for ($i=0; $i < $max; $i++) { 
				if ($id == $_SESSION['giohang'][$i]['id']) {
					unset($_SESSION['giohang'][$i]);
					break;
				}
			}
		}
		public function sua_sanpham($id,$soluong=1){
			if ($id < 1 && $soluong < 1) {
				return;
			}
			if (is_array($_SESSION['giohang'])) {
				foreach ($_SESSION['giohang'] as $key => $value) {
					if ($id == $value['id']) {
							$_SESSION['giohang'][$key]['soluong'] = $soluong;
							break;
					}
				}				
			}
		}
		public function them_sanpham($id,$soluong = 1){
			if ($id < 1 && $soluong < 1) {
				return;
			}
			if (is_array($_SESSION['giohang'])) {
				if ($this->tontai_sanpham($id)) {
					return;
				}
				$max = count($_SESSION['giohang']);
				$_SESSION['giohang'][$max]['id'] = $id;
				$_SESSION['giohang'][$max]['soluong'] = $soluong;
			}else{
				$_SESSION['giohang'] = array();
				$_SESSION['giohang'][0]['id'] = $id;
				$_SESSION['giohang'][0]['soluong'] = $soluong;
			}
		}
		public function tontai_sanpham($id){
			$id = (int)$id;
			$max = count($_SESSION['giohang']);
			$flag = 0;
			foreach ($_SESSION['giohang'] as $key => $value) {
				if ($id == $value['id']) {
					$flag = 1;
					break;
				}
			}
			return $flag;
		}
	}