<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        $comments = Comment::all();

        if (request()->ajax()) {
            return DataTablesDataTables::of($posts)
                ->editColumn('body', function ($posts) {
                    $a = substr(strip_tags($posts->body), 0, 50);
                    return $a;
                })->addColumn('action', function ($posts) {
                    return '<a href="posts/' . $posts->id . '" class="btn"><i class="fa fa-eye"></i></a>' .
                        '<button type="button" class="btn btn-outline-primary delete-post" data-toggle="modal" data-target="#confirm-modal" data-id ="' . $posts->id . '"><i
                class="fa fa-trash"></i></button>'
                        . '<a href="posts/' . $posts->id . '/edit" class="btn"><i class="fa fa-edit"></i></a>';
                })

                ->make(true);
        }
        return view('posts.dashboard')->withPosts($posts)->withCategories($categories)->withTags($tags)->withComments($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateAttribute();
        $post = new Post;

        $post->title = request('title');
        $post->slug = str_replace(' ', '-', request('slug'));
        $post->category_id = request('category_id');
        $post->body = request('body');

        $image = $request->file('image');
        $images = base64_encode(file_get_contents($image));
        $image2 = 'data:image/png;base64,' . $images;
        $post->image = $image2;

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully !');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $category = Category::findOrFail($post->category_id);

        $tags = Tag::all();
        $tags2 = [];
        // foreach ($tags as $tag) {
        //     $tags2[$tag->id] = $tag->name;
        // }


        return view('posts.edit', compact('post', 'category' , 'categories' , 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $val = request()->validate([
            'title'         => 'required|max:255|unique:posts,id,'. $id,
            'slug'          => 'required|min:5|max:255',
            'category_id'   => 'required',
            'body'          => 'required',
            'image'  => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $post = Post::findORFail($id);
        $post->update($val);
        $post->title = request('title');
        $post->body = request('body');
        $post->slug = str_replace(' ', '-', request('slug'));
        $post->category_id = request('category_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image = base64_encode(file_get_contents($image));
            $image = 'data:image/png;base64,' . $image;
            $post->image = $image;
        }

        $post->image = $post->image;

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'This post was successfully edited ');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('warning', 'This post was successfully deleted');

        return redirect()->route('posts.index');
    }

    public function SoftDelete()
    {
        $posts = Post::onlyTrashed()->get();

        return view('posts.softdelete', compact('posts'));
    }

    public function RestoreDelete($id)
    {
        Post::onlyTrashed()->where('id', '=', $id)->restore();
        return redirect()->route('posts.index');
    }

    public function HardDelete($id)
    {
        Post::onlyTrashed()->where('id', '=', $id)->forceDelete();
        return redirect()->route('posts.softdelete');
    }

    public function validateAttribute()
    {
        return request()->validate([
            'title'         => 'required|max:255|unique:posts',
            'slug'          => 'required|min:5|max:255',
            'category_id'   => 'required',
            'body'          => 'required',
            'image'  => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);
    }
}
