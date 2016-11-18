<?php 
/*function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['theloai_id'] == $parent_id)
        {
            echo '<tr>';
            	echo '<td>';
                    echo $char . $item['tensanpham'];
                echo '</td>';
                echo '<td>';
                    echo $char . $item['tentheloai'];
                echo '</td>';
                echo '<td>';
                    echo $char . $item['giaca'];
                echo '</td>';
                echo '<td>';
                    echo $char . $item['soluong'];
                echo '</td>';
                echo '<td>';
                    echo $item['created_at'];
                echo '</td>';
                 echo '<td>';
                    echo $item['updated_at'];
                echo '</td>';
                 echo '<td>';
                 	echo "<a href='index.php?controller=sanpham&action=sua&id=".$item['id']."'> <button class='btn btn-primary'>Sửa</button></a>";
                    echo "<a href='index.php?controller=sanpham&action=xoa&id=".$item['id']."'> <button class='btn btn-danger'>Xóa</button></a>";
                echo '</td>';                                                
            echo '</tr>';
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---');
        }
    }
}*/
?>

				<!-- Danh sach the loai -->
				<h2>Danh Sách Sản Phẩm</h2>
				<a href="index.php?controller=sanpham&action=them"><button class="btn btn-primary">Thêm sản phẩm</button></a>
				<table class="table">
				    <thead>
				      <tr>
				        <th>Tên sản phẩm</th>
				        <th>Tên thể loại</th>
				        <th>Giá cả</th>
				        <th>Số lượng</th>
				        <th>Created_at</th>
				        <th>Updated_at</th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
						    <?php 
						    	if (isset($sanpham)) {
						    		foreach ($sanpham as $key => $value) {

						    			?>
						    			</tr>
						    				<td><?php echo $value['tensanpham']?></td>
						    				<td><?php echo $value['giaca']?></td>
						    				<td><?php echo $value['soluong']?></td>
						    				<td><?php echo $value['theloai_id']?></td>
						    				<td><?php echo $value['created_at']?></td>
						    				<td><?php echo $value['updated_at']?></td>
						    				<td>
						    					<a href='index.php?controller=sanpham&action=sua&id=<?php echo $value['id'];?>'> <button class='btn btn-primary'>Sửa</button></a>
						    					<a href='index.php?controller=sanpham&action=xoa&id=<?php echo $value['id'];?>'> <button class='btn btn-danger'>Xóa</button></a>
						    				</td>
						    			</tr>
						    			<?php
						    		}
						    	}
						    ?>	    	
				    </tbody>
				  </table>
	  				<ul class="pagination">
					  	<li><a href="index.php?controller=sanpham&action=danhsach&page=1">First</a></li>
					  	<?php
					  		if (isset($total_page)) {
					  			for ($i = 0; $i < $total_page; $i++) {
					  				?>
					  					<li class="<?php if(($i+1) == $_GET['page']){ echo "active";}?>"><a  href="index.php?controller=sanpham&action=danhsach&page=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>
					  				<?php
					  			}
					  		}
					  	?>
					  	<li><a href="index.php?controller=sanpham&action=danhsach&page=<?php echo $total_page;?>">Last</a></li>
					</ul> 