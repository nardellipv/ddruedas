@extends('layouts.main')

@section('body', 'wp-automobile single-post')

@section('content')
    <div class="main-section">
        <div class="page-section" style=" padding-top: 75px; padding-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-page-not-found">
                            <div class="cs-text">
                                <p>Lo siento, hay un error en la solicitud que esta realizando.</p>
                                <span class="cs-error">500<em> Error</em></span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="cs-seprater-v1">
                            <a href="{{ route('home') }}">
                            <span><i class="icon-home2 cs-bgcolor"> </i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
