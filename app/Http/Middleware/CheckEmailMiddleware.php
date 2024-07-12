<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmailMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $notAdminEmails = config('malomkecskemet.email.not_admin');
        $userEmail = $request->user()->email;

        if (in_array($userEmail, $notAdminEmails)) {
            return redirect()->route('basketball-game.index');
        }

        return $next($request);
    }
}

