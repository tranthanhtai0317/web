<?php
	class TheloaiModel extends Database{

		/*
			Phương thức trả về mảng tất cả các thể loại.
		*/
		public function layTatCaTheLoai(){
			$query = "SELECT * FROM theloai";
			$this->setQuery($query);
			return $this->getAllRows();
		}
		/*
			Phương thức trả về một thể loại có id bằng id truyền vào.
		*/
		public function layTheLoaiTheoId($id){
			$query = "SELECT * FROM theloai WHERE id = ?";
			$this->setQuery($query);
			return $this->getRow(array($id));
		}

		/*
			Phương thức trả về một thể loại có parentid bằng parentid truyền vào.
		*/
		public function layTheLoaiTheoParentId($parentid){
			$query = "SELECT * FROM theloai WHERE theloai_id = ?";
			$this->setQuery($query);
			return $this->getRow(array($parentid));
		}

		public function MenuDacap($parentid = 0,$step = "",$trees = array()){
			 	if(!$trees)
		        {
		            $trees = array();
		        }
		        $data = $this->layTheLoaiTheoParentId($parentid);
		       /* while ($data) {
		        	$trees[] = array('id' => $data['id'],'tentheloai'=>$data['tentheloai']);
		        	$trees = $this->MenuDacap($data['id'],$step.'&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;',$trees);
		        }*/
		        return $trees;
		}
		/*
			Phương thức trả về mảng các thể loại thỏa mãn câu lệnh SQL sau:
			SELECT * FROM theloai LIMIT ?,?
		*/
		public function layTheLoai($start,$limit){
			$query = "SELECT * FROM theloai LIMIT ?,?";
			$this->setQuery($query);
			return $this->getAllRows(array($start,$limit));
		}

		/*
			Phương thức thêm một thể loại mới vào CSDL
			Phương thức trả về số hàng đã được thêm.
		*/
		public function Them($tentheloai,$created_at,$theloai_id = 0){
			$query = "INSERT INTO theloai(tentheloai,created_at,theloai_id) VALUES (?,?,?)";
			$this->setQuery($query);
			return $this->execute(array($tentheloai,$created_at,$theloai_id))->rowCount();
		}
		/*
			Phương thức sửa một thể loại có id = với id truyền vào.
			Phương thức trả về tất cả số hàng đã được sửa.
		*/
		public function Sua($tentheloai,$updated_at,$theloai_id,$id){
			$query = "UPDATE theloai SET tentheloai = ?, updated_at = ?, theloai_id = ? WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($tentheloai,$updated_at,$theloai_id,$id))->rowCount();
		}
		/*
			Phương thức xóa một thể loại có id = với id truyền vào
			Phương trả về tất cả số hàng đã được xóa.
		*/
		public function Xoa($id){
			$query = "DELETE FROM theloai WHERE id = ?";
			$this->setQuery($query);
			return $this->execute(array($id))->rowCount();
		}
	}