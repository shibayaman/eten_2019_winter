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
        return "I hoping someone would implement me some time in the future...";
    }

    public function show($id)
    {
        return "I hoping someone would implement me some time in the future...";
    }

    public function edit($id)
    {
        return "I hoping someone would implement me some time in the future...";
    }

    public function update(Request $request, $id)
    {
        return "I hoping someone would implement me some time in the future...";
    }

    public function destroy($id)
    {
        return "I hoping someone would implement me some time in the future...";
    }
}
