<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('projectToken')->only(['create', 'store']);
    }

    public function index()
    {
        return "I'm not implemented yet";
    }

    public function create()
    {
        return "authenticated!!";
    }

    public function store(Request $request)
    {
        return "authenticated!!";
    }

    public function show($id)
    {
        return "I'm not implemented yet";
    }

    public function edit($id)
    {
        return "I'm not implemented yet";
    }

    public function update(Request $request, $id)
    {
        return "I'm not implemented yet";
    }

    public function destroy($id)
    {
        return "I'm not implemented yet";
    }
}
