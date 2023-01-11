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

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('project.create');
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'image'     => 'required|image|mimes:png,jpg,jpeg',
            'name'      => 'required',
            'client'    => 'required',
            'leader'    => 'required',
            'start'     => 'required',
            'end'       => 'required',
            'progress'  => 'required'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/projects', $image->hashName());

        $project = Project::create([
            // 'image'     => $image->hashName(),
            'name'     => $request->name,
            'client'     => $request->client,
            'leader'   => $request->leader,
            'start'   => $request->start,
            'end'   => $request->end,
            'progress'   => $request->progress
        ]);

        if($project){
            //redirect dengan pesan sukses
            return redirect()->route('project.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('project.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * edit
    *
    * @param  mixed $project
    * @return void
    */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $project
    * @return void
    */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'name'       => $request->name,
            'client'     => $request->client,
            'leader'     => $request->leader,
            'start'      => $request->start,
            'end'        => $request->end,
            'progress'   => $request->progress
        ]);

        //get data Project by ID
        $project = Project::findOrFail($project->id);

        if($project){
            //redirect dengan pesan sukses
            return redirect()->route('project.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('project.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
    * destroy
    *
    * @param  mixed $id
    * @return void
    */
    public function destroy($id)
    {
    $project = Project::findOrFail($id);
    // Storage::disk('local')->delete('public/projects/'.$blog->image);
    $project->delete();

    if($project){
        //redirect dengan pesan sukses
        return redirect()->route('project.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('project.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}