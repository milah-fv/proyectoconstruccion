@extends('maestra-cliente.maestracliente')
@section('titulo', 'Mi Perfil')
@section ('centro')
<section class="htc__store__area pt--50 pb--60  bg__white">
	<div class="container">
		<div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 pb--20">
                <!-- <aside class="user-info-wrapper"> -->
               
                    <div class="user-info" style="margin: 20px">
                        <h2><i class="ti-face-smile"> </i>
                        Mi perfil</h2>
                    </div>
                    <ul class="list-group list-group-flush" style="margin-bottom: 0px">
                        <li class=" list-group-item  profile-items {{ Request::is('profile/data') ? 'active' : '' }}">
                            <a class=" profile-links"  href="{{ url('/profile/data') }}">
                            <i class="ti-user"> </i>
                            Mis Datos personales
                            </a>
                        </li>
                        <!-- <li class=" list-group-item  profile-items {{ Request::is('profile/changePass/'.Auth('web')->user()->id) ? 'active' : '' }}">
                            <a class=" profile-links"  href="{{ url('/profile/changePass/'.Auth('web')->user()->id) }}">
                            <i class="ti-lock"> </i>
                            Cambiar contraseña
                            </a>
                        </li> -->
                        <li class=" list-group-item  profile-items {{ Request::is('profile/orders') ? 'active' : '' }}">
                            <a class=" profile-links"  href="{{ url('/profile/orders') }}">
                            <i class="ti-truck"> </i>
                            Mis Pedidos
                            </a>
                        </li>

                        <li class=" list-group-item  profile-items {{ Request::is('profile/boucher') ? 'active' : '' }}">
                            <a class=" profile-links"  href="{{ url('/profile/boucher') }}">
                            <i class="ti-ticket"> </i>
                            Envío de Vouchers
                            </a>
                        </li> 
                        <!-- <li class=" list-group-item  profile-items {{ Request::is('profile/wish_list') ? 'active' : '' }}">
                            <a class=" profile-links"  href="{{ url('/profile/wish_list') }}">
                            <i class="ti-heart"> </i>
                            Mi Lista de Deseos
                            </a>
                        </li> -->
                       
                        <li class="list-group-item  profile-items">
                            <a class=" profile-links" href="{{ route('logout') }}" onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
                            <i class="ti-share-alt" aria-hidden="true"> </i>
                                Cerrar Sesion
                            </a>
                        </li>
                        {{--
                        <li class="list-group-item profile-items {{ Request::is('profile/coupons') ? 'active' : '' }}">
                            <a class=" profile-links" href="{{ url('/profile/coupons') }}">
                            <i class="ti-ticket"></i>
                            Mis Cupones
                            </a>
                        </li>
                        --}}
                    </ul>
               <!--  </aside> -->
            </div>
			<div class="col-xl-8 col-lg-8 col-md-8">
                @yield('content')
			</div>
		</div>
    </div>
</section>
@endsection



