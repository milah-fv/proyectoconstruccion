@extends('customer.menuProfileSidebar')
@section('content')
<div class="row show_order">
    <h2 >RESUMEN DE TU PEDIDO</h2>
    <div class="col-lg-7">
        <div class="card_pibe">
            <div class="single__contact__address">
                <div class="contact__icon">
                    <span class="ti-location-pin"></span>
                </div>
                <div class="contact__details">
                    @if($order->shipping)
                    <h5 class="pb--10">Envío a agencia</h5>
                    <ul>
                        <li><b>Departamento : </b></li> 
                        <li id="departamentLi" data-id="{{ $order->shipping->departament}}"></li>
                        <li><b>Provincia:</b></li> 
                        <li id="provinceLi" data-id="{{ $order->shipping->province}}"></li>
                        <li><b>Direccion : </b>{{ $order->shipping->address}}</li> 
                        <li><b>Referencia : </b>{{ $order->shipping->referenceAddress}}</li> 
                    </ul>
                    @else
                        <h5 class="pb--10">Recoger en tienda</h5>
                    @endif
                </div>
            </div>
        </div>
        @if($order->name)
            <div class="card_pibe">
                <div class="single__contact__address">
                    <div class="contact__icon">
                        <span class="ti-user"></span>
                    </div>
                    <div class="contact__details">
                        <h5 class="pb--10">Persona encargada</h5>
                        <ul>
                            <li><b>Nombre:</b> {{ $order->name }}</li> 
                            <li><b>Apellidos:</b> {{ $order->last_name }}</li>
                            <li><b>Documento:</b> {{ $order->dni }}</li> 
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-5">
        <div class="card_pibe">
            <h5 class="pb--10 has_arrow_card collapsed" data-toggle="collapse" data-target="#summaryOrder">RESUMEN DE COMPRA</h5>
            <div class="table-responsive collapse" id="summaryOrder">          
                <table class="table">
                    <tbody>
                        @if($order->shipping)                    
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right">S/{{ $order->payment->amount - $order->shipping->price }}</td>
                            </tr>
                            <tr>
                                <td>Envío</td>
                                <td class="text-right">S/ {{ $order->shipping->price }}</td>
                            </tr>
                        @else
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right">S/{{ $order->payment->amount}}</td>
                            </tr>
                            <tr>
                                <td>Envío</td>
                                <td class="text-right">Recoger en tienda</td>

                            </tr>
                        @endif
                        <tr>
                            <td class="total">Total</td>
                            <td class="amount_total">S/ {{ $order->payment->amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card_pibe">
            <h5 class="has_arrow_card collapsed" data-toggle="collapse" data-target="#messageOrder">MENSAJES</h5>
            <div class="chat-box collapse" id="messageOrder">
                <!--chat Row -->
                <ul class="chat-list">
                    @forelse($order->messages as $message)
                        @if(Auth::guard('web')->user()->id != $message->customer_id)
                            <li>
                                <div class="chat-img"><img src="{{ asset($message->user->avatar) }}" alt="user"></div>
                                <div class="chat-content">
                                    <h5 class="text-capitalize">{{ $message->user->name }} <span class="text-danger">@foreach($message->user->roles as $role) {{$role->name}} @endforeach</span></h5>
                                    <div class="box bg-light-info">{{ $message->text }}</div>
                                </div>
                                <div class="chat-time">{{ $message->created_at->diffForHumans() }}</div>
                            </li>
                         @else
                            <li class="odd">
                                <div class="chat-content">
                                    <div class="box bg-light-inverse">{{ $message->text }}</div>
                                    <br>
                                </div>
                                <div class="chat-time">{{ $message->created_at->diffForHumans() }}</div>
                            </li>
                        @endif
                    @empty
                        <p id="emptyMessage"class="pt--20 text-center">No hay mensajes</p>
                    @endforelse
                    
                </ul>
                <div class="card-body pt--30">
                    @if($order->state_id != 1)
                        <div class="row">
                            @component('components.textarea', ['name' => 'message',
                            'title' => 'Escribe un comentario...','col' => 'col-xs-8','margin' => '0','row' => '2'])
                            @endcomponent
                            <div class="col-xs-4 text-right">
                                @csrf
                                <button type="button" id="SendMessage" data-order="{{ $order->id }}" class="btn btn-success btn-circle btn-lg"><i class="ti-comments-smiley"></i> </button>
                            </div>
                        </div>
                    @endif
                </div> 
            </div>
        </div>
        <div class="card_pibe">
            <h5 class="pb--10 has_arrow_card collapsed" data-toggle="collapse" data-target="#typePaymentOrder">MÉTODO DE PAGO</h5>
            <h6 class="text-capitalize collapse" id="typePaymentOrder"><i class="ti-credit-card"></i> {{ $order->payment->paymentType->name }}</h6>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card_pibe pedidos">
            <div class="order_title collapsed has_arrow_card" data-toggle="collapse" data-target="#OrderDetails">
                <span >Pedido No. {{ $order->id }}</span>
                <span class="pipe">Comprado el {{ $order->created_at->format('d/m/Y') }}</span>
                <span class="pipe">Total: S/ {{ $order->payment->amount }}</span>
                <span class="pipe text-capitalize ">Estado: <span class="{{ $order->getColorState() }}">{{ $order->state->name }}</span></span>
            </div>
            <div class="table-responsive collapse" id="OrderDetails">
                <table class="table">
                    <thead>
                        <tr>
                            <th >Imagen</th>
                            <th >Producto</th>
                            <th >Precio</th>
                            <th >Cantidad</th>
                            <th >Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td><a href="{{ url("/product/$product->id") }}"><img width="50" src="{{ url($product->cover_image) }}" alt="product img" /></a></td>
                                <td>
                                    <a href="{{ url("/product/$product->id") }}">{{ $product->name }}</a><br>
                                    @if($product->pivot->size)
                                        <span>{{ 'Tamaño: '.$product->pivot->size }}</span>
                                    @endif
                                </td>
                                <td ><span class="amount">S/.{{ $product->price}}</span></td>
                                <td>
                                    <span class="amount">{{ $product->pivot->quantity }}</span>
                                </td>
                                <td class="product-subtotal">S/.{{  $product->pivot->quantity * $product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/ubigeo.js') }}"></script>
    <script>
    $( document ).ready(function()
    {
        var ubigeo = window.ubigeo;

        var departamentos = ubigeo.departamentos;
        var provincias    = ubigeo.provincias[$('#departamentLi').data('id')];
        var province = $('#provinceLi').data('id');
        var departament = $('#departamentLi').data('id');
        
        
        function getState(data, id_ubigeo)
        {
            for(var x in data)
            {
                if(data[x].id_ubigeo && data[x].id_ubigeo.split(",")
                .indexOf(id_ubigeo.toString())!=-1) return data[x].nombre_ubigeo;
            }
            return "Not Found";    
        }

        if(departament)
        {
            $('#provinceLi').text(getState(provincias, province));
            $('#departamentLi').text(getState(departamentos, departament));
        }
        
    });

    $(document).on('click','#SendMessage',function()
    {
            var message = $(this).parent().parent().find('textarea').val();
            var textarea = $(this).parent().parent().find('textarea');
            var order_id = $(this).data('order');

            $.ajax({
                type: 'POST',
                url: '{{ url('messageCustomer') }}',
                data: 
                {
                    '_token': $('input[name=_token]').val(),
                    'text': message,
                    'order_id': order_id,
                },
                success: function(data) 
                {
                    textarea.val('').blur();
                    $('#emptyMessage').hide();
                    $('.chat-list').append('<li class="odd">\
                                            <div class="chat-content">\
                                                <div class="box bg-light-inverse">'+ data.text +'</div>\
                                                <br>\
                                            </div>\
                                            <div class="chat-time">' +data.date +'</div>\
                                        </li>');
                },
                error: function(data) 
                {
                    console.log(data);
                },
            });
        });
    </script>
@endsection