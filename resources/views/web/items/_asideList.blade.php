<script>
    function checkOnlyOne(b) {

        var x = document.getElementsByClassName('typeCheck');
        var i;

        for (i = 0; i < x.length; i++) {
            if (x[i].value != b) x[i].checked = false;
        }
    }
</script>

<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="cs-listing-filters">
        <div class="cs-search">
            <form action="{{ route('item.search') }}" method="GET" class="search-form">
                <div class="cs-search">
                    <div class="select-input">
                        <select tabindex="1" class="chosen-select" name="province">
                            @if(isset($provinceName->name))
                                <option value="{{ $provinceName->id }}">{{ $provinceName->name}}</option>
                            @else
                                <option>Provincia</option>
                            @endif
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="cs-select-model">

                    <ul class="cs-checkbox-list mCustomScrollbar" data-mcs-theme="dark">
                        @foreach($types as $type)
                            <li>
                                <div class="input-radio">
                                    @if(isset($typeName))
                                        <input id="type{{ $type->id }}" type="checkbox" name="type"
                                               class="typeCheck checked"
                                               value="{{ $type->id }}" onclick="checkOnlyOne(this.value);"
                                                {{ $typeName->id == $type->id ? 'checked' : ''}}>
                                        <label for="type{{ $type->id }}">{{ $type->name }}</label>
                                    @else
                                        <input id="type{{ $type->id }}" type="checkbox" name="type"
                                               class="typeCheck checked"
                                               value="{{ $type->id }}" onclick="checkOnlyOne(this.value);">
                                        <label for="type{{ $type->id }}">{{ $type->name }}</label>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingsix">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapsesix"
                               aria-expanded="false" aria-controls="collapsesix">
                                Año
                            </a>
                        </div>
                        <div id="collapsesix" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingsix">
                            <div class="panel-body">
                                <div class="cs-engine-capacity">
                                    <form>
                                        <input id="engine" type="text" name="year" class="span2"
                                               data-slider-min="{{ $minYear }}"
                                               data-slider-max="2020" data-slider-step="1"
                                               data-slider-value="[{{ $minYear }},2020]"/>
                                        <div class="selector-value">
                                            <span>{{ $minYear }}</span>
                                            <span class="pull-right">2020</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree"
                               aria-expanded="false" aria-controls="collapseThree">
                                Precio
                            </a>
                        </div>

                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="cs-price-range">
                                    <input id="price" type="text" name="price" class="span2"
                                           data-slider-min="0"
                                           data-slider-max="{{ $maxPrice }}" data-slider-step="15000"
                                           data-slider-value="[0,{{ $maxPrice }}]"/>
                                    <div class="selector-value">
                                        <span>$0</span>
                                        <span class="pull-right">${{ $maxPrice }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cs-field">
                        <div class="cs-btn-submit">
                            <input type="submit" value="Buscar" placeholder="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{--  <div class="widget woocommerce widget_shopping_cart">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DedosItemsListado -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-7543412924958320"
                 data-ad-slot="8646794594"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>  --}}
</aside>