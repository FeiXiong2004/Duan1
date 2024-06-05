<?php 
//  join 3 bảng bình luận ,sản phẩm ,taì khoản
function danhsach_binhluan(){
        $sql = "SELECT binhluan.*, sanpham.name, user.user
        FROM binhluan
        JOIN sanpham ON binhluan.idpro = sanpham.id
        JOIN user ON binhluan.iduser = user.id;";
        $result = pdo_query($sql);
        return $result;
    }
    function loadall_binhluan($idsp){
        $sql = "
            SELECT binhluan.* , user.user FROM `binhluan` 
            LEFT JOIN user ON binhluan.iduser = user.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($noidung,$iduser,$idpro){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','$iduser','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }
    function delete_binhluan($idbl){
        $sql = "
            DELETE FROM `binhluan` WHERE id = $idbl;
        ";
        pdo_execute($sql);
    }


?>