@extends('maestra-cliente.maestracliente')
@section('titulo', 'Completa tus datos - El Pibe')

@section ('centro')
<div class="htc__login__register bg__white pt--10 pb--30">
    <div class="container">
        @if(!$customer->verifiedData())
        <form class="row pt--10 pb--20 form_complete_data_account"  action="{{ url('/cuenta/completarPerfil') }}" method="post">
            @csrf  
            <!-- Start Title Area -->
            <div class="checkout-form pb--30 text-center">
                <h2 class="section-title-3"><i class="ti-user"></i> DATOS PERSONALES</h2><hr>
                <p>Rellene los sieguientes datos por favor.</p>
            </div>
            <input type="hidden" value="{{ $customer->id}}" name="id">
            <!-- End Title Area -->
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group  pt--20" >
                    <div class="row">
                        
                        @component('components.input', ['name' => 'name','title' => 'Nombre','col' => 'col-md-6','value' => $customer->name])
                        @slot('attributes') 
                            maxlength="150" 
                            onkeypress= "return soloLetras(event)"
                        @endslot
                        @endcomponent
                      
                      
                        @component('components.input', ['name' => 'last_name','title' => 'Apellidos','col' => 'col-md-6','value' => $customer->last_name])
                         @slot('attributes') 
                            maxlength="150" 
                            onkeypress= "return soloLetras(event)"
                        @endslot
                        @endcomponent
                    </div>
                    <div class="row">
                        @component('components.input', ['name' => 'email','title' => 'E-mail','col' => 'col-md-6','value' => $customer->email])
                         @slot('attributes') 
                            maxlength="150" 
                            onkeypress= "return letrasNumeros(event)"
                        @endslot
                        @endcomponent

                        @component('components.input', [ 'name' => 'dni','title' => 'Número de DNI','col' => 'col-md-6','value' => $customer->dni, 'maxlength'=>'8', ''])
                        @slot('attributes') 
                            maxlength="8" 
                            onkeypress= "return soloNumeros(event)"
                        @endslot
                        @endcomponent
                    </div>  
                    
                    <div class="row">
                        @component('components.input', ['name' => 'celphone','title' => 'Celular','col' => 'col-md-6','value' => $customer->celphone])
                        @slot('attributes') 
                            maxlength="9" 
                            onkeypress= "return soloNumeros(event)"
                        @endslot
                        @endcomponent

                        @component('components.input', [ 'name' => 'phone', 'title' => 'Teléfono','col' => 'col-md-6','value' => $customer->phone, 'maxlenght' =>'8'])
                        @slot('attributes') 
                            maxlength="12" 
                            onkeypress= "return letrasNumeros(event)"
                        @endslot
                        @endcomponent
                    </div> 

                   
                </div>
            <input name="_method" type="hidden" value="PUT">
            <div class="contact-btn pb--30 text-center">
                <button type="submit" class="fv-btn">Proceder con el Método de Entrega</button>
            </div>

            </div>

        </form>
        @else
            <div class="text-center cart-empty ptb--100">
                <i class="cart-empty-i ti-user"></i> 
                <h2 class=" pt--20">DATOS COMPLETOS</h2> 
                <hr>
                <p>Tus datos ya fueron completados.</p><br>
                <a class="htc__btn shop__now__btn" href="{{ url('/') }}">Ir a Inicio</a>
            </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
@endsection