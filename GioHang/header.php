<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TranDuyQuang</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
     <a class="navbar-brand" href="#">
			TRANG CHỦ
	 </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
		<!-- Chuc Nang da dang nhap -->
		<?php if ($currentUser): ?>
		<li class="nav-item <?php echo $title == 'Quản Lý Giỏ Hàng' ? 'active' : ''; ?>">
          <a class="nav-link" href="pDanhSach.php">Quản Lý Giỏ Hàng</a>
        </li>
		<li class="nav-item <?php echo $title == 'Đơn Hàng Cá Nhân' ? 'active' : ''; ?>">
          <a class="nav-link" href="pDonHang.php">Đơn Hàng Cá Nhân</a>
        </li>
		<!-- Chuc Nang chua dang nhap -->
		<?php else: ?>
		
		<?php endif; ?>
        
      </ul>
      
    </div>
  </nav>
  <h2> <?php echo $title; ?> </h2>


<body>