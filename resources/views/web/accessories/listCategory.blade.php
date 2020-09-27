@extends('layouts.main')

@section('css')
    <link href="{{ asset('styleWeb/assets/css/woocommerce.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/chosen.css') }}" rel="stylesheet">
@endsection

@section('body', 'woocommerce woocommerce-page single-product wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="site-main">
                                            <div class="columns-3">
                                                <ul class="products">
                                                    @forelse($accessories as $accessory)
                                                        <li class="product">
                                                            <a href="{{ route('accessory.detail', $accessory) }}">
                                                                <img src="{{ asset('users/'.$accessory->user_id.'/images/accessory/700x700-'.$accessory->picture) }}"
                                                                     alt="{{ $accessory->name }}"/>
                                                                <h5>{{ $accessory->name }}</h5>
                                                                <span class="price">
                                                                <span class="amount">$ {{ $accessory->price }}</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @empty
                                                        <h4 style="text-align: center">No hay accesorios todavía</h4>
                                                    @endforelse
                                                </ul>
                                            </div>
                                            <nav>
                                                <ul class="pagination">
                                                    {{ $accessories->render() }}
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('web.accessories._asideAccessories')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection