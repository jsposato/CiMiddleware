<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class ProjectsController extends Controller
{
    public function store() {
        // need to make folder under storage/app for project to hold configuration files

    }

    public function create() {
        return view('projects.create');
    }

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

    public function update($id) {
        $project = Project::findOrFail( $id );
        $project->fill( Input::all() )->save();

        return Redirect::route('projects.index');
    }
}
