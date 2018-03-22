<?php 
	$query = "SELECT * FROM theloai";

	$result = $conn->query($query);
 ?>

<center>
	<h1>Danh sach link web</h1>
	<table border="1px solid black" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td>STT</td>
				<td>NAME</td>
				<td>Hanh dong</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 0;
				while($theloai = $result->fetch_assoc()){ 
			?>
			<tr>
				<td><?php echo $stt ?></td>
				<td><?php echo $theloai['name'] ?></td>
				<td>
					<a href="index.php?act=detailTheLoai&id=<?php echo $theloai['id'] ?>">Xem</a>
				</td>
			</tr>
			<?php $stt++; } ?>
		</tbody>
	</table>
</center>