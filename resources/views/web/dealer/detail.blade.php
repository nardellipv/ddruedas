@extends('layouts.main')

@section('body', 'cs-agent-detail wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section" style="background-color:#fafafa; padding:40px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-admin-info">
                            <div class="cs-media" style="width: 16%">
                                <figure>
                                    <img src="{{ $dealer->logo }}" alt="{{ $dealer->nameAgency }}"
                                         class="img-responsive"/>
                                </figure>
                            </div>
                            <div class="cs-text">
                                <div class="cs-title">
                                    <h3>{{ $dealer->nameAgency }}</h3>
                                </div>
                                <address>{{ $dealer->user->province->name }}<br/>
                                    {{ $dealer->user->region->name }}</address>
                                <ul>
                                    <li>
                                        <span>Teléfono Principal<i class="icon-keyboard_arrow_down"></i></span>
                                        {{ $dealer->phone }}
                                        <ul>
                                            @if($dealer->phone1)
                                                <li>
                                                    <span>Teléfono</span>
                                                    {{ $dealer->phone1 }}
                                                </li>
                                            @endif
                                            @if($dealer->phoneWsp)
                                                <li>
                                                    <span>WhatsApp</span>
                                                    {{ $dealer->phoneWsp }}
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                    <li>
                                        <span>Sitio Web</span>
                                        <a href="{{ $dealer->web }}"
                                           rel="ugc,nofollow">{{ Str::limit($dealer->web,30) }}</a>
                                    </li>
                                    <li>
                                        <span>Email</span>
                                        <a href="#">{{ $dealer->email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section" style="border-top:1px solid #eee; border-bottom:1px solid #eee; padding:20px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{--<div class="cs-post-option pull-left">--}}
                                {{--<ul>--}}
                                {{--<li>--}}
                                {{--<i class="icon-clock"></i>--}}
                                {{--Open Today--}}
                                {{--<span>8:30am - 5:30pm<i class="icon-keyboard_arrow_down"></i></span>--}}
                                {{--<ul class="cs-timeline-list">--}}
                                {{--<li>--}}
                                {{--Monday <span>8:30am - 5:30pm</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--Tuesday <span>8:30am - 5:30pm</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--Wednesday <span>8:30am - 5:30pm</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--Thursday <span>8:30am - 5:30pm</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--Friday <span>8:30am - 5:30pm</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--Saturday <span>8:30am - 5:30pm</span>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--Sunday <span>Closed</span>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                <div class="cs-social-media pull-right">
                                    <ul>
                                        <li><a href="{{ $dealer->facebook }}" target="_blank"><i
                                                        class="icon-facebook22"></i></a></li>
                                        <li><a href="{{ $dealer->instagram }}" target="_blank"><i
                                                        class="icon-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="rich_editor_text">
                                    <strong>Sobre {{ $dealer->nameAgency }}</strong>
                                    <p>{{ $dealer->about }}.</p>
                                </div>

                                <div class="rich_editor_text">
                                    <strong>Listado de motos</strong>
                                </div>
                                @foreach($items as $item)
                                    <div class="auto-listing">
                                        <div class="cs-media">
                                            <figure><img alt="{{ $item->brand->name }}" src="{{ $item->name }}"
                                                         class="img-responsive"
                                                         style="width: 73%; margin-left: 15%"></figure>
                                        </div>
                                        <div class="auto-text">
                                            <div class="post-title">
                                                <h4><a href="{{ route('item.detail', $item) }}">{{ $item->brand->name }}
                                                        <small>{{ $item->pattern->name }}</small>
                                                    </a></h4>
                                                <div class="auto-price"><span
                                                            class="cs-color">{{ $item->money }} {{ $item->price }}</span>
                                                </div>
                                            </div>
                                            <ul class="auto-info-detail">
                                                <li>Año<span>{{ $item->year }}</span></li>
                                                <li>Kilometraje<span>{{ $item->mileage }}</span></li>
                                                <li>Cilindrada<span>{{ $item->displacement }}</span></li>
                                                <li>Tipo<span>{{ $item->type->name }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <nav>
                                        <ul class="pagination">
                                            {{ $items->render() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="cs-tabs-holder">
                                    <div class="cs-location-tabs">
                                        <!--Tabs Start-->
                                        <div class="cs-tabs horizontal vertical">

                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#home"><i
                                                                class="icon-location-pin"></i>Ubicación</a></li>
                                            </ul>

                                            <div class="tab-content">
                                                <div id="home" class="tab-pane fade in active">
                                                    <iframe
                                                            width="100%"

                                                            height="340px"
                                                            frameborder="0" style="border:0"
                                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD7eUalpQrZ5TA9BrE5XgsudugZC7TIPYo
                                        &q={{ $dealer->address .','. $dealer->user->region->name . $dealer->user->province->name}}"
                                                            allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>

                                        </div>

                                        <!--Tabs End-->
                                    </div>
                                    <div class="cs-agent-contact-form">
                                        <span class="cs-form-title">Contactar Agencia</span>
                                        <form>
                                            <input type="text" placeholder="Nombre"/>
                                            <input type="email" placeholder="Email"/>
                                            <textarea name="menssageDealer"></textarea>
                                            <input class="cs-bgcolor" type="submit" value="Contactar Agencia"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section" style="background:#19171a;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-ad" style="text-align:center; padding:55px 0 32px;">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/extra-images/cs-ad-img.jpg" alt=""/>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
