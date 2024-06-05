<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Gio_hang.css">
    <link rel="stylesheet" href="./view/user/CSS/Dat_hang.css">
    <link rel="stylesheet" href="./view/user/CSS/header.css">
    
    <!-- <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css"> -->
    <script src="./view/user/JS/datHang.js"></script>
</head>

<body>

        <?php 
            if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];

                    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                    $productId = array_column($cart, 'id');
                    // var_dump($productId);
            
                    // Chuyển đôi mảng id thành một chuỗi để thực hiện truy vấn
                    $idList = implode(',', $productId);
                    // var_dump($idList);            
                    
                    // Lấy sản phẩm trong bảng sản phẩm theo id
                    $dataDb = loadone_sanphamCart($idList);
                    // var_dump($dataDb);
            } 
            if(isset($_SESSION['email']) && (is_array($_SESSION['email']))){
                extract($_SESSION['email']);
                // var_dump($_SESSION['email']);
                // die();
            }else{
            $user ="";
            $tel ="";
            $email ="";
            $address ="";
            }    
        ?>
    <!-- Header -->
    <div class="header col-12">
        <img src="./upload/header.jpg" alt="SunPet">
        <a href="index.php">
            <div class="header--overlay"></div>
        </a>
    </div>

    <!-- Nội dung đơn hàng -->
    <div class="donhang--container col-12">
        <div class="row col-12 donhang--title">THÔNG TIN ĐƠN HÀNG</div>
        <!-- Thông tin khách hàng  -->
        <form action="" method="post">
            <div class="row col-12 donhang--khachhang1" id="donhang--khachhang1">
                <div class="col-9">
                    <div>
                        <label for="" class="khachhang--title">THÔNG TIN KHÁCH HÀNG</label>
                            <!-- <button class="btn--close" onclick="anFormThayDoi()">X</button> -->
                            <div class="form--row">
                                <label for="">Họ tên: </label>
                                <input type="text" value="<?=$user?>" required name="user" id="change-hoten">
                            </div>
                            <div class="form--row">
                                <label for="">Số điện thoại: </label>
                                <input type="text" value="<?=$tel?>" required name="tel" id="change-sdt">
                            </div>
                            <div class="form--row">
                                <label for="">Email: </label>
                                <input type="text" value="<?=$email?>" required name="email" id="change-sdt">
                            </div>
                            <div class="form--row">
                                <label for="">Địa chỉ: </label>
                                <input type="text" value="<?=$address?>" required name="address" id="change-diachi">
                            </div>
                            <div class="form--row">
                                <label for="">Phương thức thanh toán: </label>
                                <form action="?act=order" method="post" class="input--cod " >
                                    <input type="radio" value="1" name ="pttt" checked> Thanh toán khi giao hàng <br>
                                    <input type="radio" value="2" name ="pttt"> Thanh toán trực tuyến
                                </form>
                            </div>
                            <input type="hidden" value="<?=$id?>" >
                        </form>
                <!-- <a href="#" class="form--row">
                    <button class="btn--change" >Thay đổi</button>
                </a> -->
                
    </div>

                </div>
            <div class="col-3 btn--thaydoi bold">
                <div class="col-3">                    
                <button type="submit" class="btn-tienhanhdathang" name="order_confirm">Xác nhận</button>
                </div>
            </div>
            <!-- <div class="col-lg-12 col-md-12 bold">
                        <button type="submit" class="btn-tienhanhdathang" name="order_confirm">Xác nhận</button>
                    </div> -->
        </div>

        </form>


        <!-- Load nội dung từ giỏ hàng -->
        <div class="giohang--bgr col-sm-12 col-md-12 col-lg-12">
            <section class="giohang1 col-md-12 col-lg-12 col-sm-12">
                <div class="title">
                    SẢN PHẨM
                </div>
                <div class="giohang-container">
                    <div class="giohang--head">
                        <div class="col-2">Ảnh sản phẩm</div>
                        <div class="col-3">Tên sản phẩm</div>
                        <div class="col-2">Đơn giá</div>
                        <div class="col-3">Số lượng</div>
                        <div class="col-2">Thành tiền</div>
                    </div>

                    
                    <div id="order">  
                        <?php
                    $sum_total = 0;
                    foreach ($dataDb as $key => $product) :
                        // kiểm tra số lượng sản phẩm trong giỏ hàng
                        $quantityInCart = 0;
                        $i = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $xoasp = '<a href ="?act=delCart&idCart='.$i.'" > <button class="far fa-trash-alt btn-xoa"></button> </a>';
                            if ($item['id'] == $product['id']) {
                                $quantityInCart = $item['quantity'];
                                break;
                            }
                        }
                        ?>
                        <div class="giohang--item">

                            <div class="giohang--anhsp col-2">
                                <img src="./upload/<?=$product['img'] ?>" alt="sanpham">
                            </div>

                            <div class="tensp col-3">
                                <a href="#"><?= $product['name'] ?></a><br>
                            </div>

                            <div class="giohang--dongia col-2">
                                <p><?= number_format((int)$product['price'], 0, ",", ".")  ?> <u>đ</u></p>
                            </div>

                            <div class="giohang--soluong col-3">
                                <!-- <button class="fas fa-minus btn-giam"></button> -->
                                <input type="number" value="<?= $quantityInCart ?>" min="1"
                                id="quantity_<?= $product['id'] ?>" 
                                oninput="updateQuantity(<?= $product['id'] ?>, <?= $key ?>)">
                                <!-- <button class="fas fa-plus btn-tang"></button> -->
                            </div>

                            <div class="giohang--thanhtien col-2">
                                <p><?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u></p>
                            </div>
                        </div>
                        
                    

            <?php
                // Tính tổng giá đơn hàng
                $sum_total += ((int)$product['price'] * (int)$quantityInCart);

                // Lưu tổng giá trị vào sesion
                $_SESSION['resultTotal'] = $sum_total;
            endforeach;
            ?>
            <div class="row giohang--pttt">
                <div class="col-4 bold">
                    <!-- <div>Phương thức thanh toán</div>
                    <form action="?act=order" method="post" class="input--cod " >
                        <input type="radio" value="1" name ="order" checked> Thanh toán khi giao hàng <br>
                        <input type="radio" value="2" name ="order"> Thanh toán trực tuyến
                    </form> -->
                </div>
                <div class="col-lg-4 col-md-4 bold">
                    <div class="tongtien">Tổng tiền: 
                        <span id="tongtien1"><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></div>
                </div>
            </div>
                </div>

                <div class="row giohang1--footer">
                    <!-- <div class="col-lg-12 col-md-12 bold">
                        <button type="submit" class="btn-tienhanhdathang" name="order_confirm">Xác nhận</button>
                    </div> -->
                </div>

                

            </section>


        </div>

    </div>

    <!-- Footer -->
 
</body>

</html>