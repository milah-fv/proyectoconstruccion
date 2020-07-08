@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Categorías')
@section('micss')
  <link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
@endsection
@section('menu-categorias')
        <li class="nav-item nav-dropdown">
            <a href="/admin/category" class="nav-link active">
            <i class="icon icon-organization"></i> Categorías 
            </a>
        </li>                
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Crear Nueva Categoría</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/category') }}">Listado de categorías</a></li>
                <li class="breadcrumb-item active">Añadir nuevo</li>
            </ol>
        </div>
    </div>
    <form  class="row" action="{{ url('admin/category') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Datos de la Categoría</h2> <br>
                    <div class="floating-labels m-t-40">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}" id="name" name="name" value="{{ old('name') }}"><br>
                            <label for="name">Nombre de la Categoría</label>
                            @if ($errors->has('name'))
                                <span class="form-control-feedback text-danger">
                                    <small>{{ $errors->first('name') }}</small>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                        
                            <input type="text" class="form-control {{ $errors->has('slug') ? 'form-control-danger' : '' }}" id="slug" name="slug" value="{{ old('slug') }}">
                            <label for="slug">Slug de la categoria (Url Amigable)</label><br>
                            @if ($errors->has('slug'))
                                <span class="form-control-feedback text-danger">
                                    <small>{{ $errors->first('slug') }}</small>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-success btn-rounded" type="submit">
                            <i class="icon icon-check"></i> Crear
                        </button>
                        <a href="{{ url('/admin/category') }}" class="btn btn-inverse">Cancelar</a>
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

