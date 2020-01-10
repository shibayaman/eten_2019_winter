<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\support\Facades\Config;
use DateTime;
use App\Token;

class TokenController extends Controller
{
    public function __constructor() {
        $this->middleware('auth');
    }

    public function index()
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function create()
    {
        return view('createApiToken');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'project_code' => 'required',
            'class_id' => 'required'
        ]);

        $token = Str::random(16);

        Token::create([
            'token' => hash('sha256', $token),
            'project_code' => $attributes['project_code'],
            'class_id' => $attributes['class_id'],
            'season_id' => Config::get('const.seasonId'),
            'expires_at' => new DateTime(Config::get('const.eventDate'))
        ]);

        return view('apiTokenComplete')->withToken($token);
    }

    public function show($id)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function edit($id)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function update(Request $request, $id)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function destroy($id)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }
}
