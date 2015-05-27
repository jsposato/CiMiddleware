<?php namespace App\Http\Controllers;

use App\Models\Hook;


class HomeController extends Controller
{

    public function index()
    {
        $hooks = Hook::all();
        return view('home.hooks')->with(['hooks' => $hooks, 'pageTitle' => 'Hooks']);
    }
}
