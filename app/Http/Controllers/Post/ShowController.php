<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Category $category, Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $categories = Category::all();
        $relatedPosts = Post::where('category_id', $post->category->id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $randomPost = Post::inRandomOrder()->limit(1)->get();



        return view('main.show', compact('post', 'date', 'categories', 'relatedPosts', 'randomPost'));
    }
}
