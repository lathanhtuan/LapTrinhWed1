<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class=" bg-info text-white w-100 p-5 h-190" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item col-md-4
                    <?php echo $title == 'Home' ? 'active' : ''; ?>">                   
                    </li>
                   

                    <?php if ($currentUser): ?>
                        
                                   
                          <a class=" col-md-4 " href="TrangChu.php" style="margin-left:-200px;">Trang chủ</a>
                                       
                        <li class="nav-item col-md-2">
                            <a class="text-success"href="Profile.php"style="margin-left:-100px;">Trang Cá nhân</a>     
                        </li>
                        <li class="nav-item col-md-2">
                            <a class="nav-link text-success font-weight-bold text-nowrap" href="sanpham.php">Sản Phẩm</a>     
                        </li>
                        <li class="nav-item col-md-2">
                            <a class="nav-link text-success font-weight-bold text-nowrap" href="giohang.php">Giỏ hàng</a>     
                        </li>
                    
                <!--TranDuyQuang link đến giỏ hàng -->
                    <!-- <li class="nav-item col-md-2">
                        <a class="nav-link text-success font-weight-bold"href="/GioHang/pDanhSach.php">Giỏ hàng</a>     
                    </li> -->
                   
                    <li class="nav-item col-md-7">
                        <a class="nav-link text-success font-weight-bold text-nowrap" href="sanphamdayeuthich.php">Xem danh sách các sản phẩm đã Yêu thích</a>     
                    </li>
                    <li class="nav-item col-md-2">
                        <a class="nav-link text-success font-weight-bold text-nowrap" href="logout.php">Đăng xuất</a>
                    </li>
                    <!-- </div> -->
                   
                    <?php else: ?>
                        <a class="navbar-brand bg-light text-dark font-weight-bold bg-success text-white"style="margin-left:-100px;font-size:35px;" href="#">NGƯỜI DÙNG</a>
                    <li class="nav-item col-md-4 
                     <?php echo $title == 'Login' ? 'active' : ''; ?>">
                   
                    </li>
                    <li class="nav-item col-md-5" >
                        <a class="nav-link text-primary font-weight-bold"data-toggle="tab"
                            href="login.php">Đăng nhập<?php echo $title == 'Login' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </li>
                    <li class="nav-item col-md-4 <?php echo $title == 'Register' ? 'active' : ''; ?>">
                        <a class="nav-link   font-weight-bold "
                            href="register.php">Đăng ký<?php echo $title == 'Register' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </li>
                   
                    <li class="nav-item col-md-4">
                        <a class="nav-link text-warning font-weight-bold bg-success text-white"  href="forgottenPassword.php">Quên mật khẩu</a>     
                    </li>
                    <?php endif; ?>
                </ul>
        </nav>
        <h1><?php echo $title?></h1>
        
