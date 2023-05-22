<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.2.0-web/css/all.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery-3.6.1.min.js') }}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>​
    <title>Petty</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white border border-bottom-1">
        <div class="container px-4 m-0">
            <div class="navbar-brand">
                <i class="fa-solid fa-film"></i>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Ve</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('nhanvien.index') }}">Nhan vien</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Phim</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Lich chieu</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hoa don
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Hoa don nhap</a></li>
                        <li><a class="dropdown-item" href="#">Hoa don xuat</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Vat tu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Phong</a></li>
                        <li><a class="dropdown-item" href="#">Ghe</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thong ke
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Doanh thu</a></li>
                        <li><a class="dropdown-item" href="#">Doanh so</a></li>
                        <li><a class="dropdown-item" href="#">Luong nhan vien</a></li>
                    </ul>
                    </li>
                </ul>
            <a class="btn btn-dark" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="w-100 text-center border p-3 bottom-0 bg-white">
        <p class="m-0">Make by Trang &#169; Copyright 2023</p>
    </footer>

</body>
</html>
