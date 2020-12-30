<?php
    require_once 'init.php';

    $title = 'Đăng ký';
    if(isset($_POST['TenDangNhap'])&& isset($_POST['MatKhau'])
    && isset($_POST['TenHienThi']) && isset($_POST['DiaChi']) 
    && isset($_POST['DienThoai']) && isset($_POST['Email'])){
        $username = $_POST['TenDangNhap'];
        $password = $_POST['MatKhau'];
        $name=$_POST['TenHienThi'];
        $add= $_POST['DiaChi'];
        $tel= $_POST['DienThoai'];
        $mail= $_POST['Email'];
        $bx=0;
        $ml=3;
        $user = findUserByUsername($username);

        if($user){
            $error = 'Tài khoản đã tồn tại';
        } else {
                $user= createUser($username,password_hash($password,PASSWORD_DEFAULT),$name,$add, $tel, $mail,$bx,$ml);
                echo "<h2>" . $password . "</h2>";
                $_SESSION['userId'] = $user['MaTaiKhoan'];
                header('Location:index.php');
                exit();
            
        }
    }
    
?>

<?php include 'header.php'; ?>


<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>
<?php else: ?>
     
<form  method="POST">
<div class="form-group">
        <label for="TenDangNhap">Tên đăng nhập</label>
        <input type="text" name="TenDangNhap" id="TenDangNhap" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="MatKhau">Mật khẩu</label>
        <input type="password" name="MatKhau" id="MatKhau" class="form-control" required>
    </div>
    <div class="form-group" >
        <label for="TenHienThi">Họ và tên của bạn</label>                    
        <input type="text" name="TenHienThi" id="TenHienThi" class="form-control" required>                                         
    </div>
    <div class="form-group">
        <label for="DiaChi" class="control-label">Địa chỉ<span style="color: red;"> *</span></label>            
        <input type="text" class="form-control"name="DiaChi" id="DiaChi" required >                                 
    </div>
    <div class="form-group">
    <label for="DienThoai" class="control-label">Số điện thoại<span style="color: red;"> *</span></label>                     
    <input type="text" class="form-control" pattern="[0-9]{10,11}" title="Số điện thoại phải là số 0-9 và từ 10-11 kí tự!"name="DienThoai" id="DienThoai" required >                                 
    </div>
    <div class="form-group ">                 
        <label for="Email" class="control-label">Email<span style="color: red"> *</span></label>                   
        <input type="email" class="form-control" id="Email" name="Email" required>
    </div>      
<!-- <div class="form-group col-sm-6" >
                    <span class="err" id="eHoTen" ></span>
                    <div>
                        <label for="TenHienThi">Họ và tên của bạn</label>                    
                        <input type="text" name="TenHienThi" id="TenHienThi" class="form-control" placeholder="Họ Và Tên" required>                       
                    </div>
</div> -->
<!-- <div class="form-group col-sm-8">
                    <label for="txtNgaySinh">Ngày sinh</label>
                    <div class="col-md-6" >
                    <tr>                      
                        <td>
                        <select name="BirthDay" id="Birthday_Day" class="form-control col-md-3" style="margin-bottom: 10px;">
                            <option value="-1">[Ngày]</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        
                        <select name="BirthdayMonth" id="Birthday_Month" class="form-control col-md-3" style="margin-bottom: 10px;">
                            <option value="-1">[Tháng]</option>
                            <option value="January">Jan(1)</option>
                            <option value="February">Feb(2)</option>
                            <option value="March">Mar(3)</option>
                            <option value="April">Apr(4)</option>
                            <option value="May">May(5)</option>
                            <option value="June">Jun(6)</option>
                            <option value="July">Jul(7)</option>
                            <option value="August">Aug(8)</option>
                            <option value="September">Sep(9)</option>
                            <option value="October">Oct(10)</option>
                            <option value="November">Nov(11)</option>
                            <option value="December">Dec(12)</option>
                        </select>
                        
                        <select name="BirthdayYear" id="Birthday_Year" class="form-control col-md-3" style="margin-bottom: 10px;">
                        
                            <option value="-1">[Năm]</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                        </select>
                        </td>
                        </tr>

                    </div>
                </div>  -->
                <!-- <div class="form-group col-md-6 ">
                    <label for="DiaChi" class="control-label">Nơi bạn sống?</label>
                    <div class="col-md-9" >
                    <tr>                      
                        <td>
                        <select name="DiaChi" id="DiaChi" class="form-control">
                            <option value="-1">--Chọn thành phố--</option>
                            <option value="1">Hà Nội</option>
                            <option value="2">Hải Phòng</option>
                            <option value="3">Đà Nẵng</option>
                            <option value="4">Hồ Chí Minh</option>
                            <option value="5">Cần Thơ</option>
                            <option value="6">Bình Thuận</option>
                            <option value="7">Ninh Thuận</option>
                            <option value="8">Nghệ An</option>
                            <option value="9">Lâm Đồng</option>
                            <option value="10">Khác</option>
                        </select>
                        </td>
                        </tr>
                    </div>
                </div>   -->
                <!-- <div class="form-group col-sm-6">
                    <span class="err" id="eDiaChi"></span>
                    <div>
                        <label for="DiaChi" class="control-label">Địa chỉ<span style="color: red;"> *</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                name="DiaChi" id="DiaChi" placeholder="Địa chỉ" >
                        </div>
                    </div>
                 </div>
                <div class="form-group col-sm-6">
                    <span class="err" id="eDienThoai"></span>
                    <div>
                        <label for="DienThoai" class="control-label">Số điện thoại<span style="color: red;"> *</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" pattern="[0-9]{10,11}" title="Số điện thoại phải là số 0-9 và từ 10-11 kí tự!" 
                                name="DienThoai" id="DienThoai" placeholder="Số điện thoại..." >
                        </div>
                    </div>
                 </div>
                 <div class="form-group col-sm-6">
                    <span class="err" id="eTaiKhoan"></span>
                    <div>
                        <label for="TenDangNhap" class="control-label">Tên đăng nhập<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"  name="TenDangNhap" id="TenDangNhap" placeholder="Tên đăng nhập...">
                        </div>
                    </div>
                 </div> -->
                 <!-- <div class="form-group col-sm-6">
                    <span class="err" id="eMatKhau"></span>
                    <div>
                        <label for="matkhau" class="control-label">Mật khẩu<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" title="phải có ít nhất 7 kí tự và có ít nhất 1 chữ hoa hoặc 1 chữ thường hoặc 1 số hoặc 1 kí tự đặc biệt: ~<>?_+=!@#$%^&*(){}|;:,." name="txtMatKhau" id="txtMatKhau" onkeyup="checkPassword()" placeholder="Mật khẩu..."
                                pattern="[~<>?_+=!@#$%^&*(){}|;:,.a-zA-Z0-9]{7,20}">
                            <div class="progressBar-container">
                                <span>Độ bảo mật:</span>
                                <div class="progressBar">
                                    <div class="progressBar-separate">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div style="border:none;"></div>
                                    </div>
                                    <div id="status" class="progressBar-status"></div>
                                </div>
                                <span id="progressBar-mess"></span>
                            </div>
                        </div>
                    </div>
                 </div> -->
                 <!-- <div class="form-group col-sm-6">
                    <span class="err" id="MatKhau" style="color:red"></span> 
                    <div>
                        <label for="MatKhau" class="control-label">Mật khẩu<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="MatKhau"
                            name="MatKhau"
                             placeholder="Nhập mật khẩu...">
                        </div>
                    </div>
                 </div>
                 <div class="form-group col-sm-6">
                    <span class="err" id ="Email" style="color:red"></span>
                    <div>
                        <label for="Email" class="control-label">Email<span style="color: red"> *</span></label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email...">
                        </div>
                    </div>
                 </div>                         -->
<button button type="submit" class="btn btn-primary">Đăng Kí</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>