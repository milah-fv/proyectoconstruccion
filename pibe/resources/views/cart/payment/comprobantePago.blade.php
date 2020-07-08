                  <hr>
                <div class="row">
                <div class="col-sm-12">
                    
                        <input type="radio" id="boleta" name="comprobante" value="boleta" checked> 
                        <label for="boleta" id="boleta" style="margin-right:15px"><b>Deseo Boleta</b> </label>
                    
                        <input type="radio"  id="factura" name="comprobante" value="factura">
                        <label for="factura" id="factura"><b>Deseo Factura</b> </label>
                    
                </div>
                </div>
                <div class="row panel-collapse collapse pt--30" id="comprobante_factura_datos" role="tabpanel">
                    <!-- @component('components.input', ['name' => 'ruc','title' => 'RUC','col' => 'col-md-6'])
                    @endcomponent -->

                    @component('components.input', ['name' => 'invoice_razon_social','title' => 'Razon Social','col' => 'col-md-6'])
                    @endcomponent

                    @component('components.input', ['name' => 'invoice_ruc','title' => 'RUC','col' => 'col-md-6', 'id' => 'invoice_ruc'])
                    @slot('attributes')
                    onkeypress= "return soloNumeros(event)"
                    @endslot
                    @endcomponent
                </div>  
                <hr>