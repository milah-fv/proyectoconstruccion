@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Sliders')
@section('micss')
    <link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/rowReorder.bootstrap4.min.css') }}" rel="stylesheet">    
    <link href="{{ asset('plugins/datatables/editor.dataTables.min.css') }}" rel="stylesheet">        
    <!-- <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"> -->
@endsection
@section('menu-clientes')
    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle active" >
                            <i class="icon icon-user-following"></i> Clientes y Vouchers<i class="fa fa-caret-left"></i>
                        </a>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/customer" class="nav-link ">
                                    <i class="icon icon-user-following"></i> Clientes 
                                </a>
                            </li>
                        </ul>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/boucher" class="nav-link active">
                                    <i class="icon icon-film"></i> Vouchers 
                                </a>
                            </li>
                        </ul>
                    </li>
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Vouchers</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item">Listado Vouchers Enviados</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">

                    <table id="table_sliders" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> Nro Pedido </th>
                                <th> Cliente </th>
                                <th> Voucher </th>
                                <th> Estado de Pedido </th>                                                
                                <th> Monto de Pedido </th>
                                <th> Acciones </th>                                
                                @csrf
                            </tr>
                        </thead>

                         @foreach ($boucher as $b)
                         <tbody>
                            <tr class="items">
                                <td>{{ $b->order->id }}</td>
                                <td>{{ $b->customer->name }} {{ $b->customer->last_name }}</td>
                                <td><img width="50" src="/{{ $b->image }}" alt="product img"/></td>
                                <td class="text-capitalize {{ $b->order->getColorState() }}">
                                    @if($b->order->state->name == 'completado')
                                        <span class="label label-success"> {{ $b->order->state->name }} </span>
                                    @elseif($b->order->state->name == 'cancelado' || $b->order->state->name == 'fallido')  
                                        <span class="label label-danger"> {{ $b->order->state->name }} </span>  
                                    @elseif($b->order->state->name == 'pendiente de pago') 
                                        <span class="label label-custom"> {{ $b->order->state->name }} </span>   
                                    @else
                                        <span class="label label-dark"> {{ $b->order->state->name }} </span>
                                    @endif
                                </td>
                                <td>S/.{{ $b->order->payment->amount }}</td>
                                <td>                
                                        <a href="{{ url('/admin/boucher/'.$b->id) }}" class="pr--120" data-toggle="tooltip" data-placement="top" title="Ver pedido"><i class="icon icon-eye"></i></a>
                                 
                                </td>          
                            </tr>
                        </tbody>  
                    @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
<form method="post" role="form" id="deleteSliderForm">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>
@endsection
@section('scripts')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.responsive.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.editor.min.js') }}"></script>
<!-- <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>   -->
<!-- <script type="text/javascript">
    

    $(document).on('click','#DeleteSlider', function() 
	{
		var urlSend = $(this).data('url');
		swal({
			title: "¿Eliminar slider?",
			text: "Se perdera toda la información del slider, y no se puede revertir",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Eliminar Slider',
            confirmButtonColor: '#e85b5b',
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#848484',
			closeOnConfirm: false,
			closeOnCancel: false
			}).then((result) => 
            {
                if (result.value) 
                {
                    $('#deleteSliderForm').attr('action', urlSend);
                    $('#deleteSliderForm').trigger('submit');
                    swal({
                    type: 'success',
                    title: 'Slider eliminado exitosamente!'
                    })
                }

		});
	});
</script> -->
@endsection