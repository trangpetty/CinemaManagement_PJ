@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <p class="d-none" id="#role">{{ $role }}</p>
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Suất chiếu</h2>
       <div class="d-flex align-items-center">
           <button type="button" class="btn btn-success me-3" id="suatchieu-btn_add" style="height: 40px">
               <i class="fa-solid fa-circle-plus"></i> Thêm
           </button>

           <form class="d-flex my-2">
                <input class="form-control me-2" id="suatchieu-input_search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
           </form>
       </div>
    </div>

    <div id="suatchieu-table"></div>
</div>
@include('suatchieu.modal')
<script type="text/javascript">
    $(document).ready(function() {
        showData();
        $('#suatchieu').removeClass('d-none');
        $('#vattu').removeClass('d-none');
        $('#hoadon').removeClass('d-none');
        $('#ve').removeClass('d-none');
        $('#hoivien').removeClass('d-none');
        $('#phim').removeClass('d-none');
        $('#thucpham').removeClass('d-none');
        function showData() {
            $.get("{{ route('getList.suatchieu') }}", {text: 'idsuatchieu', filter: 'asc'}, function(data){
                $('#suatchieu-table').empty().html(data);
            })
        }

       $('#suatchieu-btn_add').click(function () {
            $('#suatchieu-modal').modal('show');
            $('.modal-title').text('Thêm suất chiếu mới');
            $('#idsuatchieu-input').show();
            $('#suatchieu-form')[0].reset();
            $('#suatchieu-btn_text').text('Thêm');
       })

        $("#suatchieu-form").submit(function(e) {
            e.preventDefault();
            if( $('#suatchieu-btn_text').text() == 'Thêm') {
                $.post('{{ route("suatchieu.store") }}', {
                    idsuatchieu: $('#idsuatchieu').val(),
                    thoigianbd: $('#thoigianbd').val(),
                    idphim: $('#idphim').val(),
                    idphong: $('#idphong').val(),
                    loaichieu: $('#loaichieu').val()
                }, (response) => {
                    $('#suatchieu-modal').modal('hide');
                    $('#suatchieu-form')[0].reset();
                    showData();
                    $('#toast-text').text('Thêm thành công');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                })
            }
            else {
                $.post('{{ route("update.suatchieu") }}', {
                    idsuatchieu: $('#idsuatchieu_edit').text(),
                    thoigianbd: $('#thoigianbd').val(),
                    idphim: $('#idphim').val(),
                    idphong: $('#idphong').val(),
                    loaichieu: $('#loaichieu').val()
                }, (response) => {
                    $('#suatchieu-modal').modal('hide');
                    $('#suatchieu-form')[0].reset();
                    showData();
                    $('#toast-text').text('Cập nhật thành công');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                })
            }
        })

        $('#suatchieu-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#suatchieu-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('suatchieu.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                       $('#suatchieu-table').empty().html(response);
                    }
                    else
                       showData();
                }
            })
        })
    })
</script>
@endsection

