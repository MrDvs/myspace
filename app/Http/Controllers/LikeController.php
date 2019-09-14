<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
	public function isLiked($id)
	{
		$check = Like::where([
    		['liker_id', Auth::user()->id],
    		['liked_user_id', $id]
    	])->get();

    	if (count($check)) {
    		return 1;
    	} else {
    		return 0;
    	}
	}

    public function like($id)
    {
    	$likerId = Auth::user()->id;

		$like = new Like();
    	$like->liker_id = $likerId;
    	$like->liked_user_id = $id;
    	$like->save();
    }

    public function unlike($id)
    {
        $likerId = Auth::user()->id;

        $like = Like::where([
            ['liker_id', $likerId],
            ['liked_user_id', $id]
        ])->get();
        Like::destroy($like[0]['id']);
    }
}
