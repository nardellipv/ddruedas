<aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="widget woocommerce widget_product_categories">
        <h6>Categorías</h6>
        <ul>
            <li class="cat-item cat-item-3 cat-parent">
            @foreach($categories as $category)
                <li><a href="{{ route('accessory.category', $category->slug) }}">{{ $category->name }}
                        <span>({{ $category->accessory_count }})</span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget woocommerce widget_top_rated_products">
        <h6>Últimos publicados</h6>
        <ul class="product_list_widget">
            @foreach($accessoriesLast as $accessoryLast)
                <li>
                    <a href="{{ route('accessory.detail', $accessoryLast) }}">
                        <img src="{{ asset('users/'.$accessoryLast->user_id.'/images/accessory/700x700-'.$accessoryLast->picture) }}"
                             alt="shop"/>
                        <span class="product-title">{{ $accessoryLast->name }}</span>
                    </a>
                    <span class="amount cs-color">$ {{ $accessoryLast->price }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget woocommerce widget_shopping_cart">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- DeDosAccessoryList -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7543412924958320"
             data-ad-slot="7661015980"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</aside>