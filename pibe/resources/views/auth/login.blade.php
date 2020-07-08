@extends('maestra-cliente.maestracliente')
@section('titulo', 'Iniciar Sesión')
@section ('centro')
	
	<!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--70">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="{{ url('/login') }}" >Ingresa</a></li>
                            <li role="presentation" class="register"><a href="{{ url('/register') }}" >Regístrate</a></li>
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
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">

                                @csrf
                                    @component('components.input', ['name' => 'email','title' => 'Email','type' => 'email'])
                                        @slot('attributes') required @endslot
                                    @endcomponent

                                    @component('components.input', ['name' => 'password','title' => 'Contraseña','type' => 'password'])
                                        @slot('attributes') required @endslot
                                    @endcomponent
                                    <!-- <input type="text" placeholder="Email">
                                    <input type="password" placeholder="Contraseña"> -->
                                
                                <div class="tabs__checkbox ">
                                    
                                        <!-- <input type="checkbox" >
                                        <span> Recuerdame</span> -->
                                        <span class="forget"><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></span>                             
                                    </div>
                                    <div class="contact-btn pb--30 text-center">
                                        <button type="submit" class="fv-btn">Iniciar Sesión</button>
                                    </div>
                                    <div class="text-center">
                                        <span class="forget">¿Aún no recibiste el correo electrónico de confirmación? <a class="resend_the_email" href="{{ url('/confirmacion/nueva') }}">Reenvíe el correo electrónico</a></span>
                                    </div>
                                </form>
                                <!-- <div class="htc__social__connect ptb--100">
                                    <h2>O inicie sesión con</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div> -->
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->

@endsection

@section ('scripts')
@endsection