<div class="col-12" style="min-width: 90%;">
    <h3>Danh sách khách hàng</h3>
    <br>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Quyền hạn</th>
                <th scope="col">Hành động</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($dskh as $key => $value): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td >
                    <?php echo $value['user']; ?>
                </td>
                <td >
                    <?php echo $value['email']; ?>
                </td>
                <td >
                    <?php echo $value['address']; ?>
                </td>
                <td >
                    <?php echo $value['tel']; ?>
                </td>
                <td >
                    <?php 
                        if($value['role'] == "0"){
                            echo "Khách hàng";
                        } else{
                            echo "Admin";
                        }
                    ?>
                </td>
                <td>
                    <a href="?act=editkh&idkh=<?php echo $value['id']; ?>" class="btn btn-warning">Sửa</a>
                    <a class="btn btn-danger"
                        onclick="return confirm('bạn có muốn xóa không')" href="?act=deletekh&idkh=<?php echo $value['id']; ?>" 
                        >
                        Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>


