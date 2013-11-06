@extends('layouts.default')

@section('intro')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<p>Wrapper around bshaffer/oauth2-server-php library for use with Laravel 4.</p>
		<p><a href="https://github.com/tappleby/laravel-oauth2-server" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
	</div>
</div>
@stop

@section('content')
  <h2 class="page-header">Select a user</h2>
	<div class="row users">
		@foreach($users as $user)
		<div class="user col-lg-4">
			<a class="btn-login" href="{{ URL::to('login/'.$user->id) }}" role="button"><img class="img-circle user-image" width="200" height="200" src="{{ $user->picture }}" ></a>
			<h2>{{ $user->fullName() }} </h2>
			<?php /*<dl>
				<dt>Email</dt>
				<dd>{{ $user->email }}</dd>
				<dt>Password</dt>
				<dd>{{ $user->password_raw }}</dd>
			</dl>
			<p><a class="btn btn-default btn-login" href="{{ URL::to('login/'.$user->id) }}" role="button">Login »</a></p>*/ ?>
		</div>
		@endforeach
	</div>

@stop

@section('footer_scripts')
<script src="{{ asset('js/main.js') }}"></script>
@stop