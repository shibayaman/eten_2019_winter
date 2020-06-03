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
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if ($request->has('field')) {
            $field = $request->query('field');
            $validFields = Config::get('const.fields');

            if (in_array($field, $validFields)) {
                $owners = Owner::whereIn('class_id', function ($query) use ($field) {
                    $query->from('classes')
                        ->select('classes.id')
                        ->where('classes.field', $field);
                })
                ->orderBy('project_code')
                ->get();
            }
        }
        return view('admin.showOwners')
            ->withOwners($owners ?? Owner::orderBy('project_code')->get());
    }

    public function create()
    {
        $classes = Classes::orderBy('id')->get();
        return view('admin.createOwner')->withClasses($classes);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'class_id' => ['required', 'exists:classes,id'],
            'project_code' => 'required',
            'project_code.*' => [
                'required',
                'distinct',
                'max:20',
                'regex:/^[0-9]{2}$/'
            ]
        ]);

        $class = Classes::find($input['class_id']);
        $fields = Config::get('const.fields');
        if ($class->field === $fields['IT']) {
            $prefix = 'I';
        } elseif ($class->field === $fields['WEB']) {
            $prefix = 'W';
        } else {
            $prefix = 'G';
        }

        $projectCodes = array_map(function ($projectCode) use ($prefix) {
            return $prefix . $projectCode;
        }, $input['project_code']);

        
        $duplicatedCodes = Owner::whereIn('project_code', $projectCodes)->pluck('project_code')->all();
        if (count($duplicatedCodes)) {
            return back()->withErrors(array_map(function ($code) {
                return $code . 'は既に存在します';
            }, $duplicatedCodes))->withInput();
        }

        $owners = array_map(function ($projectCode) use ($input) {
            return [
                'project_code' => $projectCode,
                'password' => Str::random(16),
                'class_id' => $input['class_id'],
                'season_id' => Config::get('const.seasonId'),
                'expires_at' => new DateTime(Config::get('const.eventDate')),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }, $projectCodes);

        Owner::insert($owners);

        return view('admin.ownerCreated')->withOwners($owners);
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
