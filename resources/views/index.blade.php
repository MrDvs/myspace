@extends('layouts.default')

@section('content')
    <h1 class="text-center">Welcome to MySpace!</h1>

	<div id="search">
		<h3 class="text-center">Search users</h3>
		<form action="{{route('search')}}" method="post">
			@csrf
			<div class="input-group mb-4" style="width: 50%; margin: auto;">
				<input type="search" placeholder="Who're you searching for?" aria-describedby="button-addon5" class="form-control" name="query">
				<div class="input-group-append">
					<button type="submit" id="button-addon5" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</div>
      	</form>
	</div>

	{{-- Show the last 4 registered users --}}
	<div id="new-people" class="clearfix">
		<h4 style="font-weight: bold;">Cool new people</h4>
		<div class="people-container" style="display: flex; justify-content: center; width: 100%">
			@foreach($users as $user)
			    <div class="card" style="width: 275px; float: left;">
					<img src="{{asset('storage/'.$user->profile_pic_path)}}" class="card-img-top" alt="...">
					<div class="card-body">
				  		<h5 class="card-title">{{$user->username}}</h5>
				  		<a href="{{route('profile.show', ['profile' => $user->id])}}" class="btn btn-primary">View profile</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
