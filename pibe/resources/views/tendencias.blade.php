@extends('maestra-cliente.maestracliente')
@section('titulo', 'Tendencias - El Pibe')
@section ('centro')

 <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Blog listing</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <!--
            *** LEFT COLUMN ***
            _________________________________________________________
            -->
            <div id="blog-listing" class="col-lg-9">
              <div class="box">
                <h1>Blog category name</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
              </div>
              <!-- post-->
              <div class="post">
                <h2><a href="post.html">Fashion now</a></h2>
                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a></p>
                <hr>
                <p class="date-comments"><a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a><a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a></p>
                <div class="image"><a href="post.html"><img src="img/blog2.jpg" alt="Example blog post alt" class="img-fluid"></a></div>
                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
              </div>
              <!-- post        -->
              <div class="post">
                <h2><a href="post.html">Who is who - example blog post</a></h2>
                <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a></p>
                <hr>
                <p class="date-comments"><a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a><a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a></p>
                <div class="image"><a href="post.html"><img src="img/blog.jpg" alt="Example blog post alt" class="img-fluid"></a></div>
                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
              </div>
              <div class="pager d-flex justify-content-between">
                <div class="previous"><a href="#" class="btn btn-outline-primary">← Older</a></div>
                <div class="next disabled"><a href="#" class="btn btn-outline-secondary disabled">Newer →        </a></div>
              </div>
            </div>
            <!-- /.col-lg-9-->
            <!-- *** LEFT COLUMN END ***-->
            
            <div class="col-lg-3">
              <!--
              *** BLOG MENU ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 panel-title">Blog</h3>
                </div>
                <div class="card-body">
                  <ul class="nav flex-column nav-pills">
                    <li><a href="blog.html" class="nav-link">About us</a></li>
                    <li><a href="blog.html" class="nav-link active">Fashion</a></li>
                    <li><a href="blog.html" class="nav-link">News and gossip</a></li>
                    <li><a href="blog.html" class="nav-link">Design</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** BLOG MENU END ***-->
              <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
            </div>
          </div>
        </div>



@endsection