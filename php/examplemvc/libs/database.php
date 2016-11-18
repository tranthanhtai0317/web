<?php
	class Database{
		var $_dbh = '';
		var $_sql = '';
		var $_cursor = '';
		/*Phương thức khởi tạo kết nối đến database*/
		public function __construct(){
			$this->_dbh = new PDO("mysql:host=localhost;dbname=shoponline", 'root', '');
			$this->_dbh->query('set names "utf8"');			
		}
		/*Phương thức thiết lập câu lệnh truy vấn*/
		public function setQuery($sql){
			$this->_sql = $sql;
		}
		/*Phương thức thực thi câu lệnh truy vấn*/
		public function execute($options = array(),$var_type=null){
			$this->_cursor = $this->_dbh->prepare($this->_sql);
			if ($options) {
				for ($i=0; $i < count($options); $i++) { 
					if (is_null($var_type)) {
						switch (true) {
							case is_bool($options[$i]):
								$var_type = PDO::PARAM_BOOL;
								break;
							case is_int($options[$i]):
								$var_type = PDO::PARAM_INT;
								break;
							case is_null($options[$i]):
								$var_type = PDO::PARAM_NULL;
								break;																						
							default:
								$var_type = PDO::PARAM_STR;
								break;
						}
					}
					$this->_cursor->bindParam($i+1,$options[$i],$var_type);
				}
			}
			/*Hoặc Dùng*/
			/*$this->_cursor->execute($options);*/
			$this->_cursor->execute();
			return $this->_cursor;
		}
		/*Phương thức lấy dữ liệu trong bảng*/
		public function getAllRows($options=array()){
			if (!$options) {
				if(!$result = $this->execute()){
					return false;
				}
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			//PDO::FETCH_OBJ
			return $result->fetchAll();
		}
		/*Phương thức lấy một dòng trong bảng và gán vào đối tượng*/
		public function getRow($options=array()){
			if (!$options) {
				if(!$result = $this->execute()){
					return false;
				}
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			//PDO::FETCH_OBJ
			return $result->fetch();			
		}
		/*Phương thức đếm số dòng kết quả*/
		public function getRecord($options=array()){
			if (!$options) {
				if(!$result = $this->execute()){
					return false;
				}
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			return $result;
			//return $result->fetch(PDO::FETCH_COLUMN);	
		}
		/*Phương thức tìm id cuối cùng*/
		public function getLastId(){
			return $this->_dbh->lastInsertId();
		}
		/*Phương thức ngắt kết nối*/
		public function disconnect(){
			$this->_dbh = NULL;
		}

	}