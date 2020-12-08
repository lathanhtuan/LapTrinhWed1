<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid bg-info text-white w-100 p-3 bg-primary h-100 bg-primary">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand bg-light text-dark font-weight-bold bg-success text-white" href="#">NGƯỜI DÙNG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item col-md-4<?php echo $title == 'Home' ? 'active' : ''; ?>">
                    <nav class="nav nav-tabs">
                        <a class="nav-link text-primary font-weight-bold "data-toggle="tab"
                            href="index.php">Trang chủ<?php echo $title == 'Home' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </nav>
                    </li>
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton" data-toggle="dropdown">
                            Các loại sản phẩm
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">10 sản phẩm mới nhất</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">10 sản phẩm bán chạy</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">10 sản phẩm được yêu thích nhất </a>
                    </div>
</div>

                    <?php if ($currentUser): ?>
                        
                    <li class="nav-item col-md-4">
                        <a class="nav-link text-success font-weight-bold " href="logout.php">Đăng xuất</a>
                    </li>
                    
                    <li class="nav-item col-md-4">
                        <a class="nav-link text-success font-weight-bold bg-dark text-white" href="">Thay đổi thông tin cá nhân</a>     
                    </li>
                    <li class="nav-item col-md-4">
                        <a class="nav-link text-body font-weight-bold bg-success text-white" href="">Xem danh sách các sản phẩm đã Yêu thích</a>     
                    </li>
                    <?php else: ?>
                    <li class="nav-item col-md-4  <?php echo $title == 'Login' ? 'active' : ''; ?>">
                    <nav class="nav nav-tabs">
                        <a class="nav-link text-primary font-weight-bold"data-toggle="tab"
                            href="login.php">Đăng nhập<?php echo $title == 'Login' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </nav>
                    </li>
                    <li class="nav-item col-md-4 <?php echo $title == 'Register' ? 'active' : ''; ?>">
                        <a class="nav-link text-light font-weight-bold "
                            href="register.php">Đăng ký<?php echo $title == 'Register' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </li>
                   
                    <li class="nav-item col-md-4">
                        <a class="nav-link text-warning font-weight-bold bg-success text-white"  href="forgottenPassword.php">Quên mật khẩu</a>     
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <h1><?php echo $title?></h1>
        