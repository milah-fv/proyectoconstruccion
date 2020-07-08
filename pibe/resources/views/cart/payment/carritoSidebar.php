
NO VALE CARRITO SIDEBAR

<div class="col-md-5 col-lg-5">
    <div class="wn__order__box">
        <h3 class="onder__title">Resúmen de compra</h3>
        <ul class="order__total">
            <li>Producto</li>
            <li>Total</li>
        </ul>
        <ul class="order_product">
            <li>
                <p>{{ $product->name }}</p>{{"x $product->qty"}} 
                <b>{{ $product->options->size }}</b>
                <span>S/.{{ $product->price }}</span>
            </li>
        @foreach ($products as $product)
            <li>
                <p>{{ $product->name }}</p>{{"x $product->qty"}} 
                <b>{{ $product->options->size }}</b>
                <span>S/.{{ $product->price }}</span>
            </li>
        @endforeach
        </ul>
        <ul class="shipping__method">
            <li>Carrito Subtotal <span>S/.{{ $total_cart }}</span></li>
            <li>Envio 
                <ul>
                    <li>
                        <label id="weight_products">Tarifa plana: S/. {{ number_format($shipping, 2) }}</label>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="total__amount">
            <li>Pedido Total <span id="total_order" >S/.{{ number_format($total_cart + $shipping, 2) }}</span></li>
        </ul>
            @if($customer->verifiedData())
                <div class="checkbox text-center pb--20 radio-inline ">
                    <label for="term_condition" class="term_condition"><input id="term_condition" name="term_condition" type="checkbox" required>
                    &nbsp; &nbsp; &nbsp; He leído y estoy de acuerdo con los <b><a href="{{url('/terminos_y_condiciones')}}" target="_blank">términos y condiciones </a></b> del sitio.</label>
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