<div class="col-md-8">
    <h3>Sửa thông tin khách hàng</h3>
    <form method="post" action="?act=editkh">
        <input type="hidden" value="<?php echo $khachhang['id'] ?>" name="idkh">
        <div class="mb-3">
            <label for="name" class="form-label">Tên khách hàng</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên khách hàng" name="tenkh"
                value="<?php echo $khachhang['user'] ?>" />
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="password"
                value="<?php echo $khachhang['pass'] ?>" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email"
                value="<?php echo $khachhang['email'] ?>" />
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address"
                value="<?php echo $khachhang['address'] ?>" />
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="tel" placeholder="Nhập số điện thoại" name="tel"
                value="<?php echo $khachhang['tel'] ?>" />
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Quyền</label>
            <select class="form-control" id="role" name="role" value="<?php echo $khachhang['role'] ?>">
                <option value="0" <?php if($khachhang['role'] == "0"): ?> selected <?php endif; ?>>Khách hàng</option>
                <option value="1" <?php if($khachhang['role'] == "1"): ?> selected <?php endif; ?>>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="btnsubmit">Chỉnh sửa</button>
    </form>
</div>