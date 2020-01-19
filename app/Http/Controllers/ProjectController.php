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
        $this->middleware('auth')->except([
            'index', 'show' 
        ]);

        $this->middleware('checkProject')->only([
            'create'
        ]);
    }

    //FIXME: 作品を持たないオーナーも取ってきてしまうので
    //当該ページに作品未登録のオーナーがいたらindex.blade.phpで落ちる
    public function index(Request $request)
    {
        $season = Config::get('seasonId');

        $fields = Config::get('const.fields');
        $field = $request->query('field') ?? $fields['IT'];

        $graduation_year = array(2020,2021,2022,2023);
        $grade = array(1,2,3,4);

        $query = Owner::with('project')->where('season_id', Config::get('const.seasonId'));

        if($request->has('filter')){
            if(in_array($request->query('filter'), $graduation_year)){
                $filteredClasses = Classes::where('graduation_year', $request->query('filter'))->get()->modelKeys();
                $query->whereIn('class_id', $filteredClasses);
            }
            if(in_array($request->query('filter'), $grade)){
                $filteredClasses = Classes::where('grade', $request->query('filter'))->get()->modelKeys();
                $query->whereIn('class_id', $filteredClasses);
            }
        }

        $classesInField = Classes::where('field', $field)->get()->modelKeys();
        $query->whereIn('class_id', $classesInField);
        $query->orderBy('project_code');
        $owners = $query->paginate(9);

        return view('index', compact('field', 'fields','owners'));
    }

    public function create()
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
        $project = Project::find($id);
        return view('work', compact('fields', 'project'));
    }

    public function edit()
    {
        return view('edit')->withOwner(Auth::user());
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
