@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        {{--<div class="page-section" style=" padding-top:20px; padding-bottom:10px; ">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <!--Element Section Start-->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-contact-info left">
                                    <div class="cs-media"><i class="icon-map4 cs-color"></i></div>
                                    <div class="cs-text">
                                        <h6>Contact Info</h6>
                                        <p>Automotive inc. # O Office Address
                                            101 Gray's Inn Rd, London
                                            United Kingdom</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-contact-info left">
                                    <div class="cs-media"><i class="icon-envelope2 cs-color"></i></div>
                                    <div class="cs-text">
                                        <h6>Emaill Address</h6>
                                        <p><a href="#">info@automotive.com</a>
                                            <a href="#">email-2@automotive.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-contact-info left">
                                    <div class="cs-media"><i class="icon-phone4 cs-color"></i></div>
                                    <div class="cs-text">
                                        <h6>Phone Numbers</h6>
                                        <p><span>Telephone: 281-290-4755</span>
                                            <span>Fax: 281-290-4755</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-contact-info left">
                                    <div class="cs-media"><i class="icon-briefcase3 cs-color"></i></div>
                                    <div class="cs-text">
                                        <h6>Office Timings</h6>
                                        <p><span>WEEK DAYS: 05:00 – 22:00</span>
                                            <span>SATURDAY: 08:00 – 18:00</span>
                                            <span>SUNDAY: CLOSED</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="cs-seprater" style="text-align:center;"> <span> <i class="icon-transport177"> </i> </span> </div>
                            <!--Element Section End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <div class="page-section" style="padding-top:40px; padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <!--Element Section Start-->
                            <div class="cs-contact-form">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title">
                                        <h3 style="text-transform:uppercase !important;">Formulario de contacto</h3>
                                        <p style="text-transform:uppercase;font-size:11px;color:#999999 !important;">
                                            Cualquier duda o sugerencia sobre el sitio le pedimos que se ponga en
                                            contacto con nuestros
                                            representantes <br> a través del siguiente formulario.</p>
                                    </div>
                                    @include('alerts.error')
                                </div>
                                <form method="POST" action="{{ route('home.sendContact') }}">
                                    @csrf
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-form-holder">
                                                    <div class="input-holder"><input type="text" name="name"
                                                                                     placeholder="Nombre"
                                                        value="{{ old('name') }}"><i
                                                                class=" icon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-form-holder">
                                                    <div class="input-holder"><input type="email" name="email"
                                                                                     placeholder="Email Address"
                                                                                     value="{{ old('email') }}"><i
                                                                class=" icon-envelope"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-form-holder">
                                                    <div class="input-holder" id="data-toggle">
                                                        <input type="checkbox" id="cbox2" name="newsletter" value="1" checked>
                                                        <label for="cbox2">Deseo suscribirme al newsletter</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-form-holder">
                                                    <div class="input-holder">
                                                        <textarea name="comment"
                                                                  placeholder="Comentarios a nuestros representantes">{{ old('comment') }}</textarea><i></i>
                                                        {!! htmlFormSnippet() !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="cs-btn-submit cs-color">
                                                    <input type="submit" value="Enviar">
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
    </div>
@endsection
