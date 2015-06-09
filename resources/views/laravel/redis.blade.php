<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Redis</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/redis#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/redis#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/redis#usage">Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/redis#pipelining">Pipelining</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/redis#introduction">Introduction</a></h2>
    <p><a href="http://redis.io/">Redis</a> is an open source, advanced key-value store. It is often referred to as a data structure server since keys can contain <a href="http://redis.io/topics/data-types#strings">strings</a>, <a href="http://redis.io/topics/data-types#hashes">hashes</a>, <a href="http://redis.io/topics/data-types#lists">lists</a>, <a href="http://redis.io/topics/data-types#sets">sets</a>, and <a href="http://redis.io/topics/data-types#sorted-sets">sorted sets</a>.</p>
    <p>Before using Redis with Laravel, you will need to install the <code class=" language-php">predis<span class="token operator">/</span>predis</code> package (~1.0) via Composer.</p>
    <blockquote>
        <p><strong>Note:</strong> If you have the Redis PHP extension installed via PECL, you will need to rename the alias for Redis in your <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> file.</p>
    </blockquote>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/redis#configuration">Configuration</a></h2>
    <p>The Redis configuration for your application is stored in the <code class=" language-php">config<span class="token operator">/</span>database<span class="token punctuation">.</span>php</code> file. Within this file, you will see a <code class=" language-php">redis</code> array containing the Redis servers used by your application:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'redis'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>

        <span class="token string">'cluster'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token boolean">true</span><span class="token punctuation">,</span>

        <span class="token string">'default'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'host'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'127.0.0.1'</span><span class="token punctuation">,</span> <span class="token string">'port'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">6379</span><span class="token punctuation">]</span><span class="token punctuation">,</span>

        <span class="token punctuation">]</span><span class="token punctuation">,</span></code></pre>
    <p>The default server configuration should suffice for development. However, you are free to modify this array based on your environment. Simply give each Redis server a name, and specify the host and port used by the server.</p>
    <p>The <code class=" language-php">cluster</code> option will tell the Laravel Redis client to perform client-side sharding across your Redis nodes, allowing you to pool nodes and create a large amount of available RAM. However, note that client-side sharding does not handle failover; therefore, is primarily suited for cached data that is available from another primary data store.</p>
    <p>If your Redis server requires authentication, you may supply a password by adding a <code class=" language-php">password</code> key / value pair to your Redis server configuration array.</p>
    <p><a name="usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/redis#usage">Usage</a></h2>
    <p>You may get a Redis instance by calling the <code class=" language-php"><span class="token scope">Redis<span class="token punctuation">::</span></span>connection</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$redis</span> <span class="token operator">=</span> <span class="token scope">Redis<span class="token punctuation">::</span></span><span class="token function">connection<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>This will give you an instance of the default Redis server. If you are not using server clustering, you may pass the server name to the <code class=" language-php">connection</code> method to get a specific server as defined in your Redis configuration:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$redis</span> <span class="token operator">=</span> <span class="token scope">Redis<span class="token punctuation">::</span></span><span class="token function">connection<span class="token punctuation">(</span></span><span class="token string">'other'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Once you have an instance of the Redis client, we may issue any of the <a href="http://redis.io/commands">Redis commands</a> to the instance. Laravel uses magic methods to pass the commands to the Redis server:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$redis</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">set<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'Taylor'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$name</span> <span class="token operator">=</span> <span class="token variable">$redis</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$values</span> <span class="token operator">=</span> <span class="token variable">$redis</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">lrange<span class="token punctuation">(</span></span><span class="token string">'names'</span><span class="token punctuation">,</span> <span class="token number">5</span><span class="token punctuation">,</span> <span class="token number">10</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Notice the arguments to the command are simply passed into the magic method. Of course, you are not required to use the magic methods, you may also pass commands to the server using the <code class=" language-php">command</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$values</span> <span class="token operator">=</span> <span class="token variable">$redis</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">command<span class="token punctuation">(</span></span><span class="token string">'lrange'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token number">5</span><span class="token punctuation">,</span> <span class="token number">10</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>When you are simply executing commands against the default connection, just use static magic methods on the <code class=" language-php">Redis</code> class:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Redis<span class="token punctuation">::</span></span><span class="token function">set<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'Taylor'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$name</span> <span class="token operator">=</span> <span class="token scope">Redis<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$values</span> <span class="token operator">=</span> <span class="token scope">Redis<span class="token punctuation">::</span></span><span class="token function">lrange<span class="token punctuation">(</span></span><span class="token string">'names'</span><span class="token punctuation">,</span> <span class="token number">5</span><span class="token punctuation">,</span> <span class="token number">10</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Redis <a href="http://laravel.com/docs/5.0/cache">cache</a> and <a href="http://laravel.com/docs/5.0/session">session</a> drivers are included with Laravel.</p>
    </blockquote>
    <p><a name="pipelining"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/redis#pipelining">Pipelining</a></h2>
    <p>Pipelining should be used when you need to send many commands to the server in one operation. To get started, use the <code class=" language-php">pipeline</code> command:</p>
    <h4>Piping Many Commands To Your Servers</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Redis<span class="token punctuation">::</span></span><span class="token function">pipeline<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$pipe</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">for</span> <span class="token punctuation">(</span><span class="token variable">$i</span> <span class="token operator">=</span> <span class="token number">0</span><span class="token punctuation">;</span> <span class="token variable">$i</span> <span class="token operator">&lt;</span> <span class="token number">1000</span><span class="token punctuation">;</span> <span class="token variable">$i</span><span class="token operator">++</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$pipe</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">set<span class="token punctuation">(</span></span><span class="token string">"key:$i"</span><span class="token punctuation">,</span> <span class="token variable">$i</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop