<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        if ($category = Category::where('slug',$category)->first()) {
            // $posts = $category->posts();
            // dd($category->posts);
            return  view('category')->with('category', $category);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryform')->with(['formtitle' => 'New Category']);
    }

    private function _slugit($string)
    {
        $temp = Str::slug($string, '-');
        // search for existing slug
        if (Category::where('slug', $temp)->first()) {
            $count = 1;
            $slug = $temp."-".$count;
            while (Category::where('slug', $slug)->first()) {
                $count++;
                $slug = $temp."-".$count;
            }
            // dd($slug);
            return $slug;
        } else {
            return $temp;
        }
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
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $this->_slugit($request->name),
            'description' => $request->description
        ]);

        return redirect('/'); // to the category road
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
