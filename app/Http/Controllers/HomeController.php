<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorieList = new Categorie;
        $categorieCollection = $categorieList->all();
        $postList = new Post;
        $postCollection = $postList->orderBy('updated_at', 'desc')->get();
        return view('home')->with('categorieRows', $categorieCollection)->with('postRows', $postCollection);
    }
}
