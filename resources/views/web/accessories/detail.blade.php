@extends('layouts.main')

@section('body', 'woocommerce woocommerce-page single single-product')

@section('title','🔧 ' . $accessory->name .' '. $accessory->brand->name .''. $accessory->pattern->name)
@section('meta-description', $accessory->name .'' . $accessory->brand->name .''. $accessory->pattern->name )

@section('og:url', 'https://dedosruedas.com.ar/listado/detalle' . $accessory->id)
@section('og:title', $accessory->name .' ' . $accessory->brand->name .' '. $accessory->pattern->name)

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    @include('alerts.error')
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="site-main">
                                    <div class=" product type-product has-post-thumbnail product-type-simple">
                                        <div class="images">
                                            <img src="{{ asset('users/'.$accessory->user_id.'/images/accessory/700x700-'.$accessory->picture) }}"
                                                        class="img-responsive" alt="{{ $accessory->name }}" style="margin-left: 15%;width: 60%;"/>
                                        </div>
                                        <div class="summary entry-summary">
                                            <h3>{{ $accessory->name }}</h3>
                                            <span class="price">
                                               <ins><span class="amount cs-color">$ {{ $accessory->price }}</span></ins>
                                           </span>
                                            <div class="description">
                                                <p>{{ Str::limit($accessory->description, 100) }} </p>
                                            </div>
                                            <div class="product_meta">
                                               <span class="posted_in">
                                                   Categoría:
                                                   <a rel="tag" href="#">{{ $accessory->category->name }}</a>
                                               </span>
                                                                <span class="posted_in">
                                                   Moto:
                                                   <a rel="tag" href="#">{{ $accessory->brand->name }}</a>
                                               </span>
                                                                <span class="posted_in">
                                                   Modelo:
                                                   <a rel="tag" href="#">{{ $accessory->pattern->name }}</a>
                                               </span>
                                                                <span class="posted_in">
                                                   Ubicación:
                                                   <a rel="tag" href="#">{{ $accessory->user->province->name }},
                                                       {{ $accessory->user->region->name }}</a>
                                               </span>
                                            </div>
                                        </div>
                                        <div class="woocommerce-tabs wc-tabs-wrapper">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs wc-tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripción</a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="#messages" aria-controls="messages" role="tab"
                                                       data-toggle="tab">Contactar Vendedor</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="home">
                                                    <h5>Descripción del producto</h5>
                                                    <p>{{ $accessory->description }}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                                    <div id="reviews">
                                                        <div id="review_form_wrapper">
                                                            <div id="review_form">
                                                                <div class="comment-respond" id="respond">
                                                                    <h5 class="comment-reply-title" id="reply-title">
                                                                        Contactar Vendedor
                                                                    </h5>
                                                                    <form action="{{ route('email.contactAccessorySeller') }}">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                <p class="comment-form-author">
                                                                                    <input type="text" name="name"
                                                                                           value="{{ old('name') }}"
                                                                                           placeholder="Nombre"/>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                <p class="comment-form-email">
                                                                                    <input type="email" name="email"
                                                                                           value="{{ old('email') }}"
                                                                                           placeholder="Email">
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="comment-form-comment">
                                                           <textarea name="messageSeller"
                                                                     placeholder="Mensaje">{{ old('messageSeller') }}</textarea>
                                                                            <input name="item"
                                                                                   value="{{ $accessory->id }}" hidden
                                                                                   readonly>
                                                                            {!! htmlFormSnippet() !!}
                                                                        </p>
                                                                        <p class="form-submit">
                                                                            <input type="submit" value="Enviar"
                                                                                   class="submit cs-bgcolor">
                                                                            <input type="hidden"/>
                                                                            <input type="hidden"/>
                                                                        </p>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="columns-3">
                                            <div class="shop-sec-title">
                                                <h3>Producto Relacionados</h3>
                                            </div>
                                            <ul class="products">
                                                @forelse($relatedProducts as $relatedProduct)
                                                    <li class="product">
                                                        <a href="{{ route('accessory.detail', $relatedProduct) }}">
                                                            <img alt="{{ $relatedProduct->name }}"
                                                                 src="{{ asset('users/'.$relatedProduct->user_id.'/images/accessory/700x700-'.$relatedProduct->picture) }}">
                                                            <h5>Air Filter</h5>
                                                            <span class="price">
                                                               <span class="amount">$ {{ $relatedProduct->price }}</span>
                                                           </span>
                                                        </a>
                                                    </li>
                                                @empty
                                                    <h4 style="text-align: center"> No se encontraron productos
                                                        relacionados </h4>
                                                @endforelse
                                            </ul>
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
