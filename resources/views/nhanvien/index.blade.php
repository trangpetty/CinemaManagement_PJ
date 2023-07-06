 @extends('layouts.app')
 @section('content')
 <div class="container-fluid py-3 px-4 bg-light">
     <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
        <h2 class="m-0">Nhân viên</h2>
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#nhanvien-modal_add" style="height: 40px">
                <i class="fa-solid fa-circle-plus"></i> Thêm
            </button>
            <button type="button" class="btn btn-danger me-3" data-bs-toggle="modal" data-bs-target="#nhanvien-modal_delete" style="height: 40px">
                <i class="fa-solid fa-circle-minus"></i> Xóa
            </button>
            <form class="d-flex my-2">
                 <input class="form-control me-2" id="nhanvien-input_search" type="search" placeholder="Search" aria-label="Search">
                 <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
     </div>

     <div id="nhanvien-table"></div>
 </div>
 @include('nhanvien.add')
 @include('nhanvien.detail')
 @include('nhanvien.update')
 <script type="text/javascript">
     $(document).ready(function() {
        showData();
        $('#nhanvien').removeClass('d-none');
        $('#sochamcong').removeClass('d-none');
        $('#thongke').removeClass('d-none');
        $('#account-btn').removeClass('d-none');
        function showData() {
            $.get("{{ route('getList') }}", {text: 'idnv', filter: 'asc'}, function(data){
                $('#nhanvien-table').empty().html(data);
            })
        }

        $("#nhanvien-form_add").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    idnv: $('#manv_add').val(),
                    ten: $('#tennv_add').val(),
                    gioitinh: $("#nhanvien-form_add input[type='radio']:checked").val(),
                    cccd: $('#scccdnv_add').val(),
                    ngaybdlam: $('#nbdl_add').val(),
                    luong: $('#luongca_add').val(),
                    thuong: $('#thuong_add').val(),
                    chucvu: $('#chucvu_add').val()
                },
                success: function(response) {
                    if(response.status == "success") {
                    $('#nhanvien-modal_add').modal('hide');
                    $('#nhanvien-form_add')[0].reset();
                    $('#toast-text').text('Thêm thành công');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                    showData();
                }

                if(response.error) {
                    if(response.error['idnv'][0])
                        $('.idnv_error').html(response.error['idnv'][0]);
                    if(response.error['gioitinh'][0])
                        $('.gioitinh_error').html(response.error['gioitinh'][0]);
                    if(response.error['ngaybdlam'][0])
                        $('.nbdl_error').html(response.error['ngaybdlam'][0]);
                    if(response.error['cccd'][0])
                        $('.cccd_error').html(response.error['cccd'][0]);
                    if(response.error['luong'][0])
                        $('.luong_error').html(response.error['luong'][0]);
                    if(response.error['chucvu'][0])
                        $('.chucvu_error').html(response.error['chucvu'][0]);
                }
                }
            })
        })

        $('#nhanvien-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#nhanvien-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('nhanvien.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                    $('#nhanvien-table').empty().html(response);
                    }
                    else
                    showData();
                }
            })
        })
     })
 </script>
 @endsection

