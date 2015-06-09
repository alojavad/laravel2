<!-- -->
@extends('master')

@section('content')
<article>
<h1>Release Notes</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/releases#support-policy">Support Policy</a></li>
    <li><a href="http://laravel.com/docs/5.0/releases#laravel-5.0">Laravel 5.0</a></li>
    <li><a href="http://laravel.com/docs/5.0/releases#laravel-4.2">Laravel 4.2</a></li>
    <li><a href="http://laravel.com/docs/5.0/releases#laravel-4.1">Laravel 4.1</a></li>
</ul>
<p><a name="support-policy"></a></p>
<h2><a href="http://laravel.com/docs/5.0/releases#support-policy">Support Policy</a></h2>
<p>Security fixes are <strong>always</strong> applied to the previous major version of Laravel. Currently, <strong>all</strong> security fixes and patches will be applied to both Laravel 5.x <strong>and</strong> Laravel 4.x.</p>
<p>When feasible, security fixes will also be applied to even older releases of the framework, such as Laravel 3.x.</p>
<p><a name="laravel-5.0"></a></p>
<h2><a href="http://laravel.com/docs/5.0/releases#laravel-5.0">Laravel 5.0</a></h2>
<p>Laravel 5.0 introduces a fresh application structure to the default Laravel project. This new structure serves as a better foundation for building robust application in Laravel, as well as embraces new auto-loading standards (PSR-4) throughout the application. First, let's examine some of the major changes:</p>
<h3>New Folder Structure</h3>
<p>The old <code class=" language-php">app<span class="token operator">/</span>models</code> directory has been entirely removed. Instead, all of your code lives directly within the <code class=" language-php">app</code> folder, and, by default, is organized to the <code class=" language-php">App</code> namespace. This default namespace can be quickly changed using the new <code class=" language-php">app<span class="token punctuation">:</span>name</code> Artisan command.</p>
<p>Controllers, middleware, and requests (a new type of class in Laravel 5.0) are now grouped under the <code class=" language-php">app<span class="token operator">/</span>Http</code> directory, as they are all classes related to the HTTP transport layer of your application. Instead of a single, flat file of route filters, all middleware are now broken into their own class files.</p>
<p>A new <code class=" language-php">app<span class="token operator">/</span>Providers</code> directory replaces the <code class=" language-php">app<span class="token operator">/</span>start</code> files from previous versions of Laravel 4.x. These service providers provide various bootstrapping functions to your application, such as error handling, logging, route loading, and more. Of course, you are free to create additional service providers for your application.</p>
<p>Application language files and views have been moved to the <code class=" language-php">resources</code> directory.</p>
<h3>Contracts</h3>
<p>All major Laravel components implement interfaces which are located in the <code class=" language-php">illuminate<span class="token operator">/</span>contracts</code> repository. This repository has no external dependencies. Having a convenient, centrally located set of interfaces you may use for decoupling and dependency injection will serve as an easy alternative option to Laravel Facades.</p>
<p>For more information on contracts, consult the <a href="http://laravel.com/docs/5.0/contracts">full documentation</a>.</p>
<h3>Route Cache</h3>
<p>If your application is made up entirely of controller routes, you may utilize the new <code class=" language-php">route<span class="token punctuation">:</span>cache</code> Artisan command to drastically speed up the registration of your routes. This is primarily useful on applications with 100+ routes and will <strong>drastically</strong> speed up this portion of your application.</p>
<h3>Route Middleware</h3>
<p>In addition to Laravel 4 style route "filters", Laravel 5 now supports HTTP middleware, and the included authentication and CSRF "filters" have been converted to middleware. Middleware provides a single, consistent interface to replace all types of filters, allowing you to easily inspect, and even reject, requests before they enter your application.</p>
<p>For more information on middleware, check out <a href="http://laravel.com/docs/5.0/middleware">the documentation</a>.</p>
<h3>Controller Method Injection</h3>
<p>In addition to the existing constructor injection, you may now type-hint dependencies on controller methods. The <a href="http://laravel.com/docs/5.0/container">service container</a> will automatically inject the dependencies, even if the route contains other parameters:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">createPost<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">,</span> PostRepository <span class="token variable">$posts</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h3>Authentication Scaffolding</h3>
<p>User registration, authentication, and password reset controllers are now included out of the box, as well as simple corresponding views, which are located at <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>auth</code>. In addition, a "users" table migration has been included with the framework. Including these simple resources allows rapid development of application ideas without bogging down on authentication boilerplate. The authentication views may be accessed on the <code class=" language-php">auth<span class="token operator">/</span>login</code> and <code class=" language-php">auth<span class="token operator">/</span>register</code> routes. The <code class=" language-php">App\<span class="token package">Services<span class="token punctuation">\</span>Auth<span class="token punctuation">\</span>Registrar</span></code> service is responsible for user validation and creation.</p>
<h3>Event Objects</h3>
<p>You may now define events as objects instead of simply using strings. For example, check out the following event:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">PodcastWasPurchased</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token variable">$podcast</span><span class="token punctuation">;</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>Podcast <span class="token variable">$podcast</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">podcast</span> <span class="token operator">=</span> <span class="token variable">$podcast</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The event may be dispatched like normal:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">fire<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">PodcastWasPurchased</span><span class="token punctuation">(</span><span class="token variable">$podcast</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, your event handler will receive the event object instead of a list of data:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">ReportPodcastPurchase</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>PodcastWasPurchased <span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>For more information on working with events, check out the <a href="http://laravel.com/docs/5.0/events">full documentation</a>.</p>
<h3>Commands / Queueing</h3>
<p>In addition to the queue job format supported in Laravel 4, Laravel 5 allows you to represent your queued jobs as simple command objects. These commands live in the <code class=" language-php">app<span class="token operator">/</span>Commands</code> directory. Here's a sample command:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">PurchasePodcast</span> <span class="token keyword">extends</span> <span class="token class-name">Command</span> <span class="token keyword">implements</span> <span class="token class-name">SelfHandling</span><span class="token punctuation">,</span> ShouldBeQueued <span class="token punctuation">{</span>

        <span class="token keyword">use</span> <span class="token package">SerializesModels</span><span class="token punctuation">;</span>

        <span class="token keyword">protected</span> <span class="token variable">$user</span><span class="token punctuation">,</span> <span class="token variable">$podcast</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new command instance.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>User <span class="token variable">$user</span><span class="token punctuation">,</span> Podcast <span class="token variable">$podcast</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">user</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">;</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">podcast</span> <span class="token operator">=</span> <span class="token variable">$podcast</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Execute the command.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Handle the logic to purchase the podcast...
</span>
        <span class="token function">event<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">PodcastWasPurchased</span><span class="token punctuation">(</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">user</span><span class="token punctuation">,</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">podcast</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The base Laravel controller utilizes the new <code class=" language-php">DispatchesCommands</code> trait, allowing you to easily dispatch your commands for execution:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatch<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">PurchasePodcastCommand</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">,</span> <span class="token variable">$podcast</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, you may also use commands for tasks that are executed synchronously (are not queued). In fact, using commands is a great way to encapsulate complex tasks your application needs to perform. For more information, check out the <a href="http://laravel.com/docs/5.0/bus">command bus</a> documentation.</p>
<h3>Database Queue</h3>
<p>A <code class=" language-php">database</code> queue driver is now included in Laravel, providing a simple, local queue driver that requires no extra package installation beyond your database software.</p>
<h3>Laravel Scheduler</h3>
<p>In the past, developers have generated a Cron entry for each console command they wished to schedule. However, this is a headache. Your console schedule is no longer in source control, and you must SSH into your server to add the Cron entries. Let's make our lives easier. The Laravel command scheduler allows you to fluently and expressively define your command schedule within Laravel itself, and only a single Cron entry is needed on your server.</p>
<p>It looks like this:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$schedule</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">command<span class="token punctuation">(</span></span><span class="token string">'artisan:command'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dailyAt<span class="token punctuation">(</span></span><span class="token string">'15:00'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, check out the <a href="http://laravel.com/docs/5.0/artisan#scheduling-artisan-commands">full documentation</a> to learn all about the scheduler!</p>
<h3>Tinker / Psysh</h3>
<p>The <code class=" language-php">php artisan tinker</code> command now utilizes <a href="https://github.com/bobthecow/psysh">Psysh</a> by Justin Hileman, a more robust REPL for PHP. If you liked Boris in Laravel 4, you're going to love Psysh. Even better, it works on Windows! To get started, just try:</p>
<pre class=" language-php"><code class=" language-php">php artisan tinker</code></pre>
<h3>DotEnv</h3>
<p>Instead of a variety of confusing, nested environment configuration directories, Laravel 5 now utilizes <a href="https://github.com/vlucas/phpdotenv">DotEnv</a> by Vance Lucas. This library provides a super simple way to manage your environment configuration, and makes environment detection in Laravel 5 a breeze. For more details, check out the full <a href="http://laravel.com/docs/5.0/configuration#environment-configuration">configuration documentation</a>.</p>
<h3>Laravel Elixir</h3>
<p>Laravel Elixir, by Jeffrey Way, provides a fluent, expressive interface to compiling and concatenating your assets. If you've ever been intimidated by learning Grunt or Gulp, fear no more. Elixir makes it a cinch to get started using Gulp to compile your Less, Sass, and CoffeeScript. It can even run your tests for you!</p>
<p>For more information on Elixir, check out the <a href="http://laravel.com/docs/5.0/elixir">full documentation</a>.</p>
<h3>Laravel Socialite</h3>
<p>Laravel Socialite is an optional, Laravel 5.0+ compatible package that provides totally painless authentication with OAuth providers. Currently, Socialite supports Facebook, Twitter, Google, and GitHub. Here's what it looks like:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">redirectForAuth<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">Socialize<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'twitter'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getUserFromProvider<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">Socialize<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'twitter'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>No more spending hours writing OAuth authentication flows. Get started in minutes! The <a href="http://laravel.com/docs/5.0/authentication#social-authentication">full documentation</a> has all the details.</p>
<h3>Flysystem Integration</h3>
<p>Laravel now includes the powerful <a href="https://github.com/thephpleague/flysystem">Flysystem</a> filesystem abstraction library, providing pain free integration with local, Amazon S3, and Rackspace cloud storage - all with one, unified and elegant API! Storing a file in Amazon S3 is now as simple as:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">put<span class="token punctuation">(</span></span><span class="token string">'file.txt'</span><span class="token punctuation">,</span> <span class="token string">'contents'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>For more information on the Laravel Flysystem integration, consult the <a href="http://laravel.com/docs/5.0/filesystem">full documentation</a>.</p>
<h3>Form Requests</h3>
<p>Laravel 5.0 introduces <strong>form requests</strong>, which extend the <code class=" language-php">Illuminate\<span class="token package">Foundation<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>FormRequest</span></code> class. These request objects can be combined with controller method injection to provide a boiler-plate free method of validating user input. Let's dig in and look at a sample <code class=" language-php">FormRequest</code>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Requests</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">RegisterRequest</span> <span class="token keyword">extends</span> <span class="token class-name">FormRequest</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">rules<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token punctuation">[</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|email|unique:users'</span><span class="token punctuation">,</span>
        <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|confirmed|min:8'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">authorize<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token boolean">true</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Once the class has been defined, we can type-hint it on our controller action:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">register<span class="token punctuation">(</span></span>RegisterRequest <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token function">var_dump<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">input<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>When the Laravel service container identifies that the class it is injecting is a <code class=" language-php">FormRequest</code> instance, the request will <strong>automatically be validated</strong>. This means that if your controller action is called, you can safely assume the HTTP request input has been validated according to the rules you specified in your form request class. Even more, if the request is invalid, an HTTP redirect, which you may customize, will automatically be issued, and the error messages will be either flashed to the session or converted to JSON. <strong>Form validation has never been more simple.</strong> For more information on <code class=" language-php">FormRequest</code> validation, check out the <a href="http://laravel.com/docs/5.0/validation#form-request-validation">documentation</a>.</p>
<h3>Simple Controller Request Validation</h3>
<p>The Laravel 5 base controller now includes a <code class=" language-php">ValidatesRequests</code> trait. This trait provides a simple <code class=" language-php">validate</code> method to validate incoming requests. If <code class=" language-php">FormRequests</code> are a little too much for your application, check this out:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">createPost<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">validate<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'title'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|max:255'</span><span class="token punctuation">,</span>
        <span class="token string">'body'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>If the validation fails, an exception will be thrown and the proper HTTP response will automatically be sent back to the browser. The validation errors will even be flashed to the session! If the request was an AJAX request, Laravel even takes care of sending a JSON representation of the validation errors back to you.</p>
<p>For more information on this new method, check out <a href="http://laravel.com/docs/5.0/validation#controller-validation">the documentation</a>.</p>
<h3>New Generators</h3>
<p>To complement the new default application structure, new Artisan generator commands have been added to the framework. See <code class=" language-php">php artisan list</code> for more details.</p>
<h3>Configuration Cache</h3>
<p>You may now cache all of your configuration in a single file using the <code class=" language-php">config<span class="token punctuation">:</span>cache</code> command.</p>
<h3>Symfony VarDumper</h3>
<p>The popular <code class=" language-php">dd</code> helper function, which dumps variable debug information, has been upgraded to use the amazing Symfony VarDumper. This provides color-coded output and even collapsing of arrays. Just try the following in your project:</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">dd<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="laravel-4.2"></a></p>
<h2><a href="http://laravel.com/docs/5.0/releases#laravel-4.2">Laravel 4.2</a></h2>
<p>The full change list for this release by running the <code class=" language-php">php artisan changes</code> command from a 4.2 installation, or by <a href="https://github.com/laravel/framework/blob/4.2/src/Illuminate/Foundation/changes.json">viewing the change file on Github</a>. These notes only cover the major enhancements and changes for the release.</p>
<blockquote>
    <p><strong>Note:</strong> During the 4.2 release cycle, many small bug fixes and enhancements were incorporated into the various Laravel 4.1 point releases. So, be sure to check the change list for Laravel 4.1 as well!</p>
</blockquote>
<h3>PHP 5.4 Requirement</h3>
<p>Laravel 4.2 requires PHP 5.4 or greater. This upgraded PHP requirement allows us to use new PHP features such as traits to provide more expressive interfaces for tools like <a href="http://laravel.com/docs/billing">Laravel Cashier</a>. PHP 5.4 also brings significant speed and performance improvements over PHP 5.3.</p>
<h3>Laravel Forge</h3>
<p>Laravel Forge, a new web based application, provides a simple way to create and manage PHP servers on the cloud of your choice, including Linode, DigitalOcean, Rackspace, and Amazon EC2. Supporting automated Nginx configuration, SSH key access, Cron job automation, server monitoring via NewRelic &amp; Papertrail, "Push To Deploy", Laravel queue worker configuration, and more, Forge provides the simplest and most affordable way to launch all of your Laravel applications.</p>
<p>The default Laravel 4.2 installation's <code class=" language-php">app<span class="token operator">/</span>config<span class="token operator">/</span>database<span class="token punctuation">.</span>php</code> configuration file is now configured for Forge usage by default, allowing for more convenient deployment of fresh applications onto the platform.</p>
<p>More information about Laravel Forge can be found on the <a href="https://forge.laravel.com/">official Forge website</a>.</p>
<h3>Laravel Homestead</h3>
<p>Laravel Homestead is an official Vagrant environment for developing robust Laravel and PHP applications. The vast majority of the boxes' provisioning needs are handled before the box is packaged for distribution, allowing the box to boot extremely quickly. Homestead includes Nginx 1.6, PHP 5.6, MySQL, Postgres, Redis, Memcached, Beanstalk, Node, Gulp, Grunt, &amp; Bower. Homestead includes a simple <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> configuration file for managing multiple Laravel applications on a single box.</p>
<p>The default Laravel 4.2 installation now includes an <code class=" language-php">app<span class="token operator">/</span>config<span class="token operator">/</span>local<span class="token operator">/</span>database<span class="token punctuation">.</span>php</code> configuration file that is configured to use the Homestead database out of the box, making Laravel initial installation and configuration more convenient.</p>
<p>The official documentation has also been updated to include <a href="http://laravel.com/docs/homestead">Homestead documentation</a>.</p>
<h3>Laravel Cashier</h3>
<p>Laravel Cashier is a simple, expressive library for managing subscription billing with Stripe. With the introduction of Laravel 4.2, we are including Cashier documentation along with the main Laravel documentation, though installation of the component itself is still optional. This release of Cashier brings numerous bug fixes, multi-currency support, and compatibility with the latest Stripe API.</p>
<h3>Daemon Queue Workers</h3>
<p>The Artisan <code class=" language-php">queue<span class="token punctuation">:</span>work</code> command now supports a <code class=" language-php"><span class="token operator">--</span>daemon</code> option to start a worker in "daemon mode", meaning the worker will continue to process jobs without ever re-booting the framework. This results in a significant reduction in CPU usage at the cost of a slightly more complex application deployment process.</p>
<p>More information about daemon queue workers can be found in the <a href="http://laravel.com/docs/queues#daemon-queue-worker">queue documentation</a>.</p>
<h3>Mail API Drivers</h3>
<p>Laravel 4.2 introduces new Mailgun and Mandrill API drivers for the <code class=" language-php">Mail</code> functions. For many applications, this provides a faster and more reliable method of sending e-mails than the SMTP options. The new drivers utilize the Guzzle 4 HTTP library.</p>
<h3>Soft Deleting Traits</h3>
<p>A much cleaner architecture for "soft deletes" and other "global scopes" has been introduced via PHP 5.4 traits. This new architecture allows for the easier construction of similar global traits, and a cleaner separation of concerns within the framework itself.</p>
<p>More information on the new <code class=" language-php">SoftDeletingTrait</code> may be found in the <a href="http://laravel.com/docs/eloquent#soft-deleting">Eloquent documentation</a>.</p>
<h3>Convenient Auth &amp; Remindable Traits</h3>
<p>The default Laravel 4.2 installation now uses simple traits for including the needed properties for the authentication and password reminder user interfaces. This provides a much cleaner default <code class=" language-php">User</code> model file out of the box.</p>
<h3>"Simple Paginate"</h3>
<p>A new <code class=" language-php">simplePaginate</code> method was added to the query and Eloquent builder which allows for more efficient queries when using simple "Next" and "Previous" links in your pagination view.</p>
<h3>Migration Confirmation</h3>
<p>In production, destructive migration operations will now ask for confirmation. Commands may be forced to run without any prompts using the <code class=" language-php"><span class="token operator">--</span>force</code> command.</p>
<p><a name="laravel-4.1"></a></p>
<h2><a href="http://laravel.com/docs/5.0/releases#laravel-4.1">Laravel 4.1</a></h2>
<h3>Full Change List</h3>
<p>The full change list for this release by running the <code class=" language-php">php artisan changes</code> command from a 4.1 installation, or by <a href="https://github.com/laravel/framework/blob/4.1/src/Illuminate/Foundation/changes.json">viewing the change file on Github</a>. These notes only cover the major enhancements and changes for the release.</p>
<h3>New SSH Component</h3>
<p>An entirely new <code class=" language-php"><span class="token constant">SSH</span></code> component has been introduced with this release. This feature allows you to easily SSH into remote servers and run commands. To learn more, consult the <a href="http://laravel.com/docs/ssh">SSH component documentation</a>.</p>
<p>The new <code class=" language-php">php artisan tail</code> command utilizes the new SSH component. For more information, consult the <code class=" language-php">tail</code> <a href="http://laravel.com/docs/ssh#tailing-remote-logs">command documentation</a>.</p>
<h3>Boris In Tinker</h3>
<p>The <code class=" language-php">php artisan tinker</code> command now utilizes the <a href="https://github.com/d11wtq/boris">Boris REPL</a> if your system supports it. The <code class=" language-php">readline</code> and <code class=" language-php">pcntl</code> PHP extensions must be installed to use this feature. If you do not have these extensions, the shell from 4.0 will be used.</p>
<h3>Eloquent Improvements</h3>
<p>A new <code class=" language-php">hasManyThrough</code> relationship has been added to Eloquent. To learn how to use it, consult the <a href="http://laravel.com/docs/eloquent#has-many-through">Eloquent documentation</a>.</p>
<p>A new <code class=" language-php">whereHas</code> method has also been introduced to allow <a href="http://laravel.com/docs/eloquent#querying-relations">retrieving models based on relationship constraints</a>.</p>
<h3>Database Read / Write Connections</h3>
<p>Automatic handling of separate read / write connections is now available throughout the database layer, including the query builder and Eloquent. For more information, consult <a href="http://laravel.com/docs/database#read-write-connections">the documentation</a>.</p>
<h3>Queue Priority</h3>
<p>Queue priorities are now supported by passing a comma-delimited list to the <code class=" language-php">queue<span class="token punctuation">:</span>listen</code> command.</p>
<h3>Failed Queue Job Handling</h3>
<p>The queue facilities now include automatic handling of failed jobs when using the new <code class=" language-php"><span class="token operator">--</span>tries</code> switch on <code class=" language-php">queue<span class="token punctuation">:</span>listen</code>. More information on handling failed jobs can be found in the <a href="http://laravel.com/docs/queues#failed-jobs">queue documentation</a>.</p>
<h3>Cache Tags</h3>
<p>Cache "sections" have been superseded by "tags". Cache tags allow you to assign multiple "tags" to a cache item, and flush all items assigned to a single tag. More information on using cache tags may be found in the <a href="http://laravel.com/docs/cache#cache-tags">cache documentation</a>.</p>
<h3>Flexible Password Reminders</h3>
<p>The password reminder engine has been changed to provide greater developer flexibility when validating passwords, flashing status messages to the session, etc. For more information on using the enhanced password reminder engine, <a href="http://laravel.com/docs/security#password-reminders-and-reset">consult the documentation</a>.</p>
<h3>Improved Routing Engine</h3>
<p>Laravel 4.1 features a totally re-written routing layer. The API is the same; however, registering routes is a full 100% faster compared to 4.0. The entire engine has been greatly simplified, and the dependency on Symfony Routing has been minimized to the compiling of route expressions.</p>
<h3>Improved Session Engine</h3>
<p>With this release, we're also introducing an entirely new session engine. Similar to the routing improvements, the new session layer is leaner and faster. We are no longer using Symfony's (and therefore PHP's) session handling facilities, and are using a custom solution that is simpler and easier to maintain.</p>
<h3>Doctrine DBAL</h3>
<p>If you are using the <code class=" language-php">renameColumn</code> function in your migrations, you will need to add the <code class=" language-php">doctrine<span class="token operator">/</span>dbal</code> dependency to your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file. This package is no longer included in Laravel by default.</p>
</article>
@stop