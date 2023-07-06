@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <a href="{{ route('hdnhap.index') }}" class="text-danger h3">Back</a>
    <h2 class="text-center">CHI TIẾT HÓA ĐƠN NHẬP {{ $idhdnhap }}</h2>
    <table class="w-100 table-striped table text-center">
        <thead class="border-bottom bg-dark text-white">
            <th>ID TP</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
        </thead>
        <tbody>
            @foreach ($cthdnhap as $item)
                <tr>
                    <td>{{ $item->iddoanuong }}</td>
                    <td>{{ $item->soluong }}</td>
                    <td>{{ $item->dongia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
