 <?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/binhluan.php";
    include "../model/account.php";
    include "../model/khachhang.php";
    include "../model/order.php";
    include "../model/thongke.php";
    

?> 
<!-- Controller : Admin -->

    <div id="wrapper">
        <!-- header -->
        <?php include "header.php"; ?>
        <!-- menu -->
        <?php include "menu.php"; ?>
        <!-- main -->
        <div id="page-wrapper">
            <!-- main web -->
            <?php 
                $danhSachBinhLuan = danhsach_binhluan();
                $listthongke=loadall_thongke();


                // Controller
                if(isset($_GET['act']) && $_GET['act'] != ""){
                    $act = $_GET['act'];
                    switch($act){

                        // case có thể tự đặt 
                        case "trangchu":{
                            include "./dashboard/dashboard.php";
                            break;
                        }
                        // case có thể tự đặt 
                        case "dashboard":{
                            // Kiem tra nguoi dung co click vao add hay khong
                            $doanhthu_ngay=doanhthu_ngay();
                            $listthongke=loadall_thongke();
                            include "./dashboard/dashboard.php";
                            break;
                        }                          
                        // Phần xử lí danh mục 
                        case "adddm":{
                            // Kiem tra nguoi dung co click vao add hay khong
                            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                                $tenloai=$_POST['tenloai'];
                                insert_danhmuc($tenloai);
                                $thongbao="Thêm thành công";
                                header("location: ?act=listdm");
                            }
                            
                            include "danhmuc/add.php";
                            break;
                        }    
                            // load danh sach danh muc
                        case "listdm":{
                            $listdanhmuc=loadall_danhmuc();
                            // var_dump($listdanhmuc);
                            include "danhmuc/list.php";
                            break; 
                        }
                        case "xoadm":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_danhmuc($_GET['id']);
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break;  
                        }
                        case "suadm":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $dm=loadone_danhmuc($_GET['id']);
                            }
                            include "danhmuc/update.php";
                            break; 
                        }
                        case "updatedm":{
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $tenloai=$_POST['tenloai'];
                                $id=$_POST['id'];
                                update_danhmuc($id,$tenloai);
                                $thongbao="Cập nhật thành công";
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break;
                        }
                        // Phần xử lí sản phẩm
                        case "addsp":{
                            // Kiem tra nguoi dung co click vao add hay khong
                            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                                $iddm=$_POST['iddm'];
                                $tensp=$_POST['tensp'];                              
                                $anh=$_FILES['anh']['name'];
                                $giasp=$_POST['giasp'];
                                $target_dir = "../upload/";
                                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                } else {
                                    // echo "Sorry, there was an error uploading your file.";
                                }
            
                                insert_sanpham($tensp,$anh,$giasp,$iddm);
                                $thongbao="Thêm thành công";
                                header("location: ?act=listsp");
                            }
            
                            $listdanhmuc=loadall_danhmuc();
                            include "sanpham/add.php";
                            break;
                        }
                        case "listsp":{
                            // Tìm kiếm sản phẩm 
                            if(isset($_POST['search'])&&($_POST['search'])){
                                $kyw=$_POST['kyw'];
                                $iddm=$_POST['iddm'];
                                // var_dump($kyw);
                            }else{
                                $kyw='';
                                $iddm=0;
                            }
                            // $listchitietsanpham=list_ctsp();
                            // $listchitietsanpham=list_ctsp();
                            $listdanhmuc=loadall_danhmuc();
                            $listsanpham=loadall_sanpham($kyw,$iddm);
                            include "sanpham/list.php";
                            break; 
                        }
                        case "xoasp":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_sanpham($_GET['id']);
                            }
                            $listsanpham=loadall_sanpham();
                            include "sanpham/list.php";
                            break;  
                        }
                        case "suasp":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $sp=loadone_sanpham($_GET['id']);
                            }
                            if(isset($_POST['capnhat'])){
                                    $id=$_POST['id'];
                                    $iddm=$_POST['iddm'];
                                    $tensp=$_POST['tensp'];                            
                                    $giasp=$_POST['giasp'];
                                    // $anh=$_FILES['anh']['name'];
                                    // $target_dir = "../upload/";
                                    // $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                                    // if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                                    //     // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                    // } else {
                                    //     // echo "Sorry, there was an error uploading your file.";
                                    // }
                                    $photo = null;
                                    if($_FILES['anh']['name'] != ""){
                                        $photo = time() . "_" . $_FILES['anh']['name'];
                                        move_uploaded_file($_FILES['anh']['tmp_name'], "../upload/$photo");
                                    }
                                    update_sanpham($id,$tensp,$photo,$giasp,$iddm);
                                    // $thongbao="Cập nhật thành công";
                                    header("location: ?act=listsp");

                                }
                                $listdanhmuc=loadall_danhmuc();
                                // $listsanpham=loadall_sanpham("",0);
                                include "sanpham/update.php";
                                break;
                        }    
                        // Khách hàng
                        case "dskh":{
                            $dskh = danhsach_khachhang();
                            include "khachhang/list-khachhang.php";
                            break;
                        }
                        case "addkh":{
                            if(isset($_POST['btnsubmit'])){
                                $tenkh = $_POST['tenkh'];
                                $password = $_POST['password'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                $tel = $_POST['tel'];
                                $role = $_POST['role'];
                                add_khachhang($tenkh, $password, $email, $address, $tel, $role);
                                header("location: ?act=dskh");
                            }
                            include "khachhang/add-khachhang.php";
                            break;
                        }
                        case "editkh":{
                            if(isset($_GET['idkh']) & $_GET['idkh'] > 0){
                                $khachhang = getone_khachhang($_GET['idkh']);
                            }
                            if(isset($_POST['btnsubmit'])){
                                $tenkh = $_POST['tenkh'];
                                $password = $_POST['password'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                $tel = $_POST['tel'];
                                $role = $_POST['role'];
                                $idkh = $_POST['idkh'];
                                update_khachhang($tenkh, $password, $email, $address, $tel, $role, $idkh);
                                header("location: ?act=dskh");
                            }
                            include "khachhang/edit-khachhang.php";
                            break;
                        }
                        case "deletekh":{
                            if(isset($_GET['idkh']) && $_GET['idkh'] > 0){
                                delete_khachhang($_GET['idkh']);
                                header("location: ?act=dskh");
                            }
                            break;
                        }
                        // End Khách Hàng
                        // Bình luận 
                        case "dsbl":{
                            $danhSachBinhLuan = danhsach_binhluan();
                            // var_dump($danhSachBinhLuan);
                            include "binhluan/list-binhluan.php";
                            break;
                        }
                        case "deletebl":{

                            if(isset($_GET['idbl']) && $_GET['idbl'] > 0){
                                delete_binhluan($_GET['idbl']);
                                header("location: ?act=dsbl");
                            }
                            break;
                        }
                        // End bình luận 

                        case "dsdh":{
                            // $danhSachBinhLuan = danhsach_binhluan();
                            $danhSachDonHang = danhsach_donhang();
                            // var_dump($danhSachBinhLuan);
                            include "donhang/list-donhang.php";
                            break;
                        }
                        case "editdh":{
                            if(isset($_GET['iddh']) & $_GET['iddh'] > 0){
                                $donHang = load_one_donhang($_GET['iddh']);
                            }
                            if(isset($_POST['capnhat'])){
                                $trangThai = $_POST['trangthai'];
                                $id_order =$_POST['id'];
                                updateStatus($trangThai,$id_order);
                                header("location: ?act=dsdh");
                            }
                            include "donhang/update-donhang.php";
                            break;
                        }
                        case "deletedh":{

                            if(isset($_GET['idbl']) && $_GET['idbl'] > 0){
                                delete_binhluan($_GET['idbl']);
                                header("location: ?act=dsbl");
                            }
                            break;
                        }
                        // case"thongke":{
                        //     $listthongke = loadall_thongke();
                        //     include 'thongke/list.php';
                        //     break;
                        // }
                        case "dstk":
                            $listthongke=loadall_thongke();
                            include "thongke/list.php";
                            break;
                            
                        case "bieudo":
                            $listthongke=loadall_thongke();
                            include "thongke/bieudo.php";
                            break;

                        default: {
                            include "trangchu/trangchu.php";
                            break;
                        }
                    }
                }else{
                    include "./dashboard/dashboard.php";
                }
            ?>
        </div>
        <!-- footer -->
        <?php include "footer.php"; ?>
