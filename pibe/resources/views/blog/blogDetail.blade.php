@extends('maestra-cliente.maestracliente')
@section('titulo', 'Blog - El Pibe')
@section ('centro')

                    <div class="row ptb--30">
                        <div class="col-xs-12">
                           <!--  <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Blog de Tendencias</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ url('/') }}">Inicio</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Blog de Tendencias</span>
                                  <span class="brd-separetor">/</span>
                                </nav>
                            </div> -->
                        </div>
                    </div>

        <!-- Start Our Blog Area -->
        <section class="blog-details-wrap ptb--10 bg__white">
            <div class="container">
                <div class="row">
                    
                @include('blog.sidebarBlog')


                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="blog-details-left-sidebar mrg-blog">
                            <div class="blog-details-top">
                                <!--Start Blog Thumb -->
                                <div class="blog-details-thumb-wrap">
                                    <div class="blog-details-thumb">
                                    @if ($post->image)
                                        <img src="{{ asset("$post->image")}}" alt="blog images">
                                    @endif
                                    </div>
                                    <div class="upcoming-date">
                                        14<span class="upc-mth">Sep,2018</span>
                                    </div>
                                </div>
                                <!--End Blog Thumb -->
                                <h2>{{$post->name}}</h2>
                                <div class="blog-admin-and-comment">
                                    <p>Por : <a href="#">{{ $post->user->name." ".$post->user->last_name}}</a></p>
                                    <p class="separator">|</p>
                                    <!-- <p>3 COMMENTS</p> -->
                                </div>
                                <!-- Start Blog Pra -->
                                <div class="blog-details-pra">
                                    {!! $post->body !!}
                                </div><br> <hr><br>
                                <!-- End Blog Pra -->
                                <!-- Start Blog Tags -->
                                <div class="postandshare ">
                                    <div class="post">
                                        <p>Etiquetas :</p>
                                    </div>
                                    <div class="blog-social-icon">
                                        <ul>
                                            @foreach($post->tags as $tag)
                                                <li><a href="#">{{$tag->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div> <br><br>
                                <!-- End Blog Tags -->
                                <!-- Start Blog Comment Area -->
                               
                                <!-- Start Reply Form -->
                                <!-- <div class="our-reply-form-area mt--20">
                                    <h2 class="section-title-2">LEAVE A REPLY</h2>
                                    <div class="reply-form-inner mt--40">
                                        <div class="reply-form-box">
                                            <div class="reply-form-box-inner">
                                                <div class="rfb-single-input">
                                                    <input type="text" placeholder="Name*">
                                                </div>
                                                <div class="rfb-single-input">
                                                    <input type="email" placeholder="Email*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reply-form-box">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="blog__details__btn">
                                            <a class="htc__btn btn--gray" href="#">submit</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- End Reply Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Blog Area -->  


 
 @endsection