@extends('maestra-cliente.maestracliente')
@section('titulo', 'Restablecer Contraseña')
        
@section ('centro')
<div class="htc__login__register bg__white pt--70 pb--120">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="ptb--30">Restablecer la contraseña</h1>
                        <h6 class="ptb--20">Ingrese su correo electrónico y contraseña</h6>
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="login ptb--10">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>      
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="login ptb--10">
                                <input type="password" name="password" value="{{ old('password') }}" placeholder="Contraseña" required>      
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="login ptb--10">
                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Repita la Contraseña" required>      
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0 pt--20">
                                 <div class="contact-btn">
                                    <button type="submit" class="fv-btn">Restablecer contraseña</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
