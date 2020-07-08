@extends('maestra-cliente.maestracliente')
@section('titulo', 'Nosotros - El Pibe')
		
@section ('centro')


               
        <!-- End Bradcaump area --> 
        
        <!-- Start Our Team Area -->
        <section class="htc__team__area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="section__title section__title--2 text-center">
                            <img src="{{ asset('cliente_assets/images/favicon.png')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">El Pibe ¿Quiénes somos?</h2>
                            <p>Somos una empresa dedicada a la venta de ropa, accesorios y calzado para bebés. Tenemos más de 30 años llevando productos exclusivos y de la mejor calidad para los bebés de la zona</p>
                        </div>
                        <div class="store__btn">
                            <a href="{{ url('/contacto')}}">Ponte en contacto con nosotros</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- End Our Team Area -->
        <!-- Start Our Store Area -->
        <section class="htc__store__area ptb--100 bg__white " style="margin">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Misión</h2>
                            <p>Tener al exigente mercado de prendas para bebes satisfechos en sus necesidades y expectativas.
Mantener la calidad de nuestros productos.
Propiciar un ambiente seguro, cómodo y agradable a nuestros clientes y colaboradores.
Mantener a nuestros clientes en el primer lugar dentro de nuestra empresa, teniendo presente todas y cada una de sus sugerencias y exigencias.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Store Area -->
        <!-- Start Our Store Area -->
        <section class="htc__store__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Visión</h2>
                            <p> Ser una empresa de referencia, líder en distribución en la línea de ropa, calzado y accesorios para bebe e infantil, en continuo crecimiento, con presencia a nivel nacional y proximamente internacional, que se distinga por proporcionar buena calidad de productos y un servicio excelente a sus clientes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Store Area -->
        <!-- Start Choose Us Area -->
        <section class="htc__choose__us__ares bg__white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="video__wrap bg--3" data--black__overlay="5">
                            <div class="video__inner">
                                <a class="video__trigger video-popup" href="https://www.youtube.com/watch?v=-FNf8hwlS70">
                                    <i class="zmdi zmdi-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="htc__choose__wrap bg__cat--4">
                            <h2 class="choose__title">¿Por que escogernos?</h2>
                            <div class="choose__container">
                                <div class="single__chooose" style="margin-left:0px">
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-heart"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Las Mejores Ofertas</h4>
                                            <p>Tenemos lo ultimo en tendencias para tu bebé y contamos con cupones de descuento para todos nuestros productos</p>
                                        </div>
                                    </div>
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-truck"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Envíos Instantáneos</h4>
                                            <p>Enviamos tus productos a nivel nacional en 48 horas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single__chooose" style="margin-left:0px">
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-money"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Precios Bajos</h4>
                                            <p>Tenemos miles de productos de la mejor calidad para tu bebé, al mejor precio del mercado.</p>
                                        </div>
                                    </div>
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-time"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Te atendemos 24/7</h4>
                                            <p>Estamos para atenderte! Aqui estamos a disposicion tuya, todos los dias, a toda hora.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Choose Us Area -->
        
       
        <!-- Start brand Area -->
        <div class="htc__brand__area bg__white ptb--120">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="product__menu">
                            <div class="section__title text-center">
                                <div class="section__title text-center">
                                    <h2 class="title__line" style="color:#fff">Nuestras Marcas</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="brand__list " style="margin-top:70px">
                            <li><a href="#">
                                <img src="{{ asset('cliente_assets/images/brand/1.jpg') }}" alt="brand images">
                            </a></li>
                            <li><a href="#">
                                <img src="{{ asset('cliente_assets/images/brand/2.jpg') }}" alt="brand images">
                            </a></li>
                            <li><a href="#">
                                <img src="{{ asset('cliente_assets/images/brand/3.jpg') }}" alt="brand images">
                            </a></li>
                            <li><a href="#">
                                <img src="{{ asset('cliente_assets/images/brand/4.jpg') }}" alt="brand images">
                            </a></li>
                            <li class="hidden-sm"><a href="#">
                                <img src="{{ asset('cliente_assets/images/brand/5.jpg') }}" alt="brand images">
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End brand Area -->
@endsection

@section('scripts')
@endsection