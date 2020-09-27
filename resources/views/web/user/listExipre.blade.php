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
                                    <div class="cs-user-section-title"><h4>Publicaciones Vencidas</h4>
                                        <ul>
                                            <li><a href="#" class="cs-active-btn">Vencidas</a>
                                                <ul>
                                                    <li><a href="{{ route('dashboard.listVehicles') }}">Activas</a></li>
                                                    <li>
                                                        <a href="{{ route('dashboard.listVehiclesPaused')  }}">Pausados</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('dashboard.listVehiclesRejected')  }}">Rechazados</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <ul class="cs-featurelisted-car">
                                    @forelse($listMotos as $listMoto)
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-media">
                                                <figure>
                                                    <a href="#">
                                                        @if(count($listMoto->pictures)>= 1)
                                                            <img src="{{ asset('users/'.Auth::user()->id.'/images/items/700x700-'.$listMoto->pictures[0]->name) }}"
                                                                 class="img-responsive"/>
                                                        @else
                                                            <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                                 class="img-responsive">
                                                        @endif
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="cs-text">
                                                <h6>
                                                    <a href="{{ route('item.detail', $listMoto) }}">{{ $listMoto->brand->name }}
                                                        <em>{{ $listMoto->pattern->name }}</em>
                                                    </a>{{ $listMoto->money }}{{ $listMoto->price }}</h6>
                                                <p>
                                                    <a href="{{ route('item.detail', $listMoto) }}">{{ $listMoto->type->name }} </a>
                                                </p>
                                                <div class="post-options">
                                                    <span>Publicado: <em>{{ \Carbon\Carbon::parse($listMoto->updated_at)->format('d M Y') }}</em></span>
                                                    <span>Vencimiento: <em>{{ \Carbon\Carbon::parse($listMoto->expire)->format('d M Y') }}</em></span>
                                                    <p>
                                                        <span><a href="#">Total Visitas: <em>{{ $listMoto->visit }}</em></a></span>
                                                </div>
                                                <div class="cs-post-types">
                                                    <div class="cs-post-list">
                                                        <div class="cs-edit-post">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                               title="Editar Item"><i class="icon-edit2"></i></a>
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                               title="Borrar"><i class="icon-trash-o"></i></a>
                                                        </div>
                                                        <div class="cs-list">
                                                            <a href="{{ route('actionItems.download', $listMoto) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Descargar"><i class="icon-box-add"></i></a>
                                                            <a href="{{ route('actionItems.reActive', $listMoto) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Reactivar"><i class="icon-undo"></i></a>
                                                            <a href="{{ route('actionItems.show', $listMoto) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Editar Item"><i class=" icon-edit2"></i></a>
                                                            <a href="{{ route('actionItems.delete', $listMoto) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Borrar"><i class="icon-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h4 style="text-align: center">No tienes Publicaciones expiradas</h4>
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
