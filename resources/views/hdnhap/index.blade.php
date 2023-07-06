@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Hóa đơn nhập</h2>
       <div class="d-flex align-items-center">
           <a type="button" class="btn btn-success me-3" href="{{ route('hdnhap.create') }}" style="height: 40px">
               <i class="fa-solid fa-circle-plus"></i> Thêm
           </a>

           <form class="d-flex my-2">
                <input class="form-control me-2" id="hdnhap-input_search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
           </form>
       </div>
    </div>

    <div id="hdnhap-table"></div>
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
           $.get("{{ route('getList.hdnhap') }}", {text: 'idhdnhap', filter: 'asc'}, function(data){
               $('#hdnhap-table').empty().html(data);
           })
       }

        $('#hdnhap-input_search').on('keyup', function(e) {
            e.preventDefault();
            let text = $('#hdnhap-input_search').val();
            $.ajax({
                type: "get",
                url: "{{ route('search.hdnhap') }}",
                data: {
                    text: text
                },
                success: function(response) {
                    if (text !== ''){
                       $('#hdnhap-table').empty().html(response);
                    }
                    else
                       showData();
                }
            })
        })
    })
</script>
@endsection

