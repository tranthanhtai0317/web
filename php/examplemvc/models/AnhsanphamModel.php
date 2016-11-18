<?php
	class AnhsanphamModel extends Database{

		public function layAnh($id){
			$query = "SELECT * FROM anh_sanpham WHERE id = ?";
			$this->setQuery($query);
			return $this->getRow(array($id));			
		}

		public function layAnhTheoSanPhamId($sanpham_id){
			$query = "SELECT * FROM anh_sanpham WHERE sanpham_id = ?";

			$this->setQuery($query);
			return $this->getAllRows(array($sanpham_id));
		}

		public function Them($path,$sanpham_id){
			$query = "INSERT INTO anh_sanpham (duongdan,sanpham_id) VALUES (?,?)";
			$this->setQuery($query);
			$this->execute(array($path,$sanpham_id));
			return $this->getLastId();
		}
		public function Xoa($id){
			$query = "DELETE FROM anh_sanpham WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($id))->rowCount();
		}
		public function XoaTheoSanPhamId($sanpham_id){
			$query = "DELETE FROM anh_sanpham WHERE sanpham_id = ?";
			$this->setQuery($query);
			return $this->execute(array($sanpham_id))->rowCount();			
		}


	}