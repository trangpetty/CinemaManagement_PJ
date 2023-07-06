<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="idve-col">ID</th>
        <th id="sothe-col">Số thẻ</th>
        <th id="idghe-col">Ghế</th>
        <th id="idve-col">Suất chiếu</th>
        <th></th>
    </thead>
    @foreach ($ve as $item)
    <tr>
        <td>{{ $item->idve }}</td>
        <td>{{ $item->sothe }}</td>
        <td>{{ $item->idghe }}</td>
        <td>{{ $item->idve }}</td>
        <td></td>
        <td>
            <button class="btn btn-danger btn-delete" data-bs-target="#sc-{{ $item->idve }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="sc-{{ $item->idve }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin vé <span class="h4 fw-bold">{{ $item->idve }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('ve.destroy', $item->idve) }}">Xóa</button>
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
        $.get("{{ route('getList.ve') }}", {text: text, filter: filter}, function(data){
                $('#ve-table').empty().html(data);
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
        $.get("{{ route('getList.ve') }}", {text: 'idve', filter: 'asc'}, function(data){
            $('#ve-table').empty().html(data);
        })
    }


    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idve = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#sc-' + idve).modal('hide');
                $('#toast-text').text('Xóa thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#ve-table').load(location.href + ' #ve-table');
            }
        })
    })

</script>

