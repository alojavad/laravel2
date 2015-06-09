<!-- -->
@extends('master')

@section('content')
<article>
<h1>Facades</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/facades#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/facades#explanation">Explanation</a></li>
    <li><a href="http://laravel.com/docs/5.0/facades#practical-usage">Practical Usage</a></li>
    <li><a href="http://laravel.com/docs/5.0/facades#creating-facades">Creating Facades</a></li>
    <li><a href="http://laravel.com/docs/5.0/facades#mocking-facades">Mocking Facades</a></li>
    <li><a href="http://laravel.com/docs/5.0/facades#facade-class-reference">Facade Class Reference</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/facades#introduction">Introduction</a></h2>
<p>Facades provide a "static" interface to classes that are available in the application's <a href="http://laravel.com/docs/5.0/container">service container</a>. Laravel ships with many facades, and you have probably been using them without even knowing it! Laravel "facades" serve as "static proxies" to underlying classes in the service container, providing the benefit of a terse, expressive syntax while maintaining more testability and flexibility than traditional static methods.</p>
<p>Occasionally, you may wish to create your own facades for your application's and packages, so let's explore the concept, development and usage of these classes.</p>
<blockquote>
    <p><strong>Note:</strong> Before digging into facades, it is strongly recommended that you become very familiar with the Laravel <a href="http://laravel.com/docs/5.0/container">service container</a>.</p>
</blockquote>
<p><a name="explanation"></a></p>
<h2><a href="http://laravel.com/docs/5.0/facades#explanation">Explanation</a></h2>
<p>In the context of a Laravel application, a facade is a class that provides access to an object from the container. The machinery that makes this work is in the <code class=" language-php">Facade</code> class. Laravel's facades, and any custom facades you create, will extend the base <code class=" language-php">Facade</code> class.</p>
<p>Your facade class only needs to implement a single method: <code class=" language-php">getFacadeAccessor</code>. It's the <code class=" language-php">getFacadeAccessor</code> method's job to define what to resolve from the container. The <code class=" language-php">Facade</code> base class makes use of the <code class=" language-php"><span class="token function">__callStatic<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code> magic-method to defer calls from your facade to the resolved object.</p>
<p>So, when you make a facade call like <code class=" language-php"><span class="token scope">Cache<span class="token punctuation">::</span></span>get</code>, Laravel resolves the Cache manager class out of the service container and calls the <code class=" language-php">get</code> method on the class. In technical terms, Laravel Facades are a convenient syntax for using the Laravel service container as a service locator.</p>
<p><a name="practical-usage"></a></p>
<h2><a href="http://laravel.com/docs/5.0/facades#practical-usage">Practical Usage</a></h2>
<p>In the example below, a call is made to the Laravel cache system. By glancing at this code, one might assume that the static method <code class=" language-php">get</code> is being called on the <code class=" language-php">Cache</code> class.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Cache<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>However, if we look at that <code class=" language-php">Illuminate\<span class="token package">Support<span class="token punctuation">\</span>Facades<span class="token punctuation">\</span>Cache</span></code> class, you'll see that there is no static method <code class=" language-php">get</code>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Cache</span> <span class="token keyword">extends</span> <span class="token class-name">Facade</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Get the registered name of the component.
     *
     * @return string
     */</span>
        <span class="token keyword">protected</span> <span class="token keyword">static</span> <span class="token keyword">function</span> <span class="token function">getFacadeAccessor<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token punctuation">{</span> <span class="token keyword">return</span> <span class="token string">'cache'</span><span class="token punctuation">;</span> <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The Cache class extends the base <code class=" language-php">Facade</code> class and defines a method <code class=" language-php"><span class="token function">getFacadeAccessor<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code>. Remember, this method's job is to return the name of a service container binding.</p>
<p>When a user references any static method on the <code class=" language-php">Cache</code> facade, Laravel resolves the <code class=" language-php">cache</code> binding from the service container and runs the requested method (in this case, <code class=" language-php">get</code>) against that object.</p>
<p>So, our <code class=" language-php"><span class="token scope">Cache<span class="token punctuation">::</span></span>get</code> call could be re-written like so:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">make<span class="token punctuation">(</span></span><span class="token string">'cache'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Importing Facades</h4>
<p>Remember, if you are using a facade in a controller that is namespaced, you will need to import the facade class into the namespace. All facades live in the global namespace:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Cache</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">PhotosController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Get all of the application photos.
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">index<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$photos</span> <span class="token operator">=</span> <span class="token scope">Cache<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'photos'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="creating-facades"></a></p>
<h2><a href="http://laravel.com/docs/5.0/facades#creating-facades">Creating Facades</a></h2>
<p>Creating a facade for your own application or package is simple. You only need 3 things:</p>
<ul>
    <li>A service container binding.</li>
    <li>A facade class.</li>
    <li>A facade alias configuration.</li>
</ul>
<p>Let's look at an example. Here, we have a class defined as <code class=" language-php">PaymentGateway\<span class="token package">Payment</span></code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">namespace</span> <span class="token package">PaymentGateway</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">Payment</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">process<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>We need to be able to resolve this class from the service container. So, let's add a binding to a service provider:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">App<span class="token punctuation">::</span></span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'payment'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name"><span class="token punctuation">\</span>PaymentGateway<span class="token punctuation">\</span>Payment</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>A great place to register this binding would be to create a new <a href="http://laravel.com/docs/5.0/container#service-providers">service provider</a> named <code class=" language-php">PaymentServiceProvider</code>, and add this binding to the <code class=" language-php">register</code> method. You can then configure Laravel to load your service provider from the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file.</p>
<p>Next, we can create our own facade class:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>Facades<span class="token punctuation">\</span>Facade</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">Payment</span> <span class="token keyword">extends</span> <span class="token class-name">Facade</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token keyword">static</span> <span class="token keyword">function</span> <span class="token function">getFacadeAccessor<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token punctuation">{</span> <span class="token keyword">return</span> <span class="token string">'payment'</span><span class="token punctuation">;</span> <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Finally, if we wish, we can add an alias for our facade to the <code class=" language-php">aliases</code> array in the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file. Now, we can call the <code class=" language-php">process</code> method on an instance of the <code class=" language-php">Payment</code> class.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Payment<span class="token punctuation">::</span></span><span class="token function">process<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>A Note On Auto-Loading Aliases</h3>
<p>Classes in the <code class=" language-php">aliases</code> array are not available in some instances because <a href="https://bugs.php.net/bug.php?id=39003">PHP will not attempt to autoload undefined type-hinted classes</a>. If <code class=" language-php">\<span class="token package">ServiceWrapper<span class="token punctuation">\</span>ApiTimeoutException</span></code> is aliased to <code class=" language-php">ApiTimeoutException</code>, a <code class=" language-php"><span class="token keyword">catch</span><span class="token punctuation">(</span>ApiTimeoutException <span class="token variable">$e</span><span class="token punctuation">)</span></code> outside of the namespace <code class=" language-php">\<span class="token package">ServiceWrapper</span></code> will never catch the exception, even if one is thrown. A similar problem is found in classes which have type hints to aliased classes. The only workaround is to forego aliasing and <code class=" language-php"><span class="token keyword">use</span></code> the classes you wish to type hint at the top of each file which requires them.</p>
<p><a name="mocking-facades"></a></p>
<h2><a href="http://laravel.com/docs/5.0/facades#mocking-facades">Mocking Facades</a></h2>
<p>Unit testing is an important aspect of why facades work the way that they do. In fact, testability is the primary reason for facades to even exist. For more information, check out the <a href="http://laravel.com/docs/testing#mocking-facades">mocking facades</a> section of the documentation.</p>
<p><a name="facade-class-reference"></a></p>
<h2><a href="http://laravel.com/docs/5.0/facades#facade-class-reference">Facade Class Reference</a></h2>
<p>Below you will find every facade and its underlying class. This is a useful tool for quickly digging into the API documentation for a given facade root. The <a href="http://laravel.com/docs/5.0/container">service container binding</a> key is also included where applicable.</p>
<table>
    <thead>
    <tr>
        <th>Facade</th>
        <th>Class</th>
        <th>Service Container Binding</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>App</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Foundation/Application.html">Illuminate\Foundation\Application</a></td>
        <td><code class=" language-php">app</code></td>
    </tr>
    <tr>
        <td>Artisan</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Console/Application.html">Illuminate\Console\Application</a></td>
        <td><code class=" language-php">artisan</code></td>
    </tr>
    <tr>
        <td>Auth</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Auth/AuthManager.html">Illuminate\Auth\AuthManager</a></td>
        <td><code class=" language-php">auth</code></td>
    </tr>
    <tr>
        <td>Auth (Instance)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Auth/Guard.html">Illuminate\Auth\Guard</a></td>
    </tr>
    <tr>
        <td>Blade</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/View/Compilers/BladeCompiler.html">Illuminate\View\Compilers\BladeCompiler</a></td>
        <td><code class=" language-php">blade<span class="token punctuation">.</span>compiler</code></td>
    </tr>
    <tr>
        <td>Bus</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Contracts/Bus/Dispatcher.html">Illuminate\Contracts\Bus\Dispatcher</a></td>
    </tr>
    <tr>
        <td>Cache</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Cache/Repository.html">Illuminate\Cache\Repository</a></td>
        <td><code class=" language-php">cache</code></td>
    </tr>
    <tr>
        <td>Config</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Config/Repository.html">Illuminate\Config\Repository</a></td>
        <td><code class=" language-php">config</code></td>
    </tr>
    <tr>
        <td>Cookie</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Cookie/CookieJar.html">Illuminate\Cookie\CookieJar</a></td>
        <td><code class=" language-php">cookie</code></td>
    </tr>
    <tr>
        <td>Crypt</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Encryption/Encrypter.html">Illuminate\Encryption\Encrypter</a></td>
        <td><code class=" language-php">encrypter</code></td>
    </tr>
    <tr>
        <td>DB</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Database/DatabaseManager.html">Illuminate\Database\DatabaseManager</a></td>
        <td><code class=" language-php">db</code></td>
    </tr>
    <tr>
        <td>DB (Instance)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Database/Connection.html">Illuminate\Database\Connection</a></td>
    </tr>
    <tr>
        <td>Event</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Events/Dispatcher.html">Illuminate\Events\Dispatcher</a></td>
        <td><code class=" language-php">events</code></td>
    </tr>
    <tr>
        <td>File</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Filesystem/Filesystem.html">Illuminate\Filesystem\Filesystem</a></td>
        <td><code class=" language-php">files</code></td>
    </tr>
    <tr>
        <td>Hash</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Contracts/Hashing/Hasher.html">Illuminate\Contracts\Hashing\Hasher</a></td>
        <td><code class=" language-php">hash</code></td>
    </tr>
    <tr>
        <td>Input</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Http/Request.html">Illuminate\Http\Request</a></td>
        <td><code class=" language-php">request</code></td>
    </tr>
    <tr>
        <td>Lang</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Translation/Translator.html">Illuminate\Translation\Translator</a></td>
        <td><code class=" language-php">translator</code></td>
    </tr>
    <tr>
        <td>Log</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Log/Writer.html">Illuminate\Log\Writer</a></td>
        <td><code class=" language-php">log</code></td>
    </tr>
    <tr>
        <td>Mail</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Mail/Mailer.html">Illuminate\Mail\Mailer</a></td>
        <td><code class=" language-php">mailer</code></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Auth/Passwords/PasswordBroker.html">Illuminate\Auth\Passwords\PasswordBroker</a></td>
        <td><code class=" language-php">auth<span class="token punctuation">.</span>password</code></td>
    </tr>
    <tr>
        <td>Queue</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Queue/QueueManager.html">Illuminate\Queue\QueueManager</a></td>
        <td><code class=" language-php">queue</code></td>
    </tr>
    <tr>
        <td>Queue (Instance)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Queue/QueueInterface.html">Illuminate\Queue\QueueInterface</a></td>
    </tr>
    <tr>
        <td>Queue (Base Class)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Queue/Queue.html">Illuminate\Queue\Queue</a></td>
    </tr>
    <tr>
        <td>Redirect</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Routing/Redirector.html">Illuminate\Routing\Redirector</a></td>
        <td><code class=" language-php">redirect</code></td>
    </tr>
    <tr>
        <td>Redis</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Redis/Database.html">Illuminate\Redis\Database</a></td>
        <td><code class=" language-php">redis</code></td>
    </tr>
    <tr>
        <td>Request</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Http/Request.html">Illuminate\Http\Request</a></td>
        <td><code class=" language-php">request</code></td>
    </tr>
    <tr>
        <td>Response</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Contracts/Routing/ResponseFactory.html">Illuminate\Contracts\Routing\ResponseFactory</a></td>
    </tr>
    <tr>
        <td>Route</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Routing/Router.html">Illuminate\Routing\Router</a></td>
        <td><code class=" language-php">router</code></td>
    </tr>
    <tr>
        <td>Schema</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Database/Schema/Blueprint.html">Illuminate\Database\Schema\Blueprint</a></td>
    </tr>
    <tr>
        <td>Session</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Session/SessionManager.html">Illuminate\Session\SessionManager</a></td>
        <td><code class=" language-php">session</code></td>
    </tr>
    <tr>
        <td>Session (Instance)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Session/Store.html">Illuminate\Session\Store</a></td>
    </tr>
    <tr>
        <td>Storage</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Contracts/Filesystem/Factory.html">Illuminate\Contracts\Filesystem\Factory</a></td>
        <td><code class=" language-php">filesystem</code></td>
    </tr>
    <tr>
        <td>URL</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Routing/UrlGenerator.html">Illuminate\Routing\UrlGenerator</a></td>
        <td><code class=" language-php">url</code></td>
    </tr>
    <tr>
        <td>Validator</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Validation/Factory.html">Illuminate\Validation\Factory</a></td>
        <td><code class=" language-php">validator</code></td>
    </tr>
    <tr>
        <td>Validator (Instance)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/Validation/Validator.html">Illuminate\Validation\Validator</a></td>
    </tr>
    <tr>
        <td>View</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/View/Factory.html">Illuminate\View\Factory</a></td>
        <td><code class=" language-php">view</code></td>
    </tr>
    <tr>
        <td>View (Instance)</td>
        <td><a href="http://laravel.com/api/5.0/Illuminate/View/View.html">Illuminate\View\View</a></td>
    </tr>
    </tbody>
</table>
</article>
@stop