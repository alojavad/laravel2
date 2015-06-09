<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Package Development</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/packages#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/packages#views">Views</a></li>
        <li><a href="http://laravel.com/docs/5.0/packages#translations">Translations</a></li>
        <li><a href="http://laravel.com/docs/5.0/packages#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/packages#public-assets">Public Assets</a></li>
        <li><a href="http://laravel.com/docs/5.0/packages#publishing-file-groups">Publishing File Groups</a></li>
        <li><a href="http://laravel.com/docs/5.0/packages#routing">Routing</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#introduction">Introduction</a></h2>
    <p>Packages are the primary way of adding functionality to Laravel. Packages might be anything from a great way to work with dates like <a href="https://github.com/briannesbitt/Carbon">Carbon</a>, or an entire BDD testing framework like <a href="https://github.com/Behat/Behat">Behat</a>.</p>
    <p>Of course, there are different types of packages. Some packages are stand-alone, meaning they work with any framework, not just Laravel. Both Carbon and Behat are examples of stand-alone packages. Any of these packages may be used with Laravel by simply requesting them in your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file.</p>
    <p>On the other hand, other packages are specifically intended for use with Laravel. These packages may have routes, controllers, views, and configuration specifically intended to enhance a Laravel application. This guide primarily covers the development of those that are Laravel specific.</p>
    <p>All Laravel packages are distributed via <a href="http://packagist.org/">Packagist</a> and <a href="http://getcomposer.org/">Composer</a>, so learning about these wonderful PHP package distribution tools is essential.</p>
    <p><a name="views"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#views">Views</a></h2>
    <p>Your package's internal structure is entirely up to you; however, typically each package will contain one or more <a href="http://laravel.com/docs/5.0/providers">service providers</a>. The service provider contains any <a href="http://laravel.com/docs/5.0/container">service container</a> bindings, as well as instructions as to where package configuration, views, and translation files are located.</p>
    <h3>Views</h3>
    <p>Package views are typically referenced using a double-colon "namespace" syntax:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'package::view.name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>All you need to do is tell Laravel where the views for a given namespace are located. For example, if your package is named "courier", you might add the following to your service provider's <code class=" language-php">boot</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">loadViewsFrom<span class="token punctuation">(</span></span><span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/views'</span><span class="token punctuation">,</span> <span class="token string">'courier'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>Now you may load your package views using the following syntax:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'courier::view.name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>When you use the <code class=" language-php">loadViewsFrom</code> method, Laravel actually registers <strong>two</strong> locations for your views: one in the application's <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>vendor</code> directory and one in the directory you specify. So, using our <code class=" language-php">courier</code> example: when requesting a package view, Laravel will first check if a custom version of the view has been provided by the developer in <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>vendor<span class="token operator">/</span>courier</code>. Then, if the view has not been customized, Laravel will search the package view directory you specified in your call to <code class=" language-php">loadViewsFrom</code>. This makes it easy for end-users to customize / override your package's views.</p>
    <h4>Publishing Views</h4>
    <p>To publish your package's views to the <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>vendor</code> directory, you should use the <code class=" language-php">publishes</code> method from the <code class=" language-php">boot</code> method of your service provider:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">loadViewsFrom<span class="token punctuation">(</span></span><span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/views'</span><span class="token punctuation">,</span> <span class="token string">'courier'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">publishes<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/views'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">base_path<span class="token punctuation">(</span></span><span class="token string">'resources/views/vendor/courier'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>Now, when users of your package execute Laravel's <code class=" language-php">vendor<span class="token punctuation">:</span>publish</code> command, your views directory will be copied to the specified location.</p>
    <p>If you would like to overwrite existing files, use the <code class=" language-php"><span class="token operator">--</span>force</code> switch:</p>
    <pre class=" language-php"><code class=" language-php">php artisan vendor<span class="token punctuation">:</span>publish <span class="token operator">--</span>force</code></pre>
    <blockquote>
        <p><strong>Note:</strong> You may use the <code class=" language-php">publishes</code> method to publish <strong>any</strong> type of file to any location you wish.</p>
    </blockquote>
    <p><a name="translations"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#translations">Translations</a></h2>
    <p>Package translation files are typically referenced using a double-colon syntax:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">trans<span class="token punctuation">(</span></span><span class="token string">'package::file.line'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>All you need to do is tell Laravel where the translations for a given namespace are located. For example, if your package is named "courier", you might add the following to your service provider's <code class=" language-php">boot</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">loadTranslationsFrom<span class="token punctuation">(</span></span><span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/translations'</span><span class="token punctuation">,</span> <span class="token string">'courier'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>Note that within your <code class=" language-php">translations</code> folder, you would have further directories for each language, such as <code class=" language-php">en</code>, <code class=" language-php">es</code>, <code class=" language-php">ru</code>, etc.</p>
    <p>Now you may load your package translations using the following syntax:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">trans<span class="token punctuation">(</span></span><span class="token string">'courier::file.line'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#configuration">Configuration</a></h2>
    <p>Typically, you will want to publish your package's configuration file to the application's own <code class=" language-php">config</code> directory. This will allow users of your package to easily override your default configuration options.</p>
    <p>To publish a configuration file, just use the <code class=" language-php">publishes</code> method from the <code class=" language-php">boot</code> method of your service provider:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">publishes<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/config/courier.php'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">config_path<span class="token punctuation">(</span></span><span class="token string">'courier.php'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Now, when users of your package execute Laravel's <code class=" language-php">vendor<span class="token punctuation">:</span>publish</code> command, your file will be copied to the specified location. Of course, once your configuration has been published, it can be accessed like any other configuration file:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">config<span class="token punctuation">(</span></span><span class="token string">'courier.option'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also choose to merge your own package configuration file with the application's copy. This allows your users to include only the options they actually want to override in the published copy of the configuration. To merge the configurations, use the <code class=" language-php">mergeConfigFrom</code> method within your service provider's <code class=" language-php">register</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">mergeConfigFrom<span class="token punctuation">(</span></span>
        <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/config/courier.php'</span><span class="token punctuation">,</span> <span class="token string">'courier'</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="public-assets"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#public-assets">Public Assets</a></h2>
    <p>Your packages may have assets such as JavaScript, CSS, and images. To publish assets, use the <code class=" language-php">publishes</code> method from your service provider's <code class=" language-php">boot</code> method. In this example, we will also add a "public" asset group tag.</p>
<pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">publishes<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/path/to/assets'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">public_path<span class="token punctuation">(</span></span><span class="token string">'vendor/courier'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'public'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Now, when your package's users execute the <code class=" language-php">vendor<span class="token punctuation">:</span>publish</code> command, your files will be copied to the specified location. Since you typically will need to overwrite the assets every time the package is updated, you may use the <code class=" language-php"><span class="token operator">--</span>force</code> flag:</p>
    <pre class=" language-php"><code class=" language-php">php artisan vendor<span class="token punctuation">:</span>publish <span class="token operator">--</span>tag<span class="token operator">=</span><span class="token keyword">public</span> <span class="token operator">--</span>force</code></pre>
    <p>If you would like to make sure your public assets are always up-to-date, you can add this command to the <code class=" language-php">post<span class="token operator">-</span>update<span class="token operator">-</span>cmd</code> list in your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file.</p>
    <p><a name="publishing-file-groups"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#publishing-file-groups">Publishing File Groups</a></h2>
    <p>You may want to publish groups of files separately. For instance, you might want your users to be able to publish your package's configuration files and asset files separately. You can do this by 'tagging' them:</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">// Publish a config file
</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">publishes<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/../config/package.php'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">config_path<span class="token punctuation">(</span></span><span class="token string">'package.php'</span><span class="token punctuation">)</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'config'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Publish your migrations
</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">publishes<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/../database/migrations/'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">database_path<span class="token punctuation">(</span></span><span class="token string">'/migrations'</span><span class="token punctuation">)</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'migrations'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You can then publish these files separately by referencing their tag like so:</p>
    <pre class=" language-php"><code class=" language-php">php artisan vendor<span class="token punctuation">:</span>publish <span class="token operator">--</span>provider<span class="token operator">=</span><span class="token string">"Vendor\Providers\PackageServiceProvider"</span> <span class="token operator">--</span>tag<span class="token operator">=</span><span class="token string">"config"</span></code></pre>
    <p><a name="routing"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/packages#routing">Routing</a></h2>
    <p>To load a routes file for your package, simply <code class=" language-php"><span class="token keyword">include</span></code> it from within your service provider's <code class=" language-php">boot</code> method.</p>
    <h4>Including A Routes File From A Service Provider</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">include</span> <span class="token constant">__DIR__</span><span class="token punctuation">.</span><span class="token string">'/../../routes.php'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> If your package is using controllers, you will need to make sure they are properly configured in your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file's auto-load section.</p>
    </blockquote>
</article>
@stop