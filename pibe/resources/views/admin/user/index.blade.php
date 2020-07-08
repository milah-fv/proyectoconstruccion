@extends('maestra-cliente.maestraadmin')
@section('micss')
<link href="{{ asset('plugins/footable/css/footable.core.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('plugins/toast-master/css/jquery.toast.css') }}">
@endsection
@section('menu-empleados')
                    <li class="nav-item ">
                        <a href="/admin/user" class="nav-link active">
                            <i class="icon icon-people"></i> Empleados 
                        </a>
                    </li>
@endsection            
@section('centro')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Empleado</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
            <!-- <li class="breadcrumb-item">Seguridad</li> -->
            <li class="breadcrumb-item active">Empleados</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                    <thead>
                        <tr>
                            <th data-sort-initial="true" data-toggle="true"> Nombre </th>
                            <th data-hide="phone"> Apellidos </th>
                            <th> Avatar </th>
                            
                            <!-- <th data-hide="phone"> Rol </th> -->
                            <th data-hide="all"> N° Celular </th>
                            <th data-hide="all"> Email </th>
                            <th data-sort-ignore="true" class="min-width"> Acciones </th>
                            @csrf
                        </tr>
                    </thead>
                    <div class="row m-t-20">
                        <div class="col-6">
                            <div class="form-group">
                                <a href="{{ url('admin/user/create') }}" class="btn waves-effect waves-light btn-success btn-rounded btn-sm text-white">Nuevo Empleado</a>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class="form-group">
                                <input id="demo-input-search2" type="text" placeholder="Buscar" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="AdminTR{{ $user->id }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td><img src="{{ asset($user->avatar) }}" alt="" width="50"></td>
                        <td>{{ $user->celphone }}</td>
                        <td>{{ $user->email }}</td>
                            <td >
                            <a style="margin: 0px 10px" href="{{ url("/admin/user/$user->id/edit") }}" > <i class="icon icon-pencil text-inverse m-r-10"></i> </a>
                            <a href="javascript:void(0)" data-id="{{$user->id}}" id="DeleteAdmin"> <i class="icon icon-close text-danger"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="text-right">
                                    <ul class="pagination pagination-split m-t-30">
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/footable/js/footable.all.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/footable-init.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $(document).on('click','#DeleteAdmin',function() {
        var id = $(this).data('id');
        $.ajax({
            type: 'delete',
            url: '/admin/user/'+ id,
            data: {
            '_token': $('input[name=_token]').val(),
            'id': id
            },
            success: function(data) 
            {
                $('#AdminTR'+ id).remove();
                $.toast({
                    heading: 'Se elimino empleado con exito..',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 2500,
                    stack: 6
                });
            },
            error: function(data) 
            {
            console.log(data);
            },

        });
    });
</script>
@endsection