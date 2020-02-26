<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;


class CategoryController extends Controller
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
        $categories = Category::all();
        if(request()->ajax()){
            return DataTables::of($categories)
            ->addColumn('action', function ($categories) {
                return '
        <div class="btn-group btn-group-sm">
        <button type="button" class="btn btn-outline-primary edit-cate" data-toggle="modal" data-target="#cate3" data-id ="' . $categories->id . '"><i
        class="fa fa-edit"></i></button>' .
                    '<button type="button" class="btn btn-outline-primary delete-cate" data-toggle="modal" data-target="#confirm-modal" data-id ="' . $categories->id . '"><i
        class="fa fa-trash"></i></button>
        </div>';
            })

            ->make(true);
        }

        return view('categories.test')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = new Category;

        $category->name = request('name');
        $category->save();

        Session::flash('success', 'New Category has been created');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id = request('id');
        // $types = Category::findOrFail($id);

        // return view('blog.types', compact('types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
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
        $category = Category::find($id);

        $this->validate($request, ['name' => 'required|max:255']);

        $category->name = $request->name;
        $category->save();

        // Session::flash('success', 'Successfully saved your new category!');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // $category->posts()->detach();

        $category->delete();

        Session::flash('success', 'Category was deleted successfully');

        return redirect()->route('categories.index');
    }
}
