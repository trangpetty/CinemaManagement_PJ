@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center text-brown">THỐNG KÊ</h1>
    <div class="d-flex">
        <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>
        <div class="w-50">
            <div class="d-flex justify-content-between mb-2 w-100">
                <h3>Top 3 Thực phẩm</h3>
                <select name="select_top_product" id="select_top_product" class="form-select" style="width: 8rem;height: 2.5rem;">
                    <option value="day">Ngày</option>
                    <option value="month">Tháng</option>
                </select>
            </div>
            <div id="top_products"></div>
        </div>
    </div>

    <hr>
    <div class="d-flex justify-content-between mb-2">
        <h3>Doanh thu</h3>
        <select name="select_time" id="select_time" class="form-select" style="width: 8rem;height: 2.5rem;">
            <option value="day">Ngày</option>
            <option value="month">Tháng</option>
        </select>
    </div>
    <div id="doanhthu"></div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#nhanvien').removeClass('d-none');
        $('#sochamcong').removeClass('d-none');
        $('#thongke').removeClass('d-none');
        $('#account-btn').removeClass('d-none');
        showChart();
        showDoanhthu('day');
        showTopTP('day');

        function showTopTP (filter) {
            $.get('{{ route("topTP") }}', {filter: filter}, (data)=> {
                $('#top_products').html(data)
            })
        }

        function showDoanhthu (filter) {
            $.get('{{ route("doanhthu") }}', {filter: filter}, (data)=> {
                $('#doanhthu').html(data)
            })
        }

        $('#select_top_product').on('change', function () {
            filter = $('#select_top_product').val();
            showTopTP(filter);
        })

        $('#select_time').on('change', function () {
            filter = $('#select_time').val();
            showDoanhthu(filter);
        })
    })

    var yValues = [0,0,0,0,0,0,0,0,0,0,0,0];
    const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    function showChart(){
        $.get("{{ route('doanhso') }}", {}, (data) => {
            const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            var yValues = [];
            for(let i = 1; i <= 12; i++) {
                yValues[i-1] = data.data[i];
            }
            console.log(data)
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#333",
                        borderColor: "#ccc",
                        data: yValues
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                        yAxes: [{ticks: {min: 0, max:1000000}}],
                    }
                }
            });
        })
    }

</script>
@endsection
