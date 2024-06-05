<!-- Cắt phần footer  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    
</head>
<style>
.footer--mainpage{
    position: relative;
    height: 400px;
    min-width: 300px;
    background-image:url(../Image/footer.jpg); background-size: cover;
    background-repeat: no-repeat;
}
.footer--mainpage .footer--overlay{
    position: absolute;
    background-color: #FFA800;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    opacity: 0.9;
}
.footer--mainpage .footer--container{
    position: absolute;
    top: 30px;
    bottom: 10px;
    left: 10px;
    right: 10px;
}
.footer--mainpage .footer--container>div{
    padding-left: 50px;
}
.footer--mainpage .footer--container>div>p{
    margin-bottom: 20px;
}

@media (max-width: 720px){

    *{
        font-size: 12px !important;
    }
    .footer--mainpage .fa-facebook,.footer--mainpage .fab.fa-instagram,.footer--mainpage .fab.fa-pinterest-square{
        font-size: 20px !important;
    }
    .footer--mainpage{
        height: 450px !important;
    }
    .footer--mainpage .footer--container>div{
        padding-left: 10%;
    }
}

.footer--mainpage .fa-facebook,.footer--mainpage .fab.fa-instagram,.footer--mainpage .fab.fa-pinterest-square{
    font-size: 2rem;
    margin-right: 25px;
}
.footer--mainpage a{
    text-decoration: none;
    color: white;
}
.footer--mainpage a:hover{
    color: black;
}
.footer--mainpage h6{
    font-weight: bold;
}
.footer--mainpage .copyright{
    position: absolute;
    bottom: 0px;
    font-size: 10px;
}
</style>
<body>
    <div class="footer--mainpage">
        <div class="footer--overlay"></div>
        <div class="footer--container row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <p>SẢN PHẨM</p>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Thức ăn khô cho chó</a> <br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Thức ăn khô cho mèo</a> <br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Thức ăn ướt cho chó</a><br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Thức ăn ướt cho mèo</a><br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
               <p>DỊCH VỤ</p>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Giới thiệu</a> <br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Chính sách bảo mật</a><br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Bản Quyền</a><br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Liên hệ</a><br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Quảng cáo</a><br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
               <p>THÔNG TIN SHOP</p>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Địa chỉ: 207 Nguyễn Trãi, quận Thanh Xuân,Thành phố Hà Nội</a> <br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Tel/Zalo: 0933 444 555</a><br>
                <a href="#" onclick="window.open('thongtin_footer.html','_parent')">Email: petvitality@gmail.com</a><br>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <p>THEO DÕI CHÚNG TÔI TRÊN</p>
                <a href="https://www.facebook.com/hqqtv/" target="_top" class="fab fa-facebook"></a>
                <a href="https://www.instagram.com/" target="_top" class="fab fa-instagram"></a>
                <a href="https://www.pinterest.com/" target="_top" class="fab fa-pinterest-square"></a>
            </div>
            <div class="text-center copyright">© Bản quyền thuộc về PETVITALITY</div>
        </div>
    </div>
</body>
</html>