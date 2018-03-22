<?php 
	include_once("db/connect.php");
	$act = "";
	if(isset($_GET['act'])){
		$act = $_GET['act'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>de 1 giai bt wweb</title>
		<link rel="stylesheet" type="text/css" href="public/css/style.css">
	</head>

	<body>
		<div id="header">
			<h1 style="line-height: 80px; color: white;">Nguyen Manh</h1>
		</div>
		<div class="container">
			<div class="sidebar">
				<a href="?act=list">danh sach sinh vien</a>
				<br>
				<a href="?act=add">Them sinh vien</a>
			</div>
			<div class="content">
				<?php
					switch ($act) {
					 	case "":
					 		echo "day la trang chu";
					 		break;
					 	case "list":
					 		include("pages/list.php");
					 		break;
					 	case "add":
					 		include("pages/add.php");
					 		break;
					 	case "delete":
					 		include("pages/delete.php");
					 		break;
					 	case "edit":
					 		include("pages/edit.php");
					 		break;
					 	default:
					 		echo "khong ton tai chuc nang nao";
					 		break;
					 } 
				?>
			</div>
		</div>
	</body>
</html>