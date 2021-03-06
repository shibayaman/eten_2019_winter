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
    public function __construct()
    {
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

        if (!in_array($field, $fields)) {
            $field = $fields['IT'];
        }

        $conditions['classes.field'] = $field;

        //FIX ME: graduation_year決め打ちだけど来年になると変えなきゃいけない。Configから取ってくるようにするべきだと思う。
        $graduation_year = array(20, 21, 22, 23);
        $grade = array(1, 2, 3, 4);

        if ($request->has('filter')) {
            if (in_array($request->query('filter'), $graduation_year)) {
                $conditions['classes.graduation_year'] = $request->query('filter');
            }
            if (in_array($request->query('filter'), $grade)) {
                $conditions['classes.grade'] = $request->query('filter');
            }
        }

        $projects = Project::with('owner')->join('owners', 'projects.owner_id', 'owners.id')
        ->join('classes', 'owners.class_id', 'classes.id')
        ->select('projects.*')
        ->where($conditions)
        ->orderBy('owners.project_code')
        ->paginate(9);

        return view('index', compact('field', 'fields', 'projects'));
    }

    public function create()
    {
        $owner = Auth::user()->only('project_code', 'class_id');
        $class = Auth::user()->class->field;
        return view('registration', compact('owner', 'class'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $oldProject = Auth::user()->project;

        if (isset($request->image)) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();

            $width = 800;
            $height = 450;

            $imagePath = Str::random(40) . '.' . $extension;
            Image::make($image)->fit($width, $height)->save(storage_path('app/public/image/' . $imagePath));
        } else {
            if ($oldProject) {
                $imagePath = $oldProject->image_path;
            } else {
                $imagePath = null;
            }
        }

        $project = $request->except('image');
        $project['member'] = array_filter($project['member'], 'strlen');

        $submitTo = route('projects.store');

        if ($oldProject) {
            $submitTo = route('projects.update');
        }

        return view('confirm', compact('project', 'imagePath', 'submitTo'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->project()->exists()) {
            return redirect()->route('projects.edit');
        }

        $ownerId = Auth::id();

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:24',
            'catch_copy' => 'required|max:40',
            'detail' => 'required|max:300',
            'image' => 'nullable|max:150',
            'period' => 'required|max:15',
            'represent' => 'required|max:30',
            'team' => 'required|max:30',
            'member' => 'max:120',
            'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projects.create')->withErrors($validator);
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

        return view('/completion', compact('project'));
    }

    public function show(Project $project)
    {
        $fields = Config::get('const.fields');
        return view('work', compact('fields', 'project'));
    }

    //FIXME: 確認画面から戻ってきた時画像変わってない
    public function edit()
    {
        $fields = Config::get('const.fields');
        $owner = Auth::user();
        $time = $owner->project->production_time;
        $time_num = preg_replace("<[^0-9]+>", "", $time);
        $member = $owner->project->team_member;
        $member_array = explode(",", $member);

        $member_array = array_filter($member_array, function ($value) {
            return trim($value);
        });
        $registered_genre = [$owner->project->genre];

        if ($owner->class->field === $fields["IT"]) {
            $genre_array = ["モバイルアプリ", "PCアプリケーション", "Webアプリケーション"];
        } elseif ($owner->class->field === $fields["WEB"]) {
            $genre_array = ["Webサイト", "Webアプリケーション"];
        } elseif ($owner->class->field === $fields["GRAPHIC"]) {
            $genre_array = ["グラフィック"];
        }

        $result_genres = array_merge($registered_genre, $genre_array);
        $result_genres = array_unique($result_genres);
        $result_genres = array_values($result_genres);
      
        return view('edit', compact('owner', 'time_num', 'member_array', 'fields', 'result_genres'));
    }

    //TODO: 古い画像は消したい
    public function update(Request $request)
    {
        $owner = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:24',
            'catch_copy' => 'required|max:40',
            'detail' => 'required|max:300',
            'image' => 'nullable|max:150',
            'period' => 'required|max:15',
            'represent' => 'required|max:30',
            'team' => 'required|max:30',
            'member' => 'max:120',
            'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return view('edit')->withErrors($validator);
        }

        $project = $owner->project;
        $project->product_name = $request->title;
        $project->catchphrase = $request->catch_copy;
        $project->description = $request->detail;
        $project->image_path = $request->image;
        $project->production_time = $request->period;
        $project->leader_name = $request->represent;
        $project->team_name = $request->team;
        $project->team_member = $request->member;
        $project->genre = $request->genre;
        $project->owner_id = $owner->id;
        $project->save();

        return view('/completion', compact('project'));
    }

    public function destroy(int $id)
    {
        Project::destroy($id);
        //idk return view('project')? No default route or something...
        return "Done";
    }
}
