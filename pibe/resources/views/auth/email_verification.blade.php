@extends('maestra-cliente.maestracliente')
@section('titulo', 'El Pibe')
@section ('centro')
<div class="htc__login__register bg__white pt--70 pb--120">
	<div class="container">
		<div class="row">
            <div class="col-md-8">
                <h2 class="ptb--30" >¡Gracias por registrarte! </h2>
                <h1 class="ptb--30">Consulta tu correo electrónico: {{ $email }}, para poder verificar tu cuenta</h1>
                <h6 class="pb--20"><b>Nota:</b> Si no recibes el correo electrónico en unos minutos:</h6>
                <ul>
                    <li><i class="ti-angle-double-right"></i> Verifica la carpeta de spam</li>
                    <li><i class="ti-angle-double-right"></i> Verifica si tu correo esta escrito correctamente</li>
                    <li><i class="ti-angle-double-right"></i> Si no puede resolver el problema, póngase el contacto con <a href="javascript:void(0)">informacion@elpibe.com</a>.</li>                                        
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection