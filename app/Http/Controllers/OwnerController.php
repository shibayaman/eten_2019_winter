<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\support\Facades\Config;
use DateTime;
use App\Owner;

class OwnerController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.createApiToken');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'project_code' => 'required',
            'class_id' => 'required'
        ]);

        $token = Str::random(16);

        Owner::create([
            'password' => $token,
            'project_code' => $attributes['project_code'],
            'class_id' => $attributes['class_id'],
            'season_id' => Config::get('const.seasonId'),
            'expires_at' => new DateTime(Config::get('const.eventDate'))
        ]);

        return view('admin.apiTokenComplete')->withToken($token);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
