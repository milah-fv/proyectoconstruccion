@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Productos')
@section('micss')
<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/html5-editor/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/file-upload.css') }}" rel="stylesheet">
@endsection
@section('menu-productos')
                    <li class="nav-item nav-dropdown">
                        <a href="{{ url('/admin/product')}}" class="nav-link active">
                            <i class="icon icon-grid"></i> Productos 
                        </a>
                    </li>
@endsection
@section('centro')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Editar Producto</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/product')}}">Listado de productos</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
</div>
<form  class="row fromProduct" action="{{ url("admin/product/$product->id") }}" method="post" enctype="multipart/form-data" id="FormCentral">
@csrf
  <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
              <h2 class="card-title">Datos del producto</h2>
              <div class="floating-labels m-t-40"><br>
                <input type="text" name="id_product" value="{{ $product->id}}" style="display:none">

                @component('components.input', ['name' => 'name','title' => 'Nombre de producto*'])
                  @slot('value') {{ $product->name }} @endslot
                          @endcomponent
                      
                @component('components.select',['name' => 'state','title' => 'Estado',
                'id' => 'estateSelect','compare' => $product->state ,'items' => ['Nuevo','Oferta','Simple'] ])
                @endcomponent

                <div class="form-inline m-b-40 col-12">
                    <div class="row">

                      <div class="col-md-4" id="oldPriceDiv">
                          <div class="form-group {{ $errors->has('oldprice') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                            <input type="text" pattern="[0-9.]+" class="form-control {{ $errors->has('oldprice') ? 'form-control-danger' : '' }}" id="oldPrice" name="oldprice" value="{{ old( 'oldprice', $product->old_price)}}">
                            <label for="oldPrice">Precio Normal</label>
                            @if ($errors->has('oldprice'))
                              <span class="form-control-feedback text-danger">
                                <small>{{ $errors->first('oldprice') }}</small>
                              </span>
                            @endif
                          </div>
                      </div>

                      <div class="col-md-4" id="priceDiv">
                          <div class="form-group {{ $errors->has('price') ? 'has-danger has-error has-feedback' : '' }} m-b-40" >
                            <input type="text" required  pattern="[0-9.]+" class="form-control {{ $errors->has('price') ? 'form-control-danger' : '' }}" id="price" name="price" value="{{ old( 'price', $product->price)}}">
                            <label for="price" id="labelPrice">Precio Normal*</label>
                            @if ($errors->has('price'))
                            <span class="form-control-feedback text-danger">
                              <small>{{ $errors->first('price') }}</small>
                            </span>
                            @endif
                          </div>
                      </div>
                
                      <div class="col-md-4 {{ $product->sizes->isEmpty() ? '' : 'hidden' }}  " id="stockDiv">
                        <div class="form-group m-b-40 {{ $errors->has('stock') ? 'has-danger has-error has-feedback' : '' }}">
                          <input type="text" required pattern="[0-9.]+" class="form-control {{ $errors->has('stock') ? 'form-control-danger' : '' }} " id="stock" name="stock" value="{{ old( 'stock', $product->stock)}}">
                          <label for="stock">Stock*</label>
                          @if ($errors->has('stock'))
                            <span class="form-control-feedback text-danger">
                              <small>{{ $errors->first('stock') }}</small>
                            </span>
                          @endif
                        </div>
                      </div> 

                      <div class="col-md-4">
                        <div class="form-group {{ $errors->has('weight') ? 'has-danger has-error has-feedback' : '' }} m-b-40" id="weightDiv">
                          <input type="text" pattern="[0-9.]+"  class="form-control {{ $errors->has('weight') ? 'form-control-danger' : '' }}" id="weight" name="weight" value="{{ old( 'weight', $product->weight)}}">
                          <label for="weight">Peso*</label>
                          @if ($errors->has('weight'))
                            <span class="form-control-feedback text-danger">
                              <small>{{ $errors->first('weight') }}</small>
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>
                </div> <br>

                @component('components.textarea', ['name' => 'features',
                'title' => 'Caracteristica corta del producto*', 'value' => $product->features ])
                          @endcomponent


                <div class="form-group col-12">
                  <h5 class="card-title">Descripción del producto</h5>
                  <textarea class="textarea_editor form-control" rows="15" name="description">{{ old( 'description', $product->description)}}</textarea>
                </div>

                  <input name="_method" type="hidden" value="PUT">
                  <button class="btn btn-success btn-rounded" type="submit">
                    <i class="fa fa-pencil"></i> Actualizar
                  </button>
                  <a href="{{ url('/admin/product') }}" class="btn btn-inverse">
                    Cancelar
                  </a>
              </div>
          </div>
      </div>
  </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <div class="row" data-toggle="collapse" data-target="#CategorieCollapse" style="cursor: all-scroll;">
                      <div class="col-10">
                        <h4 class="card-title">Categorías de productos*</h4>
                      </div>
                      <div class="col-1">
                        <i class="fa fa-angle-down" ></i>
                      </div>
                    </div>

                      <div class="floating-labels m-t-20 collapse" id="CategorieCollapse"><br>
                          <div class="form-group m-b-15">
                              <select class="form-control p-0" id="SelectCategorie" name="categories">
                                @foreach ($categories as $category)
                                  @if ($product->category->id == $category->id)
                                      <option selected="true" value="{{ $category->id }}">{{ $category->name}}</option>
                                    @else
                                      <option  value="{{ $category->id }}">{{ $category->name}}</option>
                                  @endif
                                @endforeach
                              </select><span class="bar"></span>
                              <label for="SelectCategorie">Categoria</label>
                          </div>
                          <small><a href="javascript:void(0)" class="createCategory btn btn-default" >Nueva Categoría</a></small>
                      </div>
                  </div>
              </div>
            </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" data-toggle="collapse" data-target="#ColorCollapse" style="cursor: all-scroll;">
                      <div class="col-10">
                          <h4 class="card-title">Colores de productos</h4>
                      </div>
                      <div class="col-1">
                          <i class="fa fa-angle-down" ></i>
                       </div>
                    </div>
                    <div class="row collapse" id="ColorCollapse">
                      <div class="col-xl-12">
                          <div class="btn-group row " data-toggle="buttons">
                            <div class="col-xl-12 ColorsContent">
                                @foreach ($colors as $color)
                                  @if ( $product->color->id == $color->id )
                                    <label class="btn btn-default btn-rounded active" style="background:{{ $color->color }}">
                                      <input type="radio" name="colors" value="{{ $color->id }}" autocomplete="off" checked>
                                      <span class="fa fa-check"></span>
                                    </label>
                                  @else
                                  <label class="btn btn-default btn-rounded" style="background:{{ $color->color }}">
                                    <input type="radio" name="colors" value="{{ $color->id }}" autocomplete="off" checked>
                                    <span class="fa fa-check"></span>
                                  </label>
                                  @endif
                                @endforeach
                            </div>
                          </div>
                      </div>
                      <div class="col-xl-12">
                          <small><a href="javascript:void(0)" class="btn btn-default createColor">Nuevo Color</a></small>
                      </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <div class="row" data-toggle="collapse" data-target="#SizeCollapse" style="cursor: all-scroll;">
                      <div class="col-10">
                        <h4 class="card-title p-l-10">Tallas de productos</h4>
                      </div>
                      <div class="col-1">
                          <i class="fa fa-angle-down" ></i>
                      </div>
                    </div>
                      <div class="floating-labels m-t-20 collapse" id="SizeCollapse">
                          <div id="SizeCollapseContent">
                          @foreach ($product->sizes as $sizeProduct)
                            <div id="SizeCollapseContentAll{{ $loop->iteration }}">
                              <div class="text-right">
                                <a data-id="SizeCollapseContentAll{{ $loop->iteration }}" href="javascript:void(0)" class="redHover DeleteDivContentSize">
                                  <i class="fa fa-times"></i>
                                </a>
                              </div>
                              <div class="form-group m-t-20 m-b-30">
                                <div class="row">
                                  <div class="col-sm-6"> 
                                    <label>Talla</label>
                                    <select class="form-control p-0" id="sizeSelect" name="sizes[]" requerid>\
                                      @foreach($sizes as $size)
                                        @if ($sizeProduct->id ==  $size->id )
                                          <option selected="true" value="{{ $size->id }}">{{ $size->name}}</option>
                                        @else
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endif
                                      @endforeach
                                    </select>

                                  </div>
                                  <div class="col-sm-6"> 
                                    <div class="form-group m-b-10">
                                      <label>Cantidad</label>
                                      <input type="text" pattern="[0-9.]+" class="form-control"  name="quantities[]" placeholder="Cantidad" value="{{ $sizeProduct->pivot->quantity }}">
                                    </div>
                                  
                                  </div>
                                </div>
                                
                              </div>
                              
                            </div>
                          @endforeach
                        </div>
                        <div class="errorSize alert alert-danger " hidden="true" role="alert"></div>
                        <div class="d-flex justify-content-between m-t-20 ">
                          <small><a href="javascript:void(0)" class="createSizeDiv redHover m-r-10 btn btn-default">Agregar Talla</a></small>
                          <small><a href="javascript:void(0)" class="createSize redHover btn btn-default">Nueva Talla</a></small>
                        </div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row" data-toggle="collapse" data-target="#ImageCollapse" style="cursor: all-scroll;">
                    <div class="col-10">
                      <h4 class="card-title">Imagen del producto</h4>
                    </div>
                    <div class="col-1">
                        <i class="fa fa-angle-down" ></i>
                    </div>
                  </div>
                  <div class="collapse {{ $errors->has('cover_image') ? 'show' : '' }}" id="ImageCollapse">
                    <input type="file" id="input-file-now" class="dropify" name="cover_image" data-default-file="{{ asset($product->cover_image) }}" />
                    @if ($errors->has('cover_image'))
                      <span class="form-control-feedback text-danger">
                        <small>{{ $errors->first('cover_image') }}</small>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row" data-toggle="collapse" data-target="#ImagesCollapse" style="cursor: all-scroll;">
                    <div class="col-10">
                      <h4 class="card-title">Galería del producto</h4>
                    </div>
                    <div class="col-1">
                        <i class="fa fa-angle-down" ></i>
                    </div>
                  </div>
                  <div class="collapse {{ $errors->has('images.*') ? 'show' : '' }}" id="ImagesCollapse">
                    <div class="row" id="RowImages">
                      @foreach ($product->images as $image)
                        <div class="col-xl-4 col-sm-4 col-6 imagenesEliminar">
                          <div class="cart-img-product">
                            <img  class="img-fluid" src="{{ asset("img_product/$image->image") }}" alt="">
                            <input type="text" id="idImageProduct" value="{{$image->id }}" style="display: none;">
                          </div>
                        </div>
                      @endforeach
                    </div>
                    <br>
                    <small><a href="javascript:void(0)" class="createImage" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Imagen</a></small>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </form>
</div>
@endsection
@section('scripts')
  <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
  <script src="{{ asset('js/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
  <script src="{{ asset('plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
  <script src="{{ asset('plugins/select2/dist/js/select2.full.min.js')  }}" type="text/javascript"></script>
  <script type="text/javascript">
      $(document).ready(function() 
  {
        $('.textarea_editor').wysihtml5();
    });

  //Asignamos como valor principal al "select", el valor 1. Es el que se mostrará sin haber seleccionado nada.
if ($('#estateSelect').val() == 'Nuevo' || $('#estateSelect').val() == 'Simple' )
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").hide()
    $("#oldPrice").val(null);
    $('#labelPrice').text('Precio*');
    $('#weightDiv').removeClass('m-t-30');
  } 
  else 
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").show();
    $('#labelPrice').text('Precio Rebajado*');
  if (!$('#SizeCollapseContent').find('input').length > 0 ) {
    $('#weightDiv').addClass('m-t-30');
  }
  };

//Detectamos los cambios y mostramos uno u otro form
$('#estateSelect').change(function() {

  if ($('#estateSelect').val() == 'Nuevo')
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").hide();
    $("#oldPrice").val(null);
    $('#labelPrice').text('Precio*');
    $('#weightDiv').removeClass('m-t-30');
  };

  if ($('#estateSelect').val() == 'Oferta')
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").show();
    $('#labelPrice').text('Precio Rebajado*');
  if (!$('#SizeCollapseContent').find('input').length > 0 ) {
    $('#weightDiv').addClass('m-t-30');
  }
  };

  if ($('#estateSelect').val() == 'Simple')
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").hide()
    $("#oldPrice").val(null);
    $('#labelPrice').text('Precio*');
    $('#weightDiv').removeClass('m-t-30');
  };


});

  $(document).ready(function() {
      // Basic
      $('.dropify').dropify();
  });

  $(".selectSize").select2();

$('#FormCentral').on('click','.imagenesEliminar',function(ev) {
  ev.preventDefault();
  var form = $(this);
  var id = form.find("[type='text']");
  $.ajax({
      url:  '/admin/image/' + id.val(),
      method: 'delete',
      dataType: 'json',
      data: {
        'id': id.val(),
        '_token': $('input[name=_token]').val()
      },

      success: function() {
        form.remove();
      }

  });

  return false;
});

    $('.createImage').on('click',function(ev)  {
    ev.preventDefault();
    swal({
      html: "<form role='form' class='form-material m-t-40'enctype='multipart/form-data' id='FormImage'>"+'{{ csrf_field() }}'+"<div class='form-group'><div class='fileinput fileinput-new input-group' data-provides='fileinput'><div class='form-control' id='FileForm' data-trigger='fileinput'> <i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div> <span class='input-group-addon btn btn-default btn-file'> <span class='fileinput-new btn btn-success'>Seleccionar Archivo</span> <span class='fileinput-exists'>Cambiar</span><input type='hidden'><input type='text' name='imageProductId' value='{{ $product->id }}' style='display: none;'><input type='hidden'><input type='file' name='fileInput'> </span> <a href='#' class='input-group-addon btn btn-default fileinput-exists' data-dismiss='fileinput'>Eliminar</a> </div></div></form>",
      showCancelButton: true,
      confirmButtonText: 'Crear',
      cancelButtonText: 'Cancelar',
      confirmButtonClass: 'btn btn-success btn-rounded',
      cancelButtonClass: 'btn btn-secondary m-l-10 btn-rounded',
      buttonsStyling: false,
      focusConfirm: false,
      preConfirm: function() 
      {
        return new Promise(function(resolve) 
        {
          if ($('#inputFile').val() == '') 
          {
            swal.showValidationError("Seleccionar una imagen");
          }
          else
          {
            var dataForm = new FormData($("#FormImage")[0]);
            $.ajax({
            type: 'post',
            url: '/admin/image',
            data: dataForm,
            success: function(data) 
            {
              $('#RowImages').append("<div class='col-xl-4 col-sm-4 col-6 imagenesEliminar'> <div class='cart-img-product'> <img class='img-fluid' src='{{ asset('img_product/') }}/"+ data.image +"'> <input type='text' id='idImageProduct' value='"+ data.id +"' style='display: none;'> </div> </div>");
            },
            error: function(data)
            {
              swal.showValidationError(data.responseJSON.errors.fileInput);
            },
            processData: false,
            contentType: false
            });
          }

        setTimeout(function() 
        {
          resolve($('#inputFile').val())
        }, 1000)
        })
        },
        allowOutsideClick: () => !swal.isLoading()
        }).then((result) => {
        if (result.value) 
        {
          swal({
          type: 'success',
          title: 'Nueva Imagen Agregada',
          })
        }
    });
  });

  $('.createSize').on('click',function()  {
      if (!$('#SizeCollapseContent').find('input').length > 0 ) {
            
      swal({
      type: 'error',
      title: 'Error',
      text: 'Antes debes de agregar una talla',
      })
    }
    else
    {
      swal({
      html: "<div class='floating-labels m-t-10'><div id='divSize' class='form-group m-b-10'> <input type='text' class='form-control' id='sizeInput' placeholder='Talla'><span class='bar'></span></div></div>",
      showCancelButton: true,
      confirmButtonText: 'Crear',
      cancelButtonText: 'Cancelar',
      confirmButtonClass: 'btn btn-success btn-rounded',
      cancelButtonClass: 'btn btn-secondary m-l-10 btn-rounded',
      buttonsStyling: false,
      focusConfirm: false,
      preConfirm: function() {
        return new Promise(function(resolve) {
        if ($('#sizeInput').val() == '') {
          $('#divSize').addClass('has-danger has-error has-feedback');
          $('#sizeInput').addClass('form-control-danger');
          swal.showValidationError("Completar talla");
        }else {
          $.ajax({
          type: 'post',
          url: '/admin/size',
          data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#sizeInput').val()
          },
          success: function(data) {
            /*
            var newOption = new Option(data.name, data.id, true, true);
            $(".selectSize").append(newOption).trigger('change');
            */
            if ( $('#SizeCollapseContent').find('input').length > 0) {
              $('#SizeCollapseContent').find('select').each(function() 
              {
                $(this).append(new Option(data.name , data.id));
                
              });
              
            }
          },
          error: function(data) {
            $('#divSize').addClass('has-danger has-error has-feedback');
            $('#sizeInput').addClass('form-control-danger');
            swal.showValidationError(data.responseJSON.errors.name);
          }
          });
        }

        setTimeout(function() {
          resolve($('#sizeInput').val())
        }, 1000)
        })
        },
        allowOutsideClick: () => !swal.isLoading()
      }).then((result) => {
        if (result.value) {
          swal({
          type: 'success',
          title: '¡Nueva Talla Agregado!',
          html: 'Talla: ' + result.value
          })
        }
        });
    }
    });

  $('.createColor').on('click',function()  {
    swal({
      html: "<input type='color' class='form-control' id='colorInput' style='weight=100px'/>",
      showCancelButton: true,
      confirmButtonText: 'Crear Color',
      cancelButtonText: 'Cancelar',
      confirmButtonClass: 'btn btn-success btn-rounded',
      cancelButtonClass: 'btn btn-secondary m-l-10 btn-rounded',
      buttonsStyling: false,
      focusConfirm: false,
      preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
              type: 'post',
              url: '/admin/color',
              data: {
                '_token': $('input[name=_token]').val(),
                'color': $('#colorInput').val()
              },
              success: function(data) {
                $('.ColorsContent').append("<label class='btn btn-default btn-rounded' style='background:"+ data.color +"'><input type='radio' value='"+data.id+"' name='colors' autocomplete='off' checked><span class='fa fa-check'></span></label>");
              },
              error: function(data) {
                  $('#colorInput').addClass('is-invalid m-b-10');
                  swal.showValidationError(data.responseJSON.errors.name);
              }
            });


          setTimeout(function() {
            resolve($('#colorInput').val())
          }, 1000)
          })
        },
        allowOutsideClick: () => !swal.isLoading()
      }).then((result) => {
          if (result.value) {
            swal({
              type: 'success',
              title: '¡Nuevo Color Agregado!',
              html: 'Color: ' + result.value
            })
          }
        });
  });

  
  $('.createCategory').on('click',function()  {
    swal({
      html: "<div class='floating-labels m-t-10'><div id='divCategoria' class='form-group m-b-10'> <input type='text' class='form-control' id='categoriaInput' placeholder='Categoria'><span class='bar'></span></div></div>",
      showCancelButton: true,
      confirmButtonText: 'Crear Categoria',
      cancelButtonText: 'Cancelar',
      confirmButtonClass: 'btn btn-success btn-rounded',
      cancelButtonClass: 'btn btn-secondary m-l-10 btn-rounded',
      buttonsStyling: false,
      focusConfirm: false,
      preConfirm: function() {
        return new Promise(function(resolve) {
          if ($('#categoriaInput').val() == '') {
            $('#divCategoria').addClass('has-danger has-error has-feedback');
            $('#categoriaInput').addClass('form-control-danger');
            swal.showValidationError("Inserte categoria");
          }else {
            $.ajax({
              type: 'post',
              url: '/admin/category',
              data: {
                '_token': $('input[name=_token]').val(),
                'name': $('#categoriaInput').val(),
                'slug': $('#categoriaInput').val()
              },
              success: function(data) {
                $('#SelectCategorie').append("<option value='"+data.id+"'>"+data.name+"</option>");

              },
              error: function(data) {
                  $('#divCategoria').addClass('has-danger has-error has-feedback');
                  $('#categoriaInput').addClass('form-control-danger');
                  swal.showValidationError(data.responseJSON.errors.name);
              }
            });
          }

          setTimeout(function() {
            resolve($('#categoriaInput').val())
          }, 1000)
          })
        },
        allowOutsideClick: () => !swal.isLoading()
      }).then((result) => {
          if (result.value) {
            swal({
              type: 'success',
              title: '¡Nueva Categoria Agregado!',
              html: 'Categoria: ' + result.value
            })
          }
        });
  });

  
  $('#SizeCollapse').on('shown.bs.collapse', function () {

    if ( $('#SizeCollapseContent').find('input').length > 0) {
      $('#stockDiv').hide();
      $('#stock').prop('required',false).val(null);

      $('#SizeCollapseContent').find('input').each(function() 
      {
        $(this).prop('required', true); // <----use .prop() instead
      });
    }

  });
  $('#SizeCollapse').on('hidden.bs.collapse', function () {
    if (!$('#SizeCollapseContent').find('input').length > 0 ) {
      $('#stockDiv').show();
      $('#stock').prop('required',true).val();

      $('#SizeCollapseContent').find('input').each(function() 
      {
        $(this).prop('required', false); // <----use .prop() instead
      });
    }
  });

  $(document).ready(function() 
  {
    var count = $('#SizeCollapseContent').find('input').length;
    $(document).on('click','.createSizeDiv',function()
    {
      count += 1;
      
      $('#SizeCollapseContent').
      append('<div id="SizeCollapseContentAll'+ count +'"><div class="text-right"><a data-id="SizeCollapseContentAll'+ count +'" href="javascript:void(0)" class="redHover DeleteDivContentSize"><i class="fa fa-times"></i></a></div><div class="row">\
              <div class="col-sm-6">\
                <div class="form-group m-t-20 m-b-30">\
                    <label>Talla </label><br><select class="form-control p-0" id="sizeSelect" name="sizes[]" requerid>\
                    @foreach($sizes as $size)<option value="{{ $size->id }}">{{ $size->name }}</option>@endforeach\
                  </select>\
                </div>\
              </div>\
              <div class="col-sm-6">\
                <div class="form-group m-t-20 m-b-30">\
                    <label>Cantidad </label><br><div class="form-group m-b-10">\
                    <input type="text" pattern="[0-9.]+" class="form-control"  name="quantities[]">\
                </div>\
              </div>\
              </div>\
            </div>');
          


      $('#SizeCollapseContent').find('input').each(function() 
      {
        $(this).prop('required', true); // <----use .prop() instead
      });
      if ( $('#SizeCollapseContent').find('input').length > 0 ) {
        $('#stockDiv').hide();
        $('#stock').prop('required',false).val(null);
        $('#weightDiv').removeClass('m-t-30');
      }
    });
  });
  $(document).on('click','.DeleteDivContentSize',function(){
    var id = '#'+ $(this).data('id');
    $(id).remove();
    if (!$('#SizeCollapseContent').find('input').length > 0 )
    {
      $('#stockDiv').show();
      $('#stock').prop('required',true).val(null);
      if ($('#estateSelect').val() == 'Oferta')
      {     
        $('#weightDiv').addClass('m-t-30');
      }
      else
      {
        $('#weightDiv').removeClass('m-t-30');
      }

      $('#SizeCollapseContent').find('input').each(function() 
      {
        $(this).prop('required', false); // <----use .prop() instead
      });
    }
  });

  $('.fromProduct').submit(function( event ) {
    //Create array of input values
  var ar = $('#SizeCollapseContent select').map(function() {
    if ($(this).val() != '') return $(this).val()
  }).get();
  
  console.log(ar);
  //Create array of duplicates if there are any
  var unique = ar.filter(function(item, pos) {
    return ar.indexOf(item) != pos;
  });
  if(unique.length != 0)
  {
    $('.errorSize').text('Tallas duplicadas').removeClass('hidden');
    if ($('#SizeCollapseContent').find('input').length > 0) {
      $('#stock').val();
    }
    event.preventDefault();   
  }
  else
  {
    $('.errorSize').text('').addClass('hidden');
  }
  //show/hide error msg
   });
  </script>
@endsection
