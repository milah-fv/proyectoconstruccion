@extends('maestra-cliente.maestracliente')
@section('titulo', ' El Pibe')
@section ('centro')
<div class="htc__login__register bg__white pt--70 pb--120">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/confirmacion/nueva') }}">
                            @csrf
                            <h1 class="ptb--30">Reenviar el correo de confirmación</h1>
                            <h6 class="ptb--20">Ingrese su correo electrónico para reenviar las instrucciones de confirmación</h6>
                            <div class="login">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required >      
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group row mb-0 pt--20">
                                 <div class="contact-btn">
                                    <button type="submit" class="fv-btn">enviar enlace de confirmación de correo</button>
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