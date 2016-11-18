
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Private</a></li>
  <li><a href="#">Pictures</a></li>
  <li class="active">Vacation</li> 
</ul>
<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-7">
							<img src="<?php if (!empty($anh)) {
								echo $anh[0]['duongdan'];
							}?>" style="width:100%">
						</div>
						<div class="col-sm-5">
							<div class="info-product">
								<p>Khoac ni nam co mu MRC</p>
								<p>255,000 VND ( Còn hàng )</p>						
							</div>

							<form>
								<label>So Luong</label>
								<input type="number" />
								<button type="button" class="btn btn-primary btn-md">
							          <span class="glyphicon glyphicon-shopping-cart"></span>
							        </button>
							</form>
						</div>
						<?php 
							if (isset($anh)) {
								foreach ($anh as $key => $value) {
									?>
										<img src="<?php echo $value['duongdan'];?>" style="width:100%">	
									<?php
								}
							}
						?>	
								
						<div class="well well-lg">Sản phẩm cùng danh mục</div>

	 				<div class="list-product">
	 					<?php 
	 						if (isset($sanphamcungdanhmuc)) {
	 							foreach ($sanphamcungdanhmuc as $key => $value) {
	 								?>
	 								<div class="product">
										<div class="img">
											<img src="<?php echo $value['anh']?>">
										</div>
										<div class="info">
											<p><?php echo $value['tensanpham']?></p>
											<p>Giá:<?php echo $value['giaca']?> VNĐ</p>
										<button type="button" class="btn btn-primary btn-md">
								          <span class="glyphicon glyphicon-shopping-cart"></span>
								        </button>
											<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalChitiet">Chi Tiết</button>
										</div>
										
									</div>						
	 								<?php
	 							}
	 						}
	 					?>																	
					</div>	 				
					</div>

				</div>
			</div>
			<div class="col-sm-4">
				<div class="container-fluid">
					<div class="well well-lg">Sản phẩm nổi bật.</div>
					<?php 
						if (isset($sanpham_noibat)) {
							foreach ($sanpham_noibat as $key => $value) {
								?>
								<div class="row spnb">
									<div class="col-sm-4">
										<img src="<?php echo $value['anh'];?>" style="width:100px">
									</div>
									<div class="col-sm-8">
										<div class="info-spnb">
												<p><?php echo $value['tensanpham'];?></p>
												<p><?php echo $value['giaca'];?> <?php if ($value['soluong'] > 0) {
													echo "( Còn hàng )";
												}else{
													echo "( Hết hàng )";
												}?></p>						
										</div>
										<div class="button-spnb">
											<form>
												<button type="button" class="btn btn-primary btn-md">
										          <span class="glyphicon glyphicon-shopping-cart"></span>
										        </button>
												<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalChitiet">Chi Tiết</button>
											</form>						
										</div>

									</div>
									


								</div>
								<div class="clear"></div>						
								<?php
							}
						}
					?>

				</div>
			</div>
		</div>
</div>
