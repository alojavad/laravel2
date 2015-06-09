<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Filesystem / Cloud Storage</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/filesystem#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/filesystem#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/filesystem#basic-usage">Basic Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/filesystem#custom-filesystems">Custom Filesystems</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/filesystem#introduction">Introduction</a></h2>
    <p>Laravel provides a wonderful filesystem abstraction thanks to the <a href="https://github.com/thephpleague/flysystem">Flysystem</a> PHP package by Frank de Jonge. The Laravel Flysystem integration provides simple to use drivers for working with local filesystems, Amazon S3, and Rackspace Cloud Storage. Even better, it's amazingly simple to switch between these storage options as the API remains the same for each system!</p>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/filesystem#configuration">Configuration</a></h2>
    <p>The filesystem configuration file is located at <code class=" language-php">config<span class="token operator">/</span>filesystems<span class="token punctuation">.</span>php</code>. Within this file you may configure all of your "disks". Each disk represents a particular storage driver and storage location. Example configurations for each supported driver is included in the configuration file. So, simply modify the configuration to reflect your storage preferences and credentials!</p>
    <p>Before using the S3 or Rackspace drivers, you will need to install the appropriate package via Composer:</p>
    <ul>
        <li>Amazon S3: <code class=" language-php">league<span class="token operator">/</span>flysystem<span class="token operator">-</span>aws<span class="token operator">-</span>s3<span class="token operator">-</span>v2 <span class="token operator">~</span><span class="token number">1.0</span></code></li>
        <li>Rackspace: <code class=" language-php">league<span class="token operator">/</span>flysystem<span class="token operator">-</span>rackspace <span class="token operator">~</span><span class="token number">1.0</span></code></li>
    </ul>
    <p>Of course, you may configure as many disks as you like, and may even have multiple disks that use the same driver.</p>
    <p>When using the <code class=" language-php">local</code> driver, note that all file operations are relative to the <code class=" language-php">root</code> directory defined in your configuration file. By default, this value is set to the <code class=" language-php">storage<span class="token operator">/</span>app</code> directory. Therefore, the following method would store a file in <code class=" language-php">storage<span class="token operator">/</span>app<span class="token operator">/</span>file<span class="token punctuation">.</span>txt</code>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">disk<span class="token punctuation">(</span></span><span class="token string">'local'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">put<span class="token punctuation">(</span></span><span class="token string">'file.txt'</span><span class="token punctuation">,</span> <span class="token string">'Contents'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/filesystem#basic-usage">Basic Usage</a></h2>
    <p>The <code class=" language-php">Storage</code> facade may be used to interact with any of your configured disks. Alternatively, you may type-hint the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Filesystem<span class="token punctuation">\</span>Factory</span></code> contract on any class that is resolved via the Laravel <a href="http://laravel.com/docs/5.0/container">service container</a>.</p>
    <h4>Retrieving A Particular Disk</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$disk</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">disk<span class="token punctuation">(</span></span><span class="token string">'s3'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$disk</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">disk<span class="token punctuation">(</span></span><span class="token string">'local'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Determining If A File Exists</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$exists</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">disk<span class="token punctuation">(</span></span><span class="token string">'s3'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">exists<span class="token punctuation">(</span></span><span class="token string">'file.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Calling Methods On The Default Disk</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">exists<span class="token punctuation">(</span></span><span class="token string">'file.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Retrieving A File's Contents</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$contents</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'file.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Setting A File's Contents</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">put<span class="token punctuation">(</span></span><span class="token string">'file.jpg'</span><span class="token punctuation">,</span> <span class="token variable">$contents</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Prepend To A File</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">prepend<span class="token punctuation">(</span></span><span class="token string">'file.log'</span><span class="token punctuation">,</span> <span class="token string">'Prepended Text'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Append To A File</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">append<span class="token punctuation">(</span></span><span class="token string">'file.log'</span><span class="token punctuation">,</span> <span class="token string">'Appended Text'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Delete A File</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token string">'file.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'file1.jpg'</span><span class="token punctuation">,</span> <span class="token string">'file2.jpg'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Copy A File To A New Location</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">copy<span class="token punctuation">(</span></span><span class="token string">'old/file1.jpg'</span><span class="token punctuation">,</span> <span class="token string">'new/file1.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Move A File To A New Location</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">move<span class="token punctuation">(</span></span><span class="token string">'old/file1.jpg'</span><span class="token punctuation">,</span> <span class="token string">'new/file1.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Get File Size</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$size</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">size<span class="token punctuation">(</span></span><span class="token string">'file1.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Get The Last Modification Time (UNIX)</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$time</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">lastModified<span class="token punctuation">(</span></span><span class="token string">'file1.jpg'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Get All Files Within A Directory</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$files</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">files<span class="token punctuation">(</span></span><span class="token variable">$directory</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Recursive...
</span><span class="token variable">$files</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">allFiles<span class="token punctuation">(</span></span><span class="token variable">$directory</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Get All Directories Within A Directory</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$directories</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">directories<span class="token punctuation">(</span></span><span class="token variable">$directory</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Recursive...
</span><span class="token variable">$directories</span> <span class="token operator">=</span> <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">allDirectories<span class="token punctuation">(</span></span><span class="token variable">$directory</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Create A Directory</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">makeDirectory<span class="token punctuation">(</span></span><span class="token variable">$directory</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Delete A Directory</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">deleteDirectory<span class="token punctuation">(</span></span><span class="token variable">$directory</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="custom-filesystems"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/filesystem#custom-filesystems">Custom Filesystems</a></h2>
    <p>Laravel's Flysystem integration provides drivers for several "drivers" out of the box; however, Flysystem is not limited to these and has adapters for many other storage systems. You can create a custom driver if you want to use one of these additional adapters in your Laravel application. Don't worry, it's not too hard!</p>
    <p>In order to set up the custom filesystem you will need to create a service provider such as <code class=" language-php">DropboxFilesystemServiceProvider</code>. In the provider's <code class=" language-php">boot</code> method, you can inject an instance of the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Filesystem<span class="token punctuation">\</span>Factory</span></code> contract and call the <code class=" language-php">extend</code> method of the injected instance. Alternatively, you may use the <code class=" language-php">Disk</code> facade's <code class=" language-php">extend</code> method.</p>
    <p>The first argument of the <code class=" language-php">extend</code> method is the name of the driver and the second is a Closure that receives the <code class=" language-php"><span class="token variable">$app</span></code> and <code class=" language-php"><span class="token variable">$config</span></code> variables. The resolver Closure must return an instance of <code class=" language-php">League\<span class="token package">Flysystem<span class="token punctuation">\</span>Filesystem</span></code>.</p>
    <blockquote>
        <p><strong>Note:</strong> The $config variable will already contain the values defined in <code class=" language-php">config<span class="token operator">/</span>filesystems<span class="token punctuation">.</span>php</code> for the specified disk.</p>
    </blockquote>
    <h4>Dropbox Example</h4>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Providers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Storage</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">League<span class="token punctuation">\</span>Flysystem<span class="token punctuation">\</span>Filesystem</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Dropbox<span class="token punctuation">\</span>Client</span> <span class="token keyword">as</span> DropboxClient<span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">League<span class="token punctuation">\</span>Flysystem<span class="token punctuation">\</span>Dropbox<span class="token punctuation">\</span>DropboxAdapter</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>ServiceProvider</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">DropboxFilesystemServiceProvider</span> <span class="token keyword">extends</span> <span class="token class-name">ServiceProvider</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Storage<span class="token punctuation">::</span></span><span class="token function">extend<span class="token punctuation">(</span></span><span class="token string">'dropbox'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$app</span><span class="token punctuation">,</span> <span class="token variable">$config</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$client</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">DropboxClient</span><span class="token punctuation">(</span><span class="token variable">$config</span><span class="token punctuation">[</span><span class="token string">'accessToken'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token variable">$config</span><span class="token punctuation">[</span><span class="token string">'clientIdentifier'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">Filesystem</span><span class="token punctuation">(</span><span class="token keyword">new</span> <span class="token class-name">DropboxAdapter</span><span class="token punctuation">(</span><span class="token variable">$client</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">register<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
</article>
@stop