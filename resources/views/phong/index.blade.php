@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <h2 class="bg-dark text-white p-2">Phòng</h2>
    <div id="phong-table"></div>
</div>
@include('phong.update')
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
           $.get("{{ route('phong.create') }}", {}, function(data){
               $('#phong-table').empty().html(data);
           })
       }
    })
</script>
@endsection

