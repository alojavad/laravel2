<!-- -->
@extends('master')

@section('content')
<article>
<h1>Helper Functions</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/helpers#arrays">Arrays</a></li>
    <li><a href="http://laravel.com/docs/5.0/helpers#paths">Paths</a></li>
    <li><a href="http://laravel.com/docs/5.0/helpers#routing">Routing</a></li>
    <li><a href="http://laravel.com/docs/5.0/helpers#strings">Strings</a></li>
    <li><a href="http://laravel.com/docs/5.0/helpers#urls">URLs</a></li>
    <li><a href="http://laravel.com/docs/5.0/helpers#miscellaneous">Miscellaneous</a></li>
</ul>
<p><a name="arrays"></a></p>
<h2><a href="http://laravel.com/docs/5.0/helpers#arrays">Arrays</a></h2>
<h3>array_add</h3>
<p>The <code class=" language-php">array_add</code> function adds a given key / value pair to the array if the given key doesn't already exist in the array.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'foo'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'bar'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_add<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'key'</span><span class="token punctuation">,</span> <span class="token string">'value'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_divide</h3>
<p>The <code class=" language-php">array_divide</code> function returns two arrays, one containing the keys, and the other containing the values of the original array.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'foo'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'bar'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token function">list<span class="token punctuation">(</span></span><span class="token variable">$keys</span><span class="token punctuation">,</span> <span class="token variable">$values</span><span class="token punctuation">)</span> <span class="token operator">=</span> <span class="token function">array_divide<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_dot</h3>
<p>The <code class=" language-php">array_dot</code> function flattens a multi-dimensional array into a single level array that uses "dot" notation to indicate depth.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'foo'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'bar'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'baz'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_dot<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// ['foo.bar' =&gt; 'baz'];</span></code></pre>
<h3>array_except</h3>
<p>The <code class=" language-php">array_except</code> method removes the given key / value pairs from the array.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_except<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'keys'</span><span class="token punctuation">,</span> <span class="token string">'to'</span><span class="token punctuation">,</span> <span class="token string">'remove'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_fetch</h3>
<p>The <code class=" language-php">array_fetch</code> method returns a flattened array containing the selected nested element.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token punctuation">[</span><span class="token string">'developer'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Taylor'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'developer'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">]</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_fetch<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'developer.name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// ['Taylor', 'Dayle'];</span></code></pre>
<h3>array_first</h3>
<p>The <code class=" language-php">array_first</code> method returns the first element of an array passing a given truth test.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token number">100</span><span class="token punctuation">,</span> <span class="token number">200</span><span class="token punctuation">,</span> <span class="token number">300</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">array_first<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$key</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$value</span> <span class="token operator">&gt;=</span> <span class="token number">150</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>A default value may also be passed as the third parameter:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">array_first<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token variable">$callback</span><span class="token punctuation">,</span> <span class="token variable">$default</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_last</h3>
<p>The <code class=" language-php">array_last</code> method returns the last element of an array passing a given truth test.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token number">350</span><span class="token punctuation">,</span> <span class="token number">400</span><span class="token punctuation">,</span> <span class="token number">500</span><span class="token punctuation">,</span> <span class="token number">300</span><span class="token punctuation">,</span> <span class="token number">200</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">array_last<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$key</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$value</span> <span class="token operator">&gt;</span> <span class="token number">350</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// 500</span></code></pre>
<p>A default value may also be passed as the third parameter:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">array_last<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token variable">$callback</span><span class="token punctuation">,</span> <span class="token variable">$default</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_flatten</h3>
<p>The <code class=" language-php">array_flatten</code> method will flatten a multi-dimensional array into a single level.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Joe'</span><span class="token punctuation">,</span> <span class="token string">'languages'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'PHP'</span><span class="token punctuation">,</span> <span class="token string">'Ruby'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_flatten<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// ['Joe', 'PHP', 'Ruby'];</span></code></pre>
<h3>array_forget</h3>
<p>The <code class=" language-php">array_forget</code> method will remove a given key / value pair from a deeply nested array using "dot" notation.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'names'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'joe'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'programmer'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token function">array_forget<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'names.joe'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_get</h3>
<p>The <code class=" language-php">array_get</code> method will retrieve a given value from a deeply nested array using "dot" notation.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'names'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'joe'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'programmer'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">array_get<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'names.joe'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">array_get<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'names.john'</span><span class="token punctuation">,</span> <span class="token string">'default'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> Want something like <code class=" language-php">array_get</code> but for objects instead? Use <code class=" language-php">object_get</code>.</p>
</blockquote>
<h3>array_only</h3>
<p>The <code class=" language-php">array_only</code> method will return only the specified key / value pairs from the array.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Joe'</span><span class="token punctuation">,</span> <span class="token string">'age'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">27</span><span class="token punctuation">,</span> <span class="token string">'votes'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_only<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'votes'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_pluck</h3>
<p>The <code class=" language-php">array_pluck</code> method will pluck a list of the given key / value pairs from the array.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Taylor'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_pluck<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// ['Taylor', 'Dayle'];</span></code></pre>
<h3>array_pull</h3>
<p>The <code class=" language-php">array_pull</code> method will return a given key / value pair from the array, as well as remove it.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Taylor'</span><span class="token punctuation">,</span> <span class="token string">'age'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">27</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$name</span> <span class="token operator">=</span> <span class="token function">array_pull<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_set</h3>
<p>The <code class=" language-php">array_set</code> method will set a value within a deeply nested array using "dot" notation.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'names'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'programmer'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Joe'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token function">array_set<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token string">'names.editor'</span><span class="token punctuation">,</span> <span class="token string">'Taylor'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_sort</h3>
<p>The <code class=" language-php">array_sort</code> method sorts the array by the results of the given Closure.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Jill'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Barry'</span><span class="token punctuation">]</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_values<span class="token punctuation">(</span></span><span class="token function">array_sort<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$value</span><span class="token punctuation">[</span><span class="token string">'name'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>array_where</h3>
<p>Filter the array using the given Closure.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$array</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token number">100</span><span class="token punctuation">,</span> <span class="token string">'200'</span><span class="token punctuation">,</span> <span class="token number">300</span><span class="token punctuation">,</span> <span class="token string">'400'</span><span class="token punctuation">,</span> <span class="token number">500</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$array</span> <span class="token operator">=</span> <span class="token function">array_where<span class="token punctuation">(</span></span><span class="token variable">$array</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$key</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">is_string<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Array ( [1] =&gt; 200 [3] =&gt; 400 )</span></code></pre>
<h3>head</h3>
<p>Return the first element in the array.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$first</span> <span class="token operator">=</span> <span class="token function">head<span class="token punctuation">(</span></span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">returnsArray<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>last</h3>
<p>Return the last element in the array. Useful for method chaining.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$last</span> <span class="token operator">=</span> <span class="token function">last<span class="token punctuation">(</span></span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">returnsArray<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="paths"></a></p>
<h2><a href="http://laravel.com/docs/5.0/helpers#paths">Paths</a></h2>
<h3>app_path</h3>
<p>Get the fully qualified path to the <code class=" language-php">app</code> directory.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$path</span> <span class="token operator">=</span> <span class="token function">app_path<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>base_path</h3>
<p>Get the fully qualified path to the root of the application install.</p>
<h3>public_path</h3>
<p>Get the fully qualified path to the <code class=" language-php"><span class="token keyword">public</span></code> directory.</p>
<h3>storage_path</h3>
<p>Get the fully qualified path to the <code class=" language-php">storage</code> directory.</p>
<p><a name="routing"></a></p>
<h2><a href="http://laravel.com/docs/5.0/helpers#routing">Routing</a></h2>
<h3>get</h3>
<p>Register a new GET route with the router.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span> <span class="token keyword">return</span> <span class="token string">'Hello World'</span><span class="token punctuation">;</span> <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>post</h3>
<p>Register a new POST route with the router.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">post<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token string">'FooController@action'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>put</h3>
<p>Register a new PUT route with the router.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">put<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token string">'FooController@action'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>patch</h3>
<p>Register a new PATCH route with the router.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">patch<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token string">'FooController@action'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>delete</h3>
<p>Register a new DELETE route with the router.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">delete<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token string">'FooController@action'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>resource</h3>
<p>Register a new RESTful resource route with the router.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token string">'FooController'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="strings"></a></p>
<h2><a href="http://laravel.com/docs/5.0/helpers#strings">Strings</a></h2>
<h3>camel_case</h3>
<p>Convert the given string to <code class=" language-php">camelCase</code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$camel</span> <span class="token operator">=</span> <span class="token function">camel_case<span class="token punctuation">(</span></span><span class="token string">'foo_bar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// fooBar</span></code></pre>
<h3>class_basename</h3>
<p>Get the class name of the given class, without any namespace names.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$class</span> <span class="token operator">=</span> <span class="token function">class_basename<span class="token punctuation">(</span></span><span class="token string">'Foo\Bar\Baz'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Baz</span></code></pre>
<h3>e</h3>
<p>Run <code class=" language-php">htmlentities</code> over the given string, with UTF-8 support.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$entities</span> <span class="token operator">=</span> <span class="token function">e<span class="token punctuation">(</span></span>'<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>html</span><span class="token punctuation">&gt;</span></span></span>foo<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>html</span><span class="token punctuation">&gt;</span></span></span>'<span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>ends_with</h3>
<p>Determine if the given haystack ends with a given needle.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">ends_with<span class="token punctuation">(</span></span><span class="token string">'This is my name'</span><span class="token punctuation">,</span> <span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>snake_case</h3>
<p>Convert the given string to <code class=" language-php">snake_case</code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$snake</span> <span class="token operator">=</span> <span class="token function">snake_case<span class="token punctuation">(</span></span><span class="token string">'fooBar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// foo_bar</span></code></pre>
<h3>str_limit</h3>
<p>Limit the number of characters in a string.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">str_limit<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">,</span> <span class="token variable">$limit</span> <span class="token operator">=</span> <span class="token number">100</span><span class="token punctuation">,</span> <span class="token variable">$end</span> <span class="token operator">=</span> <span class="token string">'...'</span><span class="token punctuation">)</span></code></pre>
<p>Example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">str_limit<span class="token punctuation">(</span></span><span class="token string">'The PHP framework for web artisans.'</span><span class="token punctuation">,</span> <span class="token number">7</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// The PHP...</span></code></pre>
<h3>starts_with</h3>
<p>Determine if the given haystack begins with the given needle.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">starts_with<span class="token punctuation">(</span></span><span class="token string">'This is my name'</span><span class="token punctuation">,</span> <span class="token string">'This'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>str_contains</h3>
<p>Determine if the given haystack contains the given needle.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">str_contains<span class="token punctuation">(</span></span><span class="token string">'This is my name'</span><span class="token punctuation">,</span> <span class="token string">'my'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>str_finish</h3>
<p>Add a single instance of the given needle to the haystack. Remove any extra instances.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$string</span> <span class="token operator">=</span> <span class="token function">str_finish<span class="token punctuation">(</span></span><span class="token string">'this/string'</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// this/string/</span></code></pre>
<h3>str_is</h3>
<p>Determine if a given string matches a given pattern. Asterisks may be used to indicate wildcards.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">str_is<span class="token punctuation">(</span></span><span class="token string">'foo*'</span><span class="token punctuation">,</span> <span class="token string">'foobar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>str_plural</h3>
<p>Convert a string to its plural form (English only).</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$plural</span> <span class="token operator">=</span> <span class="token function">str_plural<span class="token punctuation">(</span></span><span class="token string">'car'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>str_random</h3>
<p>Generate a random string of the given length.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$string</span> <span class="token operator">=</span> <span class="token function">str_random<span class="token punctuation">(</span></span><span class="token number">40</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>str_singular</h3>
<p>Convert a string to its singular form (English only).</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$singular</span> <span class="token operator">=</span> <span class="token function">str_singular<span class="token punctuation">(</span></span><span class="token string">'cars'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>str_slug</h3>
<p>Generate a URL friendly "slug" from a given string.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">str_slug<span class="token punctuation">(</span></span><span class="token variable">$title</span><span class="token punctuation">,</span> <span class="token variable">$separator</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$title</span> <span class="token operator">=</span> <span class="token function">str_slug<span class="token punctuation">(</span></span><span class="token string">"Laravel 5 Framework"</span><span class="token punctuation">,</span> <span class="token string">"-"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// laravel-5-framework</span></code></pre>
<h3>studly_case</h3>
<p>Convert the given string to <code class=" language-php">StudlyCase</code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">studly_case<span class="token punctuation">(</span></span><span class="token string">'foo_bar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// FooBar</span></code></pre>
<h3>trans</h3>
<p>Translate a given language line. Alias of <code class=" language-php"><span class="token scope">Lang<span class="token punctuation">::</span></span>get</code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">trans<span class="token punctuation">(</span></span><span class="token string">'validation.required'</span><span class="token punctuation">)</span><span class="token punctuation">:</span></code></pre>
<h3>trans_choice</h3>
<p>Translate a given language line with inflection. Alias of <code class=" language-php"><span class="token scope">Lang<span class="token punctuation">::</span></span>choice</code>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">trans_choice<span class="token punctuation">(</span></span><span class="token string">'foo.bar'</span><span class="token punctuation">,</span> <span class="token variable">$count</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="urls"></a></p>
<h2><a href="http://laravel.com/docs/5.0/helpers#urls">URLs</a></h2>
<h3>action</h3>
<p>Generate a URL for a given controller action.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">action<span class="token punctuation">(</span></span><span class="token string">'HomeController@getIndex'</span><span class="token punctuation">,</span> <span class="token variable">$params</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>route</h3>
<p>Generate a URL for a given named route.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'routeName'</span><span class="token punctuation">,</span> <span class="token variable">$params</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>asset</h3>
<p>Generate a URL for an asset.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">asset<span class="token punctuation">(</span></span><span class="token string">'img/photo.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>secure_asset</h3>
<p>Generate a URL for an asset using HTTPS.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token function">secure_asset<span class="token punctuation">(</span></span><span class="token string">'foo/bar.zip'</span><span class="token punctuation">,</span> <span class="token variable">$title</span><span class="token punctuation">,</span> <span class="token variable">$attributes</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>secure_url</h3>
<p>Generate a fully qualified URL to a given path using HTTPS.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token function">secure_url<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>url</h3>
<p>Generate a fully qualified URL to the given path.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token function">url<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token variable">$secure</span> <span class="token operator">=</span> <span class="token keyword">null</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="miscellaneous"></a></p>
<h2><a href="http://laravel.com/docs/5.0/helpers#miscellaneous">Miscellaneous</a></h2>
<h3>csrf_token</h3>
<p>Get the value of the current CSRF token.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$token</span> <span class="token operator">=</span> <span class="token function">csrf_token<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>dd</h3>
<p>Dump the given variable and end execution of the script.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">dd<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>elixir</h3>
<p>Get the path to a versioned Elixir file.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">elixir<span class="token punctuation">(</span></span><span class="token variable">$file</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>env</h3>
<p>Gets the value of an environment variable or return a default value.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">env<span class="token punctuation">(</span></span><span class="token string">'APP_ENV'</span><span class="token punctuation">,</span> <span class="token string">'production'</span><span class="token punctuation">)</span></code></pre>
<h3>event</h3>
<p>Fire an event.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">event<span class="token punctuation">(</span></span><span class="token string">'my.event'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>value</h3>
<p>If the given value is a <code class=" language-php">Closure</code>, return the value returned by the <code class=" language-php">Closure</code>. Otherwise, return the value.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">value<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span> <span class="token keyword">return</span> <span class="token string">'bar'</span><span class="token punctuation">;</span> <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>view</h3>
<p>Get a View instance for the given view path.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'auth.login'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>with</h3>
<p>Return the given object.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">with<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">Foo</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">doWork<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop