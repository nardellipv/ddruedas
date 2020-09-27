<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    public function listAdmin()
    {
        $posts = Blog::all();

        return view('admin.blog.listBlog', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $blog = Blog::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'status' => 'ACTIVE',
            'slug' => Str::slug($request['title']),
        ]);

        if ($request->photo) {
            $image = $request->file('photo');
            $input= $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->save('styleWeb/assets/images/blog/' . $input, 25);

            $blog->photo = $input;
        }

        $blog->save();

        notify()->success('Post creados correctamente.', 'Post Creado');
        return back();
    }
}
