<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
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
    	dd($user);
    }
}
