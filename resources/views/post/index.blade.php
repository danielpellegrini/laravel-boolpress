@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Author</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)

            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->author->name}} {{$post->author->lastname}}</td>
            </tr>

            @endforeach
            <div class="mb-3">
                <a href="{{ route('posts.create', compact('posts')) }}"
                    class="btn btn-success">
                    <i class="fas fa-plus"> Add new post </i>
                </a>
            </div>
        </tbody>
    </table>

</div>

    @endsection

{{-- @php
    dump($authors);
@endphp

@foreach ($authors as $author)

    @dump($author->detail)

@endforeach --}}
