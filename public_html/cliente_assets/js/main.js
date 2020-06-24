/*-----------------------------------------------------------------------------------

  Template Name: Tmart-Minimalist eCommerce HTML5 Template.
  Template URI: #
  Description: Tmart is a unique website template designed in HTML with a simple & beautiful look. There is an excellent solution for creating clean, wonderful and trending material design corporate, corporate any other purposes websites.
  Author: Theme365
  Version: 1.0

-----------------------------------------------------------------------------------*/

/*-------------------------------
[  Table of contents  ]
---------------------------------
  01. jQuery MeanMenu
  02. wow js active
  03. Portfolio  Masonry (width)
  04. Sticky Header
  05. ScrollUp
  06. Tooltip
  07. ScrollReveal Js Init
  08. Fixed Footer bottom script ( Newsletter )
  09. Search Bar
  10. Toogle Menu
  11. Shopping Cart Area
  12. Filter Area
  13. User Menu
  14. Overlay Close
  15. Home Slider 
  16. Popular Product Wrap
  17. Testimonial Wrap
  18. Magnific Popup  
  19. Price Slider Active
  20.  Plus Minus Button
  21. jQuery scroll Nav

  

/*--------------------------------
[ End table content ]
-----------------------------------*/


(function($) {
    'use strict';


/*-------------------------------------------
  01. jQuery MeanMenu
--------------------------------------------- */
    
$('.mobile-menu nav').meanmenu({
    meanMenuContainer: '.mobile-menu-area',
    meanScreenWidth: "991",
    meanRevealPosition: "right",
});

/*-------------------------------------------
  02. wow js active
--------------------------------------------- */
  new WOW().init();
    
    
/*-------------------------------------------
  03. Product  Masonry (width)
--------------------------------------------- */ 
$('.htc__product__container').imagesLoaded( function() {
  
    // filter items on button click
    $('.product__menu').on( 'click', 'button', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    }); 
    // init Isotope
    var $grid = $('.product__list').isotope({
      itemSelector: '.single__pro',
      percentPosition: true,
      transitionDuration: '0.7s',
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: '.single__pro',
      }
    });

});

$('.product__menu button').on('click', function(event) {
    $(this).siblings('.is-checked').removeClass('is-checked');
    $(this).addClass('is-checked');
    event.preventDefault();
});



/*-------------------------------------------
  04. Sticky Header
--------------------------------------------- */ 
  var win = $(window);
  var sticky_id = $("#sticky-header-with-topbar");
  win.on('scroll',function() {    
    var scroll = win.scrollTop();
    if (scroll < 245) {
      sticky_id.removeClass("scroll-header");
    }else{
      sticky_id.addClass("scroll-header");
    }
  });
    
    
/*--------------------------
  05. ScrollUp
---------------------------- */
$.scrollUp({
    scrollText: '<i class="zmdi zmdi-chevron-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});
    
    
/*---------------------------
  06. Tooltip
------------------------------*/    
$('[data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'top',
    container: 'body'
});
    
    
/*-----------------------------------
  07. ScrollReveal Js Init
-------------------------------------- */
    window.sr = ScrollReveal({ duration: 800 , reset: true });
    sr.reveal('.foo');
    sr.reveal('.bar');
    
    
/*-------------------------------------------------------
  08. Fixed Footer bottom script ( Newsletter )
--------------------------------------------------------*/

var $newsletter_height = $(".htc__foooter__area");
$('.fixed__footer').css({'margin-bottom': $newsletter_height.height() + 'px'});


/*------------------------------------    
  09. Search Bar
--------------------------------------*/ 
    
  $( '.search__open' ).on( 'click', function () {
    $( 'body' ).toggleClass( 'search__box__show__hide' );
    return false;
  });

  $( '.search__close__btn .search__close__btn_icon' ).on( 'click', function () {
    $( 'body' ).toggleClass( 'search__box__show__hide' );
    return false;
  });
    
    
/*------------------------------------    
  10. Toogle Menu
--------------------------------------*/
  $('.toggle__menu').on('click', function() {
    $('.offsetmenu').addClass('offsetmenu__on');
    $('.body__overlay').addClass('is-visible');

  });

  $('.offsetmenu__close__btn').on('click', function() {
      $('.offsetmenu').removeClass('offsetmenu__on');
      $('.body__overlay').removeClass('is-visible');
  });

/*------------------------------------    
  11. Shopping Cart Area
--------------------------------------*/

  $('.cart__menu').on('click', function() {
    $('.shopping__cart').addClass('shopping__cart__on');
    $('.body__overlay').addClass('is-visible');

  });

  $('.offsetmenu__close__btn').on('click', function() {
      $('.shopping__cart').removeClass('shopping__cart__on');
      $('.body__overlay').removeClass('is-visible');
  });


/*------------------------------------    
  12. Filter Area
--------------------------------------*/

  $('.filter__menu').on('click', function() {
    $('.filter__wrap').addClass('filter__menu__on');
    $('.body__overlay').addClass('is-visible');

  });

  $('.filter__menu__close__btn').on('click', function() {
      $('.filter__wrap').removeClass('filter__menu__on');
      $('.body__overlay').removeClass('is-visible');
  });
    
    
/*------------------------------------    
  13. User Menu
--------------------------------------*/

  $('.user__menu').on('click', function() {
    $('.user__meta').addClass('user__meta__on');
    $('.body__overlay').addClass('is-visible');

  });
    
  $('.offsetmenu__close__btn').on('click', function() {
      $('.user__meta').removeClass('user__meta__on');
      $('.body__overlay').removeClass('is-visible');
  });



/*------------------------------------    
  14. Overlay Close
--------------------------------------*/
  $('.body__overlay').on('click', function() {
    $(this).removeClass('is-visible');
    $('.offsetmenu').removeClass('offsetmenu__on');
    $('.shopping__cart').removeClass('shopping__cart__on');
    $('.filter__wrap').removeClass('filter__menu__on');
    $('.user__meta').removeClass('user__meta__on');
  });

    
/*-----------------------------------------------
  15. Home Slider
-------------------------------------------------*/
  if ($('.slider__activation__wrap').length) {
    $('.slider__activation__wrap').owlCarousel({
      loop: true,
      margin:0,
      nav:true,
      autoplay: true,
      navText: [ '<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
      autoplayTimeout: 4000,
      items:1,
      dots: false,
      lazyLoad: true,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:1
        },
        800:{
          items:1
        },
        1024:{
          items:1
        },
        1200:{
          items:1
        },
        1400:{
          items:1
        },
        1920:{
          items:1
        }
      }
    });
  }

/*-----------------------------------------------
  16. Popular Product Wrap
-------------------------------------------------*/
  $('.popular__product__wrap').owlCarousel({
      loop: true,
      margin:0,
      nav:true,
      autoplay: false,
      navText: [ '<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
      autoplayTimeout: 10000,
      items:3,
      dots: false,
      lazyLoad: true,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:2
        },
        800:{
          items:2
        },
        1024:{
          items:3
        },
        1200:{
          items:3
        },
        1400:{
          items:3
        },
        1920:{
          items:3
        }
      }
    });
    
    
/*-----------------------------------------------
  17.  product-slider-active
-------------------------------------------------*/
  $('.single-portfolio-slider').owlCarousel({
      loop: true,
      nav:true,
      navText: [ '<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
      items:1,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:1
        },
        800:{
          items:1
        },
        1024:{
          items:1
        },
        1200:{
          items:1
        },
        1400:{
          items:1
        },
        1920:{
          items:1
        }
      }
    });


/*-----------------------------------------------
  17.  product-slider-active
-------------------------------------------------*/


  $('.product-slider-active').owlCarousel({
      loop: true,
      margin:0,
      nav:true,
      navText: [ '<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
      items:3,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:2
        },
        800:{
          items:2
        },
        1024:{
          items:3
        },
        1200:{
          items:3
        },
        1400:{
          items:3
        },
        1920:{
          items:3
        }
      }
    });


/*-----------------------------------------------
  17.  product-details-slider
-------------------------------------------------*/


  $('.product-details-slider').owlCarousel({
      loop: true,
      margin:20,
      nav:true,
      navText: [ '<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
      items:3,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:2
        },
        800:{
          items:2
        },
        1024:{
          items:3
        },
        1200:{
          items:3
        },
        1400:{
          items:3
        },
        1920:{
          items:3
        }
      }
    });


/*-----------------------------------------------
  18.  portfolio-slider-active
-------------------------------------------------*/


  $('.portfolio-slider-active').owlCarousel({
      loop: true,
      dotsEach: 1,
      nav:false,
      items:3,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:2
        },
        800:{
          items:2
        },
        1024:{
          items:3
        },
        1200:{
          items:3
        },
        1400:{
          items:3
        },
        1920:{
          items:3
        }
      }
    });



/*-----------------------------------------------
  17. Testimonial Wrap
-------------------------------------------------*/


  $('.testimonial__wrap').owlCarousel({
      loop: true,
      margin:0,
      nav:false,
      autoplay: false,
      navText: false,
      autoplayTimeout: 10000,
      items:1,
      dots: false,
      lazyLoad: true,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:1
        },
        800:{
          items:1
        },
        1024:{
          items:1
        },
        1200:{
          items:1
        },
        1400:{
          items:1
        },
        1920:{
          items:1
        }
      }
    });




/*--------------------------------
  18. Magnific Popup
----------------------------------*/

$('.video-popup').magnificPopup({
  type: 'iframe',
  mainClass: 'mfp-fade',
  removalDelay: 160,
  preloader: false,
  zoom: {
      enabled: true,
  }
});

$('.image-popup').magnificPopup({
  type: 'image',
  mainClass: 'mfp-fade',
  removalDelay: 100,
  gallery:{
      enabled:true, 
  }
});


/*-------------------------------
  19. Price Slider Active
--------------------------------*/
var maxPrice = $('#maxPriceProduct').text();
  $("#slider-range").slider({
    range: true,
    min: 1,
    max: maxPrice,
    values: [$('#min_price_search').val() ,$('#max_price_search').val()],
    slide: function(event, ui) 
    {
      $("#amount").val("S/." + ui.values[0] + " - S/." + ui.values[1]);
      $('#min_price_search').val(ui.values[0]);
      $('#max_price_search').val(ui.values[1]); 
      var mi = ui.values[0];
      var mx = ui.values[1];
      //filterSystem(mi, mx);
    }
  });
  $("#amount").val("S/." + $("#slider-range").slider("values", 0) +
      " - S/." + $("#slider-range").slider("values", 1));

  function filterSystem(minPrice, maxPrice)
   {
        $("#grid-view div.system").hide().filter(function() {
            var price = parseInt($(this).data("price"), 10);
            console.log(price);
            return price >= minPrice && price <= maxPrice;
        }).show();
    }
/*-------------------------------
  20.  Plus Minus Button 
--------------------------------*/

    $(".cart-plus-minus").append('<div class="dec qtybutton">-</i></div><div class="inc qtybutton">+</div>');

    $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });


/*--------------------------
  21. jQuery scroll Nav
---------------------------- */
    $('.onepage--menu').onePageNav({
        scrollOffset: 0
    }); 



/*---------------------
    countdown
  --------------------- */
    $('[data-countdown]').each(function() {
    var $this = $(this), finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
    $this.html(event.strftime('<span class="cdown day">%-D <p>Days</p></span> <span class="cdown hour">%-H <p>Hour</p></span> <span class="cdown minutes">%M <p>Min</p></span class="cdown second"> <span>%S <p>Sec</p></span>'));
    });
    });    
    
    
/* isotop active */
    var $grid = $('.grid');
    var $gridJustified = $('.grid-justified');
    var $gridItems = '.grid-item';
    // filter items on button click
    $grid.imagesLoaded(function() {
        
        $('.portfolio-menu-active').on('click', 'button', function() {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        
        // init Isotope
        $grid.isotope({
            itemSelector: $gridItems,
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: $gridItems,
            }
        });
        
        // init Isotope
        $gridJustified.isotope({
            itemSelector: $gridItems,
            percentPosition: true,
            layoutMode: 'fitRows',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: 1,
            }
        });
    });
    
    
    /*--
    Magnific Popup
    ------------------------*/
    $('.img-poppu').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });
    
    
    $('.sidebar-active').stickySidebar({
        topSpacing: 80,
        bottomSpacing: 30,
        minWidth: 767,
    });
    var $window = $(window);
    // Preloader Active Code
    $window.on('load', function () 
    {
      $('#preloader').fadeOut('slow', function () 
      {
        $(this).remove();
      });
    });

/*--------------------------
  23. See More Colors
---------------------------- */
if($('.list_shop_color').find('#ColorsCollapse').length >0 )
{
  $('.list_shop_color').append('<h2 class="text-see-more" id="ColorsCollapseh2" data-toggle="collapse" data-target="#ColorsCollapse">Ver más</h2>');
  $("#ColorsCollapse").on("hide.bs.collapse", function()
  {
    $("#ColorsCollapseh2").text('Ver más');
  });

  $("#ColorsCollapse").on("show.bs.collapse", function()
  {
    $("#ColorsCollapseh2").text('Ver menos');
  });
}
/*--------------------------
  23. See More Size
---------------------------- */
if($('.list_shop_size').find('#SizesCollapse').length >0 )
{
  $('.list_shop_size').append('<h2 class="text-see-more" id="SizesCollapseh2" data-toggle="collapse" data-target="#SizesCollapse">Ver más</h2>');
  $("#SizesCollapse").on("hide.bs.collapse", function()
  {
    $("#SizesCollapseh2").text('Ver más');
  });

  $("#SizesCollapse").on("show.bs.collapse", function()
  {
    $("#SizesCollapseh2").text('Ver menos');
  });
}

/*--------------------------
  23. See More Categories
---------------------------- */
if($('.list_shop_category').find('#CategoriesCollapse').length >0 )
{
  $('.list_shop_category').append('<h2 class="text-see-more" id="CategoriesCollapseh2" data-toggle="collapse" data-target="#CategoriesCollapse">Ver más</h2>');
  $("#CategoriesCollapse").on("hide.bs.collapse", function()
  {
    $("#CategoriesCollapseh2").text('Ver más');
  });

  $("#CategoriesCollapse").on("show.bs.collapse", function()
  {
    $("#CategoriesCollapseh2").text('Ver menos');
  });
}


    
})(jQuery);


$(document).ready(function() 
{
  $("[type='number']").keypress(function (evt) {
    evt.preventDefault();
  });
  $("[type='number']").keydown(function(e) {
    var elid = $(document.activeElement).hasClass('textInput');
    if (e.keyCode === 8 && !elid) {
        return false;
    };
});

  var product = $('.product-options').find('input[type=radio]:checked').data('qty');
  $('#product-quantity-get').attr('max',product).val(1);
  
});

$(document).on('click','.changeMaxInput',function(){
  var qty =  $(this).data('qty');
  $('#product-quantity-get').attr('max',qty).val(1);
});


/*==================================
[ Show Product Ajax ]
===================================*/
$(document).on('click','.showProduct',function(e)  
{
  var id = $(this).data('id');
  $('#shop-list-modal').empty();
  $('.select__size').addClass('hidden');
  var spanLoad = $(this).find('span');
  var classAddCart = $(this);
  var qty = $('#product-quantity-get').val(1);

  $.ajax({
      type: 'get',
      url: '/mostrarproducto/'+ id,
      data: $('input[name=_token]').val(),
      beforeSend: function() {
      spanLoad.removeClass('ti-shopping-cart').addClass('three-quarters-loader');
      classAddCart.removeClass('showProduct');
      },

    success: function(data) 
    {
      spanLoad.removeClass('three-quarters-loader').addClass('ti-shopping-cart');
      classAddCart.addClass('showProduct');

      $('.modal-product-title').text(data.name);
      $('.modal-product-price').text('S/.'+data.price);
      $('.modal-product-description').text(data.features);
      $('.modal-color').css("background-color", data.color.color);
      $('#modal-product-cover').attr('src', data.cover_image);
      $('.modal-add-product').attr('data-id',data.id);
      $('#product-quantity-get').attr('max',data.stock);


      if(data.old_price != null)
      {
        $('.modal-product-old-price').text('S/.' + data.old_price);
      }
      if(data.stock <= 0)
      {
        $('.modal-add-product').addClass('hidden');
        $('.sold-out').removeClass('hidden');              
      }
      else
      {
        $('.modal-add-product').removeClass('hidden');
        $('.sold-out').addClass('hidden');       
      }
      
      if(data.sizes.length > 0) 
      {
        $('.select__size').removeClass('hidden');
          $.each( data.sizes, function( key, size ) {
                
          $('#shop-list-modal').append('<input type="radio" name="product-option" id="option-size'+ size.id +'" data-qty="'+size.pivot.quantity+'" value="'+ size.name +'" checked>\
          <label class="btn btn-sm btn-default-outline changeMaxInput" data-qty="'+size.pivot.quantity+'" for="option-size'+ size.id +'">'+ size.name +'</label>');

          
          });
      }
          $("#productModal").modal('show');    
    },
    error: function(data) 
    {
      console.log(data);
    },
    });
});

$('#productModal').on('hidden.bs.modal', function (e) 
{
    $('#shop-list-modal').empty();
});


/*-----------------------------------------------
   Add Cart Ajax
-------------------------------------------------*/

$(document).on('click','.addCartProduct',function()  
{
  var id = $(this).data('id');
  var sizeName =  $(this).data('size');
  var stockSize = $(this).data('stock');
  var spanLoad = $(this).find('span');
  var classAddCart = $(this);

    $.ajax({
    type: 'post',
    url: '/carrito',
    data: 
    {
      '_token': $('input[name=_token]').val(),
      'id': id,
      'size': sizeName,
      'stockSize':stockSize,
    },

    beforeSend: function() 
    {
      spanLoad.removeClass('ti-shopping-cart').addClass('three-quarters-loader');
      classAddCart.removeClass('addCartProduct');
    },

    success: function(data) 
    {
      spanLoad.removeClass('three-quarters-loader').addClass('ti-shopping-cart');
      classAddCart.addClass('addCartProduct');
      $('.total__price').text('S/.' + data.total);
      
      if($('.shp__cart__wrap').find('.shp__single__product').length <= 0)
      {
        $('.shp__cart__wrap').removeClass('hidden');
        $('.shoping__total').removeClass('hidden');
        $('.shopping__btn').removeClass('hidden');
        $('.cart-empty').addClass('hidden');

        add_modal_item(data.cart.rowId,data.cart.options.url_id,data.cart.options.img,data.cart.name,data.cart.qty,data.cart.price,data.cart.options.size);
      }
      else
      {
        if($('.shp__cart__wrap').find('#' + data.cart.rowId).length > 0)
        {
          $('#' + data.cart.rowId).find('.quantity').text('Cantidad: '+ data.cart.qty);
        }
        
        else
        {
          add_modal_item(data.cart.rowId,data.cart.options.url_id,data.cart.options.img,data.cart.name,data.cart.qty,data.cart.price,data.cart.options.size);
        }
          }
    
      notificacion_flotante_pibe(data.cart.name,' Se agrego al carrito.',data.cart.options.img, '', 200);
    },
    error: function(data) 
    {
      spanLoad.removeClass('three-quarters-loader').addClass('ti-shopping-cart');
      classAddCart.addClass('addCartProduct');

      notificacion_flotante_pibe('Error', data.responseJSON.message);

    },
    });
});

/*==================================================================
  [ DELETE ITEMS IN SHOPPING CART ]*/

$(document).on('click','#DeleteProductCart',function() 
{
  var id = $(this).data('id');
  var spanLoad = $(this).find('i');
  var deleteA = $(this);

  $.ajax({
    type: 'delete',
    url: '/carrito/'+ id,
    data: 
    {
      '_token': $('input[name=_token]').val(),
    },
    beforeSend: function() 
    {
      spanLoad.removeClass('zmdi zmdi-close').addClass('three-quarters-loader');
      deleteA.attr("id","");
    },
    success: function(data) 
    {
      if($('#amount_shipping').data('val') != null)
      {
        var shipping = $('#amount_shipping').data('val').toFixed(2);
        var total = parseFloat(data.replace(/,/g, '')).toFixed(2);
        if($("#check_shipping").is(':checked')) 
        { 
          pTotal = parseFloat(shipping) + parseFloat(total);
          $('.cart_total_val').text('S/.'+ pTotal.toFixed(2));
          $('#total_price_cart').text('S/.'+ pTotal.toFixed(2));
        }
        else 
        {  
          $('.cart_total_val').text('S/.'+ total);
          $('#total_price_cart').text('S/.'+ total);
        } 

      }
      else
      {
        $('#total_price_cart').text('S/.'+ data);
      }
  

      $('.cart_total_val').attr('data-val', data);
      if(data <= 0)
      {
        $('.cart-form').addClass('hidden');
        $('.cart-empty').removeClass('hidden');

        $('.shp__cart__wrap').addClass('hidden');
        $('.shoping__total').addClass('hidden');
        $('.shopping__btn').addClass('hidden');

      }
      $('#' + id).remove();
      $('#trProductCart'+ id).remove();
      $('.cart_subtotal_val').text(data);
      //$('.cart_total_val').text(data);
    },
    error: function(data) 
    {
      spanLoad.removeClass('three-quarters-loader').addClass('zmdi zmdi-close');
      deleteA.attr("id","DeleteProductCart");
    },

    });
});

  /*==================================================================
  [ Add Cart Product Ajax ]*/

$(document).on('click','.addCartProductDetail',function(e)  
{
  var id = $(this).attr("data-id");
  var qty = $('#product-quantity-get').val();
  var sizeName =  $('.product-options').find('input[type=radio]:checked').val();
  var stockSize = $('.product-options').find('input[type=radio]:checked').data('qty');
  var textBtnAdd = $(this);
  
    $.ajax({
    type: 'post',
    url: '/carrito',
    data: 
    {
      '_token': $('input[name=_token]').val(),
      'id': id,
      'qty': qty,
      'size':sizeName,
      'stockSize':stockSize,
    },
    beforeSend: function() 
    {
      textBtnAdd.text('Cargando...');
    },
    success: function(data) 
    {
          textBtnAdd.text('Añadir al carrito');

          $('.total__price').text('S/.' + data.total);
      
      if($('.shp__cart__wrap').find('.shp__single__product').length <= 0)
      {
        $('.shp__cart__wrap').removeClass('hidden');
        $('.shoping__total').removeClass('hidden');
        $('.shopping__btn').removeClass('hidden');
        $('.cart-empty').addClass('hidden');

        add_modal_item(data.cart.rowId,data.cart.options.url_id,data.cart.options.img,data.cart.name,data.cart.qty,data.cart.price,data.cart.options.size);
        
      }
      else
      {
        if($('.shp__cart__wrap').find('#' + data.cart.rowId).length > 0)
        {
          $('#' + data.cart.rowId).find('.quantity').text('Cantidad: '+ data.cart.qty);
        }
        else
        {
          add_modal_item(data.cart.rowId,data.cart.options.url_id,data.cart.options.img,data.cart.name,data.cart.qty,data.cart.price,data.cart.options.size);
        }
      
      }
      
      notificacion_flotante_pibe(data.cart.name,'Se agrego correctamente al carrito.',data.cart.options.img);
  
    },
    error: function(data) 
    {
      textBtnAdd.text('Añadir al carrito');

      notificacion_flotante_pibe('Error', data.responseJSON.message);
    },

    });
});

/*==================================================================
[ +/- num product ]*/

$(document).on('click','.btn-num-product-down', function(e)
{
  e.preventDefault();
  var numProduct = Number($(this).parent().find("input[type=number]").val());
  var min = Number($(this).parent().find("input[type=number]").attr('min'));
  if (numProduct <= min) {
    var newVal = numProduct;
  } else {
    var newVal = numProduct - 1;
  }
  $(this).parent().find("input[type=number]").val(newVal);
});

$('.btn-num-product-up').on('click', function(e)
{
  e.preventDefault();
  var numProduct = Number($(this).prev().val());
  var max = $(this).prev().attr('max');
  
  if (numProduct >= max) 
  {
    var newVal = numProduct;
  } 
  else 
  {
    var newVal = numProduct + 1;
  }

  if(numProduct == max)
  {
    notificacion_flotante_pibe('Aviso', 'Cantidad maxima.','','danger',200);
  }

  $(this).prev().val(newVal);
});

/*==================================================================
[ Notificacion Flotante ]*/

function notificacion_flotante_pibe(title,message,image,type,delay) 
{
  if(type)
  {
    return $.notify({
      // options
      message: message 
    },{
      // settings
      type: type,
      delay: delay = null ? 10000:delay,
      z_index: 99998,
      animate: 
      {
        enter: 'animated slideInRight',
        exit: 'animated slideOutRight'
      }
    });
  }

  else
  {
    return $.notify({
      icon: image,
      title: title,
      message: message,
      },
      {
      type: 'minimalist',
      delay: 2000,
      z_index: 99998,
      icon_type: 'image',
      template: '<div data-notify="container-fluid"  class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
          '<img data-notify="icon" class="pull-left">' +
          '<div class="notify_content" ">'+
            '<span data-notify="title">{1}</span>' +
            '<span data-notify="message">{2}</span> <br>' +
            '<a data-notify="message" class="htc__btn addCartProduct "  " href="/carrito"><span class="ti-shopping-cart"> </span>Ver carrito</a>' +
          '</div>'+
      '</div>',
      animate: 
      {
        enter: 'animated slideInRight',
        exit: 'animated slideOutRight'
      }
    });
  }
  
}

/*==================================================================
[ Add modal items ]*/

function add_modal_item(id,url_id,img,name,qty,price,size) 
{
  if ( size === null)
  {
    var size_product = ' hidden';   
    
    
  }
  else
  {
    var size_product = '';  
  }

  $('.shp__cart__wrap').append('<div class="shp__single__product" id="'+ id +'">\
    <div class="shp__pro__thumb">\
      <a href="'+ url_id +'">\
        <img src="'+img+'" alt="product images">\
      </a>\
    </div>\
    <div class="shp__pro__details">\
      <h2><a href="'+ url_id +'">'+ name +'</a></h2>\
      <span class="quantity">Cantidad: '+ qty +'</span>\
      <br><span class="Size'+ size_product + '">Tamaño: '+ size +'</span>\
      <span class="shp__price">S/.'+ price +'</span>\
    </div>\
    <div class="remove__btn">\
      <a href="javascript:void(0)" id="DeleteProductCart" data-id="'+ id+'"><i class="zmdi zmdi-close"></i></a>\
    </div>\
  </div>');
  
}
function add_person_modal_item(data) 
{
  if (data.cart.options.size == null)
  {
    var size_product = ' hidden';           
  }
  else
  {
    var size_product = '';  
  }

  $('.shp__cart__wrap').append('<div class="shp__single__product" id="'+ data.cart.rowId +'">\
    <div class="shp__pro__thumb">\
      <img src="'+data.cart.options.screenshot +'" alt="product images">\
    </div>\
    <div class="shp__pro__details">\
      <h2>'+ data.cart.name  +'</h2>\
      <span class="quantity">Cantidad: '+ data.cart.qty +'</span>\
      <br><span class="Size'+ size_product + '">Tamaño: '+ data.cart.options.size  +'</span>\
      <span class="shp__price">S/.'+ data.cart.price +'</span>\
    </div>\
    <div class="remove__btn">\
      <a href="javascript:void(0)" id="DeleteProductCart" data-id="'+ data.cart.rowId +'"><i class="zmdi zmdi-close"></i></a>\
    </div>\
  </div>'); 
}


/*==================================================================
  [ Input Maeterial ]*/

$(".floating-labels .form-control").on("focus blur", function(e) 
{
  $(this).parents(".form-group").toggleClass("focused", "focus" === e.type || this.value.length > 0);

}).trigger("blur"), $(function() 
{
  for (var url = window.location, element = $("ul#sidebarnav a").filter(function() 
  {
    return this.href == url;
  }).addClass("active").parent().addClass("active"); ;) 
  {
    if (!element.is("li")) break;
    element = element.parent().addClass("in").parent().addClass("active");
  }
});

/* VALIDACION */
$(document).ready(function() 
{
  $('#payment_end').validate({
    rules:
    {
      term_condition:
      {
        required:true,
      },
      department: 
      {
        required:       
        function(element)
        {
          return !$('#shop').is(':checked');
        },
        text: false,

      },
      province:
      {
        required: 
        function(element)
        {
          return !$('#shop').is(':checked');
        },
        text: false,
      },
      address:
      {
        required:
        function(element)
        {
          return !$('#shop').is(':checked');
        },
        text: false,
      },
      referenceAddress:
      {
        required:
        function(element)
        {
          return !$('#shop').is(':checked');
        },
        text: false,
      },
      order_name:
      {
        required: 
        function(element)
        {
          return $("#person").is(':checked');
        },
        text:
        function(element)
        {
          return $("#person").is(':checked');
        },
      },
      order_paternal_surname:
      {
        required:     
        function(element)
        {
          return $("#person").is(':checked');
        },
        text:       
        function(element)
        {
          return $("#person").is(':checked');
        },
      },
     
      order_num_document:
      {
        required:     
        function(element)
        {
          return $("#person").is(':checked');
        },
        number:     
        function(element)
        {
          return $("#person").is(':checked');
        },
        text: false,
        maxlength: 
        function(element)
        {
          if( $("#person").is(':checked'))
          {
            return  8;                      
          }
        },
        minlength: 
        function(element)
        {
          if( $("#person").is(':checked'))
          {
            return  8;                      
          }
        }
      },
      invoice_razon_social:
      {
        required:     
        function(element)
        {
          return $("#factura").is(':checked');
        },
        text:       
        function(element)
        {
          return $("#factura").is(':checked');
        },
      },
      invoice_ruc:
      {
        required:     
        function(element)
        {
          return $("#factura").is(':checked');
        },
        number:     
        function(element)
        {
          return $("#factura").is(':checked');
        },
        text: false,
        maxlength: 
        function(element)
        {
          if( $("#factura").is(':checked'))
          {
            return  11;                      
          }
        },
        minlength: 
        function(element)
        {
          if( $("#factura").is(':checked'))
          {
            return  11;                      
          }
        }
      },
    }
  });

  $('.form_complete_data_account').validate({
    rules:
    {
      name:
      {
        required:true,
        text:true,
        minlength: 3,
        maxlength: 150,
      },
      last_name:
      {
        required:true,
        text:true,
        minlength: 3,
        maxlength: 150,
      },
      email:
      {
        required:true,
        text:true,
        minlength: 3,
        maxlength: 150,
      },
      dni:
      {
        required:true,
        number:true,
        text:false,
        maxlength: 8,
        minlength:8,
        // function(element)
        // {
        //   return  $("#Selecttype_document option:selected").data('length');                      
        // },
        // minlength: 
        // function(element)
        // {
  
        //   return  $("#Selecttype_document option:selected").data('length');                     
        // }
      },
      celphone:
      {
        required:true,
        number:true,
        text:false,
        minlength:9,
        maxlength:9
      },
      phone:
      {
        
        text:false,
        
        maxlength:20
      }
    }
  });
});

jQuery.validator.addMethod("text",function(value, element) 
{
  return /[A-Za-z \u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/.test(value);
},"Solo texto, por favor");

jQuery.validator.addMethod("number",function(value, element) 
{
    return /[0-9-]+$/.test(value);
},
   "Solo numeros, por favor"
);
/* VALID FORMS */
jQuery.validator.setDefaults({
  highlight: function(element, errorClass, validClass) 
  {
    if ($(element).closest('.input-group').length > 0) 
    {
      $(element).closest('.form-group').removeClass('has-error').addClass('has-error');
    } 
    else 
    {
      if (element.type === "radio") 
      {
        this.findByName(element.name).addClass(errorClass).removeClass(validClass);
      } 
      else 
      {
        $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        if ($(element).closest('form').hasClass('form-horizontal')) 
        {
          $(element).closest('.form-group > div[class^="col"]').find('i.fa').remove();
          $(element).closest('.form-group > div[class^="col"]').append('<i class="ti-close fa-lg form-control-feedback"></i>');
        } 
        else 
        {
          $(element).closest('.form-group').find('i.ti-check').remove();
          $(element).closest('.form-group').append('<i class="ti-close fa-lg form-control-feedback"></i>');
        }
      }
      }
    },
  unhighlight: function(element, errorClass, validClass) 
  {
    if ($(element).closest('.input-group').length > 0) 
    {
      $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    } 
    else
     {
      if (element.type === "radio") 
      {
        this.findByName(element.name).removeClass(errorClass).addClass(validClass);
      } 
      else 
      {
        if ($(element).closest('form').hasClass('form-horizontal')) 
        {
          $(element).closest('.form-group > div[class^="col"]').find('i.fa').remove();
          $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        }
        else 
        {
          $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).closest('.form-group').find('i.ti-close').remove();
          $(element).closest('.form-group').append('<i class="ti-check fa-lg form-control-feedback"></i>');
              }
          }
      }
    },
  errorPlacement: function(error, element) 
  {
    if (element.parent('.input-group').length) 
    {
      error.insertAfter(element.parent());
    } 
    else if (element.parent().parent('.radio-inline').length) 
    {
      error.insertAfter(element.parent());
    } 
    else 
    {
      error.insertAfter(element.next());
    }
  },
  errorElement: 'span',
  errorClass: 'help-block',
  ignore: ''
});

