@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Vouchers')
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
            <h2 >Voucher Enviado - Pedido # {{ $boucher->order_id}}</h2>
        </div>
        
    </div>
<div class="row text-center">
   <div class="col-12">
        <div class="card">
            <div class="col-lg-12">
                <div class="card_pibe">
                    <div class="single__contact__address">
                        <div class=""><br>
                            <h4> <b>Cliente: </b>{{ $boucher->customer->name}} {{ $boucher->customer->last_name}}</h4>
                        </div>
                        <div class="contact__details">
                        <br>
                           <img  src="/{{ $boucher->image }}" alt="product img"/>
                           <br>
                        </div>

                    </div>
                </div>
                <div class="ptb--50">
                <br>
                <a class="btn btn-success - btn-rounded" href="{{ url('admin/boucher') }}"><i class="icon icon-arrow-left"></i> Volver Atrás</a>

                </div> <br>
            </div>
   </div></div>
</div>
@endsection
@section('scripts')
   

@endsection