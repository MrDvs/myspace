@extends('layouts.default')

@section('content')
<h3>{{$user->username}}</h3>

@guest
	<img src="{{asset('storage/'.$user->profile_pic_path)}}">
	<h5 class="text-center">To view more of {{$user->username}}'s profile, you have to <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a>.</h5>
@else
	<div>
		<img src="{{asset('storage/'.$user->profile_pic_path)}}" style="display: inline-block;">
		<h4 style="display: inline-block;">{{$user->street}} {{$user->house_number}}{{$user->house_number_suffix}},<br>
		{{$user->zipcode}},<br> 
		{{$user->city}}</h4>
	</div>
	<div style="margin-top: 2vh">
		<h5><i class="far fa-id-badge"></i> {{$user->first_name}} {{$user->last_name}}</h5>
		<h5><i class="far fa-envelope"></i> {{$user->email}}</h5>

	@if(Auth::user()->id == $user->id)
		<a href="{{route('profile.edit', ['profile' => $user->id])}}">
			<button class="btn btn-primary">Edit profile</button>
		</a>
	@else
		<div id="app">
			<like-component profile-id="{{$user->id}}"></like-component>
		</div>
	@endif
	</div>
@endif
@endsection
