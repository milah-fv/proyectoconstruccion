@component('emails.layout.app')
    @slot('main')
        @component('emails.layout.header')@endcomponent
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                    <table cellspacing="0" cellpadding="0" width="600" class="w320">
                        <tr>
                            <td class="header-lg">
                                ¡Nuevo Pedido!
                            </td>
                        </tr>
         
                            <tr>
                                <td class="free-text">
                                    Dejamos los detalles en la ultima parte de este email, tambien puede abrirlo desde el panel de administrador haciendo click en el botón:
                                </td>
                            </tr>
                
                            <!-- <tr>
                                <td class="free-text">
                                    Tu pedido esta a la espera hasta que confirmemos que el pago se ha recibido. Los detalles de tu pedido se muestran abajo como referencia.
                                </td>
                            </tr> -->
                  
                        <tr>
                            <td class="button">
                            <div><!--[if mso]>
                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                                <w:anchorlock/>
                                <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">My Account</center>
                                </v:roundrect>
                            <![endif]--><a href="{{ url('/admin/orders/'.$order->getIdFormat().'/edit') }}"
                            style="background-color:#69db69;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Ver Pedido</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w320">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        @if($order->payment->payment_type_id == 2)
                                            <td class="mini-container-left">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td class="mini-block-padding">
                                                        <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                            <tr>
                                                            <td class="mini-block">
                                                                <span class="header-sm">Cliente:</span><br/>
                                                                    {{ $order->customer->name}} {{ $order->customer->last_name}}<br/>
                                                                    <b>Nro. Celular: </b> {{ $order->customer->celphone}}<br />     
                                                                    <b>Email: </b> {{ $order->customer->email}} <br />
                                                            </td>
                                                            </tr>
                                                        </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        @endif
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