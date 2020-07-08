@extends('customer.menuProfileSidebar')
@section('micss')
	<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
@endsection
@section('content')


<form  class="row" action="{{ url('profile/boucher') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card col-md-12">
        <div class="card-body">
            <h2 class="card-title">Enviar Voucher</h2> <hr> <br>
            <div class=" row">
                <div class="col-md-6">
                    <label for="SelectOrders">Numero de Pedido</label>
                        <select class="form-control p-0" id="SelectOrders" name="orders">
                            @foreach ($orders as $o)
                                @if($o->payment->paymentType->id == 2)
                                <option value="{{ $o->id }}">{{ $o->id }}</option>}
                                @endif
                            @endforeach
                        </select><span class="bar"></span>
                </div>
            </div> <br>

            <h4 class="m-b-20">Imagen del Voucher (Letra legible)</h4>
            <div class="form-group  m-b-40">
                <input type="file" id="input-file-now" class="dropify" name="image" required/>
                @if ($errors->has('image'))
                    <span class="form-control-feedback text-danger">
                        <small>{{ $errors->first('image') }}</small>
                    </span>
                @endif
                
            </div> 
            <a class="btn btn-inverse" href="{{ url('profile/boucher') }}"><i class="ti ti-angle-left"></i> Cancelar</a>
            <button class="btn btn-success" type="submit"><i class="ti ti-ticket"></i> Enviar Voucher</button>
        </div>
    </div>
</form>
@endsection
@section('scripts')
@include('sweetalert::alert')`
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>

<script>
    $(document).ready(function()
    {
        // Basic
        $('.dropify').dropify();
    });


</script>
@endsection