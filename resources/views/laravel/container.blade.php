<!-- -->
@extends('master')

@section('content')
<article>
<h1>Service Container</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/container#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/container#basic-usage">Basic Usage</a></li>
    <li><a href="http://laravel.com/docs/5.0/container#binding-interfaces-to-implementations">Binding Interfaces To Implementations</a></li>
    <li><a href="http://laravel.com/docs/5.0/container#contextual-binding">Contextual Binding</a></li>
    <li><a href="http://laravel.com/docs/5.0/container#tagging">Tagging</a></li>
    <li><a href="http://laravel.com/docs/5.0/container#practical-applications">Practical Applications</a></li>
    <li><a href="http://laravel.com/docs/5.0/container#container-events">Container Events</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#introduction">Introduction</a></h2>
<p>The Laravel service container is a powerful tool for managing class dependencies. Dependency injection is a fancy word that essentially means this: class dependencies are "injected" into the class via the constructor or, in some cases, "setter" methods.</p>
<p>Let's look at a simple example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Handlers<span class="token punctuation">\</span>Commands</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>User</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Commands<span class="token punctuation">\</span>PurchasePodcastCommand</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Mail<span class="token punctuation">\</span>Mailer</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">PurchasePodcastHandler</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The mailer implementation.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$mailer</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new instance.
     *
     * @param  Mailer  $mailer
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>Mailer <span class="token variable">$mailer</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">mailer</span> <span class="token operator">=</span> <span class="token variable">$mailer</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Purchase a podcast.
     *
     * @param  PurchasePodcastCommand  $command
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>PurchasePodcastCommand <span class="token variable">$command</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>In this example, the <code class=" language-php">PurchasePodcast</code> command handler needs to send e-mails when a podcast is purchased. So, we will <strong>inject</strong> a service that is able to send e-mails. Since the service is injected, we are able to easily swap it out with another implementation. We are also able to easily "mock", or create a dummy implementation of the mailer when testing our application.</p>
<p>A deep understanding of the Laravel service container is essential to building a powerful, large application, as well as for contributing to the Laravel core itself.</p>
<p><a name="basic-usage"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#basic-usage">Basic Usage</a></h2>
<h3>Binding</h3>
<p>Almost all of your service container bindings will be registered within <a href="http://laravel.com/docs/5.0/providers">service providers</a>, so all of these examples will demonstrate using the container in that context. However, if you need an instance of the container elsewhere in your application, such as a factory, you may type-hint the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Container<span class="token punctuation">\</span>Container</span></code> contract and an instance of the container will be injected for you. Alternatively, you may use the <code class=" language-php">App</code> facade to access the container.</p>
<h4>Registering A Basic Resolver</h4>
<p>Within a service provider, you always have access to the container via the <code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span></code> instance variable.</p>
<p>There are several ways the service container can register dependencies, including Closure callbacks and binding interfaces to implementations. First, we'll explore Closure callbacks. A Closure resolver is registered in the container with a key (typically the class name) and a Closure that returns some value:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'FooBar'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">FooBar</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">[</span><span class="token string">'SomethingElse'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Registering A Singleton</h4>
<p>Sometimes, you may wish to bind something into the container that should only be resolved once, and the same instance should be returned on subsequent calls into the container:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">singleton<span class="token punctuation">(</span></span><span class="token string">'FooBar'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">FooBar</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">[</span><span class="token string">'SomethingElse'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Binding An Existing Instance Into The Container</h4>
<p>You may also bind an existing object instance into the container using the <code class=" language-php">instance</code> method. The given instance will always be returned on subsequent calls into the container:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$fooBar</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">FooBar</span><span class="token punctuation">(</span><span class="token keyword">new</span> <span class="token class-name">SomethingElse</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">instance<span class="token punctuation">(</span></span><span class="token string">'FooBar'</span><span class="token punctuation">,</span> <span class="token variable">$fooBar</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>Resolving</h3>
<p>There are several ways to resolve something out of the container. First, you may use the <code class=" language-php">make</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$fooBar</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">make<span class="token punctuation">(</span></span><span class="token string">'FooBar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Secondly, you may use "array access" on the container, since it implements PHP's <code class=" language-php">ArrayAccess</code> interface:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$fooBar</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token punctuation">[</span><span class="token string">'FooBar'</span><span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p>Lastly, but most importantly, you may simply "type-hint" the dependency in the constructor of a class that is resolved by the container, including controllers, event listeners, queue jobs, filters, and more. The container will automatically inject the dependencies:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Users<span class="token punctuation">\</span>Repository</span> <span class="token keyword">as</span> UserRepository<span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The user repository instance.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$users</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>UserRepository <span class="token variable">$users</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">users</span> <span class="token operator">=</span> <span class="token variable">$users</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Show the user with the given ID.
     *
     * @param  int  $id
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">show<span class="token punctuation">(</span></span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="binding-interfaces-to-implementations"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#binding-interfaces-to-implementations">Binding Interfaces To Implementations</a></h2>
<h3>Injecting Concrete Dependencies</h3>
<p>A very powerful feature of the service container is its ability to bind an interface to a given implementation. For example, perhaps our application integrates with the <a href="https://pusher.com/">Pusher</a> web service for sending and receiving real-time events. If we are using Pusher's PHP SDK, we could inject an instance of the Pusher client into a class:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Handlers<span class="token punctuation">\</span>Commands</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Commands<span class="token punctuation">\</span>CreateOrder</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Pusher<span class="token punctuation">\</span>Client</span> <span class="token keyword">as</span> PusherClient<span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">CreateOrderHandler</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The Pusher SDK client instance.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$pusher</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new order handler instance.
     *
     * @param  PusherClient  $pusher
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>PusherClient <span class="token variable">$pusher</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">pusher</span> <span class="token operator">=</span> <span class="token variable">$pusher</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Execute the given command.
     *
     * @param  CreateOrder  $command
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">execute<span class="token punctuation">(</span></span>CreateOrder <span class="token variable">$command</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>In this example, it is good that we are injecting the class dependencies; however, we are tightly coupled to the Pusher SDK. If the Pusher SDK methods change or we decide to switch to a new event service entirely, we will need to change our <code class=" language-php">CreateOrderHandler</code> code.</p>
<h3>Program To An Interface</h3>
<p>In order to "insulate" the <code class=" language-php">CreateOrderHandler</code> against changes to event pushing, we could define an <code class=" language-php">EventPusher</code> interface and a <code class=" language-php">PusherEventPusher</code> implementation:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Contracts</span><span class="token punctuation">;</span>

        <span class="token keyword">interface</span> <span class="token class-name">EventPusher</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Push a new event to all clients.
     *
     * @param  string  $event
     * @param  array  $data
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">push<span class="token punctuation">(</span></span><span class="token variable">$event</span><span class="token punctuation">,</span> <span class="token keyword">array</span> <span class="token variable">$data</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<p>Once we have coded our <code class=" language-php">PusherEventPusher</code> implementation of this interface, we can register it with the service container like so:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'App\Contracts\EventPusher'</span><span class="token punctuation">,</span> <span class="token string">'App\Services\PusherEventPusher'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This tells the container that it should inject the <code class=" language-php">PusherEventPusher</code> when a class needs an implementation of <code class=" language-php">EventPusher</code>. Now we can type-hint the <code class=" language-php">EventPusher</code> interface in our constructor:</p>
<pre class=" language-php"><code class=" language-php">    <span class="token comment" spellcheck="true">/**
     * Create a new order handler instance.
     *
     * @param  EventPusher  $pusher
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>EventPusher <span class="token variable">$pusher</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">pusher</span> <span class="token operator">=</span> <span class="token variable">$pusher</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="contextual-binding"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#contextual-binding">Contextual Binding</a></h2>
<p>Sometimes you may have two classes that utilize the same interface, but you wish to inject different implementations into each class. For example, when our system receives a new Order, we may want to send an event via <a href="http://www.pubnub.com/">PubNub</a> rather than Pusher. Laravel provides a simple, fluent interface for defining this behavior:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">when<span class="token punctuation">(</span></span><span class="token string">'App\Handlers\Commands\CreateOrderHandler'</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">needs<span class="token punctuation">(</span></span><span class="token string">'App\Contracts\EventPusher'</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">give<span class="token punctuation">(</span></span><span class="token string">'App\Services\PubNubEventPusher'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="tagging"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#tagging">Tagging</a></h2>
<p>Occasionally, you may need to resolve all of a certain "category" of binding. For example, perhaps you are building a report aggregator that receives an array of many different <code class=" language-php">Report</code> interface implementations. After registering the <code class=" language-php">Report</code> implementations, you can assign them a tag using the <code class=" language-php">tag</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'SpeedReport'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'MemoryReport'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">tag<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'SpeedReport'</span><span class="token punctuation">,</span> <span class="token string">'MemoryReport'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'reports'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Once the services have been tagged, you may easily resolve them all via the <code class=" language-php">tagged</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'ReportAggregator'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">ReportAggregator</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">tagged<span class="token punctuation">(</span></span><span class="token string">'reports'</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="practical-applications"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#practical-applications">Practical Applications</a></h2>
<p>Laravel provides several opportunities to use the service container to increase the flexibility and testability of your application. One primary example is when resolving controllers. All controllers are resolved through the service container, meaning you can type-hint dependencies in a controller constructor, and they will automatically be injected.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Repositories<span class="token punctuation">\</span>OrderRepository</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">OrdersController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The order repository instance.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$orders</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a controller instance.
     *
     * @param  OrderRepository  $orders
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>OrderRepository <span class="token variable">$orders</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">orders</span> <span class="token operator">=</span> <span class="token variable">$orders</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Show all of the orders.
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">index<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$orders</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">orders</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'orders'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'orders'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$orders</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>In this example, the <code class=" language-php">OrderRepository</code> class will automatically be injected into the controller. This means that a "mock" <code class=" language-php">OrderRepository</code> may be bound into the container when <a href="http://laravel.com/docs/5.0/testing">unit testing</a>, allowing for painless stubbing of database layer interaction.</p>
<h4>Other Examples Of Container Usage</h4>
<p>Of course, as mentioned above, controllers are not the only classes Laravel resolves via the service container. You may also type-hint dependencies on route Closures, filters, queue jobs, event listeners, and more. For examples of using the service container in these contexts, please refer to their documentation.</p>
<p><a name="container-events"></a></p>
<h2><a href="http://laravel.com/docs/5.0/container#container-events">Container Events</a></h2>
<h4>Registering A Resolving Listener</h4>
<p>The container fires an event each time it resolves an object. You may listen to this event using the <code class=" language-php">resolving</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">resolving<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$object</span><span class="token punctuation">,</span> <span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Called when container resolves object of any type...
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">resolving<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span>FooBar <span class="token variable">$fooBar</span><span class="token punctuation">,</span> <span class="token variable">$app</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Called when container resolves objects of type "FooBar"...
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The object being resolved will be passed to the callback.</p>
</article>@stop