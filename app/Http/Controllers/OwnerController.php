<?php

namespace App\Http\Controllers;

use App\Owner;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class OwnerController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if($request->has('field')) {
            $field = $request->query('field');
            $validFields = Config::get('const.fields');

            if(in_array($field, $validFields)) {
                $owners = Owner::whereIn('class_id', function($query) use ($field) {
                    $query->from('classes')
                        ->select('classes.id')
                        ->where('classes.field', $field);
                })->get();
            }
        }
        return $owners ?? Owner::all();
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
