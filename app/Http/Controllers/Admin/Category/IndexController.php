<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function __invoke()
    {
        dd(Str::of('Фреймворк')->append(' ')->append( 'Laravel'));
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
}
