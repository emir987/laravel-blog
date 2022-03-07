<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Was for demonstration purposes
        // $title = 'List of posts:';
        // return view('posts.index')->with('title', $title);

        $title = 'List of posts:';

        $posts = Post::all();
        return view('posts.index', compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->input('title');

        // $post = new Post();
        // $post->user_id = 1;
        // $post->title = $request->input('title');
        // $post->content = $request->input('content');
        // $post->save();

        $post = new Post($request->all());
        $post->user_id = 1;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = new stdClass(); // moze i sa $post = new /stdClass;
        // $post->title = 'Title of the post';
        // $post->content = 'Content of the post';

        $post = Post::find($id);
        $headerText = 'Show the header:';

        return view('posts.show', compact('post', 'headerText'));
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
        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect('/posts');
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
        return redirect('/posts');
    }
}
