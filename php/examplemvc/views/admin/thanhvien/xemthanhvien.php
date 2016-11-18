<!-- Danh sach the loai -->
<h2>Danh Sách Thành Viên</h2>
<a href="index.php?controller=sanpham&action=them"><button class="btn btn-primary">Thêm thành viên</button></a>
<table class="table">
<thead>
  <tr>
    <th>Họ Tên</th>
    <th>Email</th>
    <th>Level</th>
    <th>Created_at</th>
    <th>Updated_at</th>
    <th></th>
  </tr>
</thead>
<tbody>

	    <?php 
	    	if (isset($thanhvien)) {
	    		foreach ($thanhvien as $key => $value) {

	    			?>
	    			</tr>
	    				<td><?php echo $value['hoten']?></td>
	    				<td><?php echo $value['email']?></td>
	    				<td><?php echo $value['level']?></td>
	    				<td><?php echo $value['created_at']?></td>
	    				<td><?php echo $value['updated_at']?></td>
	    				<td>
	    					<a href='index.php?controller=thanhvien&action=sua&id=<?php echo $value['id'];?>'> <button class='btn btn-primary'>Sửa</button></a>
	    					<a href='index.php?controller=thanhvien&action=xoa&id=<?php echo $value['id'];?>'> <button class='btn btn-danger'>Xóa</button></a>
	    				</td>
	    			</tr>
	    			<?php
	    		}
	    	}
	    ?>	    	
</tbody>
</table>
	<ul class="pagination">
  	<li><a href="index.php?controller=thanhvien&action=danhsach&page=1">First</a></li>
  	<?php
  		if (isset($total_page)) {
  			for ($i = 0; $i < $total_page; $i++) {
  				?>
  					<li class="<?php if(($i+1) == $_GET['page']){ echo "active";}?>"><a  href="index.php?controller=sanpham&action=danhsach&page=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>
  				<?php
  			}
  		}
  	?>
  	<li><a href="index.php?controller=thanhvien&action=danhsach&page=<?php echo $total_page;?>">Last</a></li>
</ul> 