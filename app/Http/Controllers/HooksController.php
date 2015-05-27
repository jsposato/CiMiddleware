<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Hook;
use Illuminate\Http\Request;

class HooksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $hooks = Hook::all();
        return view('hooks.index')->with(['hooks' => $hooks, 'pageTitle' => 'Hooks']);
    }
}
