@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Opciones de Pago')
@section('micss')
  <link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
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
                                <a href="/admin/coupon" class="nav-link ">
                                    <i class="icon icon-wrench"></i> Cupones
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/paymentOptions" class="nav-link active">
                                    <i class="icon icon-wrench"></i> Opciones de Pago
                                </a>
                            </li>
                        </ul>
                        
                    </li>
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Editar</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/paymentOptions') }}">Listado de categorías</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
    <form  class="row" action="{{ url("admin/paymentOptions/$payment->id") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$payment->name}}</h2><br>
                   
                        <label class="p-l-10 label-swicht" for="actived" style="margin: 0px 10px;">Habilitado</label>  
                        <label class="switch m-l-10"> <br>
                        <input type="checkbox" name="actived" id="actived" {{ $payment->actived == 1 ? 'checked': ''}}>
                        <span class="slider round_switch"></span>
                        </label> <br> <hr>
                        <input name="_method" type="hidden" value="PUT">
                        <input name="id" type="hidden" value="{{ $payment->id }}"> 

                        <div class="col-sm-12 ">
                            <button class="btn btn-success btn-rounded" type="submit">
                                <i class="fa fa-check"></i> Actualizar
                            </button>
                            <a href="{{ url('/admin/paymentOptions') }}" class="btn btn-inverse">Cancelar</a>
                        </div>  
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
<script src="{{ asset('/admin_assets/vendor/stringToSlug/jquery.stringToSlug.min.js')}}"></script>
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function()
    {
        // Basic
        $('.dropify').dropify();
    });
    $(document).ready(function(){
        $("#name, #slug").stringToSlug({
            callback:function(text){
                $('#slug').val(text);
            }
        });
    });
</script>
@endsection