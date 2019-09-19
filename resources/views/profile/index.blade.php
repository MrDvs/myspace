@extends('layouts.default')

@section('content')
<style>
	.pagination {
		justify-content: center !important;
	}
</style>
<div id="new-people" class="clearfix">
	<h4>MySpace currently has {{count($users)}} users</h4>
	<div class="people-container" style="width: 100%">
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

{{ $users->links() }}
@endsection