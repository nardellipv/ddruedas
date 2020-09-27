{{--<div class="page-section" style="background:#19171a;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-ad" style="text-align:center; padding:55px 0 32px;">
                    <div class="cs-media">
                        <figure>
                            <img src="{{ asset('styleWeb/assets/extra-images/cs-ad-img.jpg') }}" alt=""/>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<footer id="footer" style="background:#19171a;padding:32px 0 0">
    <div class="cs-footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-our-partners">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Nuestros Partners</h6>
                        </div>
                        <ul>
                            <li><a href="https://www.mikant.com.ar" target="_blank">mikant.com.ar</a></li>
                            <li><a href="https://guiaceliaca.com.ar">guiaceliaca.com.ar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-categores">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Categorías</h6>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="https://dedosruedas.com.ar/shop/categoria/{{ $category->slug }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-about-us">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Links de interes</h6>
                        </div>
                        <ul>
                            <li><a href="{{ route('about') }}">Sobre Nosotros</a></li>
                            <li><a href="{{ route('term') }}">Términos y Condiciones</a></li>
                            <li><a href="{{ route('faqs') }}">Preguntas frecuentes</a></li>
                            <li><a href="{{ route('contact') }}">Contacto</a></li>
                            <li><a href="{{ route('blog.index') }}">Noticias</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-news-letter">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">NewsLetters</h6>
                        </div>
                        <p>Registrate y recibí en tu email las últimas noticias del mundo de las motos. </p>
                        <div class="cs-form">
                            <form method="POST" action="{{ route('newsLetter.add') }}">
                                @csrf
                                <div class="input-holder">
                                    <input type="email" name="email" placeholder="Ingresar Email">
                                    <label> <i class="icon-send2"></i>
                                        <input class="cs-bgcolor" type="submit">
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="cs-social-media">
                            <ul>
                                <li><a href="https://www.facebook.com/dedosruedas/" target="_blank" data-original-title="facebook"><i class="icon-facebook"></i></a></li>
                                {{--<li><a href="#" data-original-title="instagram"><i class="icon-instagram3"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-copyright" style="background:#141215; padding-top:37px; padding-bottom:37px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="copyright-text">
                        <p>designed by <a href="https://www.mikant.com.ar" class="cs-color">MikAnt</a> </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-back-to-top">

                        <a class="btn-to-top cs-bgcolor" href="#"><i class="icon-keyboard_arrow_up"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</footer>