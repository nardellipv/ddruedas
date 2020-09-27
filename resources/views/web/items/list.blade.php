@extends('layouts.main')

@section('css')
    <link href="{{ asset('styleWeb/assets/css/bootstrap-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <style>
        .boton-oculto {
            display: none;
        }

        #fixedbutton {
            position: fixed;
            bottom: 40px;
            right: 40px;
        }
    </style>
@endsection

@section('body', 'wp-automobile single-page')

@section('content')
    <div class="main-section">

        <div class="page-section">
            <div class="container">
                <div class="row">
                    @include('web.items._asideList')
                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <form action="{{ route('item.compare') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="auto-sort-filter">
                                        <div class="auto-show-resuilt">
                                            <div class="auto-your-search">
                                                <ul class="filtration-tags">
                                                    @if(isset($provinceName->name))
                                                        <li><a href="#">{{ $provinceName->name}} <i
                                                                        class="icon-star-full"
                                                                        style="color: black"></i></a>
                                                        </li>
                                                    @endif
                                                    @if(isset($typeName->name))
                                                        <li><a href="#">{{ $typeName->name }}<i class="icon-star-full"
                                                                                                style="color: black"></i></a>
                                                        </li>
                                                    @endif
                                                    @if(isset($priceFrom))
                                                        <li><a href="#">${{ $priceFrom }}</a></li>
                                                        <li><a href="#">A</a></li>
                                                        <li><a href="#">${{ $priceTo }}<i class="icon-star-full"
                                                                                          style="color: black"></i></a>
                                                        </li>
                                                        <li><a href="#">{{ $yearFrom }}</a></li>
                                                        <li><a href="#">A</a></li>
                                                        <li><a href="#">{{ $yearTo }}<i class="icon-star-full"
                                                                                        style="color: black"
                                                                                        style="color: black"></i></a>
                                                        </li>
                                                        <a href="{{ route('item.index') }}" class="clear-tags cs-color">Borrar
                                                            Filtro</a>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @if(!isset($priceFrom))
                                            <div class="auto-list">
                                                <span>Ordenar</span>
                                                <ul>
                                                    <li>
                                                        <div class="cs-select-post">
                                                            <select data-placeholder="Ordenar"
                                                                    class="chosen-select-no-single"
                                                                    tabindex="5"
                                                                    onchange="window.location.href=this.options[this.selectedIndex].value;">
                                                                <option>Filtro</option>
                                                                <option value="{{ route('item.index') }}">Listado
                                                                    Completo
                                                                </option>
                                                                <option value="{{ route('item.filter', ['filtro'=>'menor-precio']) }}">
                                                                    Menor Precio
                                                                </option>
                                                                <option value="{{ route('item.filter', ['filtro'=>'mayor-precio']) }}">
                                                                    Mayor Precio
                                                                </option>
                                                                <option value="{{ route('item.filter', ['filtro'=>'ultimo-publicado']) }}">
                                                                    Últimas
                                                                    Publicadas
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @forelse($listItems as $listItem)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-listing">
                                            <div class="cs-media">
                                                <figure>
                                                    @if(count($listItem->pictures)>= 1)
                                                        <img src="{{ asset('users/'.$listItem->user_id.'/images/items/700x700-'.$listItem->pictures[0]->name) }}"
                                                             alt="{{ $listItem->brand->name }}"/>
                                                    @else
                                                        <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                             class="img-responsive">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="auto-text">
                                                <div class="post-title">
                                                    <h4>
                                                        <a href="{{ route('item.detail', $listItem->id) }}">{{ $listItem->brand->name }}
                                                            <small>{{ $listItem->pattern->name }}</small>
                                                        </a></h4>
                                                    <div class="auto-price"><span
                                                                class="cs-color">{{ $listItem->money }} {{ $listItem->price }}</span>
                                                    </div>
                                                    @if($listItem->user->dealer)
                                                        <a href="{{ route('dealer.detail', [$listItem->user->dealer->nameAgency, $listItem->user->dealer->id]) }}"><img
                                                                    src="{{ $listItem->user->dealer->logo }}"
                                                                    alt="{{ $listItem->user->dealer->nameAgency }}"
                                                                    class="img-responsive" style="width: 20%"/></a>
                                                    @endif
                                                </div>
                                                <ul class="auto-info-detail">
                                                    <li>Año<span>{{ $listItem->year }}</span></li>
                                                    <li>Km<span>{{ $listItem->mileage }}</span></li>
                                                    <li>Condición<span>{{ $listItem->condition }}</span></li>
                                                </ul>
                                                <p><span>{{ $listItem->user->province->name }}
                                                        , {{ $listItem->user->region->name }}</span></p>
                                                <p><span>{{ $listItem->type->name }}</span></p>


                                                <div class="cs-checkbox">
                                                    <input type="checkbox" name="compare[]" value="{{$listItem->id}}"
                                                           id="{{$listItem->id}}" class="compare">
                                                    <label for="{{$listItem->id}}">Compare</label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @empty
                                    <h4 style="text-align: center">Lo sentimos, no se encontraron resultados</h4>
                                @endforelse
                            </div>

                            <div class="cs-field boton-oculto" id="fixedbutton">
                                <div class="cs-btn-submit">
                                    <input type="submit" value="Comparar Seleccionados"
                                           style="background-color: darkslateblue">
                                </div>
                            </div>
                        </form>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <nav>
                                <ul class="pagination">
                                    {{ $listItems->render() }}
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('styleWeb/assets/scripts/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('styleWeb/assets/scripts/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script>
        $('input[class=compare]').change(function () {
            if ($('input[class="compare"]').is(':checked')) {
                $(".boton-oculto").show()
            } else {
                $(".boton-oculto").hide()
            }
            if ($('input[class="compare"]:checked').length > 3) {
                alert('Solo puedes comparar 3 motos como máximo')
                $(".boton-oculto").hide()
            }
        });
    </script>
@endsection
