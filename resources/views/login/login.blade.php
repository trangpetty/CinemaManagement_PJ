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
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <title>Petty</title>
</head>
<body>
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!----------------------- Login Container -------------------------->
        <div class="row rounded-5 p-3 bg-white shadow-lg">
    <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 p-0">
                <img src="{{ asset('image/header.jpg') }}" class="w-100 h-100 rounded-4">
                <!-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small> -->
            </div>
    <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 px-5 py-3">
                <div class="row align-items-center">
                    <div>
                        <h2>Petty Cinema</h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <form id="form-login">
                        @csrf
                        <div class="input-data mb-4">
                            <input type="text" class="px-0 py-3 mt-2 w-100" placeholder=" " name="username" id="username">
                            <label>Tài khoản</label>
                        </div>
                        <div class="input-data mb-4">
                            <input type="password" class="px-0 py-3 mt-2 w-100" placeholder=" " name="password" id="password">
                            <label>Mật khẩu</label>
                        </div>
                        <p class="text-danger" id="login-error"></p>
                        <input type="submit" class="btn btn-danger w-100 bg-red fw-bold py-3 mb-4" value="Login">
                        <div class="text-center">
                            <p class="mb-2">Đăng nhập với</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-light bg-white border-0 rounded-circle p-0 me-3 link-contact">
                                    <img src="{{ asset('image/facebook.png') }}" style="width:2rem">
                                </button>
                                <button class="btn btn-light bg-white border-0 rounded-circle p-0 link-contact">
                                    <img src="{{ asset('image/google.png') }}" style="width:2rem">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg top-0 bottom-0 start-0 w-100 h-100 ">
        <div class="spinner-1"></div>
    </div>
    <script>
        $('.bg').hide();
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $.post('{{ route("post_login") }}', {
                username: $('#username').val(),
                password: $('#password').val()
            }, (response) => {
                if (response.status){
                    $('#login-error').html(response.status)
                }
                else {
                    $('.bg').show();
                    $('.container').hide();

                    if(response.data == 1) {
                        setInterval(() => {
                            location.href = '/nhanvien';
                        }, 1000);
                    }
                    else if (response.data == 0) {
                        setInterval(() => {
                            location.href = '/suatchieu';
                        }, 1000);
                    }
                }

            })
        })
        // $.(document).ready(function() {
        // })
    </script>
</body>
</html>
