
		
<div class="animated wow slideInUp" data-wow-delay=".2s">
<link rel="stylesheet" href="sp.css">

<?php
require_once 'init.php';
$title = '10 Sản phẩm yêu thích nhất';
requireLoggedIn();

 
?>
<?php include 'header.php'; ?>
<div class="wrapper">
<?php 
  global $db;
 $sql =$db->query( "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuocYeuThich DESC LIMIT 0, 10");  
  while ( $da=$sql->fetch(PDO::FETCH_ASSOC)) 
  { 
      ?>
      
        
<a href ="index.php?a=4&id=<?php echo $da["MaSanPham"]; ?>#1111" style="color:#333;">
     <div class="item ">
				       
     <img src="img/<?php echo $da["HinhURL"]; ?>" class="pro-image-front"/>
                        
                        <div class=" text-warning font-weight-bold " ><?php echo $da["TenSanPham"];?></div>
                        <?php echo $da["MoTa"]; ?>
                         
                            <div class="pprice text-warning font-weight-bold">Giá: <?php echo number_format($da["GiaSanPham"]);?>đ</div>                                             
    </div>
</a>
                  
                 
    <?php 
  } 
?>
</div>
<?php include 'footer.php'; ?>
</div>


