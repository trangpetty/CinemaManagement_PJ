@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <a class="text-danger h4" href="{{ route('hdnhap.index') }}"><i class="fa-solid fa-chevron-left"></i>Trở về</a>
    <h2 class="text-center fw-bold">Thêm hóa đơn mới</h2>
    <div class="row">
        <div class="form-group my-2 col">
            <label for="idnv">Nhân viên</label>
            <select name="idnv" id="idnv" class="form-select">
                @foreach ($nhanvien as $item)
                    <option value="{{ $item->idnv }}">{{ $item->idnv }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group my-2 col">
            <label for="chuthich">Chú thích</label>
            <input type="text" name="chuthich" id="chuthich" class="form-control">
        </div>
    </div>
    <nav class="nav mt-3">
        @foreach ($phanloai as $item)
            @if ($item->phanloai == 'doan')
                <a class="nav-link nav-phanloai active border" id="{{ $item->phanloai }}"><span class="h5">Đồ ăn</span></a>
            @else
                <a class="nav-link nav-phanloai border" id="{{ $item->phanloai }}"><span class="h5">Đồ uống</span></a>
            @endif
        @endforeach
    </nav>
    <div class="mb-3" id="doanuong-list_item"></div>
        <h4>Danh sách thực phẩm đã chọn</h4>
        <table class="table">
            <thead class="bg-dark text-white">
                <td>ID</td>
                <td>Tên</td>
                <td>Phân loại</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Đơn giá</td>
                <td></td>
            </thead>
            <tbody id="list-item_select">

            </tbody>
        </table>
        <div class="border-top p-4 row">
            <div class="col">Tổng tiền phải trả</div>
            <div class="col"><p class="bg-light border-0" id="tientra"></p></div>
            <div class="col">VND</div>
        </div>
    </div>
    <div id="order-form-footer" class="my-3 text-center">
        <button class="btn btn-dark w-25 py-3 bg-brown" id="order-btn">Đặt</button>
    </div>
    <div class="toast toast-fade text-bg-success border-0 align-items-center float-end" id="toast-success" role="alert" aria-live="assertive">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-circle-check"></i> <span id="toast-text"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.footer').hide();
        $('.nav-phanloai').click(function() {
            $('.nav-phanloai.active').removeClass('active');
            $(this).addClass('active');
        })
    })
    var list = [];
    var tientra = 0;
    $('#tientra').text(0);

    $('.carousel-item').show()
    $.get('{{ route("getDetail.hdnhap") }}', {phanloai: 'doan'}, (data) => {
        $('#doanuong-list_item').html(data)
        $('#doanuong-list_item').show()
    })
    $('.nav-phanloai').click(function() {
        $('.nav-phanloai.active').removeClass('active');
        $(this).addClass('active')
        let select = $(this).attr('id');
        $.get('{{ route("getDetail.hdnhap") }}', {phanloai: select}, (data) => {
            $('#doanuong-list_item').html(data)
            $('#doanuong-list_item').show()
        })
    })
    var list = [];
    $(document).on('click','.btn-select',function() {
        let sanpham = $(this).attr('id');
        let sanpham_item = sanpham.split('-');
        let iddoanuong = sanpham_item[0];
        let ten = sanpham_item[1];
        let phanloai = sanpham_item[2];
        let gia = sanpham_item[3];
        let soluong = $('#soluong-'+ iddoanuong).val();
        console.log(soluong)
        let dongia = soluong*gia;
        let item = {
            iddoanuong: iddoanuong,
            ten: ten,
            phanloai: phanloai,
            gia: gia,
            soluong: soluong,
            dongia: dongia
        }
        list.push(item);
        let html = ``;
        for(let i =0; i<list.length;i++){
            html += `
                    <tr id="${list[i].iddoanuong}">
                    <td>${list[i].iddoanuong}</td>
                    <td>${list[i].ten}</td>
                    <td>${list[i].phanloai}</td>
                    <td>${list[i].gia}</td>
                    <td>${list[i].soluong}</td>
                    <td>${list[i].dongia}</td>
                    <td><button class="btn btn-danger" onclick="cancel('${list[i].iddoanuong}','${list[i].dongia}')"><i class="fa-solid fa-x"></i></button></td>
                    </tr>
            `;
        }
        $('#list-item_select').html(html);
        tientra += dongia;
        $('#tientra').text(tientra);
    })

    function cancel(iddoanuong, dongia) {
        $('#'+ iddoanuong).hide();
        for(let i = 0; i < list.length; i++){
            if(list[i].iddoanuong == iddoanuong && list[i].dongia == dongia){
                list.splice(i,1);
            }
        }
        tientra -= dongia;
        $('#tientra').text(tientra);
    }

    // Order
    $('#order-btn').on('click', function () {
        let idnv = $('#idnv').val()
        for(i = 0; i < list.length; i++){
            if(list[i].soluong == 0) list.splice(i,1);
        }
        if(idnv != ""){
            $.post('{{ route("hdnhap.store") }}', {
                idnv: idnv,
                chuthich: $('#chuthich').val(),
                cthd: list
            }, (response) => {
                $('#toast-text').text('Thêm thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                setInterval(() => {
                    window.location.reload();
                }, 1500);
            })
        } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Nhập ID nhân viên')
    });
</script>
@endsection
