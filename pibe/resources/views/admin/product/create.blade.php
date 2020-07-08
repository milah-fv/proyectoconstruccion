@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Productos')
@section('micss')
	<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/input-file/fileinput.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('plugins/html5-editor/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css">
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
		<h3 class="text-themecolor">Añadir Producto</h3>
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/product')}}">Lista de productos</a></li>
			<li class="breadcrumb-item active">Añadir producto</li>
		</ol>
	</div>
</div>

<form  class="row fromProduct" action="{{ url('admin/product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-8">
      	<div class="card">
        	<div class="card-body">
          		<h2 class="card-title">Datos del producto</h2>
          		<div class="floating-labels m-t-40">
          			<div></div>
          			
					@component('components.input', ['name' => 'name','title' => 'Nombre de producto*'])
                    @endcomponent
						
					@component('components.select',['name' => 'state','title' => 'Estado*',
					'id' => 'estateSelect','items' => ['Nuevo','Oferta','Simple'] ])
					@endcomponent

            		<div class="form-inline m-b-40 col-md-12">
              			<div class="row">
							
                			<div class="col-md-3" id="oldPriceDiv">
                  				<div class="form-group {{ $errors->has('oldprice') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
									<input type="text" pattern="[0-9.]+" class="form-control {{ $errors->has('oldprice') ? 'form-control-danger' : '' }}" id="oldPrice" name="oldprice" value="{{ old('oldprice') }}">
									<label for="oldPrice">Precio Antiguo</label>
									@if ($errors->has('oldprice'))
										<span class="form-control-feedback text-danger">
											<small>{{ $errors->first('oldprice') }}</small>
										</span>
									@endif
                  				</div>
                			</div>
							
                			<div class="col-md-3" id="priceDiv">
                  				<div class="form-group {{ $errors->has('price') ? 'has-danger has-error has-feedback' : '' }} m-b-40" >
									<input type="text" required  pattern="[0-9.]+" class="form-control {{ $errors->has('price') ? 'form-control-danger' : '' }}" id="price" name="price" value="{{ old('price') }}">
									<label for="price" id="labelPrice">Precio Normal</label>
									@if ($errors->has('price'))
									<span class="form-control-feedback text-danger">
										<small>{{ $errors->first('price') }}</small>
									</span>
									@endif
                 			 	</div>
                			</div>
                
							<div class="col-md-3" id="stockDiv">
								<div class="form-group m-b-40 {{ $errors->has('stock') ? 'has-danger has-error has-feedback' : '' }}">
									<input type="text" required pattern="[0-9.]+" class="form-control {{ $errors->has('stock') ? 'form-control-danger' : '' }} " id="stock" name="stock" value="{{ old('stock') }}">
									<label for="stock">Stock</label>
									@if ($errors->has('stock'))
										<span class="form-control-feedback text-danger">
											<small>{{ $errors->first('stock') }}</small>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group {{ $errors->has('weight') ? 'has-danger has-error has-feedback' : '' }} m-b-40" id="weightDiv">
									<input type="text" pattern="[0-9.]+"  class="form-control {{ $errors->has('weight') ? 'form-control-danger' : '' }}" id="weight" name="weight" value="{{ old('weight') }}">
									<label for="weight">Peso</label>
									@if ($errors->has('weight'))
										<span class="form-control-feedback text-danger">
											<small>{{ $errors->first('weight') }}</small>
										</span>
									@endif
								</div>
							</div>
              			</div>
            		</div>

					@component('components.textarea', ['name' => 'features','title' => 'Caracteristica corta del producto', 'required'])
                    @endcomponent

					<div class="form-group col-12">
						<h5 class="card-title">Descripción del producto</h5>
						<textarea class="textarea_editor form-control" rows="10" name="description"></textarea>
						@if ($errors->has('description'))
							<span class="form-control-feedback text-danger">
								<small>{{ $errors->first('description') }}</small>
							</span>
						@endif
					</div>

					<button class="btn btn-success btn-rounded" type="submit">
						<i class="icon icon-check"></i> Crear
					</button>
            		<a href="{{ url('/admin/product') }}" class="btn btn-inverse">Cancelar</a>
          		</div>
        	</div>
      	</div>
    </div>

	<div class="col-md-4">

		<div class="card col-12">
			<div class="card-body">

				<div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#CategorieCollapse">
					<h4 class="card-title p-l-10">Categoría del productos*</h4>
				</div>

				<div class="floating-labels m-t-20 collapse" id="CategorieCollapse"><br>
					<div class="form-group m-b-15">
						<select class="form-control p-0" id="SelectCategorie" name="categories">
							@foreach ($categories as $categorie)
								<option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
							@endforeach
						</select><span class="bar"></span>
						<label for="SelectCategorie">Categoria</label>
					</div>
					<small><a href="javascript:void(0)" class="createCategorie text-dark btn btn-default" >Nueva Categoría</a></small>
				</div>
			</div>	
		</div>

		<div class="card col-12">
			<div class="card-body">
				<div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#ColorCollapse">
					<h4 class="card-title p-l-10">Colores de productos*</h4>
				</div>
				<div class="row collapse" id="ColorCollapse">
					<div class="col-xl-12">
						<div class="btn-group row " data-toggle="buttons">
							<div class="col-xl-12 ColorsContent">
								@foreach ($colors as $color)
									@if ( $loop->iteration == '1' )
									<label class="btn btn-default btn-rounded active " style="background:{{ $color->color }}">
										<input type="radio" name="colors" value="{{ $color->id }}" autocomplete="off" checked>
										<span class="fa fa-check"></span>
									</label>
									@else
									<label class="btn btn-default btn-rounded" style="background:{{ $color->color }}">
										<input type="radio" name="colors" value="{{ $color->id }}" 
										autocomplete="off" >
										<!-- <input type="radio" name="colors" value="{{ $color->id }}" autocomplete="off" checked> -->
										<span class="fa fa-check"></span>
									</label>
									@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<small><a href="javascript:void(0)" class="btn btn-default createColor text-dark">Nuevo Color</a></small>
					</div>
				</div>
			</div>
		</div>

		<div class="card col-12">
			<div class="card-body">
				<div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#SizeCollapse">
					<h4 class="card-title p-l-10">Tallas de productos</h4>
				</div>
				<div class="floating-labels m-t-20 collapse" id="SizeCollapse">
					<div id="SizeCollapseContent">
					</div>
					<div class=" errorSize alert alert-danger" hidden="true" role="alert"></div>
					<div class="d-flex justify-content-between m-t-20 ">
						<small><a href="javascript:void(0)" class="createSizeDiv redHover m-r-10 btn btn-default">Agregar Talla</a></small>
						<small><a href="javascript:void(0)" class="createSize redHover btn btn-default">Talla Nueva</a></small>
					</div>
				</div>
			</div>
		</div>

        <div class="card col-12">
			<div class="card-body">
				<div class="row has_arrow_card" data-toggle="collapse" data-target="#ImageCollapse">
					<h4 class="card-title p-l-10">Imagen del producto*</h4>
				</div>

				<div class="collapse show {{ $errors->has('cover_image') ? 'show' : '' }}" id="ImageCollapse">
					<p>Tamaño ideal: 500 x 500 pixeles</p>
					<input type="file" required id="input-file-now" class="dropify" name="cover_image"/>
					@if ($errors->has('cover_image'))
						<span class="form-control-feedback text-danger">
							<small>{{ $errors->first('cover_image') }}</small>
						</span>
					@endif
				</div>
			</div>
        </div>

		<div class="card col-12">
			<div class="card-body">
				<div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#ImagesCollapse">
					<h4 class="card-title p-l-10">Galería del producto</h4>

				</div>
					
				<div class="collapse {{ $errors->has('images.*') ? 'show' : '' }}" id="ImagesCollapse">
					<p>Tamaño ideal: 500 x 500 pixeles</p>
					<input name="images[]" id="input-id" type="file" multiple />
					@if ($errors->has('images.*'))
						<span class="form-control-feedback text-danger">
							<small>{{ $errors->first('images.*') }}</small>
						</span>
					@endif
				</div>
			</div>
		</div>
	</div>
</form>


@endsection

@section('scripts')
	<script src="{{ asset('plugins/input-file/fileinput.min.js') }}"></script>
	<script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
	<script src="{{ asset('plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
	<script src="{{ asset('plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
  <script type="text/javascript">

    $(document).ready(function() 
	{
        $('.textarea_editor').wysihtml5();
    });

  //Asignamos como valor principal al "select", el valor 1. Es el que se mostrará sin haber seleccionado nada.
if ($('#estateSelect').val() == 'Nuevo')
  {
      $("#priceDiv").show();
      $("#oldPriceDiv").hide();
      $('#labelPrice').text('Precio');
  };

//Detectamos los cambios y mostramos uno u otro form
$('#estateSelect').change(function() {

  if ($('#estateSelect').val() == 'Nuevo')
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").hide();
    $("#oldPrice").val(null);
    $('#labelPrice').text('Precio');
    $('#weightDiv').removeClass('m-t-30');
  };

  if ($('#estateSelect').val() == 'Oferta')
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").show();
    $('#labelPrice').text('Precio Rebajado');
	if (!$('#SizeCollapseContent').find('input').length > 0 ) {
    $('#weightDiv').addClass('m-t-30');
	}
  };

  if ($('#estateSelect').val() == 'Simple')
  {
    $("#priceDiv").show();
    $("#oldPriceDiv").hide()
    $("#oldPrice").val(null);
    $('#labelPrice').text('Precio');
    $('#weightDiv').removeClass('m-t-30');
  };


});

  $("#input-id").fileinput({
    uploadUrl: "/file-upload-single/1",
    showUpload:false,
    showBrowse:false,
    showRemove:false,
    showCaption:false,
    browseOnZoneClick: true,
    layoutTemplates: {footer: ''},
  });



  $(document).ready(function() {
      // Basic
      $('.dropify').dropify();
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
                $('.ColorsContent').append("<label class='btn btn-default btn-rounded' style='background:"+ data.color +"'><input type='radio' value='"+data.id+"' name='colors' autocomplete='off' checked> <span class='icon icon-check'> </span> </label>");
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


$('.createCategorie').on('click',function()  
  	{
		swal({
			title: "Crear Categoria",
			input: 'text',
			text: 'Nombre',
			showCancelButton: true,
			confirmButtonText: 'Crear',
			confirmButtonClass: 'btn btn-success btn-rounded',
			cancelButtonText: 'Cancelar',
			preConfirm: (value) => 
			{
				return new Promise((resolve) => 
				{
					$.ajax({
						type: 'post',
						url: '/admin/category',
						data: 
						{
							'_token': $('input[name=_token]').val(),
							'name': value,'slug': value
						},
						success: function(data) 
						{
							resolve()
							$('#SelectCategorie').append("<option value='"+data.id+"'>"+data.name+"</option>");
						},
						error: function(data) 
						{
							resolve()
							swal.showValidationError(data.responseJSON.errors.name);
							
						}
					});
				});	
			},
			allowOutsideClick: () => !swal.isLoading()
		}).then((result) => 
		{
			if (result.value) 
			{
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
			$('#stock').prop('required',false);
			$('#stock').val(null);

			$('#SizeCollapseContent').find('input').each(function() 
			{
				$(this).prop('required', true); // <----use .prop() instead
			});
		}

	});
	$('#SizeCollapse').on('hidden.bs.collapse', function () {
		if (!$('#SizeCollapseContent').find('input').length > 0 ) {
			$('#stockDiv').show();
			$('#stock').prop('required',true);
			$('#stock').val(null);

			$('#SizeCollapseContent').find('input').each(function() 
			{
				$(this).prop('required', false); // <----use .prop() instead
			});
		}
	});
	$(document).ready(function() {
		var count = 0;
		$(document).on('click','.createSizeDiv',function(){
			count += 1;
			
			$('#SizeCollapseContent').
			append('<div id="SizeCollapseContentAll'+ count +'">\
						<div class="text-right"><a data-id="SizeCollapseContentAll'+ count +'" href="javascript:void(0)" class="redHover DeleteDivContentSize"><i class="fa fa-times"></i></a></div>\
						<div class="row">\
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
										<input type="text" pattern="[0-9.]+" class="form-control"  name="quantities[]" >\
									</div>\
								</div>\
							</div>\
						</div></div>');
					


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
