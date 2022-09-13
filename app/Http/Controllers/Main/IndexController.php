<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use RakibDevs\Weather\Weather;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(4);
        $categories = Category::all();
        $popularPosts = Post::orderBy('views', 'DESC')->take(2)->get();
        $popularCategory = Category::inRandomOrder()->limit(5)->get();
        $randomPosts = Post::inRandomOrder()->limit(5)->get();



        $icons = [
            2 => 'fa-brands fa-fort-awesome',
            3 => 'fa-solid fa-mountain',
            4 => 'fa-solid fa-city',
        ];

        return view('main.index', compact('posts', 'categories', 'popularPosts', 'popularCategory', 'randomPosts', 'icons' ));
    }
}
