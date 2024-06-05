<!-- Cắt phần menu  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./view/user/CSS/home.css">
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="web--container">



        <!-- navbar -->
        <nav class="navbar navbar-expand-md sticky-top">
            <!-- sticky top dán chặt ở trên, na..md thì từ kích thước medium trở lên thì nó sẽ expand ra -->
            <div class="container-fluid">
                <!-- container-fluid là sẽ chiếm toàn bộ chiều ngang -->
                <div class="nav" data-target="collapse">
                    <nav class="nav__pc">
                        <ul class="navbar-nav ml-auto">
                            <!-- cho phép hiện các cái đường link khi co trang mình vào-->
                            <!-- ml auto là auto margin left -->
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?act=product" class="nav-link">SẢN PHẨM</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">LIÊN HỆ</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">TIN THÚ CƯNG</i></a>
                            </li>

                        </ul>
                    </nav>
                    
                    <label for="nav--input" class="nav__bars-btn">
                        <i class="fas fa-bars"></i>
                    </label>

                    <input type="checkbox" class="nav__input" name="" id="nav--input">

                    <label for="nav--input" class="navbar--overlay"></label>
                    <nav for="nav--input" class="nav--bar">
                        <label for="nav--input" class="nav--bar--close">
                            <i class="fas fa-times"></i>
                        </label>
                        <ul class="nav__list">
                            <li>
                                <a class="nav--link" href="#"><i class="fas fa-home"></i>TRANG CHỦ </a>
                            </li>

                            <li>
                                <a href="Product.html" class="nav--link"><i class="fas fa-dolly"></i>SẢN PHẨM </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- search -->
                <form action="index.php?act=timSanPham" method="POST">
                    <div class="search--bar">
                        <input type="text" value="" name="kyw" id="search" placeholder="Bạn muốn tìm gì?" autocomplete="off"
                            class="search--input">
                        <button type="submit" name="search" class="search--button"><i class="fas fa-search"></i></button>
                    </div>
                </form>

            </div>
        </nav>

</div>
</body>

</html>
