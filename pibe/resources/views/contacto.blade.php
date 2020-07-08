@extends('maestra-cliente.maestracliente')
@section('titulo', 'Contacto - El Pibe')
@section('coupon')
@include('coupon')
@endsection
@section ('centro')
  
  <!-- Start Bradcaump area -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Contáctanos</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Inicio</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Contáctanos</span>
                                </nav>
                            </div>
                        </div>
                    </div>
            
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="htc__contact__container">
                            <div class="htc__contact__address">
                                <h2 class="contact__title">Información de Contacto</h2>
                                <div class="contact__address__inner">
                                    <!-- Start Single Adress -->
                                    <div class="single__contact__address">
                                        <div class="contact__icon">
                                            <span class="ti-location-pin"></span>
                                        </div>
                                        <div class="contact__details">
                                            <p>Dirección : <br> Calle Real Nro. 643</p>
                                        </div>
                                    </div>
                                    <!-- End Single Adress -->
                                </div>
                                <div class="contact__address__inner">
                                    <!-- Start Single Adress -->
                                    <div class="single__contact__address">
                                        <div class="contact__icon">
                                            <span class="ti-mobile"></span>
                                        </div>
                                        <div class="contact__details">
                                            <p> Teléfono : <br>064 - 212205 </p>
                                        </div>
                                    </div>
                                    <!-- End Single Adress -->
                                    <!-- Start Single Adress -->
                                    <div class="single__contact__address">
                                        <div class="contact__icon">
                                            <span class="ti-email"></span>
                                        </div>
                                        <div class="contact__details">
                                            <p> Email :<br>elpibehuancayo@gmail.com</p>
                                        </div>
                                    </div>
                                    <!-- End Single Adress -->
                                </div>
                            </div>
                            <div class="contact-form-wrap">
                            <div class="contact-title">
                                <h2 class="contact__title">Escríbenos</h2>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <form  action="{{ url('/contacto') }}" method="post">
                            @csrf
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" required name="name" placeholder="Nombre">
                                        <input type="email" required name="email" placeholder="Correo">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box subject">
                                        <input type="text" name="subject" placeholder="Asunto">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message"  placeholder="Mensaje"></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="fv-btn">Enviar</button>
                                </div>
                            </form>
                        </div> 
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="map-contacts">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3901.7597660698066!2d-75.2155396!3d-12.0600433!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910e97cbfb2a3475%3A0xd0ac40812c9326e2!2sEl+Pibe!5e0!3m2!1ses!2spe!4v1541100429304" width="600" height="450" frameborder="0" style="border:0;  border-radius: 10px;" " allowfullscreen></iframe>
                           
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->



@section('scripts')

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

    <script>
        function initialize() {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(49.1678136, 16.5671893),
                mapTypeId: google.maps.MapTypeId.ROAD,
                scrollwheel: false
            }
            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);

            var myLatLng = new google.maps.LatLng(49.1681989, 16.5650808);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection

@endsection