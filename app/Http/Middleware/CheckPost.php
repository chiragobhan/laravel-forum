<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Post;

class CheckPost
{
    public function handle($request, Closure $next)
    {
        $post = new Post();
        $currentUserForPost = $post->where('id', $request->postId)->pluck('user_id');
        if (!($currentUserForPost)->isEmpty()) {
            if (Auth::user()->id == $currentUserForPost[0] || Auth::user()->type == 'admin') {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
