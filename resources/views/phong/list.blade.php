<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th>ID</th>
        <th>Số lượng ghế</th>
        <th>Âm thanh</th>
        <th>Máy chiếu</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
    </thead>
    @foreach ($phong as $item)
    <tr>
        <td>{{ $item->idphong }}</td>
        <td>{{ $item->soluongghe }}</td>
        <td>{{ $item->amthanh }}</td>
        <td>{{ $item->maychieu }}</td>
        <td>{{ $item->tinhtrang }}</td>
        <td>
            <button class="btn btn-dark text-white btn-edit" data-url="{{ route('phong.show', $item->idphong) }}" data-bs-target="#phong-modal" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square"></i></button>
        </td>
    </tr>
    @endforeach
</table>

<script>
    var text;
    var arr = [];

    function showData() {
        $.get("{{ route('phong.create') }}", {}, function(data){
            $('#phong-table').empty().html(data);
        })
    }

    $('.btn-edit').click(function() {
        var url = $(this).attr('data-url');
        $.get(url, {}, (response) => {
            $("#idphong").text(response.data.idphong)
            $('#soluongghe').val(response.data.soluongghe)
            $('#amthanh').val(response.data.amthanh)
            $('#maychieu').val(response.data.maychieu)
            $('#tinhtrang').val(response.data.tinhtrang)
        })
    })

    $("#phong-form").submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var idphong = $('#idphong').text();
        $.post("{{ route('update.phong') }}", {
            idphong: $('#idphong').text(),
            soluongghe: $('#soluongghe').val(),
            amthanh: $('#amthanh').val(),
            maychieu: $('#maychieu').val(),
            tinhtrang: $('#tinhtrang').val()
        }, (response) => {
            if(response.status == "success") {
                $('#phong-modal').modal('hide');
                $('#toast-text').text('Cập nhật thành công');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                showData();
            }
        })
    })

</script>
