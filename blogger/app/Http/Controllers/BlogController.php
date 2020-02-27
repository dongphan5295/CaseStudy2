<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function getIndex() {
        $posts = Post::paginate(6);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){
        $post = Post::where('slug', '=', $slug )->first();
        $pst = Post::latest()->limit(5)->get();
        $tags = Tag::all();
        $cates = Category::all();
        return view('blog.single')->withPost($post)->withTags($tags)->withPst($pst)->withCates($cates);
    }

    public function getCategory($id){
        $id = request('id');
        $types = Category::findOrFail($id);

        return view('blog.types', compact('types'));
    }

    public function getSearch(){
        $key = request('key');
        $results = Post::where('title', 'like', '%'.$key.'%')->get();

        return view('blog.search', compact('results'));

    }
}
