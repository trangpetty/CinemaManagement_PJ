@extends('layouts.app')
@section('content')
<div class="container-fluid py-3 px-4 bg-light">
    <div class="d-flex justify-content-between bg-dark text-white px-3 align-items-center">
       <h2 class="m-0">Ghế</h2>
       <form class="d-flex my-2" id="ghe-form_search">
            <select name="ghe-idphong_search" id="ghe-idphong_search" class="form-select me-3">
                @foreach ($phong as $item)
                    <option value="{{ $item->idphong }}">{{ $item->idphong }}</option>
                @endforeach
            </select>
            <input class="form-control me-2" id="ghe-vitri_search" type="search" placeholder="Vi tri" aria-label="Search">
            <button class="btn rounded-pill text-white bg-danger" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
       </form>
    </div>

    <div id="ghe-table"></div>
</div>

@include('ghe.update')

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
           $.get("{{ route('getList.ghe') }}", {text: 'idghe', filter: 'asc'}, function(data){
               $('#ghe-table').empty().html(data);
           })
        }

        $('#ghe-form_search').on('submit', function(e) {
            e.preventDefault();
            let idphong = $('#ghe-idphong_search').val();
            let vitri = $('#ghe-vitri_search').val();
            $.get("{{ route('ghe.create') }}", {idphong: idphong, vitri: vitri}, (response) => {
                $('#ghe-table').empty().html(response);
                // if (text !== ''){
                // }
                // else
                //     showData();
            })
        })
    })
</script>
@endsection

