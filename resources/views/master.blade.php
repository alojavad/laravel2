<!DOCTYPE html>
<!-- saved from url=(0027)http://laravel.com/docs/5.0 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>persian laravel</title>
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Taylor Otwell">
    <meta name="description" content="Laravel - The PHP framework for web artisans.">
    <meta name="keywords" content="laravel,laravel persian,لاراول فارسی, persian laravel, framework , فریو ورک لاراول,javad hajiyan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lte IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/laravel.css') }}">
</head>
<body class="docs language-php scotchified" style=""><div class="scotch-panel-wrapper" style="position: relative; overflow: hidden; width: 100%;"><div class="scotch-panel-canvas" style="position: relative; height: 100%; width: 100%; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px); -webkit-backface-visibility: hidden; backface-visibility: hidden; -webkit-transition: all 300ms ease; transition: all 300ms ease;">

<span class="overlay"></span>

<nav class="main">
    <div class="container">
        <a href="http://laravel.com/" class="brand">
            <img src="{{ asset('laravel4-hello-72dpi.png') }}" height="30">
            Laravel
        </a>

        <div class="responsive-sidebar-nav">
            <a href="http://laravel.com/docs/5.0#" class="toggle-slide menu-link btn">☰</a>
        </div>



        <ul class="main-nav">
            <li class="nav-docs"><a href="http://hightr.com">home</a></li>
            <li class="nav-docs"><a href="#">Laravel(persian)</a></li>
            <li class="nav-docs"><a href="http://laravel.com/docs">Laravel</a></li>
            <li class="nav-laracasts"><a href="https://laracasts.com/">Laracasts</a></li>
            <li class="nav-forge"><a href="https://laravel.io/">Laravel.io</a></li>
            <li class="nav-envoyer"><a href="https://getbootstrap.com/">Bootstrap</a></li>
            <li class="nav-api"><a href="http://laravel.com/api/5.0">API</a></li>

        </ul>
    </div>
</nav>

<nav id="slide-menu" class="slide-menu scotch-panel-left" role="navigation" style="top: 0px; left: -70%; width: 70%; height: 100%; position: absolute; z-index: 888888; overflow: hidden; -webkit-backface-visibility: hidden; backface-visibility: hidden;">

    <div class="brand">
        <a href="http://laravel.com/">
            <img src="./Installation - Laravel - The PHP Framework For Web Artisans_files/laravel-logo-white.png" height="50">
        </a>
    </div>

    <ul class="slide-main-nav">
        <li><a href="http://laravel.com/">Home</a></li>
        <li class="nav-docs"><a href="http://laravel.com/docs">Documentation</a></li>
        <li class="nav-laracasts"><a href="https://laracasts.com/">Laracasts</a></li>
        <li class="nav-forge"><a href="https://forge.laravel.com/">Forge</a></li>
        <li class="nav-envoyer"><a href="https://envoyer.io/">Envoyer</a></li>
        <li class="nav-api"><a href="http://laravel.com/api/5.0">API</a></li>
        <li class="dropdown community-dropdown">
            <a href="http://laravel.com/docs/5.0#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Conference <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="http://laracon.us/">Laracon US</a></li>
                <li><a href="http://laracon.eu/">Laracon EU</a></li>
            </ul>
        </li>
        <li class="dropdown community-dropdown">
            <a href="http://laravel.com/docs/5.0#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Community <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="https://github.com/laravel/laravel">GitHub</a></li>
                <li><a href="https://twitter.com/laravelphp">Twitter</a></li>
                <li class="divider"></li>
                <li><a href="https://laracasts.com/discuss">Laracasts Forums</a></li>
                <li><a href="http://laravel.io/forum">Laravel.io Forums</a></li>
                <li><a href="http://larachat.co/">LaraChat Slack Channel</a></li>
                <li><a href="https://laravel-news.com/">Laravel News</a></li>
                <li class="divider"></li>
                <li><a href="http://laravelcollective.com/">Laravel Collective</a></li>
                <li class="divider"></li>
                <li><a href="https://larajobs.com/?partner=5#/">LaraJobs</a></li>
            </ul>
        </li>
    </ul>

    <div class="slide-docs-nav">
        <h2>Documentation</h2>
        <ul>
            <li>Prologue
                <ul>
                    <li><a href="releases">Release Notes</a></li>
                    <li><a href="upgrade">Upgrade Guide</a></li>
                    <li><a href="contributions">Contribution Guide</a></li>
                </ul></li>
            <li>تنظیمات
                <ul>
                    <li><a href="installation">نصب</a></li>
                    <li><a href="configuration">پیکربندی</a></li>
                    <li><a href="homestead">Homestead</a></li>
                </ul></li>
            <li>The Basics
                <ul>
                    <li><a href="routing">مسیریابی</a></li>
                    <li><a href="middleware">میان افزار</a></li>
                    <li><a href="controllers">کنترلر</a></li>
                    <li><a href="requests">درخواست</a></li>
                    <li><a href="responses">پاسخ</a></li>
                    <li><a href="views">Views</a></li>
                </ul></li>
            <li>Architecture Foundations
                <ul>
                    <li><a href="providers">Service Providers</a></li>
                    <li><a href="container">Service Container</a></li>
                    <li><a href="contracts">Contracts</a></li>
                    <li><a href="facades">Facades</a></li>
                    <li><a href="lifecycle">Request Lifecycle</a></li>
                    <li><a href="structure">ساختار برنامه</a></li>
                </ul></li>
            <li>Services
                <ul>
                    <li><a href="authentication">Authentication</a></li>
                    <li><a href="billing">Billing</a></li>
                    <li><a href="cache">Cache</a></li>
                    <li><a href="collections">Collections</a></li>
                    <li><a href="bus">Command Bus</a></li>
                    <li><a href="extending">Core Extension</a></li>
                    <li><a href="elixir">Elixir</a></li>
                    <li><a href="encryption">Encryption</a></li>
                    <li><a href="envoy">Envoy</a></li>
                    <li><a href="errors">Errors &amp; Logging</a></li>
                    <li><a href="events">Events</a></li>
                    <li><a href="filesystem">Filesystem / Cloud Storage</a></li>
                    <li><a href="hashing">Hashing</a></li>
                    <li><a href="helpers">Helpers</a></li>
                    <li><a href="localization">Localization</a></li>
                    <li><a href="mail">Mail</a></li>
                    <li><a href="packages">Package Development</a></li>
                    <li><a href="pagination">Pagination</a></li>
                    <li><a href="queues">Queues</a></li>
                    <li><a href="session">Session</a></li>
                    <li><a href="templates">قالب</a></li>
                    <li><a href="testing">Unit Testing</a></li>
                    <li><a href="validation">اعتبارسنجی</a></li>
                </ul></li>
            <li>Database
                <ul>
                    <li><a href="database">کاربرد های اولیه</a></li>
                    <li><a href="queries">سازنده پرس وجو</a></li>
                    <li><a href="eloquent">Eloquent ORM</a></li>
                    <li><a href="schema">سازنده قالب</a></li>
                    <li><a href="migrations">Migrations &amp; Seeding</a></li>
                    <li><a href="redis">Redis</a></li>
                </ul></li>
            <li>Artisan CLI
                <ul>
                    <li><a href="artisan">Overview</a></li>
                    <li><a href="commands">Development</a></li>
                </ul></li>
        </ul>
    </div>

</nav>

<div class="docs-wrapper container">


    <section class="sidebar">
        <ul>
            <li>Prologue
                <ul>
                    <li><a href="releases">Release Notes</a></li>
                    <li><a href="upgrade">Upgrade Guide</a></li>
                    <li><a href="contributions">Contribution Guide</a></li>
                </ul></li>
            <li>Setup
                <ul>
                    <li><a href="laravel">نصب</a></li>
                    <li><a href="{{URL::to('laravel/configuration')}}">پیکربندی</a></li>
                    <li><a href="homestead">Homestead(persian)</a></li>
                </ul></li>
            <li>The Basics
                <ul>
                    <li><a href="routing">Routing(persian)</a></li>
                    <li><a href="middleware">Middleware(persian)</a></li>
                    <li><a href="controllers">Controllers(persian)</a></li>
                    <li><a href="requests">Requests(persian)</a></li>
                    <li><a href="responses">Responses(persian)</a></li>
                    <li><a href="views">Views(persian)</a></li>
                </ul></li>
            <li>Architecture Foundations
                <ul>
                    <li><a href="providers">Service Providers</a></li>
                    <li><a href="container">Service Container</a></li>
                    <li><a href="contracts">Contracts</a></li>
                    <li><a href="facades">Facades</a></li>
                    <li><a href="lifecycle">Request Lifecycle</a></li>
                    <li><a href="structure">Application Structure(persian)</a></li>
                </ul></li>
            <li>Services
                <ul>
                    <li><a href="authentication">Authentication</a></li>
                    <li><a href="billing">Billing</a></li>
                    <li><a href="cache">Cache</a></li>
                    <li><a href="collections">Collections</a></li>
                    <li><a href="bus">Command Bus</a></li>
                    <li><a href="extending">Core Extension</a></li>
                    <li><a href="elixir1">Elixir</a></li>
                    <li><a href="encryption">Encryption</a></li>
                    <li><a href="envoy">Envoy</a></li>
                    <li><a href="errors">Errors &amp; Logging</a></li>
                    <li><a href="events">Events</a></li>
                    <li><a href="filesystem">Filesystem / Cloud Storage</a></li>
                    <li><a href="hashing">Hashing</a></li>
                    <li><a href="helpers">Helpers</a></li>
                    <li><a href="localization">Localization</a></li>
                    <li><a href="mail">Mail</a></li>
                    <li><a href="packages">Package Development</a></li>
                    <li><a href="pagination">Pagination</a></li>
                    <li><a href="queues">Queues</a></li>
                    <li><a href="session">Session</a></li>
                    <li><a href="templates">Templates(persian)</a></li>
                    <li><a href="testing">Unit Testing</a></li>
                    <li><a href="validation">Validation(persian)</a></li>
                </ul></li>
            <li>Database
                <ul>
                    <li><a href="database">Basic Usage(persian)</a></li>
                    <li><a href="queries">Query Builder(persian)</a></li>
                    <li><a href="eloquent">Eloquent ORM(persian)</a></li>
                    <li><a href="schema">Schema Builder(persian)</a></li>
                    <li><a href="migrations">Migrations &amp; Seeding(persian)</a></li>
                    <li><a href="redis">Redis</a></li>
                </ul></li>
            <li>Artisan CLI
                <ul>
                    <li><a href="artisan">Overview</a></li>
                    <li><a href="commands">Development</a></li>
                </ul></li>
        </ul>
    </section>

    @section('content')

    @show
</div>
{!!Form::open(['action'=>'AsksController@store','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}

<div class="form-group">
    {!! Form::label('text','Body:',['class'=>'col-sm-3 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('body',Input::old('title'),['class'=>'form-control']) !!}
    </div>
</div>

<div class="text-center">
    {!!Form::submit('Post',['class'=>'btn btn-default'])!!}
</div>
{!!Form::close()!!}
<br>
<br>
<br>

<footer class="main">
    <ul>
        <li class="nav-docs"><a href="http://laravel.com/docs">Documentation</a></li>
        <li class="nav-laracasts"><a href="https://laracasts.com/">Laracasts</a></li>
        <li class="nav-forge"><a href="https://forge.laravel.com/">Forge</a></li>
        <li class="nav-envoyer"><a href="https://envoyer.io/">Envoyer</a></li>
        <li class="nav-api"><a href="http://laravel.com/api/5.0">API</a></li>
        <li class="dropdown community-dropdown">
            <a href="http://laravel.com/docs/5.0#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Conference <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="http://laracon.us/">Laracon US</a></li>
                <li><a href="http://laracon.eu/">Laracon EU</a></li>
            </ul>
        </li>
        <li class="dropdown community-dropdown">
            <a href="http://laravel.com/docs/5.0#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Community <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="https://github.com/laravel/laravel">GitHub</a></li>
                <li><a href="https://twitter.com/laravelphp">Twitter</a></li>
                <li class="divider"></li>
                <li><a href="https://laracasts.com/discuss">Laracasts Forums</a></li>
                <li><a href="http://laravel.io/forum">Laravel.io Forums</a></li>
                <li><a href="http://larachat.co/">LaraChat Slack Channel</a></li>
                <li><a href="https://laravel-news.com/">Laravel News</a></li>
                <li class="divider"></li>
                <li><a href="http://laravelcollective.com/">Laravel Collective</a></li>
                <li class="divider"></li>
                <li><a href="https://larajobs.com/?partner=5#/">LaraJobs</a></li>
            </ul>
        </li>
    </ul>
    <p>Laravel(persian) is a trademark of Javad Hajiyan. Copyright © Javad Hajiyan.</p>
    <p class="less-significant"><a href="http://hightr.com/">Design by Javad Hajiyan</a></p>
</footer>
<script src="./Installation - Laravel - The PHP Framework For Web Artisans_files/ga.js"></script><script src="./Installation - Laravel - The PHP Framework For Web Artisans_files/laravel.js"></script>
<script src="./Installation - Laravel - The PHP Framework For Web Artisans_files/viewport-units-buggyfill.js"></script>
<script>window.viewportUnitsBuggyfill.init();</script>
<script>
    var _gaq=[['_setAccount','UA-23865777-1'],['_trackPageview']];
    (function(d,t){
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)
    }(document,'script'));
</script><p style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); margin: 0px;"></p>


</div></div></body></html>