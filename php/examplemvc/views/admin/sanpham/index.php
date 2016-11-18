<div class="container-fluid">
		<div class="row">
			    <nav class="col-sm-2 section">
			      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
			        <li class="<?php if(isset($_GET['controller']) && $_GET['controller'] == "theloai") echo "active"?>"><a href="index.php?controller=theloai&action=danhsach">Thể Loại</a></li>
			        <li class="<?php if(isset($_GET['controller']) && $_GET['controller'] == "sanpham") echo "active"?>"><a href="index.php?controller=sanpham&action=danhsach">Sản phẩm</a></li>
			        <li class="<?php if(isset($_GET['controller']) && $_GET['controller'] == "user") echo "active"?>"><a href="index.php?controller=user&action=danhsach">User</a></li>
			      </ul>
			    </nav>
			<div class="col-sm-8">
				<?php 
					if (isset($_GET['action']) && $_GET['action'] == "them") {
						include("themsanpham.php");
					}else if(isset($_GET['action']) && $_GET['action'] == "sua"){
						include("suasanpham.php");
					}else{
						include("xemsanpham.php");
					}
				?>
			</div>
			<div class="col-sm-2"></div>
		</div>

</div>
