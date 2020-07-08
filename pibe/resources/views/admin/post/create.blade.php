@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Blog')
@section('micss')
	<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/input-file/fileinput.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('plugins/html5-editor/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/file-upload.css') }}" rel="stylesheet">
@endsection
@section('menu-blog')
                     <li class="nav-item ">
                        <a href="/admin/user" class="nav-link active">
                            <i class="icon icon-pencil"></i> Blog 
                        </a>
                    </li>
@endsection         
@section('centro')
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-themecolor">Añadir Post</h3>
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/posts')}}">Lista de posts</a></li>
			<li class="breadcrumb-item active">Añadir posts</li>
		</ol>
	</div>
</div>
<form  class="row fromProduct" action="{{ url('admin/posts') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth('user')->user()->id}}">

    <div class="col-lg-8">
      	<div class="card">
        	<div class="card-body">
          		<h2 class="card-title">Datos del post</h2> <br>
          		<div class="floating-labels m-t-40">
          			
          			
					@component('components.input', ['name' => 'name','title' => 'Nombre de post*', 'id' => 'name'])
                    @endcomponent

                    <div class="floating-labels m-t-40">
                    <div class="form-group {{ $errors->has('slug') ? 'has-danger has-error has-feedback' : '' }} m-b-50">
                        
                        <input type="text" class="form-control {{ $errors->has('slug') ? 'form-control-danger' : '' }}" id="slug" name="slug" value="{{ old('slug') }}">
                        <label for="slug">Slug del post (Url Amigable)</label><br>
                        @if ($errors->has('slug'))
                            <span class="form-control-feedback text-danger">
                                <small>{{ $errors->first('slug') }}</small>
                            </span>
                        @endif
                     </div>
					</div>	
					

					@component('components.textarea', ['name' => 'abstract','title' => 'Extracto del Post', 'required'])
                    @endcomponent

					<div class="form-group col-12">
						<h5 class="card-title">Contenido del Post</h5>
						<textarea class="textarea_editor form-control" rows="10" name="body"></textarea>
						@if ($errors->has('body'))
							<span class="form-control-feedback text-danger">
								<small>{{ $errors->first('body') }}</small>
							</span>
						@endif
					</div>

					<button class="btn btn-success btn-rounded" type="submit">
						<i class="icon icon-check"></i> Crear
					</button>
            		<a href="{{ url('/admin/posts') }}" class="btn btn-inverse">Cancelar</a>
          		</div>
        	</div>
      	</div>
    </div>

	<div class="col-md-4">

		<div class="card col-12">
			<div class="card-body">

				<div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#CategorieCollapse">
					<h4 class="card-title p-l-10">Categorías del Blog</h4>
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
				<div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#TagCollapse">
					<h4 class="card-title p-l-10">Etiquetas del post</h4>
				</div>

				<div class=" m-t-20 collapse" id="TagCollapse"><br>
				<!-- <div class=" errorSize alert alert-danger" hidden="true" role="alert"></div> -->
					<div class="form-group m-b-15">
						<div class="tagContent">
							@foreach ($tags as $tag)
							<label style="margin-left:5px">
								<input type="checkbox" name=" tags[] " value="{{$tag->id}}" id="tags"> {{ $tag->name }} 
							</label>
							@endforeach
						</div>
					</div>
					<small><a href="javascript:void(0)" class="createTag text-dark btn btn-default" >Nueva Etiqueta</a></small>
				</div>

			</div>
		</div>

        <div class="card col-12">
			<div class="card-body">
				<div class="row has_arrow_card" data-toggle="collapse" data-target="#ImageCollapse">
					<h4 class="card-title p-l-10">Imagen del Post*</h4>
				</div>

				<div class="collapse show {{ $errors->has('image') ? 'show' : '' }}" id="ImageCollapse">
					<p>Tamaño ideal: 1170 x 555 pixeles</p>
					<input type="file" required id="input-file-now" class="dropify" name="image" value="{{ old('image') }}"/>
					@if ($errors->has('image'))
						<span class="form-control-feedback text-danger">
							<small>{{ $errors->first('image') }}</small>
						</span>
					@endif
				</div>
			</div>
        </div>
	</div>
</form>



@endsection

@section('scripts')
	<script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('plugins/input-file/fileinput.min.js') }}"></script>
	<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
	<script src="{{ asset('js/jasny-bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
	<script src="{{ asset('plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
	<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js')  }}" type="text/javascript"></script>
	<script src="{{ asset('/admin_assets/vendor/stringToSlug/jquery.stringToSlug.min.js')}}"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
        $('.textarea_editor').wysihtml5();
      	});

	    $(document).ready(function(){
	        $("#name, #slug").stringToSlug({
	            callback:function(text){
	                $('#slug').val(text);
	            }
	        });
	    });

	    $(document).ready(function() {
      	$('.dropify').dropify();
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


 	 $('.createTag').on('click',function()  {
	  	 swal({
      html: "<div class='floating-labels m-t-10'><div  class='form-group m-b-10'><input type='text' class='form-control' id='tagInput1' placeholder='Nombre de la Etiqueta'><span class='bar'></span></div></div>",
      showCancelButton: true,
      confirmButtonText: 'Crear Etiqueta',
      cancelButtonText: 'Cancelar',
      confirmButtonClass: 'btn btn-success btn-rounded',
      cancelButtonClass: 'btn btn-secondary m-l-10 btn-rounded',
      buttonsStyling: false,
      focusConfirm: false,
      preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
              type: 'post',
              url: '/admin/tags',
              data: {
                '_token': $('input[name=_token]').val(),
                'name': $('#tagInput1').val(),
                'slug': $('#tagInput1').val()
              },
              success: function(data) {
                $('.tagContent').append("<label style='margin-left:5px'><input type='checkbox' name='tags' value='"+data.id+"' id='tags'>"+data.name+"</label>");
              },
              error: function(data) {
                  $('#tagInput1').addClass('is-invalid m-b-10');
                  swal.showValidationError(data.responseJSON.errors.name);
              }
            });


          setTimeout(function() {
            resolve($('#tagInput1').val())
          }, 1000)
          })
        },
        allowOutsideClick: () => !swal.isLoading()
      }).then((result) => {
          if (result.value) {
            swal({
              type: 'success',
              title: '¡Nueva Etiqueta Agregada!',
              html: 'Etiqueta: ' + result.value
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
						url: '/admin/blogCategory',
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

  </script>
@endsection
