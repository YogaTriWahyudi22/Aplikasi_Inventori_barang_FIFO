<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-tiket | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSS --}}
    @include('layouts.navbar')
    {{-- CSS --}}
</head>

<body class="hold-transition login-page">

    {{-- script --}}
    @include('layouts.script')
    {{-- script --}}

    <div class="login-box">
        <div class="login-logo">
            <span><b>CV.Pertiwi
                </b>Flowers</span>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"></p>

                <form action="{{ route('proses_login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required
                            autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
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

                    <div class="col-6 mb-5">
                        <button type="submit" class="btn btn-primary btn-block mb-2">Sign In</button>
                    </div>
            </div>
            </form>

            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

</body>

</html>
