<?php
	if(isset($_POST['submit'])){
		$masv = $_POST['maSV'];
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
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['anh']['tmp_name'], 'public/uploads/'.$_FILES['anh']['name']);
               	$anh = "public/uploads/".$_FILES['anh']['name'];
            }
        }

       	// them vao database
       	// 
       	$query = "INSERT INTO students(masv, hoten, ngaysinh, diachi, anh) VALUES('".$masv."', '".$hoten."', '".$ngaysinh."', '".$diachi."', '".$anh."')";

       	$conn->query($query);
       	header("location: index.php?act=list");
	}else{
 ?>

<form method="post" action="" enctype="multipart/form-data">
	Ma sinh vien: <input type="text" name="maSV">
	<br>
	Ho Ten:<input type="text" name="hoten">
	<br>
	Ngay sinh: <input type="date" name="ngaysinh">
	<br>
	Dia chi: <input type="text" name="diachi">
	<br>
	Anh: <input type="file" name="anh">
	<br>
	<button type="submit" name="submit">Them moi</button>
</form>
<?php } ?>