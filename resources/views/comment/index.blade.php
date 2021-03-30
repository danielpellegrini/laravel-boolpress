@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post Title</th>
                <th scope="col">Comment</th>
                <th scope="col">Posted on</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)

            <tr>
                <th scope="row">{{$comment->id}}</th>
                <td><a href="{{$comment->post->id}}">{{$comment->post->title}}</a></td>
                <td>{{$comment->comment}}</td>
                <td>{{$comment->posted_on}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>


@endsection


