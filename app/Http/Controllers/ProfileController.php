<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::SimplePaginate(8);
        return view('profile.index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the user with the requested id
        $user = User::find($id);
        return view('profile.profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get all the user info with the requested id
        $user = User::find($id);
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the requested user by id
        $user = User::find($id);
        // Create an array with things to validate if the form gets submitted
        $validateArray = [
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'relationshipstatus' => ['required'],
            'streetname' => ['required', 'string'],
            'housenumber' => ['required', 'numeric'],
            'housenumbersuffix' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ];
        // Create an array with things to update in the database
        $updateArray = [
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'street' => $request->streetname,
            'house_number' => $request->housenumber,
            'house_number_suffix' => $request->housenumbersuffix,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
        ];

        // If the password is not null, add it to the validation- and updatearray
        if ($request->password != null)
        {
            $validateArray += ['password' => ['required', 'string', 'min:8', 'confirmed']];
            $updateArray += ['password' => Hash::make($request->password)];
        }

        if ($request->username != $user->username)
        {
            $validateArray += ['username' => ['required', 'string', 'max:255', 'unique:users']];
            $updateArray += ['username' => $request->username];
        }

        if ($request->email != $user->email)
        {
            $validateArray += ['email' => ['required', 'string', 'email', 'max:255', 'unique:users']];
            $updateArray += ['email' => $request->email];
        }

        if ($request->picture != null) {
            $validateArray += ['picture' => ['required', 'image']];
        }

        if ($request->relationshipstatus != $user->relationship_status) {
            $updateArray += ['relationship_status' => $request->relationshipstatus];
        }

        // Validate everything is the validate array
        request()->validate($validateArray);

        // If a new picture has been uploaded, crop it, store it in the storage and add it to the update array
        if ($request->picture != null) {
            $originalImage = $request->file('picture');
            $cropped = Image::make($originalImage)
                ->fit(200, 200)
                ->encode('jpg', 80);
            $img_id = uniqid().'.jpg';
            $cropped->save('../storage/app/public/'.$img_id);
            $updateArray += ['profile_pic_path' => $img_id];
        }

        // Update everything that is present in the update array
        $user->update($updateArray);

        return redirect()->route('profile.show', ['profile' => $id]);
    }

    public function search(Request $request)
    {
        // Search all the usernames
        $query = request('query');
        $results = User::where('username', 'like', '%'.$query.'%')->get();

        if (count($results)) {
            return view('profile.search', [
                'results' => $results,
                'query' => $query
            ]);
        } else {
            // echo $query."<br>";
            // $users = User::all();
            // $resultz = [];
            // $resultz += [1];
            // $resultz += [2];
            // foreach ($users as $key => $user) {
            //     $levenshtein = levenshtein($user->username, $query)."<br>";
            //     echo $levenshtein;
            //     if ($levenshtein <= 3) {
            //         $resultz += [$key];
            //     }
            // }
            dd('no results found');
        }
    }
}
