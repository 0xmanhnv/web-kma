<?php
	$ma = $_GET['ma'];
	if(isset($_POST['submit'])){
		$hoten = $_POST['hoten'];
		$ngaysinh = $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$anh = "";

		// Nếu người dùng có chọn file để upload
        if (isset($_FILES['anh']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['anh']['error'] > 0)
            {
                $query = "UPDATE students SET hoten = '".$hoten."', ngaysinh = '".$ngaysinh."', diachi = '".$diachi."'  WHERE maSV = '".$ma."'";

		       	$conn->query($query);
		       	header("location: index.php?act=list");
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['anh']['tmp_name'], 'public/uploads/'.$_FILES['anh']['name']);
               	$anh = "public/uploads/".$_FILES['anh']['name'];
               	$query = "UPDATE students SET hoten = '".$hoten."', ngaysinh = '".$ngaysinh."', diachi = '".$diachi."', anh = '".$anh."'  WHERE maSV = '".$ma."'";
		       
		       	$conn->query($query);
		       	header("location: index.php?act=list");
            }
        }else{
        	$query = "UPDATE students SET  hoten = '".$hoten."', ngaysinh = '".$ngaysinh."', diachi = '".$diachi."' WHERE maSV = '".$ma."'";
	       	$conn->query($query);
	       	header("location: index.php?act=list");
        }

       	

	}else{
		
		$query = "SELECT * FROM students WHERE  maSV = '".$ma."'"; 
		$result = $conn->query($query);

		$student = $result->fetch_assoc();
 ?>

<form method="post" action="" enctype="multipart/form-data">
	Ma sinh vien: <?php echo $student['maSV'] ?>
	<br>
	Ho Ten:<input type="text" name="hoten" value="<?php echo $student['hoten'] ?>">
	<br>
	Ngay sinh: <input type="date" name="ngaysinh" value="<?php echo $student['ngaysinh'] ?>">
	<br>
	Dia chi: <input type="text" name="diachi" value="<?php echo $student['diachi'] ?>">
	<br>
	<img src="<?php echo $student['anh'] ?>">
	<br>
	Anh: <input type="file" name="anh">
	<br>
	<button type="submit" name="submit">update</button>
</form>
<?php } ?>