<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('portfolio', ['projects' => $projects]);
    }
}
