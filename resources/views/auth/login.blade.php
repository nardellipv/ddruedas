@extends('layouts.main')

@section('body', 'wp-automobile single-post')

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title" style="margin-bottom:20px;">
                            <h3 style="text-align:left;">Ingresar</h3>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-6">
                        <div class="cs-signin">
                            <div class="row">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Email *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Contraseña *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-btn-submit">
                                                <input type="submit" value="Ingresar">
                                            </div>
                                            <a href="{{ route('password.request') }}" class="cs-forgot-password"><i
                                                        class="cs-color icon-help-with-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Se envia un email para recuperar clave"></i>Recuperar
                                                Contraseña</a>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recordarme') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="cs-column-text" style="padding: 30px">
                            <p>Si no tenes cuenta en la plataforma, te invitamos a
                                registrarte y vender tu moto o los accesorios de tu motocicleta totalmente gratis, sin
                                intermediarios ni comisiones.</p>
                            <a href="{{ route('register') }}" class="cs-button"
                               style="color:#fff;font-size:11px; padding:12px 45px; font-weight:bold; text-transform:uppercase;">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
