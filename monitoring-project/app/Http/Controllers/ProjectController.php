<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('project.index', compact('projects'));
    }
}