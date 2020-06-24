@extends('maestra-cliente.maestracliente')
@section('titulo', 'El Pibe')
@section ('centro')
  
        <!-- Start Product Details -->
<section class="htc__product__details product-details-style2 pt--10 pb--100 bg__white">
            <section class="sec-product-detail pb--40">
                <div class="container">
                    <div class="bread-crumb ">
                        <a href="{{ url('/') }}" >
                            Inicio
                            <i class="ti-angle-right" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/productos/'.$product->category->slug) }}">
                            {{ $product->category->name }}
                            <i class="ti-angle-right" aria-hidden="true"></i>
                        </a>
                        <span>
                            {{ $product->name }}
                        </span>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="scroll-active">
                    <div class="row">
                        <div class="col-md-7 col-lg-7 col-sm-5 col-xs-12">
                             <div class="product__details__container">
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-cover-{{ $product->id }}">
                                            <a style="background: none" href="{{ asset($product->cover_image)}}" class="img-poppu"><img src="{{ asset($product->cover_image)}}" alt="full-image"></a>
                                        </div>
                                        @foreach ($product->images as $gallery)
                                        <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-{{ $gallery->id }}">
                                            <a style="background: none" href="{{ asset("/img_product/$gallery->image")}}" class="img-poppu"><img src="{{ asset("/img_product/$gallery->image")}}" alt="full-image"></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Start Small images -->
                                <ul class="product__small__images" role="tablist">
                                    <li role="presentation" class="pot-small-img active">
                                        <a href="#img-cover-{{ $product->id }}" role="tab" data-toggle="tab">
                                            <img src="{{ asset($product->cover_image)}}" alt="small-image">
                                        </a>
                                    </li>
                                    @foreach ($product->images as $gallery)
                                        <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-{{ $gallery->id }}" role="tab" data-toggle="tab">
                                            <img src="{{ asset("img_product/$gallery->image")}}" alt="small-image">
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- End Small images -->
                            </div>
                        </div>
                        <div class="sidebar-active col-md-5 col-lg-5 col-sm-7 col-xs-12 xmt-30">
                            <div class="htc__product__details__inner ">
                                <div class="pro__detl__title">
                                    <h2>{{ $product->name }}</h2>
                                </div>
                                <div class="pro__details">
                                    <p>{{ $product->features }}</p>
                                </div>
                                <ul class="pro__dtl__prize">
                                    @if($product->old_price != null)
                                    <li class="old__prize">S/.{{ $product->old_price }}</li>
                                    <li>S/.{{ $product->price }}</li>
                                    @else
                                    <li>S/.{{ $product->price }}</li>
                                    @endif
                                </ul>
                                <div class="pro__dtl__color">
                                    <h2 class="title__5">Escoger color</h2>
                                    <ul class="pro__choose__color">
                                        <li class="red"><a href="#"><i style="color:{{ $product->color->color }}" class="zmdi zmdi-circle"></i></a></li>
                                    </ul>
                                </div>
                                @if(!$product->sizes->isEmpty())
                                <div class="pro__dtl__size">
                                    <h2 class="title__5">Tamaños :</h2>
                                    <ul class="size__list">
                                    <div class="product-options">
                                        @foreach ($product->sizes as $size)
                                        <input type="radio" name="product-option" id="{{ "option-size$size->id" }}" data-qty="{{ $size->pivot->quantity }}" value="{{ $size->name }}" checked>
                                        <label class="btn btn-sm btn-default-outline changeMaxInput" data-qty="{{ $size->pivot->quantity }}" for="{{ "option-size$size->id" }}">
                                           {{ $size->name }}
                                        </label>
                                     @endforeach
                                    </div> 
                                    </ul>
                                 </div>   
                                @endif 

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
                                @if($product->stock > 0)
                                <ul class="pro__dtl__btn">
                                    <li class="buy__now__btn">
                                        <a href="javascript:void(0)" class="addCartProductDetail" data-id="{{ $product->id }}">Añadir al carrito</a>
                                    </li>
                                </ul>
                                @else
                                <h2 class="text-danger"><i class="zmdi zmdi-mood-bad"></i> Agotado</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">Descripción</a>
                            </li>
                           @csrf 
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <h2 class="title__6">Detalles</h2>
                                        <p>{{ $product->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product tab -->
@section ('scripts')
@endsection 
@endsection 