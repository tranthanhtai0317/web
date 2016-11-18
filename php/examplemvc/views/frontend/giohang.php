
		<!-- content -->
	<div class="container">
		<h2>Sảm phẩm</h2>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Tên sản phẩm</th>
		        <th>Ảnh</th>
		        <th>Giá</th>
		        <th>Giảm giá</th>
		        <th>Số lượng</th>
		        <th>Xóa</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    	if(isset($sanpham)){
		    		foreach ($sanpham as $key => $value) {
		    			?>
						    <tr>
						        <td><?php echo $value['tensanpham'];?></td>
						        <td>
						        	<img src="<?php echo $value['anh'];?>" style="width=45px;height:150.4px;">
						        </td>
						        <td><?php echo $value['giaca'];?>đ</td>
						        <td><?php echo $value['sale'];?>%</td>
						        <td>
						        	<form action ="index.php?controller=giohang&action=sua&id=<?php echo $value['id'];?>" method="POST">
						        		<input type="number" value="<?php echo $value['soluong_giohang'];?>" name="soluong">
						        		<input type="submit" value="Sửa" class="btn btn-primary">
						        	</form>
						        </td>
						        

								<td>
						        	<a href="index.php?controller=giohang&action=xoa&id=<?php echo $value['id'];?>"><button type="button" class="btn btn-danger btn-md" >Xóa</button></a>
						        </td>
					      	</tr>	    			
		    			<?php
		    		}
		    	}
		    ?>

		    </tbody>
		  </table>
		  <div class="well well-sm">Tổng tiền: <?php if (isset($tongtien)) {
		  	echo $tongtien;
		  }?> VNĐ</div>
		  <div class="btn-thanhtoan">
		  	<a href="thanhtoan">
		  		<button class="btn btn-success">Thanh Toán</button>
		  	</a>
		  </div>
	</div>		
		<!-- end content -->