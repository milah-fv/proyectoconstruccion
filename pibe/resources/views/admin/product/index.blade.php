@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Productos')
@section('micss')
    <link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
<!--     <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"> -->
@endsection
@section('menu-productos')
                    <li class="nav-item nav-dropdown">
                        <a href="{{ url('/admin/product')}}" class="nav-link active">
                            <i class="icon icon-grid"></i> Productos 
                        </a>
                    </li>
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Productos</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Lista de productos</li>
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
                                <th> Fecha </th>
                                <th> Nombre </th>
                                <th> Imagen </th>
                                <th> Precio </th>
                                <th> Categoría </th>                                 
                                <th> Stock </th>
                                <th> Estado </th>
                                <th> Peso </th>
                                <th> Color </th>
                                <th> Acciones </th>                                
                                <th> Tamaño </th>
                                <th> Caracteristicas </th>
                                <th> Descripción </th>
                                @csrf
                            </tr>
                        </thead>
                        <div class="row m-t-20">
                            <div class="col-6">
                                <div class="form-group">
                                    <a href="{{ url('admin/product/create') }}" class="btn  btn-success btn-sm text-white btn-rounded">Añadir producto</a>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/datatables/dataTables.responsive.js') }}" type="text/javascript" ></script>
<!-- <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script> -->
<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#table_product').dataTable( 
        {
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('admin/productJson') }}",
            "columns":[
                {data: 'created_at'},
                {data: 'name'},
                {data: 'cover_image',
                    render: function(data) 
                    {
                        return "<img src=\"" + data + "\" height=\"50\"/>";
                    }
                },
                {data: 'price'},
                {data: 'category.name'},
                {data: 'stock'},
                {data: 'state',
                    render: function(data) 
                    {
                        if(data == 'Nuevo')
                        {
                            return '<span class="label label-nuevo">'+ data +'</span>';                         
                        }
                        else if(data == 'Oferta')
                        {
                            return '<span class="label label-oferta">'+ data +'</span>';                          
                        }
                        else
                        {
                            return '<span class="label label-dark">'+ data +'</span>';                            
                        }
                    }
                },
                {data: 'weight'},
                {data: 'color.color',
                     render: function(data) 
                    {
                        return  '<span class="label border_color" style="background:'+ data +'">&nbsp</span>';
                    }
                },
                {data: 'btn'},
                {data: 'sizes',
                    render: function(data) 
                    {
                        if(data.length > 0)
                        {
                            var list = '';
                            $.each(data, function(i, item) 
                            {
                                list += '<li> Talla: ' + item.name + ' - Cantidad '+ item.pivot.quantity+'</li>';
                            });
                            return '<ul>'+list+'</ul>';	
                        }
                        return '';                      											                      
                    }
                },
                {data: 'features'},
                {data: 'description'},
            ],
            "order": [[ 0, "desc" ]],            
            "responsive":  true,
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                { "targets":[0,1,2,3,4,9], "className": "desktop" },
                { "targets":[0,1,2,9], "className": "tablet" },
                { "targets":[7,8,10,11,12], "className": "none" },
                { "targets":[1,9], "className": "tablet, mobile" },

                { "orderable": false, "targets": [9,2] }
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
    });
    $(document).on('click','#DeleteProduct',function() 
    {
        var id = $(this).data('id');
        var table = $('#table_product').DataTable();
        var row = $(this).parents('tr');

        	swal({
            title: '¿Eliminar producto?',
            text: "Se perdera toda la información del producto, y no se puede revertir",
            type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Eliminar producto',
            confirmButtonColor: '#e85b5b',
			cancelButtonText: 'Cancelar',
            cancelButtonColor: '#848484',
			preConfirm: (value) => 
			{
				return new Promise((resolve) => 
				{
					$.ajax({
                        type: 'delete',
                        url: '/admin/product/'+ id,
                        data: 
                        {
                            '_token': $('input[name=_token]').val(),
                            'id': id
                        },
						success: function(data) 
						{
							resolve()
							table.row(row).remove().draw();
						},
						error: function(data) 
						{
                            console.log(data);
                            swal({
                            type: 'error',
                            title: 'Error al eliminar',
                            text: "El producto esta asociado con alguna venta",
                            confirmButtonColor: '#e85b5b',
                            confirmButtonText: 'Aceptar',
                            // text: data.responseJSON.error
                        });
							
						}
					});
				});	
			},
			allowOutsideClick: () => !swal.isLoading()
		}).then((result) => 
		{
			if (result.value) 
			{
				swal({
				type: 'success',
				title: 'Producto eliminado exitosamente!'
				})
			}
    	});
    });
</script>
@endsection
