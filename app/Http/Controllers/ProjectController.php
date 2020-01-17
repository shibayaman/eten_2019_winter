<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Owner;
use App\Project;
use Auth;
use Config;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only([
            'create', 'store'
        ]);

        $this->middleware('checkProject')->only([
            'create'
        ]);
    }

    //FIXME: 作品を持たないオーナーも取ってきてしまうので
    //当該ページに作品未登録のオーナーがいたらindex.blade.phpで落ちる
    public function index(Request $request)
    {
        $fields = Config::get('const.fields');
        $season = Config::get('seasonId');

        $field = $fields['IT'];
        $graduation_year = array(2020,2021,2022,2023);
        $grade = array(1,2,3,4);
        $query = Owner::with('project')->where('season_id',Config::get('const.seasonId'));

        if($request->has('field')) {
            if(in_array($request->query('field'), $fields)) {
                $field = $request->query('field');
            }
        }

        if($request->has('orderby')){
            if(in_array($request->query('orderby'), $graduation_year)){
                $class = Classes::where('graduation_year', $request->query('orderby'))->get()->modelKeys();
                $query->whereIn('class_id', $class);
            }
            if(in_array($request->query('orderby'), $grade)){
                $class = Classes::where('grade', $request->query('orderby'))->get()->modelKeys();
                $query->whereIn('class_id', $class);
            }
        }

        $orderbyField = Classes::where('field', $field)->get()->modelKeys();
        $query->whereIn('class_id', $orderbyField);
        $owners = $query->paginate(9);

        return view('index', compact('field', 'fields','owners'));
    }

    public function create(Request $request)
    {
        $owner = Auth::user()->only('project_code', 'class_id');
        $class = Auth::user()->class->field;
        return view('registration',compact('owner','class'));
    }

    public function confirm(Request $request){
        $imagePath = basename($request->file('image')->store('public/image'));
        $project = $request->except('image');
        $project['member'] = array_filter($project['member'], 'strlen');

        $submitTo = route('projects.store');

        if(Auth::user()->project()->exists()){
            $submitTo = route('projects.update');
        }

        return view('confirm',compact('project','imagePath','submitTo'));
    }

    public function store(Request $request)
    {
        $ownerId = Auth::id();

        //todo add unique validation for project
        $validator = Validator::make(array_merge($request->all(), ['id' => $ownerId]), [
            'id' => 'required|max:20',
            'title' => 'required|max:24',
            'catch_copy' => 'required|max:40',
            'detail' => 'required|max:300',
            'image' => 'required|max:150',
            'period' => 'required|max:15',
            'represent' => 'required|max:30',
            'team' => 'required|max:30',
            'member' => 'max:120',
            'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projects.create');
        }

        $project = new Project();
        $project->product_name = $request->title;
        $project->catchphrase = $request->catch_copy;
        $project->description = $request->detail;
        $project->image_path = $request->image;
        $project->production_time = $request->period;
        $project->leader_name = $request->represent;
        $project->team_name = $request->team;
        $project->team_member = $request->member;
        $project->genre = $request->genre;
        $project->owner_id = $ownerId;
        $project->save();

        return view('/completion');
    }

    public function show($id)
    {
        $fields = Config::get('const.fields');
        $project = \App\Project::with('owner.class')->find($id);
        return view('work', compact('fields', 'project'));
    }

    public function edit(Request $request)
    {
        $ownerId = Auth::id();
        $projects = \App\Project::with('owner.class')
            ->where('owner_id', $ownerId)->get();
        dd($projects);
        return view('edit', ['projects' => $projects]);
    }
    

    public function update(Request $request, $id)
    {
        $owner = Auth::user()->only('id');
        $validator = Validator::make(array_merge($request->all(), $owner), [
            'id' => 'required|max:20',
            'title' => 'required|max:24',
            'catch_copy' => 'required|max:40',
            'detail' => 'required|max:300',
            'image' => 'required|max:150',
            'period' => 'required|max:15',
            'represent' => 'required|max:30',
            'team' => 'required|max:30',
            'member' => 'max:120',
            'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return view('registration');
        }

        $proid = Auth::user()->project->id;

        $project = project::where('id', proid) -> get();
        $project->product_name = $request->title;
        $project->catchphrase = $request->catch_copy;
        $project->description = $request->detail;
        $project->image_path = $request->image;
        $project->production_time = $request->period;
        $project->leader_name = $request->represent;
        $project->team_name = $request->team;
        $project->team_member = $request->member;
        $project->genre = $request->genre;
        //$project->owner_id = $owner['id'];
        $project->save();

        return view('/completion');
    }

    public function destroy($id)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }
}
