<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Service Providers</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/providers#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/providers#basic-provider-example">Basic Provider Example</a></li>
        <li><a href="http://laravel.com/docs/5.0/providers#registering-providers">Registering Providers</a></li>
        <li><a href="http://laravel.com/docs/5.0/providers#deferred-providers">Deferred Providers</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/providers#introduction">Introduction</a></h2>
    <p>Service providers are the central place of all Laravel application bootstrapping. Your own application, as well as all of Laravel's core services are bootstrapped via service providers.</p>
    <p>But, what do we mean by "bootstrapped"? In general, we mean <strong>registering</strong> things, including registering service container bindings, event listeners, filters, and even routes. Service providers are the central place to configure your application.</p>
    <p>If you open the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> file included with Laravel, you will see a <code class=" language-php">providers</code> array. These are all of the service provider classes that will be loaded for your application. Of course, many of them are "deferred" providers, meaning they will not be loaded on every request, but only when the services they provide are actually needed.</p>
    <p>In this overview you will learn how to write your own service providers and register them with your Laravel application.</p>
    <p><a name="basic-provider-example"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/providers#basic-provider-example">Basic Provider Example</a></h2>
    <p>All service providers extend the <code class=" language-php">Illuminate\<span class="token package">Support<span class="token punctuation">\</span>ServiceProvider</span></code> class. This abstract class requires that you define at least one method on your provider: <code class=" language-php">register</code>. Within the <code class=" language-php">register</code> method, you should <strong>only bind things into the <a href="http://laravel.com/docs/5.0/container">service container</a></strong>. You should never attempt to register any event listeners, routes, or any other piece of functionality within the <code class=" language-php">register</code> method.</p>
    <p>The Artisan CLI can easily generate a new provider via the <code class=" language-php">make<span class="token punctuation">:</span>provider</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>provider RiakServiceProvider</code></pre>
    <h3>The Register Method</h3>
    <p>Now, let's take a look at a basic service provider:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Providers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Riak<span class="token punctuation">\</span>Connection</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>ServiceProvider</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">RiakServiceProvider</span> <span class="token keyword">extends</span> <span class="token class-name">ServiceProvider</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Register bindings in the container.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">register<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">singleton<span class="token punctuation">(</span></span><span class="token string">'Riak\Contracts\Connection'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">Connection</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">[</span><span class="token string">'config'</span><span class="token punctuation">]</span><span class="token punctuation">[</span><span class="token string">'riak'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>This service provider only defines a <code class=" language-php">register</code> method, and uses that method to define an implementation of <code class=" language-php">Riak\<span class="token package">Contracts<span class="token punctuation">\</span>Connection</span></code> in the service container. If you don't understand how the service container works, don't worry, <a href="http://laravel.com/docs/5.0/container">we'll cover that soon</a>.</p>
    <p>This class is namespaced under <code class=" language-php">App\<span class="token package">Providers</span></code> since that is the default location for service providers in Laravel. However, you are free to change this as you wish. Your service providers may be placed anywhere that Composer can autoload them.</p>
    <h3>The Boot Method</h3>
    <p>So, what if we need to register an event listener within our service provider? This should be done within the <code class=" language-php">boot</code> method. <strong>This method is called after all other service providers have been registered</strong>, meaning you have access to all other services that have been registered by the framework.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Providers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Event</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>ServiceProvider</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">EventServiceProvider</span> <span class="token keyword">extends</span> <span class="token class-name">ServiceProvider</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Perform post-registration booting of services.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token string">'SomeEvent'</span><span class="token punctuation">,</span> <span class="token string">'SomeEventHandler'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Register bindings in the container.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">register<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>We are able to type-hint dependencies for our <code class=" language-php">boot</code> method. The service container will automatically inject any dependencies you need:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Events<span class="token punctuation">\</span>Dispatcher</span><span class="token punctuation">;</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span>Dispatcher <span class="token variable">$events</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$events</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token string">'SomeEvent'</span><span class="token punctuation">,</span> <span class="token string">'SomeEventHandler'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p><a name="registering-providers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/providers#registering-providers">Registering Providers</a></h2>
    <p>All service providers are registered in the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file. This file contains a <code class=" language-php">providers</code> array where you can list the names of your service providers. By default, a set of Laravel core service providers are listed in this array. These providers bootstrap the core Laravel components, such as the mailer, queue, cache, and others.</p>
    <p>To register your provider, simply add it to the array:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'providers'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
   <span class="token comment" spellcheck="true"> // Other Service Providers
</span>
        <span class="token string">'App\Providers\AppServiceProvider'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span></code></pre>
    <p><a name="deferred-providers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/providers#deferred-providers">Deferred Providers</a></h2>
    <p>If your provider is <strong>only</strong> registering bindings in the <a href="http://laravel.com/docs/5.0/container">service container</a>, you may choose to defer its registration until one of the registered bindings is actually needed. Deferring the loading of such a provider will improve the performance of your application, since it is not loaded from the filesystem on every request.</p>
    <p>To defer the loading of a provider, set the <code class=" language-php">defer</code> property to <code class=" language-php"><span class="token boolean">true</span></code> and define a <code class=" language-php">provides</code> method. The <code class=" language-php">provides</code> method returns the service container bindings that the provider registers:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Providers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Riak<span class="token punctuation">\</span>Connection</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>ServiceProvider</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">RiakServiceProvider</span> <span class="token keyword">extends</span> <span class="token class-name">ServiceProvider</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$defer</span> <span class="token operator">=</span> <span class="token boolean">true</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Register the service provider.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">register<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">singleton<span class="token punctuation">(</span></span><span class="token string">'Riak\Contracts\Connection'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">Connection</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">[</span><span class="token string">'config'</span><span class="token punctuation">]</span><span class="token punctuation">[</span><span class="token string">'riak'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Get the services provided by the provider.
     *
     * @return array
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">provides<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token punctuation">[</span><span class="token string">'Riak\Contracts\Connection'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>Laravel compiles and stores a list of all of the services supplied by deferred service providers, along with the name of its service provider class. Then, only when you attempt to resolve one of these services does Laravel load the service provider.</p>
</article>
@stop