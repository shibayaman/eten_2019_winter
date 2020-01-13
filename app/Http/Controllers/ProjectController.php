<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only([
            'create', 'store'
        ]);
    }

    public function index()
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function create(Request $request)
    {
        $owner = Auth::user()->only('project_code', 'class_id');
        return view('registration')->withOwner($owner);
        // return view('registration');
    }

    public function confirm(Request $request){
        $path = basename($request->file('image')->store('public/image'));
        $project = $request->except('image');
        return view('confirm',compact('project','path'));
    }

    public function store(Request $request)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function show($id)
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function edit(Request $request)
    {
        $owner = Auth::id();
        $projects = Project::where('owner_id',$owner)->get();
        return view('edit',['projects' => $projects]);
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
