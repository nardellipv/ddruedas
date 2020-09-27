<div class="page-section" style="background: rgba(237, 240, 245, 1); padding-top:70px; padding-bottom:70px;">
    <div class="container">
        <div class="row">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="cs-auto-listing cs-auto-box">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cs-element-title">
                                <h2>Últimas publicaciones</h2>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="cs-auto-box-slider row">
                                @foreach($lastItems as $key=>$lastItem)
                                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <a href="{{ route('item.detail', $lastItem) }}">
                                        <div class="cs-media">
                                            @if(count($lastItem->pictures)>= 1)
                                            <figure>
                                                <img src="{{ asset('users/'.$lastItem->user_id.'/images/items/700x700-'.$lastItem->pictures[0]->name) }}"
                                                     alt="{{ $lastItem->brand->name }}"/>
                                            </figure>
                                            @else
                                                <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                     class="img-responsive">
                                            @endif
                                            <div class="caption-text">
                                                <h2> {{ $lastItem->brand->name }}
                                                    {{ $lastItem->pattern->name }}
                                                    {{ $lastItem->displacement }}
                                                </h2>
                                            </div>
                                        </div>
                                        </a>
                                        <div class="auto-text cs-bgcolor">
                                            <span>{{ $lastItem->money }} {{ $lastItem->price }}</span>
                                            <small>Año {{ \Carbon\Carbon::parse($lastItem->year)->format('Y') }}</small>
                                            <a href="{{ route('item.detail', $lastItem) }}"
                                               class="cs-button pull-right"><i class="icon-arrow_forward"></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>