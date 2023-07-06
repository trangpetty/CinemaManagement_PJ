<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="idhdxuat-col">ID</th>
        <th id="idnv-col">ID Nhân viên</th>
        <th id="ngaylaphd-col">Ngày lập</th>
        <th id="giolaphd-col">Giờ lập</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Thao tác</th>
    </thead>
    @foreach ($hdxuat as $item)
    <tr>
        <td>{{ $item->idhdxuat }}</td>
        <td>{{ $item->idnv }}</td>
        <td>{{ $item->ngaylaphd }}</td>
        <td>{{ $item->giolaphd }}</td>
        <td></td>
        <td>
            <a class="btn btn-info" href="{{ route('hdxuat.show', $item->idhdxuat) }}"><i class="fa-solid fa-circle-info text-white"></i></a>
            <button class="btn btn-danger btn-delete" data-bs-target="#sc-{{ $item->idhdxuat }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="sc-{{ $item->idhdxuat }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin hóa đơn <span class="h4 fw-bold">{{ $item->idhdxuat }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('hdxuat.destroy', $item->idhdxuat) }}">Delete</button>
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
        $.get("{{ route('getList.hdxuat') }}", {text: text, filter: filter}, function(data){
                $('#hdxuat-table').empty().html(data);
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
        $.get("{{ route('getList.hdxuat') }}", {text: 'idhdxuat', filter: 'asc'}, function(data){
            $('#hdxuat-table').empty().html(data);
        })
    }

    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idhdxuat = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#sc-' + idhdxuat).modal('hide');
                $('#toast-text').text('Xoá thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#hdxuat-table').load(location.href + ' #hdxuat-table');
            }
        })
    })

</script>
