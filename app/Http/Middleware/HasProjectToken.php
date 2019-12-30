<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;
use App\Project;
use Illuminate\Support\Facades\Config;

class HasProjectToken
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
        $token = $request->input('token');
        $projectCode = $request->input('project_code');
        $errors = [];

        if(!(empty($token) || empty($projectCode))) {
            $project = Project::where([
                'project_code' => $projectCode,
                'year' => Config::get('const.year'),
                'season_id' => Config::get('const.seasonId'),
            ])->first();

            if($project) {
                $validToken = $project->token->token;
                if($validToken === hash('sha256', $token)) {
                    return $next($request);
                }
            }
        }
        
        return back()->withErrors(['error' => '入力された組み合わせが見つかりません'])->withInput($request->all());
    }
}
