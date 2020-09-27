@extends('layouts.main')

@section('body', 'single-page wp-automobile')

@section('title','🏍 ' . $item->brand->name .' '. $item->pattern->name .' '. $item->displacement)
@section('meta-description', $item->brand->name .' '. $item->pattern->name .' '. $item->displacement )

@section('og:url', 'https://dedosruedas.com.ar/listado/detalle/' . $item->id)
@section('og:type', 'article')
@section('og:title', $item->brand->name .' '. $item->pattern->name .' '. $item->displacement .' '. $item->money .' '. $item->price)
@if(isset($itemPicture->name))
    @section('og:image', 'https://dedosruedas.com.ar/users/'.$item->user_id.'/images/items/700x700-'. $itemPicture->name )
@endif

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    @include('alerts.error')
                    <div class="custom-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="page-section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @if($item->status == 'Pendiente')
                                        <div class="cs-massege-box">
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <i class="icon-blocked"></i><span>Publicación Pendiente </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($item->status == 'Rechazado')
                                        <div class="cs-massege-box">
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <i class="icon-blocked"></i><span>Publicación Rechazada </span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="car-detail-heading">
                                        <div class="auto-text">
                                            <h2>{{ $item->brand->name }}
                                                <small>{{ $item->pattern->name }} {{ $item->displacement }}</small>
                                            </h2>
                                            @if($item->user->dealer)
                                                <span>
                                               <i class="icon-building-o"></i> {{ $item->user->dealer->nameAgency }}
                                           </span>
                                            @endif

                                            <address><i class="icon-location"></i>{{ $item->user->province->name }}
                                                - {{ $item->user->region->name }}
                                            </address>
                                        </div>
                                        <div class="auto-price"><span
                                                    class="cs-color">{{ $item->money }} {{ $item->price }}</span></div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="custom-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <ul class="blog-detail-slider">
                                                @if(count($pictures)>= 1)
                                                    @foreach($pictures as $picture)
                                                        <li>
                                                            <figure>
                                                                <img src="{{ asset('users/'.$item->user_id.'/images/items/700x700-'.$picture->name) }}"
                                                                     alt="{{ $item->brand->name }}"/>
                                                            </figure>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                         class="img-responsive">
                                                @endif
                                            </ul>
                                            <div class="cs-button-style">
                                                <a href="{{ route('favorite.addFavorite', $item) }}"
                                                   class="btn-shortlist"><i class="icon-heart-o"></i> favorito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-detail-nav">
                                        <ul>
                                            <li><a href="#specification">Especificaciones Técnicas</a></li>
                                            <li><a href="#equipment">Equipamiento</a></li>
                                            <li><a href="#contact">Contacto vía Email</a></li>
                                        </ul>
                                        <div class="detail-btn">
                                            <div class="cs-button-style">
                                                <a class="btn-shortlist"
                                                   href="{{ route('favorite.addFavorite', $item) }}"><i
                                                            class="icon-heart-o"></i> Favorito</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="on-scroll">
                                        <div class="auto-overview detail-content">
                                            <ul class="row">
                                                <li class="col-lg-2 col-md-2 col-sm-5col-xs-5">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-calendar cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Año</span>
                                                        <strong>{{ $item->year }}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-vehicle92 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>KM</span>
                                                        <strong>{{ $item->mileage }}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-engine cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Cilindrada</span>
                                                        <strong>{{ $item->displacement }} cc</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-7 col-xs-7">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-driving2 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Tipo</span>
                                                        <strong>
                                                            <small>{{ $item->type->name }}</small>
                                                        </strong>
                                                    </div>
                                                </li>
                                            </ul>

                                            <h4>Comentarios Vendedor</h4>
                                            <p class="more-text">
                                                {{ $item->comment }}
                                            </p>
                                        </div>
                                        <div id="specification" class="auto-specifications detail-content">
                                            <div class="section-title" style="text-align:left;">
                                                <h4>Especificaciones Técnicas</h4>
                                            </div>
                                            <ul class="row">
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="element-title">
                                                        <i class="cs-color icon-engine"></i>
                                                        <span>Datos técnicos de la Moto</span>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Condición</span>
                                                                <strong>{{ $item->condition }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Cilindradas</span>
                                                                <strong>{{ $item->displacement }}cc</strong>
                                                            </li>
                                                            <li>
                                                                <span>Año</span>
                                                                <strong>{{ $item->year }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Tipo</span>
                                                                <strong>{{ $item->type->name }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Kilometraje</span>
                                                                <strong>{{ $item->mileage }}</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Combustible</span>
                                                                <strong>{{ $item->fuel }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Motor</span>
                                                                <strong>{{ $item->typeEngine }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Permuta</span>
                                                                <strong>{{ $item->barter }}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Visitas</span>
                                                                <strong>{{ $item->visit }}</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="equipment" class="cs-auto-accessories detail-content">
                                            <div class="element-title">
                                                <i class="cs-color icon-gear42"></i>
                                                <span>Equipamiento</span>
                                            </div>
                                            <ul>
                                                @forelse($equipmentItems as $equipmentItem)
                                                    <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <div class="cs-listing-icon">
                                                            <ul>
                                                                <li class="available">
                                                                    <span>{{ $equipmentItem->equipment->name }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <b>No se especificaron equipamientos</b>
                                                    <p>
                                                        <small>Contacta al vendedor para más información</small>
                                                    </p>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div id="equipment" class="cs-auto-accessories detail-content">
                                            <div class="element-title">
                                                <i class="cs-color icon-bank"></i>
                                                <span>Formas de Pago</span>
                                            </div>
                                            <ul>
                                                @foreach($itemPayments as $itemPayment)
                                                    <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <div class="cs-listing-icon">
                                                            <ul>
                                                                <li class="available">
                                                                    <span>{{ $itemPayment->payment->name }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div id="contact" class="cs-contact-form detail-content">
                                            <div class="section-title">
                                                <h4 style="text-align:left;">Contacto Vendedor</h4>
                                                <small style="text-align:left;">Pedí más información al vendedor y
                                                    recibi
                                                    tu respuesta en tu email.
                                                </small>
                                            </div>
                                            <form action="{{ route('email.contactSeller') }}">
                                                <input type="text" name="name" placeholder="Nombre Completo"
                                                       value="{{ old('name') }}" required>
                                                <input type="email" name="email" placeholder="Email"
                                                       value="{{ old('email') }}" required>
                                                <textarea placeholder="Mensaje"
                                                          name="messageSeller"
                                                          required>{{ old('messageSeller') }}</textarea>
                                                <input name="item" value="{{ $item->id }}" hidden readonly>
                                                {!! htmlFormSnippet() !!}
                                                <input type="submit" value="Enviar" class="cs-bgcolor">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('web.items._asideDetail')
                </div>
            </div>
        </div>

        <div class="page-section" style="margin-bottom:30px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div style="text-align:left;margin-top: 30px;" class="cs-section-title">
                            <h3>Pubicaciones Similires</h3>
                        </div>
                    </div>
                    @foreach($itemsRelated as $itemRelated)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="auto-listing auto-grid">
                                <div class="cs-media">
                                    <a href="{{ route('item.detail', $itemRelated) }}">
                                        @if(count($itemRelated->pictures)>= 1)
                                        <figure>
                                            <img src="{{ asset('users/'.$itemRelated->user_id.'/images/items/700x700-'.$itemRelated->pictures[0]->name) }}"
                                                 alt="{{ $itemRelated->brand->name }}"/>
                                        </figure>
                                        @else
                                            <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                 class="img-responsive">
                                        @endif
                                    </a>
                                </div>
                                <div class="auto-text">
                                    <div class="post-title">
                                        <h6>
                                            <a href="{{ route('item.detail', $itemRelated) }}">{{ $itemRelated->brand->name }}
                                                <small>{{ $itemRelated->pattern->name }}</small>
                                            </a></h6>
                                        <div class="auto-price">
                                            <span class="cs-color">{{ $itemRelated->money }} {{ $itemRelated->price }}</span>
                                        </div>
                                        <p>Año<span> {{ $itemRelated->year }}</span></p>
                                        <p><span>{{ $itemRelated->user->province->name }}
                                                , {{ $itemRelated->user->region->name }}</span></p>
                                        <p><span>{{ $itemRelated->type->name }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('styleWeb/assets/scripts/bootstrap-slider.js') }}"></script>
@endsection
