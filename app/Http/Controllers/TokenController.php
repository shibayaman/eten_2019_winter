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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "I'm not implemented yet";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createApiToken');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $token = Token::create([
                'project_id' => $project->id,
                'token' => Str::random(16),
                'expires_at' => new DateTime(Config::get('const.eventDate'))
            ]);

            return $token->token;
        });

        return view('apiTokenComplete')->withToken($token);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $token = Token::find($id);
        return $token->project;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "I'm not implemented yet";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "I'm not implemented yet";
    }
}
