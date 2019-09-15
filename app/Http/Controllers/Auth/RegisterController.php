<?php

namespace App\Http\Controllers\Auth;

use Storage;
use App\User;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $request = request();
        $originalImage = $request->file('picture');
        $cropped = Image::make($originalImage)
            ->fit(664, 373)
            ->encode('jpg', 80);
        $cropped->save('../storage/app/public/test.jpg');

        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'picture' => ['required', 'image'],
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'streetname' => ['required', 'string'],
            'housenumber' => ['required', 'numeric'],
            'housenumbersuffix' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'street' => $data['streetname'],
            'house_number' => $data['housenumber'],
            'house_number_suffix' => $data['housenumbersuffix'],
            'city' => $data['city'],
            'zipcode' => $data['zipcode'],
            // 'profile_pic_path' =>
        ]);
    }
}
