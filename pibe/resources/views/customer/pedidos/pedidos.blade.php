@extends('customer.menuProfileSidebar')
@section('micss')
<link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
@if($orders->isEmpty())
<div class="text-center pt--30">
    <i class="cart-empty-i ti-truck"></i> 
    <h2 class="pt--20">AÚN NO TIENES PEDIDOS REALIZADOS</h2> 
    <hr>
    <br>
    <a class="htc__btn shop__now__btn" href="{{ url('/productos') }}">¡Ir de Compras!</a>
</div>
@else
<div class="table-responsive">
    <table class="table pedidos">
        <thead>
            <tr>
                <th>Pedido #</th>
                <th>Fecha de Pedido</th>
                <th>Estado de su pedido</th>
                <th>Monto de su Pedido</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="items">
                    <td><a href="#">{{ $order->id }}</a></td>
                    <td>{{ $order->created_at->format('F d \,\ Y ')  }}</td>
                    <td class="text-capitalize {{ $order->getColorState() }}">{{ $order->state->name }}</td>
                    <td>S/.{{ $order->payment->amount }}</td>
                    <td>                
                        @if($order->state_id == 2 || $order->state_id == 1 || $order->state_id == 7 || $order->state_id == 6 || $order->state_id == 5)
                            <a href="{{ url('/profile/orders/'.$order->getIdFormat()) }}" class="pr--120" data-toggle="tooltip" data-placement="top" title="Ver pedido"><i class="ti-eye"></i></a>
                        @else
                            <a href="{{ url('/profile/orders/'.$order->getIdFormat()) }}" class="pr--120" data-toggle="tooltip" data-placement="top" title="Ver pedido"><i class="ti-eye"></i></a>
                            <a data-url="{{url('profile/orders/canceled/'.$order->getIdFormat())}}" href="javascript:void(0)" id="DeleteOrder" class="pl--10" data-toggle="tooltip" data-placement="top" title="Cancelar pedido"><i class="ti-close"></i></a>                                        
                        @endif
                    </td>          
                </tr>   
            @endforeach
        </tbody>
    </table>
<div>
<form method="post" role="form" id="deleteOrderForm">
    @csrf
    <input name="_method" type="hidden" value="PUT">
</form>
@endif
{{ $orders->links('productos.pagination.pagination') }}
@endsection
@section('scripts')
    <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>
    <script>
        $(document).on('click','#DeleteOrder', function() 
	    {
            var urlSend = $(this).data('url');
            swal({
                title: "¿Estás seguro de cancelar el pedido?",
                text: "Quiza el producto que deseas no esté disponible mas adelante",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, cancelar",
                confirmButtonColor: '#ff4136',
                cancelButtonText: "No, volver atras",
                closeOnConfirm: false,
                closeOnCancel: false
                }).then((result) => 
                {
                    if (result.value) 
                    {
                        $('#deleteOrderForm').attr('action', urlSend);
                        $('#deleteOrderForm').trigger('submit');
                    }

            });
	    });
    </script>
@endsection