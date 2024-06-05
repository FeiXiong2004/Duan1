<div class="col-md-8">
    <h3>Danh sách danh mục sản phẩm</h3>
    <!-- <a href="?act=addbl" class="btn btn-success">Thêm mới</a> -->
    
<br>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Nội dung</th>
                <th scope="col">User</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Ngày bình luận</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($danhSachBinhLuan as $key => $value): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $value['noidung']; ?>
                </td>
                <td>
                    <?php echo $value['user']; ?>
                </td>
                <td>
                    <?php echo $value['name']; ?>
                </td>
                <td>
                    <?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])) ?>
                </td>

                <td>


                    <a class="btn btn-danger"
                    onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="?act=deletebl&idbl=<?php echo $value['id'] ?>" >

                        Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>




<!-- <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hành động này không thể hoàn tác. Bạn có muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="" class="btn btn-danger" id="btn-delete">Xác nhận xóa</a>
            </div>
        </div>
    </div>
</div>


<script>
var modalDelete = document.getElementById('modalDelete')
modalDelete.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget
    var idbl = button.getAttribute('data-bs-id')
    var link = `?act=deletebl&idbl=${idbl}`
    document.getElementById("btn-delete").setAttribute("href", link)
})
</script> -->