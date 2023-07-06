<table class="w-100 table-striped table">
    <thead class="bg-dark text-white">
        <th>ID TP</th>
        <th>Tên</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Đơn giá</th>
    </thead>
    @foreach ($cthd as $item)
        <tr>
            <td>{{ $item->iddoanuong }}</td>
            <td>{{ $item->ten }}</td>
            <td>{{ $item->soluong }}</td>
            <td>{{ $item->gia * 0.7 }}</td>
            <td>{{ $item->dongia }}</td>

        </tr>
    @endforeach
</table>
