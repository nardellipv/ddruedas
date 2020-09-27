@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section"
             style="background:url(assets/extra-images/user-bg-img.jpg) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-user-account-holder">

                            <div class="row">
                                @include('web.user._menu')
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title">
                                        <h4>Perfil General</h4>
                                    </div>
                                </div>

                                @include('alerts.error')

                                <form action="{{ route('profile.updateProfile', $profile) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
                                    {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-profile-pic">
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="profile-pic">
                                                    <div class="cs-media">
                                                        <figure><img src="assets/extra-images/profile-pic.jpg" alt=""/>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="cs-browse-holder"><em>My Profile Photo</em> <span
                                                            class="file-input btn-file"> Update Avatar
												<input type="file" multiple>
												</span></div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Nombre</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="cs-field">
                                                                <input type="text" name="name"
                                                                       value="{{ $profile->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Apellido</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="cs-field">
                                                                <input type="text" name="lastname"
                                                                       value="{{ $profile->lastname }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="cs-field">
                                                                <input type="email" name="email"
                                                                       value="{{ $profile->email }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Teléfono</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="cs-field">
                                                                <input type="text" name="phone"
                                                                       value="{{ $profile->phone }}">
                                                            </div>
                                                            <div class="cs-checkbox">
                                                                <input id="phoneWsp" type="checkbox" name="phoneWsp"
                                                                        {{ $profile->phoneWsp == "1" ? "checked" : "" }}>
                                                                <label for="phoneWsp">Teléfono con Whatsapp</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Provincia</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <select data-placeholder="Provincia" tabindex="1" class="chosen-select" name="province"
                                                    onchange="window.location.href=this.options[this.selectedIndex].value;">
                                                @if(request()->input(['provincia']))
                                                    <option value="{{ $provinceName->id }}">{{ $provinceName->name }}</option>
                                                    <option readonly>-----------------------------</option>
                                                @else
                                                    <option value="{{ $profile->province_id }}">{{ $profile->province->name }}</option>
                                                    <option value="" disabled>---------------------------</option>
                                                @endif
                                                @foreach($provinces as $province)
                                                    <option value="{{ route('profile.updateProvince', ['provincia'=>$province->id, 'usuario'=>$profile->id]) }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Localidad</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="region">
                                                <option value="{{ $profile->region_id }}">{{ $profile->region->name }}</option>
                                                <option value="" disabled>---------------------------</option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Actualizar Contraseña</h6>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Contraseña Actual</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="password" name="current_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Contraseña</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="password" name="new_password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                            <div class="cs-field">
                                                <div class="cs-btn-submit"><input type="submit"
                                                                                  value="Guardar Cambios">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
