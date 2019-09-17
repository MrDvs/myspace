<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            return view('profile.profile', ['user' => $user]);
        } else {
            return view('index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $user = User::find($id);
        $validateArray = [
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'streetname' => ['required', 'string'],
            'housenumber' => ['required', 'numeric'],
            'housenumbersuffix' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ];
        $updateArray = [
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'street' => $request->streetname,
            'house_number' => $request->housenumber,
            'house_number_suffix' => $request->housenumbersuffix,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
        ];

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

        request()->validate($validateArray);

        if ($request->picture != null) {
            $originalImage = $request->file('picture');
            $cropped = Image::make($originalImage)
                ->fit(200, 200)
                ->encode('jpg', 80);
            $img_id = uniqid().'.jpg';
            $cropped->save('../storage/app/public/'.$img_id);
            $updateArray += ['profile_pic_path' => $img_id];
        }

        $user->update($updateArray);
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
