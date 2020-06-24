@extends('maestra-cliente.maestracliente')
@section('titulo', ' El Pibe')
@section ('centro')
<div class="htc__login__register bg__white pt--70 pb--120">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h1 class="ptb--30">¿Has olvidado tu contraseña?</h1>
                            <h6 class="ptb--20">Ingresa tu correo electrónico para restablecer su contraseña</h6>
                            <div class="login">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Correo*" required>      
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group row mb-0 pt--20">
                                 <div class="contact-btn">
                                    <button type="submit" class="fv-btn">enviar enlace de restablecimiento de contraseña</button>
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
