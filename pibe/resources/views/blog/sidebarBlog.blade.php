     <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="classblod-details-right-sidebar">
                            <!-- <div class="category-search-area">
                                <input placeholder="Search......" type="text">
                                <a class="srch-btn" href="#"><i class="zmdi zmdi-search"></i></a>    
                            </div> -->
                            <!-- Start Category Area -->

                            <div class="our-category-area mt--60">
                                <h2 class="section-title-2">Categorias</h2>
                                <ul class="categore-menu">
                                @foreach ($categories as $categoria)
                                    <li><a href="{{route('category', $categoria->slug)}}"><i class="zmdi zmdi-caret-right"></i>{{$categoria->name}}</a></li>
                                    @if($loop->iteration == 8)
                                    <div class="collapse " id="CategoriesCollapse">
                                      @continue
                                    </div>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                            <!-- End Category Area -->
                            
                            <!-- Start Tag -->
                            <div class="our-blog-tag">
                                <h2 class="section-title-2">Etiquetas</h2>
                                <ul class="tag-menu mt-40">
                                    @foreach($tags as $tag)
                                    <li><a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <!-- End Tag -->
                        </div>
                    </div>