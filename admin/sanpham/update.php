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
    <form method="post" action="?act=suasp" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $sp['id']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="tensp"
                value="<?php echo $sp['name']; ?>" />
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="giasp"
                value="<?php echo $sp['price']; ?>" />
        </div>

        <div class="mb-3">
            <?php if($sp['img'] != null && $sp['img'] != ""): ?>
            <img width="200" src="<?php echo "../upload/" . $sp['img']; ?>" alt="">
            <?php endif; ?>
            <label for="image" class="form-label">Ảnh sản phẩm</label><br><br>
            <input type="file" id="image" name="anh" />
        </div>

        <div class="mb-3">
            <label for="danhmuc" class="form-label">Danh mục sản phẩm</label><br>
            <select name="iddm" id="danhmuc" class="form-control">
                <?php foreach($listdanhmuc as $value): ?>
                <option value="<?php echo $value['id']?>"
                 <?php if($sp['iddm'] == $value['id']): ?> selected
                    <?php endif; ?>>
                    <?php echo $value['name']?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="capnhat">Chỉnh sửa</button>
    </form>
</div>