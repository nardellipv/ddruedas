<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon-warning3"></i><span> Tenes una <b>agencia de motos</b> u ofreces algún <b>servcio</b> entra <a
                href="{{ route('register.dealer') }}">acá</a></span></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <ul class="cs-user-accounts-list">
        <li class="{{ route::is('dashboard.listVehicles') ? 'active' : '' }}"><a
                href="{{ route('dashboard.listVehicles') }}">Mis Motos</a></li>
        <li class="{{ route::is('dashboard.listAccesories') ? 'active' : '' }}"><a
                href="{{ route('dashboard.listAccesories') }}">Mis Accesorios</a></li>
        <li class="{{ route::is('favorite.index') ? 'active' : '' }}"><a href="{{ route('favorite.index') }}">Mis
                Favoritos</a></li>
        <li class="{{ route::is('profile.viewProfile') ? 'active' : '' }}"><a
                href="{{ route('profile.viewProfile') }}">Peril</a></li>
        <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="icon fa fa-sign-out">Salir</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
