<?php

namespace App\Http\Middleware;

use Auth;
use App\Project;
use Closure;

class CheckProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $owner = Auth::id();
        
        if(Project::where('owner_id', $owner)->exists()){
            return redirect(route('projects.edit'));
        }

        return $next($request);
    }
}
