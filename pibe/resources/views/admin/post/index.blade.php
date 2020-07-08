@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Blog')
@section('micss')
    <link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/responsive.bootstrap.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"> -->
@endsection
@section('menu-blog')
                     <li class="nav-item ">
                        <a href="/admin/user" class="nav-link active">
                            <i class="icon icon-pencil"></i> Blog 
                        </a>
                    </li>
@endsection                
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Blog</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Lista de publicaciones</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="table_post" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> Fecha </th>
                                <th> Nombre </th>
                                <th> Imagen </th>
                                <th> Extracto </th>
                                
                                <th> Categoría </th> 
                                <th> Acciones </th>   
                                <th> Escrito por </th>
                                <!-- <th> Etiquetas </th>    -->                            
                                <th> Contenido </th>
                                
                                @csrf
                            </tr>
                        </thead>
                        <div class="row m-t-20">
                            <div class="col-6">
                                <div class="form-group">
                                    <a href="{{ url('admin/posts/create') }}" class="btn  btn-success btn-sm text-white btn-rounded">Añadir post</a>
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
        $('#table_post').dataTable( 
        {
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('admin/postsJson') }}",
            "columns":[
                {data: 'created_at'},
                {data: 'name'},
                {data: 'image',
                    render: function(data) 
                    {
                        return "<img src=\"" + data + "\" height=\"50\"/>";
                    }
                },
                {data: 'abstract'},
                {data: 'blog_category.name'},
                {data: 'btn'},
                {data: 'user',
                    render: function(data) 
                        {
                            return data.name +' '+ data.last_name ;
                        }
                    },
                // {data: 'tags',
                //     render: function(data) 
                //     {
                //         if(data.length > 0)
                //         {
                //             var list = '';
                //             $.each(data, function(i, item) 
                //             {
                //                 list += '<li> Talla: ' + item.name + ' - Cantidad '+ item.pivot.quantity+'</li>';
                //             });
                //             return '<ul>'+list+'</ul>'; 
                //         }
                //         return '';                                                                                        
                //     }
                // },

                {data: 'body'},
                
            ],
            "order": [[ 0, "desc" ]],            
            "responsive":  true,
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                { "targets":[0,1,2,3,4,5], "className": "desktop" },
                { "targets":[0,1,2,5], "className": "tablet" },
                { "targets":[6, 7], "className": "none" },
                { "targets":[1,5], "className": "tablet, mobile" },

                { "orderable": false, "targets": [2,5] }
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
    $(document).on('click','#DeletePost',function() 
    {
        var id = $(this).data('id');
        var table = $('#table_post').DataTable();
        var row = $(this).parents('tr');

        	swal({
            title: '¿Eliminar post?',
            text: "Se perdera toda la información del post, y no se puede revertir",
            type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Eliminar post',
            confirmButtonColor: '#e85b5b',
			cancelButtonText: 'Cancelar',
            cancelButtonColor: '#848484',
			preConfirm: (value) => 
			{
				return new Promise((resolve) => 
				{
					$.ajax({
                        type: 'delete',
                        url: '/admin/posts/'+ id,
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
                            text: "El post esta asociado con algo mas ",
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
				title: 'Post eliminado exitosamente!'
				})
			}
    	});
    });
</script>
@endsection
