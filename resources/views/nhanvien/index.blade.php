 @extends('layouts.app')
 @section('content')
 <div class="container-fluid py-3 px-4 bg-light">
     <div class="d-flex flex-wrap w-100 justify-content-between">
         <h1 class="float-start">Nhan vien</h1>
         <form class="d-flex float-end my-2">
             <input class="form-control me-2" id="nhanvien-input_search" type="search" placeholder="Search" aria-label="Search">
             <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
         </form>
     </div>

     <div class="d-flex flex-wrap w-100 justify-content-between mb-3">
         <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#nhanvien-modal_add">
           Add <i class="fa-solid fa-circle-plus"></i>
         </button>
         {{-- <select class="form-select" style="width: 150px">
            <option value="idnv">Idnv</option>
            <option value="ten">Ten</option>
            <option value="luong">Luong</option>
            <option value="thuong">Thuong</option>
         </select> --}}
     </div>

     <div id="nhanvien-table"></div>
 </div>
 @include('nhanvien.add')
 @include('nhanvien.detail')
 @include('nhanvien.update')
 <script type="text/javascript">
     $(document).ready(function() {
        showData();
        function showData() {
            $.get("{{ route('getList') }}", function(data){
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
                         showData();
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
                         if(response.status == 'Nothing found'){
                             $('#nhanvien-table').html('<span class="h2 text-danger">Nothing found</span>')
                         }
                         else {
                             var html = '<table class="w-100"><tr class="bg-dark text-white"><th>ID</th><th>Ten</th><th>Gioi tinh</th><th>Chuc vu</th><th></th></tr>';
                             $.each(response.data.data, function(index, value) {
                                 html += '<tr><td>'+ value.idnv+'</td><td>'+value.ten+'</td><td>'+value.gioitinh+'</td><td>'+value.chucvu+'</td><td>'+
                                         '<button class="btn btn-info text-white btn-detail" data-url="{{ route("nhanvien.show",' + value.idnv +') }}" data-bs-target="#nhanvien-modal_detail" data-bs-toggle="modal"><i class="fa-solid fa-circle-info"></i></button>'+
                                         '<button class="btn btn-dark text-white btn-edit" data-url="{{ route("nhanvien.show",' + value.idnv +') }}" data-bs-target="#nhanvien-modal_update" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square"></i></button>'+
                                         '<button class="btn btn-danger btn-delete" data-url="{{ route("nhanvien.destroy",' + value.idnv +') }}"><i class="fa-solid fa-trash"></i></button>'+
                                     '</td></tr>'
                             });
                             html += '</table>';
                             $('#nhanvien-table').html(html);
                         }
                     }else
                     showData();
                     //$('#nhanvien-table').load(location.href + ' #nhanvien-table');
                 }
             })
         })
     })
 </script>
 @endsection

