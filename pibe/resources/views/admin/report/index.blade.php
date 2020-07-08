@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Reportes')
@section('micss')
<link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection
@section('menu-reportes')
                    <li class="nav-item ">
                        <a href="/admin/reports" class="nav-link active">
                            <i class="icon icon-chart"></i> Reportes 
                        </a>
                    </li>
@endsection
@section ('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Reportes</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Reportes</li>
            </ol>
        </div>
    </div>
    <div class="row p-t-20">
        <div class="col-12 card">
            <div class="card-body row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item list-pibe list-group-item-action active" id="list_products_list">Top 10 productos más vendidos</a>
                        <a href="{{ url('admin/reports/topCustomer') }}" class="list-group-item list-pibe list-group-item-action" id="list_customers_list">Mejores clientes</a>
                        <a href="{{ url('admin/reports/purchases') }}" class="list-group-item list-pibe list-group-item-action " id="list_orders_list">Ventas por fecha</a>
                        
                        <a href="{{ url('admin/reports/stockProductForm') }}" class="list-group-item list-pibe list-group-item-action " id="list_orders_list">Productos con bajo stock</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label >Fecha Inicial</label>
                            <input type="date" class="form-control" required value="{{ date('Y-m-d') }}" id="date_init">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Fecha Final</label>
                            <input type="date" class="form-control" required value="{{ date('Y-m-d') }}" id="date_end">
                        </div>
                        <div class="col-md-3 align-self-center">
                            <button class="btn btn-success" id="search" type="button">Buscar</button>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                @csrf
                                <table id="table_report" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th> Top</th> 
                                            <th>Nombre</th>                                                                                   
                                            <th> Precio</th>
                                            <th> Categoría</th>                                                                                        
                                            <th> Cantidad Vendida</th>     
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <div>
                </div>   
            </div>
        </div>
     </div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.responsive.js') }}" type="text/javascript" ></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" type="text/javascript" ></script>

<script type="text/javascript">
    $(document).ready(function() 
    {
        fetch_data();
        function fetch_data(date_init='', date_end='')
        {
            $('#table_report').dataTable( 
            {
                "processing" : true,
                "serverSide" : true,
                "dom": 'Bfrtip',
                "ajax" : 
                {
                    url:"reports/topProduct",
                    type:"POST",
                    data:
                    {
                        '_token': $('input[name=_token]').val(),
                        'date_init': date_init, 
                        'date_end': date_end
                    }
                },
                "columns":[
                    {data: 'top'},
                    {data: 'name'},
                    {data: 'price'},   
                    {data: 'category.name'},                                                                                 
                    {data: 'qty'},
                                                                
                                        
                ],
                "buttons": 
                [

                    'excel', 
                    {
                        extend:'pdf',
                        title:'Los 10 productos mas vendidos'
                    },
                    {
                        extend:'print',
                        title:'Los 10 productos mas vendidos',
                    },
                ],
                "order": [[ 0, "asc" ]],            
                "responsive":  true,
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": true,
                        "searchable": true
                    },
                    { "targets":[0,1,2,4], "className": "desktop" },
                    { "targets":[3], "className": "none" },                    
                    { "targets":[0,1], "className": "tablet, mobile" },
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
                    "infoFiltered": "(filtrado de _MAX_ total registros)"
                },
            });
        }

         $('#search').click(function()
         {
            var date_init = $('#date_init').val();
            var date_end = $('#date_end').val();
            $('#table_report').DataTable().destroy();
            fetch_data(date_init, date_end);
        });

    });

 
</script>
@endsection