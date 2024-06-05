//khai báo key
var nhanThongTinQuaEmail = localStorage.getItem('nhanThongTinQuaEmail');
if (nhanThongTinQuaEmail == null) {
	jsonNhanThongTin = new Array();
}
else {
	var jsonNhanThongTin = JSON.parse(nhanThongTinQuaEmail);
}
//khai báo hàm lưu email xuống local storage
function getEmail() {
    if (kiemTraEmail(email) == true){
	//get value
	var input = document.getElementById('email');
	var newInput = input.value;
	jsonNhanThongTin.push(newInput);
	input.value = '';
	//lấy thông tin lưu xuống localstorage
	localStorage.setItem('nhanThongTinQuaEmail',JSON.stringify(jsonNhanThongTin));
	alert('Đăng ký nhận thông tin thành công!');
    }
    else{
        alert('Email không đúng định dạng!');
        return false;
    }
};
//kiểm tra email
function kiemTraEmail(email) {
    var email = document.getElementById('email').value;
    var dinhdang = false;
    if (email.includes(".")){
        dinhdang = true;
    }
    return dinhdang;
}


//--------------TÌM KIẾM TRÊN THANH NAVBAR---------------
function timKiemSanPham(){
    var noiDungTimKiem = document.getElementById('search').value;
    noiDungTimKiem = noiDungTimKiem.trim();
    var danhSachTrungKhop = new Array();
    var danhSachSanPham = JSON.parse(localStorage.getItem('danhSachSanPhamTam'));
    if(kiemTraNoiDungRong(noiDungTimKiem) ==  false){
        for(var i=0; i<danhSachSanPham.length; i++){
            if(danhSachSanPham[i].ten.toLowerCase().includes(noiDungTimKiem.toLowerCase())==true){
                danhSachTrungKhop.push(danhSachSanPham[i]);
            }
        }
        localStorage.setItem('danhSachSanPhamTam',JSON.stringify(danhSachTrungKhop));
        window.open('Product.html','_self');
    }
    else{
        alert('Bạn chưa nhập thông tin tìm kiếm!');
    }
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




//Hàm hiển thị user đăng nhập, đăng ký
function hienThiMenuUser(){
    var phienDangNhap = localStorage.getItem('phienDangNhap');
    var dangNhap = document.getElementById('dangnhap');
    var dangKy = document.getElementById('dangky');
    var xemThongTin = document.getElementById('xemthongtin');
    var dangXuat = document.getElementById('dangxuat');
    if(phienDangNhap == null){
        dangNhap.style.display = 'block';
        dangKy.style.display = 'block';
        xemThongTin.style.display = 'none';
        dangXuat.style.display = 'none';
    }
    else{
        dangNhap.style.display = 'none';
        dangKy.style.display = 'none';
        xemThongTin.style.display = 'block';
        dangXuat.style.display = 'block';
    }
}

function dangXuat(){
    localStorage.removeItem('phienDangNhap');
    window.location.reload();
}



