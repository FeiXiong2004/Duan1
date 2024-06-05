<div>
    <div>
        <h1>THÊM MỚI DANH MỤC</h1>
    </div>
<div>
    <form action="index.php?act=adddm" method="POST">
        <div>
            ID
            <input type="text" name="maloai" disabled>
        </div>
        <div>
            Tên 
            <input type="text" name="tenloai">
        </div>
        <div>
            <input type="submit" name="themmoi" value="THÊM MỚI">
            <input  type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
        ?>
    </form>
</div>
</div>