@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Hóa đơn xuất</h2>
       <form class="d-flex my-2">
            <input class="form-control me-2" id="hdxuat-input_search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
       </form>
    </div>

    <div id="hdxuat-table"></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#suatchieu').removeClass('d-none');
        $('#vattu').removeClass('d-none');
        $('#hoadon').removeClass('d-none');
        $('#ve').removeClass('d-none');
        $('#hoivien').removeClass('d-none');
        $('#phim').removeClass('d-none');
        $('#thucpham').removeClass('d-none');
       showData();
       function showData() {
           $.get("{{ route('getList.hdxuat') }}", {text: 'idhdxuat', filter: 'asc'}, function(data){
               $('#hdxuat-table').empty().html(data);
           })
       }

        $('#hdxuat-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#hdxuat-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('hdxuat.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                       $('#hdxuat-table').empty().html(response);
                    }
                    else
                       showData();
                }
            })
        })
    })
</script>
@endsection

