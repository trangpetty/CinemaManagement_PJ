@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Vé</h2>
       <form class="d-flex my-2">
            <input class="form-control me-2" id="ve-input_search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
       </form>
    </div>
    <div id="ve-table"></div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        showData();
        $('#ve').removeClass('d-none');
        $('#vattu').removeClass('d-none');
        $('#hoadon').removeClass('d-none');
        $('#ve').removeClass('d-none');
        $('#hoivien').removeClass('d-none');
        $('#phim').removeClass('d-none');
        $('#thucpham').removeClass('d-none');
        function showData() {
            $.get("{{ route('getList.ve') }}", {text: 'idve', filter: 'asc'}, function(data){
                $('#ve-table').empty().html(data);
            })
        }

        $('#ve-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#ve-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('ve.create') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                       $('#ve-table').empty().html(response);
                    }
                    else
                       showData();
                }
            })
        })
    })
</script>
@endsection

