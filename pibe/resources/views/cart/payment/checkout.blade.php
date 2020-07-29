@extends('maestra-cliente.maestracliente')
@section('titulo', 'Proceder a comprar')
@section('micss')
    <link href="{{ asset('cliente_assets/js/main.js')}}" rel="stylesheet">

@endsection
@section ('centro')
  
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--30 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ url('/checkout') }}" class="row" id="payment_end" >
                    @csrf
                    @include('cart.payment.direccionEnvio')
                    <!-- Sidebar Carrito -->
                    <div class="col-md-5 col-lg-5" >
                        <div class="wn__order__box">
                            <h3 class="onder__title">Resúmen de compra</h3>
                            <!-- <ul class="order__total">
                                <li>Producto</li>
                                <li>Total</li>
                            </ul> -->
                            <table class="table table-responsive table-striped ">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Producto</th>
                                        <th >Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset($product->options->img) }}" width="70px" alt="product images"></td>
                                        <td><p>{{ $product->name }}<br>Talla: {{ $product->options->size }} - {{"Cantidad $product->qty"}} </p></td>
                                        <td><p>S/.{{ number_format($product->price,2) }}</p></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr >
                                        <th colspan="2" class="text-center" style="border-top: solid 1px #29a329">Subtotal</th>
                                        <th style="border-top: solid 1px #29a329">S/. {{ number_format($total_cart, 2)}}</th>
                                    </tr>
                                     @if (session()->has('coupon'))
                                    <tr>
                                        <th colspan="2" class="text-center">Descuento  ( {{session()->get('coupon')['name'] }} ) </th>
                                        <th> - S/.{{ number_format($discount, 2) }}</th>
                                    </tr>
                                    <tr >
                                        <th colspan="2" class="text-center" style="border-top: solid 1px #29a329">
                                            Nuevo Sub Total
                                        </th>
                                        <th style="border-top: solid 1px #29a329">
                                            S/.{{ number_format($newSubtotal, 2) }}
                                        </th>
                                    </tr>
                                    @endif
                                    <tr id="shipping_tr">
                                        <th colspan="2" class="text-center">Envio</th>
                                        <th >S/. {{ number_format($shipping, 2 )}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center " style="border-top: solid 1px #29a329">TOTAL</th>
                                        <th  style="border-top: solid 1px #29a329"> <span id="total_tr" >S/. {{ number_format($newSubtotal + $shipping, 2) }}</span></th>
                                    </tr>
                                </tfoot>
                            </table>
                          
                                @if($customer->verifiedData())
                                    <div class="checkbox text-center pb--20 radio-inline ">
                                        <label for="term_condition" class="term_condition"><input id="term_condition" name="term_condition" type="checkbox" required>
                                        &nbsp; &nbsp; &nbsp; He leído y estoy de acuerdo con los <b><a href="{{ url('/terminos_y_condiciones') }}" target="_blank">términos y condiciones </a></b> del sitio.</label>
                                    </div>
                                    <div class="contact-btn text-center pb--20">                    
                                        <button type="submit" id="payment_sucess" class="fv-btn">
                                            Finalizar
                                        </button>                        
                                    </div>           
                                @else
                                    <p  class="text-center">Completa tus datos</p>  
                                @endif
                        </div>
                    </div>

                    <!-- Fin de Sidebar Carrito -->
                    
                    <div class="col-md-7 pt--30">
                        <div class="ckeckout-left-sidebar">
                           
                            <div class="checkout-form pb--30">
                                <h2 class="section-title-3"><i class="ti-plus"></i> INFORMACIÓN EXTRA</h2>
                            </div>
                            <h6 class="col-md-12 pb--20">Si desea dejarnos un comentario acerca de su pedido, por favor, escríbalo a continuación</h6>
                            @component('components.textarea', ['name' => 'message','title' => 'Comentario:'])
                            @endcomponent
                        </div>
                    </div>

                    <input type="hidden" value="{{ $shipping }}" name="shippping2" >
                </form>  

            </div>
            
        </div>
    </div>
</section>
@include('cart.payment.nuevaDireccion')
<!-- End Checkout Area -->
@endsection
@section('scripts')
<script src="{{ asset('js/ubigeo.js') }}"></script>
<script src="https://checkout.culqi.com/v2"></script>
<script>

    Culqi.publicKey = 'pk_test_06UvKFkHBpPszQGN';

    // set select
    $( document ).ready(function()
    {
        var ubigeo = window.ubigeo

        var departamentos = ubigeo.departamentos
        var provincias    = ubigeo.provincias

        $('select[name=department]').focus();

        $.each(departamentos, function(key, value) 
        {           
            $('select[name=department]').append($('<option>', 
            {
                value: value.id_ubigeo,
                text: value.nombre_ubigeo
            }));  
        });

        var province_init = provincias[2534];
        $('select[name=province]').focus();
        $.each(province_init, function(key, value) 
        {  
            $('select[name=province]').append($('<option>', 
            {
                value: value.id_ubigeo,
                text: value.nombre_ubigeo
            }));  
        });


        $('select[name=department]').on('change', function (e) 
        {
            var valueSelected = this.value;
            
            var sd = provincias[valueSelected];

            $('select[name=province]').find('option').remove().end().focus();

            $.each(sd, function(key, value) 
            {  
               $('select[name=province]').append($('<option>', 
                {
                    value: value.id_ubigeo,
                    text: value.nombre_ubigeo
                }));  
            });
        });
    });

    $(document).on('click','#payment_sucess', function(e) 
    {
        console.log($("#shop").is(':checked'));
        var valid = $("#payment_end").valid();
        // Abre el formulario con las opciones de Culqi.settings
        if(valid)
        {
            $('#payment_sucess').html('<i class="three-quarters-loader"></i> Cargando..');

            if($('#s-option').is(':checked')) 
            {
                $('#payment_end').submit();            
            }
            else
            {
                var subtotal = {{ $newSubtotal }} * 100;
                var shipping = {{ $shipping }} * 100;

                if ($('#shipping').is(':checked')) 
                {
                    subtotal = subtotal +shipping;
                }
                
                Culqi.settings({
                    title: 'El Pibe Perú',
                    currency: 'PEN',
                    description: 'Ropa, accesorios y calzado para bebé',
                    amount: subtotal
                });

                    Culqi.open();
                    e.preventDefault();
                    $('#payment_sucess').text('Finalizar');
            }
        }



    });
    if (true) {}
        else{}

    function culqi() 
    {
        $('#payment_sucess').html('<i class="three-quarters-loader"></i> Validando..').prop('disabled', true);
        if(Culqi.token) { // ¡Token creado exitosamente!
            // Get the token ID:
            var token = Culqi.token.id;
            
            $.ajax({
                type: 'post',
                url: '/checkout',
                data: $('#payment_end').serialize() +"&token=" + token,
                success: function(data) 
                {
                    $('body').html(data.html);
                    $('#preloader').remove();
                },
                error: function(data) 
                {
                    if(data.responseJSON.message)
                    {
                        console.log(data);  
                    }  
                    console.log(data);                   
                }
            });
        }else{ // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
            //alert("Error con la tarjeta ingresada, consulte con su banco. \n     La compra NO ha sido procesada");
        }
    };

    $(document).on('click','.chekbox_pib',function()
    {
        
        if ($('#person').is(':checked')) 
        {
            $('#addCustomerPanel').show();
        }
        else
        {
            $('#addCustomerPanel').hide();  
        }
    });

    $(document).on('click','#boleta',function()
    {
        $('#comprobante_factura_datos').hide();  
    });
    $(document).on('click','#factura',function()
    {
        $('#comprobante_factura_datos').show();  
    });

    $(document).on('click','#deposit',function()
    {
        $('#collapse1').hide();
        $('#collapse2').show();
    });
    $(document).on('click','#credit_cart',function()
    {
        $('#collapse2').hide();
        $('#collapse1').show();
    });

    $(document).on('click','#agency_shipping',function()
    {
        var shipping = {{ $shipping }};
        var total = {{ $newSubtotal }} +shipping;

        $('#profile2').removeClass('in active');
        $('#home').addClass('in active');
        $('#weight_products').text('Tarifa plana: S/.'+shipping);
        $('#total_tr').text('S/. '+total);
        $('#shipping_tr').show();
    });
    $(document).on('click','#store_pickup',function()
    {   
        $('#shipping_tr').hide();
        $('#home').removeClass('in active');
        $('#profile2').addClass('in active');
        $('#weight_products').text('Recoger en tienda');
        $('#total_tr').text('S/. {{ number_format($newSubtotal, 2) }}');
       
    });

</script>
@endsection