<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hightr</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
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
<body>
<div class="container">
    <img src="{{ asset('/images/707.gif') }}" class="" alt="Responsive image" height="150px" width="100%">
@yield('content');


    <footer class="col-md-12">

        <div class="content  text-center">
            <p>Hightr is a trademark of Javad Hajiyan. Copyright © Javad Hajiyan.</p>
            <p ><a href="http://jackmcdade.com/">Design by Javad Hajiyan</a></p>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.js') }}" ></script>
</body>
</html>
