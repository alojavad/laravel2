<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Encryption</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/encryption#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/encryption#basic-usage">Basic Usage</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/encryption#introduction">Introduction</a></h2>
    <p>Laravel provides facilities for strong AES encryption via the Mcrypt PHP extension.</p>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/encryption#basic-usage">Basic Usage</a></h2>
    <h4>Encrypting A Value</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$encrypted</span> <span class="token operator">=</span> <span class="token scope">Crypt<span class="token punctuation">::</span></span><span class="token function">encrypt<span class="token punctuation">(</span></span><span class="token string">'secret'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Be sure to set a 16, 24, or 32 character random string in the <code class=" language-php">key</code> option of the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> file. Otherwise, encrypted values will not be secure.</p>
    </blockquote>
    <h4>Decrypting A Value</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$decrypted</span> <span class="token operator">=</span> <span class="token scope">Crypt<span class="token punctuation">::</span></span><span class="token function">decrypt<span class="token punctuation">(</span></span><span class="token variable">$encryptedValue</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Setting The Cipher &amp; Mode</h4>
    <p>You may also set the cipher and mode used by the encrypter:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Crypt<span class="token punctuation">::</span></span><span class="token function">setMode<span class="token punctuation">(</span></span><span class="token string">'ctr'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Crypt<span class="token punctuation">::</span></span><span class="token function">setCipher<span class="token punctuation">(</span></span><span class="token variable">$cipher</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop