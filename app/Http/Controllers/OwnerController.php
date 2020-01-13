<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Owner;
use Config;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;

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
        $classes = Classes::all()->modelKeys();
        return view('admin.createOwner')->withClasses($classes);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'project_code' => 'required',
            'project_code.*' => [
                'required',
                'distinct',
                'max:20',
                Rule::unique('owners', 'project_code')->where(function ($query) {
                    return $query->where('season_id', Config::get('const.seasonId'));
                })
            ]
        ]);

        $projects = array_map(function($projectCode) use($input) {
            return [
                'project_code' => $projectCode,
                'password' => Str::random(16),
                'class_id' => $input['class_id'],
                'season_id' => Config::get('const.seasonId'),
                'expires_at' => new DateTime(Config::get('const.eventDate')),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }, $input['project_code']);

        Owner::insert($projects);

        return view('admin.ownerCreated')->withProjects($projects);
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
