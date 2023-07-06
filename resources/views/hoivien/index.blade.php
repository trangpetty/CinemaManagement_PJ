@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Hội viên</h2>
       <div class="d-flex align-items-center">
           <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#hoivien-modal_add" style="height: 40px">
               <i class="fa-solid fa-circle-plus"></i> Thêm
           </button>

           <form class="d-flex my-2">
                <input class="form-control me-2" id="hoivien-input_search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
           </form>
       </div>
    </div>

    <div id="hoivien-table"></div>
</div>
@include('hoivien.add')
@include('hoivien.detail')
@include('hoivien.update')
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
           $.get("{{ route('getList.hoivien') }}", {text: 'sothe', filter: 'asc'}, function(data){
               $('#hoivien-table').empty().html(data);
           })
       }

        $("#hoivien-form_add").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    sothe: $('#sothe_add').val(),
                    tenhv: $('#tenhv_add').val(),
                    ngaysinh: $('#ngaysinh_add').val(),
                    diachi: $('#diachi_add').val(),
                    dienthoai: $('#dienthoai_add').val(),
                    socccd: $('#socccd_add').val()
                },
                success: function(response) {
                    if(response.status == "success") {
                       $('#hoivien-modal_add').modal('hide');
                       $('#hoivien-form_add')[0].reset();
                       $('#toast-text').text('Thêm thành công');
                       const toastSucc = new bootstrap.Toast($('#toast-success'));
                       toastSucc.show();
                       showData();
                   }
                }
            })
        })

        $('#hoivien-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#hoivien-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('hoivien.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                       $('#hoivien-table').empty().html(response);
                    }
                    else
                       showData();
                }
            })
        })
    })
</script>
@endsection

