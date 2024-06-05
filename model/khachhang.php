<?php  
    function danhsach_khachhang(){
        $sql = "select * from user";
        $result = pdo_query($sql);
        return $result;
    }

    function add_khachhang($tenkh, $password, $email, $address, $tel, $role){
        $sql = "
            insert INTO user(`user`, `pass`, `email`, `address`, `tel`, `role`) VALUES ('$tenkh', '$password', '$email', '$address', '$tel', '$role')
        ";
        pdo_execute($sql);
    }

    function getone_khachhang($idkh){
        $sql = "select * from user where id = $idkh";
        $result = pdo_query_one($sql);
        return $result;
    }
    function update_khachhang($tenkh, $password, $email, $address, $tel, $role, $idkh){
        $sql = "
            UPDATE `user` SET `user`='$tenkh',`pass`='$password',`email`='$email',`address`='$address',`tel`='$tel',`role`='$role' WHERE id = $idkh
        ";
        pdo_execute($sql);
    }
    function delete_khachhang($idkh){
        $sql = "delete FROM `user` WHERE id = $idkh";
        pdo_execute($sql);
    }
?>