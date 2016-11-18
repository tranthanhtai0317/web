<?php
	 function showCategories($categories, $parent_id = 0, $char = '')
	{
	    foreach ($categories as $key => $item)
	    {
	        // Nếu là chuyên mục con thì hiển thị
	        if ($item['theloai_id'] == $parent_id)
	        {
	            echo '<option value="'.$item['id'].'">';
	                echo $char . $item['tentheloai'];
	            echo '</option>';
	             
	            // Xóa chuyên mục đã lặp
	            unset($categories[$key]);
	             
	            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
	            showCategories($categories, $item['id'], $char.'|---');
	        }
	    }
	}
?>
		<h2>Thêm Sản Phẩm Mới</h2>
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
		<form method="post" action="index.php?controller=sanpham&action=them" enctype="multipart/form-data">
		  <div class="form-group">
		    <label >Tên Sản phẩm:</label>
		    <input  class="form-control" id="email" name="tensanpham">
		  </div>
		  <div class="form-group">
		    <label >Giá cả:</label>
		    <input  class="form-control" id="email" name="giaca">
		  </div>
		  <div class="form-group">
		    <label >Số lượng:</label>
		    <input  class="form-control" id="email" name="soluong">
		  </div>
		  <div class="form-group">
		    <label >Giới thiệu:</label>
		    <textarea id="demo" class="ckeditor" name="gioithieu"></textarea>
		  </div>
		  <div class="form-group">
		    <label >Ảnh:</label>
		    <input type="file" name="anh[]" multiple="true"/>
		  </div>
		  <div class="form-group">
		    <label >Sale:</label>
		    <input type="number" class="form-control" id="email" name="sale">
		  </div>
		  <div class="form-group">
		    <label >Nỗi bật:</label><br>
		    <input type="checkbox"  name="noibat" value="1"> Nỗi bật
		  </div>		  		  
		  <div class="form-group">
		    <label >Thể loại:</label>
		    <select class="form-control" name="theloai_id">
		    	<option value="0">None</option>
				<?php showCategories($theloai); ?>
			</select>
		  </div>
		  <input type="submit" name="submit"class="btn btn-primary" value="Thêm"/>
		</form>
