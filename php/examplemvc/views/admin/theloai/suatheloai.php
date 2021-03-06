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

				<h2 class="text-center">Sửa Thể Loại</h2>
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
							?>
								<div class="alert alert-success">
								  <strong>Thông báo!</strong><?php echo $value;?>
								</div>						
							<?php
						}
					}
				?>		
				<form action='index.php?controller=theloai&action=sua&id=<?php if(isset($mottheloai)){echo $mottheloai['id'];}?>' method="POST">
				    <div >
				    	<label >Tên Thể Loại:</label>
				    	<input  class="form-control" id="email" name="tentheloai" value="<?php if (isset($mottheloai) && $mottheloai != null) {
				    		echo $mottheloai['tentheloai'];
				    	}?>">
				    </div>
				    <br>
					<label>Tên Thể Loại Cha:</label>
				    <div class="form-group">
				    	<select class="form-control" name="theloai_id">
						    <?php showCategories($theloai); ?>
						</select>
				    </div>
					
					<br>
					<input type="submit" class="btn btn-primary" value="Sửa"/>

				  
				</form>