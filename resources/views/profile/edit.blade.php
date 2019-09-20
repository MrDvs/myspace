@extends('layouts/default')

@section('content')

@foreach ($errors->all() as $message)
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@endforeach

<form enctype="multipart/form-data" style="margin-top: 2vh" method="POST" action="{{ route('profile.update', ['profile' => $user->id]) }}">
	@csrf
	@method('PATCH')
	<h3>Edit</h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h4>Account</h4>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label for="usernameInput">User Name</label>
				<input type="text" class="form-control @error('username') is-invalid @enderror" id="usernameInput" name="username" value="{{$user->username}}">
			</div>
			<div class="form-group">
				<label for="emailInput">Email Address</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{$user->email}}">
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="passwordInput">Password</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password">
				</div>
				<div class="form-group col-md-6">
					<label for="repeatpasswordInput">Repeat password</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror" id="repeatpasswordInput" name="password_confirmation">
				</div>
			</div>
			<div class="form-group">
				<label for="pictureInput">Profile picture</label>
				<input type="file" class="form-control-file @error('picture') is-invalid @enderror" id="pictureInput" name="picture">
			</div>
			Current profile picture: <br>
			<img src="{{asset('storage/'.$user->profile_pic_path)}}" alt="">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h4>Personal information</h4>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label for="firstnameInput">First Name</label>
				<input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstnameInput" name="firstname" value="{{$user->first_name}}">
			</div>
			<div class="form-group">
				<label for="lastnameInput">Last Name</label>
				<input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastnameInput" name="lastname" value="{{$user->last_name}}">
			</div>
			<div class="form-group">
				<label for="relationshipInput">Relationship status</label>
				<select name="relationshipstatus" id="relationshipInput" class="form-control">
					<option value="Single" {{$user->relationship_status == 'Single' ? 'selected' : ''}}>Single</option>
					<option value="Divorced" {{$user->relationship_status == 'Divorced' ? 'selected' : ''}}>Divorced</option>
					<option value="Married" {{$user->relationship_status == 'Married' ? 'selected' : ''}}>Married</option>
					<option value="Taken" {{$user->relationship_status == 'Taken' ? 'selected' : ''}}>Taken</option>
					<option value="It's complicated" {{$user->relationship_status == "It's complicated" ? 'selected' : ''}}>It's complicated</option>
				</select>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="streetInput">Street name</label>
					<input type="text" class="form-control @error('streetname') is-invalid @enderror" id="streetInput" name="streetname" value="{{$user->street}}">
				</div>
				<div class="form-group col-md-3">
					<label for="housenumberInput">House number</label>
					<input type="number" class="form-control @error('housenumber') is-invalid @enderror" id="housenumberInput" name="housenumber" value="{{$user->house_number}}">
				</div>
				<div class="form-group col-md-3">
					<label for="housenumbersuffixInput">House number suffix</label>
					<input type="text" class="form-control @error('housenumbersuffix') is-invalid @enderror" id="housenumbersuffixInput" name="housenumbersuffix" value="{{$user->house_number_suffix}}">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="streetInput">City</label>
					<input type="text" class="form-control @error('city') is-invalid @enderror" id="streetInput" name="city" value="{{$user->city}}">
				</div>
				<div class="form-group col-md-6">
					<label for="zipcodeInput">Zipcode</label>
					<input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcodeInput" name="zipcode" value="{{$user->zipcode}}">
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
