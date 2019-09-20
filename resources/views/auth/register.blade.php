@extends('layouts/default')

@section('content')

@foreach ($errors->all() as $message)
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@endforeach

<form enctype="multipart/form-data" style="margin-top: 2vh" method="POST" action="{{ route('register') }}">
	@csrf
	<h3>Register</h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h4>Account</h4>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label for="usernameInput">User Name</label>
				<input type="text" class="form-control @error('username') is-invalid @enderror" id="usernameInput" name="username" value="{{old('username')}}">
			</div>
			<div class="form-group">
				<label for="emailInput">Email Address</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" value="{{old('email')}}">
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
				<input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstnameInput" name="firstname" value="{{old('firstname')}}">
			</div>
			<div class="form-group">
				<label for="lastnameInput">Last Name</label>
				<input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastnameInput" name="lastname" value="{{old('lastname')}}">
			</div>
			<div class="form-group">
				<label for="relationshipInput">Relationship status</label>
				<select name="relationshipstatus" id="relationshipInput" class="form-control">
					<option value="Single">Single</option>
					<option value="Divorced">Divorced</option>
					<option value="Married">Married</option>
					<option value="Taken">Taken</option>
					<option value="It's complicated">It's complicated</option>
				</select>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="streetInput">Street name</label>
					<input type="text" class="form-control @error('streetname') is-invalid @enderror" id="streetInput" name="streetname" value="{{old('streetname')}}">
				</div>
				<div class="form-group col-md-3">
					<label for="housenumberInput">House number</label>
					<input type="number" class="form-control @error('housenumber') is-invalid @enderror" id="housenumberInput" name="housenumber" value="{{old('housenumber')}}">
				</div>
				<div class="form-group col-md-3">
					<label for="housenumbersuffixInput">House number suffix</label>
					<input type="text" class="form-control @error('housenumbersuffix') is-invalid @enderror" id="housenumbersuffixInput" name="housenumbersuffix" value="{{old('housenumbersuffix')}}">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="streetInput">City</label>
					<input type="text" class="form-control @error('city') is-invalid @enderror" id="streetInput" name="city" value="{{old('city')}}">
				</div>
				<div class="form-group col-md-6">
					<label for="zipcodeInput">Zipcode</label>
					<input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcodeInput" name="zipcode" value="{{old('zipcode')}}">
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Register</button>
</form>

@endsection
