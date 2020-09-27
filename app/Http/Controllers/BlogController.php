<?php

namespace App\Http\Controllers;

use App\Blog;


class BlogController extends Controller
{

    public function index()
    {
        $posts = Blog::orderBy('created_at', 'DESC')
            ->paginate(6);

        return view('web.blog.index', compact('posts'));
    }

    public function post($slug)
    {
        $post = Blog::where('slug', $slug)
            ->first();

        Blog::where('id', $post->id)
            ->increment('view', 1);

        $relatedPosts = Blog::where('id', '!=', $post->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('web.blog.post', compact('post', 'relatedPosts'));
    }

    public function like($id)
    {
        Blog::find($id)->increment('like', 1);

        notify()->success('Gracias por tu voto.', 'Voto Correcto');
        return back();
    }
}
