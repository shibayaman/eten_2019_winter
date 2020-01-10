<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('projectToken')->only([
            'create', 'store'
        ]);
    }

    public function index()
    {
        return "I'm hoping someone would implement me some time in the future...";
    }

    public function create(Request $request)
    {
        return $request->tokenData;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:24',
            'catch_copy' => 'required|max:40',
            'detail' => 'required|max:300',
            'image' => 'required|dimensions:min_width=768,min_height=432',
            'period' => 'required|max:15',
            'represent' => 'required|max:30',
            'team' => 'required|max:30',
            'member.*' => 'max:120',
            'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/create');
        }

        return redirect('/completion');
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
