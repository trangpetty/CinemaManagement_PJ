<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="idsuatchieu-col">ID</th>
        <th>Thời gian bắt đầu</th>
        <th id="idphim-col">Phim</th>
        <th id="idphong-col">Phòng</th>
        <th id="loaichieu-col">Loại chiếu</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Thao tác</th>
    </thead>
    @foreach ($suatchieu as $item)
    <tr>
        <td>{{ $item->idsuatchieu }}</td>
        <td>{{ $item->thoigianbd }}</td>
        <td>{{ $item->idphim }}</td>
        <td>{{ $item->idphong }}</td>
        <td>{{ $item->loaichieu }}</td>
        <td></td>
        <td>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('suatchieu.show', $item->idsuatchieu) }}" id="{{ $item->idsuatchieu }}"><i class="fa-regular fa-pen-to-square"></i></button>
            <button class="btn btn-danger btn-delete" data-bs-target="#sc-{{ $item->idsuatchieu }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="sc-{{ $item->idsuatchieu }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin suất chiếu <span class="h4 fw-bold">{{ $item->idsuatchieu }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('suatchieu.destroy', $item->idsuatchieu) }}">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>
<script>
    var text;
    var arr = [];
    function orderBy (text, filter) {
        $.get("{{ route('getList.suatchieu') }}", {text: text, filter: filter}, function(data){
                $('#suatchieu-table').empty().html(data);
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

    function showData() {
        $.get("{{ route('getList.suatchieu') }}", {text: 'idsuatchieu', filter: 'asc'}, function(data){
            $('#suatchieu-table').empty().html(data);
        })
    }

    $('.btn-edit').click(function() {
        var id = $(this).attr('id');
        var url = $(this).attr('data-url');
        $('.modal-title').html('Sửa thông tin suất chiếu <h4 class="fw-bold" id="idsuatchieu_edit">' + id + '</h4>');
        $('#suatchieu-btn_text').text('Update');
        $('#idsuatchieu-input').hide()
        $.get(url, {}, (response) => {
            $("#idsuatchieu").text(response.data.idsuatchieu)
            $('#thoigianbd').val(response.data.thoigianbd)
            $('#idphim').val(response.data.idphim)
            $('#idphong').val(response.data.idphong)
            $('#loaichieu').val(response.data.loaichieu)
            $('#suatchieu-modal').modal('show');
        })
    })

    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idsuatchieu = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#sc-' + idsuatchieu).modal('hide');
                $('#toast-text').text('Xóa thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#suatchieu-table').load(location.href + ' #suatchieu-table');
            }
        })
    })

</script>
