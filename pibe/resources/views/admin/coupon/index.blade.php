@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Cupones')
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
                                <a href="/admin/coupon" class="nav-link active">
                                    <i class="icon icon-wrench"></i> Cupones
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/paymentOptions" class="nav-link">
                                    <i class="icon icon-wrench"></i> Opciones de Pago
                                </a>
                            </li>
                        </ul>
                        
                    </li>
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Cupones</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item">Listado de Cupones</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                <div class="row m-t-20">
                            <div class="col-6">
                                <div class="form-group">
                                    <a href="{{ url('admin/coupon/create') }}" class="btn waves-effect waves-light btn-success btn-sm text-white btn-rounded">Añadir nuevo</a>
                                </div>
                            </div>
                        </div>
                    <table id="table_coupons" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> Posición </th>
                                <th> Titulo </th>
                                <th> Código </th>                                                
                                <th> Tipo </th>
                                <th> Valor </th>
                                <th> Porcentaje </th>
                                <th> Publicado </th>
                                <th> Habilitado </th>
                                <th> Acciones </th>                                
                                <th> Fecha de Expiracion </th>  
                                <th> Monto Mínimo de Compras</th>  
                                @csrf
                            </tr>
                        </thead>
                        
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
<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.responsive.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.editor.min.js') }}"></script>
<!-- <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>   -->
<script type="text/javascript">
    $(document).ready(function() 
    {
        var my_sortable = $('#table_coupons').dataTable( 
        {
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('admin/couponJson') }}",
            "columns":[
                {data: 'created_at'},
                {data: 'title'},
                {data: 'code'},
                {data: 'type',
                render: function(data)
                    {
                        if(data == 'fijo') {
                            return '<span class="label label-nuevo">Fijo</span>';
                        }
                        else
                        {
                            return  '<span class="label label-oferta">Porcentaje</span>';
                        }
                    }
                       
                },
                {data: 'value', 
                render: function(data) 
                    {
                        if(data != null)
                        {
                            return '- S/. '+ data ;                         
                        }
                        else
                        {
                            return '   ';
                        }
                    }
                },
                {data: 'percent_off', 
                render: function(data) 
                    {
                        if(data != null)
                        {
                            return '- '+ data +'%' ;                         
                        }
                        else
                        {
                            return ' ';
                        }
                    }
                },
                {data: 'published', 
                render: function(data) 
                    {
                        if(data == 1)
                        {
                            return '<span class="label label-inverse">Si</span>' ;                         
                        }
                        else
                        {
                            return 'No';
                        }
                    }
                },
                {data: 'enabled', 
                render: function(data) 
                    {
                        if(data == 1)
                        {
                            return '<span class="label label-inverse">Si</span>' ;                         
                        }
                        else
                        {
                            return 'No';
                        }
                    }
                },
                {data: 'btn'},
                {data: 'expiry_date'},
                {data: 'min_amount',
                render: function(data) 
                    {   if(data != null)
                        {
                        return 'S/. '+ data;
                        }
                        else
                        {
                            return '(Sin monto Mínimo)';
                        }

                    }
                },

            ],
            "order": [[ 0, "desc" ]],  
            // "rowReorder":
            // {
            //     dataSrc: 'id',
            //     update:false
            // },
            "responsive":  true,
            "columnDefs": [
                // { "orderable": true, "className": 'reorder', "targets": [1,3,6,7] },
                // { "orderable": false, "targets": '_all' },
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                { "targets":[0,1,2,3,4,5,8], "className": "desktop" },
                { "targets":[1,2,3,8], "className": "tablet, mobile" },
                { "targets":[9,10], "className": "none" },
                { "orderable": false, "targets": [1, 2,8] }
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

    my_sortable.on('row-reorder.dt', function (e, details, edit) 
    {
        if (details.length > 0) 
        {
            var positions = [];
            for (var i = 0; i < details.length; i++) 
            {
                var idEncrypted     = $(details[i].node).find('td:first-child').text();
                var fromPosition    = details[i].oldData;
                positions.push(fromPosition);
            }
            console.log(positions);
            $.ajax({
                type: 'put',
                url: '/admin/coupon/'+1,
                data: 
                {
                    '_token': $('input[name=_token]').val(),
                    'items': positions,
                },
                success: function(data) 
                {
                    console.log(data);
                },
                error: function(data) 
                {
                    console.log(data);                 
                }
			    });          
        }
        });
    });

    $(document).on('click','#DeleteCoupon', function() 
	{
		var urlSend = $(this).data('url');
		swal({
			title: "¿Eliminar cupón?",
			text: "Se perdera toda la información del cupón, y no se puede revertir",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Eliminar Cupón',
            confirmButtonColor: '#e85b5b',
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#848484',
			closeOnConfirm: false,
			closeOnCancel: false
			}).then((result) => 
            {
                if (result.value) 
                {
                    $('#deleteCouponForm').attr('action', urlSend);
                    $('#deleteCouponForm').trigger('submit');
                    swal({
                    type: 'success',
                    title: 'Cupón eliminado exitosamente!'
                    })
                }

		});
	});
</script>
@endsection