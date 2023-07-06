@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Phim</h2>
       <div class="d-flex align-items-center">
           <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#phim-modal_add" style="height: 40px">
               <i class="fa-solid fa-circle-plus"></i> Thêm
           </button>
           <button type="button" class="btn btn-danger me-3" data-bs-toggle="modal" data-bs-target="#phim-modal_delete" style="height: 40px">
               <i class="fa-solid fa-circle-minus"></i> Xóa
           </button>
           <form class="d-flex my-2">
                <input class="form-control me-2" id="phim-input_search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
           </form>
       </div>
    </div>

    <div id="phim-table"></div>
</div>
@include('phim.add')
@include('phim.detail')
@include('phim.update')
<script type="text/javascript">
    $(document).ready(function() {
        $('#suatchieu').removeClass('d-none');
        $('#vattu').removeClass('d-none');
        $('#hoadon').removeClass('d-none');
        $('#ve').removeClass('d-none');
        $('#hoivien').removeClass('d-none');
        $('#phim').removeClass('d-none');
        $('#thucpham').removeClass('d-none');
       showData();
       function showData() {
           $.get("{{ route('getList.phim') }}", {text: 'idphim', filter: 'asc'}, function(data){
               $('#phim-table').empty().html(data);
           })
       }

        $("#phim-form_add").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    idphim: $('#idphim_add').val(),
                    ten: $('#tenphim_add').val(),
                    theloai: $("#theloai_add").val(),
                    thoiluong: $('#thoiluong_add').val(),
                    daodien: $('#daodien_add').val(),
                    dienvienchinh: $('#dienvien_add').val(),
                    sovekhadung: $('#sove_add').val()
                },
                success: function(response) {
                    if(response.status == "success") {
                        $('#phim-modal_add').modal('hide');
                        $('#phim-form_add')[0].reset();
                        $('#toast-text').text('Thêm thành công');
                        const toastSucc = new bootstrap.Toast($('#toast-success'));
                        toastSucc.show();
                        showData();
                   }

                   if(response.error) {
                    //    if(response.error['idphim'][0])
                    //        $('.idphim_error').html(response.error['idphim'][0]);
                    //    if(response.error['gioitinh'][0])
                    //        $('.gioitinh_error').html(response.error['gioitinh'][0]);
                    //    if(response.error['ngaybdlam'][0])
                    //        $('.nbdl_error').html(response.error['ngaybdlam'][0]);
                    //    if(response.error['cccd'][0])
                    //        $('.cccd_error').html(response.error['cccd'][0]);
                    //    if(response.error['luong'][0])
                    //        $('.luong_error').html(response.error['luong'][0]);
                    //    if(response.error['chucvu'][0])
                    //        $('.chucvu_error').html(response.error['chucvu'][0]);
                   }
                }
            })
        })

        $('#phim-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#phim-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('phim.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                        $('#phim-table').empty().html(response);
                    }
                    else
                        showData();

                }
            })
        })
    })
</script>
@endsection

