@extends('layouts.default')

@section('content')
<h5 style="font-weight: bold;">You searched for "{{$query}}"</h5>
@if(count($results))
	<h4>All users with "{{$query}}" in their username</h4>
	@foreach($results as $result)
		<div class="card" style="width: 275px; float: left;">
			<img src="{{asset('storage/'.$result->profile_pic_path)}}" class="card-img-top" alt="...">
			<div class="card-body">
		  		<h5 class="card-title">{{$result->username}}</h5>
		  		<a href="{{route('profile.show', ['profile' => $result->id])}}" class="btn btn-primary">View profile</a>
			</div>
		</div>
	@endforeach
@else
	<h4>There where no results found for "{{$query}}"</h4>
@endif
@endsection