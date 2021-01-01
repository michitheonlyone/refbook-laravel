<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryslug, $postslug)
    {
        // get the data
        if ($post = Post::where('slug', $postslug)->first()) {
            // render the View
            return view('post')->with('post', $post);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category = 'uncategorized')
    {
        return view('postform')->with(['formtitle' => 'New Post']);
    }


    private function _slugit($string)
    {
        $temp = Str::slug($string, '-');
        // search for existing slug
        if (Post::where('slug', $temp)->first()) {
            $count = 1;
            $slug = $temp."-".$count;
            while (Post::where('slug', $slug)->first()) {
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
    public function store($category, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $this->_slugit($request->title);

        Post::create([
            'category_id' => 1,
            'title' => $request->title,
            'slug' => $this->_slugit($request->title),
            'subtitle' => $request->subtitle,
            'content' => $request->content,
        ]);

        return redirect('home'); // to the category road
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // allredy done by $this->index() method
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
