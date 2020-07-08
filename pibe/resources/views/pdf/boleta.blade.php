<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de pago</title>
   
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Verdana, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }

        #logo{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }

        #imagen{
        width: 100px;
        }

        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }

        #encabezado{
        text-align: center;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 15px;
        }

        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        }

        section{
        clear: left;
        }

        #cliente{
        text-align: left;
        }

        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }

        #facliente thead{
        padding: 20px;
        background: #2183E3;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }

        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facvendedor thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }

        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facarticulo thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }

        #gracias{
        text-align: center; 
        }
    </style>
    <body>
    
        <header>
            <div id="logo">
                <img src="{{ asset('/img_web/logo.png')}}" alt="El Pibe" id="imagen" width="300px">
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b>El Pibe</b><br>Calle Real N° 643 - Huancayo, Junin Perú<br>Telefono: 064 212205<br>Email:elpibehuancayo@gmail.com
                </p> 
            </div><br>
            <div id="fact" style="margin-top:50px">
                @foreach($invoice as $i)
                    @if($i->invoice_type_id == 1)
                    <p>BOLETA DE VENTA  <br>   
                    {{$i->serie.'-'.$i->number}}</p>
                    @else
                    <p>FACTURA<br>
                    {{$i->serie.'-'.$i->number}}</p>
                    @endif

                @endforeach
            </div>
        </header>
        <br>
        @foreach($order as $o)
        <section>

            <div>
                <table id="facliente">
                    <thead>                        
                        <tr>
                            <th id="fac">Cliente</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr >

                            <th colspan="3">
                                <p id="cliente"></p>
                                Sr(a). {{ $o->name.' '.$o->last_name}} <br>
                                N° DNI: {{ $o->dni}}<br>
                                @foreach($shipping as $s)
                                   @if(($s->address) && ($s->referenceAddress)) 
                                    Dirección: {{ $s->address}}<br>
                                    <!-- Referencia a la direccion : {{ $s->referenceAddress}}<br> -->
                                    @endif
                                @endforeach
                                Email: {{ $o->email}}<br>
                                N° Celular: {{ $o->celphone}}<br>
                                @if($o->phone)
                                N° Teléfono: {{ $o->phone}}<br>
                                @endif
                                
                            </th>
                            
                            @if($i->invoice_type_id == 2)
                            <th >
                            <p> <b> RUC: </b> {{$i->ruc}}</p>
                            <p> <b> RAZON SOCIAL: </b> {{$i->razon_social}}</p>
                            </th>
                            @endif
                            
                                
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        @endforeach
        <br>
        <section>
            <div>
                <table id="facvendedor">
                    <thead>
                        <tr id="fv">
                            <!-- <th>VENDEDOR</th> -->
                            <th>FECHA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <!--  <td>vendedor</td> -->
                            <td>{{ $o->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <section>
            <div>
                <table id="facarticulo">
                    <thead>
                        <tr id="fa">
                            
                            <th>CANT</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO UNIT</th>
                            <th> .</th>
                            <th>PRECIO TOTAL</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($orderDetails as $od)
                        <tr>
                            
                            <td >{{$od->quantity}}</td>
                            <td>{{$od->product}}</td>
                            <td>{{$od->price}}</td>
                            <th></th>
                            <td>{{$od->price * $od->quantity}}</td>
                        </tr>
                        @endforeach
                    
                    </tbody>
            
                    <tfoot>
                    @foreach($payment as $p)

                    <!-- Puede que haya Error aqui -->
                        @foreach($shipping as $s)
                        @if($s->price)
                            @if($i->invoice_type_id ==2)
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>SUBTOTAL</th>
                                
                                <td>{{ ($p->amount - $s->price) - (($p->amount- $s->price) *18/100) }}</td>
                            </tr>
                            @else
                            <tr>

                                <th></th>
                                <th></th>
                                <th></th>
                                <th>SUBTOTAL</th>
                                
                                <td>{{ $p->amount}}</td>
                            </tr>
                            @endif
                        @else
                            @if($i->invoice_type_id ==2)
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>SUBTOTAL</th>
                                
                                <td>{{ $p->amount - ($p->amount *18/100) }}</td>
                            </tr>
                            @else
                            <tr>

                                <th></th>
                                <th></th>
                                <th></th>
                                <th>SUBTOTAL</th>
                                
                                <td>{{ $p->amount}}</td>
                            </tr>
                            @endif
                        @endif

                        @if($s->price)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>ENVIO</th>
                            
                            <td>{{$s->price}}</td>
                            
                        </tr>
                        @endif
                        @endforeach
                        @if($i->invoice_type_id ==2)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>IGV</th>
                            
                            <td>{{$p->amount * 18 /100}}</td>
                        </tr>
                        @endif
                        
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>TOTAL</th>
                            
                            <td>{{ $p->amount }}</td>
                            
                        </tr>
                        
                        
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <div id="gracias">
                <p><b>¡Gracias por su compra!</b></p>
            </div>
        </footer>
    </body>
</html>