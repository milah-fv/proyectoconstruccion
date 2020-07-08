@extends('customer.menuProfileSidebar')
@section('micss')
<link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h2 class="text-themecolor">Vouchers Enviados</h2>
            <p>El envio de vouchers solo se realiza en el caso de que Ud. haya realizado una compra y haya depositado al banco la suma de dinero, una vez enviado su voucher, nosotros confirmaremos su pago y enviaremos su producto</p>
        </div> 
</div><hr>
<div class="row m-t-20">
    <div class="col-6">
        <div class="form-group">
            <a href="{{ url('profile/boucher/create') }}" class="btn  btn-success btn-sm text-white btn-rounded">Enviar Voucher</a>
        </div>
    </div>
</div>
@if($boucher->isEmpty())
<div class="text-center pt--30">
    <i class="cart-empty-i ti-ticket"></i> 
    <h2 class="pt--20">AÚN NO TIENES VOUCHERS ENVIADOS</h2> 
    <hr>
    <br>
    <!-- <a class="htc__btn shop__now__btn" href="{{ url('/productos') }}">¡Ir de Compras!</a> -->
</div>
@else

<div class="table-responsive">
    <table class="table pedidos">
        <thead>
            <tr>
                <th>Pedido #</th>
                <th>Voucher enviado</th>
                <th>Estado de su pedido</th>
                <th>Monto de su Pedido</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boucher as $b)
                <tr class="items">
                    <td><a href="#">{{ $b->order->id }}</a></td>
                    <td><img width="50" src="/{{ $b->image }}" alt="product img"/></td>
                    <td class="text-capitalize {{ $b->order->getColorState() }}">{{ $b->order->state->name }}</td>
                    <td>S/.{{ $b->order->payment->amount }}</td>
                    <td>                
                       
                            <a href="{{ url('/profile/boucher/'.$b->id) }}" class="pr--120" data-toggle="tooltip" data-placement="top" title="Ver pedido"><i class="ti-eye"></i></a>
                            <a data-url="{{url('profile/boucher/canceled/'.$b->id)}}" href="javascript:void(0)" id="DeleteOrder" class="pl--10" data-toggle="tooltip" data-placement="top" title="Eliminar Voucher"><i class="ti-close"></i></a>                                        
                     
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
<!--  -->
@endsection
@section('scripts')
    <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>
    <script>
        $(document).on('click','#DeleteOrder', function() 
	    {
            var urlSend = $(this).data('url');
            swal({
                title: "¿Estás seguro de eliminar el voucher?",
                text: "No se podra enviar tu pedido hasta confirmar el pago",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
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