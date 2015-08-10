<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="SectionsController as ctrl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CIS Enroll</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	{{-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet"> --}}
	<link href="lib/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="bower_components/ladda/dist/ladda-themeless.min.css">
	<style>
	.modal-dialog {
		width: 90%;
	}
	.ng-hide-remove {
		-webkit-animation: bounceIn 2.5s;
		animation: bounceIn 2.5s;
	}
	
	.ng-hide-add {
		-webkit-animation: flipOutX 2.5s;
		animation: flipOutX 2.5s;
		display: block !important;
	}
	</style>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	
	<!-- Scripts -->
	
	<script src="lib/jquery.min.js"></script>
	<script src="lib/angular.min.js"></script>
	<script src="lib/bootstrap.min.js"></script>
	<script src="bower_components/ladda/dist/spin.min.js"></script>
	<script src="bower_components/ladda/dist/ladda.min.js"></script>
	<script src="bower_components/angular-ladda/dist/angular-ladda.min.js"></script>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">CIS Enrollment System</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}">Home</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li ><a href="{{ url('/edit-user') }}">Edit Profile</a></li>
							</ul>
						</li>
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		
		@yield('content')



	</body>
	</html>
