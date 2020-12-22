<h1 id="1111" style ="text-align: center; font-weight: bold;"><a href ="#">Thông tin chi tiết sản phẩm</a></h1>
<?php
    if(isset($_GET["id"]))
        $id = $_GET["id"];
    else
        DataProvider::ChangeURL("index.php?a=404");

    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.GiaSanPham, s.SoLuongTon, s.SoLuongBan, s.SoLuocXem, s.HinhURL, s.MoTa, h.TenHangSanXuat, 
    l.TenLoaiSanPham FROM SanPham s, HangSanXuat h, LoaiSanpham l WHERE s.BiXoa = 0 AND  s.MaHangSanXuat = h.MaHangSanXuat 
    AND s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaSanPham = $id"; 
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    if($row == null)
        DataProvider::ChangeURL("index.php?a=404");
?>