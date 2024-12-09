@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            // Chuyển trạng thái form trong localStorage thành login
            localStorage.setItem('formState', 'login');
        </script>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #f97f87;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('storage/images/logo-uni.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    UNI-GAMES
                </p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Games for fun!</small>
            </div>
            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box right-login-form" id="login-form">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
                        <h2>Welcome</h2>
                        <p>We are happy to have you back.</p>
                    </div>

                    <form action="{{ route('auth.login.post') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="text" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email address or Username" required autofocus>
                            @if ($errors->has('text'))
                                <span class="text-danger">{{ $errors->first('text') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Remember
                                        Me</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>

                    <div class="input-group mb-3">
                        <a href="{{ route('auth.redirection', 'google') }}" class="btn btn-lg btn-light w-100 fs-6">
                            <img src="https://storage.googleapis.com/support-kms-prod/ZAl1gIwyUsvfwxoW9ns47iJFioHXODBbIkrK"
                                style="width:20px" class="me-2">
                            <small>Continue with Google</small>
                        </a>
                    </div>
                    <div class="input-group mb-3">
                        <a href="{{ route('auth.redirection', 'facebook') }}" class="btn btn-lg btn-light w-100 fs-6">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1200px-2021_Facebook_icon.svg.png"
                                style="width:20px" class="me-2">
                            <small>Continue with Facebook</small>
                        </a>
                    </div>
                    <div class="row">
                        <small>Don't have account? <a href="#" id="show-register-form">Sign Up</a></small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 right-box right-register-form" id="register-form" style="display: none;">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
                        <h2>Welcome</h2>
                        <p>We are happy to have you back.</p>
                    </div>

                    <form action="{{ route('auth.register.post') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email address" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="verifypassword" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Vefify Password" required>
                            @if ($errors->has('verifypassword'))
                                <span class="text-danger">{{ $errors->first('verifypassword') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                        </div>
                    </form>

                    <div class="input-group mb-3">
                        <a href="{{ route('auth.redirection', 'google') }}" class="btn btn-lg btn-light w-100 fs-6">
                            <img src="https://storage.googleapis.com/support-kms-prod/ZAl1gIwyUsvfwxoW9ns47iJFioHXODBbIkrK"
                                style="width:20px" class="me-2">
                            <small>Continue with Google</small>
                        </a>
                    </div>
                    <div class="input-group mb-3">
                        <a href="{{ route('auth.redirection', 'facebook') }}" class="btn btn-lg btn-light w-100 fs-6">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1200px-2021_Facebook_icon.svg.png"
                                style="width:20px" class="me-2">
                            <small>Continue with Facebook</small>
                        </a>
                    </div>
                    <div class="row">
                        <small>Already have account? <a href="#" id="show-login-form">Sign In</a></small>
                    </div>
                </div>
            </div>
            <!-- Form Forgot Password -->
            <div class="col-md-6 right-box right-forgot-form" id="forgot-form" style="display: none;">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
                        <h2>Forgot Your Password?</h2>
                        <p>Enter your email address to reset your password.</p>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email address" id="forgot-email" required autofocus>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6"
                                id="submit-forgot-password">Submit</button>
                        </div>
                    </form>
                    <div class="row">
                        <small><a href="#" id="show-login-form-from-forgot">Back to Login</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra trạng thái đã lưu trong localStorage khi trang tải lại
            var savedState = localStorage.getItem('formState');

            // Nếu có trạng thái đã lưu, thay đổi form tương ứng
            if (savedState === 'register') {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-form').style.display = 'block';
            } else if (savedState === 'forgot') {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('forgot-form').style.display = 'block';
            } else {
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('register-form').style.display = 'none';
                document.getElementById('forgot-form').style.display = 'none';
            }

            // Khi nhấn vào "Sign Up", ẩn form đăng nhập và hiển thị form đăng ký
            document.getElementById('show-register-form').addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định (nếu là link)

                // Ẩn form đăng nhập và hiển thị form đăng ký
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-form').style.display = 'block';

                // Lưu trạng thái vào localStorage
                localStorage.setItem('formState', 'register');
            });

            // Khi nhấn vào "Sign In", ẩn form đăng ký và hiển thị form đăng nhập
            document.getElementById('show-login-form').addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định (nếu là link)

                // Ẩn form đăng ký và hiển thị form đăng nhập
                document.getElementById('register-form').style.display = 'none';
                document.getElementById('login-form').style.display = 'block';

                // Lưu trạng thái vào localStorage
                localStorage.setItem('formState', 'login');
            });

            // Khi nhấn vào "Forgot Password?", ẩn form đăng nhập và hiển thị form quên mật khẩu
            document.querySelector('.forgot a').addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định (nếu là link)

                // Ẩn form đăng nhập và hiển thị form quên mật khẩu
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('forgot-form').style.display = 'block';

                // Lưu trạng thái vào localStorage
                localStorage.setItem('formState', 'forgot');
            });

            // Khi nhấn vào "Back to Login", ẩn form quên mật khẩu và hiển thị form đăng nhập
            document.getElementById('show-login-form-from-forgot').addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định (nếu là link)

                // Ẩn form quên mật khẩu và hiển thị form đăng nhập
                document.getElementById('forgot-form').style.display = 'none';
                document.getElementById('login-form').style.display = 'block';

                // Lưu trạng thái vào localStorage
                localStorage.setItem('formState', 'login');
            });
        });
    </script>
@endsection
