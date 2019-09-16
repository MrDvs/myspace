@extends('layouts.default')

@section('content')
<img src="{{asset('storage/'.$user->profile_pic_path)}}" alt="">
<ul>
	<li>{{$user->username}}</li>
	<li>{{$user->email}}</li>
	<li>{{$user->first_name}}</li>
	<li>{{$user->last_name}}</li>
	<li>{{$user->street}}</li>
	<li>{{$user->house_number}}</li>
	<li>{{$user->house_number_suffix}}</li>
	<li>{{$user->city}}</li>
	<li>{{$user->zipcode}}</li>
</ul>

{{-- @if($user->id != Auth::user()->id)
<button onclick="like({{$user->id}})">Like {{$user->username}}</button>
@endif --}}

@if(Auth::id() == $user->id)
<button class="btn btn-primary">Edit profile</button>
@else
<div id="app">
	<like-component profile-id="{{$user->id}}">

	</like-component>
</div>
@endif

{{--
<script>
	function like($id) {
		console.log($id)
	}
</script> --}}
@endsection
