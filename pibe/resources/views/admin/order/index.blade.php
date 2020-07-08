@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Ventas')
@section('micss')
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
            <h3 class="text-themecolor">Ventas</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Listado de ventas</li>
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
                                <th> created_at</th>
                                <th> Pedido N°</th>
                                <th> Cliente </th>  
                                <th> Celular </th>                                                               
                                <th> Estado de pedido </th>
                                <th> Monto de Pedido </th>
                                <th> Acciones </th>  
                                <th> Email: </th>
                                <th id="depa"> Direccion de Envío: </th>    
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
<script src="{{ asset('js/ubigeo.js') }}"></script>   
<script type="text/javascript">

    $(document).ready(function() 
    {
        $('#table_product').dataTable( 
        {
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('admin/orderJson') }}",
            "columns":[
                {data: 'created_at.date'},
                {data: 'id'},
                {data: 'customer',
                    render: function(data) 
                    {
                        return data.name +' '+ data.last_name ;
                    }
                },
                {data: 'customer.celphone'},
                {data: 'state.name',
                    render: function(data) 
                    {
                        if(data == 'completado')
                        {
                            return '<span class="label label-success">'+ data +'</span>';                         
                        }
                        else if(data == 'cancelado' || data == 'fallido')
                        {
                            return '<span class="label label-danger">'+ data +'</span>';                          
                        }
                        else if(data == 'pendiente de pago')
                        {
                            return '<span class="label label-custom">'+ data +'</span>';                          
                        }
                        else
                        {
                            return '<span class="label label-dark">'+ data +'</span>';                            
                        }
                    }
                },
                {data: 'payment.amount',
                    render: function(data) 
                    {
                        return  'S/. ' + data;
                    }
                },
                {data: 'btn'},
                {data: 'customer.email'},
                {data: 'shipping',
                     render: function(data) 
                        {
                            if (data == null) {
                                return  'Recojo en tienda';
                            }

                            else

                            var ubigeo = window.ubigeo;
                            var departamentos = ubigeo.departamentos;
                            var provincias    = ubigeo.provincias[data.departament];
                            var province = data.province;
                            var departament = data.departament;

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
                                var prov3 = getState(provincias, province);
                                var dpt3 = getState(departamentos, departament);
                            }
                            
                            
                                return  data.address +' - <b> Referencia: </b> <label>'+ data.referenceAddress+ '</label><br> \
                            <b> Departamento: </b>\
                            <label id="departamentLi" >'+dpt3+'</label>\
                            <br> <b> Provincia: </b> \
                            <label id="provinceLi" >'+prov3+'</label>';
                            
                        }

                },
            ],
            "order": [[ 0, "desc" ]],            
            "responsive":  true,
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": true
                },
                { "targets":[0,1,2,3,4,5,6], "className": "desktop" },
                { "targets":[1,2,3,5,6], "className": "tablet, mobile" },
                { "targets":[7,8], "className": "none" },
                { "orderable": false, "targets": [3,6] }
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
