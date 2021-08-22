<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    @include('layouts.navbar')
    {{-- CSS --}}
</head>

<body class="hold-transition register-page">

    {{-- script --}}
    @include('layouts.script')
    {{-- script --}}

    <style>
        .kotak1 {
            width: 100%;
        }

        .kotak2 {
            width: 50%;
        }

        .kotak3 {
            width: 100px;
        }

        .kotak4 {
            width: 500px;
        }

        .kotak5 {
            width: 1000px;
        }

    </style>
    <div class="login-box">
        <div class="register-logo">
            <span><b>Register</b>Sumatrans</span>
        </div>

        <div class="card ">
            <div class="card-body register-card-body">
                <p class="login-box-msg"></p>

                <form action="{{ route('proses_register') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Full name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirmation password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="nohp" class="form-control" placeholder="No Telpon" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary mb-2">Register</button><br>
                            <a href="{{ route('login') }}" class="text-responsive"> Login Page</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

</body>

</html>
