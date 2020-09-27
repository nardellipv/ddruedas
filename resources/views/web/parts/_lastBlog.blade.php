<div class="page-section" style=" padding-top:70px; padding-bottom:50px;">
    <div class="container">
        <div class="row">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <!--Element Section Start-->
                    <div class="cs-blog cs-blog-grid">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cs-section-title">
                                <h3 style="text-transform:uppercase !important;">Últimas Noticias</h3>
                                <p>Todas las noticias relacionadas con el mundo de las 2 ruedas.</p>
                            </div>
                        </div>
                        @foreach($lastPosts as $lastPost)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-blog-listing blog-grid">
                                    <div class="cs-media">
                                        <figure>
                                            <a href="#"><img src="{{ asset('styleWeb/assets/images/blog/'.$lastPost->photo) }}"
                                                                 alt="{{ $lastPost->title }}"/></a>
                                        </figure>
                                    </div>
                                    <div class="blog-text">
                                        <div class="post-title">
                                            <h4><a href="{{ route('blog.post', $lastPost->slug) }}">{{ $lastPost->title }}</a></h4>
                                        </div>
                                        {{--<p>{!! Str::limit($lastPost->body,100) !!}</p>--}}
                                        <div class="post-meta">
                                            <i class="icon-calendar"></i>
                                            <em> {{ \Carbon\Carbon::parse($lastPost->created)->format('d-m-Y') }}</em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>