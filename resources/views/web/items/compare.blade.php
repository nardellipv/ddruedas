@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-compare">
                            <ul class="cs-compare-list">
                                <li>
                                    <div class="cs-compare-box">
                                        <div class="Specification-logo">
                                            <img src="{{ asset('styleWeb/assets/images/logo.png') }}"
                                                 alt="#"/>
                                        </div>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <div class="cs-media">
                                                @if(count($item->pictures)>= 1)
                                                    <figure>
                                                        <img src="{{ asset('users/'.$item->user_id.'/images/items/700x700-'.$item->pictures[0]->name) }}"
                                                             alt="{{ $item->brand->name }}"/>
                                                    </figure>
                                                @else
                                                    <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                         class="img-responsive">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <p class="label">Precio</p>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <div class="cs-post-title">
                                                <h6>
                                                    <a href="{{ route('item.detail', $item) }}">{{ $item->brand->name }}
                                                        <small>{{ $item->pattern->name }}</small>
                                                    </a>
                                                </h6>
                                            </div>
                                            <div class="cs-price">
                                                <strong class="cs-color">{{ $item->money }} {{ $item->price }}</strong>
                                            </div>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Condición</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->condition }}</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Cilindradas</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->displacement }}cc</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Año</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->year }}</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Kilometraje</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->mileage }}km.</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Tipo</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->type->name }}</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Combustible</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->fuel }}</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Permuta</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->barter }}</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Comentario Vendedor</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <span>{{ $item->comment }}</span>
                                        </div>
                                    @endforeach
                                </li>
                                <li>
                                    <div class="cs-compare-box">
                                        <small class="label">Link a moto</small>
                                    </div>
                                    @foreach($items as $item)
                                        <div class="cs-compare-box">
                                            <a href="{{ route('item.detail', $item) }}" class="cs-view-btn cs-bgcolor">Ver Moto</a>
                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
