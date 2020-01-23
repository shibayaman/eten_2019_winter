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
use Intervention\Image\ImageManagerStatic as Image;
use Str;

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

    public function index(Request $request)
    {
        $season = Config::get('seasonId');

        $fields = Config::get('const.fields');
        $field = $request->query('field');

        if(!in_array($field, $fields)) {
            $field = $fields['IT'];
        }

        $conditions['classes.field'] = $field;

        //FIX ME: graduation_year決め打ちだけど来年になると変えなきゃいけない。Configから取ってくるようにするべきだと思う。
        $graduation_year = array(20, 21, 22, 23);
        $grade = array(1, 2, 3, 4);

        if($request->has('filter')){
            if(in_array($request->query('filter'), $graduation_year)){
                $conditions['classes.graduation_year'] = $request->query('filter');
            }
            if(in_array($request->query('filter'), $grade)){
                $conditions['classes.grade'] = $request->query('filter');
            }
        }

        $projects = Project::with('owner')->join('owners', 'projects.owner_id', 'owners.id')
        ->join('classes', 'owners.class_id', 'classes.id')
        ->select('projects.*')
        ->where($conditions)
        ->orderBy('owners.project_code')
        ->paginate(9);

        return view('index', compact('field', 'fields','projects'));
    }

    public function create()
    {
        $owner = Auth::user()->only('project_code', 'class_id');
        $class = Auth::user()->class->field;
        return view('registration',compact('owner','class'));
    }

    public function confirm(Request $request){
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();

        $width = 800;
        $height = 450;
       
        $imagePath = Str::random(40) . '.' . $extension;
        Image::make($image)->fit($width, $height)->save(storage_path('app/public/image/' . $imagePath));

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
        if(Auth::user()->project()->exists()){
            return redirect()->route('projects.edit');
        }

        $ownerId = Auth::id();

        $validator = Validator::make($request->all(), [
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

    public function show(Project $project)
    {
        $fields = Config::get('const.fields');
        return view('work', compact('fields', 'project'));
    }

    //editはまだ未実装
    public function edit()
    {
        dd('まだ実装してません。ごめんなちゃい');
        return view('edit')->withOwner(Auth::user());
    }

    //updateもまだ未実装
    public function update(Request $request, $id)
    {
        dd('まだ何も送らないでね');
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
