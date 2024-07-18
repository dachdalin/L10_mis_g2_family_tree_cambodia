<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareActiveTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Share the active team data with all views
        $active_team_id = session('active_team_id');
        $active_team_name = session('active_team_name');

        View::share('active_team_id', $active_team_id);
        View::share('active_team_name', $active_team_name);

        return $next($request);
    }
}
