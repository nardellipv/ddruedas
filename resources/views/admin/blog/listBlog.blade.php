@extends('layouts.adminMain')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('styleWeb/assets/images/blog/'.$post->photo) }}">
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">{{ $post->title }}</a></h2>
                                </div>
                            </div>
                            <div class="article-details">
                                <p>{{ Str::limit($post->body,100) }} </p>
                                <div class="article-cta">
                                    <a href="{{ route('blog.post', $post->slug) }}" class="btn btn-primary">Ir Post</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
