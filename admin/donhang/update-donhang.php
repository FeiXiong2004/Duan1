    <style>
        h1{
            margin-bottom: 2rem ;
        }
        .mb-3{
            margin-bottom: 2rem !important;
        }
    </style>


<div class="col-md-8">
    <h1>Sửa sản phẩm</h1>
    <form method="post" action="?act=editdh" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $donHang['id_order']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Họ và tên </label>
            <input type="text" class="form-control" id="name" 
            placeholder="Họ và tên" name="hoten" readonly
            value="<?php echo $donHang['hoten']; ?> " />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Số điện thoại </label>
            <input type="text" class="form-control" id="name" readonly placeholder="Số điện thoại" name="sdt"
                value="<?php echo $donHang['sdt']; ?>" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Email </label>
            <input type="text" class="form-control" id="name" readonly placeholder="Email" name="email"
                value="<?php echo $donHang['email']; ?>" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Địa chỉ </label>
            <input type="text" class="form-control" id="name" readonly placeholder="Địa chỉ" name="address"
                value="<?php echo $donHang['diachi']; ?>" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Số lượng sản phẩm </label>
            <input type="text" class="form-control" id="name" readonly name="email"
                value="<?php echo countCart($donHang['id_order']); ?>" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tổng tiền </label>
            <input type="text" class="form-control" id="name" readonly name="tongtien"
                value="<?php echo number_format($donHang['tongtien']);?> VNĐ" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Phương thức thanh toán</label>
            <input type="text" class="form-control" id="name" readonly name="pttt"
                value="<?php echo thanhToan($donHang['pttt']); ?>" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Ngày đặt hàng </label>
            <input type="text" class="form-control" id="name" readonly placeholder="Địa chỉ" name="ngaydathang"
                value="<?php echo $donHang['ngaydathang']; ?>" />
        </div>


        <div class="mb-3">
            <label for="tranthai" class="form-label">Trạng thái đơn hàng</label><br>
            <select name="trangthai" class="form-control">

            <!-- Sử dụng vòng lặp for để tạo các tùy chọn từ 1 đến 4.
            Sử dụng biểu thức điều kiện ngắn (($donHang['trangthai'] === $i) ? 'selected' : '') để kiểm tra xem giá trị của $donHang['trangthai'] có bằng với giá trị của vòng lặp không và thêm thuộc tính selected nếu có.
            Sử dụng hàm status($i) để hiển thị nội dung của tùy chọn. -->
            
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <option value="<?php echo $i; ?>" 
                        <?php echo ($donHang['trangthai'] === $i) ? 'selected' : ''; ?>>
                        <?php echo status($i); ?>
                    </option>
                <?php endfor; ?>
            </select>

        </div>
        <button type="submit" class="btn btn-primary" name="capnhat">Cập nhật</button>
    </form>
</div>