@extends('customer.menuProfileSidebar')
@section('content')
<div class="row show_order">
    <h2 >Voucher Enviado - Pedido # {{ $boucher->order_id}}</h2>
    <div class="col-lg-7">
        <div class="card_pibe">
            <div class="single__contact__address">
                <div class="contact__icon">
                    <span class="ti-ticket"></span>
                </div>
                <div class="contact__details">
                   <img  src="/{{ $boucher->image }}" alt="product img"/>
                </div>

            </div>
        </div>
        <div class="ptb--50">
        <a class="btn btn-success - btn-rounded" href="{{ url('profile/boucher') }}"><i class="ti ti-angle-left"></i> Volver Atrás</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
   

@endsection