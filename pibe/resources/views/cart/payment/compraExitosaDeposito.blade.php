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
                <h1>¡Su pedido se realizó exitosamente!</h1>
                <p class="pt--10">Tu pedido está a la espera que confirmemos que el pago se ha recibido. Le enviaremos las instrucciones de pago a su correo electronico</p>
                <h4 class="ft__title pt--20">NUESTROS DETALLES BANCARIOS</h4><hr>
                <ul class="row">
                    <li class="col-md-4">Banco: 
                        <br><strong>BCP</strong>
                        <br><strong>BBVA Banco Continental</strong>
                    </li>
                    <li class="col-md-4">Número de cuenta:
                        <br><strong>0011 1231 1231231231</strong>
                        <br><strong>0022 3213 3123213213</strong>
                    </li>
                    <li class="col-md-4">Titular :<br><strong>Pedro Gomez Rosales</strong></li>
                </ul>
                <ul class="row">
                    <li class="col-md-4"><br><br>Aplicaciones: 
                        <br><strong>Yape</strong>
                    </li>
                    <li class="col-md-4"><br><br>Número:
                        <br><strong>900 123 123</strong>
                    </li>
                    <li class="col-md-4"><br><br>Titular :<br><strong>Pedro Gomez Rosales</strong></li>
                </ul>
                <h3 class="pl--10 ptb--30"><b>El boucher de pago lo debe enviar como imágen al WhatsApp 900 123 123</b></h3>  <br>
                <h3 class="pl--10 ptb--30">Mire el estado de su pedido en su <b><a href="{{ url('profile/orders') }}">perfil de usuario</a></b>.</h3>  
            </div>
        </div>
    </div>
</div>
@endsection