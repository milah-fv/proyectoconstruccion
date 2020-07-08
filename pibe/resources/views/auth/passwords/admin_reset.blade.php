<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El Pibe - Recuperar contraseña</title>
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/css/styles.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('cliente_assets/images/favicon.png')}}">
</head>
<body style="background-color: #202020;">
    
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">  <img src="{{ asset('img_web/logo.png')}}" alt="el Pibe"> </div>
                    <form class="form-horizontal form-material" id="loginform"method="POST" action="{{ route('user.password.request') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <h3 class="box-title m-b-20 text-center">Recuperar contraseña</h3>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="form-control-label">E-mail</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}"  required autofocus> 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                             <label class="form-control-label">Nueva Contraseña</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="form-control-label">Confirmar Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation"  required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-success btn-rounded" type="submit">Restablecer Contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="admin_assets/vendor/jquery/jquery.min.js"></script>
    <script src="admin_assets/vendor/popper.js/popper.min.js"></script>
    <script src="admin_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin_assets/vendor/chart.js/chart.min.js"></script>
    <script src="admin_assets/js/carbon.js"></script>
    <script src="admin_assets/js/demo.js"></script>

</body>
</html>