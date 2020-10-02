<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="widget widget-recent-posts">
        <h6>Noticias más visitadas</h6>
        <ul>
            @foreach($postsAside as $postAside)
                <li>
                    <div class="cs-text">
                        <a href="{{ route('blog.post', $postAside->slug) }}">{{ Str::limit($postAside->title, 50) }}</a>
                        <span><i class="icon-clock5"></i>{{ \Carbon\Carbon::parse($postAside->created_at)->ago() }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    {{--  <div class="widget widget-tags">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- DeDosListBlog -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7543412924958320"
             data-ad-slot="2081386249"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>  --}}
</aside>