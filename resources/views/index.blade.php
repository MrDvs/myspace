@extends('layouts.default')

@section('content')
    <h1 class="text-center">Welcome to MySpace!</h1>

	@foreach($users as $user)
    <div class="card" style="width: 18rem; float: left;">
	  <img src="{{asset('storage/'.$user->profile_pic_path)}}" class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title">{{$user->username}}</h5>
	    <a href="{{route('show.profile', ['id' => $user->id])}}" class="btn btn-primary">View profile</a>
	  </div>
	</div>
	@endforeach
@endsection