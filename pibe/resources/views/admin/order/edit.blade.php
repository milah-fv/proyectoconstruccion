@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Ventas')
@section('micss')
    <link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('menu-ventas')
                    <li class="nav-item ">
                        <a href="/admin/orders" class="nav-link active">
                            <i class="icon icon-handbag"></i> Ventas 
                        </a>
                    </li>
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Editar Venta</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/order') }}">Listado de ventas</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
    <form  class="row" action="{{ url("admin/orders/$order->id") }}" method="post">
        @csrf
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="icon icon-handbag"></i> Pedido N° {{ $order->id}}</h4><hr>
                    <h5 class="card-title p-b-20 p-t-10"><i class="icon icon-compass"></i> ESTADO</h5><hr>
                    @component('components.select', ['name' => 'state',
                    'title' => 'Estado','items' => $states,
                    'compare' => $order->state_id,'col' => 'col-md-12'])
                    @endcomponent
                    <h5 class="card-title "><i class="icon icon-credit-card"></i> PAGO</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Método de pago</th>
                                <th scope="col">Cod. de referencia</th>
                                <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $order->payment->created_at->format('d/m/Y - h:i')}}</th>
                                    <td>{{ $order->payment->paymentType->name}}</td>
                                    <td>{{ $order->payment->reference_code}}</td>
                                    <td>S/ {{ $order->payment->amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input name="_method" type="hidden" value="PUT">
                    <a href="{{ url('/admin/orders') }}" class="btn btn-inverse">
						Cancelar
					</a>
					<button class="btn btn-success btn-rounded" type="submit">
						<i class="icon icon-pencil"></i> Actualizar
					</button>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card col-12">
                <div class="card-body">

                    <div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#CustomerCollapse">
                        <h4 class="card-title p-l-10"><i class="fa fa-user"></i> CLIENTE</h4>
                    </div>
                    <a href="{{ url('admin/customer/'.$order->customer->id.'/edit') }}">
                        <div class="floating-labels m-t-20 collapse" id="CustomerCollapse">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 text-capitalize">{{ $order->customer->name.' '
                                    .$order->customer->last_name }} </h5>
                                    Email: {{ $order->customer->email }} - Celular: {{ $order->customer->celphone }}
                                </div>
                            </div>
                        </div>
                    </a>

                </div>	
            </div>
            <div class="card col-12">
                <div class="card-body">

                    <div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#ShippingCollapse">
                        <h4 class="card-title p-l-10"><i class="fa fa-truck"></i> DIRECCIÓN DE ENVÍO</h4>
                    </div>
                    <div class="collapse p-t-10" id="ShippingCollapse">
                        @if($order->shipping)
                            <input type="hidden" id="departamentVal" value="{{$order->shipping->departament }}">
                            <input type="hidden"  id="provinceVal" value="{{$order->shipping->province }}">                            
                            @component('components.select', ['name' => 'departament',
                            'title' => ''])
                            @endcomponent

                            @component('components.select', ['name' => 'province',
                            'title' => ''])
                            @endcomponent
                        @else
                            <h5 >No hay dirección de envío </h5>
                        @endif
                    </div>

                </div>	
            </div>
            <div class="card col-12">
                <div class="card-body">

                    <div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#NotesCollapse">
                        <h4 class="card-title p-l-10"><i class="fa fa-comments"></i> MENSAJES</h4>
                    </div>
                    <div class="collapse" id="NotesCollapse">
                        <div class="chat-box">
                             <!--chat Row -->
                            <ul class="chat-list">
                                @forelse($order->messages as $message)
                                    @if(Auth::guard('user')->user()->id != $message->user_id)
                                        @if($message->customer_id)
                                            <li>
                                                
                                                <div class="chat-content">
                                                    <h5 class="text-capitalize">{{ $message->customer->name.' '.$message->customer->last_name  }}<span class="text-success"> Cliente</span></h5>
                                                    <div class="box bg-light-info">{{ $message->text }}</div>
                                                </div>
                                                <div class="chat-time">{{ $message->created_at->diffForHumans() }}</div>
                                            </li>
                                        @else
                                            <li>
                                                <div class="chat-img"><img src="{{ asset($message->user->avatar) }}" alt="user"></div>
                                                <div class="chat-content">
                                                    <h5 class="text-capitalize">{{ $message->user->name }} <span class="text-danger">@foreach($message->user->roles as $role) {{$role->name}} @endforeach</span></h5>
                                                    <div class="box bg-light-info">{{ $message->text }}</div>
                                                </div>
                                                <div class="chat-time">{{ $message->created_at->diffForHumans() }}</div>
                                            </li>
                                        @endif
                                    @else
                                        <li class="odd" >

                                            <div class="chat-content" >
                                                <h5 class="text-capitalize">{{ $message->user->name.' '.$message->user->last_name  }} <span class="text-warning"> El Pibe</span></h5>
                                                <div class="box bg-light-inverse">{{ $message->text }}</div>
                                                
                                            </div>
                                            <div class="chat-time">{{ $message->created_at->diffForHumans() }}</div>
                                        </li>
                                    @endif
                                @empty
                                    <p id="emptyMessage"class="p-t-10 p-b-20 text-center">No hay mensajes</p>
                                @endforelse
                            </ul>
                        </div>
                        <div class="card-body b-t" style="padding-bottom:0">
                            <div class="row">
                                @component('components.textarea', ['name' => 'message',
                                'title' => 'Escribe un comentario...','col' => 'col-8','margin' => '0','row' => '2'])
                                @endcomponent
                                <div class="col-4 text-right">
                                    <button style="border-radius: 100%" type="button" id="SendMessage" data-order="{{ $order->id }}" class="btn btn-success btn-circle btn-lg"><i class="icon icon-arrow-right"></i> </button>
                                </div>
                            </div>
                        </div>         
                    </div>

                </div>	
            </div>
            <div class="card col-12">
                <div class="card-body">

                    <div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#PersonCollapse">
                        <h4 class="card-title p-l-10"><i class="fa fa-user-plus"></i> PERSONA ADICIONAL DE RECOJO</h4>
                    </div>
                    <div class="collapse" id="PersonCollapse">
                        <div class="row p-t-10">
                            @if($order->name)
                                @component('components.input', ['name' => 'order_name','title' => 'Nombre'])
                                    @slot('value') {{ $order->name }}@endslot
                                @endcomponent

                                @component('components.input', ['name' => 'order_last_name','title' => 'Apellidos','col' => 'col-md-6'])
                                    @slot('value') {{ $order->last_name }}@endslot
                                @endcomponent

                                @component('components.input', ['name' => 'order_dni','title' => 'Numero de documento','col' => 'col-md-6'])
                                    @slot('value') {{ $order->dni }}@endslot
                                @endcomponent
                            @else
                                <h5 class="col-md-12" id="H5NewPerson">No hay persona alternativa de recojo <br>
                                <a class="text-dark" href="javascript:void(0)"><b data-toggle="collapse" data-target="#NewPerson">agregar persona</b></a></h5>
                                <div class="collapse p-t-10" id="NewPerson">
                                    <div class="row">

                                        @component('components.input', ['name' => 'order_name','title' => 'Nombre'])
                                            @slot('value') {{ $order->name }}@endslot
                                        @endcomponent

                                         @component('components.input', ['name' => 'order_last_name','title' => 'Apellidos',])
                                            @slot('value') {{ $order->last_name }}@endslot
                                        @endcomponent

                                        @component('components.input', ['name' => 'order_dni',
                                        'title' => 'Numero de documento','margin' => '0'])
                                            @slot('value') {{ $order->dni }}@endslot
                                        @endcomponent
                                        
                                    </div>
                                    <button type="button" class="btn btn-danger m-l-10 btn-rounded" data-toggle="collapse" data-target="#NewPerson">Cancelar</button>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>  
            </div>
            
        </div>
        <div class="card col-12">
            <div class="card-body">

                <div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#ProductCollapse">
                    <h4 class="card-title p-l-10"><i class="fa fa-archive"></i> PRODUCTOS</h4>
                </div>
                <div class="collapse" id="ProductCollapse">
                    <div class="card-body table-responsive">
                        <table id="table_product" class="table table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center"> Imagen </th>
                                    <th> Producto </th>
                                    <th> Precio </th>
                                    <th> Tamaño </th>                                        
                                    <th> Cantidad</th>
                                    <th> Total </th>
                                    {{-- <th> Acciones </th> --}}                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td class="text-center"> <img src=" {{ url($product->cover_image) }}" width="50px"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>S/ {{ $product->price }}</td>
                                        <td> {{ $product->pivot->size }} </td> 
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>S/ {{ $product->price * $product->pivot->quantity }}</td>
                                        {{--<td>
                                            <a href="{{ url("/admin/product/$product->id/edit") }}"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            <a href="javascript:void(0)"  id="DeleteProduct"> <i class="icon icon-close text-danger"></i> </a>
                                        </td>--}}
                                    </tr>
                                @endforeach
                            </tbody>                                
                        </table>
                    </div>
                </div>

            </div>	
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('plugins/datatables/dataTables.responsive.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('js/ubigeo.js') }}"></script>    
    <script>
        $( document ).ready(function()
        {
            var ubigeo = window.ubigeo

            var departamentos = ubigeo.departamentos;
            var provincias    = ubigeo.provincias;

            var departament = $('#departamentVal').val();
            var province = $('#provinceVal').val();

            

            $.each(departamentos, function(key, value) 
            {   
                if(value.id_ubigeo == departament)  
                {  
                    $('select[name=departament]').append($('<option>', 
                    {
                        value: value.id_ubigeo,
                        text: value.nombre_ubigeo,
                        selected: true
                    }));
                } 
                else
                {
                    $('select[name=departament]').append($('<option>', 
                    {
                        value: value.id_ubigeo,
                        text: value.nombre_ubigeo
                    }));
                }     
            });
            var province_init = provincias[departament];
            $.each(province_init, function(key, value) 
            {   
                if(value.id_ubigeo == province)  
                {  
                    $('select[name=province]').append($('<option>', 
                    {
                        value: value.id_ubigeo,
                        text: value.nombre_ubigeo,
                        selected: true
                    }));
                } 
                else
                {
                    $('select[name=province]').append($('<option>', 
                    {
                        value: value.id_ubigeo,
                        text: value.nombre_ubigeo
                    }));
                }     
            });

            $('select[name=departament]').on('change', function (e) 
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

        $(document).ready(function() 
        {

            $('#table_product').dataTable( 
            {
                "bInfo": false,
                "bLengthChange": false,
                "bFilter": false,
                "responsive":  true,
                "columnDefs": [
                    { "targets":[0,1,2,3,4,5], "className": "desktop" },
                    { "targets":[0,5], "className": "tablet, mobile" },

                    { "orderable": false, "targets": [5] }
                ],
                "lengthMenu": [[3, 10, 25], [3, 10, 25]],
                "language": 
                {
                    "processing" : "",
                    "paginate": {"previous": "<","next": ">"},
                    "search": "Buscar:",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se ha encontrado resultados",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)"
                },
            });       
        });

        $('#NewPerson').on('hidden.bs.collapse', function () 
        {
            $('#H5NewPerson').show();
            console.log(true);
        });

        $('#NewPerson').on('show.bs.collapse', function () 
        {
            $('#H5NewPerson').hide();
        });

        $(document).on('click','#SendMessage',function()
        {
            var message = $(this).parent().parent().find('textarea').val();
            var textarea = $(this).parent().parent().find('textarea');
            var order_id = $(this).data('order');

            $.ajax({
                type: 'POST',
                url: '{{ url('admin/message') }}',
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