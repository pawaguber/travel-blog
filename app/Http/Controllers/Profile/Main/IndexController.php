<?php

namespace App\Http\Controllers\Profile\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        $profile = Auth::user();
        $likesPosts = Auth::user()->likes;
        return view('profile.main.index', compact('profile', 'likesPosts'));
    }
}
