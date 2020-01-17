<?php

namespace App\Http\Controllers;

use App\Classes;
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
    }

    public function index(Request $request)
    {
        $fields = Config::get('const.fields');
        $season = Config::get('seasonId');

        $field = $fields['IT'];

        if($request->has('field')) {
            if(in_array($request->query('field'), $fields)) {
                $field = $request->query('field');
            }
        }

        //whereHasあえて避けてます。
        $projects = Project::with('owner')->join('owners', 'projects.owner_id', 'owners.id')
            ->join('classes', 'owners.class_id', 'classes.id')
            ->select('projects.*')
            ->where('classes.field', $field)
            ->orderBy('owners.project_code', 'asc')
            ->paginate(3);

        return view('index', compact('field', 'fields', 'projects'));
    }

    public function create(Request $request)
    {
        $owner = Auth::user()->only('project_code', 'class_id');
        $class = Auth::user()->class->field;
        return view('registration',compact('owner','class'));
        return view('registration')->withOwner($owner);
        // return view('registration');
    }

    public function confirm(Request $request){
        $path = basename($request->file('image')->store('public/image'));
        $project = $request->except('image');
        $project['member'] = array_filter($project['member'],'strlen');
        return view('confirm',compact('project','path'));
    }

    public function store(Request $request)
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
        $project->owner_id = $owner['id'];
        $project->save();

        return view('/completion');
    }

    public function show(Request $request)
    {
        $fields = Config::get('const.fields');
        return view('work')->withFields($fields);
    }

    public function edit(Request $request)
    {
        $article = $request->project ?? App\Project::findOfFail($request->id);
        // $article = App\Project::findOrFail($request->id);
        return view('registration', ['article' => $article]);
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
