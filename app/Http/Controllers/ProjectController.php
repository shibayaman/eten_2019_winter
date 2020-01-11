<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        // $this->middleware('projectToken')->only([
        //     'create', 'store'
        // ]);
    }

    public function index()
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function create(Request $request)
    {
        // return $request->tokenData;
        return view('registration');
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

    public function edit($id)
    {
        return "I'm hoping someone would implement me some time in the future...";
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
