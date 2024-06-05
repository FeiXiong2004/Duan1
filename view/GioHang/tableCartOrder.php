<?php
session_start();
include "../../model/pdo.php";
include "../../model/sanpham.php";

if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
    $productId = array_column($cart, 'id');

    // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
    $idList = implode(',', $productId);

    // Lấy sản phẩm trong bảng sản phẩm theo id
    $dataDb = loadone_sanphamCart($idList);
    $sum_total = 0;
    $i=0;
    foreach ($dataDb as $key => $product) :
        // kiểm tra số lượng sản phẩm trong giỏ hàng
        $quantityInCart = 0;
        foreach ($_SESSION['cart'] as $item) {
            $xoasp = '<a href ="?act=delCart&idCart='.$i.'" > <button class="far fa-trash-alt btn-xoa"></button> </a>';
            if ($item['id'] == $product['id']) {
                $quantityInCart = $item['quantity'];
                break;
            }
        }
?>
                <div id="order">  
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

        <?php
            }     
        ?>
