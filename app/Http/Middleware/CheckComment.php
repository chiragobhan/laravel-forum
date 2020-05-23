<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CheckComment
{
    public function handle($request, Closure $next)
    {
        $comment = new Comment();
        $currentUserForComment = $comment->where('id', $request->commentId)->pluck('user_id');
        if (!($currentUserForComment)->isEmpty()) {
            if (Auth::user()->id == $currentUserForComment[0] || Auth::user()->type == 'admin') {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
