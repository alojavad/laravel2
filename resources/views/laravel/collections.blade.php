<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Collections</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/collections#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/collections#basic-usage">Basic Usage</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/collections#introduction">Introduction</a></h2>
    <p>The <code class=" language-php">Illuminate\<span class="token package">Support<span class="token punctuation">\</span>Collection</span></code> class provides a fluent, convenient wrapper for working with arrays of data. For example, check out the following code. We'll use the <code class=" language-php">collect</code> helper to create a new collection instance from the array:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$collection</span> <span class="token operator">=</span> <span class="token function">collect<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'taylor'</span><span class="token punctuation">,</span> <span class="token string">'abigail'</span><span class="token punctuation">,</span> <span class="token keyword">null</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">map<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$name</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">strtoupper<span class="token punctuation">(</span></span><span class="token variable">$name</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">reject<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$name</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">empty<span class="token punctuation">(</span></span><span class="token variable">$name</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>As you can see, the <code class=" language-php">Collection</code> class allows you to chain its methods to perform fluent mapping and reducing of the underlying array. In general, every <code class=" language-php">Collection</code> method returns an entirely new <code class=" language-php">Collection</code> instance. To dig in further, keep reading!</p>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/collections#basic-usage">Basic Usage</a></h2>
    <h4>Creating Collections</h4>
    <p>As mentioned above, the <code class=" language-php">collect</code> helper will return a new <code class=" language-php">Illuminate\<span class="token package">Support<span class="token punctuation">\</span>Collection</span></code> instance for the given array. You may also use the <code class=" language-php">make</code> command on the <code class=" language-php">Collection</code> class:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$collection</span> <span class="token operator">=</span> <span class="token function">collect<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$collection</span> <span class="token operator">=</span> <span class="token scope">Collection<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Of course, collections of <a href="http://laravel.com/docs/5.0/eloquent">Eloquent</a> objects are always returned as <code class=" language-php">Collection</code> instances; however, you should feel free to use the <code class=" language-php">Collection</code> class wherever it is convenient for your application.</p>
    <h4>Explore The Collection</h4>
    <p>Instead of listing all of the methods (there are a lot) the Collection makes available, check out the <a href="http://laravel.com/api/master/Illuminate/Support/Collection.html">API documentation for the class</a>!</p>
</article>
@stop