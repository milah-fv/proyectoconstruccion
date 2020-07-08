<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Autores" content="Rodrigo Flores del Carpio, Milagros Fonseca Villar, Paul Hinostroza Fernandez" />
    <meta name="Aviso" content="Esta aplicacion web fue realizada como proyecto de titulacion para optar el título técnico profesional de Computacion e Informatica en el IESTP Continental - Huancayo - Perú. Este proyecto puede ser tomado como guía para otros proyectos, sin embargo, si se descubre una copia no autorizada, sera reportado como plagio, y se tomarán las acciones del caso. Prohibida su reproduccion total o parcial." />
    <!-- Aqui va el titulo -->
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/css/paginacion.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/css/styles.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('cliente_assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/switch.css')}}">
    <!-- Esto puede fallar -->
    <link rel="stylesheet" href="{{asset('cliente_assets/js/main.css')}}">
    
   <!--  <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    @yield('micss')
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="/admin" >
            <img src="{{asset('img_web/logo.png')}}" class="img-responsive" alt="logo" style="width: 100px; ">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            
           

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset(Auth('user')->user()->avatar) }}" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none">
                    </span>

                </a>

            

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Cuenta</div>

                    <a href="{{ url('/admin/profile/'.Auth('user')->user()->id) }}" class="dropdown-item">
                        <i class="fa fa-user"></i> Perfil
                    </a>      

                    <a href="{{ route('logout') }} "  class="dropdown-item"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >
                                 <i class="fa fa-power-off"></i> Cerrar Sesion
                    </a> 
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                       
                    
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">Navegación</li>
                    @section('menu-inicio')
                    <li class="nav-item">
                        <a href="/admin" class="nav-link ">
                            <i class="icon icon-home"></i> Inicio
                        </a>
                    </li>
                    @show

                    @section('menu-pagina-principal')
                      <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-wrench"></i> Pagina  Principal<i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/slider" class="nav-link">
                                    <i class="icon icon-wrench"></i> Sliders
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/coupon" class="nav-link">
                                    <i class="icon icon-wrench"></i> Cupones
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/paymentOptions" class="nav-link">
                                    <i class="icon icon-wrench"></i> Opciones de Pago
                                </a>
                            </li>
                        </ul>
                        
                    </li>
                    @show

                     @section('menu-productos')
                    <li class="nav-item nav-dropdown">
                        <a href="/admin/product" class="nav-link">
                            <i class="icon icon-grid"></i> Productos 
                        </a>
                    </li>
                    @show
                     @section('menu-categorias')
                    <li class="nav-item nav-dropdown">
                        <a href="/admin/category" class="nav-link">
                            <i class="icon icon-organization"></i> Categorías 
                        </a>
                    </li>
                    @show
                    @section('menu-ventas')
                    <li class="nav-item ">
                        <a href="/admin/orders" class="nav-link">
                            <i class="icon icon-handbag"></i> Ventas 
                        </a>
                    </li>
                    @show
                    @section('menu-reportes')
                     <li class="nav-item ">
                        <a href="/admin/reports" class="nav-link">
                            <i class="icon icon-chart"></i> Reportes 
                        </a>
                    </li>
                    @show
                    
                   <!--  @section('menu-reportes')
                      <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-chart"></i> Reportes <i class="fa fa-caret-left"></i>
                        </a>
                         @section('menu-buscar-reportes')
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="chartjs.html" class="nav-link">
                                    <i class="icon icon-chart"></i> Buscar Reportes
                                </a>
                            </li>
                        </ul>
                        @show
                         @section('menu-ver-graficos')
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="chartjs.html" class="nav-link">
                                    <i class="icon icon-chart"></i> Ver Graficos
                                </a>
                            </li>
                        </ul>
                        @show
                    </li>
                    @show -->
                    @section('menu-clientes')
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-user-following"></i> Clientes y Vouchers<i class="fa fa-caret-left"></i>
                        </a>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/customer" class="nav-link ">
                                    <i class="icon icon-user-following"></i> Clientes 
                                </a>
                            </li>
                        </ul>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/boucher" class="nav-link ">
                                    <i class="icon icon-film"></i> Vouchers 
                                </a>
                            </li>
                        </ul>
                    </li>
                    @show
                    <!-- <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <i class="icon icon-user"></i> Usuarios 
                        </a>
                    </li> -->
                    @section('menu-empleados')
                    <li class="nav-item ">
                        <a href="/admin/user" class="nav-link">
                            <i class="icon icon-people"></i> Empleados 
                        </a>
                    </li>
                    @show

                    @section('menu-blog')
                    <li class="nav-item ">
                        <a href="/admin/posts" class="nav-link">
                            <i class="icon icon-pencil"></i> Blog 
                        </a>
                    </li>
                     <!--  <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-pencil"></i> Blog <i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/posts" class="nav-link">
                                    <i class="icon icon-pencil"></i> Posts
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/tag" class="nav-link">
                                    <i class="icon icon-pencil"></i> Etiquetas
                                </a>
                            </li>
                        </ul>
                        
                    </li> -->
                    @show
                    <li class="nav-item ">
                        <a  class="nav-link">
                           
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </div>


                   

                    
            </ul>
        </nav>
    </div>

        <div class="content">
            <div class="container-fluid">

                @if (session('info'))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-success">
                                    {{ session('info')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- @if (count($errors))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-danger alert-rounded">
                                   <ul>
                                       @foreach ($errors->all() as $error)
                                       <li>
                                           {{$error}}
                                       </li>
                                       @endforeach
                                   </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif -->

               <!-- Aqui va la aplicación -->
                @section('centro')

                @show

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/popper.js/popper.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{ asset('admin_assets/js/carbon.js')}}"></script>
<script src="{{ asset('admin_assets/js/demo.js')}}"></script>
<script src="{{ asset('admin_assets/js/principal.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>

>
@include('sweetalert::alert')`

@yield('scripts')

<script>
        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46, 64, 45, 95];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

        function soloNumeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789";
            especiales = [8, 37, 39, 46, 64, 45, 95];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

        function letrasNumeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
            especiales = [8, 37, 39, 46, 64, 45, 95];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

    </script>





</body>
</html>
