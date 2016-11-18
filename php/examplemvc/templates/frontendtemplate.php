<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<script src="public/js/jquery-3.1.0.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	  <!-- 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	   -->


	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<style type="text/css">
	.info-product{
		margin-bottom: 20px;
		padding-bottom: 10px;
		border-bottom: 1px solid black;
	}
	.spnb{
		border: 1px solid #e5e5e5;
		padding: 10px;
		margin-bottom: 10px;

	}
	.button-spnb{
		text-align: center;
		position: relative;
		/*left: 10px;*/
		bottom: 1px;
	}

	.info-spnb{
		margin-left: 20px;
		margin-bottom: 30px;
	}
	.clear{
		clear: both;
	}

</style>
</head>
<body>
	<!-- header -->
		<header>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Shop Quần Xì</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#">Trang Chủ</a></li>
			        <?php 
			        	if (isset($theloai)) {
			        		foreach ($theloai as $key => $value) {
			        			if ($value['theloai_id'] == 0) {
			        			?>
							        <li class="dropdown">
							          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $value['tentheloai'];?><span class="caret"></span></a>
							          <ul class="dropdown-menu">
							          	<?php
							          		foreach ($theloai as $key1 => $value1) {
							          			if ($value1['theloai_id'] == $value['id']) {
							          				?>
							          					<li><a href="#"><?php echo $value1['tentheloai'];?></a></li>
							          				<?php
							          			}
							          		}
							          	?>
							          </ul>
							        </li>			        				
			        			<?php
			        			}
			        		}
			        	}
			        ?>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#" data-toggle="modal" data-target="#myModalDangNhap"><span class="glyphicon glyphicon-user" ></span> Đăng Nhập</a></li>
			        <li><a href="#" data-toggle="modal" data-target="#myModalDangKy"><span class="glyphicon glyphicon-log-in" ></span> Đăng Ký</a></li>
			        <li><a href="#" data-toggle="modal" data-target="#myModalTimKiem"><span class="glyphicon glyphicon-search" ></span> Tìm Kiếm</a></li>
			      </ul>
			    </div>
			  </div>
			</nav>

			<!-- myModalTimKiem -->
			
			<div id="myModalTimKiem" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Tìm Kiếm</h4>
			      </div>
			      <div class="modal-body">
			        <form>
					  <div class="form-group">
					    <label for="email">Nhập Từ Khóa:</label>
					    <input type="text" class="form-control" id="email">
					  </div>
					  <button type="submit" class="btn btn-success">Tìm</button>
					</form>
			      </div>
			      	
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			      </div>
			    </div>

			  </div>
			</div>
			<!-- end myModalTimKiem -->

			<!-- myModalDangNhap -->
			
			<div id="myModalDangNhap" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Đăng Nhập</h4>
			      </div>
			      <div class="modal-body">
			        <form>
					  <div class="form-group">
					    <label for="email">Tên Tài Khoản:</label>
					    <input type="email" class="form-control" id="email">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Mật Khẩu:</label>
					    <input type="password" class="form-control" id="pwd">
					  </div>
					  <div class="checkbox">
					    <label><input type="checkbox"> Ghi nhớ</label>
					  </div>
					  <button type="submit" class="btn btn-success">Đăng Nhập</button>
					</form>
			      </div>
			      	
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			      </div>
			    </div>

			  </div>
			</div>
			<!-- end myModalDangNhap -->

			<!-- myModalDangKy -->
			<div id="myModalDangKy" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Đăng Ký</h4>
			      </div>
			      <div class="modal-body">
			        <form>
					  <div class="form-group">
					    <label for="email">Tên Tài Khoản:</label>
					    <input type="email" class="form-control" id="email">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Mật Khẩu:</label>
					    <input type="password" class="form-control" id="pwd">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Xác Nhận Mật Khẩu:</label>
					    <input type="password" class="form-control" id="pwd">
					  </div>
					  <div class="checkbox">
					    <label><input type="checkbox"> Tự Động Đăng Nhập</label>
					  </div>
					  <button type="submit" class="btn btn-success">Hoàn Thành</button>
					</form>
			      </div>
			      	
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			      </div>
			    </div>

			  </div>
			</div>
			<!-- end myModalDangKy -->

		</header>
		<!-- <div class="container-fluid"> -->
			<?php require($this->viewPath);?>
		<!-- </div>
 -->
	<!-- footer -->
	<footer class="container-fluid text-center">
		<p>@Copyright:<a href=""> Trần Thanh Tài </a></p>
		<p>23/10/2016 </p>
	</footer>
	<!-- end footer -->
</body>
</html>