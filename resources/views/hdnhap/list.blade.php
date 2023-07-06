<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="idhdnhap-col">ID</th>
        <th id="idnv-col">ID Nhân viên</th>
        <th id="ngaylaphd-col">Ngày lập</th>
        <th id="giolaphd-col">Giờ lập</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Actions</th>
    </thead>
    @foreach ($hdnhap as $item)
    <tr>
        <td>{{ $item->idhdnhap }}</td>
        <td>{{ $item->idnv }}</td>
        <td>{{ $item->ngaylaphd }}</td>
        <td>{{ $item->giolaphd }}</td>
        <td></td>
        <td>
            <button class="btn btn-danger btn-delete" data-bs-target="#sc-{{ $item->idhdnhap }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
            <a class="btn btn-info" href="{{ route('hdnhap.show', $item->idhdnhap) }}"><i class="fa-solid fa-circle-info text-white"></i></a>
        </td>
    </tr>
    <div class="modal fade" id="sc-{{ $item->idhdnhap }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin hóa đơn <span class="h4 fw-bold">{{ $item->idhdnhap }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('hdnhap.destroy', $item->idhdnhap) }}">Xóa</button>
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
        $.get("{{ route('getList.hdnhap') }}", {text: text, filter: filter}, function(data){
                $('#hdnhap-table').empty().html(data);
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
        $.get("{{ route('getList.hdnhap') }}", {text: 'idhdnhap', filter: 'asc'}, function(data){
            $('#hdnhap-table').empty().html(data);
        })
    }

    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idhdnhap = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#sc-' + idhdnhap).modal('hide');
                $('#toast-text').text('Xóa thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#hdnhap-table').load(location.href + ' #hdnhap-table');
            }
        })
    })

</script>
