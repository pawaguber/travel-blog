<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {

        $data = [
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
        ];

        $getLike = Like::where('user_id', $data['user_id'])->where('post_id', $data['post_id'])->first();
        if($getLike){
            $getLike->delete();
            return response()->json(['success'=> 'Ви забрали лайк']);
        }else{
            Like::firstOrCreate($data);
            return response()->json(['success'=> 'Ви поставили лайк']);
        }
    }
}
