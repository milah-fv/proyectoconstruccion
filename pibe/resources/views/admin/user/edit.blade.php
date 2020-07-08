@extends('maestra-cliente.maestraadmin')
@section('micss')
    <link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
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
            <h3 class="text-themecolor">Editar Empleado</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="javascript:void(0)">Inicio</a></li>
                <!-- <li class="breadcrumb-item">Seguridad</li> -->
                <li class="breadcrumb-item">Empleado</li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>

    <form class="row" action="{{ url("admin/user/$user->id") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Editar Empleado</h4>
                    
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-row my-5">
                        <div class="col-md-3 text-center p-b-10">
                            <div class="profile-photo-round">
                                <img src="{{ asset($user->avatar)  }}" alt="" id="img_destino">
                                <input type="file" class="input-file" name="avatar">
                            </div>
                            <h6 class="profile-photo-text {{ $errors->has('avatar') ? 'text-danger' : '' }}">{{ $errors->has('avatar') ? $errors->first('avatar') : 'ELEGIR LA FOTO' }}</h6>
                        </div>
                        <div class="col-md-9">
                            @component('components.input', ['name' => 'name'])
                                @slot('icon') icon icon-user @endslot
                                @slot('title') Nombre:@endslot
                                @slot('value') {{ $user->name }} @endslot
                            @endcomponent

                            @component('components.input', ['name' => 'last_name'])
                                @slot('icon') icon icon-user @endslot
                                @slot('title') Apellidos:@endslot
                                @slot('value') {{ $user->last_name }} @endslot
                            @endcomponent

                            @component('components.input', ['name' => 'celphone','type' => 'text'])
                                @slot('icon') icon icon-phone @endslot
                                @slot('title') Celular: @endslot
                                @slot('value') {{ $user->celphone }} @endslot
                               <!--  @slot('max-length') '12' @endslot -->
                            @endcomponent

                            @component('components.input', ['name' => 'email','type' => 'email'])
                                @slot('icon') icon icon-envelope @endslot
                                @slot('title') Correo:@endslot
                                @slot('value') {{ $user->email }} @endslot
                            @endcomponent

                           
                           
                            <input name="_method" type="hidden" value="PUT">

                            <button class="btn btn-success btn-rounded" type="submit"><i class="icon icon-check"></i> Actualizar Empleado</button>
                            <a href="{{ url('admin/user') }}" class="btn btn-inverse">Cancelar</a>
                        
                        </div>
                    </div>                                        
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function()
    {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
