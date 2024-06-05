<?php
    // var_dump($_SESSION['email']['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ddd;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f0ad4e;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        table {
           
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f0ad4e   ;
            color: white;
        }
        .btn-group{
            display:flex;
        }
        .back-btn {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 250px;
            padding: 10px 20px;
            /* background-color: #f0ad4e; */
            color: #ffff;
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
            color: black;
            /* text-transform: uppercase; */
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }
        .detail {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 150px;
            padding: 10px 20px;
            background-color: #f0ad4e;
            color: white;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lịch sử đơn hàng</h1>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Thời gian</th>
                <th>Số lượng mặt hàng </th>
                <th>Trạng thái</th>
                <th>Chi tiết đơn hàng</th>
            </tr>
        </thead>
            <?php foreach($listBill as $order):?>
            <tr>
                <td><?= "PET#". $order['id_order']?></td>
                <td><?= $order ['ngaydathang']?></td>
                <td><?= countCart($order['id_order'])?></td>
                <td><?= status($order['trangthai'])?></td>
                <td><a href="index.php?act=order_detail&id_order=<?= $order['id_order'] ?>" class="detail">Chi tiết đơn hàng</a></td>
            <?php endforeach ?>
            </tr>
            <!-- Thêm các dòng dữ liệu khác tương tự cần thiết -->
        </tbody>
            <!-- Thêm các dòng dữ liệu khác tương tự cần thiết -->
        </tbody>
    </table>
    <div class="btn-group">
    <a class="back-btn" style="background-color: #dc3545; " href="index.php">Quay lại trang chủ</a>
        <a class="back-btn" style="background-color: #f0ad4e;" href="index.php?act=product">Tiếp tục mua hàng</a>
    </div>
</body>
</html>