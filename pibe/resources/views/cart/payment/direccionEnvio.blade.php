<div class="col-md-7">
    <div class="ckeckout-left-sidebar">
        <!-- Start Checkbox Area -->
        <div class="checkout-form" style="margin-bottom:30px">
            <h2 class="section-title-3"><i class="ti-truck"></i> MÉTODO DE ENVÍO</h2>
        </div>
        <!-- End Checkbox Area -->
        <ul class="nav nav-pills nav-address-shipping ptb--20 nav-justified payment_address" id="myTab" role="tablist">
            <li class="nav-item text-center">
                <input type="radio" value="agency_shipping" name="shipping" id="shipping" checked>
                <label class="nav-link" for="shipping" id="agency_shipping"><i class="ti-location-pin"></i> Envío a Domicilio</label>
            </li>
            <li class="nav-item text-center">
                <input type="radio" value="store_pickup" name="shipping" id="shop">
                <label class="nav-link" for="shop" id="store_pickup"><i class="ti-home"></i> Recoger en Tienda (Huancayo)</label>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active pt--20 pb--40" id="home" role="tabpanel">
                @component('components.select', ['name' => 'department',
                'title' => 'Departamento','col' => 'col-md-6'])
                @endcomponent

                @component('components.select', ['name' => 'province',
                'title' => 'Provincia','col' => 'col-md-6'])
                @endcomponent

                @component('components.input', ['name' => 'address','title' => 'Direccion de Envío','col' => 'col-md-12'])
                @slot('attributes')
                maxLength = "150"
                @endslot
                @endcomponent

                @component('components.input', ['name' => 'referenceAddress','title' => 'Referencia a la Direccion','col' => 'col-md-12'])
                @slot('attributes')
                maxLength = "200"
                @endslot
                @endcomponent
            </div>
            <div class="tab-pane fade pb--20" id="profile2" role="tabpanel">
                <p> <b>Acercate a nuestra tienda, y obtén un obsequio!</b></p><br>
                <p> Para poder recoger tus artículos en la tienda, debes traer tu DNI o algun documento de identificación y alguno de los siguientes documentos 
                    <br> 1. El numero de tu pedido
                    <br> 2. Una captura de pantalla del recibo de compra enviado a tu correo 
                    <br>3. El recibo de compra enviado a tu correo impreso.
                </p><br>
                <p>Dirección
                    <br>Calle Real N° 365 - Huancayo
                </p><br>
                <p>Horarios de atencion: Lunes a Sábado
                    <br>- 10:00 am a 1:00 pm 
                    <br>- 03:00 pm a 6:00 pm
                </p><br>
                
            </div>
                <div class="chekbox_pib">
                    <input type="checkbox" id="person">
                    <label for="person" >Quiero que otra persona lo recoja por mi</label>
                </div>
                <div class="row panel-collapse collapse pt--30" id="addCustomerPanel" role="tabpanel">
                    @component('components.input', ['name' => 'order_name','title' => 'Nombre','col' => 'col-md-6'])
                    @endcomponent

                    @component('components.input', ['name' => 'order_paternal_surname','title' => 'Apellidos','col' => 'col-md-6'])
                    @endcomponent

                    @component('components.input', ['name' => 'order_num_document','title' => 'Numero de documento','col' => 'col-md-6'])
                    @slot('attributes')
                    onkeypress= "return soloNumeros(event)"
                    @endslot
                    @endcomponent
                </div>  
            </div>
        <hr>
    </div>
    
    @include('cart.payment.metodoPago')       
</div>