@component('emails.layout.app')
    @slot('main')
        @component('emails.layout.header')@endcomponent
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                    <table cellspacing="0" cellpadding="0" width="600" class="w320">
                        <tr>
                            <td class="header-lg">
                                ¡Gracias por tu pedido!
                            </td>
                        </tr>
                       
                        <tr>
                            <td class="free-text">
                                Tu pedido esta a la espera hasta que confirmemos que el pago se ha recibido. Los detalles de tu pedido se muestran abajo como referencia. A continuación te compartimos la cuenta bancaria junto con los pasos para realizar el depósito o transferencia.
                            </td> <br>
                        </tr>

                        <tr>
                            <td class="free-text">
                                <b>POR FAVOR SIGUE LOS SIGUIENTES PASOS:</b>
                            
                            <ul style="text-align:left">
                                <li>1) Tomar nota del número de pedido. El número de pedido (usualmente viene después del signo "#" lo puedes encontrar en la ultima parte de este e-mail o lo puedes consultar en la sección de <b>"mis pedidos"</b> dentro de tu cuenta de nuestra tienda en línea. <a href="{{ url('/profile/orders/'.$order->getIdFormat()) }}" target="_blank">(Haciendo click Aqui)</a>
                                </li>
                                <li>2) Tiene hasta 48 horas para realizar el pago. De ser posible, utilizar el número de pedido como referencia al momento de realizar el pago. Esto nos ayudará a agilizar el rastreo del pago y liberación de tu pedido.
                                </li>
                                <li>3) Debe de enviar el boucher del deposito bancario escaneado o fotografiado (letra legible), desde su perfil en la sección <b>"Enviar Boucher"</b> en nuestra pagina web. (Tambien puede encontrarla <a href="{{ url('/profile/boucher') }}" target="_blank"> Haciendo click Aqui)</a><!-- Para la ficha de depósito puedes enviarnos una foto tomada desde tu celular o escaneada. Para la transferencia ingresa nuestro email cuando des de alta nuestra cuenta en tu portal del banco para que así recibamos el comprobante de manera automática. -->
                                </li>
                                <li>Si tienes algún problema o duda durante el proceso de pago, no dudes en contáctanos:
                                    <p><b>Teléfono:</b> 064 212205</p>
                                    <p><b>Email:</b> informes@elpibeperu.com</p>
                                </li>
                                
                            </ul>
                            </td>
                        </tr>
                     
                        <tr>
                            <td class="button">
                            <div><a href="{{ url('/profile/orders/'.$order->getIdFormat()) }}"
                            style="background-color:#69db69;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Ver Mi Pedido</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w320">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        
                                            <td class="mini-container-left">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td class="mini-block-padding">
                                                        <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                            <tr>
                                                            <td class="mini-block">
                                                                <span class="header-sm">Cuenta bancaria:</span><br />
                                                                    Consuelo Peralta Rojas: <br/>
                                                                    <b>Banco</b> BBVA Banco Continental<br />     
                                                                    <b>Número de cuenta</b> 0011 1235 0201201991<br/>
                                                            </td>
                                                            </tr>
                                                        </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                      
                                    </tr>
                                    <tr>
                                        
                                        <td class="mini-container-left">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td class="mini-block-padding">
                                                    <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                        <tr>
                                                        <td class="mini-block">
                                                            <span class="header-sm">Metodo de Pago Seleccionado:</span><br />
                                                                {{ $order->payment->paymentType->name }} <br />
                                                        </td>
                                                        </tr>
                                                    </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        
                                        <td class="mini-container-right">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td class="mini-block-padding">
                                                    <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                        <tr>
                                                        <td class="mini-block">
                                                            <span class="header-sm">Fecha del pedido:</span><br />
                                                            {{ $order->created_at->format('F d \,\ Y ')  }}<br />
                                                            <br />
                                                            <span class="header-sm">Pedido</span> <br />
                                                            #{{ $order->id }}
                                                        </td>
                                                        </tr>
                                                    </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
            <center>
                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                    <tr>
                        <td class="item-table">
                            <table cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td class="title-dark" width="300">
                                    Producto
                                    </td>
                                    <td class="title-dark" width="163">
                                    Cantidad
                                    </td>
                                    <td class="title-dark" width="97">
                                    Total
                                    </td>
                                </tr>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td class="item-col item">
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                            <td class="mobile-hide-img">
                                                <a href="{{ url("/product/$product->id") }}"><img width="110" height="92" src="{{ url($product->cover_image) }}" alt="item1"></a>
                                            </td>
                                            <td class="product">
                                                <span style="color: #4d4d4d; font-weight:bold;">{{ $product->name }}</span>
                                            </td>
                                            </tr>
                                        </table>
                                        </td>
                                        <td class="item-col quantity">
                                            {{ $product->pivot->quantity }}
                                        </td>
                                        <td class="item-col">
                                            S/.{{  $product->pivot->quantity * $product->price }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="item-col item mobile-row-padding"></td>
                                    <td class="item-col quantity"></td>
                                    <td class="item-col price"></td>
                                </tr>

                                <tr>
                                    <td class="item-col item">
                                    </td>
                                    <td class="item-col quantity" style="text-align:right; padding-right: 10px; border-top: 1px solid #cccccc;">
                                    <span class="total-space">Subtotal</span> <br />
                                    <span class="total-space">Envío</span> <br />
                                    <span class="total-space" style="font-weight: bold; color: #4d4d4d">Total</span>
                                    </td>
                                        <td class="item-col price" style="text-align: left; border-top: 1px solid #cccccc;">
                                            @if($order->shipping)              
                                                <span class="total-space">S/ {{ $order->payment->amount - $order->shipping->price }}</span> <br />
                                                <span class="total-space">S/ {{ $order->shipping->price }}</span>  <br />
                                            @else
                                                <span class="total-space">S/{{ $order->payment->amount}}</span> <br />
                                                <span class="total-space">Recoger en tienda</span>  <br />
                                            @endif
                                            <span class="total-space" style="font-weight:bold; color: #4d4d4d">S/ {{ $order->payment->amount }}</span>
                                        </td>
                                </tr>  
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
            </td>
        </tr>
        @component('emails.layout.footer')@endcomponent
    @endslot
@endcomponent