<?php

namespace App\Http\Controllers;
use App\Author;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }
}
