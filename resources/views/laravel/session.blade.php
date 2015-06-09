<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Session</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/session#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/session#session-usage">Session Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/session#flash-data">Flash Data</a></li>
        <li><a href="http://laravel.com/docs/5.0/session#database-sessions">Database Sessions</a></li>
        <li><a href="http://laravel.com/docs/5.0/session#session-drivers">Session Drivers</a></li>
    </ul>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/session#configuration">Configuration</a></h2>
    <p>Since HTTP driven applications are stateless, sessions provide a way to store information about the user across requests. Laravel ships with a variety of session back-ends available for use through a clean, unified API. Support for popular back-ends such as <a href="http://memcached.org/">Memcached</a>, <a href="http://redis.io/">Redis</a>, and databases is included out of the box.</p>
    <p>The session configuration is stored in <code class=" language-php">config<span class="token operator">/</span>session<span class="token punctuation">.</span>php</code>. Be sure to review the well documented options available to you in this file. By default, Laravel is configured to use the <code class=" language-php">file</code> session driver, which will work well for the majority of applications.</p>
    <p>Before using Redis sessions with Laravel, you will need to install the <code class=" language-php">predis<span class="token operator">/</span>predis</code> package (~1.0) via Composer.</p>
    <blockquote>
        <p><strong>Note:</strong> If you need all stored session data to be encrypted, set the <code class=" language-php">encrypt</code> configuration option to <code class=" language-php"><span class="token boolean">true</span></code>.</p>
    </blockquote>
    <h4>Reserved Keys</h4>
    <p>The Laravel framework uses the <code class=" language-php">flash</code> session key internally, so you should not add an item to the session by that name.</p>
    <p><a name="session-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/session#session-usage">Session Usage</a></h2>
    <p>The session may be accessed in several ways, via the HTTP request's <code class=" language-php">session</code> method, the <code class=" language-php">Session</code> facade, or the <code class=" language-php">session</code> helper function. When the <code class=" language-php">session</code> helper is called without arguments, it will return the entire session object. For example:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token function">session<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">regenerate<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Storing An Item In The Session</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">put<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">,</span> <span class="token string">'value'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token function">session<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'key'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'value'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Push A Value Onto An Array Session Value</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">push<span class="token punctuation">(</span></span><span class="token string">'user.teams'</span><span class="token punctuation">,</span> <span class="token string">'developers'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving An Item From The Session</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">session<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving An Item Or Returning A Default Value</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">,</span> <span class="token string">'default'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span> <span class="token keyword">return</span> <span class="token string">'default'</span><span class="token punctuation">;</span> <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving An Item And Forgetting It</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">pull<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">,</span> <span class="token string">'default'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving All Data From The Session</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$data</span> <span class="token operator">=</span> <span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Determining If An Item Exists In The Session</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Removing An Item From The Session</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">forget<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Removing All Items From The Session</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">flush<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Regenerating The Session ID</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">regenerate<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="flash-data"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/session#flash-data">Flash Data</a></h2>
    <p>Sometimes you may wish to store items in the session only for the next request. You may do so using the <code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span>flash</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">flash<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">,</span> <span class="token string">'value'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Reflashing The Current Flash Data For Another Request</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">reflash<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Reflashing Only A Subset Of Flash Data</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Session<span class="token punctuation">::</span></span><span class="token function">keep<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">,</span> <span class="token string">'email'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="database-sessions"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/session#database-sessions">Database Sessions</a></h2>
    <p>When using the <code class=" language-php">database</code> session driver, you will need to setup a table to contain the session items. Below is an example <code class=" language-php">Schema</code> declaration for the table:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">create<span class="token punctuation">(</span></span><span class="token string">'sessions'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">unique<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">text<span class="token punctuation">(</span></span><span class="token string">'payload'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">integer<span class="token punctuation">(</span></span><span class="token string">'last_activity'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Of course, you may use the <code class=" language-php">session<span class="token punctuation">:</span>table</code> Artisan command to generate this migration for you!</p>
<pre class=" language-php"><code class=" language-php">php artisan session<span class="token punctuation">:</span>table

        composer dump<span class="token operator">-</span>autoload

        php artisan migrate</code></pre>
    <p><a name="session-drivers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/session#session-drivers">Session Drivers</a></h2>
    <p>The session "driver" defines where session data will be stored for each request. Laravel ships with several great drivers out of the box:</p>
    <ul>
        <li><code class=" language-php">file</code> - sessions will be stored in <code class=" language-php">storage<span class="token operator">/</span>framework<span class="token operator">/</span>sessions</code>.</li>
        <li><code class=" language-php">cookie</code> - sessions will be stored in secure, encrypted cookies.</li>
        <li><code class=" language-php">database</code> - sessions will be stored in a database used by your application.</li>
        <li><code class=" language-php">memcached</code> / <code class=" language-php">redis</code> - sessions will be stored in one of these fast, cached based stores.</li>
        <li><code class=" language-php"><span class="token keyword">array</span></code> - sessions will be stored in a simple PHP array and will not be persisted across requests.</li>
    </ul>
    <blockquote>
        <p><strong>Note:</strong> The array driver is typically used for running <a href="http://laravel.com/docs/5.0/testing">unit tests</a>, so no session data will be persisted.</p>
    </blockquote>
</article>
@stop