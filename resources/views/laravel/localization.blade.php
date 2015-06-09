<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Localization</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/localization#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/localization#language-files">Language Files</a></li>
        <li><a href="http://laravel.com/docs/5.0/localization#basic-usage">Basic Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/localization#pluralization">Pluralization</a></li>
        <li><a href="http://laravel.com/docs/5.0/localization#validation">Validation Localization</a></li>
        <li><a href="http://laravel.com/docs/5.0/localization#overriding-package-language-files">Overriding Package Language Files</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/localization#introduction">Introduction</a></h2>
    <p>The Laravel <code class=" language-php">Lang</code> facade provides a convenient way of retrieving strings in various languages, allowing you to easily support multiple languages within your application.</p>
    <p><a name="language-files"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/localization#language-files">Language Files</a></h2>
    <p>Language strings are stored in files within the <code class=" language-php">resources<span class="token operator">/</span>lang</code> directory. Within this directory there should be a subdirectory for each language supported by the application.</p>
<pre class=" language-php"><code class=" language-php"><span class="token operator">/</span>resources
        <span class="token operator">/</span>lang
        <span class="token operator">/</span>en
        messages<span class="token punctuation">.</span>php
        <span class="token operator">/</span>es
        messages<span class="token punctuation">.</span>php</code></pre>
    <h4>Example Language File</h4>
    <p>Language files simply return an array of keyed strings. For example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span>

        <span class="token keyword">return</span> <span class="token punctuation">[</span>
        <span class="token string">'welcome'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Welcome to our application'</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
    <h4>Changing The Default Language At Runtime</h4>
    <p>The default language for your application is stored in the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file. You may change the active language at any time using the <code class=" language-php"><span class="token scope">App<span class="token punctuation">::</span></span>setLocale</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">App<span class="token punctuation">::</span></span><span class="token function">setLocale<span class="token punctuation">(</span></span><span class="token string">'es'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Setting The Fallback Language</h4>
    <p>You may also configure a "fallback language", which will be used when the active language does not contain a given language line. Like the default language, the fallback language is also configured in the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token string">'fallback_locale'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'en'</span><span class="token punctuation">,</span></code></pre>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/localization#basic-usage">Basic Usage</a></h2>
    <h4>Retrieving Lines From A Language File</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token scope">Lang<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'messages.welcome'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The first segment of the string passed to the <code class=" language-php">get</code> method is the name of the language file, and the second is the name of the line that should be retrieved.</p>
    <blockquote>
        <p><strong>Note:</strong> If a language line does not exist, the key will be returned by the <code class=" language-php">get</code> method.</p>
    </blockquote>
    <p>You may also use the <code class=" language-php">trans</code> helper function, which is an alias for the <code class=" language-php"><span class="token scope">Lang<span class="token punctuation">::</span></span>get</code> method.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token function">trans<span class="token punctuation">(</span></span><span class="token string">'messages.welcome'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Making Replacements In Lines</h4>
    <p>You may also define place-holders in your language lines:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token string">'welcome'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Welcome, :name'</span><span class="token punctuation">,</span></code></pre>
    <p>Then, pass a second argument of replacements to the <code class=" language-php"><span class="token scope">Lang<span class="token punctuation">::</span></span>get</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token scope">Lang<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'messages.welcome'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Determine If A Language File Contains A Line</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Lang<span class="token punctuation">::</span></span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'messages.welcome'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p><a name="pluralization"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/localization#pluralization">Pluralization</a></h2>
    <p>Pluralization is a complex problem, as different languages have a variety of complex rules for pluralization. You may easily manage this in your language files. By using a "pipe" character, you may separate the singular and plural forms of a string:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token string">'apples'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'There is one apple|There are many apples'</span><span class="token punctuation">,</span></code></pre>
    <p>You may then use the <code class=" language-php"><span class="token scope">Lang<span class="token punctuation">::</span></span>choice</code> method to retrieve the line:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token scope">Lang<span class="token punctuation">::</span></span><span class="token function">choice<span class="token punctuation">(</span></span><span class="token string">'messages.apples'</span><span class="token punctuation">,</span> <span class="token number">10</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also supply a locale argument to specify the language. For example, if you want to use the Russian (ru) language:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token scope">Lang<span class="token punctuation">::</span></span><span class="token function">choice<span class="token punctuation">(</span></span><span class="token string">'товар|товара|товаров'</span><span class="token punctuation">,</span> <span class="token variable">$count</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'ru'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Since the Laravel translator is powered by the Symfony Translation component, you may also create more explicit pluralization rules easily:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token string">'apples'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'{0} There are none|[1,19] There are some|[20,Inf] There are many'</span><span class="token punctuation">,</span></code></pre>
    <p><a name="validation"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/localization#validation">Validation</a></h2>
    <p>For localization for validation errors and messages, take a look at the <a href="http://laravel.com/docs/5.0/validation#localization">documentation on Validation</a>.</p>
    <p><a name="overriding-package-language-files"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/localization#overriding-package-language-files">Overriding Package Language Files</a></h2>
    <p>Many packages ship with their own language lines. Instead of hacking the package's core files to tweak these lines, you may override them by placing files in the <code class=" language-php">resources<span class="token operator">/</span>lang<span class="token operator">/</span>packages<span class="token operator">/</span><span class="token punctuation">{</span>locale<span class="token punctuation">}</span><span class="token operator">/</span><span class="token punctuation">{</span>package<span class="token punctuation">}</span></code> directory. So, for example, if you need to override the English language lines in <code class=" language-php">messages<span class="token punctuation">.</span>php</code> for a package named <code class=" language-php">skyrim<span class="token operator">/</span>hearthfire</code>, you would place a language file at: <code class=" language-php">resources<span class="token operator">/</span>lang<span class="token operator">/</span>packages<span class="token operator">/</span>en<span class="token operator">/</span>hearthfire<span class="token operator">/</span>messages<span class="token punctuation">.</span>php</code>. In this file you would define only the language lines you wish to override. Any language lines you don't override will still be loaded from the package's language files.</p>
</article>
@stop