<div class="payment-form">

    <h2 class="section-title-3 pb--20"><i class="ti-credit-card"></i> MÉTODO DE PAGO</h2>
     @include('cart.payment.comprobantePago')  
    <div class="div_method" >

        <ul>

            @if($paymentType1->actived > 0 )
            <li>
                <input type="radio" id="f-option" value="card" name="method" checked>
                <label for="f-option" id="credit_cart">Tarjeta de crédito o débito | Visa y más!</label>
                
                <div class="check"></div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <p class="pb--20">Contamos con el mejor mejor sistema de encriptación y aceptamos todo tipo de tarjetas.</p>
                    <div class="our-payment-sestem">
                        <ul class="payment-menu" >
                            <li><img src="{{ url('cliente_assets/images/payment/1.jpg') }}" alt="payment-img" width="42px"></li>
                            <li><img src="{{ url('cliente_assets/images/payment/2.jpg') }}" alt="payment-img" width="42px"></li>
                            <li><img src="{{ url('cliente_assets/images/payment/3.jpg') }}" alt="payment-img" width="42px"></li>
                            <li><img src="{{ url('cliente_assets/images/payment/4.png') }}" alt="payment-img" width="42px"></li>
                        </ul>  
                    </div>
                    <p>Finalize con su compra para procesar de inmediato su pedido. </p>
                    </div>
                </div>
            </li>
            @endif

            @if($paymentType2->actived > 0 )
            <li>
                <input type="radio" id="s-option" value="deposit" name="method" checked>
                <label for="s-option" id="deposit">Déposito Bancario</label>
                
                <div class="check"><div class="inside"></div></div>
                <div id="collapse2" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <p><b>NOTA:</b><br>Tiene hasta 48 horas para efectuar el pago, puede utilizar la Banca por Internet del BCP o BBVA Banco Continental, Agentes BCP o BBVA Banco Continental
                     y Oficinas BCP o BBVA Banco Continental a Nivel nacional con tu número de pedido, tambien puede usar aplicativos como Yape del BCP.  <br><br>
                    <img src="{{ asset('cliente_assets/images/yape.png')}}" width="100px" style="margin: 0px 10px"> 
                    <img src="{{ asset('cliente_assets/images/bcp.png')}}" width="100px" style="margin: 0px 10px"> 
                    <img src="{{ asset('cliente_assets/images/bbva.png')}}" width="100px" style="margin: 0px 10px"> 
                    
                    <br>
                    </p>
                    <p>Debe de enviar el voucher del deposito bancario escaneado o fotografiado (letra legible), al número de WhatsApp que se le indicará después de presionar el botón "Finalizar".</p>
                    <!-- <p>Y si no estás satisfecho con tu producto, puedes devolverlo completamente gratis dentro de los 10 días naturales posteriores a la entrega (se aplican <a href="{{ url('/terminos_y_condiciones') }}">términos y condiciones</a>).</p></div> -->
                </div>
                 <!--  -->

            </li>
            @endif
           
        </ul>
    </div>
</div>
