<table class="w-100 table-striped table" id="list">
    <thead class="border-bottom bg-light">
        <th id="idnv-col">ID Nhân viên</th>
        <th id="ngaydilam-col">Ngày đi làm</th>
        <th id="calam-col">Ca làm</th>
    </thead>
    @foreach ($sochamcong as $item)
    <tr>
        <td>{{ $item->idnv }}</td>
        <td>{{ $item->ngaydilam }}</td>
        <td>{{ $item->calam }}</td>
    </tr>
    @endforeach
</table>
