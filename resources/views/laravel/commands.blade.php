<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Artisan Development</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/commands#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/commands#building-a-command">Building A Command</a></li>
        <li><a href="http://laravel.com/docs/5.0/commands#registering-commands">Registering Commands</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/commands#introduction">Introduction</a></h2>
    <p>In addition to the commands provided with Artisan, you may also build your own custom commands for working with your application. You may store your custom commands in the <code class=" language-php">app<span class="token operator">/</span>Console<span class="token operator">/</span>Commands</code> directory; however, you are free to choose your own storage location as long as your commands can be autoloaded based on your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> settings.</p>
    <p><a name="building-a-command"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/commands#building-a-command">Building A Command</a></h2>
    <h3>Generating The Class</h3>
    <p>To create a new command, you may use the <code class=" language-php">make<span class="token punctuation">:</span>console</code> Artisan command, which will generate a command stub to help you get started:</p>
    <h4>Generate A New Command Class</h4>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>console FooCommand</code></pre>
    <p>The command above would generate a class at <code class=" language-php">app<span class="token operator">/</span>Console<span class="token operator">/</span>FooCommand<span class="token punctuation">.</span>php</code>.</p>
    <p>When creating the command, the <code class=" language-php"><span class="token operator">--</span>command</code> option may be used to assign the terminal command name:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>console AssignUsers <span class="token operator">--</span>command<span class="token operator">=</span>users<span class="token punctuation">:</span>assign</code></pre>
    <h3>Writing The Command</h3>
    <p>Once your command is generated, you should fill out the <code class=" language-php">name</code> and <code class=" language-php">description</code> properties of the class, which will be used when displaying your command on the <code class=" language-php">list</code> screen.</p>
    <p>The <code class=" language-php">fire</code> method will be called when your command is executed. You may place any command logic in this method.</p>
    <h3>Arguments &amp; Options</h3>
    <p>The <code class=" language-php">getArguments</code> and <code class=" language-php">getOptions</code> methods are where you may define any arguments or options your command receives. Both of these methods return an array of commands, which are described by a list of array options.</p>
    <p>When defining <code class=" language-php">arguments</code>, the array definition values represent the following:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">[</span><span class="token variable">$name</span><span class="token punctuation">,</span> <span class="token variable">$mode</span><span class="token punctuation">,</span> <span class="token variable">$description</span><span class="token punctuation">,</span> <span class="token variable">$defaultValue</span><span class="token punctuation">]</span></code></pre>
    <p>The argument <code class=" language-php">mode</code> may be any of the following: <code class=" language-php"><span class="token scope">InputArgument<span class="token punctuation">::</span></span><span class="token constant">REQUIRED</span></code> or <code class=" language-php"><span class="token scope">InputArgument<span class="token punctuation">::</span></span><span class="token constant">OPTIONAL</span></code>.</p>
    <p>When defining <code class=" language-php">options</code>, the array definition values represent the following:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">[</span><span class="token variable">$name</span><span class="token punctuation">,</span> <span class="token variable">$shortcut</span><span class="token punctuation">,</span> <span class="token variable">$mode</span><span class="token punctuation">,</span> <span class="token variable">$description</span><span class="token punctuation">,</span> <span class="token variable">$defaultValue</span><span class="token punctuation">]</span></code></pre>
    <p>For options, the argument <code class=" language-php">mode</code> may be: <code class=" language-php"><span class="token scope">InputOption<span class="token punctuation">::</span></span><span class="token constant">VALUE_REQUIRED</span></code>, <code class=" language-php"><span class="token scope">InputOption<span class="token punctuation">::</span></span><span class="token constant">VALUE_OPTIONAL</span></code>, <code class=" language-php"><span class="token scope">InputOption<span class="token punctuation">::</span></span><span class="token constant">VALUE_IS_ARRAY</span></code>, <code class=" language-php"><span class="token scope">InputOption<span class="token punctuation">::</span></span><span class="token constant">VALUE_NONE</span></code>.</p>
    <p>The <code class=" language-php"><span class="token constant">VALUE_IS_ARRAY</span></code> mode indicates that the switch may be used multiple times when calling the command:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">InputOption<span class="token punctuation">::</span></span><span class="token constant">VALUE_REQUIRED</span> <span class="token operator">|</span> <span class="token scope">InputOption<span class="token punctuation">::</span></span><span class="token constant">VALUE_IS_ARRAY</span></code></pre>
    <p>Would then allow for this command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan foo <span class="token operator">--</span>option<span class="token operator">=</span>bar <span class="token operator">--</span>option<span class="token operator">=</span>baz</code></pre>
    <p>The <code class=" language-php"><span class="token constant">VALUE_NONE</span></code> option indicates that the option is simply used as a "switch":</p>
    <pre class=" language-php"><code class=" language-php">php artisan foo <span class="token operator">--</span>option</code></pre>
    <h3>Retrieving Input</h3>
    <p>While your command is executing, you will obviously need to access the values for the arguments and options accepted by your application. To do so, you may use the <code class=" language-php">argument</code> and <code class=" language-php">option</code> methods:</p>
    <h4>Retrieving The Value Of A Command Argument</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">argument<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving All Arguments</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$arguments</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">argument<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving The Value Of A Command Option</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">option<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving All Options</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$options</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">option<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>Writing Output</h3>
    <p>To send output to the console, you may use the <code class=" language-php">info</code>, <code class=" language-php">comment</code>, <code class=" language-php">question</code> and <code class=" language-php">error</code> methods. Each of these methods will use the appropriate ANSI colors for their purpose.</p>
    <h4>Sending Information To The Console</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">info<span class="token punctuation">(</span></span><span class="token string">'Display this on the screen'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Sending An Error Message To The Console</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">error<span class="token punctuation">(</span></span><span class="token string">'Something went wrong!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>Asking Questions</h3>
    <p>You may also use the <code class=" language-php">ask</code> and <code class=" language-php">confirm</code> methods to prompt the user for input:</p>
    <h4>Asking The User For Input</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">ask<span class="token punctuation">(</span></span><span class="token string">'What is your name?'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Asking The User For Secret Input</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$password</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">secret<span class="token punctuation">(</span></span><span class="token string">'What is the password?'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Asking The User For Confirmation</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">confirm<span class="token punctuation">(</span></span><span class="token string">'Do you wish to continue? [yes|no]'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>You may also specify a default value to the <code class=" language-php">confirm</code> method, which should be <code class=" language-php"><span class="token boolean">true</span></code> or <code class=" language-php"><span class="token boolean">false</span></code>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">confirm<span class="token punctuation">(</span></span><span class="token variable">$question</span><span class="token punctuation">,</span> <span class="token boolean">true</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>Calling Other Commands</h3>
    <p>Sometimes you may wish to call other commands from your command. You may do so using the <code class=" language-php">call</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'command:name'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'argument'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token string">'--option'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'bar'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="registering-commands"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/commands#registering-commands">Registering Commands</a></h2>
    <h4>Registering An Artisan Command</h4>
    <p>Once your command is finished, you need to register it with Artisan so it will be available for use. This is typically done in the <code class=" language-php">app<span class="token operator">/</span>Console<span class="token operator">/</span>Kernel<span class="token punctuation">.</span>php</code> file. Within this file, you will find a list of commands in the <code class=" language-php">commands</code> property. To register your command, simply add it to this list. When Artisan boots, all the commands listed in this property will be resolved by the <a href="http://laravel.com/docs/5.0/container">service container</a> and registered with Artisan.</p>
</article>
@stop