@extends('layouts.app')

@section('content')


<div class="container">
        {{-- @dump($author) --}}

        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            @method('POST')

              <div class="form-group">
                <label for="author_id">Authors</label>
                <select class="form-control" id="authors" name="author_id">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">
                            {{$author->name }}
                            {{ $author->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Article title">
            </div>

            <div class="form-group">
                <label for="body">Example textarea</label>
                <textarea class="form-control" id="body" name="body" rows="6"></textarea>
            </div>
            <a href="{{ route('posts.index') }}"
                class="btn btn-secondary">
                <i class="fas fa-plus"> Back to all posts </i>
            </a>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>

    </div>

@endsection
