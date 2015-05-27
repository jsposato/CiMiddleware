<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectsController extends Controller
{
    public function add() {}

    public function create() {}

    /**
     * index
     *
     * listing of all projects
     *
     * @return $this
     */
    public function index() {
        $projects = Project::all();
        return view('projects.index')->with(['projects' => $projects, 'pageTitle' => 'Projects']);

    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        return view('projects.edit')->with(['project' => $project, 'pageTitle' => 'Edit Project']);
    }

    public function update() {}
}
