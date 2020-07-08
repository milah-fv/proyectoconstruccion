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
<div class="row">
     <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{ asset($user->avatar) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10 text-capitalize">{{ $user->name }}</h4>
                     <h6 class="card-subtitle">{{ $user->rol }}</h6>
                </center>
            </div>
            <div><hr></div>
            <div class="card-body"> <small class="text-muted">Correo </small>
                <h6>{{ $user->email }}</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <!-- <li class="nav-item"> <a class="nav-link {{ $errors->any() ? '' : 'active' }}" data-toggle="tab" href="#home" role="tab">Inicio</a> </li>  -->               
                <li class="nav-item"> <a class="nav-link {{ $errors->any() ? '' : 'active' }}" data-toggle="tab" href="#settings" role="tab">Información personal</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reset-password" role="tab">Cambiar contraseña</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                 <div class="tab-pane {{ $errors->any() ? '' : 'active' }}" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="row d-flex justify-content-center" action="{{ url("admin/profile/updated/$user->id") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="col-md-3 text-center">
                                <div class="profile-photo-round">
                                    <img src="{{ asset($user->avatar)  }}" alt="" id="img_destino">
                                   <input type="file" name="avatar" class="input-file">
                                </div>
                               <h6 class="profile-photo-text {{ $errors->has('avatar') ? 'text-danger' : '' }}">{{ $errors->has('avatar') ? $errors->first('avatar') : 'Subir Imagen' }}</h6>
                            </div>
                            <div class="col-lg-7">
                                <div class="floating-labels  m-t-20">
                                    <div class="form-group {{ $errors->has('name') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                                        <label for="name"><i class="icon icon-user"></i> Nombres</label>
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}" id="name" name="name" value="{{ old( 'name', $user->name) }}" >
                                        @if ($errors->has('name'))
                                            <span class="form-control-feedback text-danger">
                                                <small>{{ $errors->first('name') }}</small>
                                            </span>
                                        @endif    <br> 
                                    </div>
                                    <div class="form-group {{ $errors->has('last_name') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                                        <label for="wlastName2"><i class="mdi mdi-account"></i> Apellidos</label>
                                        <input type="text" class="form-control {{ $errors->has('last_name') ? 'form-control-danger' : '' }}" id="wlastName2" name="last_name" value="{{ old( 'last_name', $user->last_name) }}" required>
                                        @if ($errors->has('last_name'))
                                            <span class="form-control-feedback text-danger">
                                                <small>{{ $errors->first('last_name') }}</small>
                                            </span>
                                        @endif   <br> 
                                    </div> 
                                    <div class="floating-labels m-t-40">
                                        <div class="form-group {{ $errors->has('email') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                                            <label for="wemailAddress2"><i class="mdi mdi-email"></i> Correo</label>
                                            <input type="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" id="wemailAddress2" name="email" value="{{ old( 'email', $user->email) }}">
                                            @if ($errors->has('email'))
                                                <span class="form-control-feedback text-danger">
                                                    <small>{{ $errors->first('email') }}</small>
                                                </span>
                                            @endif <br> 
                                        </div> 
                                    </div>    
                                    <div class="floating-labels m-t-40">
                                        <div class="form-group {{ $errors->has('celphone') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                                            <label for="celphone2"><i class="icon icon-phone"></i> N° Celular</label>
                                            <input type="celphone" class="form-control {{ $errors->has('celphone') ? 'form-control-danger' : '' }}" id="celphone2" name="celphone" value="{{ old( 'celphone', $user->celphone) }}" minlength="6" maxlength="9" required>
                                            @if ($errors->has('celphone'))
                                                <span class="form-control-feedback text-danger">
                                                    <small>{{ $errors->first('celphone') }}</small>
                                                </span>
                                            @endif <br> 
                                        </div> 
                                    </div>  
                                    <input name="_method" type="hidden" value="PUT">    
                                    <button class="btn btn-success btn-rounded" type="submit">Actualizar Perfil</button>                         
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="reset-password" role="tabpanel">
                    <div class="card-body">
                        <div class="floating-labels  m-t-20">
                             @csrf
                             <div class="alert alert-danger hide"  id="messagechangePassword"></div><br>
                            <div class="form-group m-b-40">
                                <label for="current-password"><i class="mdi mdi-lock"></i> Contraseña actual</label>
                                <input type="password" name="current-password" class="form-control current-password" id="current-password"  required>  <br>
                            </div>

                            <div class="form-group m-b-40">
                                <label for="password"><i class="mdi mdi-lock"></i> Nueva contraseña</label>
                                <input type="password" name="new-password" class="form-control new-password" id="password" name="password" required> <br>
                            </div>

                            <div class="form-group m-b-30">
                                <label for="new-password_confirmation"><i class="mdi mdi-lock"></i> Repite la nueva contraseña</label>
                                <input type="password" name="new-password_confirmation" class="form-control new-password_confirmation" id="new-password_confirmation" required>  <br>
                            </div>

                            <button class="btn btn-success btn-rounded changePassword">Actualizar Contraseña</button>
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-pane {{ $errors->any() ? '' : 'active' }}" id="home" role="tabpanel">
                    <div class="card-body">
                        <div class="row d-flex align-items-sm-center">
                            <div class="col-lg-7">
                                <h1 class="text-center">¡Hola {{ $user->name  }}! <br> Bienvenido...</h1>
                            </div>
                            <div class="col-lg-5">
                            <img src="{{ asset('images/hola.gif') }}" class="img-fluid" alt="">    
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).on('click','.changePassword',function(ev) 
        {
            $.ajax({
                type: 'PUT',
                url: '/admin/changePassword',
                data:   
                {
                    '_token': $('input[name=_token]').val(),
                    'current-password' : $('.current-password').val(),
                    'new-password': $('.new-password').val(),
                    'new-password_confirmation' : $('.new-password_confirmation').val()
                },
                success: function(data) 
                {
                    $('#messagechangePassword').removeClass('hide');
                    if(!data.success) 
                    {
                        $('#messagechangePassword').removeClass('alert-success');
                        $('#messagechangePassword').addClass('alert-danger m-b-40');
                        $('#messagechangePassword').text(data.error);                            
                    }
                    else
                    {
                        $('#messagechangePassword').removeClass('alert-danger');
                        $('#messagechangePassword').addClass('alert-success m-b-40');

                        $('.new-password').val(null);
                        $('.new-password').blur();

                        $('.current-password').val(null);
                        $('.current-password').blur();

                        $('.new-password_confirmation').val(null);
                        $('.new-password_confirmation').blur(); 
                                               
                        $('#messagechangePassword').text(data.success);
                        setTimeout(function(){
                            $('#messagechangePassword').addClass('hide')
                        },3000);
                    }
                    
                },
                error: function(data)
                {
                    $('#messagechangePassword').removeClass('alert-success');
                    $('#messagechangePassword').addClass('alert-danger m-b-40');
                    $('#messagechangePassword').removeClass('hide');
                    $.each(data.responseJSON.errors,function(i,error)  
                    {
                        $('#messagechangePassword').html(error);
                    });
                    
                }
            });
        });
    </script>
@endsection