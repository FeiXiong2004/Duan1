<!DOCTYPE html>
<html lang="en">
    <?php
        // session_start();
        // ob_start();
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Gio_hang.css">
    <link rel="stylesheet" href="./view/user/CSS/header.css">


</head>


    

<body>
    <!-- Header -->
    <a href="index.php">
        <div class="header">
         <img src="./upload/header.jpg" alt="SunPet">
         <div class="header--overlay"></div>
     </div></a>

    <!-- Giỏ hàng -->
    


    <div class="giohang--bgr" id="dsGioHang">
    <?php
        if (empty($dataDb)) {
            echo '<h1>Chưa có sản phẩm nào trong giỏ hàng</h1>';
        } else {
    ?>
        <section class="giohang1 col-md-12 col-lg-12 col-sm-12">
            <div class="title">
                GIỎ HÀNG CỦA BẠN
            </div>

            <div class="giohang-container">
                <div class="giohang--head">
                    <div class="col-2">Ảnh sản phẩm</div>
                    <div class="col-3">Tên sản phẩm</div>
                    <div class="col-2">Đơn giá</div>
                    <div class="col-3">Số lượng</div>
                    <div class="col-2">Thành tiền</div>
                    <div class="col-1">Xóa</div>
                </div>
                <!-- List Sp  -->

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
                            $i +=1;
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
                            
                            <div   onclick="return confirm('Bạn có muốn xóa sản phẩm này không??')" class="giohang--xoa col-1"><?=$xoasp?></div>
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
            </div>
            <div class="row giohang1--footer col-12">
                <div class="col-4 bold">
                    <a href="?act=product">
                        <button class="btn-tieptucmuahang">Tiếp tục mua hàng</button>
                    </a>
                </div>
                <div class="col-4 bold">
                    <form action="?act=order" method="post" >
                        <button name="order" class="btn-tienhanhdathang">Tiến hành đặt hàng</button>
                    </form>
                </div>
            </div>
            
        </section>

        <?php
            }     
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // hàm cập nhật số lượng
    function updateQuantity(id, index) {
        // alert('Update Quantity');
        // lấy giá trị của ô input
        let newQuantity = $('#quantity_' + id).val();
        // console.log(newQuantity);
        if (newQuantity <= 0) {
            newQuantity = 1
        }

        // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
        $.ajax({
            type: 'POST',
            url: './view/GioHang/updateQuantity.php',
            data: {
                id: id,
                quantity: newQuantity
            },
            success: function(response) {
                // Sau khi cập nhật thành công
                $.post('./view/GioHang/tableCartOrder.php', function(data) {
                    $('#order').html(data);
                })
            },
            error: function(error) {
                console.log(error);
            },
        })
    }
    </script>      
    <!-- Footer -->
    <!-- <div class="frame--footer--container">
        <iframe src="Footer.html" frameborder="0" class="frame--footer" scrolling="no"></iframe>
    </div> -->



</body>

</html>