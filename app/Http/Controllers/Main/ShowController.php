<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $categories = Category::all();
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $randomPost = Post::inRandomOrder()->get();
        dd($randomPost);

        //return view('main.show', compact('post', 'date', 'categories', 'relatedPosts', 'randomPost'));
    }
}
