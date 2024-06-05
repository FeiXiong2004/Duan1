<?php
   ob_start();
   $cookie_name="nofi";
   $cookie_nofi="Bạn đã đăng ký thành công";
   ?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./view/user/CSS/Dang_ky.css">
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src="./view/JS/dangKy - dangNhap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
     crossorigin="anonymous"></script>
     <style>
        .dangky--container{
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Thêm màu nền với độ trong suốt */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Đổ bóng */
        }
        body {
            margin: 0; /* Loại bỏ các khoảng trắng ngoại vi */
            padding: 0;
            background-image: url('upload/bg1.jpg');
            background-size: cover; /* Hiển thị ảnh nền sao cho nó phủ toàn bộ phần nền */
            background-position: center; /* Đặt ảnh nền ở giữa */
            background-repeat: no-repeat; /* Không lặp lại ảnh nền */
            font-family: 'Arial', sans-serif;
        }

        .dangky--title{
            border: black 2px solid;
            border-radius: 21px;
            text-align: center;
            color: black;
        }
        .bg-body{
            border-radius: 0.5rem !important; /* Lựa chọn font chữ */

        }

     </style>
</head>
<body>
    <!-- ... -->

    <div class="dangky--container col-12">
        <div class="col-12">
            <h2 class="thongbao" id="thongbao" style="padding-top: 20px; color: red; font-size: 1vw;">
                <?php
                if (isset($thongbao) && ($thongbao) != "") {
                    echo $thongbao . ' <a href="index.php?act=login" style="padding-top: 20px; color: blue;" >Đăng nhập tại đây</a> ';
                }
                ?>
            </h2>
            <div class="dangky--title mb-3">ĐĂNG KÝ TÀI KHOẢN</div>
            <form action="?act=sign_up" method="POST" class="needs-validation " novalidate>
                <div class="mb-2" style="text-align: center;
" >THÔNG TIN CÁ NHÂN</div>

                <div class="dangky--ho col-12">
                    <label for="validationCustom01" class="col-12">Họ và tên <span>*</span></label>
                    <input type="text" id="validationCustom01" name="user" class="col-12 input form-control" required>
                    <div class="valid-feedback">
                        Good!
                    </div>
                    <div class="invalid-feedback">
                        Vui lòng nhập họ và tên .
                    </div>
                </div>

                <div class="dangky--ho col-12">
                    <label for="validationCustom01" class="col-12">Số điện thoại <span>*</span></label>
                    <input type="text" id="validationCustom01" name="tel" class="col-12 input form-control" required>
                    <div class="valid-feedback">
                        Good!
                    </div>
                    <div class="invalid-feedback">
                        Vui lòng nhập số điện thoại .
                    </div>
                </div>

                <div class="dangky--ho col-12">
                    <label for="validationCustom01" class="col-12">Email <span>*</span></label>
                    <input type="text" id="validationCustom01" name="email" class="col-12 input form-control" required>
                    <div class="valid-feedback">
                        Good!
                    </div>
                    <div class="invalid-feedback">
                        Vui lòng nhập email .
                    </div>
                </div>

                <div class="dangky--ho col-12">
                    <label for="validationCustom01" class="col-12">Mật khẩu <span>*</span></label>
                    <input type="password" id="validationCustom01" name="pass" class="col-12 input form-control" required>
                    <div class="valid-feedback">
                        Good!
                    </div>
                    <div class="invalid-feedback">
                        Vui lòng nhập mật khẩu .
                    </div>
                </div>

                <div class="dangky--ho col-12">
                    <label for="validationCustom01" class="col-12">Địa chỉ <span>*</span></label>
                    <input type="text" id="validationCustom01" name="address" class="col-12 input form-control" required>
                    <div class="valid-feedback">
                        Good!
                    </div>
                    <div class="invalid-feedback">
                        Vui lòng nhập địa chỉ .
                    </div>
                </div>

                <div class="btn--dangky center">
                    <input type="submit" class="btn-primary" name="sign_up" value="Đăng ký" ></input>
                </div>
                <div class="dangky--dangnhap">
                    Bạn đã có tài khoản?
                    <a href="index.php?act=login">Đăng nhập tại đây</a>
                </div>
            </form>
        </div>
    </div>

    <!-- ... -->

</body>
</html>
<script>
    (function () {
        'use strict';

        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

</html>
