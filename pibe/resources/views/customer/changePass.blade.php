@extends('customer.menuProfileSidebar')
@section('content')
<div class="row">
    <div class="foto-perfil-edit col-lg-12">
        <div class="row">
            <!-- <form class="ckeckout-left-sidebar"  action="{{ url('customer/edit_profile') }}" method="post"> -->
                <!-- Start Title Area -->

                <div class="checkout-form">
                    <h2><i class="ti-lock"></i> Cambiar Contraseña</h2>
                </div><hr>
               
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

                            <button class="btn btn-success btn-rounded changePassword"> <i class="ti-save"> </i> Actualizar Contraseña</button>
                        </div>
                    </div>
                <!-- <input name="_method" type="hidden" value="PUT"><br>
                <div class="col-sm-12 text-center" >
                    <button type="submit" class="btn btn-success"><i class="ti-save"> </i> GUARDAR CAMBIOS</button>
                </div> -->
            <!-- </form> -->
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
                url: '/profile/changePass',
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