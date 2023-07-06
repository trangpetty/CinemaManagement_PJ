@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Thực phẩm</h2>
       <div class="d-flex align-items-center">
           <button type="button" class="btn btn-success me-3" id="doanuong-btn_add" style="height: 40px">
               <i class="fa-solid fa-circle-plus"></i> Thêm
           </button>
           <form class="d-flex my-2">
                <input class="form-control me-2" id="doanuong-input_search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
           </form>
       </div>
    </div>

    <div id="doanuong-table"></div>
</div>
@include('doanuong.modal')
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
           $.get("{{ route('getList.doanuong') }}", {text: 'iddoanuong', filter: 'asc'}, function(data){
               $('#doanuong-table').empty().html(data);
           })
       }

       $('#doanuong-btn_add').click(function () {
            $('#doanuong-modal').modal('show');
            $('.modal-title').text('Thêm thực phẩm mới');
            $('#iddoanuong-input').show();
            $('#doanuong-form')[0].reset();
            $('#doanuong-btn_text').text('Thêm');
       })

        $("#doanuong-form").submit(function(e) {
            e.preventDefault();
            if( $('#doanuong-btn_text').text() == 'Thêm') {
                $.post('{{ route("doanuong.store") }}', {
                    iddoanuong: $('#iddoanuong').val(),
                    ten: $('#ten').val(),
                    gia: $('#gia').val(),
                    soluong: $('#soluong').val(),
                    hsd: $('#hsd').val(),
                    phanloai: $('#phanloai').val()
                }, (response) => {
                    $('#doanuong-modal').modal('hide');
                    $('#doanuong-form')[0].reset();
                    showData();
                    $('#toast-text').text('Thêm thành công');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                })
            }
            else {
                $.post('{{ route("update.doanuong") }}', {
                    iddoanuong: $('#iddoanuong_edit').text(),
                    ten: $('#ten').val(),
                    gia: $('#gia').val(),
                    soluong: $('#soluong').val(),
                    hsd: $('#hsd').val(),
                    phanloai: $('#phanloai').val()
                }, (response) => {
                    $('#doanuong-modal').modal('hide');
                    $('#doanuong-form')[0].reset();
                    showData();
                    $('#toast-text').text('Cập nhật thành công');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                })
            }
        })

        $('#doanuong-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#doanuong-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('doanuong.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                       $('#doanuong-table').empty().html(response);
                    }
                    else
                       showData();
                }
            })
        })
    })
</script>
@endsection

