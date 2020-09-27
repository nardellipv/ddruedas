@extends('layouts.main')

@section('body', 'wp-automobile single-post')

@section('content')
    <div class="main-section">
        {{--<div class="page-section"
             style="background: #fafafa none repeat scroll 0 0;margin-bottom: 30px;margin-top: -30px;padding: 39px 0 44px;">
        </div>--}}
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title" style="margin-bottom:20px;">
                            <h3 style="text-align:left;">Registrarse</h3>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="cs-signin">
                                <div class="row">

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Provincia *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <select tabindex="1" name="province"
                                                    class="chosen-select"
                                                    onchange="window.location.href=this.options[this.selectedIndex].value;">
                                                @if(request()->input(['provincia']))
                                                    <option value="{{ $provinceName->id }}">{{ $provinceName->name }}</option>
                                                    <option readonly>-----------------------------</option>
                                                @else
                                                    <option value="">Seleccione una provincia</option>
                                                @endif
                                                @foreach($provinces as $province)
                                                    <option value="{{ route('register', ['provincia'=>$province->id]) }}">{{ $province->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Nombre *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Teléfono *
                                                <small><em>sin código de País (549)</em></small>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone"
                                                   value="{{ old('phone') }}" required autocomplete="name"
                                                   autofocus>

                                            <div class="cs-checkbox">
                                                <input id="phoneWsp" type="checkbox" name="phoneWsp" checked>
                                                <label for="phoneWsp">Teléfono con Whatsapp</label>
                                            </div>

                                            @error('name')
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
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

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
                                                <input type="submit" value="Registrar">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="cs-signin">
                                <div class="row">
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Localidad *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <select tabindex="1" name="region"
                                                    class="chosen-select">
                                                @if(isset($regions))
                                                    @foreach($regions as $region)
                                                        <option value={{ $region->id }}>{{ $region->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Seleccione una localidad</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Apellido *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text"
                                                   class="form-control @error('lastname') is-invalid @enderror"
                                                   name="lastname" value="{{ old('lastname') }}" required
                                                   autocomplete="lastname"
                                                   autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Email *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 6%;">
                                            <label>Confirmar Contraseña *</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
