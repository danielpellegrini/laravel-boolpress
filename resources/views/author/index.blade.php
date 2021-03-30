@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Bio</th>
                <th scope="col">Website</th>
                <th scope="col">Picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)

            <tr>
                <th scope="row">{{$author->id}}</th>
                <td>{{$author->name}}</td>
                <td>{{$author->lastname}}</td>
                <td>{{$author->email}}</td>
                <td>{{$author->detail->bio}}</td>
                <td><a href="{{$author->detail->website}}">{{$author->detail->website}}</a></td>
                <td><img src="{{$author->detail->pic}}" alt=""></td>
            </tr>

            @endforeach
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
