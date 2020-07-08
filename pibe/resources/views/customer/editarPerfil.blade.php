@extends('customer.menuProfileSidebar')
@section('content')
<div class="row">
    <div class="foto-perfil-edit col-lg-12">
        <div class="row">
            <form class="ckeckout-left-sidebar"  action="{{ url('customer/edit_profile') }}" method="post">
                <!-- Start Title Area -->

                <div class="checkout-form">
                    <h2><i class="ti-user"></i> MIS DATOS PERSONALES</h2>
                </div><hr>
                @if (session('perfilEditado'))
                    <div class="alert alert-success">
                        {{ session('perfilEditado') }}
                    </div>
                @endif
                @csrf  
                <input type="hidden" value="{{ $customer->id}}" name="id">
                <!-- End Title Area -->
                <div class="form-group row pt--20">
                    @component('components.input', ['name' => 'name','title' => 'Nombre','col' => 'col-md-6','value' => $customer->name])
                        @slot('attributes') 
                            title="Solo letras por favor." 
                            onkeypress= "return soloLetras(event)"
                            required maxlength="150"
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'last_name','title' => 'Apellidos','col' => 'col-md-6','value' => $customer->last_name])
                        @slot('attributes') 
                            title="Solo letras por favor." 
                            maxlength="150" 
                            onkeypress= "return soloLetras(event)"
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'dni','title' => 'Numero de documento','col' => 'col-md-6','value' => $customer->dni])
                        @slot('attributes') 
                            maxlength="8" 
                            onkeypress= "return soloNumeros(event)"
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'email','title' => 'Email','col' => 'col-md-6','value' => $customer->email])
                        @slot('attributes') 
                            maxlength="150" 
                            onkeypress= "return letrasNumeros(event)"
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'celphone','margin' => '0px','title' => 'Nro de Celular','col' => 'col-md-6','value' => $customer->celphone])
                        @slot('attributes') 
                            maxlength="9" 
                            onkeypress= "return soloNumeros(event)" 
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'phone','margin' => '0px','title' => 'Nro de Teléfono','col' => 'col-md-6','value' => $customer->phone])
                        @slot('attributes') 
                            maxlength="12" 
                            onkeypress= "return letrasNumeros(event)"
                        @endslot
                    @endcomponent
                </div>
                <input name="_method" type="hidden" value="PUT"><br>
                <div class="col-sm-12 text-center" >
                    <button type="submit" class="btn btn-success"><i class="ti-save"> </i> GUARDAR CAMBIOS</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection