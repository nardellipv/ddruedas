@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section" style="margin-bottom:40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="cs-column-text">
                            <h2 style="font-size:26px !important;">Bienvenidos a dedosruedas</h2>
                            <p>Somos un sitio argentino en donde proporcionamos una plataforma a personas que desean
                                comprar o vender su motocicleta. Creamos este sitio porque vimos que el mercado
                                Argentino esta abocado en su mayoria a automoviles y no solo a motos, creemos y estamos
                                convencidos
                                que los amantes de las motocicletas van a utilizar este sitio y apoyar este
                                emprendimiento.</p>
                            <p>Nuestro clasificado proporciona listados fáciles de busquedas a motocicletas a la venta,
                                encuentra motos de todo tipo
                                cerca de tu zona.</p>
                            <ul class="cs-icon-list">
                                <li><i class="icon-check2 cs-color"></i>Buscar de manera fácil.</li>
                                <li><i class="icon-check2 cs-color"></i>Contacto con el vendedor, sin intermediarios.
                                </li>
                                <li><i class="icon-check2 cs-color"></i>Compara distintas motos.</li>
                                <li><i class="icon-check2 cs-color"></i>Comprar o Vender repuesto de motocicletas.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="image-frame defualt">
                            <div class="cs-media">
                                <figure><img src="{{ asset('styleWeb/assets/images/text.png') }}" alt="dedosruedas"/></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
