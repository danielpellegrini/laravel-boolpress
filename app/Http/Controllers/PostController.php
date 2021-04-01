<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Author;
use App\Mail\PostCreated;
use App\Tag;
use Illuminate\Support\Facades\Mail;

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
        // $post = Post::find(1);
        // dd($post->tags);

        $authors = Author::all();
        $tags = Tag::all();
        return view('post.create', compact('authors', 'tags'));
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

        // dd($data);

        //Check if author_id exists

        $author_id = $data['author_id'];
        if (!Author::find($author_id)) {
            dd('error');
            //return redirect()->route('posts.error'); <- should be created this page to manage the error
        }

        $finalArrayTags = $data['tags'];
        $allTags = Tag::all();
        foreach ($allTags as $tag) {
            if(stripos($data['body'], $tag->name) !== false) {
                $finalArrayTags[] = $tag->id;
            }
        }

        $post = new Post();
        $post->fill($data);
        $post->save();

        $post->tags()->attach($finalArrayTags);

        $newMail = new PostCreated($post);
        Mail::to('john.doe@mail.com')->send($newMail);

        return redirect()->route('posts.index');
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
