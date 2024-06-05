<?php
function danhsach_donhang(){
        $sql = "select * from cart_detail";
        $result = pdo_query($sql);
        return $result;
}

function load_one_donhang($id_order){
    $sql = "select * from cart_detail where id_order = $id_order";
    $result = pdo_query_one($sql);
    return $result;
}

function load_sanpham_user($id_order){
    $sql = "SELECT
    order_detail.giamua,order_detail.soluong,order_detail.thanhtien as tt,
    sanpham.name as namesp , sanpham.img
            FROM cart_detail
            INNER JOIN order_detail ON cart_detail.id_order = order_detail.id_order
            INNER JOIN sanpham ON order_detail.id_pro = sanpham.id 
    WHERE order_detail.id_order = $id_order; ";
    $result = pdo_query($sql);
    return $result;
}
function myCart($id_user){
    $sql = " SELECT * from cart_detail where id_user = $id_user ORDER BY id_order DESC ";
    $result = pdo_query($sql);
    return $result;
}
function lichsu_donhang($id){
    $sql="SELECT  cart_detail.* FROM cart_detail 
    INNER JOIN order_detail ON cart_detail.id_order=order_detail.id_order where id_user ='".$id."' ;";
    if($id= ""){
        $sql.=" " ;
    }
    return pdo_query($sql);
}

function addOrder($id_user, $hoten, $sdt, $email, $diachi, $tongtien, $pttt){
    $sql="INSERT INTO cart_detail (id_user, hoten, sdt, email, diachi, tongtien, pttt) VALUES ($id_user, '$hoten', '$sdt', '$email', '$diachi', $tongtien, $pttt);";
    $id=pdo_executeid($sql);
    return $id;
}

function addOrderDetail($id_order, $id_pro, $giamua, $soluong, $thanhtien){
    $sql="INSERT INTO order_detail (id_order, id_pro, giamua, soluong, thanhtien) VALUES ($id_order, $id_pro, $giamua, $soluong, $thanhtien );";
    pdo_execute($sql);
}

function countCart($id_order){
    $sql = "select * from order_detail where id_order = '$id_order'";
    $result = pdo_query($sql);
    return sizeof($result);
}

function updateStatus($trangThai,$id_order){
    $sql="update cart_detail set trangthai='".$trangThai."' where id_order=".$id_order;
    pdo_execute($sql);
}
function status($n){
    switch($n) {
        case '1':{
            $tt = "Đang chờ duyệt";
            break;
        }
        case '2':{
            $tt = "Đã xác nhận";
            break;
        }
        case '3':{
            $tt = "Đang vận chuyển";
            break;
        }
        case '4':{
            $tt = "Hoàn thành";
            break;
        }
}
    return $tt;

}

function thanhToan($a){
    switch($a) {
        case '1':{
            $pt = "Thanh toán khi nhận hàng";
            break;
        }
        case '2':{
            $pt = "Chuyển khoản";
            break;
        }
}
    return $pt;
}
?>