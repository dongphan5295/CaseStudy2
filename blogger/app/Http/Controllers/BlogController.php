<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
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

        $key = 'blog_' . $post->id;

        if(Session::has($key))
        {
            $post->increment('view_count',1);
            Session::put($key, 1);
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
