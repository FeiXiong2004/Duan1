    <style>
        .mb-3{
            margin-bottom: 1rem !important;
        }
    </style>

<div class="col-md-8" >
        <h1 class="mb-3" >THÊM MỚI SẢN PHẨM</h1>
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="danhmuc" class="form-label">Danh mục sản phẩm</label><br>
            <select name="iddm" id="" class="form-control" >
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                ?>      
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="tensp" />
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh sản phẩm</label><br>
            <input type="file" id="image" name="anh" />
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="giasp" />
        </div>

        <!-- <div class="mb-3">
            <label for="discount" class="form-label">Giảm giá sản phẩm</label>
            <input type="number" class="form-control" id="discount" placeholder="Nhập giảm giá sản phẩm"
                name="giamgiasp" />
        </div> -->

        <!-- <div class="mb-3">
            <label for="mota" class="form-label">Mô tả sản phẩm</label>
            <textarea name="motasp" id="mota" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
        </div> -->


        <div>
            <input type="submit" name="themmoi" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
        ?>
    </form>
</div>  
