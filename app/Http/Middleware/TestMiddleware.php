<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $post_id = $request->route('post')->id;
        $user_ip = $request->getClientIp();

        $visitor = Visitor::where('user_ip', $user_ip)->where('post_id', $post_id)->get();

        if(!count($visitor)) {
//            DB::table('visitors')->insert([
//                'user_ip' => $user_ip,
//                'post_id' => $post_id,
//            ]);
            $post = Post::where('id', '=', $post_id)->increment('views');
            Visitor::updateOrCreate([
                'user_ip' => $user_ip,
                'post_id' => $post_id,
            ]);

        }

        return $next($request);
    }
}
