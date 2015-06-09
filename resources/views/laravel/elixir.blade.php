<!-- -->
@extends('master')

@section('content')
<article>
<h1>Laravel Elixir</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/elixir#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/elixir#installation">Installation &amp; Setup</a></li>
    <li><a href="http://laravel.com/docs/5.0/elixir#usage">Usage</a></li>
    <li><a href="http://laravel.com/docs/5.0/elixir#gulp">Gulp</a></li>
    <li><a href="http://laravel.com/docs/5.0/elixir#extensions">Extensions</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/elixir#introduction">Introduction</a></h2>
<p>Laravel Elixir provides a clean, fluent API for defining basic <a href="http://gulpjs.com/">Gulp</a> tasks for your Laravel application. Elixir supports several common CSS and JavaScript pre-processors, and even testing tools.</p>
<p>If you've ever been confused about how to get started with Gulp and asset compilation, you will love Laravel Elixir!</p>
<p><a name="installation"></a></p>
<h2><a href="http://laravel.com/docs/5.0/elixir#installation">Installation &amp; Setup</a></h2>
<h3>Installing Node</h3>
<p>Before triggering Elixir, you must first ensure that Node.js is installed on your machine.</p>
<pre class=" language-php"><code class=" language-php">node <span class="token operator">-</span>v</code></pre>
<p>By default, Laravel Homestead includes everything you need; however, if you aren't using Vagrant, then you can easily install Node by visiting <a href="http://nodejs.org/download/">their download page</a>. Don't worry, it's quick and easy!</p>
<h3>Gulp</h3>
<p>Next, you'll want to pull in <a href="http://gulpjs.com/">Gulp</a> as a global NPM package like so:</p>
<pre class=" language-php"><code class=" language-php">npm install <span class="token operator">--</span><span class="token keyword">global</span> gulp</code></pre>
<h3>Laravel Elixir</h3>
<p>The only remaining step is to install Elixir! With a new install of Laravel, you'll find a <code class=" language-php">package<span class="token punctuation">.</span>json</code> file in the root. Think of this like your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file, except it defines Node dependencies instead of PHP. You may install the dependencies it references by running:</p>
<pre class=" language-php"><code class=" language-php">npm install</code></pre>
<p><a name="usage"></a></p>
<h2><a href="http://laravel.com/docs/5.0/elixir#usage">Usage</a></h2>
<p>Now that you've installed Elixir, you'll be compiling and concatenating in no time! The <code class=" language-php">gulpfile<span class="token punctuation">.</span>js</code> file in your project's root directory contains all of your Elixir tasks.</p>
<h4>Compile Less</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">less</span><span class="token punctuation">(</span><span class="token string">"app.less"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In the example above, Elixir assumes that your Less files are stored in <code class=" language-php">resources<span class="token operator">/</span>assets<span class="token operator">/</span>less</code>.</p>
<h4>Compile Multiple Less Files</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">less</span><span class="token punctuation">(</span><span class="token punctuation">[</span>
        <span class="token string">'app.less'</span><span class="token punctuation">,</span>
        <span class="token string">'something-else.less'</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Compile Sass</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">sass</span><span class="token punctuation">(</span><span class="token string">"app.sass"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This assumes that your Sass files are stored in <code class=" language-php">resources<span class="token operator">/</span>assets<span class="token operator">/</span>sass</code>.</p>
<p>By default, Elixir, underneath the hood, uses the LibSass library for compilation. In some instances, it might prove advantageous to instead leverage the Ruby version, which, though slower, is more feature rich. Assuming that you have both Ruby and the Sass gem installed (<code class=" language-php">gem install sass</code>), you may enable Ruby-mode, like so:</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">rubySass</span><span class="token punctuation">(</span><span class="token string">"app.sass"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Compile Without Source Maps</h4>
<pre class=" language-javascript"><code class=" language-javascript">elixir<span class="token punctuation">.</span>config<span class="token punctuation">.</span>sourcemaps <span class="token operator">=</span> <span class="token keyword">false</span><span class="token punctuation">;</span>

        <span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">sass</span><span class="token punctuation">(</span><span class="token string">"app.scss"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Source maps are enabled out of the box. As such, for each file that is compiled, you'll find a companion <code class=" language-php"><span class="token operator">*</span><span class="token punctuation">.</span>css<span class="token punctuation">.</span>map</code> file in the same directory. This mapping allows you to, when debugging, trace your compiled stylesheet selectors  back to your original Sass or Less partials! Should you need to disable this functionality, however, the code sample above will do the trick.</p>
<h4>Compile CoffeeScript</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">coffee</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This assumes that your CoffeeScript files are stored in <code class=" language-php">resources<span class="token operator">/</span>assets<span class="token operator">/</span>coffee</code>.</p>
<h4>Compile All Less and CoffeeScript</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">less</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">.</span><span class="token function">coffee</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Trigger PHPUnit Tests</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">phpUnit</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Trigger PHPSpec Tests</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">phpSpec</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Combine Stylesheets</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">styles</span><span class="token punctuation">(</span><span class="token punctuation">[</span>
        <span class="token string">"normalize.css"</span><span class="token punctuation">,</span>
        <span class="token string">"main.css"</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Paths passed to this method are relative to the <code class=" language-php">resources<span class="token operator">/</span>css</code> directory.</p>
<h4>Combine Stylesheets and Save to a Custom Directory</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">styles</span><span class="token punctuation">(</span><span class="token punctuation">[</span>
        <span class="token string">"normalize.css"</span><span class="token punctuation">,</span>
        <span class="token string">"main.css"</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'public/build/css/everything.css'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Combine Stylesheets From A Custom Base Directory</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">styles</span><span class="token punctuation">(</span><span class="token punctuation">[</span>
        <span class="token string">"normalize.css"</span><span class="token punctuation">,</span>
        <span class="token string">"main.css"</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'public/build/css/everything.css'</span><span class="token punctuation">,</span> <span class="token string">'public/css'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The third argument to both the <code class=" language-php">styles</code> and <code class=" language-php">scripts</code> methods determines the relative directory for all paths passed to the methods.</p>
<h4>Combine All Styles in a Directory</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">stylesIn</span><span class="token punctuation">(</span><span class="token string">"public/css"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Combine Scripts</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">scripts</span><span class="token punctuation">(</span><span class="token punctuation">[</span>
        <span class="token string">"jquery.js"</span><span class="token punctuation">,</span>
        <span class="token string">"app.js"</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Again, this assumes all paths are relative to the <code class=" language-php">resources<span class="token operator">/</span>js</code> directory.</p>
<h4>Combine All Scripts in a Directory</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">scriptsIn</span><span class="token punctuation">(</span><span class="token string">"public/js/some/directory"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Combine Multiple Sets of Scripts</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">scripts</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'jquery.js'</span><span class="token punctuation">,</span> <span class="token string">'main.js'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'public/js/main.js'</span><span class="token punctuation">)</span>
        <span class="token punctuation">.</span><span class="token function">scripts</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'forum.js'</span><span class="token punctuation">,</span> <span class="token string">'threads.js'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'public/js/forum.js'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Version / Hash A File</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">version</span><span class="token punctuation">(</span><span class="token string">"css/all.css"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This will append a unique hash to the filename, allowing for cache-busting. For example, the generated file name will look something like: <code class=" language-php">all<span class="token operator">-</span>16d570a7<span class="token punctuation">.</span>css</code>.</p>
<p>Within your views, you may use the <code class=" language-php"><span class="token function">elixir<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code> function to load the appropriately hashed asset. Here's an example:</p>
<pre><code class="language-html">&lt;link rel="stylesheet" href="{{ elixir("css/all.css") }}"&gt;</code></pre>
<p>Behind the scenes, the <code class=" language-php"><span class="token function">elixir<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code> function will determine the name of the hashed file that should be included. Don't you feel the weight lifting off your shoulders already?</p>
<p>You may also pass an array to the <code class=" language-php">version</code> method to version multiple files:</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">version</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">"css/all.css"</span><span class="token punctuation">,</span> <span class="token string">"js/app.js"</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<pre><code class="language-html">&lt;link rel="stylesheet" href="{{ elixir("css/all.css") }}"&gt;
        &lt;script src="{{ elixir("js/app.js") }}"&gt;&lt;/script&gt;</code></pre>
<h4>Copy a File to a New Location</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">copy</span><span class="token punctuation">(</span><span class="token string">'vendor/foo/bar.css'</span><span class="token punctuation">,</span> <span class="token string">'public/css/bar.css'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Copy an Entire Directory to a New Location</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">copy</span><span class="token punctuation">(</span><span class="token string">'vendor/package/views'</span><span class="token punctuation">,</span> <span class="token string">'resources/views'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Trigger Browserify</h4>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">browserify</span><span class="token punctuation">(</span><span class="token string">'index.js'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Want to require modules in the browser? Hoping to use EcmaScript 6 sooner than later? Need a built-in JSX transformer? If so, <a href="http://browserify.org/">Browserify</a>, along with the <code class=" language-php">browserify</code> Elixir task, will handle the job nicely.</p>
<p>This task assumes that your scripts are stored in <code class=" language-php">resources<span class="token operator">/</span>js</code>, though you're free to override the default.</p>
<h4>Method Chaining</h4>
<p>Of course, you may chain almost all of Elixir's methods together to build your recipe:</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">less</span><span class="token punctuation">(</span><span class="token string">"app.less"</span><span class="token punctuation">)</span>
        <span class="token punctuation">.</span><span class="token function">coffee</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">.</span><span class="token function">phpUnit</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">.</span><span class="token function">version</span><span class="token punctuation">(</span><span class="token string">"css/bootstrap.css"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="gulp"></a></p>
<h2><a href="http://laravel.com/docs/5.0/elixir#gulp">Gulp</a></h2>
<p>Now that you've told Elixir which tasks to execute, you only need to trigger Gulp from the command line.</p>
<h4>Execute All Registered Tasks Once</h4>
<pre class=" language-php"><code class=" language-php">gulp</code></pre>
<h4>Watch Assets For Changes</h4>
<pre class=" language-php"><code class=" language-php">gulp watch</code></pre>
<h4>Only Compile Scripts</h4>
<pre class=" language-php"><code class=" language-php">gulp scripts</code></pre>
<h4>Only Compile Styles</h4>
<pre class=" language-php"><code class=" language-php">gulp styles</code></pre>
<h4>Watch Tests And PHP Classes for Changes</h4>
<pre class=" language-php"><code class=" language-php">gulp tdd</code></pre>
<blockquote>
    <p><strong>Note:</strong> All tasks will assume a development environment, and will exclude minification. For production, use <code class=" language-php">gulp <span class="token operator">--</span>production</code>.</p>
</blockquote>
<p><a name="extensions"></a></p>
<h2><a href="http://laravel.com/docs/5.0/elixir#extensions">Custom Tasks and Extensions</a></h2>
<p>Sometimes, you'll want to hook your own Gulp tasks into Elixir. Perhaps you have a special bit of functionality that you'd like Elixir to mix and watch for you. No problem!</p>
<p>As an example, imagine that you have a general task that simply speaks a bit of text when called.</p>
<pre class=" language-javascript"><code class=" language-javascript">gulp<span class="token punctuation">.</span><span class="token function">task</span><span class="token punctuation">(</span><span class="token string">"speak"</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token keyword">var</span> message <span class="token operator">=</span> <span class="token string">"Tea...Earl Grey...Hot"</span><span class="token punctuation">;</span>

        gulp<span class="token punctuation">.</span><span class="token function">src</span><span class="token punctuation">(</span><span class="token string">""</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">pipe</span><span class="token punctuation">(</span><span class="token function">shell</span><span class="token punctuation">(</span><span class="token string">"say "</span> <span class="token operator">+</span> message<span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Easy enough. From the command line, you may, of course, call <code class=" language-php">gulp speak</code> to trigger the task. To add it to Elixir, however, use the <code class=" language-php">mix<span class="token punctuation">.</span><span class="token function">task<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code> method:</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">task</span><span class="token punctuation">(</span><span class="token string">'speak'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>That's it! Now, each time you run Gulp, your custom "speak" task will be executed alongside any other Elixir tasks that you've mixed in. To additionally register a watcher, so that your custom tasks will be re-triggered each time one or more files are modified, you may pass a regular expression as the second argument.</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">task</span><span class="token punctuation">(</span><span class="token string">'speak'</span><span class="token punctuation">,</span> 'app<span class="token comment" spellcheck="true">/**/</span><span class="token operator">*</span><span class="token punctuation">.</span>php'<span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>By adding this second argument, we've instructed Elixir to re-trigger the "speak" task each time a PHP file in the "app/" directory is saved.</p>
<p>For even more flexibility, you can create full Elixir extensions. Using the previous "speak" example, you may write an extension, like so:</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token keyword">var</span> gulp <span class="token operator">=</span> <span class="token function">require</span><span class="token punctuation">(</span><span class="token string">"gulp"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token keyword">var</span> shell <span class="token operator">=</span> <span class="token function">require</span><span class="token punctuation">(</span><span class="token string">"gulp-shell"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token keyword">var</span> elixir <span class="token operator">=</span> <span class="token function">require</span><span class="token punctuation">(</span><span class="token string">"laravel-elixir"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        elixir<span class="token punctuation">.</span><span class="token function">extend</span><span class="token punctuation">(</span><span class="token string">"speak"</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span>message<span class="token punctuation">)</span> <span class="token punctuation">{</span>

        gulp<span class="token punctuation">.</span><span class="token function">task</span><span class="token punctuation">(</span><span class="token string">"speak"</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        gulp<span class="token punctuation">.</span><span class="token function">src</span><span class="token punctuation">(</span><span class="token string">""</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">pipe</span><span class="token punctuation">(</span><span class="token function">shell</span><span class="token punctuation">(</span><span class="token string">"say "</span> <span class="token operator">+</span> message<span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token keyword">this</span><span class="token punctuation">.</span><span class="token function">queueTask</span><span class="token punctuation">(</span><span class="token string">"speak"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Notice that we <code class=" language-php">extend</code> Elixir's API by passing the name that we will reference within our Gulpfile, as well as a callback function that will create the Gulp task.</p>
<p>As before, if you want your custom task to be monitored, then register a watcher.</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token keyword">this</span><span class="token punctuation">.</span><span class="token function">registerWatcher</span><span class="token punctuation">(</span><span class="token string">"speak"</span><span class="token punctuation">,</span> "app<span class="token comment" spellcheck="true">/**/</span><span class="token operator">*</span><span class="token punctuation">.</span>php"<span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This lines designates that when any file that matches the regular expression, <code class=" language-php">app<span class="token comment" spellcheck="true">/**/</span><span class="token operator">*</span><span class="token punctuation">.</span>php</code>, is modified, we want to trigger the <code class=" language-php">speak</code> task.</p>
<p>That's it! You may either place this at the top of your Gulpfile, or instead extract it to a custom tasks file. If you choose the latter approach, simply require it into your Gulpfile, like so:</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">require</span><span class="token punctuation">(</span><span class="token string">"./custom-tasks"</span><span class="token punctuation">)</span></code></pre>
<p>You're done! Now, you can mix it in.</p>
<pre class=" language-javascript"><code class=" language-javascript"><span class="token function">elixir</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span>mix<span class="token punctuation">)</span> <span class="token punctuation">{</span>
        mix<span class="token punctuation">.</span><span class="token function">speak</span><span class="token punctuation">(</span><span class="token string">"Tea, Earl Grey, Hot"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>With this addition, each time you trigger Gulp, Picard will request some tea.</p>
</article>
@stop