@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Sổ chấm công</h2>
       <div>
           <label for="scc-month">Chọn tháng</label>
           <select name="scc-month" id="scc-month"></select>
       </div>
    </div>

    <div id="sochamcong-table">

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#nhanvien').removeClass('d-none');
        $('#sochamcong').removeClass('d-none');
        $('#thongke').removeClass('d-none');
        $('#account-btn').removeClass('d-none');
    })
    var html = ``;
    for (let i = 1; i <= 12; i++){
        html += `<option value="${i}">${i}</option>`;
    }
    $('#scc-month').html(html);
    const d = new Date();
    var month = d.getMonth() + 1;
    $('#scc-month').val(month);

    $('#scc-month').on('change', function() {
        month = $('#scc-month').val();
        showData(month);
    })

    showData(month);
    function showData(month) {
        $.get("{{ route('sochamcong.create') }}", {month: month}, function(data){
            $('#sochamcong-table').empty().html(data);
        })
    }
</script>
@endsection
