<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="{{ asset('image/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.2.0-web/css/all.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>​
    <title>Cinema - {{ $title }}</title>
</head>
<body class="bg-light">
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
                    <li class="nav-item" id="ve">
                        <a class="nav-link" aria-current="page" href="{{ route('ve.index') }}">Vé</a>
                    </li>
                    <li class="nav-item" id="nhanvien">
                        <a class="nav-link active" href="{{ route('nhanvien.index') }}">Nhân viên</a>
                    </li>
                    <li class="nav-item" id="phim">
                        <a class="nav-link" href="{{ route('phim.index') }}">Phim</a>
                    </li>
                    <li class="nav-item" id="suatchieu">
                        <a class="nav-link" href="{{ route('suatchieu.index') }}">Suất chiếu</a>
                    </li>
                    <li class="nav-item" id="hoivien">
                        <a class="nav-link" href="{{ route('hoivien.index') }}">Hội viên</a>
                    </li>
                    <li class="nav-item" id="thucpham">
                        <a class="nav-link" href="{{ route('doanuong.index') }}">Thực phẩm</a>
                    </li>
                    <li class="nav-item" id="sochamcong">
                        <a class="nav-link" href="{{ route('sochamcong.index') }}">Sổ chấm công</a>
                    </li>
                    <li class="nav-item dropdown" id="hoadon">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hóa đơn
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('hdnhap.index') }}">Hóa đơn nhập</a></li>
                            <li><a class="dropdown-item" href="{{ route('hdxuat.index') }}">Hóa đơn xuất</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="vattu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vật tư
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('phong.index') }}">Phòng</a></li>
                            <li><a class="dropdown-item" href="{{ route('ghe.index') }}">Ghế</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="thongke">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thống kê
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('thongke') }}">Doanh thu</a></li>
                            <li><a class="dropdown-item" href="{{ route('luong') }}">Lương nhân viên</a></li>
                        </ul>
                        </li>
                </ul>
            <a class="nav-item btn btn-outline-danger me-3" id="account-btn" data-bs-toggle="modal" data-bs-target="#account-modal_add" style="cursor:pointer">
                <i class="fa-solid fa-user-plus"></i>
            </a>
            <a class="btn btn-dark" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="account-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng ký tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="account-form_add">
                        <div class="error text-danger"></div>
                        <div class="form-group">
                            <label for="username_add">Tài khoản</label>
                            <input type="text" name="username_add" id="username_add" class="form-control">
                            <span class="text-danger my-1" id="error-username_add"></span>
                        </div>
                        <div class="form-group">
                            <label for="email_add">Email</label>
                            <input type="email" name="email_add" id="email_add" class="form-control">
                            <span class="text-danger my-1" id="error-email_add"></span>
                        </div>
                        <div class="form-group">
                            <label for="password_add">Mật khẩu</label>
                            <input type="password" name="password_add" id="password_add" class="form-control">
                            <span class="text-danger my-1" id="error-password_add"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" id="account-btn_add">Thêm</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="container bg-light footer bottom-0">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-light">
            <div class="col-md-4 d-flex align-items-center">
                <a href="#" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <i class="fa-brands fa-pinterest h3 text-danger"></i>
                </a>
                <span class="mb-3 mb-md-0 text-muted">&#169; 2023 Company, Inc</span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a href="#" class="text-muted"><i class="fa-brands fa-google fs-5"></i></a>
                </li>
                <li class="ms-3">
                    <a href="#" class="text-muted"><i class="fa-brands fa-facebook fs-5"></i></a>
                </li>
                <li class="ms-3">
                    <a href="#" class="text-muted"><i class="fa-brands fa-instagram fs-5"></i></a>
                </li>
            </ul>
        </footer>
    </div>
    <div class="toast-container bottom-0 p-3" >
        <div class="toast toast-fade text-bg-success border-0 align-items-center position-fixed bottom-0" id="toast-success" role="alert" aria-live="assertive" >
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fa-solid fa-circle-check"></i> <span id="toast-text"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        <div class="toast toast-fade text-bg-danger border-0 align-items-center" id="toast-failed" role="alert" aria-live="assertive">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fa-sharp fa-solid fa-circle-exclamation"></i> <span id="toast-fail_text"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
    <script>
        $('.nav-item').addClass('d-none');
        $('.nav-item.nav-link').click(function() {
            $('.nav-item.nav-link.active').removeClass('active');
            $(this).addClass('active')
        })

        $('#account-btn_add').click(function () {
            let username = $('#username_add').val();
            let password = $('#password_add').val();
            let email = $('#email_add').val();
            if (username != '' && password != '' && email != '') {
                $.post('{{ route("post_acc") }}', {
                    username: username,
                    password: password,
                    email: email
                }, (response) => {
                    if(response.status == "success") {
                        $("#account-modal_add").modal("hide");
                        $("#account-form_add")[0].reset();
                        $('#toast-text').text('Thêm thành công');
                        const toastSucc = new bootstrap.Toast($('#toast-success'));
                        toastSucc.show();
                    }
                    else {
                        $('.error').html('<i class="fa-sharp fa-solid fa-circle-exclamation"></i> Tai khoan da ton tai');
                    }
                })
            } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Both Feilds are reqquired!!');
        })
    </script>
</body>
</html>
