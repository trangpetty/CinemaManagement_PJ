<style>
    th {
        cursor: pointer;
    }
</style>
<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="idghe-col">ID</th>
        <th id="idphong-col">ID Phòng</th>
        <th id="vitri-col">Vị trí</th>
        <th id="loaighe-col">Loại ghế</th>
        <th id="loaighe-col">Trạng thái</th>
        <td class="d-flex flex-column"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></td>
        <th>Thao tác</th>
    </thead>
    @foreach ($ghe as $item)
    <tr>
        <td>{{ $item->idghe }}</td>
        <td>{{ $item->idphong }}</td>
        <td>{{ $item->vitri }}</td>
        <td>{{ $item->loaighe }}</td>
        <td>{{ $item->trangthai }}</td>
        <td></td>
        <td>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('ghe.show', $item->idghe) }}" data-bs-target="#ghe-modal" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square"></i></button>
        </td>
    </tr>
    @endforeach
</table>

<script>
    var text;
    function orderBy (text, filter) {
        $.get("{{ route('getList.ghe') }}", {text: text, filter: filter}, function(data){
                $('#ghe-table').empty().html(data);
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
        orderBy('idghe', 'asc');
    }

    $('.btn-edit').click(function() {
        var url = $(this).attr('data-url');
        $.get(url, {}, (response) => {
            $("#idghe").text(response.data.idghe)
            $('#idphong').val(response.data.idphong)
            $('#vitri').val(response.data.vitri)
            $('#loaighe').val(response.data.loaighe)
            $('#trangthai').val(response.data.trangthai)
        })
    })

    $("#ghe-form").submit(function(e) {
        e.preventDefault();
        var idghe = $('#idghe').text();
        $.post('{{ route("update.ghe") }}', {
            idghe: $('#idghe').text(),
            trangthai: $('#trangthai').val(),
            loaighe: $('#loaighe').val()
        }, (response) => {
            if(response.status == "success") {
                $('#ghe-modal').modal('hide');
                $('#toast-text').text('Cập nhật thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
            }
        })
    })

</script>
