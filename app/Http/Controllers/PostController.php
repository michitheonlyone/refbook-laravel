<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            return view('post')
                ->with(['categoryslug' => $categoryslug])
                ->with(['postslug' => $postslug])
                ->with('post', $post);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cat = 'uncategorized')
    {
        $categories = Category::all();
        $preselect = $categories->where('slug',$cat)->first();
        return view('postform')
            ->with([
                'formtitle' => 'New Post',
                'categories' => $categories,
                'preselect' => $preselect
            ]);
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

        Post::create([
            'category_id' => $request->select_category, // $request->category_id
            'title' => $request->title,
            'slug' => $this->_slugit($request->title),
            'subtitle' => $request->subtitle,
            'content' => $request->get('content'),
        ]);

        return redirect("/".$category); // to the category road
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryslug, $postslug)
    {
        if ($post = Post::where('slug', $postslug)->first()) {
            return view('postform')
                ->with(['postslug' => $postslug])
                ->with(['title' => $post['title']])
                ->with(['subtitle' => $post['subtitle']])
                ->with(['content' => $post['content']])
                ->with(['formtitle' => "Edit: " . $post['title']])
                ->with(['categories' => $post['category'], 'preselect' => $post['category']]);
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryslug, $postslug)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($post = Post::where('slug', $postslug)->first()) {
            $updatePost = Post::find($post['id']);
            $updatePost->category_id = $request->select_category;
            $updatePost->title = $request->get('title');
            $updatePost->subtitle = $request->get('subtitle');
            $updatePost->content = $request->get('content');
            $updatePost->save();
            return redirect("/".$categoryslug);
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryslug, $postslug)
    {
        if ($post = Post::where('slug', $postslug)->first()) {
            Post::destroy($post['id']);
            return redirect("/".$categoryslug);
        } else {
            return abort(404);
        }
    }
}
