<?php

namespace App\Http\Controllers;

use Auth;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\Owner;
use App\Classes;

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
        $field = $fields['IT'];
        $graduation_year = array(2020,2021,2022,2023);
        $grade = array(1,2,3,4);
        $query = Owner::where('season_id',Config::get('const.seasonId'));

        if($request->has('field')) {
            if(in_array($request->query('field'), $fields)) {
                $field = $request->query('field');
            }
        }

        if($request->has('orderby')){
            //学年と卒業年次のどちらで検索するか判別し、検索列を$columnに格納する
            if(in_array($request->query('orderby'),$graduation_year)){
                $column = 'graduation_year';
            }
            if(in_array($request->query('orderby'),$grade)){
                $column = 'grade';
            }
            $class = Classes::where($column,$request->query('orderby'))->get()->modelKeys();
            $query->whereIn('class_id',$class);
        }

        $orderby_field = Classes::where('field',$field)->get()->modelKeys();
        $query->whereIn('class_id',$orderby_field);
        $projects = $query->paginate(9);

        return view('index', compact('field', 'fields','projects'));
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

        //保存か更新か判別する
        $url = route('projects.store');

        if(Auth::user()->project()->exists()){
            $url = route('projects.update');
        }

        return view('confirm',compact('project','path','url'));
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
        $article = App\Project::findOrFail($request->id);
        return view('registration', ['article' => $article]);
        
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
