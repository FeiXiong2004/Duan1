<?php
// var_dump($id_order);
// var_dump($order_detail);
// var_dump($thongtin_donhang);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn Thanh toán</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ddd;
            margin: 0;
            padding: 0;
        }
        .text-center{
            background-color: #f0ad4e;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .btn-group{
            display:flex;
            /* background-color: #f0ad4e; */

        }
        .back-btn {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 250px;
            padding: 10px 20px;
            color: black;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: 0.5s
        }
        .back-btn:hover {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 250px;
            padding: 10px 20px;
            background-color: #f0ad4e;
            color: #f0ad4e;
            /* text-transform: uppercase; */
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }

    </style>
</head>

<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Hóa đơn Thanh toán</h2>

    <!-- Thông tin Khách hàng -->
    <div class="card mb-4">
        <div class="card-header">
            Thông tin Khách hàng
        </div>
        <div class="card-body">
            <p><strong>Tên:</strong> <?=$thongtin_donhang['hoten'] ?></p>
            <p><strong>Địa chỉ:</strong> <?=$thongtin_donhang['diachi'] ?></p>
            <p><strong>Email:</strong> <?=$thongtin_donhang['email'] ?></p>
            <p><strong>Số điện thoại :</strong> <?=$thongtin_donhang['sdt'] ?></p>
            <p><strong>Phương thức thanh toán :</strong> <?=thanhToan($thongtin_donhang['pttt']) ?></p>
        </div>
    </div>

    <!-- Sản phẩm -->
    <div class="card mb-4">
        <div class="card-header">
            Sản phẩm
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <?php foreach($order_detail as $order_detail):?>

                <tbody>
                    <tr>
                        <td><?=$order_detail['namesp'] ?></td>
                        <td><img src="./upload/<?=$order_detail['img'] ?>" width="100px" alt=""></td>
                        <td><?=number_format($order_detail['giamua']) ?> VNĐ</td>
                        <td><?=$order_detail['soluong'] ?></td>
                        <td><?= number_format($order_detail['tt']) ?> VNĐ</td>
                    </tr>
                    <!-- Thêm các dòng sản phẩm khác nếu có -->
                </tbody>
                <?php endforeach ?>

            </table>

            <!-- Tổng tiền -->
            <div class="d-flex justify-content-between">
                <p><strong>Trạng thái:</strong> <?=status($thongtin_donhang['trangthai']) ?></p>
                <h5><strong>Tổng tiền:</strong> <?= number_format($thongtin_donhang['tongtien']) ?> VNĐ</h5>
            </div>
        </div>
    </div>

    <div class="btn-group">
        <a class="back-btn" style="background-color: #dc3545; color :#fff " href="index.php?act=my_cart">Quay lại</a>
        <a class="back-btn" style="background-color: #f0ad4e; color :#fff" href="index.php?act=product">Tiếp tục mua hàng</a>
    </div>               
</div>

</body>
</html>
