<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Pagination</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/pagination#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/pagination#usage">Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/pagination#appending-to-pagination-links">Appending To Pagination Links</a></li>
        <li><a href="http://laravel.com/docs/5.0/pagination#converting-to-json">Converting To JSON</a></li>
    </ul>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/pagination#configuration">Configuration</a></h2>
    <p>In other frameworks, pagination can be very painful. Laravel makes it a breeze. Laravel can generate an intelligent "range" of links based on the current page. The generated HTML is compatible with the Bootstrap CSS framework.</p>
    <p><a name="usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/pagination#usage">Usage</a></h2>
    <p>There are several ways to paginate items. The simplest is by using the <code class=" language-php">paginate</code> method on the query builder or an Eloquent model.</p>
    <h4>Paginating Database Results</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">paginate<span class="token punctuation">(</span></span><span class="token number">15</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Currently, pagination operations that use a <code class=" language-php">groupBy</code> statement cannot be executed efficiently by Laravel. If you need to use a <code class=" language-php">groupBy</code> with a paginated result set, it is recommended that you query the database and create a paginator manually.</p>
    </blockquote>
    <h4>Creating A Paginator Manually</h4>
    <p>Sometimes you may wish to create a pagination instance manually, passing it an array of items. You may do so by creating either an <code class=" language-php">Illuminate\<span class="token package">Pagination<span class="token punctuation">\</span>Paginator</span></code> or <code class=" language-php">Illuminate\<span class="token package">Pagination<span class="token punctuation">\</span>LengthAwarePaginator</span></code> instance, depending on your needs.</p>
    <h4>Paginating An Eloquent Model</h4>
    <p>You may also paginate <a href="http://laravel.com/docs/5.0/eloquent">Eloquent</a> models:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$allUsers</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">paginate<span class="token punctuation">(</span></span><span class="token number">15</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$someUsers</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">paginate<span class="token punctuation">(</span></span><span class="token number">15</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The argument passed to the <code class=" language-php">paginate</code> method is the number of items you wish to display per page. Once you have retrieved the results, you may display them on your view, and create the pagination links using the <code class=" language-php">render</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>container<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
        <span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$users</span> <span class="token keyword">as</span> <span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">:</span> <span class="token delimiter">?&gt;</span></span>
        <span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span>
        <span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">endforeach</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span></span>

        <span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">render<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span></code></pre>
    <p>This is all it takes to create a pagination system! Note that we did not have to inform the framework of the current page. Laravel will determine this for you automatically.</p>
    <p>You may also access additional pagination information via the following methods:</p>
    <ul>
        <li><code class=" language-php">currentPage</code></li>
        <li><code class=" language-php">lastPage</code></li>
        <li><code class=" language-php">perPage</code></li>
        <li><code class=" language-php">hasMorePages</code></li>
        <li><code class=" language-php">url</code></li>
        <li><code class=" language-php">nextPageUrl</code></li>
        <li><code class=" language-php">total</code></li>
        <li><code class=" language-php">count</code></li>
    </ul>
    <h4>"Simple Pagination"</h4>
    <p>If you are only showing "Next" and "Previous" links in your pagination view, you have the option of using the <code class=" language-php">simplePaginate</code> method to perform a more efficient query. This is useful for larger datasets when you do not require the display of exact page numbers on your view:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$someUsers</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">simplePaginate<span class="token punctuation">(</span></span><span class="token number">15</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Customizing The Paginator URI</h4>
    <p>You may also customize the URI used by the paginator via the <code class=" language-php">setPath</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">paginate<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">setPath<span class="token punctuation">(</span></span><span class="token string">'custom/url'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The example above will create URLs like the following: <a href="http://example.com/custom/url?page=2">http://example.com/custom/url?page=2</a></p>
    <p><a name="appending-to-pagination-links"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/pagination#appending-to-pagination-links">Appending To Pagination Links</a></h2>
    <p>You can add to the query string of pagination links using the <code class=" language-php">appends</code> method on the Paginator:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">appends<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'sort'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'votes'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">render<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span></code></pre>
    <p>This will generate URLs that look something like this:</p>
    <pre class=" language-php"><code class=" language-php">http<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>example<span class="token punctuation">.</span>com<span class="token operator">/</span>something<span class="token operator">?</span>page<span class="token operator">=</span><span class="token number">2</span><span class="token operator">&amp;</span>sort<span class="token operator">=</span>votes</code></pre>
    <p>If you wish to append a "hash fragment" to the paginator's URLs, you may use the <code class=" language-php">fragment</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">fragment<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">render<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span></code></pre>
    <p>This method call will generate URLs that look something like this:</p>
    <pre class=" language-php"><code class=" language-php">http<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>example<span class="token punctuation">.</span>com<span class="token operator">/</span>something<span class="token operator">?</span>page<span class="token operator">=</span><span class="token comment" spellcheck="true">2#foo</span></code></pre>
    <p><a name="converting-to-json"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/pagination#converting-to-json">Converting To JSON</a></h2>
    <p>The <code class=" language-php">Paginator</code> class implements the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>JsonableInterface</span></code> contract and exposes the <code class=" language-php">toJson</code> method. You may also convert a <code class=" language-php">Paginator</code> instance to JSON by returning it from a route. The JSON'd form of the instance will include some "meta" information such as <code class=" language-php">total</code>, <code class=" language-php">current_page</code>, and <code class=" language-php">last_page</code>. The instance's data will be available via the <code class=" language-php">data</code> key in the JSON array.</p>
</article>
@stop