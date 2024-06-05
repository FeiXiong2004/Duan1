<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thong tin cá nhân</title>
    <link rel="stylesheet" href="./view/user/CSS/home.css">
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.css">
    <link rel="stylesheet" href="./view/user/CSS/xemthongtin.css">
</head>

<body>
    <div class="web--container">
        <!-- Header -->

        <!-- navbar -->

        <!-- Thông tin cá nhân  -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-2--item" style="background-color: #cfcfe8;" >

            <div class="form-wrapper">
                <h2 class="thongbao mb-3"> 
                    <?php
                    if(isset($thongbao)&& ($thongbao)!=""){
                        echo $thongbao;
                    }
                    ?>
                </h2>
                <div>
                    <a href="index.php" > < Quay lại trang chủ  </a>
                </div>
            <?php
            if(isset($_SESSION['email']) && (is_array($_SESSION['email']))){
                extract($_SESSION['email']);
                // var_dump($_SESSION['email']);
                // die();
            }
            ?>
                <form action="?act=edit_user" method="post" class="form">
                    <div class="form-row user">
                        <div class="user-header">
                            <div class="image-head">
                                <img src="./upload/user-ava.jpg" alt="" class="circle">
                            </div>
                            <div class="image-head">
                                <h4 class="nameofuser">Thay đổi thông tin</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" required name="user" value="<?php echo $user ?>" >
                            <div class="underline"></div>
                            <label for="">Tên: </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" required name="email" id="" value="<?php echo $email ?>" >
                            <div class="underline"></div>
                            <label for="">Email:</label>
                        </div>
                        <div class="input-data">
                            <input type="text" required name="tel" id="" value="<?php echo $tel ?>" >
                            <div class="underline"></div>
                            <label for="">SĐT</label>
                        </div>
                    </div>
                    <div class="form-row">

                    <div class="input-data">
                            <input type="password" required name="pass" id="" value="<?php echo $pass ?>">
                            <div class="underline"></div>
                            <label for="">Mật khẩu</label>
                        </div>

                        <div class="input-data">
                            <input rows="8" cols="80" required name="address" id="" value="<?php echo $address ?>" ></input>
                            <br/>
                            <div class="underline"></div>
                            <label for="">Địa chỉ:</label>
                        </div>
    
                    </div>
                    <input type="hidden" name="id" id="" value="<?php echo$id?>">
                    <div class="form-row submit-btn">
                        <div class="input-data ">
                            <input type="submit" name="update" value="Cập nhật thông tin" class="button">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!-- <div class="frame--footer--container w-100">
        <iframe src="Footer.html" frameborder="0" class="frame--footer" scrolling="no"></iframe>
    </div> -->
</body>
</html>