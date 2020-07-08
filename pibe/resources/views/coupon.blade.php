<!-- Inicio Cupón -->
@foreach ($coupon as $coupon)
    <div class="cupon" >
       <div class="cupon-centro ">
            <!-- <img  src="{{ asset('img_web/cupones/bruja.png') }}" alt="" width="70px" style="position:absolute; "> -->
				
	            <h2> {{ $coupon->title}}</h2>
	                @if($coupon->type =='fijo')
	                <p>  Obten un descuento de <b>S/. {{ number_format($coupon->value, 2)}}</b> en tus compras online aplicando este cupón
	                @elseif($coupon->type =='porcentaje')
	                <p>  Obten un <b>{{ $coupon->percent_off}}%</b> de descuento en tus compras online aplicando este cupón
	                @endif
	            <span class="texto-cupon"><b>{{ $coupon->code}}</b></span>
	            </p>

	            <p style="text-align:right; font-size:10px; margin:0px; padding:0px">
	            @if($coupon->min_amount!= null)
	            Por compras mayores a S/. {{ $coupon->min_amount}}. - 
	            @endif
	            Valido hasta {{ date('d-m-Y', strtotime($coupon->expiry_date)) }}
	            </p>
	            
        </div>
    </div>
   @endforeach
<!-- Fin cupón -->