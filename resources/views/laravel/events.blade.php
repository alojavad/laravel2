<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Events</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/events#basic-usage">Basic Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/events#queued-event-handlers">Queued Event Handlers</a></li>
        <li><a href="http://laravel.com/docs/5.0/events#event-subscribers">Event Subscribers</a></li>
    </ul>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/events#basic-usage">Basic Usage</a></h2>
    <p>The Laravel event facilities provides a simple observer implementation, allowing you to subscribe and listen for events in your application. Event classes are typically stored in the <code class=" language-php">app<span class="token operator">/</span>Events</code> directory, while their handlers are stored in <code class=" language-php">app<span class="token operator">/</span>Handlers<span class="token operator">/</span>Events</code>.</p>
    <p>You can generate a new event class using the Artisan CLI tool:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>event PodcastWasPurchased</code></pre>
    <h4>Subscribing To An Event</h4>
    <p>The <code class=" language-php">EventServiceProvider</code> included with your Laravel application provides a convenient place to register all event handlers. The <code class=" language-php">listen</code> property contains an array of all events (keys) and their handlers (values). Of course, you may add as many events to this array as your application requires. For example, let's add our <code class=" language-php">PodcastWasPurchased</code> event:</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * The event handler mappings for the application.
 *
 * @var array
 */</span>
        <span class="token keyword">protected</span> <span class="token variable">$listen</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token string">'App\Events\PodcastWasPurchased'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'App\Handlers\Events\EmailPurchaseConfirmation'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
    <p>To generate a handler for an event, use the <code class=" language-php">handler<span class="token punctuation">:</span>event</code> Artisan CLI command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan handler<span class="token punctuation">:</span>event EmailPurchaseConfirmation <span class="token operator">--</span>event<span class="token operator">=</span>PodcastWasPurchased</code></pre>
    <p>Of course, manually running the <code class=" language-php">make<span class="token punctuation">:</span>event</code> and <code class=" language-php">handler<span class="token punctuation">:</span>event</code> commands each time you need a handler or event is cumbersome. Instead, simply add handlers and events to your <code class=" language-php">EventServiceProvider</code> and use the <code class=" language-php">event<span class="token punctuation">:</span>generate</code> command. This command will generate any events or handlers that are listed in your <code class=" language-php">EventServiceProvider</code>:</p>
    <pre class=" language-php"><code class=" language-php">php artisan event<span class="token punctuation">:</span>generate</code></pre>
    <h4>Firing An Event</h4>
    <p>Now we are ready to fire our event using the <code class=" language-php">Event</code> facade:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$response</span> <span class="token operator">=</span> <span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">fire<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">PodcastWasPurchased</span><span class="token punctuation">(</span><span class="token variable">$podcast</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The <code class=" language-php">fire</code> method returns an array of responses that you can use to control what happens next in your application.</p>
    <p>You may also use the <code class=" language-php">event</code> helper to fire an event:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token function">event<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">PodcastWasPurchased</span><span class="token punctuation">(</span><span class="token variable">$podcast</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Closure Listeners</h4>
    <p>You can even listen to events without creating a separate handler class at all. For example, in the <code class=" language-php">boot</code> method of your <code class=" language-php">EventServiceProvider</code>, you could do the following:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token string">'App\Events\PodcastWasPurchased'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Handle the event...
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Stopping The Propagation Of An Event</h4>
    <p>Sometimes, you may wish to stop the propagation of an event to other listeners. You may do so using by returning <code class=" language-php"><span class="token boolean">false</span></code> from your handler:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token string">'App\Events\PodcastWasPurchased'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Handle the event...
</span>
        <span class="token keyword">return</span> <span class="token boolean">false</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="queued-event-handlers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/events#queued-event-handlers">Queued Event Handlers</a></h2>
    <p>Need to <a href="http://laravel.com/docs/5.0/queues">queue</a> an event handler? It couldn't be any easier. When generating the handler, simply use the <code class=" language-php"><span class="token operator">--</span>queued</code> flag:</p>
    <pre class=" language-php"><code class=" language-php">php artisan handler<span class="token punctuation">:</span>event SendPurchaseConfirmation <span class="token operator">--</span>event<span class="token operator">=</span>PodcastWasPurchased <span class="token operator">--</span>queued</code></pre>
    <p>This will generate a handler class that implements the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Queue<span class="token punctuation">\</span>ShouldBeQueued</span></code> interface. That's it! Now when this handler is called for an event, it will be queued automatically by the event dispatcher.</p>
    <p>If no exceptions are thrown when the handler is executed by the queue, the queued job will be deleted automatically after it has processed. If you need to access the queued job's <code class=" language-php">delete</code> and <code class=" language-php">release</code> methods manually, you may do so. The <code class=" language-php">Illuminate\<span class="token package">Queue<span class="token punctuation">\</span>InteractsWithQueue</span></code> trait, which is included by default on queued handlers, gives you access to these methods:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>PodcastWasPurchased <span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token boolean">true</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">release<span class="token punctuation">(</span></span><span class="token number">30</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span></code></pre>
    <p>If you have an existing handler that you would like to convert to a queued handler, simply add the <code class=" language-php">ShouldBeQueued</code> interface to the class manually.</p>
    <p><a name="event-subscribers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/events#event-subscribers">Event Subscribers</a></h2>
    <h4>Defining An Event Subscriber</h4>
    <p>Event subscribers are classes that may subscribe to multiple events from within the class itself. Subscribers should define a <code class=" language-php">subscribe</code> method, which will be passed an event dispatcher instance:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">UserEventHandler</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Handle user login events.
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">onUserLogin<span class="token punctuation">(</span></span><span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Handle user logout events.
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">onUserLogout<span class="token punctuation">(</span></span><span class="token variable">$event</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">subscribe<span class="token punctuation">(</span></span><span class="token variable">$events</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$events</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token string">'App\Events\UserLoggedIn'</span><span class="token punctuation">,</span> <span class="token string">'UserEventHandler@onUserLogin'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$events</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token string">'App\Events\UserLoggedOut'</span><span class="token punctuation">,</span> <span class="token string">'UserEventHandler@onUserLogout'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <h4>Registering An Event Subscriber</h4>
    <p>Once the subscriber has been defined, it may be registered with the <code class=" language-php">Event</code> class.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$subscriber</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">UserEventHandler</span><span class="token punctuation">;</span>

        <span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">subscribe<span class="token punctuation">(</span></span><span class="token variable">$subscriber</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also use the <a href="http://laravel.com/docs/5.0/container">service container</a> to resolve your subscriber. To do so, simply pass the name of your subscriber to the <code class=" language-php">subscribe</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">subscribe<span class="token punctuation">(</span></span><span class="token string">'UserEventHandler'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop