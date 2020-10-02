<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="cs-logo">
                    <div class="cs-media">
                        <figure><a href="{{ url('/') }}"><img src="{{ asset('styleWeb/assets/images/logo.png') }}"
                                                              alt=""/></a></figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div class="cs-main-nav pull-right">
                    <nav class="main-navigation">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('item.index') }}">Listado</a></li>
                            <li><a href="{{ route('accessory.index') }}">Accesorios</a></li>
                             <li><a href="{{ route('dealer.index') }}">Agencias</a></li>
                            <li><a href="{{ route('dealer.index') }}">Oficios</a></li> 
                            {{--  <li><a href="{{ route('blog.index') }}">Noticias</a></li>  --}}
                            <li><a href="{{ route('contact') }}">Contacto</a></li>
                            {{--  <li class="cs-user-option">
                                <div class="cs-login">
                                    <div class="cs-login-dropdown"><a href="#"> Ayuda <i class="icon-chevron-down2"></i></a>
                                        <div class="cs-user-dropdown">
                                            <ul>
                                                <li><a href="{{ route('about') }}">Sobre Nosotros</a></li>
                                                <li><a href="{{ route('term') }}">Términos y Condiciones</a></li>
                                                <li><a href="{{ route('faqs') }}">Preguntas Frecuentes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>  --}}

                            @auth
                                <li class="cs-user-option">
                                    <div class="cs-login">
                                        <div class="cs-login-dropdown"><a href="#"><i class="icon-user2"></i> {{ Auth::user()->name }} <i
                                                        class="icon-chevron-down2"></i></a>
                                            <div class="cs-user-dropdown">
                                                <ul>
                                                    <li><a href="{{ route('dashboard.listVehicles') }}">Mis Motos</a>
                                                    </li>
                                                    <li><a href="{{ route('dashboard.listAccesories') }}">Mis Accesorios</a>
                                                    </li>
                                                    <li><a href="{{ route('favorite.index') }}">Mis Favoritos</a>
                                                    </li>
                                                    <li><a href="{{ route('profile.viewProfile') }}">Mi Perfil</a>
                                                    </li>
                                                </ul>
                                                <a class="btn-sign-out" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                            class="icon fa fa-sign-out">Salir</a></div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                        <a href="{{ route('dashboard.publicMoto') }}"
                                           class="cs-bgcolor btn-form"
                                           aria-hidden="true"><i class="icon-plus"></i> Publicar Moto</a>
                                    </div>
                                </li>
                            @endauth
                            @guest
                                <li><a href="{{ route('login') }}">Ingresar</a></li>
                                <li><a href="{{ route('register') }}">Registrarse</a></li>
                            @endguest
                        </ul>
                    </nav>


                    <div class="cs-user-option hidden-lg visible-sm visible-xs">
                        <div class="cs-login">
                            <div class="cs-login-dropdown"><a href="#"> Ayuda <i class="icon-chevron-down2"></i></a>
                                <div class="cs-user-dropdown">
                                    <ul>
                                        <li><a href="{{ route('about') }}">Sobre Nosotros</a></li>
                                        <li><a href="{{ route('term') }}">Términos y Condiciones</a></li>
                                        <li><a href="{{ route('faqs') }}">Preguntas Frecuentes</a></li>
                                    </ul>
                                    <a class="btn-sign-out" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="cs-user-option hidden-lg visible-sm visible-xs">
                        <div class="cs-login">
                            @auth
                            <div class="cs-login-dropdown"><a href="#">
                                    <i class="icon-user2"></i> {{ Auth::user()->name }} <i
                                            class="icon-chevron-down2"></i></a>
                                <div class="cs-user-dropdown">
                                    <ul>
                                        <li><a href="{{ route('dashboard.listVehicles') }}">Mis Motos</a>
                                        </li>
                                        <li><a href="{{ route('dashboard.listAccesories') }}">Mis Accesorios</a>
                                        </li>
                                        <li><a href="{{ route('favorite.index') }}">Mis Favoritos</a>
                                        </li>
                                        <li><a href="{{ route('profile.viewProfile') }}">Mi Perfil</a>
                                        </li>
                                    </ul>
                                    <a class="btn-sign-out" href="#">Logout</a></div>
                                <a href="{{ route('dashboard.publicMoto') }}" class="cs-bgcolor btn-form"
                                   aria-hidden="true"><i class="icon-plus"></i> Publicar Moto</a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>