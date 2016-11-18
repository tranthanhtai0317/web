		<h2>Thêm Thành Viên Mới</h2>
						<?php
					if (isset($error)) {
						foreach ($error as $key => $value) {
							?>
								<div class="alert alert-danger">
								  <strong>Lỗi!</strong> <?php echo $value;?>
								</div>
							<?php
						}
					}
				?>
				<?php 
					if (isset($message)) {
						foreach ($message as $key => $value) {
							if ($key == "thanhcong") {
								?>
									<div class="alert alert-success">
									  <strong>Thông báo!</strong><?php echo $value;?>
									</div>						
								<?php
							}

						}
					}
				?>
		<form method="post" action="index.php?controller=thanhvien&action=them">
		  <div class="form-group">
		    <label >Họ Tên:</label>
		    <input  class="form-control" id="email" name="hoten">
		  </div>
		  <div class="form-group">
		    <label >Email:</label>
		    <input  type="email"class="form-control" id="email" name="email">
		  </div>
		  <div class="form-group">
		    <label >Password:</label>
		    <input  type="password"class="form-control" id="email" name="password">
		  </div>
		  <div class="form-group">
		    <label >Level:</label>
		    <input  type="number" class="form-control" id="email" name="level">
		  </div>
		  <input type="submit" name="submit"class="btn btn-primary" value="Thêm"/>
		</form>