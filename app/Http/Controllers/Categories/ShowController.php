<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('main.categories.show', compact('category'));
    }
}
