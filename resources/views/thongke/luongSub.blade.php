@foreach ($luong as $item)
    <tr>
        <td>{{ $item->idnv }}</td>
        <td>{{ $item->ten }}</td>
        <td>{{ $item->luong }}</td>
        <td>{{ $item->socong }}</td>
        <td>{{ $item->luongket }}</td>

    </tr>
@endforeach
