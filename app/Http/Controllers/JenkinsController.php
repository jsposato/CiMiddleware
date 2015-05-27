<?php namespace App\Http\Controllers;

use App\MobJenkins;
use Illuminate\Http\Request;
use App\Models\Hook;
use JenkinsKhan\Jenkins;

ini_set('display_errors', '1');

class JenkinsController extends Controller
{
    protected $jenkinsURL;

    public function __construct()
    {
        $this->jenkinsURL = 'https://jsposato:6644d430b0fc76147880c2d6f18e09bd@ec2-54-173-156-239.compute-1.amazonaws.com';
    }

    /**
     * store
     *
     * store the webhook data sent from Github
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $event_name = $request->header('X-Github-Event');
        $body       = json_encode($request->all());

        $hook             = new Hook;
        $hook->event_name = $event_name;
        $hook->payload    = $body;

        $hook->save();

        return response()->json('', 200);
    }

    /**
     * showJobs
     *
     * show the jobs in the jenkins instance
     *
     */
    public function showJobs()
    {
        $jenkins = new MobJenkins($this->jenkinsURL);

        $view = $jenkins->getView('All');

        $views = array();

        foreach ($view->getJobs() as $job) {
            $views[] = $job->getName();
        }

        return view('jobs.index')->with(['views' => $views, 'pageTitle' => 'Jobs']);
    }
}
