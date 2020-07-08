@extends('maestra-cliente.maestracliente')
@section('titulo', 'Blog - El Pibe')
@section('coupon')
@include('coupon')
@endsection
@section ('centro')
  @parent
                    <div class="row ptb--20">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Blog del Bebé</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ url('/') }}">Inicio</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Blog del Bebé</span>
                                  
                                </nav>
                            </div>
                        </div>
                    </div>

               <!-- Start BLog Area -->
        <div class="htc__blog__area bg__white ptb--30">
            <div class="container">@include('blog.sidebarBlog')
                <div class="row">
                
                    <div class="blog__wrap blog--page clearfix ptb--100">
                        @if ($posts->count() >0)
                        @foreach ($posts as $post)
                        
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="{{route('post', $post->slug)}}">
                                            @if ($post->image)
                                            <img src="{{asset("$post->image")}}" alt="blog images">
                                            @endif
                                        </a>
                                       <!--  <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="{{route('post', $post->slug)}}">{{ $post->name }}</a></p>
                                            <ul class="bl__meta">
                                                <li>Por : {{ $post->user->name }}</li>
                                                <li><a href="#">{{ $post->blog_category->name }}</a></li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="{{route('post', $post->slug)}}">Leer mas</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        
                        @endforeach


                    </div>
                </div>
                <!-- Start Load More BTn -->
               {{ $posts->links('productos.pagination.pagination') }}
                <!-- End Load More BTn -->
                @else
                   
                    <div class="text-center pt--100">
                        <i class="cart-empty-i ti-face-sad" style="font-size:70px"></i> 
                        <h2 class=" pt--20">No se Encontraron Resultados</h2> 
                   </div>
                @endif
            </div>
        </div>
        <!-- End BLog Area -->

 
 @endsection