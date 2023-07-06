$('#nhanvien').hide();
$('#sochamcong').hide();
$('#hoivien').hide();
$('#thongke').hide();
$('#thucpham').hide();
$('#vattu').hide();
$('#hoadon').hide();
$('#suatchieu').hide();
$('#phim').hide();
$('#ve').hide();
$('.nav-item').addClass('d-none');
var role = $('#role').text();
console.log(role)
if (role == 1) {
    $('.nav-item#nhanvien').show();
    $('.nav-item#sochamcong').show();
    $('.nav-item#thongke').show();
}
else if (role == 0){
    $('#vattu').show();
    $('#ve').show();
    $('#hoivien').show();
    $('#thucpham').show();
    $('#hoadon').show();
    $('#suatchieu').show();
    $('#phim').show();
}
