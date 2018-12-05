<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::all();
        $categories = Category::all();
        $posts = Post::latest()->take(6)->get();
        return view('FrontEnd/home',compact('categories','posts','tags'));
    }
}
