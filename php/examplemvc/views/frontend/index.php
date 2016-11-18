<div class="container-fluid">
		<!-- Carousel -->
		<!-- end Carousel -->
		<!-- Breadcrumb -->
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<ul class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Private</a></li>
				  <li><a href="#">Pictures</a></li>
				  <li class="active">Vacation</li> 
				</ul>
				<!-- Sản phẩm mới -->
				<div class="well well-sm">Sản phẩm mới</div>

				<div class="list-product">
					<?php
						if (isset($sanpham_moi)) {
						 	foreach ($sanpham_moi as $key => $value) {
						 		?>
									<div class="product">
										<div class="img">
											<a href="index.php?controller=home&action=chitiet&id=<?php echo $value['id'];?>">
													<img src="<?php echo $value['anh'];?>">
											</a>
											
										</div>
										<div class="info">
											<p><?php echo $value['tensanpham'];?></p>
											<p>Giá: <?php echo $value['giaca'];?></p>
											<a href="index.php?controller=giohang&action=them&id=<?php echo $value['id'];?>">
													<button type="button" class="btn btn-primary btn-md">
											          <span class="glyphicon glyphicon-shopping-cart"></span>
											        </button>
											</a>
													
													

								        <a href="index.php?controller=home&action=chitiet&id=<?php echo $value['id'];?>"><button type="button" class="btn btn-primary btn-md" >Chi Tiết</button></a>
											
										</div>
										
									</div>
						 		<?php
						 	}

						 } 
					?>


				</div>
				<div class="clear"></div>
				<!-- Sản phẩm nỗi bật -->
				<div class="well well-sm">Sản phẩm nỗi bật</div>

				<div class="list-product">
					<?php
						if (isset($sanpham_noibat)) {
						 	foreach ($sanpham_noibat as $key => $value) {
						 		?>
									<div class="product">
										<div class="img">
											<img src="<?php echo $value['anh'];?>">
										</div>
										<div class="info">
										<p><?php echo $value['tensanpham'];?></p>
										<p>Giá: <?php echo $value['giaca'];?></p>
										<input type="hidden" name="id" value="<?php echo $value['id'];?>">
										<button type="submit" class="btn btn-primary btn-md">
								          <span class="glyphicon glyphicon-shopping-cart"></span>
								        </button>
								         <a href="index.php?controller=home&action=chitiet&id=<?php echo $value['id'];?>"><button type="button" class="btn btn-primary btn-md" >Chi Tiết</button></a>
										
										</div>
										
									</div>
						 		<?php
						 	}

						 } 
					?>
				</div>	
				<div class="clear"></div>
				<div class="well well-sm">SALE Khủng</div>

				<div class="list-product">
					<?php
						if (isset($sanpham_sale)) {
						 	foreach ($sanpham_sale as $key => $value) {
						 		?>
									<div class="product">
										<div class="img">
											<img src="<?php echo $value['anh'];?>">
										</div>
										<div class="info">
											<p><?php echo $value['tensanpham'];?></p>
											<p>Giá: <?php echo $value['giaca'];?></p>
											<input type="hidden" name="id" value="<?php echo $value['id'];?>">
										<button type="button" class="btn btn-primary btn-md">
								          <span class="glyphicon glyphicon-shopping-cart"></span>
								        </button>
										 <a href="index.php?controller=home&action=chitiet&id=<?php echo $value['id'];?>"><button type="button" class="btn btn-primary btn-md" >Chi Tiết</button></a>
										</div>
										
									</div>
						 		<?php
						 	}

						 } 
					?>


				</div>				
				<div class="clear"></div>
				<div>

				</div>


			</div>
			<div class="col-sm-1">
				<a href="#">
				<button class="btn btn-primary btn-cart">
					<span class="glyphicon glyphicon-shopping-cart"></span>
				</button>
				</a>
				<a href="https://www.facebook.com/tranthanhtaiha">
				<button class="btn btn-primary btn-f">
					<b>F</b>
				</button>
				</a>
				<a href="#">
				<button class="btn btn-primary btn-top">
					<span class="glyphicon glyphicon-menu-up"></span>
				</button>
				</a>					
			</div>
		</div>

		
		<!-- end Breadcrumb -->
		<!-- Category Name -->
		<!-- end Category Name -->
		<!-- List -->
		<!-- end List -->
		<!-- Pagination -->
		<!-- end Pagination -->

</div>