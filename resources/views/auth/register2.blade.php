@extends('layouts/default')

@section('content')

<form style="margin-top: 2vh">
	<h3>Register</h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h4>Account</h4>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label for="usernameInput">User Name</label>
				<input type="text" class="form-control" id="usernameInput">
			</div>
			<div class="form-group">
				<label for="emailInput">Email Address</label>
				<input type="email" class="form-control" id="emailInput">
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="passwordInput">Password</label>
					<input type="password" class="form-control" id="passwordInput">
				</div>
				<div class="form-group col-md-6">
					<label for="repeatpasswordInput">Repeat password</label>
					<input type="password" class="form-control" id="repeatpasswordInput">
				</div>
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
				<input type="text" class="form-control" id="firstnameInput">
			</div>
			<div class="form-group">
				<label for="lastnameInput">Last Name</label>
				<input type="text" class="form-control" id="lastnameInput">
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="streetInput">Street name</label>
					<input type="text" class="form-control" id="streetInput">
				</div>
				<div class="form-group col-md-3">
					<label for="housenumberInput">House number</label>
					<input type="number" class="form-control" id="housenumberInput">
				</div>
				<div class="form-group col-md-3">
					<label for="housenumbersuffixInput">House number suffix</label>
					<input type="text" class="form-control" id="housenumbersuffixInput">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="streetInput">City</label>
					<input type="text" class="form-control" id="streetInput">
				</div>
				<div class="form-group col-md-6">
					<label for="zipcodeInput">Zipcode</label>
					<input type="text" class="form-control" id="zipcodeInput">
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Register</button>
</form>

@endsection