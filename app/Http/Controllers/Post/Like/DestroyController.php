<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->like()->delete();
    }
}
