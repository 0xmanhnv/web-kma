<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		if(isset($_POST['submit'])){
			$url = $_POST['url'];
			$description = $_POST['description'];
			$theloai = $_POST['theloai'];


			// Nếu người dùng có chọn file để upload
	        if (isset($_FILES['avatar']))
	        {
	            // Nếu file upload không bị lỗi,
	            // Tức là thuộc tính error > 0
	            if ($_FILES['avatar']['error'] > 0)
	            {
	               
	            	$query = "UPDATE link_web SET  id_theloai = '".$theloai."', url = '".$url."', description = '".$description."' WHERE id = '".$id."'";

			       	$conn->query($query);
			       	header("location: index.php?act=listLink");
	            }
	            else{
	                // Upload file
	                move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/uploads/'.$_FILES['avatar']['name']);
	               	$avatar = "public/uploads/".$_FILES['avatar']['name'];
	               	
	               	$query = "UPDATE link_web SET  id_theloai = '".$theloai."', url = '".$url."', avatar = '".$avatar."', description = '".$description."' WHERE id = '".$id."'";
			       
			       	$conn->query($query);
			       	header("location: index.php?act=listLink");
	            }
	        }else{
	        	$query = "UPDATE link_web SET  url = '".$url."', id_theloai = '".$theloai."', description = '".$description."' WHERE id = '".$id."'";
		       	$conn->query($query);
		       	header("location: index.php?act=listLink");
	        }
		}else{

		$query = "SELECT * FROM link_web WHERE id = " . $id;
		$result = $conn->query($query);

		$link = $result->fetch_assoc();

		$query  = "SELECT * FROM theloai";
		$result = $conn->query($query);
 ?>
 <center>
	<h1>chinh sua LINK WEB</h1>
	<form action="" method="post" enctype="multipart/form-data">
 		URL: <input type="text" name="url" value="<?php echo $link['url'] ?>">
 		<br>
 		<img src="<?php echo $link['avatar'] ?>">
 		<br>
 		AVATAR: <input type="file" name="avatar">
 		<br>
 		DESCRIPTION: <textarea name="description" ><?php echo $link['description'] ?></textarea>
		<br>
		<select name="theloai">
			<?php while($theloai = $result->fetch_assoc()){ ?>
				<option value="<?php echo $theloai['id'] ?>"><?php echo $theloai['name'] ?></option>
			<?php } ?>
		</select>
		<br>
 		<button type="submit" name="submit"> update</button>
	</form>
</center>

 <?php } } ?>