@extends('layouts.default')

@section('content')
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

<div id="app">
	<like-component>

	</like-component>
</div>
{{--
<script>
	function like($id) {
		console.log($id)
	}
</script> --}}
@endsection
