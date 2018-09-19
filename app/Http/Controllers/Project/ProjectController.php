<?php

namespace App\Http\Controllers\Project;

use App\Client;
use App\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdateProject;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index')
            ->with(['projects' => Project::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create')
            ->with(['clients' => Client::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreAndUpdateProject $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdateProject $request)
    {
        $project = Project::create(
            $request->only('client_id', 'title', 'job_code', 'description')
        );

        return redirect()
            ->route('projects.show', $project)
            ->with('success', ['The project has been created.']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show')
            ->with(['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project             $project
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProject $request, Project $project)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
    }
}
