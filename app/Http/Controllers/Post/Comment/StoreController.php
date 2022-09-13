<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Comment $comment, Request $request)
    {
//        $data = $request->validate([
//            'text' => 'required'
//        ]);
//        $data['user_id'] = $request->user_id;
//        $data['post_id'] = $request->post_id;


        Comment::create($request->all());

        return response()->json(['success'=> 'Ви успішно залишили коментар!']);
    }
}
