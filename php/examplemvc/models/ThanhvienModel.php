<?php 
	class ThanhvienModel extends Database{

		public function layTatCaThanhVien(){
			$query = "SELECT * FROM thanhvien";
			$this->setQuery($query);
			return $this->getAllRows();
		}

		public function layThanhVienTheoId($id){
			$query = "SELECT * FROM thanhvien WHERE id = ?";
			$this->setQuery($query);
			return $this->getRow(array($id));
		}

		public function layThanhVien($start,$limit){
			$query = "SELECT * FROM thanhvien LIMIT ?,?";
			$this->setQuery($query);
			return $this->getAllRows(array($start,$limit));
		}

		public function Them($hoten,$email,$password,$level,$created_at){
			$query = "INSERT INTO thanhvien(hoten,email,password,level,created_at) VALUES(?,?,?,?,?)";
			$this->setQuery($query);
			return $this->execute(array($hoten,$email,$password,$level,$created_at))->rowCount();
		}

		public function Sua($hoten,$email,$password,$level,$updated_at,$id){
			$query = "UPDATE thanhvien SET hoten = ?, email = ?,password = ?, level = ?, updated_at = ? WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($hoten,$email,$password,$level,$updated_at,$id))->rowCount();
		}

		public function Xoa($id){
			$query = "DELETE FROM thanhvien WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($id))->rowCount();
		}
	}