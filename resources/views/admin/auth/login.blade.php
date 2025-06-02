<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediCare - Admin Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        .login-page {
            background: #f4f6f9;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #1976D2;
            border-color: #1976D2;
        }

        .btn-primary:hover {
            background-color: #1565C0;
            border-color: #1565C0;
        }

        .card-primary.card-outline {
            border-top: 3px solid #1976D2;
        }

        .login-box {
            width: 400px;
        }

        .login-logo {
            margin-bottom: 20px;
        }

        .login-logo img {
            width: 50px;
            margin-right: 10px;
        }

        .login-title {
            color: #1976D2;
            font-size: 24px;
            font-weight: bold;
        }

        .input-group-text {
            background-color: transparent;
            border-left: none;
        }

        .form-control {
            border-right: none;
        }

        .form-control:focus {
            border-color: #1976D2;
            box-shadow: none;
        }

        .social-auth-links .btn {
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .social-auth-links .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo mb-4">
            <div class="d-flex align-items-center justify-content-center">
                <img src="{{ asset('img/medicare-logo.png') }}" alt="MediCare Logo" class="mr-2">
                <span class="login-title">MediCare</span>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-body">
                <p class="login-box-msg">Login sebagai Admin</p>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope text-muted"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-muted"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mt-4">
                    <a href="{{ route('login') }}" class="btn btn-block btn-outline-primary">
                        <i class="fas fa-user-md mr-2"></i> Login sebagai Dokter
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-block btn-outline-primary">
                        <i class="fas fa-user mr-2"></i> Login sebagai Pasien
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>