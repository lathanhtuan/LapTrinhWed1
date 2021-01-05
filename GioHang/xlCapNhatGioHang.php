<?php
require_once 'init.php';
if(isset($_GET["c"])&& isset($_GET["id"]))
	{
		if($_GET["c"]==1)
		{
			ThemSoLuong(1,$_GET["id"]);
			header('Location: pDanhSach.php');
			exit;
		}
		else if($_GET["c"]==2)
		{
			TruSoLuong(1,$_GET["id"]);
			header('Location: pDanhSach.php');
			exit;
		}
		else if($_GET["c"]==3)
		{
			XoaSoLuong(1,$_GET["id"]);
			header('Location: pDanhSach.php');
			exit;
		}
	}

?>
