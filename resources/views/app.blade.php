<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background-color: moccasin">
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <img src="{{ asset('laravel-5.png') }}" height="100" class="img-thumbnail">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li >&nbsp;</li>
                <li ><button type="button" class="btn btn-lg btn-info" onclick="location.href='{{ route("home") }}'">Home</button></li>
                <li >&nbsp;</li>
                <li><button type="button" class="btn btn-lg btn-info" onclick="location.href='{{ route("laravel1") }}'" >laravel(persian)</button></li>
                <li >&nbsp;</li>
                <li><button type="button" class="btn btn-lg btn-info" >Ask Question</button></li>
                <li >&nbsp;</li>
                <li ><button type="button" class="btn btn-lg btn-info" ><a href="{{URL::to('forum')}}">Forum</a> </button></li>
                <li >&nbsp;</li>
                <li><button type="button" class="btn btn-lg btn-info" >Tags</button></li>


            </ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>


<div class="col-md-12">
    @yield('content')
</div>

<footer class="col-md-12">

    <div class="content  text-center">
        <p>Hightr is a trademark of Javad Hajiyan. Copyright © Javad Hajiyan.</p>
        <p ><a href="http://jackmcdade.com/">Design by Javad Hajiyan</a></p>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.js') }}" ></script>

</body>
</html>
