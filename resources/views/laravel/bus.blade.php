<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Command Bus</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/bus#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/bus#creating-commands">Creating Commands</a></li>
        <li><a href="http://laravel.com/docs/5.0/bus#dispatching-commands">Dispatching Commands</a></li>
        <li><a href="http://laravel.com/docs/5.0/bus#queued-commands">Queued Commands</a></li>
        <li><a href="http://laravel.com/docs/5.0/bus#command-pipeline">Command Pipeline</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/bus#introduction">Introduction</a></h2>
    <p>The Laravel command bus provides a convenient method of encapsulating tasks your application needs to perform into simple, easy to understand "commands". To help us understand the purpose of commands, let's pretend we are building an application that allows users to purchase podcasts.</p>
    <p>When a user purchases a podcast, there are a variety of things that need to happen. For example, we may need to charge the user's credit card, add a record to our database that represents the purchase, and send a confirmation e-mail of the purchase. Perhaps we also need to perform some kind of validation as to whether the user is allowed to purchase podcasts.</p>
    <p>We could put all of this logic inside a controller method; however, this has several disadvantages. The first disadvantage is that our controller probably handles several other incoming HTTP actions, and including complicated logic in each controller method will soon bloat our controller and make it harder to read. Secondly, it is difficult to re-use the purchase podcast logic outside of the controller context. Thirdly, it is more difficult to unit-test the command as we must also generate a stub HTTP request and make a full request to the application to test the purchase podcast logic.</p>
    <p>Instead of putting this logic in the controller, we may choose to encapsulate it within a "command" object, such as a <code class=" language-php">PurchasePodcast</code> command.</p>
    <p><a name="creating-commands"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/bus#creating-commands">Creating Commands</a></h2>
    <p>The Artisan CLI can generate new command classes using the <code class=" language-php">make<span class="token punctuation">:</span>command</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>command PurchasePodcast</code></pre>
    <p>The newly generated class will be placed in the <code class=" language-php">app<span class="token operator">/</span>Commands</code> directory. By default, the command contains two methods: the constructor and the <code class=" language-php">handle</code> method. Of course, the constructor allows you to pass any relevant objects to the command, while the <code class=" language-php">handle</code> method executes the command. For example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">PurchasePodcast</span> <span class="token keyword">extends</span> <span class="token class-name">Command</span> <span class="token keyword">implements</span> <span class="token class-name">SelfHandling</span> <span class="token punctuation">{</span>

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
    <p>The <code class=" language-php">handle</code> method may also type-hint dependencies, and they will be automatically injected by the <a href="http://laravel.com/docs/5.0/container">service container</a>. For example:</p>
<pre class=" language-php"><code class=" language-php">    <span class="token comment" spellcheck="true">/**
     * Execute the command.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>BillingGateway <span class="token variable">$billing</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Handle the logic to purchase the podcast...
</span>    <span class="token punctuation">}</span></code></pre>
    <p><a name="dispatching-commands"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/bus#dispatching-commands">Dispatching Commands</a></h2>
    <p>So, once we have created a command, how do we dispatch it? Of course, we could call the <code class=" language-php">handle</code> method directly; however, dispatching the command through the Laravel "command bus" has several advantages which we will discuss later.</p>
    <p>If you glance at your application's base controller, you will see the <code class=" language-php">DispatchesCommands</code> trait. This trait allows us to call the <code class=" language-php">dispatch</code> method from any of our controllers. For example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">purchasePodcast<span class="token punctuation">(</span></span><span class="token variable">$podcastId</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatch<span class="token punctuation">(</span></span>
        <span class="token keyword">new</span> <span class="token class-name">PurchasePodcast</span><span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token scope">Podcast<span class="token punctuation">::</span></span><span class="token function">findOrFail<span class="token punctuation">(</span></span><span class="token variable">$podcastId</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>The command bus will take care of executing the command and calling the IoC container to inject any needed dependencies into the <code class=" language-php">handle</code> method.</p>
    <p>You may add the <code class=" language-php">Illuminate\<span class="token package">Foundation<span class="token punctuation">\</span>Bus<span class="token punctuation">\</span>DispatchesCommands</span></code> trait to any class you wish. If you would like to receive a command bus instance through the constructor of any of your classes, you may type-hint the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Bus<span class="token punctuation">\</span>Dispatcher</span></code> interface. Finally, you may also use the <code class=" language-php">Bus</code> facade to quickly dispatch commands:</p>
<pre class=" language-php"><code class=" language-php">    <span class="token scope">Bus<span class="token punctuation">::</span></span><span class="token function">dispatch<span class="token punctuation">(</span></span>
        <span class="token keyword">new</span> <span class="token class-name">PurchasePodcast</span><span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token scope">Podcast<span class="token punctuation">::</span></span><span class="token function">findOrFail<span class="token punctuation">(</span></span><span class="token variable">$podcastId</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>Mapping Command Properties From Requests</h3>
    <p>It is very common to map HTTP request variables into commands. So, instead of forcing you to do this manually for each request, Laravel provides some helper methods to make it a cinch. Let's take a look at the <code class=" language-php">dispatchFrom</code> method available on the <code class=" language-php">DispatchesCommands</code> trait:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatchFrom<span class="token punctuation">(</span></span><span class="token string">'Command\Class\Name'</span><span class="token punctuation">,</span> <span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>This method will examine the constructor of the command class it is given, and then extract variables from the HTTP request (or any other <code class=" language-php">ArrayAccess</code> object) to fill the needed constructor parameters of the command. So, if our command class accepts a <code class=" language-php">firstName</code> variable in its constructor, the command bus will attempt to pull the <code class=" language-php">firstName</code> parameter from the HTTP request.</p>
    <p>You may also pass an array as the third argument to the <code class=" language-php">dispatchFrom</code> method. This array will be used to fill any constructor parameters that are not available on the request:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dispatchFrom<span class="token punctuation">(</span></span><span class="token string">'Command\Class\Name'</span><span class="token punctuation">,</span> <span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'firstName'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Taylor'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="queued-commands"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/bus#queued-commands">Queued Commands</a></h2>
    <p>The command bus is not just for synchronous jobs that run during the current request cycle, but also serves as the primary way to build queued jobs in Laravel. So, how do we instruct command bus to queue our job for background processing instead of running it synchronously? It's easy. Firstly, when generating a new command, just add the <code class=" language-php"><span class="token operator">--</span>queued</code> flag to the command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>command PurchasePodcast <span class="token operator">--</span>queued</code></pre>
    <p>As you will see, this adds a few more features to the command, namely the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Queue<span class="token punctuation">\</span>ShouldBeQueued</span></code> interface and the <code class=" language-php">SerializesModels</code> trait. These instruct the command bus to queue the command, as well as gracefully serialize and deserialize any Eloquent models your command stores as properties.</p>
    <p>If you would like to convert an existing command into a queued command, simply implement the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Queue<span class="token punctuation">\</span>ShouldBeQueued</span></code> interface on the class manually. It contains no methods, and merely serves as a "marker interface" for the dispatcher.</p>
    <p>Then, just write your command normally. When you dispatch it to the bus that bus will automatically queue the command for background processing. It doesn't get any easier than that.</p>
    <p>For more information on interacting with queued commands, view the full <a href="http://laravel.com/docs/5.0/queues">queue documentation</a>.</p>
    <p><a name="command-pipeline"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/bus#command-pipeline">Command Pipeline</a></h2>
    <p>Before a command is dispatched to a handler, you may pass it through other classes in a "pipeline". Command pipes work just like HTTP middleware, except for your commands! For example, a command pipe could wrap the entire command operation within a database transaction, or simply log its execution.</p>
    <p>To add a pipe to your bus, call the <code class=" language-php">pipeThrough</code> method of the dispatcher from your <code class=" language-php"><span class="token scope">App<span class="token punctuation">\</span>Providers<span class="token punctuation">\</span>BusServiceProvider<span class="token punctuation">::</span></span>boot</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$dispatcher</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">pipeThrough<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'UseDatabaseTransactions'</span><span class="token punctuation">,</span> <span class="token string">'LogCommand'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>A command pipe is defined with a <code class=" language-php">handle</code> method, just like a middleware:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">UseDatabaseTransactions</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$command</span><span class="token punctuation">,</span> <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">transaction<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token keyword">use</span> <span class="token punctuation">(</span><span class="token variable">$command</span><span class="token punctuation">,</span> <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$command</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>Command pipe classes are resolved through the <a href="http://laravel.com/docs/5.0/container">IoC container</a>, so feel free to type-hint any dependencies you need within their constructors.</p>
    <p>You may even define a <code class=" language-php">Closure</code> as a command pipe:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$dispatcher</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">pipeThrough<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$command</span><span class="token punctuation">,</span> <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">transaction<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token keyword">use</span> <span class="token punctuation">(</span><span class="token variable">$command</span><span class="token punctuation">,</span> <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$command</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop