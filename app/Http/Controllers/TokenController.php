<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Config;
use App\Token;
use App\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class TokenController extends Controller
{
    public function index()
    {
        return "I'm not implemented yet";
    }

    public function create()
    {
        return view('createApiToken');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'project_code' => 'required',
            'class_id' => 'required|integer',
        ]);

        $attributes['year'] = 2019;
        $attributes['season_id'] = 2;
        
        $token = DB::transaction(function() use ($attributes) {
            $project =  Project::create($attributes);

            $token = Str::random(16);
            Token::create([
                'project_id' => $project->id,
                'token' => hash('sha256', $token),
                'expires_at' => new DateTime(Config::get('const.eventDate'))
            ]);

            return $token;
        });

        return view('apiTokenComplete')->withToken($token);
    }

    public function show($id)
    {
        $token = Token::find($id);
        return $token->project;
    }

    public function update(Request $request, $id)
    {
        return "I'm not implemented yet";
    }
    
    public function destroy($id)
    {
        return "I'm not implemented yet";
    }
}
