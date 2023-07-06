<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="sothe-col">Số thẻ</th>
        <th id="tenhv-col">Tên</th>
        <th id="diemtl-col">Điểm tích lũy</th>
        <th id="loaihv-col">Loại HV</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Thao tác</th>
    </thead>
    @foreach ($hoivien as $item)
    <tr>
        <td>{{ $item->sothe }}</td>
        <td>{{ $item->tenhv }}</td>
        <td>{{ $item->diemtl }}</td>
        <td>{{ $item->loaihv }}</td>
        <td></td>
        <td>
            <button class="btn btn-info text-white btn-detail" data-url="{{ route('hoivien.show', $item->sothe) }}" data-bs-target="#hoivien-modal_detail" data-bs-toggle="modal"><i class="fa-solid fa-circle-info"></i></button>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('hoivien.show', $item->sothe) }}" data-bs-target="#hoivien-modal_update" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square"></i></button>
            <button class="btn btn-danger btn-delete" data-bs-target="#sc-{{ $item->sothe }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="sc-{{ $item->sothe }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin hội viên <span class="h4 fw-bold">{{ $item->sothe }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('hoivien.destroy', $item->sothe) }}">Xóa</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>
<script>
    var text = 'sothe';
    var arr = [];
    function orderBy (text, filter) {
        $.get("{{ route('getList.hoivien') }}", {text: text, filter: filter}, function(data){
                $('#hoivien-table').empty().html(data);
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
        $.get("{{ route('getList.hoivien') }}", {text: 'sothe', filter: 'asc'}, function(data){
            $('#hoivien-table').empty().html(data);
        })
    }

    $('.btn-detail').click(function() {
        var url = $(this).attr('data-url');
        $.get(url, {}, (response) => {
            $("#sothe_detail").text(response.data.sothe)
            $('#tenhv_detail').text(response.data.tenhv)
            $('#ngaysinh_detail').text(response.data.ngaysinh)
            $('#diachi_detail').text(response.data.diachi)
            $('#dienthoai_detail').text(response.data.dienthoai)
            $('#socccd_detail').text(response.data.socccd)
            $('#diemtl_detail').text(response.data.diemtl)
            $('#loaihv_detail').text(response.data.loaihv)
        })
    })

    $('.btn-edit').click(function() {
        var url = $(this).attr('data-url');
        $.get(url, {}, (response) => {
            $("#sothe_update").text(response.data.sothe)
            $('#tenhv_update').val(response.data.tenhv)
            $('#ngaysinh_update').val(response.data.ngaysinh)
            $('#diachi_update').val(response.data.diachi)
            $('#dienthoai_update').val(response.data.dienthoai)
            $('#socccd_update').val(response.data.socccd)
            $('#diemtl_update').val(response.data.diemtl)
        })
    })

    $("#hoivien-form_update").submit(function(e) {
        e.preventDefault();
        let sothe = $('#sothe_update').text();
        let diemtl = $('#diemtl_update').val();
        let loaihv ='';
        if (diemtl <= 5)
            loaihv = 'VIP1';
        else if (diemtl > 5 && diemtl <= 20)
            loaihv = 'VIP2';
        else if (diemtl > 20)
            loaihv = 'VIP3';
        $.post('{{ route("update.hoivien") }}', {
            sothe: $('#sothe_update').text(),
            tenhv: $('#tenhv_update').val(),
            ngaysinh: $('#ngaysinh_update').val(),
            diachi: $('#diachi_update').val(),
            dienthoai: $('#dienthoai_update').val(),
            socccd: $('#socccd_update').val(),
            diemtl: diemtl,
            loaihv: loaihv
        }, (response) => {
            if(response.status == "success") {
                $('#hoivien-modal_update').modal('hide');
                $('#toast-text').text('Cập nhật thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
            }
        })
    })


    $(document).on('click', '#btn-delete', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        var sothe = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#sc-' + sothe).modal('hide');
                $('#toast-text').text('Delete successfully');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
            }
        })
    })

</script>
