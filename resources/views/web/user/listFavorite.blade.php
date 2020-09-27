@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section"
             style="background:url({{ asset('styleWeb/assets/images/user-bg-img.jpg') }}) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-user-account-holder">
                            <div class="row">
                                @include('web.user._menu')
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title"><h4>Publicaciones Favoritas</h4></div>
                                </div>
                                <ul class="cs-featurelisted-car">
                                    @forelse($favorites as $favorite)
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-media">
                                                <figure>
                                                    @if(count($favorite->item->pictures)>= 1)
                                                        <img src="{{ asset('users/'.$favorite->item->user_id.'/images/items/700x700-'.$favorite->item->pictures[0]->name) }}"
                                                             alt="{{ $favorite->item->brand->name }}" class="img-responsive"/>
                                                    @else
                                                        <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                             class="img-responsive">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="cs-text">
                                                <h6>
                                                    <a href="{{ route('item.detail', $favorite) }}">{{ $favorite->item->brand->name }}
                                                        <em>{{ $favorite->item->pattern->name }}</em>
                                                    </a>{{ $favorite->money }}{{ $favorite->price }}</h6>
                                                <p>
                                                    <a href="{{ route('item.detail', $favorite) }}">{{ $favorite->item->type->name }} </a>
                                                </p>
                                                <div class="post-options">
                                                    <span>Publicado: <em>{{ \Carbon\Carbon::parse($favorite->updated_at)->format('d M Y') }}</em></span>
                                                    <span>Vencimiento: <em>{{ \Carbon\Carbon::parse($favorite->expire)->format('d M Y') }}</em></span>
                                                    <p>
                                                        <span><a href="#">Total Visitas: <em>{{ $favorite->visit }}</em></a></span>
                                                </div>
                                            </div>
                                            <a href="{{ route('favorite.deleteFavorite', $favorite) }}"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Eliminar Favorito"><i class="icon-trash-o"></i></a>
                                        </li>
                                    @empty
                                        <h4 style="text-align: center">No tienes favoritos</h4>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
