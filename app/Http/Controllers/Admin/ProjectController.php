<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // !VALIDATION
        $request->validate(
            [
                'name' => 'required|string|unique:projects',
                'thumb' => 'nullable|url:http,https',
                'url' => 'required|url:http,https',
                'description' => 'nullable|string',
            ],
            [
                'name.required' => 'Il nome progetto è obbligatorio',
                'name.unique' => 'Il titolo è già stato utilizzato',
                'url.required' => "L'URL è obbligatorio",
                'url.url' => "L'URL inserito non è valido",
                'thumb.required' => "L'URL è obbligatorio",
                'thumb.url' => "L'URL inserito non è valido"
            ]
        );


        $data = $request->all();
        $project = new Project;
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        // !VALIDATION
        $request->validate(
            [
                'name' => ['required', 'string', Rule::unique('projects')->ignore($project->id)],
                'thumb' => 'nullable|url:http,https',
                'url' => 'required|url:http,https',
                'description' => 'nullable|string'
            ],
            [
                'name.required' => 'Il nome progetto è obbligatorio',
                'name.unique' => 'Il titolo è già stato utilizzato',
                'url.required' => "L'URL è obbligatorio",
                'url.url' => "L'URL inserito non è valido",
                'thumb.required' => "L'URL è obbligatorio",
                'thumb.url' => "L'URL inserito non è valido"
            ]
        );

        $data = $request->all();
        $project->update($data);
        return to_route('admin.projects.show', $project)
            ->with('toast-class', 'danger')
            ->with('toast-message', "Progetto eliminato");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')
            ->with('toast-class', 'success')
            ->with('toast-message', 'Progetto eliminato');
    }

    // Trash Comic
    public function trash()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.trash', compact('projects'));
    }

    // Restore Project
    public function restore(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return to_route('admin.projects.trash');
    }

    // Drop Project
    public function drop(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return to_route('admin.projects.trash');
    }
}
