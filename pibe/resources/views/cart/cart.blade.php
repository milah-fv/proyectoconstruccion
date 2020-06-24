@extends('maestra-cliente.maestracliente')
@section('titulo', 'Carrito de Compras')
@section ('centro')

        <div class=" text-center">
            <h2 class="bradcaump-title">Carrito de Compras</h2>
            <nav class="bradcaump-inner">
            <a class="breadcrumb-item" href="{{ url('/')}}">Inicio</a>
            <span class="brd-separetor">/</span>
            <span class="breadcrumb-item active">Carrito de Compras</span>
            </nav>

        </div>

        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">

        @if($cart->isEmpty())
            <div class="text-center">
                <i class="cart-empty-i ti-shopping-cart"></i> 
                <h2 class=" pt--20">Aún no tienes productos en tu carrito</h2> 
                <hr>
                <p>Lo mejor para tu bebé, solo aqui</p><br>
                <a class="htc__btn shop__now__btn" href="{{ url('productos') }}">Ir de Compras</a>
            </div>
        @else 
            <div class="container cart-form">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="{{ url('/editarCarrito') }}" method="post" >
                            @csrf               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Imágen</th>
                                            <th class="product-name">Producto</th>
                                            <th class="product-price">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr id="trProductCart{{ $product->rowId }}">
                                            <input type="hidden" value="{{ $product->rowId }}" name="rowId[]">
                                            @if($product->options->type)
                                            <td class="product-thumbnail"><img src="{{ $product->options->screenshot }}" alt="product img" /></td>
                                            <td class="product-name">
                                                {{ $product->name }}<br>
                                                @if($product->options->size)
                                                    <span>{{ 'Tamaño: '.$product->options->size }}</span>
                                                @endif
                                            </td>
                                            @else
                                            <td class="product-thumbnail"><a href="{{ url("/producto/$product->id") }}"><img src="{{ $product->options->img }}" alt="product img" /></a></td>
                                            <td class="product-name">
                                            <a href="{{ url("/producto/$product->id") }}">{{ $product->name }}</a><br>
                                            @if($product->options->size)
                                                <span>{{ 'Tamaño: '.$product->options->size }}</span>
                                            @endif
                                            </td>
                                            @endif 
                                             <td class="product-price"><span class="amount">S/.{{ $product->price}}</span></td>
                                            <td class="product-quantity">
                                                    <input  type="number" name="qty[]" max ="{{ $product->options->stock }}" value="{{ $product->qty }}" min="1">
                                            </td>
                                            <td class="product-subtotal">S/.{{ $product->qty * $product->price }}</td>
                                            <td class="product-remove"><a id="DeleteProductCart" data-id="{{ $product->rowId }}" href="javascript:void(0)">X</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="buttons-cart">
                                        <input name="_method" type="hidden" value="PUT">
                                        <input type="submit" value="Actualizar carrito" /> 
                                        <a href="{{ url('/productos') }}">Continuar Comprando</a>
                                    </div> 
                                    </form> 
                                    <div class="coupon" >
                                        <h3>cupón de descuento</h3>
                                        <p>Ingresa el código del cupón, si tienes alguno</p>
                                        <form action="" method="">
                                            {{ csrf_field() }}
                                            <input type="text" placeholder="Código del cupón" name="coupon_code" id="coupon_code" maxlength="15" />
                                            <input type="submit" value="Aplicar Cupón" />
                                        </form>
                                    </div>
                                </div>
                               
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Total del Carrito</h2>
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Sub Total</th>
                                                    <td><span class="amount" style="font-size:14px">S/.{{ $total }}</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>¿Envío?</th>
                                                    <td>
                                                        <ul id="shipping_method">
                                                            <li>
                                                                <label>
                                                                <input id="check_shipping" type="checkbox" /> 
                                                                    Tarifa plana: <span id="amount_shipping" data-val="10" class="amount" style="margin-left: 10px; font-size:14px">S/.10.00</span>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <p><a class="shipping-calculator-button" href="{{ url('/terminos_y_condiciones')}}" target="_blank">Términos y condiciones de envíos</a></p>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount cart_total_val" data-val="{{ $newSubtotal }}" >S/.{{ number_format($newSubtotal, 2) }}</span></strong>
                                                    </td>
                                                </tr>                                             
                                            </tbody>
                                        </table> 
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{ url('/') }}"><i class="zmdi zmdi-check-circle" ></i>  Proceder a Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                    </div>
                </div>
            </div>
            @endif 
        </div>
        <!-- cart-main-area end -->

@endsection

@section ('scripts')
<script>
    $(document).on('click','#check_shipping',function() 
    {  
        var shipping = $('#amount_shipping').data('val').toFixed(2);
        var total = $('.cart_total_val').attr('data-val');  
        total = parseFloat(total.replace(/,/g, '')).toFixed(2);
        
        if($("#check_shipping").is(':checked')) 
        { 
           pTotal = parseFloat(shipping) + parseFloat(total);
           $('.cart_total_val').text('S/.'+ pTotal.toFixed(2));
        } 
        else 
        {  
            $('.cart_total_val').text('S/.'+ total);
        }  
    });
</script>
@endsection