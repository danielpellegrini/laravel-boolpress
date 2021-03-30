<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Author;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('post.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatePost($request);

        $data = $request->all();

        //Check if author_id exists

        $author_id = $data['author_id'];
        if (!Author::find($author_id)) {
            dd('error');
            //return redirect()->route('posts.error'); <- should be created this page to manage the error
        }

        $post = new Post();
        $post->fill($data);
        $post->save();
        $authorsOrdered = Author::orderBy('id', 'asc')->first();

        return redirect()->route('posts.index', $authorsOrdered);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validatePost(Request $request)
    {

        $request->validate([
            "title" => 'required|max:50',
            "body" => 'required|max:65000'
        ]);

    }

}
