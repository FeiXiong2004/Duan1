
<div class="col-12" >
        <h2>DANH SÁCH ĐƠN HÀNG</h2>
    <br>


        <table class="table table-bordered border-primary">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ </th>
                <th scope="col">Số lượng </th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($danhSachDonHang as $key => $donhang): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $donhang['hoten']; ?> <br>
                </td>
                <td>
                    <?php echo $donhang['sdt']; ?>
                </td>
                <td>
                    <?php echo $donhang['email']; ?>
                </td>
                <td>
                    <?php echo $donhang['diachi']; ?>
                </td>
                <td>
                    <?php echo countCart($donhang['id_order']); ?>
                </td>
                <td>
                    <?php echo $donhang['tongtien']; ?>
                </td>
                <td>
                    <?php echo thanhToan($donhang['pttt']); ?>
                </td>
                <td>
                    <?php echo $donhang['ngaydathang']; ?>
                </td>
                <td>
                <?php
                        switch ($donhang['trangthai']) {
                            case '1':
                                $color = 'black';
                                break;
                            case '2':
                                $color = 'red';
                                break;
                            case '3':
                                $color = 'blue';
                                break;
                            case '4':
                                $color = 'green';
                                break;
                        }
                        echo '<b style="color:' . $color . ';">' . status($donhang['trangthai']) . '</b>';
                        ?>
                </td>
                
                <td>
                    <a href="?act=editdh&iddh=<?php echo $donhang['id_order']; ?>" class="btn btn-warning">Sửa</a>
                    <a class="btn btn-danger" 
                    onclick="return confirm('bạn có muốn xóa không')" href="?act=deletedh&iddh=<?php echo $donhang['id_order']; ?>" 
                    >
                        Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>            
            </table>
            <div>
                <!-- <input type="button" value="CHỌN TẤT CẢ" onclick="ctt()">
                <input type="button" value="BỎ CHỌN TẤT CẢ" onclick="btt()">
                <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                <!-- <a href="index.php?act=addsp"> <input type="button" value="NHẬP THÊM"></a> -->
            </div>
</div>



