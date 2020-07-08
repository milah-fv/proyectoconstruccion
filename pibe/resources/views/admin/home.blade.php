@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Menú Administrador')


@section('menu-inicio')
                    <li class="nav-item nav-dropdown">
                        <a href="/admin" class="nav-link active">
                            <i class="icon icon-home"></i> Inicio 
                        </a>
                    </li>
@endsection
@section ('centro')

	<div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h3>Panel de Administración</h3><br>
                <h1 class="text-center">Bienvenido(a) {{ Auth('user')->user()->name." ".Auth('user')->user()->last_name }}</h1> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{ $customersCount }}</span>
                        <span class="font-weight-light">Total de Clientes</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-people"></i>
                    </div>
                </div>
            </div>
        </div>

		<div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{ $productsCount }}</span>
                        <span class="font-weight-light">Productos</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-present"></i>
                    </div>
                </div>
            </div>
        </div>

                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{ $orderCountAprobbed }}</span>
                                    <span class="font-weight-light">Ventas</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-basket"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{ $orderCount }}</span>
                                    <span class="font-weight-light">Pedidos</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
@endsection            