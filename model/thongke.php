<?php
function doanhthu_ngay(){
    $sql="SELECT date, SUM(thanhtien) AS doanhthu_ngay
    FROM order_detail GROUP BY date";
    $day=pdo_query($sql);
    return $day;   
}
function doanhthu_thang(){
    $sql="SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(thanhtien) AS doanhthu_thang
    FROM order_detail GROUP BY month;";
    $day=pdo_query($sql);
    return $day;   
}
function loadall_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listthongke=pdo_query($sql);
    return $listthongke;
}
function load_tongsanphamdaban(){
    $sql="SELECT *, SUM(soluong) AS tongsanpham FROM order_detail;";
      $load_tongsanphamdaban=pdo_query($sql);
      // var_dump($thongke);
      return $load_tongsanphamdaban;
}

function load_tongtien(){
    $sql=" SELECT *, SUM(tongtien) AS tongtien FROM cart_detail where trangthai = 4;";
    $load_tongtien=pdo_query($sql);
    return $load_tongtien;
}
function load_tongtienchuahoanthanh(){
    $sql=" SELECT *, SUM(tongtien) AS tongtien FROM cart_detail where trangthai <> 4;";
    $load_tongtien=pdo_query($sql);
    return $load_tongtien;
}
?>