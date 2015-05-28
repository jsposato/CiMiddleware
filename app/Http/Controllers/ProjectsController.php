<?php namespace App\Http\Controllers;

use App\Models\Project;
use Config;
use Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class ProjectsController extends Controller
{
    public function store() {
        // need to make folder under storage/app for project to hold configuration files
        $projectFilePath = Input::get('projectName');
        try {
            Storage::makeDirectory($projectFilePath);
        } catch (Exception $e) {
            return Redirect::route('projects.create')->with('error', $e->getMessage());
        }

        dd(Input::file());
        // make project storage folder
        // change file path to project storage folder
        // make sure configFile saved to db is the new path
        // save project

    }

    /**
     * create
     *
     * get form to create project
     *
     * @return $this
     */
    public function create() {
        $scmHostEnums = Config::get('project.scmHosts');
        return view('projects.create')->with('scmHosts', $scmHostEnums);
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
