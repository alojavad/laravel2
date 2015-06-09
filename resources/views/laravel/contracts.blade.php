<!-- -->
@extends('master')

@section('content')
<article>
<h1>Contracts</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/contracts#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/contracts#why-contracts">Why Contracts?</a></li>
    <li><a href="http://laravel.com/docs/5.0/contracts#contract-reference">Contract Reference</a></li>
    <li><a href="http://laravel.com/docs/5.0/contracts#how-to-use-contracts">How To Use Contracts</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/contracts#introduction">Introduction</a></h2>
<p>Laravel's Contracts are a set of interfaces that define the core services provided by the framework. For example, a <code class=" language-php">Queue</code> contract defines the methods needed for queueing jobs, while the <code class=" language-php">Mailer</code> contract defines the methods needed for sending e-mail.</p>
<p>Each contract has a corresponding implementation provided by the framework. For example, Laravel provides a <code class=" language-php">Queue</code> implementation with a variety of drivers, and a <code class=" language-php">Mailer</code> implementation that is powered by <a href="http://swiftmailer.org/">SwiftMailer</a>.</p>
<p>All of the Laravel contracts live in <a href="https://github.com/illuminate/contracts">their own GitHub repository</a>. This provides a quick reference point for all available contracts, as well as a single, decoupled package that may be utilized by other package developers.</p>
<p><a name="why-contracts"></a></p>
<h2><a href="http://laravel.com/docs/5.0/contracts#why-contracts">Why Contracts?</a></h2>
<p>You may have several questions regarding contracts. Why use interfaces at all? Isn't using interfaces more complicated?</p>
<p>Let's distill the reasons for using interfaces to the following headings: loose coupling and simplicity.</p>
<h3>Loose Coupling</h3>
<p>First, let's review some code that is tightly coupled to a cache implementation. Consider the following:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Orders</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">Repository</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The cache.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$cache</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new repository instance.
     *
     * @param  \SomePackage\Cache\Memcached  $cache
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>\<span class="token package">SomePackage<span class="token punctuation">\</span>Cache<span class="token punctuation">\</span>Memcached</span> <span class="token variable">$cache</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">cache</span> <span class="token operator">=</span> <span class="token variable">$cache</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Retrieve an Order by ID.
     *
     * @param  int  $id
     * @return Order
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">find<span class="token punctuation">(</span></span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">cache</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">has<span class="token punctuation">(</span></span><span class="token variable">$id</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
           <span class="token comment" spellcheck="true"> //
</span>        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>In this class, the code is tightly coupled to a given cache implementation. It is tightly coupled because we are depending on a concrete Cache class from a package vendor. If the API of that package changes our code must change as well.</p>
<p>Likewise, if we want to replace our underlying cache technology (Memcached) with another technology (Redis), we again will have to modify our repository. Our repository should not have so much knowledge regarding who is providing them data or how they are providing it.</p>
<p><strong>Instead of this approach, we can improve our code by depending on a simple, vendor agnostic interface:</strong></p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Orders</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Cache<span class="token punctuation">\</span>Repository</span> <span class="token keyword">as</span> Cache<span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">Repository</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new repository instance.
     *
     * @param  Cache  $cache
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>Cache <span class="token variable">$cache</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">cache</span> <span class="token operator">=</span> <span class="token variable">$cache</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Now the code is not coupled to any specific vendor, or even Laravel. Since the contracts package contains no implementation and no dependencies, you may easily write an alternative implementation of any given contract, allowing you to replace your cache implementation without modifying any of your cache consuming code.</p>
<h3>Simplicity</h3>
<p>When all of Laravel's services are neatly defined within simple interfaces, it is very easy to determine the functionality offered by a given service. <strong>The contracts serve as succinct documentation to the framework's features.</strong></p>
<p>In addition, when you depend on simple interfaces, your code is easier to understand and maintain. Rather than tracking down which methods are available to you within a large, complicated class, you can refer to a simple, clean interface.</p>
<p><a name="contract-reference"></a></p>
<h2><a href="http://laravel.com/docs/5.0/contracts#contract-reference">Contract Reference</a></h2>
<p>This is a reference to most Laravel Contracts, as well as their Laravel "facade" counterparts:</p>
<table>
    <thead>
    <tr>
        <th>Contract</th>
        <th>Laravel 4.x Facade</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Auth/Guard.php">Illuminate\Contracts\Auth\Guard</a></td>
        <td>Auth</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Auth/PasswordBroker.php">Illuminate\Contracts\Auth\PasswordBroker</a></td>
        <td>Password</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Bus/Dispatcher.php">Illuminate\Contracts\Bus\Dispatcher</a></td>
        <td>Bus</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Cache/Repository.php">Illuminate\Contracts\Cache\Repository</a></td>
        <td>Cache</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Cache/Factory.php">Illuminate\Contracts\Cache\Factory</a></td>
        <td>Cache::driver()</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Config/Repository.php">Illuminate\Contracts\Config\Repository</a></td>
        <td>Config</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Container/Container.php">Illuminate\Contracts\Container\Container</a></td>
        <td>App</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Cookie/Factory.php">Illuminate\Contracts\Cookie\Factory</a></td>
        <td>Cookie</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Cookie/QueueingFactory.php">Illuminate\Contracts\Cookie\QueueingFactory</a></td>
        <td>Cookie::queue()</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Encryption/Encrypter.php">Illuminate\Contracts\Encryption\Encrypter</a></td>
        <td>Crypt</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Events/Dispatcher.php">Illuminate\Contracts\Events\Dispatcher</a></td>
        <td>Event</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Filesystem/Cloud.php">Illuminate\Contracts\Filesystem\Cloud</a></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Filesystem/Factory.php">Illuminate\Contracts\Filesystem\Factory</a></td>
        <td>File</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Filesystem/Filesystem.php">Illuminate\Contracts\Filesystem\Filesystem</a></td>
        <td>File</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Foundation/Application.php">Illuminate\Contracts\Foundation\Application</a></td>
        <td>App</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Hashing/Hasher.php">Illuminate\Contracts\Hashing\Hasher</a></td>
        <td>Hash</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Logging/Log.php">Illuminate\Contracts\Logging\Log</a></td>
        <td>Log</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Mail/MailQueue.php">Illuminate\Contracts\Mail\MailQueue</a></td>
        <td>Mail::queue()</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Mail/Mailer.php">Illuminate\Contracts\Mail\Mailer</a></td>
        <td>Mail</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Queue/Factory.php">Illuminate\Contracts\Queue\Factory</a></td>
        <td>Queue::driver()</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Queue/Queue.php">Illuminate\Contracts\Queue\Queue</a></td>
        <td>Queue</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Redis/Database.php">Illuminate\Contracts\Redis\Database</a></td>
        <td>Redis</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Routing/Registrar.php">Illuminate\Contracts\Routing\Registrar</a></td>
        <td>Route</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Routing/ResponseFactory.php">Illuminate\Contracts\Routing\ResponseFactory</a></td>
        <td>Response</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Routing/UrlGenerator.php">Illuminate\Contracts\Routing\UrlGenerator</a></td>
        <td>URL</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Support/Arrayable.php">Illuminate\Contracts\Support\Arrayable</a></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Support/Jsonable.php">Illuminate\Contracts\Support\Jsonable</a></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Support/Renderable.php">Illuminate\Contracts\Support\Renderable</a></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Validation/Factory.php">Illuminate\Contracts\Validation\Factory</a></td>
        <td>Validator::make()</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/Validation/Validator.php">Illuminate\Contracts\Validation\Validator</a></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/View/Factory.php">Illuminate\Contracts\View\Factory</a></td>
        <td>View::make()</td>
    </tr>
    <tr>
        <td><a href="https://github.com/illuminate/contracts/blob/master/View/View.php">Illuminate\Contracts\View\View</a></td>
        <td>&nbsp;</td>
    </tr>
    </tbody>
</table>
<p><a name="how-to-use-contracts"></a></p>
<h2><a href="http://laravel.com/docs/5.0/contracts#how-to-use-contracts">How To Use Contracts</a></h2>
<p>So, how do you get an implementation of a contract? It's actually quite simple. Many types of classes in Laravel are resolved through the <a href="http://laravel.com/docs/5.0/container">service container</a>, including controllers, event listeners, filters, queue jobs, and even route Closures. So, to get an implementation of a contract, you can just "type-hint" the interface in the constructor of the class being resolved. For example, take a look at this event handler:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Handlers<span class="token punctuation">\</span>Events</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>User</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Events<span class="token punctuation">\</span>NewUserRegistered</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Redis<span class="token punctuation">\</span>Database</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">CacheUserInformation</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The Redis database implementation.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$redis</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new event handler instance.
     *
     * @param  Database  $redis
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>Database <span class="token variable">$redis</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">redis</span> <span class="token operator">=</span> <span class="token variable">$redis</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Handle the event.
     *
     * @param  NewUserRegistered  $event
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>NewUserRegistered <span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>When the event listener is resolved, the service container will read the type-hints on the constructor of the class, and inject the appropriate value. To learn more about registering things in the service container, check out <a href="http://laravel.com/docs/5.0/container">the documentation</a>.</p>
</article>
@stop