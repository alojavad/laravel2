<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Request Lifecycle</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/lifecycle#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/lifecycle#lifecycle-overview">Lifecycle Overview</a></li>
        <li><a href="http://laravel.com/docs/5.0/lifecycle#focus-on-service-providers">Focus On Service Providers</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/lifecycle#introduction">Introduction</a></h2>
    <p>When using any tool in the "real world", you feel more confident if you understand how that tool works. Application development is no different. When you understand how your development tools function, you feel more comfortable and confident using them.</p>
    <p>The goal of this document is to give you a good, high-level overview of how the Laravel framework "works". By getting to know the overall framework better, everything feels less "magical" and you will be more confident building your applications.</p>
    <p>If you don't understand all of the terms right away, don't lose heart! Just try to get a basic grasp of what is going on, and your knowledge will grow as you explore other sections of the documentation.</p>
    <p><a name="lifecycle-overview"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/lifecycle#lifecycle-overview">Lifecycle Overview</a></h2>
    <h4>First Things</h4>
    <p>The entry point for all requests to a Laravel application is the <code class=" language-php"><span class="token keyword">public</span><span class="token operator">/</span>index<span class="token punctuation">.</span>php</code> file. All requests are directed to this file by your web server (Apache / Nginx) configuration. The <code class=" language-php">index<span class="token punctuation">.</span>php</code> file doesn't contain much code. Rather, it is simply a starting point for loading the rest of the framework.</p>
    <p>The <code class=" language-php">index<span class="token punctuation">.</span>php</code> file loads the Composer generated autoloader definition, and then retrieves an instance of the Laravel application from <code class=" language-php">bootstrap<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> script. The first action taken by Laravel itself is to create an instance of the application / <a href="http://laravel.com/docs/5.0/container">service container</a>.</p>
    <h4>HTTP / Console Kernels</h4>
    <p>Next, the incoming request is sent to either the HTTP kernel or the console kernel, depending on the type of request that is entering the application. These two kernels serve as the central location that all requests flow through. For now, let's just focus on the HTTP kernel, which is located in <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Kernel<span class="token punctuation">.</span>php</code>.</p>
    <p>The HTTP kernel extends the <code class=" language-php">Illuminate\<span class="token package">Foundation<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Kernel</span></code> class, which defines an array of <code class=" language-php">bootstrappers</code> that will be run before the request is executed. These bootstrappers configure error handling, configure logging, detect the application environment, and perform other tasks that need to be done before the request is actually handled.</p>
    <p>The HTTP kernel also defines a list of HTTP <a href="http://laravel.com/docs/5.0/middleware">middleware</a> that all requests must pass through before being handled by the application. These middleware handle reading and writing the HTTP session, determine if the application is in maintenance mode, verifying the CSRF token, and more.</p>
    <p>The method signature for the HTTP kernel's <code class=" language-php">handle</code> method is quite simple: receive a <code class=" language-php">Request</code> and return a <code class=" language-php">Response</code>. Think of the Kernel as being a big black box that represents your entire application. Feed it HTTP requests and it will return HTTP responses.</p>
    <h4>Service Providers</h4>
    <p>One of the most important Kernel bootstrapping actions is loading the service providers for your application. All of the service providers for the application are configured in the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file's <code class=" language-php">providers</code> array. First, the <code class=" language-php">register</code> method will be called on all providers, then, once all providers have been registered, the <code class=" language-php">boot</code> method will be called.</p>
    <h4>Dispatch Request</h4>
    <p>Once the application has been bootstrapped and all service providers have been registered, the <code class=" language-php">Request</code> will be handed off to the router for dispatching. The router will dispatch the request to a route or controller, as well as run any route specific middleware.</p>
    <p><a name="focus-on-service-providers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/lifecycle#focus-on-service-providers">Focus On Service Providers</a></h2>
    <p>Service providers are truly the key to bootstrapping a Laravel application. The application instance is created, the service providers are registered, and the request is handed to the bootstrapped application. It's really that simple!</p>
    <p>Having a firm grasp of how a Laravel application is built and bootstrapped via service providers is very valuable. Of course, your application's default service providers are stored in the <code class=" language-php">app<span class="token operator">/</span>Providers</code> directory.</p>
    <p>By default, the <code class=" language-php">AppServiceProvider</code> is fairly empty. This provider is a great place to add your application's own bootstrapping and service container bindings. Of course, for large applications, you may wish to create several service providers, each with a more granular type of bootstrapping.</p>
</article>
@stop