<?php 
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['theloai_id'] == $parent_id)
        {
            echo '<tr>';
                echo '<td>';
                    echo $char . $item['tentheloai'];
                echo '</td>';
                echo '<td>';
                    echo $item['created_at'];
                echo '</td>';
                 echo '<td>';
                    echo $item['updated_at'];
                echo '</td>';
                 echo '<td>';
                 	echo "<a href='index.php?controller=theloai&action=sua&id=".$item['id']."'> <button class='btn btn-primary'>Sửa</button></a>";
                    echo "<a href='index.php?controller=theloai&action=xoa&id=".$item['id']."'> <button class='btn btn-danger'>Xóa</button></a>";
                echo '</td>';                                                
            echo '</tr>';
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---');
        }
    }
}
?>

				<!-- Danh sach the loai -->
				<h2>Danh Sách Thể Loại</h2>
				<a href="index.php?controller=theloai&action=them"><button class="btn btn-primary">Thêm thể loại</button></a>
				<table class="table">
				    <thead>
				      <tr>
				        <th>Tên Thể Loại</th>
				        <th>Created_at</th>
				        <th>Updated_at</th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
						    <?php showCategories($theloai); ?>		    	
				    </tbody>
				  </table>
<!-- 				  	<ul class="pagination">
					  	<li><a href="index.php?controller=theloai&action=danhsach&page=1">First</a></li>
					  	<?php
					  		if (isset($total_page)) {
					  			for ($i = 0; $i < $total_page; $i++) {
					  				?>
					  					<li class="<?php if(($i+1) == $_GET['page']){ echo "active";}?>"><a  href="index.php?controller=theloai&action=danhsach&page=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>
					  				<?php
					  			}
					  		}
					  	?>
					  	<li><a href="index.php?controller=theloai&action=danhsach&page=<?php echo $total_page;?>">Last</a></li>
					</ul> -->
		  	