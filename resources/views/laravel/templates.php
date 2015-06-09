<!DOCTYPE html>
<!-- saved from url=(0027)http://laravel.com/docs/5.0 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Installation - Laravel - The PHP Framework For Web Artisans</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Taylor Otwell">
    <meta name="description" content="Laravel - The PHP framework for web artisans.">
    <meta name="keywords" content="laravel, php, framework, web, artisans, taylor otwell">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lte IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../../public/css/laravel.css">
</head>
<body class="docs language-php scotchified" style=""><div class="scotch-panel-wrapper" style="position: relative; overflow: hidden; width: 100%;"><div class="scotch-panel-canvas" style="position: relative; height: 100%; width: 100%; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px); -webkit-backface-visibility: hidden; backface-visibility: hidden; -webkit-transition: all 300ms ease; transition: all 300ms ease;">

<span class="overlay"></span>

<nav class="main">
    <div class="container">
        <a href="http://laravel.com/" class="brand">
            <img src="../../public/laravel4-hello-72dpi.png" height="30">
            Laravel
        </a>

        <div class="responsive-sidebar-nav">
            <a href="http://laravel.com/docs/5.0#" class="toggle-slide menu-link btn">☰</a>
        </div>

        <div class="switcher">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    5.0
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://laravel.com/docs/master">Master</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="./Installation - Laravel - The PHP Framework For Web Artisans_files/Installation - Laravel - The PHP Framework For Web Artisans.html">5.0</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://laravel.com/docs/4.2">4.2</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://laravel.com/docs/4.1">4.1</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="http://laravel.com/docs/4.0">4.0</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="main-nav">
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
                    <li><a href="../errors">Errors &amp; Logging</a></li>
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
                    <li><a href="">نصب</a></li>
                    <li><a href="{{URL::to('laravel/configuration')}}">پیکربندی</a></li>
                    <li><a href="homestead">Homestead</a></li>
                </ul></li>
            <li>The Basics
                <ul>
                    <li><a href="routing">Routing</a></li>
                    <li><a href="middleware">Middleware</a></li>
                    <li><a href="controllers">Controllers</a></li>
                    <li><a href="requests">Requests</a></li>
                    <li><a href="responses">Responses</a></li>
                    <li><a href="views">Views</a></li>
                </ul></li>
            <li>Architecture Foundations
                <ul>
                    <li><a href="providers">Service Providers</a></li>
                    <li><a href="container">Service Container</a></li>
                    <li><a href="contracts">Contracts</a></li>
                    <li><a href="facades">Facades</a></li>
                    <li><a href="lifecycle">Request Lifecycle</a></li>
                    <li><a href="structure">Application Structure</a></li>
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
                    <li><a href="../errors">Errors &amp; Logging</a></li>
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
                    <li><a href="templates">Templates</a></li>
                    <li><a href="testing">Unit Testing</a></li>
                    <li><a href="validation">Validation</a></li>
                </ul></li>
            <li>Database
                <ul>
                    <li><a href="database">Basic Usage</a></li>
                    <li><a href="queries">Query Builder</a></li>
                    <li><a href="eloquent">Eloquent ORM</a></li>
                    <li><a href="schema">Schema Builder</a></li>
                    <li><a href="migrations">Migrations &amp; Seeding</a></li>
                    <li><a href="redis">Redis</a></li>
                </ul></li>
            <li>Artisan CLI
                <ul>
                    <li><a href="artisan">Overview</a></li>
                    <li><a href="commands">Development</a></li>
                </ul></li>
        </ul>
    </section>

    <article>
        <h1>Templates</h1>
        <ul>
            <li><a href="http://laravel.com/docs/5.0/templates#blade-templating">Blade Templating</a></li>
            <li><a href="http://laravel.com/docs/5.0/templates#other-blade-control-structures">Other Blade Control Structures</a></li>
        </ul>
        <p><a name="blade-templating"></a></p>
        <h2><a href="http://laravel.com/docs/5.0/templates#blade-templating">Blade Templating</a></h2>
        <p>Blade is a simple, yet powerful templating engine provided with Laravel. Unlike controller layouts, Blade is driven by <em>template inheritance</em> and <em>sections</em>. All Blade templates should use the <code class=" language-php"><span class="token punctuation">.</span>blade<span class="token punctuation">.</span>php</code> extension.</p>
        <p dir="rtl">Blade  ابزار قالب سازی ساده در عین حال قدرتمند که توسط لاراول تهیه شده است.بر خلاف طرح بندی کنترلر ها blade بدست امده است از ارث بری قالب ها وقسمت ها.همه فالب های blade بایستی از پسوند blade.php  استفاده کنند.</p>
        <h4>Defining A Blade Layout</h4>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token comment" spellcheck="true">&lt;!-- Stored in resources/views/layouts/master.blade.php --&gt;</span></span>

        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>html</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>head</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>title</span><span class="token punctuation">&gt;</span></span></span>App Name <span class="token operator">-</span> @<span class="token keyword">yield</span><span class="token punctuation">(</span><span class="token string">'title'</span><span class="token punctuation">)</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>title</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>head</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>body</span><span class="token punctuation">&gt;</span></span></span>
        @<span class="token function">section<span class="token punctuation">(</span></span><span class="token string">'sidebar'</span><span class="token punctuation">)</span>
        This is the master sidebar<span class="token punctuation">.</span>
        @show

        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>container<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
        @<span class="token keyword">yield</span><span class="token punctuation">(</span><span class="token string">'content'</span><span class="token punctuation">)</span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>body</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>html</span><span class="token punctuation">&gt;</span></span></span></code></pre>
        <h4>Using A Blade Layout</h4>
<pre class=" language-php"><code class=" language-php">@<span class="token keyword">extends</span><span class="token punctuation">(</span><span class="token string">'layouts.master'</span><span class="token punctuation">)</span>

        @<span class="token function">section<span class="token punctuation">(</span></span><span class="token string">'title'</span><span class="token punctuation">,</span> <span class="token string">'Page Title'</span><span class="token punctuation">)</span>

        @<span class="token function">section<span class="token punctuation">(</span></span><span class="token string">'sidebar'</span><span class="token punctuation">)</span>
        @<span class="token keyword">parent</span>

        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span>This is appended to the master sidebar<span class="token punctuation">.</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>
        @stop

        @<span class="token function">section<span class="token punctuation">(</span></span><span class="token string">'content'</span><span class="token punctuation">)</span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span>This is my body content<span class="token punctuation">.</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>
        @stop</code></pre>
        <p>Note that views which <code class=" language-php">extend</code> a Blade layout simply override sections from the layout. Content of the layout can be included in a child view using the <code class=" language-php">@<span class="token keyword">parent</span></code> directive in a section, allowing you to append to the contents of a layout section such as a sidebar or footer.</p>
        <p dir="rtl">بخاطر داشته باشید که view  هایی که یک پوسته blade  را گسترش می دهند به راحتی section  ها را بازنویسی می کنند ودر صورتی که بخواهید محتوای والد در صفحات فرزند هم حضور داشته باشد بایستی از @@parentاستفاده کنید </p>
        <p>Sometimes, such as when you are not sure if a section has been defined, you may wish to pass a default value to the <code class=" language-php">@<span class="token keyword">yield</span></code> directive. You may pass the default value as the second argument:</p>
        <p dir="rtl">بعضی وقت ها  از حمله وقت هایی که شما مطمئن نیستید که یک section راتعریف کرده اید  شما ممکن است بخواهید یک مقدار پیش فرض را دران قرار دهید .شما می توانید مقدار پیش فرض را به عنوان ورودی دوم در ان قرار دهید.</p>
        <pre class=" language-php"><code class=" language-php">@<span class="token keyword">yield</span><span class="token punctuation">(</span><span class="token string">'section'</span><span class="token punctuation">,</span> <span class="token string">'Default Content'</span><span class="token punctuation">)</span></code></pre>
        <p><a name="other-blade-control-structures"></a></p>
        <h2><a href="http://laravel.com/docs/5.0/templates#other-blade-control-structures">Other Blade Control Structures</a></h2>
        <h4>Echoing Data</h4>
<pre class=" language-php"><code class=" language-php">Hello<span class="token punctuation">,</span> <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$name</span> <span class="token punctuation">}</span><span class="token punctuation">}</span><span class="token punctuation">.</span>

        The current <span class="token constant">UNIX</span> timestamp is <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">time<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span><span class="token punctuation">.</span></code></pre>
        <h4>Echoing Data After Checking For Existence</h4>
        <p>Sometimes you may wish to echo a variable, but you aren't sure if the variable has been set. Basically, you want to do this:</p>
        <p dir="rtl"> بعضی وقت ها ممکن شما بخواهید یک متغییری را نمایش دهید  اما از وجود ان مطمئن نیستید  اساسا شما می خواهید که این کار را انجام دهید. </p>
        <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">isset<span class="token punctuation">(</span></span><span class="token variable">$name</span><span class="token punctuation">)</span> <span class="token operator">?</span> <span class="token variable">$name</span> <span class="token punctuation">:</span> <span class="token string">'Default'</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>
        <p>However, instead of writing a ternary statement, Blade allows you to use the following convenient short-cut:</p>
        <p dir="rtl">هر چند در عوض نوشتن این جمله سه گانه blade  اجازه استفاده از این عبارت را به شما می دهد.</p>
        <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$name</span> <span class="token keyword">or</span> <span class="token string">'Default'</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>
        <h4>Displaying Raw Text With Curly Braces</h4>
        <p>If you need to display a string that is wrapped in curly braces, you may escape the Blade behavior by prefixing your text with an <code class=" language-php">@</code> symbol:</p>
        <p dir="rtl">اگر شما نیاز به نمایش رشته ای دارید که در داخل براکد دوگانه قرار گرفته باشد  شما با گزاشتن کاراکتر@از در ابتدا از رفتار قالب های blade  رها می شوید.</p>
        <pre class=" language-php"><code class=" language-php">@<span class="token punctuation">{</span><span class="token punctuation">{</span> This will not be processed by Blade <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>
        <p>If you don't want the data to be escaped, you may use the following syntax:</p>
        <p dir="rtl">اگر شما دوست دارید که از نمایش داده رها بشید می توانید از این استفاده کنید.</p>
        <p dir="rtl"></p>
        <pre class=" language-php"><code class=" language-php">Hello<span class="token punctuation">,</span> <span class="token punctuation">{</span><span class="token operator">!</span><span class="token operator">!</span> <span class="token variable">$name</span> <span class="token operator">!</span><span class="token operator">!</span><span class="token punctuation">}</span><span class="token punctuation">.</span></code></pre>
        <blockquote>
            <p><strong>Note:</strong> Be very careful when echoing content that is supplied by users of your application. Always use the double curly brace syntax to escape any HTML entities in the content.</p>
            <p dir="rtl">وقتی داده های تهیه شده توسط کاربر را نمایش می دهید  خیلی مراقب باشید .همیشه از دو براکد استفاده کنید  تا از همه موجودیت های html   رها بشید.</p>
        </blockquote>
        <h4>If Statements</h4>
<pre class=" language-php"><code class=" language-php">@<span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token function">count<span class="token punctuation">(</span></span><span class="token variable">$records</span><span class="token punctuation">)</span> <span class="token operator">===</span> <span class="token number">1</span><span class="token punctuation">)</span>
        I have one record<span class="token operator">!</span>
        @<span class="token keyword">elseif</span> <span class="token punctuation">(</span><span class="token function">count<span class="token punctuation">(</span></span><span class="token variable">$records</span><span class="token punctuation">)</span> <span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">)</span>
        I have multiple records<span class="token operator">!</span>
        @<span class="token keyword">else</span>
        I don't have any records<span class="token operator">!</span>
        @<span class="token keyword">endif</span>

        @unless <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">check<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        You are not signed in<span class="token punctuation">.</span>
        @endunless</code></pre>
        <h4>Loops</h4>
<pre class=" language-php"><code class=" language-php">@<span class="token keyword">for</span> <span class="token punctuation">(</span><span class="token variable">$i</span> <span class="token operator">=</span> <span class="token number">0</span><span class="token punctuation">;</span> <span class="token variable">$i</span> <span class="token operator">&lt;</span> <span class="token number">10</span><span class="token punctuation">;</span> <span class="token variable">$i</span><span class="token operator">++</span><span class="token punctuation">)</span>
        The current value is <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$i</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>
        @<span class="token keyword">endfor</span>

        @<span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$users</span> <span class="token keyword">as</span> <span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span>This is user <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">id</span> <span class="token punctuation">}</span><span class="token punctuation">}</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>
        @<span class="token keyword">endforeach</span>

        @<span class="token function">forelse<span class="token punctuation">(</span></span><span class="token variable">$users</span> <span class="token keyword">as</span> <span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>li</span><span class="token punctuation">&gt;</span></span></span><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span> <span class="token punctuation">}</span><span class="token punctuation">}</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>li</span><span class="token punctuation">&gt;</span></span></span>
        @empty
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span>No users<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>
        @endforelse

        @<span class="token keyword">while</span> <span class="token punctuation">(</span><span class="token boolean">true</span><span class="token punctuation">)</span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span>I'm looping forever<span class="token punctuation">.</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>
        @<span class="token keyword">endwhile</span></code></pre>
        <h4>Including Sub-Views</h4>
        <pre class=" language-php"><code class=" language-php">@<span class="token keyword">include</span><span class="token punctuation">(</span><span class="token string">'view.name'</span><span class="token punctuation">)</span></code></pre>
        <p>You may also pass an array of data to the included view:</p>
        <p dir="rtl">ارسال یک ارایه ازداده ها  تا view  راشامل شود</p>
        <pre class=" language-php"><code class=" language-php">@<span class="token keyword">include</span><span class="token punctuation">(</span><span class="token string">'view.name'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'some'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'data'</span><span class="token punctuation">]</span><span class="token punctuation">)</span></code></pre>
        <h4>Overwriting Sections</h4>
        <p>To overwrite a section entirely, you may use the <code class=" language-php">overwrite</code> statement:</p>
        <p dir="rtl">برای بازنویسی کل بخش می توانید از جمله overwrite  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php">@<span class="token keyword">extends</span><span class="token punctuation">(</span><span class="token string">'list.item.container'</span><span class="token punctuation">)</span>

        @<span class="token function">section<span class="token punctuation">(</span></span><span class="token string">'list.item.content'</span><span class="token punctuation">)</span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span>This is an item of type <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$item</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">type</span> <span class="token punctuation">}</span><span class="token punctuation">}</span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>
        @overwrite</code></pre>
        <h4>Displaying Language Lines</h4>
<pre class=" language-php"><code class=" language-php">@<span class="token function">lang<span class="token punctuation">(</span></span><span class="token string">'language.line'</span><span class="token punctuation">)</span>

        @<span class="token function">choice<span class="token punctuation">(</span></span><span class="token string">'language.line'</span><span class="token punctuation">,</span> <span class="token number">1</span><span class="token punctuation">)</span></code></pre>
        <h4>Comments</h4>
        <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span><span class="token operator">--</span> This comment will not be in the rendered <span class="token constant">HTML</span> <span class="token operator">--</span><span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>
    </article>
</div>

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
    <p>Laravel is a trademark of Taylor Otwell. Copyright © Taylor Otwell.</p>
    <p class="less-significant"><a href="http://jackmcdade.com/">Design by Jack McDade</a></p>
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