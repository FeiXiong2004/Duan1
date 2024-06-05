<?php
/****************************************************************************************/
    // Thêm sản phầm 
    function insert_sanpham($tensp,$anh,$price,$iddm){
        $sql="insert into sanpham(name,img,price,iddm) values('$tensp','$anh','$price','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
/****************************************************************************************/
    // Sản phẩm top 10    
    function loadall_sanpham_top10(){
        $sql="select * from sanpham where 1 order by luotxem desc limit 0,4"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
/****************************************************************************************/
    // Lọc giá tăng dần , giảm dần 
    function loadall_sanpham_home($filter){
        $sql="select * from sanpham where 1 ";
        if($filter!=""){
            $sql.="order by price $filter";
        }
        // if($kyw != ""){
        //     $sql.=" name like '%".$kyw."%'";
        // }       
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function timSanPham($kyw){
        $sql="select * from sanpham where name like '%".$kyw."%'";     
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
/****************************************************************************************/
    // In sản phẩm danh mục chó và mèo
    function load_sanpham_danhmuc_cho(){
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price , sanpham.img, danhmuc.name 
        AS tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        WHERE danhmuc.name = 'Chó' LIMIT 2";
        $result = pdo_query($sql);
        return $result;
    }
    function load_sanpham_danhmuc_meo(){
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price , sanpham.img, danhmuc.name 
        AS tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        WHERE danhmuc.name = 'Mèo' LIMIT 2";
        $result = pdo_query($sql);
        return $result;
    }
/****************************************************************************************/
    function danhsach_sanpham(){
        $sql="select * from sanpham where 1"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw="",$iddm=0){
        $sql="SELECT sanpham.id, sanpham.name, sanpham.price, sanpham.img, danhmuc.name AS 
        tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id ";
        if($kyw!=""){
            $sql.=" where sanpham.name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" where iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
/****************************************************************************************/
        // In sản phẩm danh mục chó và mèo
    function sanpham_theodanhmuc($iddm){
        $sql = "select * from sanpham where iddm = $iddm";
        $result = pdo_query($sql);
        return $result;
    }
/****************************************************************************************/
    function loadone_sanpham($idsp){
        $sql="select * from sanpham where id=".$idsp;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function loadone_sanpham_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id,$tensp,$photo,$giasp,$iddm){
        if($photo!="")
            $sql="UPDATE `sanpham` SET `name`='$tensp',`price`='$giasp',`img`='$photo',`iddm`='$iddm' WHERE id=".$id;
        else
            $sql="UPDATE `sanpham` SET `name`='$tensp',`price`='$giasp',`iddm`='$iddm' WHERE id=".$id;
        pdo_execute($sql);       
    }
    function loadone_sanphamCart ($idList) {
        $sql = 'SELECT * FROM sanpham WHERE id in ('.$idList.')';
        $sanpham = pdo_query($sql);
        return $sanpham;
    }
?>