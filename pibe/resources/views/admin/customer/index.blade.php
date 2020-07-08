@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Clientes')
@section('micss')
<link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
@endsection
@section('menu-clientes')
    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle active" >
                            <i class="icon icon-user-following"></i> Clientes y Bouchers<i class="fa fa-caret-left"></i>
                        </a>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/customer" class="nav-link active">
                                    <i class="icon icon-user-following"></i> Clientes 
                                </a>
                            </li>
                        </ul>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/boucher" class="nav-link ">
                                    <i class="icon icon-film"></i> Bouchers 
                                </a>
                            </li>
                        </ul>
                    </li>

@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Pedidos</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Listado de pedidos</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="table_product" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> id</th>
                                <th> Nombre </th>  
                                <th> Apellidos </th>
                                <th> Celular </th>
                                <th> Correo </th>                                                         
                                <th> Activado </th>
                                <th> Compras</th>
                                <th> Acciones</th>
                                @csrf
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.responsive.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#table_product').dataTable( 
        {
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('admin/customerJson') }}",
            "columns":[
                {data: 'id'},
                {data: 'name'},
                {data: 'last_name'},
                {data: 'celphone'},
                {data: 'email'},
                {data: 'actived',
                    render: function(data) 
                    {
                        if(data == '1')
                        {
                            return '<span class="label label-success">Activado</span>';                         
                        }
                        else
                        {
                            return '<span class="label label-danger">Deshabilitado</span>';                            
                        }
                    }
                },
                {data: 'shop'},
                {data: 'btn'},

            ],
            "order": [[ 0, "desc" ]],            
            "responsive":  true,
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                { "targets":[0,1,2,3,4,5,6,7], "className": "desktop" },
                { "targets":[1,2,3,6], "className": "tablet, mobile" },

                { "orderable": false, "targets": [3,4,6] }
            ],
            "lengthMenu": [[5, 10, 25], [5, 10, 25]],
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
</script>
@endsection
