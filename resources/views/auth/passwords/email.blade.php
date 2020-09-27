@extends('layouts.main')

@section('body', 'wp-automobile single-post')

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title" style="margin-bottom:20px;">
                            <h3 style="text-align:left;">Recuperar Contraseña</h3>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-6">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="cs-signin">
                                <div class="row">

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
                                            <div class="cs-btn-submit">
                                                <input type="submit" value="Recuperar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6 col-xs-6">
                            <div class="cs-column-text" style="padding: 10px">
                                <p>Te enviamos un email a la casilla con la que te registraste, una vez que lo recibas
                                    seguí las instrucciones para poder reiniciar tu contraseña. Verificá los correos no
                                    deseados por si el email llegá ahí.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
