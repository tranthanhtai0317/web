<div class="container-fluid">
		<div class="row">
			    <nav class="col-sm-2 section">
			      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
			        <li class="active"><a href="index.php?controller=theloai&action=danhsach">Thể Loại</a></li>
			        <li><a href="#section2">Sản phẩm</a></li>
			        <li><a href="#section3">Hóa Đơn</a></li>
			      </ul>
			    </nav>
			<div class="col-sm-8">
				<?php 
					if (isset($_GET['action']) && $_GET['action'] == "them") {
						include("themtheloai.php");
					}else if(isset($_GET['action']) && $_GET['action'] == "sua"){
						include("suatheloai.php");
					}else{
						include("xemtheloai.php");
					}
				?>
			</div>
			<div class="col-sm-2"></div>
		</div>

</div>
