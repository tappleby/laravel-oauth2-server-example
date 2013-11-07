@extends('layouts.default')

@section('content')

<form method="post" class="oauth">
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-objec img-circle user-image" src="{{ $user->picture }}" width="120" height="120">
		</a>
		<div class="media-body">
			<h4 class="media-heading">Do you authorize {{ $authData->client_id }}?</h4>
			<button type="submit" name="authorized" value="1" class="btn btn-primary">Yes</button>
			<button type="submit" name="authorized" value="0" class="btn btn-default">No</button>
		</div>
	</div>
</form>

@stop