@extends('maestra-cliente.maestracliente')
@section('titulo', 'Registro')
@section ('centro')
	
	<!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--70">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login "><a href="{{ url('/login') }}" >Ingresa</a></li>
                            <li role="presentation" class="register active"><a href="{{ url('/register') }}" >Regístrate</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                        
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="login" method="POST" action="{{ route('register') }}" >
                                @csrf

                                    @component('components.input', ['name' => 'name','title' => 'Nombres'])
                                    @slot('attributes') 
                                        maxlength="150" 
                                        onkeypress= "return soloLetras(event)"
                                    @endslot
                                    @endcomponent

                                    @component('components.input', ['name' => 'last_name','title' => 'Apellidos'])
                                    @slot('attributes') 
                                        maxlength="150" 
                                        onkeypress= "return soloLetras(event)"
                                    @endslot
                                    @endcomponent

                                    @component('components.input', ['name' => 'email','title' => 'E-mail', 'type' => 'email'])
                                    @slot('attributes') 
                                        maxlength="150" 
                                        onkeypress= "return letrasNumeros(event)"
                                    @endslot
                                    @endcomponent

                                    @component('components.input', ['name' => 'password','title' => 'Contraseña', 'type' => 'password'])
                                    @endcomponent

                                    @component('components.input', ['name' => 'password_confirmation','title' => 'Confirmar Contraseña', 'type' => 'password'])
                                    @endcomponent
                                    
                                
                                    <div class="tabs__checkbox ">
                                        <input id="policy_privacy" type="checkbox" required style="width: 5%; height: 15px;">
                                        <label for="policy_privacy" > Acepto las <a href="{{ url('/terminos_y_condiciones') }}" target="_blank">Política de privacidad</a> del sitio.</label>
                                    </div>
                                    <div class="contact-btn text-center ptb--70">
                                        <button type="submit" class="fv-btn">Registrarse</button>
                                    </div>

                                </form>
                               <!--  <div class="htc__social__connect">
                                    <h2>O regístrate con</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
 -->                        </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->>

@endsection

@section ('scripts')
@endsection