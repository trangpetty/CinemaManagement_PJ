<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th></th>
        <th id="idnv-col">ID</th>
        <th id="ten-col">Tên</th>
        <th id="chucvu-col">Chức vụ</th>
        <th id="luong-col">Lương</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Actions</th>
    </thead>
    @foreach ($nhanvien as $item)
    <tr>
        <td><input type="checkbox" name="nv-{{ $item->idnv }}"></td>
        <td>{{ $item->idnv }}</td>
        <td>{{ $item->ten }}</td>
        <td>{{ $item->chucvu }}</td>
        <td>{{ $item->luong }}</td>
        <td></td>
        <td>
            <button class="btn btn-info text-white btn-detail" data-url="{{ route('nhanvien.show', $item->idnv) }}" data-bs-target="#nhanvien-modal_detail" data-bs-toggle="modal"><i class="fa-solid fa-circle-info"></i></button>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('nhanvien.show', $item->idnv) }}" data-bs-target="#nhanvien-modal_update" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square"></i></button>
            <button class="btn btn-danger btn-delete" data-bs-target="#nv-{{ $item->idnv }}" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
    <div class="modal fade" id="nv-{{ $item->idnv }}" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin nhân viên <span class="h4 fw-bold">{{ $item->idnv }}</span></p>
                </div>
                <div class="modal-footer">
                    <button id ="btn-delete" class="btn btn-danger" data-url="{{ route('nhanvien.destroy', $item->idnv) }}">Xóa</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>

<div class="modal fade" id="nhanvien-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa thông tin các nhân viên này?</p>
            </div>
            <div class="modal-footer">
                <button id="btn-delete_arr" class="btn btn-danger">Xóa</button>
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
                $('#nhanvien-table').empty().html(data);
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

    $('#btn-delete_arr').click(function() {
        $.get("{{ route('deleteArr') }}", {arr: arr}, function(data) {
            $('#nhanvien-modal_delete').modal('hide');
            showData();
        })
    })

    function showData() {
        $.get("{{ route('getList') }}", {text: 'idnv', filter: 'asc'}, function(data){
            $('#nhanvien-table').empty().html(data);
        })
    }

     $('.btn-detail').click(function() {
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url: url,
            success: function(response) {
                console.log(response.data.idnv)
                $('#id_detail').text(response.data.idnv)
                $('#ten_detail').text(response.data.ten)
                if(response.data.gioitinh)
                    $('#gioitinh_detail').text('Nam')
                else $('#gioitinh_detail').text('Nữ')
                $('#scccdnv_detail').text(response.data.cccd)
                $('#nbdl_detail').text(response.data.ngaybdlam)
                $('#luongca_detail').text(response.data.luong)
                $('#thuong_detail').text(response.data.thuong)
                $('#chucvu_detail').text(response.data.chucvu)
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
                $("#idnv_update").text(response.data.idnv)
                $('#tennv_update').val(response.data.ten)
                if(response.data.gioitinh)
                    $("input:radio[name=gioitinh_update][value=1]").click()
                else $("input:radio[name=gioitinh_update][value=0]").click()
                $('#scccdnv_update').val(response.data.cccd)
                $('#nbdl_update').val(response.data.ngaybdlam)
                $('#luongca_update').val(response.data.luong)
                $('#thuong_update').val(response.data.thuong)
                $('#chucvu_update').val(response.data.chucvu)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //xử lý lỗi tại đây
            }
        })
    })

    $("#nhanvien-form_update").submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idnv = $('#idnv_update').text();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '{{ route("update.nhanvien") }}',
            data: {
                idnv: $('#idnv_update').text(),
                ten_update: $('#tennv_update').val(),
                gioitinh_update: $("#nhanvien-form_update input[type='radio']:checked").val(),
                cccd_update: $('#scccdnv_update').val(),
                ngaybdlam_update: $('#nbdl_update').val(),
                luong_update: $('#luongca_update').val(),
                thuong_update: $('#thuong_update').val(),
                chucvu_update: $('#chucvu_update').val()
            },
            success: function(response) {
                if(response.status == "success") {
                    $('#nhanvien-modal_update').modal('hide');
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
        var idnv = url.split('/')[4];
        $.ajax({
            type: 'delete',
            dataType: 'json',
            url: url,
            data: {},
            success: function(response) {
                $('#nv-' + idnv).modal('hide');
                $('#toast-text').text('Xóa thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
                //$('#nhanvien-table').load(location.href + ' #nhanvien-table');
            }
        })
    })

</script>
