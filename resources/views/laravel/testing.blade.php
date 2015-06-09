<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Testing</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/testing#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#defining-and-running-tests">Defining &amp; Running Tests</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#test-environment">Test Environment</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#calling-routes-from-tests">Calling Routes From Tests</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#mocking-facades">Mocking Facades</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#framework-assertions">Framework Assertions</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#helper-methods">Helper Methods</a></li>
        <li><a href="http://laravel.com/docs/5.0/testing#refreshing-the-application">Refreshing The Application</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#introduction">Introduction</a></h2>
    <p>Laravel is built with unit testing in mind. In fact, support for testing with PHPUnit is included out of the box, and a <code class=" language-php">phpunit<span class="token punctuation">.</span>xml</code> file is already setup for your application.</p>
    <p>An example test file is provided in the <code class=" language-php">tests</code> directory. After installing a new Laravel application, simply run <code class=" language-php">phpunit</code> on the command line to run your tests.</p>
    <p><a name="defining-and-running-tests"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#defining-and-running-tests">Defining &amp; Running Tests</a></h2>
    <p>To create a test case, simply create a new test file in the <code class=" language-php">tests</code> directory. The test class should extend <code class=" language-php">TestCase</code>. You may then define test methods as you normally would when using PHPUnit.</p>
    <h4>An Example Test Class</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">FooTest</span> <span class="token keyword">extends</span> <span class="token class-name">TestCase</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testSomethingIsTrue<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertTrue<span class="token punctuation">(</span></span><span class="token boolean">true</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>You may run all of the tests for your application by executing the <code class=" language-php">phpunit</code> command from your terminal.</p>
    <blockquote>
        <p><strong>Note:</strong> If you define your own <code class=" language-php">setUp</code> method, be sure to call <code class=" language-php"><span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span>setUp</code>.</p>
    </blockquote>
    <p><a name="test-environment"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#test-environment">Test Environment</a></h2>
    <p>When running unit tests, Laravel will automatically set the configuration environment to <code class=" language-php">testing</code>. Also, Laravel includes configuration files for <code class=" language-php">session</code> and <code class=" language-php">cache</code> in the test environment. Both of these drivers are set to <code class=" language-php"><span class="token keyword">array</span></code> while in the test environment, meaning no session or cache data will be persisted while testing. You are free to create other testing environment configurations as necessary.</p>
    <p>The <code class=" language-php">testing</code> environment variables may be configured in the <code class=" language-php">phpunit<span class="token punctuation">.</span>xml</code> file.</p>
    <p><a name="calling-routes-from-tests"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#calling-routes-from-tests">Calling Routes From Tests</a></h2>
    <h4>Calling A Route From A Test</h4>
    <p>You may easily call one of your routes for a test using the <code class=" language-php">call</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$response</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'user/profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$response</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token variable">$method</span><span class="token punctuation">,</span> <span class="token variable">$uri</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span><span class="token punctuation">,</span> <span class="token variable">$cookies</span><span class="token punctuation">,</span> <span class="token variable">$files</span><span class="token punctuation">,</span> <span class="token variable">$server</span><span class="token punctuation">,</span> <span class="token variable">$content</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may then inspect the <code class=" language-php">Illuminate\<span class="token package">Http<span class="token punctuation">\</span>Response</span></code> object:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertEquals<span class="token punctuation">(</span></span><span class="token string">'Hello World'</span><span class="token punctuation">,</span> <span class="token variable">$response</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getContent<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Calling A Controller From A Test</h4>
    <p>You may also call a controller from a test:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$response</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">action<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'HomeController@index'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$response</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">action<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'UserController@profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'user'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> You do not need to specify the full controller namespace when using the <code class=" language-php">action</code> method. Only specify the portion of the class name that follows the <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> namespace.</p>
    </blockquote>
    <p>The <code class=" language-php">getContent</code> method will return the evaluated string contents of the response. If your route returns a <code class=" language-php">View</code>, you may access it using the <code class=" language-php">original</code> property:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$view</span> <span class="token operator">=</span> <span class="token variable">$response</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">original</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertEquals<span class="token punctuation">(</span></span><span class="token string">'John'</span><span class="token punctuation">,</span> <span class="token variable">$view</span><span class="token punctuation">[</span><span class="token string">'name'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>To call a HTTPS route, you may use the <code class=" language-php">callSecure</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$response</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">callSecure<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'foo/bar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="mocking-facades"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#mocking-facades">Mocking Facades</a></h2>
    <p>When testing, you may often want to mock a call to a Laravel static facade. For example, consider the following controller action:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getIndex<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">fire<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token string">'All done!'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>We can mock the call to the <code class=" language-php">Event</code> class by using the <code class=" language-php">shouldReceive</code> method on the facade, which will return an instance of a <a href="https://github.com/padraic/mockery">Mockery</a> mock.</p>
    <h4>Mocking A Facade</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testGetIndex<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Event<span class="token punctuation">::</span></span><span class="token function">shouldReceive<span class="token punctuation">(</span></span><span class="token string">'fire'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">once<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> You should not mock the <code class=" language-php">Request</code> facade. Instead, pass the input you desire into the <code class=" language-php">call</code> method when running your test.</p>
    </blockquote>
    <p><a name="framework-assertions"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#framework-assertions">Framework Assertions</a></h2>
    <p>Laravel ships with several <code class=" language-php">assert</code> methods to make testing a little easier:</p>
    <h4>Asserting Responses Are OK</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testMethod<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertResponseOk<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <h4>Asserting Response Statuses</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertResponseStatus<span class="token punctuation">(</span></span><span class="token number">403</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Asserting Responses Are Redirects</h4>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertRedirectedTo<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertRedirectedToRoute<span class="token punctuation">(</span></span><span class="token string">'route.name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertRedirectedToAction<span class="token punctuation">(</span></span><span class="token string">'Controller@method'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Asserting A View Has Some Data</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testMethod<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertViewHas<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertViewHas<span class="token punctuation">(</span></span><span class="token string">'age'</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <h4>Asserting The Session Has Some Data</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testMethod<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertSessionHas<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertSessionHas<span class="token punctuation">(</span></span><span class="token string">'age'</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <h4>Asserting The Session Has Errors</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testMethod<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertSessionHasErrors<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

   <span class="token comment" spellcheck="true"> // Asserting the session has errors for a given key...
</span>    <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertSessionHasErrors<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

   <span class="token comment" spellcheck="true"> // Asserting the session has errors for several keys...
</span>    <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertSessionHasErrors<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'age'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <h4>Asserting Old Input Has Some Data</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">testMethod<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'GET'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">assertHasOldInput<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p><a name="helper-methods"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#helper-methods">Helper Methods</a></h2>
    <p>The <code class=" language-php">TestCase</code> class contains several helper methods to make testing your application easier.</p>
    <h4>Setting And Flushing Sessions From Tests</h4>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">session<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'foo'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'bar'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">flushSession<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Setting The Currently Authenticated User</h4>
    <p>You may set the currently authenticated user using the <code class=" language-php">be</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">User</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'John'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">be<span class="token punctuation">(</span></span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may re-seed your database from a test using the <code class=" language-php">seed</code> method:</p>
    <h4>Re-Seeding Database From Tests</h4>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">seed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">seed<span class="token punctuation">(</span></span><span class="token string">'DatabaseSeeder'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>More information on creating seeds may be found in the <a href="http://laravel.com/docs/migrations#database-seeding">migrations and seeding</a> section of the documentation.</p>
    <p><a name="refreshing-the-application"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/testing#refreshing-the-application">Refreshing The Application</a></h2>
    <p>As you may already know, you can access your Application (<a href="http://laravel.com/docs/5.0/container">service container</a>) via <code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span></code> from any test method. This service container instance is refreshed for each test class. If you wish to manually force the Application to be refreshed for a given method, you may use the <code class=" language-php">refreshApplication</code> method from your test method. This will reset any extra bindings, such as mocks, that have been placed in the IoC container since the test case started running.</p>
</article>
@stop