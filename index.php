<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/account.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/order.php";
    include "model/binhluan.php";

    // unset($_SESSION['cart']);
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
    
    // include "./view/_menu.php";   
?>

    <!-- <div class="container"> -->


        <!-- main -->
        <?php            
            $danhSachDanhMuc = loadall_danhmuc();
            $danhSachSanPham = danhsach_sanpham();
            $loadSanPhamDanhMucCho =load_sanpham_danhmuc_cho();
            $loadSanPhamDanhMucMeo =load_sanpham_danhmuc_meo();
            $loadSanPhamNoiBat=loadall_sanpham_top10();
            $danhSachDonHang = danhsach_donhang();
            // Controller user
            if(isset($_GET['act']) ){
                $act = $_GET['act'];
                switch($act){
/*---------------------------------Chi tiết sản phẩm-------------------------------------- */                     
                    case 'chiTietSanPham':{
                        if(isset($_POST['guibinhluan'])&& $_POST['guibinhluan']){
                            $noidung = $_POST['noidung'];
                            $idpro = $_POST['idpro'];
                            $iduser = $_POST['user'];
                            insert_binhluan($noidung,$iduser,$idpro);
                        }

                        if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                            $sanpham = loadone_sanpham($_GET['idsp']);
                            $sanpham_lq = loadone_sanpham_cungloai($_GET['idsp'],$sanpham['iddm']);
                            $binhluan = loadall_binhluan($_GET['idsp']);                           
                            // tangluotxem($_GET['idsp']);
                            // $sanpham=loadone_sanpham($id_sp);
                            // $ditto_product=loadone_sanpham_cungloai($id_sp,$sanpham['iddm']);
                            include "./view/chiTietSanPham.php";
                        }else{
                            include "./view/home.php";            
                        }
                    break;

                    }
/*---------------------------------Đăng nhập-------------------------------------- */                     
                    case 'sign_up':{
                        $error=[];
                        if(isset($_POST["sign_up"])&&($_POST["sign_up"])){
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $user = $_POST['user'];
                            $tel = $_POST['tel'];
                            $address = $_POST['address'];
                            if(checkEmailExists($email) == true) {
                                $thongbao ="Đã tồn tại email !";
                                // include "./view/sign_up.php";
                            }else{  
                            insert_account($user,$pass,$email,$address,$tel);
                            $thongbao = "Đăng ký thành công !! ";
                            } 
                        }
                        include "./view/sign_up.php";
                        break;
                    }
                    case 'login':{
                        if (isset($_POST['login']) && ($_POST['login'] > 0)) {
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $checkemail = checkemail($email, $pass);
                            if (is_array($checkemail)) {
                                $_SESSION['email'] = $checkemail;
                                header("location:index.php");
                            } else {
                                $thongbao = "Tài khoản hoặc mật khẩu không đúng";
                                // include "./view/sign_up.php";
                            }
                        }  
                        
                        include "./view/login.php";
                        break;
                    }
                    case 'log_out':{
                        // session_unset();
                        unset($_SESSION['email']);
                        header("location:index.php");
                        break;
                    }
                    case 'edit_user':{
                        if (isset($_POST['update']) && ($_POST['update'] > 0)) {
                            $pass = $_POST['pass'];
                            $user = $_POST['user'];
                            $address = $_POST['address'];
                            $tel = $_POST['tel'];
                            $id = $_POST['id'];
                            $email = $_POST['email'];
                            $checkemail = checkemail($email, $pass);
                            update_account($id, $user, $pass, $email, $address, $tel);
                            $_SESSION['email'] = checkemail($email, $pass);
                            $thongbao = "Cập nhật thành công";
                            // header("location:index.php?act=edit_taikhoan");
                        }
                        include "./view/TaiKhoan/thongTin.php";
                        break;
                    }
                    case 'my_cart':{
                        $listBill=myCart($_SESSION['email']['id']);
                        // var_dump($danhSachDonHang);
                        // die();
                        include "./view/GioHang/myCart.php";
                        break;
                    }
                    case 'order_detail':{
                        if(isset($_GET['id_order'])){
                            $id_order=$_GET['id_order'];
                            $order_detail=load_sanpham_user($id_order);
                            $thongtin_donhang=load_one_donhang($id_order);
                        }
                        include "./view/GioHang/orderDetail.php";
                        break;
                    }
/*---------------------------------Trang sản phầm-------------------------------------- */                     
                    case 'product':{
                        $danhSachSanPham=loadall_sanpham_home((isset($_GET['filter']) ? $_GET['filter'] : ''));
                        include "./view/product.php";
                        break;
                    }
                    // Tìm sản phẩm 
                    case 'timSanPham':{
                        if(isset($_POST['kyw']) && ($_POST['kyw'] > 0)){
                            $kyw=$_POST['kyw'];
                            // var_dump($kyw);
                        }else{
                            $kyw='';
                        }
                        $danhSachSanPham=timSanPham($kyw);
                        include "./view/product.php";
                        break;
                    }
                    case 'product_cate':{
                        if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                        $danhSachSanPham = sanpham_theodanhmuc($_GET['iddm']);
                        }
                        include "./view/product.php";
                        break;
                    }

/*---------------------------------Giỏ hàng-------------------------------------- */ 
                    case 'viewCart' :{
                        if (!empty($_SESSION['cart'])) {
                            $cart = $_SESSION['cart'];

                            // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                            $productId = array_column($cart, 'id');
                            // var_dump($productId);
                            
                            // Chuyển đôi mảng id thành một chuỗi để thực hiện truy vấn
                            $idList = implode(',', $productId);
                            // var_dump($idList);                            
                            
                            // Lấy sản phẩm trong bảng sản phẩm theo id
                            $dataDb = loadone_sanphamCart($idList);
                            // var_dump($dataDb);
                        } 
                        include "./view/GioHang/ViewCart.php";
                        break;
                    }
                    case "delCart":{
                        if(isset($_GET['idCart'])){
                            // Xóa theo id 
                        array_splice($_SESSION['cart'],$_GET['idCart'],1);
                        }else{
                            $_SESSION['cart']=[];
                        }
                        header('Location: index.php?act=viewCart');
                        break;
                    }
                    // case 'addToCart' :{
                    //     if(isset($_POST['addCart']) && ($_POST['addCart'] > 0)){
                    //         $id = $_POST['idsp'];
                    //         $name = $_POST['name'];
                    //         $price = $_POST['price'];
                    //         $img = $_POST['img'];
                    //         $soluong = 1;
                    //         $ttien = (int)$price * $soluong;
                    //         $addsp = [$id,$name,$price,$img,$soluong,$ttien];
                    //         array_push($_SESSION['cart'],$addsp);

                    //     }
                    //     include "./view/GioHang/ViewCart.php";
                    //     // include "./view/user/GioHang/Cart.php";
                    //     break;
                    // }
                    case 'order' :{
                        if (isset($_SESSION['cart'])) {
                            $cart = $_SESSION['cart'];
                            // print_r($cart);
                            if (isset($_POST['order_confirm'])) {
                                $txthoten = $_POST['user'];
                                $txttel = $_POST['tel'];
                                $txtemail = $_POST['email'];
                                $txtaddress = $_POST['address'];
                                $pttt = $_POST['pttt'];
                                if (isset($_SESSION['email'])) {
                                    $id_user = $_SESSION['email']['id'];
                                } else {
                                    $id_user = 0;
                                }

                                $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $txtaddress, $_SESSION['resultTotal'], $pttt);
                                foreach ($cart as $item) {
                                    addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                                }
                                unset($_SESSION['cart']);
                                $_SESSION['success'] = $idBill;
                                header("Location: index.php?act=success");
                            }
                            include "./view/GioHang/Order.php";
                        } else {
                            header("Location: index.php?act=viewCart");
                        }
                        break;
                    }
                    case "success":{
                        if (isset($_SESSION['success'])) {
                            include 'success.php';
                        } else {
                            header("Location: index.php");
                        }
                        break;
                    }
                    default: {
                        include "./view/home.php";
                        break;
                    }
                }
            }else{
                include "./view/home.php";
            }
        ?>

        <!-- footer -->
    