<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();

        return view('administration.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategories = Category::all();
        return view ('administration.posts.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation messages
        $validationMessages = [
            'requred' => ':attribute must be specified!',
            'numeric' => ':attribute must be numeric'
        ];

        // Validation rules
        $validationRules = [
            // 'user_id' => 'required|numeric',
            'title' => 'required|max:255',
            'content' => 'required',
            'post-categories' => 'required',
            'featured-image' => 'required|max:1024' // MAX 1MB
        ];

        // Validation
        $validator = Validator::make($request->all(), $validationRules, $validationMessages);

        if ($validator->fails()) {
            // $validator->errors()->add('postCategories', 'Categories cannot be null'); // u slucaju da ocu specificnu gresku da bude sa posebnom porukom

            return redirect('administration/posts/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //

        $post = new Post($request->all());
        $post->user_id=1;
        // $featured_image_name = $request->file('file')->getClientOriginalName();
        $featured_image_path = $request->file('featured-image')->store('public/post_media_files');
        $featured_image_path = substr($featured_image_path, 7);
        $post-> featured_image_path = $featured_image_path;

        $post->save();

        // many to may for categories
        foreach($request->input('post-categories') as $postCategory)
        {
            $post->postCategories()->attach($postCategory, [ 'created_at' => date('Y-m-d h:i:s', time()), 
                                                             'updated_at' => date('Y-m-d h:i:s', time()) ]);
        }

        return redirect('/administration/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $postCategories = Category::all();
        return view('administration.posts.edit', compact('post', 'postCategories'));
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
        // Validation messages
        $validationMessages = [
            'requred' => ':attribute must be specified!',
            'numeric' => ':attribute must be numeric'
        ];

        // Validation rules
        $validationRules = [
            // 'user_id' => 'required|numeric',
            'title' => 'required|max:255',
            'content' => 'required',
            'post-categories' => 'required',
            // 'featured-image' => 'required|max:1024' // MAX 1MB
        ];

        // Validation
        $validator = Validator::make($request->all(), $validationRules, $validationMessages);

        if ($validator->fails()) {
            // $validator->errors()->add('postCategories', 'Categories cannot be null'); // u slucaju da ocu specificnu gresku da bude sa posebnom porukom

            return redirect('administration/posts/'. $id .'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        //

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        
        // updating categories, categories manipulation
        $postCategories = $post->postCategories()->get();
        foreach($postCategories as $postCategory)
        {
            $post->postCategories()->detach($postCategory->id);
        }

        foreach($request->input('post-categories') as $postCategory)
        {
            $post->postCategories()->attach($postCategory, [ 'created_at' => date('Y-m-d h:i:s', time()), 
                                                             'updated_at' => date('Y-m-d h:i:s', time()) ]);
        }

        return redirect('/administration/posts');
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
        $post->delete(); // da soft deletuje posts, a za potpuni delete koristi se forcedelete()
        return redirect('/administration/posts');
    }
}
