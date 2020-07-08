@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Cupones')
@section('micss')
    <link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
  	<link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">   
    <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                        
                    </li>
@endsection
@section('centro')

	<div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Crear Nuevo Cupón</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/coupon') }}">Listado de cupones</a></li>
                <li class="breadcrumb-item active">Añadir nuevo</li>
            </ol>
        </div>  
    </div>
    <form  class="row" action="{{ url('admin/coupon') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Datos del Cupón</h2> <br>
                    <div class="floating-labels m-t-40">
                    	<div class="row">
                    		<div class="col-md-6">
                    			@component('components.input', ['name' => 'title','title' => 'Título del Cupón*'])
                                @slot('attributes') 
                                    maxlength="100"
                                    required="true"
                                @endslot
                                @endcomponent
                    		</div>
                    		<div class="col-md-6">
                    			@component('components.input', ['name' => 'code','title' => 'Codigo*', 'required'])
                                @slot('attributes') 
                                    maxlength="10"
                                    minlength="5"
                                    required="true"
                                @endslot
                    			@endcomponent
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-6">
                    			@component('components.select',['name' => 'type','title' => 'Tipo*',
								'id' => 'typeSelect','items' => ['fijo','porcentaje'] ])
								@endcomponent
                    		</div>
                    		<div class="col-md-6" id="valueInput">
                    			@component('components.input', ['name' => 'value', 'id' => 'value','title' => 'Valor del Descuento*'])
                                @slot('attributes') 
                                    request="true"
                                    onkeypress= "return soloNumeros(event)"
                                    maxlenght="8"
                                @endslot
                    			@endcomponent
                                @if ($errors->has('percent_off'))
                                    <span class="form-control-feedback text-danger">
                                        <small>{{ $errors->first('percent_off') }}</small>
                                    </span>
                                @endif
                    		</div>
                            <div class="col-md-6" id="percentInput">
                                @component('components.input', ['name' => 'percent_off', 'id' => 'percent_off','title' => 'Porcentaje de Descuento*'])
                                @slot('attributes') 
                                    request="true"
                                    onkeypress= "return soloNumeros(event)"
                                    maxlenght="8"
                                @endslot
                                @endcomponent
                            </div>
                    	</div>
                        <div class="row">
                            <div class="col-md-6">
                                @component('components.input', ['name' => 'min_amount', 'id' => 'min_amount','title' => 'Monto Minimo de Compras'])
                                @slot('attributes') 
                                    onkeypress= "return soloNumeros(event)"
                                    maxlenght="8"
                                @endslot
                                @endcomponent
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label for="expiry_date" class="form-group"><i class="icon icon-calendar"> </i>Fecha de Expiracion</label> 
                                    <input type="text" name="expiry_date" id="expiry_date" autocomplete="off" required> 
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label for="published" class="form-group"><i class="icon icon-tag"> </i>¿Publicado?</label><br>
                                    <input class="form-group" type="radio" id="published" name="published" value="1" @if(old('published') ==  1) checked="checked" required @endif />Si
                                    <input class="form-group" type="radio" id="published" name="published" value="0" @if(old('published') ==  0) checked="checked" required @endif />No
                                    @if ($errors->has('published'))
                                        <span class="text-danger">
                                                       {{ $errors->first('published') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group" >
                                    <label for="enabled" class="form-group"><i class="icon icon-check"> </i>¿Habilitado?</label><br>
                                    <input class="form-group" type="radio" id="enabled" required name="enabled" value="1" @if(old('enabled') ==  1) checked="checked"  @endif />Si
                                    <input class="form-group" type="radio" id="enabled" required name="enabled" value="0" @if(old('enabled') ==  0) checked="checked"  @endif />No
                                    @if ($errors->has('enabled'))
                                        <span class="text-danger">
                                                       {{ $errors->first('enabled') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>
                        <button class="btn btn-success btn-rounded" type="submit">
                            <i class="icon icon-check"></i> Crear
                        </button>
                        <a href="{{ url('/admin/coupon') }}" class="btn btn-inverse">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')

<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      $( function() {
        $( "#expiry_date" ).datepicker({
            minDate:0,
            dateFormat: 'yy-mm-dd',
        });
      });
  </script>
<script>
    $(document).ready(function()
    {
        // Basic
        $('.dropify').dropify();
    });

    if ($('#typeSelect').val() == 'fijo')
    {
      $("#valueInput").show();
      $("#percentInput").hide();
      
    };

    $('#typeSelect').change(function() {

      if ($('#typeSelect').val() == 'fijo')
      {
        $("#valueInput").show();
        $("#percentInput").hide();
        $("#percent_off").val(null);
      };

      if ($('#typeSelect').val() == 'porcentaje')
      {
        $("#percentInput").show();
        $("#valueInput").hide();
        $("#value").val(null);
        }
      
    });

</script>


@endsection
