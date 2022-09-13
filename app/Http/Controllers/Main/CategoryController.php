<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts;
        $categories = Category::all();
        return view('main.category', compact('posts', 'category', 'categories'));
    }
}
