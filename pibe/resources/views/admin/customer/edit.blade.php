@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Clientes')
@section('micss')
<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
@endsection
@section('menu-clientes')
    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle active" >
                            <i class="icon icon-user-following"></i> Clientes y Bouchers<i class="fa fa-caret-left"></i>
                        </a>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/customer" class="nav-link active">
                                    <i class="icon icon-user-following"></i> Clientes 
                                </a>
                            </li>
                        </ul>
                         <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/boucher" class="nav-link ">
                                    <i class="icon icon-film"></i> Bouchers 
                                </a>
                            </li>
                        </ul>
                    </li>

@endsection
@section('centro')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
      	<h3 class="text-themecolor">Editar Cliente</h3>
    </div>
    <div class="col-md-7 align-self-center">
      	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin')}}">Inicio</a></li>
          	<li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/customer')}}">Listado de clientes</a></li>
          	<li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
</div>
<form  class="row" action="{{ url("admin/customer/$customer->id") }}" method="post">
    @csrf
    <div class="col-12">
      	<div class="card">
        	<div class="card-body">
          		<h2 class="card-title"><i class="fa fa-user"></i> CLIENTE</h2><hr>
                <div class="row p-t-10">
                    @component('components.input', ['name' => 'name','title' => 'Nombre','col' => 'col-md-6','value' => $customer->name])
                        @slot('attributes') 
                            title="Solor letras por favor." 
                            pattern="[A-Za-z \u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+" 
                            maxlength="250"
                        @endslot
                    @endcomponent
                    @component('components.input', ['name' => 'email','title' => 'Correo','col' => 'col-md-6','value' => $customer->email])
                        @slot('attributes') 
                            maxlength="191"
                        @endslot
                        @slot('type') 
                            email
                        @endslot
                    @endcomponent
                    @component('components.input', ['name' => 'last_name','title' => 'Apellidos','col' => 'col-md-6','value' => $customer->last_name])
                        @slot('attributes') 
                            title="Solor letras por favor." 
                            pattern="[A-Za-z \u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+" 
                            maxlength="100"
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'dni','title' => 'Numero de documento','col' => 'col-md-6','value' => $customer->dni])
                        @slot('attributes') 
                            pattern="[0-9-]+"  
                            maxlength="8"  
                        @endslot
                    @endcomponent

                    @component('components.input', ['name' => 'celphone','title' => 'Celular','col' => 'col-md-6','value' => $customer->celphone])
                        @slot('attributes') 
                            maxlength="20"
                            pattern="[0-9-]+"  
                        @endslot
                    @endcomponent
                    @component('components.input', ['name' => 'phone','title' => 'Teléfono','col' => 'col-md-6','value' => $customer->phone])
                        @slot('attributes') 
                            maxlength="20"
                            pattern="[0-9-]+"  
                        @endslot
                    @endcomponent
                    @component('components.input', ['name' => 'password','title' => 'Contraseña','col' => 'col-md-6','type' =>'password'])

                    @endcomponent
                        <label class="switch m-l-10">
                            <input type="checkbox" name="actived" id="actived" {{ $customer->actived == 1 ? 'checked': ''}}>
                            <span class="slider round_switch"></span>
                        </label>
                        <label class="p-l-10 label-swicht" for="actived" style="margin: 0px 10px;">Activado</label>
                        <label class="switch m-l-10">
                            <input type="checkbox" name="verified" id="verified" {{ $customer->verified == 1 ? 'checked': ''}}>
                            <span class="slider round_switch"></span>
                        </label>
                        <label class="p-l-10 label-swicht" for="verified" style="margin: 0px 10px;">Email Verificado</label>
                    <div class="col-12 p-l-10 p-t-10">
                        <input name="_method" type="hidden" value="PUT">
                        <button class="btn btn-success btn-rounded" type="submit">
                            <i class="fa fa-pencil"></i> Actualizar
                        </button>
                        <a href="{{ url('/admin/customer') }}" class="btn btn-inverse">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-12">
        <div class="card-body">

            <div class="row has_arrow_card collapsed" data-toggle="collapse" data-target="#ProductCollapse">
                <h4 class="card-title p-l-10"><i class="mdi mdi-shopping"></i> Pedidos</h4>
            </div>
            <div class="collapse" id="ProductCollapse">
                <div class="card-body table-responsive">
                    <table id="table_product" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> Nro Pedido  </th>
                                <th> Estado de pedido </th>
                                <th> Monto de pedido </th> 
                                <th> Acciones </th>                                          
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @if($order->state->name == 'completado')
                                            <span class="label label-success">{{$order->state->name }}</span>
                                        @elseif($order->state->name == 'cancelado' || $order->state->name == 'fallido' )
                                            <span class="label label-danger">{{$order->state->name }}</span>
                                        @else
                                         <span class="label label-dark">{{$order->state->name }}</span>
                                        @endif
                                    </td>
                                    <td>S/ {{ $order->payment->amount }}</td>
                                    <td>S/ {{ $order->payment->amount }}</td>
                                    <td>
                                    <a href="{{ url("/admin/orders/$order->id/edit") }}" > <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                                
                    </table>
                </div>
            </div>

        </div>	
    </div>
</form>
@endsection
