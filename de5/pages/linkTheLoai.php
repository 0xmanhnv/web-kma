<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$sql = "SELECT * FROM theloai WHERE id = " . $id;
		$resultTL = $conn->query($sql);
		$theloai = $resultTL->fetch_assoc();

		$query = "SELECT * FROM link_web WHERE id_theloai = " . $id;

		$result = $conn->query($query);
?>

	<center>
		<h1>Danh sach link web voi the loai: <?php echo $theloai['name'] ?></h1>
		<a href="">them moi link web</a>
		<table border="1px solid black" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td>STT</td>
					<td>URL</td>
					<td>AVATAR</td>
					<td>DESCRIPTION</td>
					<td>hanh dong</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$stt = 0;
					while($link = $result->fetch_assoc()){ 
				?>
				<tr>
					<td><?php echo $stt ?></td>
					<td><?php echo $link['url'] ?></td>
					<td><img  style="height: 50px; width: 50px;" src="<?php echo $link['avatar'] ?>"></td>
					<td><?php echo $link['description'] ?></td>
					<td>
						<a href="index.php?act=editLink&id=<?php echo $link['id'] ?>">Sua</a>
						<a href="index.php?act=deleteLink&id=<?php echo $link['id'] ?>">Xoa</a>
					</td>
				</tr>
				<?php $stt++; } ?>
			</tbody>
		</table>
	</center>
<?php } ?>