@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Opciones de Pago')
@section('micss')
    <link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/rowReorder.bootstrap4.min.css') }}" rel="stylesheet">    
    <link href="{{ asset('plugins/datatables/editor.dataTables.min.css') }}" rel="stylesheet">        
    <!-- <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"> -->
@endsection
@section('menu-pagina-principal')
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle active">
                            <i class="icon icon-wrench"></i> Pagina  Principal<i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/slider" class="nav-link  ">
                                    <i class="icon icon-wrench"></i> Sliders
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/coupon" class="nav-link ">
                                    <i class="icon icon-wrench"></i> Cupones
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/paymentOptions" class="nav-link active">
                                    <i class="icon icon-wrench"></i> Opciones de Pago
                                </a>
                            </li>
                        </ul>
                        
                    </li>
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Opciones de Pago</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item">Listado de Opciones de Pago</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                
                     <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                        <thead>
                            <tr>
                                <th data-sort-initial="true" data-toggle="true"> N°</th>
                                <th data-sort-initial="true" data-toggle="true"> Opciones de Pago </th>
                                <th data-sort-initial="true" data-toggle="true"> ¿Habilitado? </th>
                                <!-- <th data-hide="phone"> Imagen </th> -->
                                <th data-sort-ignore="true" class="min-width"> Acciones </th>
                                @csrf
                            </tr>
                        </thead>
                        
                        <tbody id="tdBodyCategorie">
                            @foreach ($payments as $payment)
                                <tr id="CategorieTR{{ $payment->id }}">
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->name }}</td> 
                                    @if ($payment->actived ==1)
                                    <td><span class="label label-danger"> Si </span></td> 
                                    @else
                                    <td><span class="label label-dark"> No </span></td> 
                                    @endif
                                    
                                    <td>
                                        <a href="{{ url("/admin/paymentOptions/$payment->id/edit") }}" style="margin: 0px 10px"><i class="icon icon-pencil text-inverse m-r-10" ></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
<form method="post" role="form" id="deleteCouponForm">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>
@endsection
@section('scripts')
<script src="{{ asset('plugins/footable/js/footable.all.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/footable-init.js') }}" type="text/javascript" ></script>
<!-- <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script> -->
@endsection