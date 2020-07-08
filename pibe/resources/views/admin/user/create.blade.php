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
            <h3 class="text-themecolor">Crear Nuevo Empleado</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="javascript:void(0)">Inicio</a></li>
                <!-- <li class="breadcrumb-item">Seguridad</li> -->
                <li class="breadcrumb-item">Empleado</li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div>
    </div>
    <form  class="row" action="{{ url('/admin/user') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ">CREAR NUEVO EMPLEADO</h4>
                    <!-- <h6 class="card-subtitle">Esta información nos permitirá saber más acerca del usuario </h6> -->

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3 text-center">
                            <div class="profile-photo-round">
                                <img src="{{ asset('img_web/user/user.png')  }}" alt="" id="img_destino">
                                <input type="file" class="input-file" name="avatar">
                            </div>
                            <h6 class="profile-photo-text {{ $errors->has('avatar') ? 'text-danger' : '' }}">{{ $errors->has('avatar') ? $errors->first('avatar') : 'Subir Imagen' }}</h6>
                        </div>

                        <div class="col-lg-7">
                            @component('components.input', ['name' => 'name','title' => 'Nombres:'])
                                @slot('icon') icon icon-user @endslot
                            @endcomponent

                            @component('components.input', ['name' => 'last_name','title' => 'Apellidos:'])
                                @slot('icon') icon icon-user @endslot
                            @endcomponent

                            @component('components.input', ['name' => 'celphone','title' => 'N° Celular:','type' => 'text', 'maxlength' => '10'])
                                @slot('icon') icon icon-phone @endslot
                            @endcomponent   

                            @component('components.input', ['name' => 'email','title' => 'Correo:','type' => 'email'])
                                @slot('icon') icon icon-envelope @endslot
                            @endcomponent    

                            @component('components.input', ['name' => 'password','title' => 'Contraseña:','type' => 'password'])
                                @slot('icon') icon icon-lock @endslot
                            @endcomponent  

                            @component('components.input', ['name' => 'password_confirmation','title' => 'Repite la contraseña:','type' => 'password'])
                                @slot('icon') icon icon-lock @endslot
                            @endcomponent          

                            <button class="btn btn-success btn-rounded" type="submit"><i class="icon icon-check"></i> Crear</button>
                            <a href="{{ url('admin/user') }}" class="btn btn-inverse">Cancelar</a>                                                
                        </div>

                    </div>                                        
                </div>
            </div>
        </div>
    </form>
@endsection
