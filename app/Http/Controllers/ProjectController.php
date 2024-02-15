<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.dashboard.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('is_admin_or_partner');

        $usersWithPartnerRole = User::whereHas('roles', function ($query) {
            $query->where('name', 'partner');
        })->get();
        $usersWithArtistRole = User::whereHas('roles', function ($query) {
            $query->where('name', 'artist');
        })->get();

        return view('project.create', compact('usersWithPartnerRole', 'usersWithArtistRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        // dd($request->all());

        $project = Project::create($request->all());

        $project->users()->attach($request->artists);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        Gate::authorize('update_project', $project);
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        Gate::authorize('update_project', $project);
        $project->update($request->all());
        return redirect()->route('admin.dashboard.projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.dashboard.projects');
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('admin.dashboard.trash');
    }

    public function collaborate(Project $project)
    {
        $project->users()->attach(Auth::user());

        return redirect()->back();
    }

    public function uncollaborate($project_id)
    {
        $project = Project::findOrFail($project_id);
        $project->users()->detach(Auth::user());

        return redirect()->back();
    }
}
