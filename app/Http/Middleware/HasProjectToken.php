<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;

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

        if(!(empty($token) && empty($projectCode))) {
            $validToken = Token::where([
                ['project_code', $projectCode],
                ['token', hash('sha256', $token)]
            ])->first();
            
            if($validToken) {
                $request->merge([
                    'tokenData' => $validToken
                ]);
                return $next($request);
            }
        }
        
        return redirect('/')
            ->withErrors(['error' => '入力された組み合わせが見つかりません'])
            ->withInput($request->all());
    }
}
