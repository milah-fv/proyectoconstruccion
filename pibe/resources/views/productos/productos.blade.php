@extends('maestra-cliente.maestracliente')
@section('titulo', 'El Pibe')
@section ('centro')
    
        <!-- Start Our ShopSide Area -->
        <section class="htc__shop__sidebar bg__white ptb--70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <div class="htc__shop__left__sidebar">
                            <div class="store__btn" style="margin-top:0px; margin-bottom: 30px">
                                <a href="{{ url('/productos')}}">Limpiar filtros</a>
                            </div>
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">Categorias</h4>
                                <ul class="sidebar__list">
                                  @foreach($categories as $category)
                                    <li><a href="{{ url('/productos')}}">{{ $category->name}} <span>{{ $category->products->count() }}</span></a></li>
                                    @if($loop->iteration == 8)
                                    <h2 class="text-see-more" data-toggle="collapse" data-target="#CategoriesCollapse">Ver más...</h2>
                                    <div class="collapse " id="CategoriesCollapse">
                                        @continue
                                    </div>
                                    @endif
                                  @endforeach
                                </ul>
                            </div>
                            <!-- End Product Cat -->
                            <!-- Start Color Cat -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">filtrar por color</h4>
                                <ul class="sidebar__list">
                                  @foreach($colors as $color)
                                    <li class="black">
                                      <a href="{{ url('/productos')}}">
                                        <i style="color:{{ $color->color }}" class="zmdi zmdi-circle"></i>
                                        <span>{{ $color->products->count() }}</span>
                                      </a>
                                    </li>
                                    @if($loop->iteration == 8)
                                        <h2 class="text-see-more" data-toggle="collapse" data-target="#ColorsCollapse">Ver más...</h2>
                                        <div class="collapse " id="ColorsCollapse">
                                            @continue
                                        </div>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Color Cat -->
                            <!-- Start Size Cat -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">filtrar por talla</h4>
                                <ul class="sidebar__list">
                                    @foreach($sizes as $size)
                                      <li><a href="{{ url('/productos')}}">{{ $size->name }} <span>{{ $size->products->count() }}</span></a></li>
                                       @if($loop->iteration == 8)
                                            <h2 class="text-see-more" data-toggle="collapse" data-target="#SizesCollapse">Ver más...</h2>
                                            <div class="collapse " id="SizesCollapse">
                                                @continue
                                            </div>
                                        @endif  
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Size Cat -->
                            
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 smt-30">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="producy__view__container">
                                    <!-- Start Short Form -->
                                    <div class="product__list__option">
                                        <div class="order-single-btn">
                                            <select class="select-color selectpicker">
                                              <option>Ordenar por los mas nuevos</option>
                                              <option>Actualizados</option>
                                              <option>Nombre</option>
                                              <option>Categoría</option>
                                            </select>
                                        </div>
                                        <div class="shp__pro__show">
                                            <span>Mostrando 1 - {{ $products->count() .' de '. $products->total() }} resultados</span>
                                        </div>
                                    </div>
                                    <!-- End Short Form -->
                                    <!-- Start List And Grid View -->
                                    <ul class="view__mode" role="tablist">
                                        <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                        <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                    </ul>
                                    <!-- End List And Grid View -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="shop__grid__view__wrap another-product-style">
                                <!-- Start Single View -->
                                @csrf
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                @forelse  ($products as $product)
                                    <!-- Start Single Product -->
                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="{{ url("/producto/$product->id") }}">
                                                        <img src="{{ $product->cover_image}}" alt="product images">
                                                    </a>
                                                    @if($product->state != "Simple")
                                                    <div class="{{ $product->getState() }}">
                                                      <span>{{ $product->state }}</span>
                                                    </div>
                                                    @endif
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
                                                        <!-- <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="{{ url("/producto/$product->id")}}">{{ $product->name }}</a></h2>
                                                <ul class="product__price">                                                                                                         
                                                @if ($product->old_price != null)
                                                    <li class="old__price">S/.{{ $product->old_price}}</li>
                                                    <li class="new__price">S/.{{ $product->price }}</li>
                                                @else
                                                    <li class="price">S/.{{ $product->price }}</li>
                                                @endif
                                                </ul>       
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center pt--120">
                                        <i class="cart-empty-i ti-archive" style="font-size:70px"></i> 
                                        <h2 class=" pt--20">No se Encontraron Productos</h2> 
                                    </div>
                                    <!-- End Single Product -->
                                    @endforelse
                                </div>
                                <!-- End Single View -->
                                <!-- Start Single View -->
                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                @foreach ($products as $product)
                                    <!-- Start List Content-->
                                    <div class="single__list__content clearfix">
                                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="list__thumb">
                                                <a href="{{ url("/producto/$product->id")}}">
                                                    <img src="{{$product->cover_image}}" alt="list images">
                                                </a>
                                            </div>
                                            @if($product->state != "Simple")
                                            <div class="{{ $product->getState() }}">
                                                <span>{{ $product->state }}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12">
                                            <div class="list__details__inner">
                                                <h2><a href="{{ url("/producto/$product->id")}}"">{{$product->name}}</a></h2>
                                                <p>{{ $product->description }}</p>
                                                @if ($product->old_price != null)
                                                <ul class="product__price">          
                                                  <li class="old__price">S/.{{ $product->old_price}}</li>
                                                  <li class="new__price">S/.{{ $product->price }}</li>
                                                </ul><br>                     
                                                @else
                                                <span class="product__price">S/.{{ $product->price }}</span>
                                                @endif
                                                <div class="shop__btn">
                                                @if($product->sizes->isEmpty())                                                               
                                                    <a class="htc__btn addCartProduct" data-id="{{ $product->id }}" href="javascript:void(0)"><span class="ti-shopping-cart"></span>Agregar al carrito</a>
                                                    @else
                                                        @foreach ($product->sizes as $size)
                                                            @if($size->pivot->quantity > 0)
                                                                <a class="htc__btn addCartProduct" data-size="{{ $size->name }}" data-stock="{{ $size->pivot->quantity }}"  data-id="{{ $product->id }}" href="javascript:void(0)">
                                                                    <span class="ti-shopping-cart"></span>Agregar al carrito
                                                                </a>
                                                                @break($loop->iteration >= 1)
                                                            @endif
                                                        @endforeach
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End List Content-->
                                @endforeach 
                                </div>
                                <!-- End Single View -->
                                <!-- Start Single Pagination -->
                                {{ $products->links('productos.pagination.pagination') }}
                                {{--

                                <ul class="wn__pagination">
                                  <li class="active"><a href="#">1</a></li>
                                  <li><a href="#">{{ $products->links() }}</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">...</a></li>
                                  <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                    </ul>
                                --}}
                                
                                <!-- End Single Pagination -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our ShopSide Area -->



@section ('scripts')

@endsection
@endsection