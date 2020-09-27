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
                                    <div class="cs-user-section-title"><h4>Publicaciones Activas</h4>
                                        <a href="{{ route('dashboard.publicAccessory') }}"
                                           class="btn btn-danger btn-sm"><i class="icon-plus"></i> Publicar
                                            Accesorio</a>
                                        {{--<ul>
                                            <li><a href="#" class="cs-active-btn">Activos</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('dashboard.listVehiclesExipire') }}">Vencidos</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('dashboard.listVehiclesPaused')  }}">Pausados</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>--}}
                                    </div>
                                </div>
                                <ul class="cs-featurelisted-car">
                                    @forelse($listAccesories as $listAccessory)
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-media">
                                                <figure><a href="#"><img
                                                                src="{{ asset('users/'.Auth::user()->id.'/images/accessory/700x700-'.$listAccessory->picture) }}"
                                                                class="img-responsive"/>
                                                    </a></figure>
                                            </div>
                                            <div class="cs-text">
                                                <h6>
                                                    <a href="{{ route('item.detail', $listAccessory) }}">{{ $listAccessory->name }}
                                                    </a>${{ $listAccessory->price }}</h6>
                                                <p>
                                                    {{--<a href="{{ route('item.detail', $listAccessory) }}">{{ $listAccessory->type->name }} </a>--}}
                                                </p>
                                                <div class="post-options">
                                                    <span>Publicado: <em>{{ \Carbon\Carbon::parse($listAccessory->updated_at)->format('d M Y') }}</em></span>
                                                    <p>
                                                        <span><a href="#">Categoría: <em>{{ $listAccessory->category->name }}</em></a></span>
                                                    <p>
                                                        <span><a href="#">Total Visitas: <em>{{ $listAccessory->visit }}</em></a></span>
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
                                                            <a href="https://facebook.com/sharer/sharer.php?u={{ route('item.detail', $listAccessory) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               target="_blank"
                                                               title="Compartir"><i class="icon-forward4"></i></a>
                                                            <a href="{{ route('actionAccessory.show', $listAccessory) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Editar Item"><i class=" icon-clone"></i></a>
                                                            <a href="{{ route('actionAccessory.deleteAccessory', $listAccessory) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Borrar"><i class="icon-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h4 style="text-align: center">No tienes Accesorios publicadas</h4>
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
