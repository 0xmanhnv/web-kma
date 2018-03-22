<?php
	if(isset($_POST['submit'])){
		$url = $_POST['url'];
		$description = $_POST['description'];
		$avatar = "";
		$theloai = $_POST['theloai'];
		// Nếu người dùng có chọn file để upload
        if (isset($_FILES['avatar']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['avatar']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/uploads/'.$_FILES['avatar']['name']);

               	$avatar = "public/uploads/".$_FILES['avatar']['name'];


            }
        }

        $query = "INSERT INTO link_web(url, avatar, description, id_theloai) VALUES('".$url."', '".$avatar."', '".$description."', '".$theloai."')";

        $conn->query($query);
        header("location: index.php?act=listLink");

	}else{
		$query  = "SELECT * FROM theloai";
		$result = $conn->query($query);
 ?>

<center>
	<h1>THEM MOI LINK WEB</h1>
	<form action="" method="post" enctype="multipart/form-data">
 		URL: <input type="text" name="url">
 		<br>
 		AVATAR: <input type="file" name="avatar">
 		<br>
 		DESCRIPTION: <textarea name="description"></textarea>
		<br>
		<select name="theloai">
			<?php while($theloai = $result->fetch_assoc()){ ?>
				<option value="<?php echo $theloai['id'] ?>"><?php echo $theloai['name'] ?></option>
			<?php } ?>
		</select>
		<br>
 		<button type="submit" name="submit"> Them moi</button>
	</form>
</center>

<?php } ?>
