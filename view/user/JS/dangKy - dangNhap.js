//----------------ĐĂNG KÝ----------------------
//Tạo khách hàng
function taoKhachHang(ho, ten, diaChi, sdt, matKhau) {
    if (kiemTraNoiDungRong(ho) == false && kiemTraNoiDungRong(ten) == false && kiemTraNoiDungRong(diaChi) == false && kiemTraNoiDungRong(matKhau) == false) {
        if (kiemTraSoDienThoai(sdt) == true) {
            var khachHang = new Object();
            khachHang.ho = ho;
            khachHang.ten = ten;
            khachHang.diaChi = diaChi;
            khachHang.sdt = sdt;
            khachHang.matKhau = matKhau;
            khachHang.id = taoIDKhachHang();

            //Lấy danh sách khách hàng từ local storage lên
            var danhSachKhachHang = JSON.parse(localStorage.getItem('danhSachKhachHang'));
            if (danhSachKhachHang == null) {
                danhSachKhachHang = new Array();
            }

            if (kiemTraKhachHangTonTai(danhSachKhachHang, sdt) == false) {

                danhSachKhachHang.push(khachHang);

                //Lưu danh sách khách hàng xuống local storage
                localStorage.setItem('danhSachKhachHang', JSON.stringify(danhSachKhachHang));

                //Thông báo đăng ký thành công
                alert('Đăng ký thành công!');
                return true;
            }
            else {
                alert('Khách hàng đã tồn tại!');
                return false;
            }

        }
        else {
            alert('Số điện thoại không đúng định dạng!');
            return false;
        }
    }
    else {
        alert('Bạn phải nhập đầy đủ nội dung!');
        return false;
    }

}


//Tạo hàm kiểm tra khách hàng có tồn tại trong local storage hay chưa
function kiemTraKhachHangTonTai(danhSachKhachHang, sdt) {
    var traVe = false;
    for (var i = 0; i < danhSachKhachHang.length; i++) {
        if (sdt == danhSachKhachHang[i].sdt) {
            traVe = true;
            break;
        }
    }
    return traVe;
}


//Tạo ID khách hàng
function taoIDKhachHang() {
    var id = new Date();
    id = id.getTime();
    id = Math.random().toString().substring(2, 6) + '_' + id.toString();
    return id;
}


//Kiểm tra nội dung khách hàng nhập có rỗng không
function kiemTraNoiDungRong(chuoi) {
    var traVe = false;
    chuoi = chuoi.replace(/ /gi, '');
    if (chuoi.length == 0) {
        traVe = true;
    }
    return traVe;
}

function kiemTraSoDienThoai(sdt) {
    var traVe = false;
    if (sdt.length == 10) {
        if (isNaN(sdt) == false) {
            traVe = true;
        }
    }
    return traVe;
}




//------------------ĐĂNG NHẬP----------------------
//Hàm đăng nhập
function dangNhap(sdt, matKhau) {
    var danhSachKhachHang = JSON.parse(localStorage.getItem('danhSachKhachHang'));
    var traVe = false;
    if(kiemTraNoiDungRong(sdt) == false && kiemTraNoiDungRong(matKhau) == false){
        if(kiemTraSoDienThoai(sdt) == true){
            for (var i = 0; i < danhSachKhachHang.length; i++) {
                if (sdt == danhSachKhachHang[i].sdt && matKhau == danhSachKhachHang[i].matKhau){
                    taoPhienDangNhap(sdt, matKhau);
                    traVe = true;
                }
            }
            if(traVe == false){
                alert('Thông tin đăng nhập không đúng!');
                return traVe
            }
            else{
                return traVe;
            }
        }
        else{
            alert('Số điện thoại không đúng định dạng!')
            return false;
        }
    }
    else{
        alert('Bạn phải nhập đầy đủ nội dung!');
        return false;
    }
}




/*Cần viết hàm taoPhienDangNhap tại
- Input: sđt và mật khẩu
- Output: 1 object khách hàng được lưu trữ trong phiên đăng nhập */
function taoPhienDangNhap(sdt, matKhau) {
    var khachHang = new Object();
    khachHang.sdt = sdt;
    khachHang.matKhau = matKhau;
    var danhSachKhachHang = JSON.parse(localStorage.getItem('danhSachKhachHang'));
    for (var i = 0; i < danhSachKhachHang.length; i++) {
        if (khachHang.sdt == danhSachKhachHang[i].sdt && khachHang.matKhau == danhSachKhachHang[i].matKhau) {
            khachHang.ho = danhSachKhachHang[i].ho;
            khachHang.ten = danhSachKhachHang[i].ten;
            khachHang.diaChi = danhSachKhachHang[i].diaChi;
            khachHang.sdt = danhSachKhachHang[i].sdt;
            khachHang.id = danhSachKhachHang[i].id;
            break;
        }
    }
    localStorage.setItem('phienDangNhap',JSON.stringify(khachHang));
}