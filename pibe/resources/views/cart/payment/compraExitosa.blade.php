@extends('maestra-cliente.maestracliente')
@section('titulo', 'Compra realizada satisfactoriamente')
@section ('centro')
<div class="htc__login__register bg__white ptb--80">
	<div class="container">
        <div class="row">
            <div class="col-md-5">
                <img class="img-fluid" src="{{ asset('/img_web/happystate.gif') }}"></img>
            </div>
            <div class="col-md-7">
            <br>
                <h1>¡Su pedido se realizó exitosamente!</h1>
                <h4 class="ft__title pt--20">¿Dudas o Consultas? No dudes en comunicarte!</h4><hr>
                <ul class="row">
                    <li class="col-md-4">Telefono: <br><strong>930 111 111</strong></li>
                    <li class="col-md-4">Email:<br><strong>informacion@elpibeperu.com</strong></li>
               <!--      <li class="col-md-4">Titular :<br><strong>Consuelo  Rojas</strong></li> -->
                    
                </ul>
                <p class="pt--10">Le enviaremos un mensaje de confirmacion de su pedido a su correo electronico</p>
                <h3 class="pl--10 ptb--30">Mire el estado de su pedido en su <b><a href="{{ url('profile/orders') }}">perfil de usuario</a></b>.</h3>     
            </div>
        </div>
    </div>
</div>
@endsection