@extends('layouts.main')

@section('body', 'wp-automobile single-post')

@section('title', 'Todas las novedades en el mundo de las dos ruedas')

@section('content')
    <div class="main-section">
        <div class="page-section" style="padding-top:50px;">
            <div class="container">
                <div class="row">
                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="content-area">
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="blog-listing medium-view">
                                            <div class="cs-media">
                                                <figure>
                                                    <a href="{{ route('blog.post', $post->slug) }}"><img
                                                                src="{{ asset('styleWeb/assets/images/blog/'.$post->photo) }}"
                                                                alt="{{ $post->title }}"/></a>
                                                </figure>
                                            </div>
                                            <div class="cs-text">
                                                <div class="post-title">
                                                    <h4><a href="{{ route('blog.post', $post->slug) }}">{{ $post->title }}</a>
                                                    </h4>
                                                </div>
                                                <p style="margin-top: 7%">{!! Str::limit($post->body, 200) !!}</p>
                                                <div class="post-detail" style="margin-top: 5%">
                                                    <span class="post-date">Publicado: {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                                                    <span><em>{{ $post->view }}</em> Visitas</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                        {{ $posts->render() }}
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @include('web.blog._asideBlog')
                </div>
            </div>
        </div>
    </div>
@endsection
