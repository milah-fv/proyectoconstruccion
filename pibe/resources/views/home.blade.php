@extends('maestra-cliente.maestracliente')
@section('titulo', 'El Pibe')
@section ('centro')
          <!-- Start Slider Area -->
        <div class="slider__container slider--one">
            <div class="slider__activation__wrap owl-carousel owl-theme">
                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(img_web/sliders/Slider1.jpeg) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                           
                                <div class="slider__inner" style="background:  #ffffff4d; padding:30px 0px;">
                                    <h1> <span class="text--theme" style=" font-size: 90px; ">Toda la calidad que buscas para tu bebe</span></h1>
                                    <div class="slider__btn">
                                            <a class="htc__btn" href="/">Solo aquí !!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(img_web/sliders/Slider2.jpeg) no-repeat scroll center center / cover ;">

                    <div class="container">
                        <div class="row">
                                                    
                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                          
                                 
                                    <div class="slider__inner" style="background:  #ffffff4d; padding:30px 0px;">
                                        <h1> <span class="text--theme" style=" font-size: 90px; ">Diseños únicos</span></h1>
                                        <div class="slider__btn">
                                            <a class="htc__btn" href="/productos">Ver Productos</a>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    <!-- End Single Slide -->
                </div>
            </div>
        </div>
        
        <!-- Start Our Product Area -->
        <section class="htc__product__area ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__menu">
                                <div class="section__title text-center">
                                    <h2 class="title__line" style="color:#fff" >Nuestros Productos</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product MEnu -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__menu " style="background-color:#fff;">
                                <button data-filter="*"  class="is-checked" >Todo</button>
                                <button data-filter=".cat--1">Nuevos Productos</button>
                                <button data-filter=".cat--2">Ofertas</button>
                                <button data-filter=".cat--3">Los más vendidos</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="product__list another-product-style">
                        @csrf
                            @foreach ($newProducts as $product)
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--1">
                                <div class="product foo" style="margin-top:20px">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="{{ url("/producto/$product->id") }}">
                                                <img src="{{ $product->cover_image}}" alt="product images">
                                                <div class="new-product">
                                                    <span>{{ $product->state}}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Vista rápida" data-id="{{ $product->id }}" class="quick-view modal-view detail-link showProduct" href="#"><span class="ti-plus"></span></a></li>
                                                <li>
                                                 @if($product->sizes->isEmpty())
                                                    <a title="Añadir al carrito"  class="addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)">
                                                        <span class="ti-shopping-cart"></span>
                                                    </a>
                                                @else
                                                @foreach ($product->sizes as $size)
                                                @if($size->pivot->quantity > 0)
                                                    <a title="Añadir al carrito" data-size="{{ $size->name }}" data-stock="{{ $size->pivot->quantity }}" class="addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)">
                                                        <span class="ti-shopping-cart"></span>
                                                    </a>
                                                    @break($loop->iteration >= 1)
                                                @endif
                                                @endforeach
                                                @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="{{ url("/producto/$product->id") }}">{{ $product->name}}</a></h2>
                                        <ul class="product__price">
                                            <li class="new__price">S/. {{ number_format($product->price, 2 )}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @foreach ($saleProducts as $product)
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--2">
                                <div class="product foo" style="margin-top:20px">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="{{ url("/producto/$product->id") }}">
                                                <img src="{{ $product->cover_image}}" alt="product images">
                                                <div class="on-sale">
                                                    <span>{{ $product->state}}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Vista rápida" data-id="{{ $product->id }}" class="quick-view modal-view detail-link showProduct" href="#"><span class="ti-plus"></span></a></li>
                                                <li>
                                                 @if($product->sizes->isEmpty())
                                                    <a title="Añadir al carrito"  class="addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)">
                                                        <span class="ti-shopping-cart"></span>
                                                    </a>
                                                @else
                                                @foreach ($product->sizes as $size)
                                                @if($size->pivot->quantity > 0)
                                                    <a title="Añadir al carrito" data-size="{{ $size->name }}" data-stock="{{ $size->pivot->quantity }}" class="addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)">
                                                        <span class="ti-shopping-cart"></span>
                                                    </a>
                                                    @break($loop->iteration >= 1)
                                                @endif
                                                @endforeach
                                                @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="{{ url("/producto/$product->id") }}">{{ $product->name}}</a></h2>
                                        <ul class="product__price">
                                            <li class="new__price">S/. {{ number_format($product->price, 2 )}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @foreach ($popularProducts as $product)
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--3">
                                <div class="product foo" style="margin-top:20px">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="{{ url("/producto/$product->id") }}">
                                                <img src="{{ $product->cover_image}}" alt="product images">
                                                @if($product->state != "Simple")
                                                    <div class="{{ $product->getState() }}">
                                                        <span>{{ $product->state }}</span>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Vista rápida" data-id="{{ $product->id }}" class="quick-view modal-view detail-link showProduct" href="#"><span class="ti-plus"></span></a></li>
                                                <li>
                                                @if($product->sizes->isEmpty())
                                                    <a title="Añadir al carrito"  class="addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)">
                                                        <span class="ti-shopping-cart"></span>
                                                    </a>
                                                @else
                                                @foreach ($product->sizes as $size)
                                                @if($size->pivot->quantity > 0)
                                                    <a title="Añadir al carrito" data-size="{{ $size->name }}" data-stock="{{ $size->pivot->quantity }}" class="addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)">
                                                        <span class="ti-shopping-cart"></span>
                                                    </a>
                                                    @break($loop->iteration >= 1)
                                                @endif
                                                @endforeach
                                                @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="{{ url("/producto/$product->id") }}">{{ $product->name}}</a></h2>
                                        <ul class="product__price">
                                            <li class="new__price">S/. {{ number_format($product->price, 2 )}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
      

        <!-- Start Brands Area -->
        <section class="htc__blog__area bg__white pb--130">
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
                    <div class="col-md-12" style="margin-top:70px">
                        <ul class="brand__list">
                            <li><a href="#">
                                <img src="cliente_assets/images/brand/1.jpg" alt="brand images">
                            </a></li>
                            <li><a href="#">
                                <img src="cliente_assets/images/brand/2.jpg" alt="brand images">
                            </a></li>
                            <li><a href="#">
                                <img src="cliente_assets/images/brand/3.jpg" alt="brand images">
                            </a></li>
                            <li><a href="#">
                                <img src="cliente_assets/images/brand/4.jpg" alt="brand images">
                            </a></li>
                            <li class="hidden-sm"><a href="#">
                                <img src="cliente_assets/images/brand/5.jpg" alt="brand images">
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Brands Area -->

@endsection

@section('scripts')
@endsection
        
     
   

  
    
   