<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="p:domain_verify" content="267e7555f650fdff945a9259d60ad59b"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mali:700i|Raleway" rel="stylesheet">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('cliente_assets/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{ asset('cliente_assets/apple-touch-icon.png')}}">
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/bootstrap.min.css')}}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/owl.theme.default.min.css')}}">
    <!-- Notify. -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cliente_assets/vendor/notify/ns-default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cliente_assets/vendor/notify/ns-style-other.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/style.css') }}" >
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/custom.css')}}">
    <!-- Preloader -->
    <link rel="stylesheet" href="{{ asset('cliente_assets/css/spinners.css') }}">
    <link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/switch.css')}}">
    <!-- My CSS File -->
    @yield('micss')
    <!-- Modernizr JS -->
    <script src="{{ asset('cliente_assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">

                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{asset('cliente_assets/images/logo/logo.png')}}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li><a href="{{ url('/') }}">Inicio</a></li>
                                    <li><a href="{{ url('/productos') }}">Productos</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Inicio</a></li>
                                        <li><a href="{{ url('/productos') }}">Productos</a></li>
                                    </ul>
                                </nav>
                            </div>                          
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-3 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                @auth('web')
                                <li class="dropdown">
                                    <a href="{{ url('/profile') }}" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth('web')->user()->name}}  <span class="ti-user">  </span>
                                    </a> 
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li class="dropdown-item" style="padding-left:0px">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                    </ul>
                                </li>
                                @endauth 
                                @guest       
                                <li><a href="{{ url('/login') }}"><span class="ti-user"></span></a></li>
                                @endguest

                                <li class="cart__menu"><span class="ti-shopping-cart"></span>
                                    @if (Cart::instance('default')->count() > 0)
                                         <span style="background-color:yellow; padding: 2px 5px; border-radius:10px; font-size:14px;">{{ Cart::instance('default')->count() }}</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Buscar" type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        @csrf                    
                        @foreach ($cart as $productCart)
                        <div class="shp__single__product" id="{{ $productCart->rowId }}">
                                @if(!$productCart->options->type)
                                    <div class="shp__pro__thumb">
                                        <a href="{{ url("/producto/$productCart->id")}}">
                                            <img src="{{ asset($productCart->options->img) }}" alt="product images">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="{{ url("/producto/$productCart->id")}}">{{ $productCart->name }}</a></h2>
                                        <span class="quantity">Cantidad: {{  $productCart->qty }}</span>
                                        @if($productCart->options->size )
                                            <br><span class="Size">Tamaño: {{  $productCart->options->size }}</span>
                                        @endif
                                        <span class="shp__price">S/.{{  $productCart->price }}</span>
                                    </div>
                                @else
                                    <div class="shp__pro__thumb">
                                        <img src="{{ $productCart->options->screenshot }}" alt="product images">
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2>{{ $productCart->name }}</h2>
                                        <span class="quantity">Cantidad: {{  $productCart->qty }}</span>
                                        @if($productCart->options->size )
                                            <br><span class="Size">Tamaño: {{  $productCart->options->size }}</span>
                                        @endif
                                        <span class="shp__price">S/.{{  $productCart->price }}</span>
                                    </div>
                                @endif
                                <div class="remove__btn">
                                    <a  href="javascript:void(0)" id="DeleteProductCart" data-id="{{ $productCart->rowId }}"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </div>
                         @endforeach
                    </div>
                   <ul class="shoping__total {{ $cart->isEmpty()? 'hidden' : '' }}">
                        <li class="subtotal">Subtotal:</li>
                        <li id="total_price_cart" class="total__price">S/.{{ $total }}</li>
                    </ul>
                    <ul class="shopping__btn {{ $cart->isEmpty()? 'hidden' : '' }}">
                        <li><a href="{{ url('/carrito') }}">Ver Carrito</a></li>
                        <li class="shp__checkout"><a href="{{ url('checkout') }}">Procesar compra</a></li>                        
                    </ul>
                    <div class="{{ $cart->isEmpty()? '' : 'hidden' }} cart-empty">
                        <div class="text-center">
                            <i class="cart-empty-i ti-shopping-cart" style="font-size:50px"></i>                          
                        </div> 
                        <h2 class=" ptb--20">NO TIENES PRODUCTOS EN TU CARRITO</h2> 
                        <p>Encuentra los mejores productos, a los mejores precios.</p><br>
                        <a class="htc__btn shop__now__btn" href="{{ url('/productos') }}">COMPRAR AHORA</a>
                    </div> 
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->

      @section('centro')


      @show
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2020 Derechos reservados | <a href="#"> M </a></p>
                                </div>
                                <ul class="social__icon">
                                    <li><a href="" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    <li><a href="" target="_blank"><i class="zmdi zmdi-pinterest"></i></a></li>
                                </ul>
                                <ul class="footer__menu">
                                    <li><a href="/">Inicio</a></li>
                                    <li><a href="/productos">Productos</a></li>
                                    <li><a href="/">Contactanos</a></li>
                                    <li><a href="/" target="_blank">Terminos y Condiciones</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" id="modal-product-cover" src="{{ asset('cliente_assets/images/product/big-img/1.png') }}">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1 class="modal-product-title"> </h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price modal-product-price"> </span>
                                        <span class="old-price modal-product-old-price"></span>
                                    </div>
                                </div>
                                <div class="quick-desc modal-product-description">
                                    
                                </div>
                                <div class="select__color">
                                    <h2>Color</h2>
                                    <ul class="color__list">
                                        <li class="green"><a class="modal-color" href="javascript:void(0)"></a></li>
                                    </ul>
                                </div>
                                <div class="select__size hidden">
                                    <div class="row">
                                        <div class="col-md-7"><h2>Selecionar  tamaño</h2></div>
                                        <div class="col-md-5">                                                                       
                                            <div class="product-options" id="shop-list-modal">
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                                <div class="social-sharing pt--20">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Cantidad</h3>
                                        <ul class="social-icons">
                                            <div class="product-quantity">
                                                <div class="wrap-num-product">
                                                    <div class="btn-num-product-down ">
                                                        <i class="ti-angle-left"></i>
                                                    </div>
                                                    @csrf 
                                                    <input class="num-product" readonly min="1" max="" type="number" value="1" id="product-quantity-get">

                                                    <div class="btn-num-product-up">
                                                        <i class="ti-angle-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a class="modal-add-product addCartProductDetail" data-id="" href="javascript:void(0)">Añadir al carrito</a>
                                    <h2 class="text-danger sold-out hidden"><i class="zmdi zmdi-mood-bad"></i> Agotado</h2>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    <script src="{{ asset('cliente_assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('cliente_assets/js/bootstrap.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('cliente_assets/js/plugins.js')}}"></script>
    <script src="{{ asset('cliente_assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('cliente_assets/js/owl.carousel.min.js')}}"></script>
    <!-- Waypoints.min.js. -->
    <script src="{{ asset('cliente_assets/js/waypoints.min.js')}}"></script>
    <!-- Notify. -->
    <script src="{{ asset('cliente_assets/vendor/notify/classie.js') }}"></script>
    <script src="{{ asset('cliente_assets/vendor/notify/notificationFx.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
     <script src="{{ asset('js/notify.js') }}"></script>
    <!-- Jquery validation. -->
    <script src="{{ asset('cliente_assets/js/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('cliente_assets/js/messages_es_PE.min.js') }}"></script> 
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('cliente_assets/js/main.js')}}"></script>
    <script src="{{ asset('cliente_assets/js/formTextValidation.js')}}"></script>
    @yield('scripts')
</body>

</html>