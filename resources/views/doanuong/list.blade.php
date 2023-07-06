<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="iddoanuong-col">ID</th>
        <th id="ten-col">Tên</th>
        <th id="phanloai-col">Phân loại</th>
        <th id="gia-col">Giá</th>
        <th id="soluong-col">Số lượng</th>
        <th id="hsd-col">Hạn sử dụng</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Thao tác</th>
    </thead>
    @foreach ($doanuong as $item)
    <tr>
        <td>{{ $item->iddoanuong }}</td>
        <td>{{ $item->ten }}</td>
        <td>{{ $item->phanloai }}</td>
        <td>{{ $item->gia }}</td>
        <td>{{ $item->soluong }}</td>
        <td>{{ $item->hsd }}</td>
        <td></td>
        <td>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('doanuong.show', $item->iddoanuong) }}" id="{{ $item->iddoanuong }}"><i class="fa-regular fa-pen-to-square"></i></button>
            <button class="btn btn-danger btn-delete" data-bs-target="#nv-{{ $item->iddoanuong }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="nv-{{ $item->iddoanuong }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin sản phẩm <span class="h4 fw-bold">{{ $item->iddoanuong }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('doanuong.destroy', $item->iddoanuong) }}">Xóa</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
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
        $.get("{{ route('getList.doanuong') }}", {text: text, filter: filter}, function(data){
                $('#doanuong-table').empty().html(data);
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
        $.get("{{ route('getList.doanuong') }}", {text: 'iddoanuong', filter: 'asc'}, function(data){
            $('#doanuong-table').empty().html(data);
        })
    }

    $('.btn-delete').click(function () {
        $('.modal-title').html('Thông báo');
    })

    $('.btn-edit').click(function() {
        var id = $(this).attr('id');
        var url = $(this).attr('data-url');
        $('.modal-title').html('Sửa thông tin thực phẩm <h4 class="fw-bold" id="iddoanuong_edit">' + id + '</h4>');
        $('#doanuong-btn_text').text('Sửa');
        $('#iddoanuong-input').hide()
        $.get(url, {}, (response) => {
            $("#iddoanuong").val(response.data.iddoanuong)
            $("#ten").val(response.data.ten)
            $("#gia").val(response.data.gia)
            $("#soluong").val(response.data.soluong)
            $("#hsd").val(response.data.hsd)
            $("#phanloai").val(response.data.phanloai)
            $('#doanuong-modal').modal('show');
        })
    })

    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var iddoanuong = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#nv-' + iddoanuong).modal('hide');
                $('#toast-text').text('Xóa thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#doanuong-table').load(location.href + ' #doanuong-table');
            }
        })
    })

</script>
