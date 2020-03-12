<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{

    public function getIndex() {
        $posts = Post::paginate(6);
        return view('blog.index', compact('posts'));
    }

    public function getSingle($slug){
        $post = Post::where('slug', $slug )->first();

        $key = 'blog_'.$post->id;
        // $view = Session::get($key);

        if(!Session::get($key))
        {
            Session::put($key, 1);
            $post->increment('view_count');
        }

        $pst = Post::orderBy('view_count', 'desc')->limit(5)->get();
        $tags = Tag::all();
        $cates = Category::all();
        return view('blog.single', compact('post', 'pst', 'tags', 'cates'));
    }

    public function getCategory($id)
    {
        $id = request('id');
        $types = Category::findOrFail($id);

        return view('blog.types', compact('types'));
    }

    public function getSearch()
    {
        $key = request('key');
        $results = Post::where('title', 'like', '%'.$key.'%')->orwhere('body', 'like', '%'.$key.'%')->get();

        return view('blog.search', compact('results'));

    }

    public function getTags($id)
    {
        $id = request('id');
        $tags = Tag::find($id) ;
        return view('blog.tags',compact('tags'));
    }
}
