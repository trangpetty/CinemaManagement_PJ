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
                        <h2>Hello,Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <form id="form-login">
                        @csrf
                        <div class="input-data mb-4">
                            <input type="text" class="px-0 py-3 mt-2 w-100" placeholder=" " name="username" id="username">
                            <label>Username</label>
                        </div>
                        <div class="input-data mb-4">
                            <input type="password" class="px-0 py-3 mt-2 w-100" placeholder=" " name="password" id="password">
                            <label>Password</label>
                        </div>
                        <p class="text-danger" id="login-error"></p>
                        <input type="submit" class="btn btn-danger w-100 bg-red fw-bold py-3 mb-4" value="Login">
                        <div class="text-center">
                            <p class="m-0">Sign in with</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-light bg-white border-0">
                                    <img src="{{ asset('image/facebook.png') }}" style="width:2rem">
                                </button>
                                <button class="btn btn-light bg-white border-0">
                                    <img src="{{ asset('image/google.png') }}" style="width:2rem">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '{{ route("post_login") }}',
                data: {
                    username: $('#username').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    if (response.status){
                        $('#login-error').html(response.status)
                    }

                    if(response.data == 1) {
                        location.href = '/nhanvien';
                    }
                    else if (response.data == 0)
                        location.href = '/login';
                }
            })
        });
        // $.(document).ready(function() {
        // })
    </script>
</body>
</html>
