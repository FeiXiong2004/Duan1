<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div>
    <div>
        <h1>CẬP NHẬT DANH MỤC</h1>
    </div>
    <div>
    <form action="index.php?act=updatedm" method="POST">
    <div>
        ID
        <input type="text" name="maloai" disabled>
    </div>
    <div>
        Tên 
        <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name ;?>">
    </div> 
    <div>
        <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id ;?>">
        <input  type="submit" name="capnhat" value="CẬP NHẬT">
        <input  type="reset" value="NHẬP LẠI">
        <a href="index.php?act=lisdm"><input type="button" value="DANH SÁCH"></a>
    </div>
    <?php
        if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
    ?>
        </form>
    </div> 
</div>
