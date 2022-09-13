<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $s = $request->s;
        $posts = Post::where('content', 'LIKE', "%{$s}%")->orderBy('title')->get();
        return view('main.search', compact('posts'));

    }
}
