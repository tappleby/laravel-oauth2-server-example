<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css/demo.css') }}">
</head>
<body>


@section('header')
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Laravel 4 OAuth2 Server example</a>
		</div>
	</div>
</div>
@show

@yield('intro')

<div class="container">
	@yield('content')
</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	var OAuthDemo = {
		url: '{{ URL::to('') }}'
	}
</script>
<script src="{{ asset('js/plugins.js') }}"></script>
@yield('footer_scripts')
</body>
</html>