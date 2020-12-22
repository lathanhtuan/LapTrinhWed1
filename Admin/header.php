<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="container-fluid bg-info text-white w-100 p-3 bg-primary h-100 bg-primary">
    
    <div class="container-fluid bg-info text-white w-100 p-3 bg-primary h-100 bg-primary">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
            
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item col-md-2 <?php echo $title == 'Home' ? 'active' : ''; ?>">
                    <nav class="nav nav-tabs">
                        <a class="nav-link text-primary font-weight-bold" data-toggle="tab"
                            href="../index.php">Trang chủ<?php echo $title == 'Home' ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                    </nav>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hoạt động quản lý
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index.php?c=1">Quản lý tài khoản</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?c=2">Quản lý đơn hàng</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?c=3">Quản lý sản phầm</a>
                        </div>
                    </div>
                    <li class="nav-item col-md-8">
                        <div class="text-primary font-weight-bold" >
                            <h1><p class="text-center"><?php echo $title?></p></h1>
                        </div>
                    </li>
                    <li class="nav-item col-md-4">
                        <a class="nav-link text-success font-weight-bold " href="../logout.php">Đăng xuất</a>
                    </li>
                </ul>
            
            </div>
        </nav>
        
        