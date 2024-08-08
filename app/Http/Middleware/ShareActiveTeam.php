<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $user = Auth::user();
            $active_team_id = session('active_team_id', $user->current_team_id);
            
            if (!session()->has('active_team_name')) {
                $active_team = Team::find($active_team_id);
                $active_team_name = $active_team ? $active_team->name : null;
                session(['active_team_name' => $active_team_name]);
            } else {
                $active_team_name = session('active_team_name');
            }

            View::share('active_team_id', $active_team_id);
            View::share('active_team_name', $active_team_name);
        }

        return $next($request);
    }
}
