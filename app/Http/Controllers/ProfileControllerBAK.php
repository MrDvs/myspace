<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()) {
    		$user = Auth::user();
	    	return view('profile.profile', ['user' => $user]);
    	} else {
    		return view('index');
    	}
    }

    public function show($id)
    {
    	$user = User::find($id);
        return view('profile.profile', ['user' => $user]);
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
