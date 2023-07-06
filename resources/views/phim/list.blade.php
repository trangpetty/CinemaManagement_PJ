<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th></th>
        <th id="idphim-col">ID</th>
        <th id="ten-col">Tên</th>
        <th id="chucvu-col">Thể loại</th>
        <th id="luong-col">Đạo diễn</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Thao tác</th>
    </thead>
    @foreach ($phim as $item)
    <tr>
        <td><input type="checkbox" name="phim-{{ $item->idphim }}"></td>
        <td>{{ $item->idphim }}</td>
        <td>{{ $item->ten }}</td>
        <td>{{ $item->theloai }}</td>
        <td>{{ $item->daodien }}</td>
        <td></td>
        <td>
            <button class="btn btn-info text-white btn-detail" data-url="{{ route('phim.show', $item->idphim) }}" data-bs-target="#phim-modal_detail" data-bs-toggle="modal"><i class="fa-solid fa-circle-info"></i></button>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('phim.show', $item->idphim) }}" data-bs-target="#phim-modal_update" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square"></i></button>
            <button class="btn btn-danger btn-delete" data-bs-target="#phim-{{ $item->idphim }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="phim-{{ $item->idphim }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin phim <span class="h4 fw-bold">{{ $item->idphim }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('phim.destroy', $item->idphim) }}">Xóa</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>

<div class="modal fade" id="phim-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa thông tin các phim này?</p>
            </div>
            <div class="modal-footer">
                <button id="btn-deleteArr_phim" class="btn btn-danger">Xóa</button>
                <button class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    var text;
    var arr = [];
    function orderBy (text, filter) {
        $.get("{{ route('getList') }}", {text: text, filter: filter}, function(data){
                $('#phim-table').empty().html(data);
        })
    }

    $('th').click(function() {
        text = $(this).attr('id').split('-')[0];
        orderBy(text, 'desc');
    })

    $('.desc').click(function() {
        orderBy(text, 'desc');
    })

    $('.asc').click(function() {
        orderBy(text, 'asc');
    })

    $('input[type="checkbox"]').click(function() {
        let id = $(this).attr('name').split('-')[1];
        arr.push(id);
    })

    $('#btn-deleteArr_phim').click(function() {
        $.get("{{ route('deleteArr.phim') }}", {arr: arr}, function(data) {
            $('#phim-modal_delete').modal('hide');
            showData();
        })
    })

    function showData() {
        $.get("{{ route('getList.phim') }}", {text: 'idphim', filter: 'asc'}, function(data){
            $('#phim-table').empty().html(data);
        })
    }

     $('.btn-detail').click(function() {
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url: url,
            success: function(response) {
                let gio = response.data.thoiluong / 60 + " tieng ";
                let phut = response.data.thoiluong % 60;
                if (gio == 0)  gio = "";
                else gio += " tieng";
                if (phut == 0)  phut = "";
                else phut += " phut";
                $('#idphim_detail').text(response.data.idphim)
                $('#tenphim_detail').text(response.data.ten)
                $('#thoiluong_detail').text(gio + phut)
                $('#theloai_detail').text(response.data.theloai)
                $('#daodien_detail').text(response.data.daodien)
                $('#dienvien_detail').text(response.data.dienvienchinh)
                $('#sove_detail').text(response.data.sovekhadung)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //xử lý lỗi tại đây
            }
        })
    })

    $('.btn-edit').click(function() {
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url: url,
            success: function(response) {
                $("#idphim_update").text(response.data.idphim)
                $('#tenphim_update').val(response.data.ten)
                $('#thoiluong_update').val(response.data.thoiluong)
                $('#theloai_update').val(response.data.theloai)
                $('#daodien_update').val(response.data.daodien)
                $('#dienvien_update').val(response.data.dienvienchinh)
                $('#sove_update').val(response.data.sovekhadung)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //xử lý lỗi tại đây
            }
        })
    })

    $("#phim-form_update").submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idphim = $('#idphim_update').text();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '{{ route("update.phim") }}',
            data: {
                idphim: $('#idphim_update').text(),
                ten: $('#tenphim_update').val(),
                thoiluong: $('#thoiluong_update').val(),
                theloai: $('#theloai_update').val(),
                daodien: $('#daodien_update').val(),
                dienvien: $('#dienvien_update').val(),
                sove: $('#sove_update').val()
            },
            success: function(response) {
                if(response.status == "success") {
                    $('#phim-modal_update').modal('hide');
                    $('#toast-text').text('Cập nhật thành công');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                    showData();
                }
            }
        })
    })

    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();

        var url = $(this).attr('data-url');
        var idphim = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#phim-' + idphim).modal('hide');
                $('#toast-text').text('Xóa thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#phim-table').load(location.href + ' #phim-table');
            }
        })
    })

</script>
{{-- <div class="d-flex justify-content-center mt-2">
    {!! $phim->links() !!}
</div> --}}
