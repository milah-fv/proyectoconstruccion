<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El Pibe - Admin</title>
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
                        
                  <!--   <div class="card-header text-center text-uppercase h4 font-weight-light">   Ingresa
                     
                    </div>
 -->		
 					<form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('admin.login.submit') }}">
                      @csrf
                    <div class="card-body py-5">

                        @if (session()->has('email'))
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class=" text-center alert alert-danger">
                                        {{ session('email')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="form-control-label">E-mail</label>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" required="" name="email" value="{{ old('email') }}" maxlength="50"   required onkeypress="return letrasNumeros(event)">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>                                   
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Contraseña</label>
                            <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" name="password" maxlength="100">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                           
                        </div>

                        <!-- <div class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" class="custom-control-input" id="login">
                            <label class="custom-control-label" for="login">Recordar contraseña</label>
                        </div> -->
                    </div>
                    
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success px-5">Ingresar</button>
                            </div>

                            <div class="col-6">
                                <a href="{{ route('user.password.request') }}" class="btn btn-link">¿Olvidaste la contraseña?</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="admin_assets/vendor/jquery/jquery.min.js"></script>
<script src="admin_assets/vendor/popper.js/popper.min.js"></script>
<script src="admin_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admin_assets/vendor/chart.js/chart.min.js"></script>
<script src="admin_assets/js/carbon.js"></script>
<script src="admin_assets/js/demo.js"></script>
</body>
</html>
