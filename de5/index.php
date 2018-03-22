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
		<title>Giai de 5 phat tdien ung dung web</title>
	</head>
	<body>
		<a href="?act=listLink">Danh sach web</a>
		<br>
		<a href="?act=addLink">Them link web</a>
		<br>
		<a href="?act=listTheLoai">danh sach the loai</a>
		<br>


		<?php 
			switch ($act) {
				case "":
					echo "Day la trang chu";
					break;
				case "listLink":
					include_once("pages/listLink.php");
					break;
				case "addLink":
					include_once("pages/addLink.php");
					break;
				case "editLink":
					include_once("pages/editLink.php");
					break;
				case "deleteLink":
					include_once("pages/deleteLink.php");
					break;
				case "listTheLoai":
					include_once("pages/listTheLoai.php");
					break;
				case "detailTheLoai":
					include_once("pages/linkTheLoai.php");
					break;
				default:
					echo "Khong co chuc nang nay";
					break;
			}
		?>
	</body>
</html>