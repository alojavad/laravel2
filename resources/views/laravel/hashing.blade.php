<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Hashing</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/hashing#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/hashing#basic-usage">Basic Usage</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/hashing#introduction">Introduction</a></h2>
    <p>The Laravel <code class=" language-php">Hash</code> facade provides secure Bcrypt hashing for storing user passwords. If you are using the <code class=" language-php">AuthController</code> controller that is included with your Laravel application, it will be take care of verifying the Bcrypt password against the un-hashed version provided by the user.</p>
    <p>Likewise, the user <code class=" language-php">Registrar</code> service that ships with Laravel makes the proper <code class=" language-php">bcrypt</code> function call to hash stored passwords.</p>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/hashing#basic-usage">Basic Usage</a></h2>
    <h4>Hashing A Password Using Bcrypt</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$password</span> <span class="token operator">=</span> <span class="token scope">Hash<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token string">'secret'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also use the <code class=" language-php">bcrypt</code> helper function:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$password</span> <span class="token operator">=</span> <span class="token function">bcrypt<span class="token punctuation">(</span></span><span class="token string">'secret'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Verifying A Password Against A Hash</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Hash<span class="token punctuation">::</span></span><span class="token function">check<span class="token punctuation">(</span></span><span class="token string">'secret'</span><span class="token punctuation">,</span> <span class="token variable">$hashedPassword</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The passwords match...
</span><span class="token punctuation">}</span></code></pre>
    <h4>Checking If A Password Needs To Be Rehashed</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Hash<span class="token punctuation">::</span></span><span class="token function">needsRehash<span class="token punctuation">(</span></span><span class="token variable">$hashed</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$hashed</span> <span class="token operator">=</span> <span class="token scope">Hash<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token string">'secret'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
</article>
@stop