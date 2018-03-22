<?php
	$query = "SELECT * FROM students"; 
	$result = $conn->query($query);
 ?>

 <table border="1px solid black">
 	<thead>
 		<tr>
	 		<th>ma sinh vien</th>
	 		<th>ho ten</th>
	 		<th>mngay sinh</th>
	 		<th>dia chi</th>
	 		<th>anh</th>
	 		<th>Hanh dong</th>
	 	</tr>
 	</thead>
 	<tbody>
 		<?php while($student = $result->fetch_assoc()){ ?>
 		<tr>
	 		<td><?php echo $student['maSV'] ?></td>
	 		<td><?php echo $student['hoten'] ?></td>
	 		<td><?php echo $student['ngaysinh'] ?></td>
	 		<td><?php echo $student['diachi'] ?></td>
	 		<td><img style="height: 60px; width: 80px;" src="<?php echo $student['anh'] ?>"></td>
	 		<td>
	 			<a href="index.php?act=delete&ma=<?php echo $student['maSV']  ?>">Xoa</a>
	 			<a href="index.php?act=edit&ma=<?php echo $student['maSV']  ?>">Sua</a>
	 		</td>
	 	</tr>
	 	<?php } ?>
 	</tbody>
 </table>