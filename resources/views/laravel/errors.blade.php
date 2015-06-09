<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Errors &amp; Logging</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/errors#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/errors#handling-errors">Handling Errors</a></li>
        <li><a href="http://laravel.com/docs/5.0/errors#http-exceptions">HTTP Exceptions</a></li>
        <li><a href="http://laravel.com/docs/5.0/errors#logging">Logging</a></li>
    </ul>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/errors#configuration">Configuration</a></h2>
    <p>The logging facilities for your application are configured in the <code class=" language-php">Illuminate\<span class="token package">Foundation<span class="token punctuation">\</span>Bootstrap<span class="token punctuation">\</span>ConfigureLogging</span></code> bootstrapper class. This class utilizes the <code class=" language-php">log</code> configuration option from your <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file.</p>
    <p>By default, the logger is configured to use daily log files; however, you may customize this behavior as needed. Since Laravel uses the popular <a href="https://github.com/Seldaek/monolog">Monolog</a> logging library, you can take advantage of the variety of handlers that Monolog offers.</p>
    <p>For example, if you wish to use a single log file instead of daily files, you can make the following change to your <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token string">'log'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'single'</span></code></pre>
    <p>Out of the box, Laravel supported <code class=" language-php">single</code>, <code class=" language-php">daily</code>, <code class=" language-php">syslog</code> and <code class=" language-php">errorlog</code> logging modes. However, you are free to customize the logging for your application as you wish by overriding the <code class=" language-php">ConfigureLogging</code> bootstrapper class.</p>
    <h3>Error Detail</h3>
    <p>The amount of error detail your application displays through the browser is controlled by the <code class=" language-php">app<span class="token punctuation">.</span>debug</code> configuration option in your <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file. By default, this configuration option is set to respect the <code class=" language-php"><span class="token constant">APP_DEBUG</span></code> environment variable, which is stored in your <code class=" language-php"><span class="token punctuation">.</span>env</code> file.</p>
    <p>For local development, you should set the <code class=" language-php"><span class="token constant">APP_DEBUG</span></code> environment variable to <code class=" language-php"><span class="token boolean">true</span></code>. <strong>In your production environment, this value should always be <code class=" language-php"><span class="token boolean">false</span></code>.</strong></p>
    <p><a name="handling-errors"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/errors#handling-errors">Handling Errors</a></h2>
    <p>All exceptions are handled by the <code class=" language-php">App\<span class="token package">Exceptions<span class="token punctuation">\</span>Handler</span></code> class. This class contains two methods: <code class=" language-php">report</code> and <code class=" language-php">render</code>.</p>
    <p>The <code class=" language-php">report</code> method is used to log exceptions or send them to an external service like <a href="https://bugsnag.com/">BugSnag</a>. By default, the <code class=" language-php">report</code> method simply passes the exception to the base implementation on the parent class where the exception is logged. However, you are free to log exceptions however you wish. If you need to report different types of exceptions in different ways, you may use the PHP <code class=" language-php"><span class="token keyword">instanceof</span></code> comparison operator:</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Report or log an exception.
 *
 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
 *
 * @param  \Exception  $e
 * @return void
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">report<span class="token punctuation">(</span></span>Exception <span class="token variable">$e</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$e</span> <span class="token keyword">instanceof</span> <span class="token class-name">CustomException</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">report<span class="token punctuation">(</span></span><span class="token variable">$e</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>The <code class=" language-php">render</code> method is responsible for converting the exception into an HTTP response that should be sent back to the browser. By default, the exception is passed to the base class which generates a response for you. However, you are free to check the exception type or return your own custom response.</p>
    <p>The <code class=" language-php">dontReport</code> property of the exception handler contains an array of exception types that will not be logged. By default, exceptions resulting from 404 errors are not written to your log files. You may add other exception types to this array as needed.</p>
    <p><a name="http-exceptions"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/errors#http-exceptions">HTTP Exceptions</a></h2>
    <p>Some exceptions describe HTTP error codes from the server. For example, this may be a "page not found" error (404), an "unauthorized error" (401) or even a developer generated 500 error. In order to return such a response, use the following:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token function">abort<span class="token punctuation">(</span></span><span class="token number">404</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Optionally, you may provide a response:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token function">abort<span class="token punctuation">(</span></span><span class="token number">403</span><span class="token punctuation">,</span> <span class="token string">'Unauthorized action.'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>This method may be used at any time during the request's lifecycle.</p>
    <h3>Custom 404 Error Page</h3>
    <p>To return a custom view for all 404 errors, create a <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>errors<span class="token operator">/</span><span class="token number">404</span><span class="token punctuation">.</span>blade<span class="token punctuation">.</span>php</code> file. This view will be served on all 404 errors generated by your application.</p>
    <p><a name="logging"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/errors#logging">Logging</a></h2>
    <p>The Laravel logging facilities provide a simple layer on top of the powerful <a href="http://github.com/seldaek/monolog">Monolog</a> library. By default, Laravel is configured to create daily log files for your application which are stored in the <code class=" language-php">storage<span class="token operator">/</span>logs</code> directory. You may write information to the log like so:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Log<span class="token punctuation">::</span></span><span class="token function">info<span class="token punctuation">(</span></span><span class="token string">'This is some useful information.'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Log<span class="token punctuation">::</span></span><span class="token function">warning<span class="token punctuation">(</span></span><span class="token string">'Something could be going wrong.'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Log<span class="token punctuation">::</span></span><span class="token function">error<span class="token punctuation">(</span></span><span class="token string">'Something is really going wrong.'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The logger provides the seven logging levels defined in <a href="http://tools.ietf.org/html/rfc5424">RFC 5424</a>: <strong>debug</strong>, <strong>info</strong>, <strong>notice</strong>, <strong>warning</strong>, <strong>error</strong>, <strong>critical</strong>, and <strong>alert</strong>.</p>
    <p>An array of contextual data may also be passed to the log methods:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Log<span class="token punctuation">::</span></span><span class="token function">info<span class="token punctuation">(</span></span><span class="token string">'Log message'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'context'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Other helpful information'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Monolog has a variety of additional handlers you may use for logging. If needed, you may access the underlying Monolog instance being used by Laravel:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$monolog</span> <span class="token operator">=</span> <span class="token scope">Log<span class="token punctuation">::</span></span><span class="token function">getMonolog<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also register an event to catch all messages passed to the log:</p>
    <h4>Registering A Log Event Listener</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Log<span class="token punctuation">::</span></span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$level</span><span class="token punctuation">,</span> <span class="token variable">$message</span><span class="token punctuation">,</span> <span class="token variable">$context</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop