//-----------HIỂN THỊ THÔNG TIN KHÁCH HÀNG--------------
//Bước 1: Lấy thông tin khách hàng




//Còn thiếu: form và js thay đổi thông tin đặt hàng. Lưu dữ liệu khi tiến hành đặt hàng.
//Hàm hiển thị form thay đổi thông tin đặt hàng
function hienThiFormThayDoi() {
    document.getElementById('pop-up').style.display = "block";
    var khachHang = layThongTinKhachHang();
    document.getElementById('change-hoten').value = khachHang.ho.trim() + ' ' + khachHang.ten.trim();
    document.getElementById('change-sdt').value = khachHang.sdt;
    document.getElementById('change-diachi').value = khachHang.diaChi;
}

//Hàm ẩn form thay đổi thông tin đặt hàng
function anFormThayDoi() {
    document.getElementById('pop-up').style.display = "none";
}

