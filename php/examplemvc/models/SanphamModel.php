<?php
	class SanphamModel extends Database{


		public function layTatCaSanPham(){
			$query = "SELECT * FROM sanpham";
			$this->setQuery($query);
			return $this->getAllRows();

		}
		public function laySanPhamTheoDieuKien($where,$value){
			$query = "SELECT * FROM sanpham WHERE ".$where;

			$this->setQuery($query);
			return $this->getAllRows($value);
		}
		public function laySanPhamTheoId($id){
			$query = "SELECT * FROM sanpham WHERE id = ?";
			$this->setQuery($query);
			return $this->getRow(array($id));
		}

		public function laySanPham($start,$limit){
			$query = "SELECT * FROM sanpham LIMIT ?,?";
			$this->setQuery($query);
			return $this->getAllRows(array($start,$limit));
		}

		public function Them($tensanpham,$giaca,$soluong,$gioithieu,$sale,$noibat,$theloai_id,$created_at){
			$query = "INSERT INTO sanpham (tensanpham,giaca,soluong,gioithieu,sale,noibat,theloai_id,created_at)
					VALUES(?,?,?,?,?,?,?,?)";
			$this->setQuery($query);
			$this->execute(array($tensanpham,$giaca,$soluong,$gioithieu,$sale,$noibat,$theloai_id,$created_at));
			return $this->getLastId();
		}
		public function Sua($tensanpham,$giaca,$soluong,$gioithieu,$theloai_id,$updated_at,$id){
			$query = "UPDATE sanpham SET tensanpham = ?,giaca = ?,soluong = ?, gioithieu = ?,theloai_id =?,updated_at = ? WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($tensanpham,$giaca,$soluong,$gioithieu,$theloai_id,$updated_at,$id))->rowCount();
		}
		public function SuaAnh($tensanpham,$giaca,$soluong,$gioithieu,$anh,$theloai_id,$updated_at,$id){
			$query = "UPDATE sanpham SET tensanpham = ?,giaca = ?,soluong = ?, gioithieu = ?,anh=?,theloai_id =?,updated_at = ? WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($tensanpham,$giaca,$soluong,$gioithieu,$anh,$theloai_id,$updated_at,$id))->rowCount();
		}
		public function Xoa($id){
			$query = "DELETE FROM sanpham WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($id))->rowCount();
		}

	}