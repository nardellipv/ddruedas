@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section"
            style="background:url({{ asset('styleWeb/assets/images/user-bg-img.jpg') }}) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;">
        </div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-user-account-holder">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title">
                                        <h4>Registrarse como Agencia o Servicio</h4>
                                    </div>
                                </div>
                                <form class="user-setting">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-profile-pic">
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="profile-pic">
                                                    <div class="cs-media">
                                                        <figure> <img src="assets/extra-images/profile-pic.jpg" alt="" />
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="cs-browse-holder"> <em>Logo</em> <span
                                                        class="file-input btn-file"> Update Avatar
                                                        <input type="file" multiple>
                                                    </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Nombre del comercio</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="naceAgency" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Nombre Persona Responsable</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="naceAgency" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="email" name="email" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Telefono 1</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" name="phone" value="">
                                                            <div class="cs-switch-holder">
                                                                <label for="someSwitchOptionDefault">Teléfono Con
                                                                    Whatsapp</label>
                                                                <div class="material-switch">
                                                                    <input id="someSwitchOptionDefault"
                                                                        name="someSwitchOption001" type="checkbox" />
                                                                    <label for="someSwitchOptionDefault"
                                                                        class="label-default"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Telefono 2</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" name="phone" value="">
                                                            <div class="cs-switch-holder">
                                                                <label for="someSwitchOptionDefault">Teléfono Con
                                                                    Whatsapp</label>
                                                                <div class="material-switch">
                                                                    <input id="someSwitchOptionDefault"
                                                                        name="someSwitchOption001" type="checkbox" />
                                                                    <label for="someSwitchOptionDefault"
                                                                        class="label-default"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Acerca del comercio</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Redes Sociales</h6>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <a href="#" data-original-title="Facebook">Facebook<i
                                                        class="icon-facebook"></i></a>
                                            </div>
                                            <div class="cs-field">
                                                <a href="#" data-original-title="Instagram">Instagram<i
                                                        class="icon-instagram"></i></a>
                                            </div>
                                            <div class="cs-field">
                                                <a href="#" data-original-title="Sitio Web">Sitio Web<i
                                                        class="icon-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                            <div class="cs-field">
                                                <div class="cs-btn-submit"><input type="submit" value="Guardar Cambios"></div>
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
