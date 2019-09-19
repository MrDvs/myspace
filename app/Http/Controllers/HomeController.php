<?php

namespace App\Http\Controllers;

use App\User;
use App\Like;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the last 4 registered users
        $users = User::orderBy('id', 'desc')->limit(4)->get();
        return view('index', ['users' => $users]);
    }
}
