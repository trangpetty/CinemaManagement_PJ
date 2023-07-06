@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">LƯƠNG NHÂN VIÊN THÁNG <span id="month"></span></h2>
    <div class="d-flex float-end mb-3 align-items-center" style="width:150px;">
        <p class="mx-2 my-0">Chọn tháng</p>
        <select id="select-month"></select>
    </div>
    <table class="table mx-auto">
        <thead class="bg-dark text-white">
            <tr>
                <td>Mã NV</td>
                <td>Họ tên NV</td>
                <td>Số công</td>
                <td>Lương ca</td>
                <td>Lương</td>
            </tr>
        </thead>
        <tbody id="luong-table">

        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#nhanvien').removeClass('d-none');
        $('#sochamcong').removeClass('d-none');
        $('#thongke').removeClass('d-none');
        let html = ``;
        for(let i = 1; i <= 12; i++) {
            html += `<option value="${i}">${i}</option>`;
        }
        $('#select-month').html(html);
        const d = new Date();
        let month = d.getMonth() + 1;
        $('#select-month').val(month);
        $("#month").text($('#select-month').val())
        showData(month);
        function showData (month) {
            $.get('{{ route("luongSub") }}', {month: month}, (data) => {
                $("#luong-table").html(data);
            })
        }

        $('#select-month').on('change', function () {
            month = $('#select-month').val();
            $("#month").text($('#select-month').val())
            showData(month);
        })
    })
</script>
@endsection
