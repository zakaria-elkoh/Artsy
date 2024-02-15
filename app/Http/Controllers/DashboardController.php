<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "hello from the dash index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trash()
    {

        // trashed projects
        $trashed_projects = Project::onlyTrashed()
        ->orderBy('deleted_at', 'desc')
        ->get();
        
        // trashed users
        $trashed_users = User::onlyTrashed()
        ->orderBy('deleted_at', 'desc')
        ->get();

        return view('admin.dashboard.trash', compact('trashed_projects', 'trashed_users'));
    }
}
