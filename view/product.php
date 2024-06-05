<?php 
        // include "model/sanpham.php";
        // include "model/danhmuc.php";
        // var_dump($kyw);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Product.css">
    <link rel="stylesheet" href="./view/user/CSS/grid.css">
    <link rel="stylesheet" href="./view/user/CSS/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <title>Sản phẩm</title>

    <style>
        
    </style>

</head>

<body>
    <div class="app">
       
        <div class="app__container">
            <div class="grid-wide">

            <form class="mb-3" action="index.php?act=timSanPham" method="POST">
                <div class="search">
                    <input type="text" name="kyw" placeholder="Bạn muốn tìm sản phẩm gì?" id="search_text">
                    <button type="submit" name="search" value="TÌM" class="fas fa-search" ></button>
                </div>
            </form>
                <div class="row sm-gutter app__content">
                    <div class="col l-2 m-3 c-0">
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-list"></i> DANH MỤC
                            </h3>
                            <ul class="category-list">
                                <li class="category-item" id="category-item">
                                    <a href="index.php" class="category-item__link">Trang chủ</a>
                                </li>
                                <li class="category-item category-item--active">
                                    <a href="?act=product" class="category-item__link" id="sanpham-category">Sản phẩm
                                    </a>
                                    <!-- In name danh muc  -->

                                    <?php foreach ($danhSachDanhMuc as $key => $value): ?>
                                    <li class="category-item category-item-1">
                                        <a href="?act=product_cate&iddm=<?php echo $value['id'] ?>" class="category-item__link" id="category--thucanchocho">
                                            <?php echo $value['name'] ?></a>
                                    </li>
                                    <?php endforeach; ?>

                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col l-10 m-9 c-12">
                        <h3 class="category__heading">TẤT CẢ SẢN PHẨM</h3>
                        <div class="home-filter">
                            <div class="select-input">
                                <span class="select-input__label">Sắp xếp theo</span>
                                <i class="select-input__icon fas fa-angle-down"></i>
                                <!-- List options -->
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="?act=product&filter=asc" class="select-input__link tangdan" id="tangdan">Giá: tăng dần</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="?act=product&filter=desc" class="select-input__link" id="giamdan">Giá: giảm
                                            dần</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Grid -> Row -> Column -->
                        <div class="home-product dsSanPham1">
                            <div class="row" id="dsSanPham1">    
                                <!-- Product item -->
                                <?php foreach($danhSachSanPham as $value): ?>
                                    <div class="col l-2-4 m-4 c-6">
                    <a class="home-product-item" href="?act=chiTietSanPham&idsp=<?php echo $value['id']?>">
                    <div class="home-product-item__img" style="background-image: url(./upload/<?php echo $value['img']; ?>);">
                    </div>
                    <h4 class="home-product-item__name"><?php echo $value['name']; ?></h4>
                    <div class="home-product-item__price">
                    <span class="home-product-item__price-curent"><?php echo number_format($value['price']); ?> VND</span>
                    <!-- sale  -->
                    <!-- <span class="home-product-item__price-old">590.000đ</span> -->
                    </div>
                    </a>
                </div>    
                                    <?php endforeach; ?>        
                            </div>    

                        <div class="home-product dsSanPham2">
                            <div class="row" id="dsSanPham2">
                            </div>
                        </div>
                        <ul class="pagination home-product__pagination">

                            <li class="pagination-item pagination-item--active">
                                <a href="#category-item" class="pagination-item__link " id="page-1">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="#category-item" class="pagination-item__link " id="page-2">2</a>
                            </li>
                            <!-- <li class="pagination-item">
                                <a href="#category-item" class="pagination-item__link " id="page-3">3</a>
                            </li> -->
                            <li class="pagination-item">
                                <span href="#category-item" class="pagination-item__link ">
                                    <i class="pagination-item_icon fas fa-angle-right" id="next"></i>
                                </span>
                            </li>
                        </ul>
                        <div class="xemthem" id="xemthem">
                            <div id="more" onclick="xemThem()">
                                <span>
                                    Xem thêm <i class="select-input__icon fas fa-angle-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  

        </div>


    </div>
    <!-- <script src="https://uhchat.net/code.php?f=69535a"></script> -->
</body>

</html>