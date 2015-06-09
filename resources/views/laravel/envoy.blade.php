<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Envoy Task Runner</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/envoy#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-installation">Installation</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-running-tasks">Running Tasks</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-multiple-servers">Multiple Servers</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-parallel-execution">Parallel Execution</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-task-macros">Task Macros</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-notifications">Notifications</a></li>
        <li><a href="http://laravel.com/docs/5.0/envoy#envoy-updating-envoy">Updating Envoy</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#introduction">Introduction</a></h2>
    <p><a href="https://github.com/laravel/envoy">Laravel Envoy</a> provides a clean, minimal syntax for defining common tasks you run on your remote servers. Using a Blade style syntax, you can easily setup tasks for deployment, Artisan commands, and more.</p>
    <blockquote>
        <p><strong>Note:</strong> Envoy requires PHP version 5.4 or greater, and only runs on Mac / Linux operating systems.</p>
    </blockquote>
    <p><a name="envoy-installation"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-installation">Installation</a></h2>
    <p>First, install Envoy using the Composer <code class=" language-php"><span class="token keyword">global</span></code> command:</p>
    <pre class=" language-php"><code class=" language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> <span class="token string">"laravel/envoy=~1.0"</span></code></pre>
    <p>Make sure to place the <code class=" language-php"><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>composer<span class="token operator">/</span>vendor<span class="token operator">/</span>bin</code> directory in your PATH so the <code class=" language-php">envoy</code> executable is found when you run the <code class=" language-php">envoy</code> command in your terminal.</p>
    <p>Next, create an <code class=" language-php">Envoy<span class="token punctuation">.</span>blade<span class="token punctuation">.</span>php</code> file in the root of your project. Here's an example to get you started:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">servers<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'web'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'on'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'web'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        ls <span class="token operator">-</span>la
        @endtask</code></pre>
    <p>As you can see, an array of <code class=" language-php">@servers</code> is defined at the top of the file. You can reference these servers in the <code class=" language-php">on</code> option of your task declarations. Within your <code class=" language-php">@task</code> declarations you should place the Bash code that will be run on your server when the task is executed.</p>
    <p>The <code class=" language-php">init</code> command may be used to easily create a stub Envoy file:</p>
    <pre class=" language-php"><code class=" language-php">envoy init user@<span class="token number">192.168</span><span class="token punctuation">.</span><span class="token number">1.1</span></code></pre>
    <p><a name="envoy-running-tasks"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-running-tasks">Running Tasks</a></h2>
    <p>To run a task, use the <code class=" language-php">run</code> command of your Envoy installation:</p>
    <pre class=" language-php"><code class=" language-php">envoy run foo</code></pre>
    <p>If needed, you may pass variables into the Envoy file using command line switches:</p>
    <pre class=" language-php"><code class=" language-php">envoy run deploy <span class="token operator">--</span>branch<span class="token operator">=</span>master</code></pre>
    <p>You may use the options via the Blade syntax you are used to:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">servers<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'web'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'deploy'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'on'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'web'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        cd site
        git pull origin <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$branch</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>
        php artisan migrate
        @endtask</code></pre>
    <h4>Bootstrapping</h4>
    <p>You may use the <code class=" language-php">@setup</code> directive to declare variables and do general PHP work inside the Envoy file:</p>
<pre class=" language-php"><code class=" language-php">@setup
        <span class="token variable">$now</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">DateTime</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$environment</span> <span class="token operator">=</span> <span class="token function">isset<span class="token punctuation">(</span></span><span class="token variable">$env</span><span class="token punctuation">)</span> <span class="token operator">?</span> <span class="token variable">$env</span> <span class="token punctuation">:</span> <span class="token string">"testing"</span><span class="token punctuation">;</span>
        @endsetup</code></pre>
    <p>You may also use <code class=" language-php">@<span class="token keyword">include</span></code> to include any PHP files:</p>
    <pre class=" language-php"><code class=" language-php">@<span class="token keyword">include</span><span class="token punctuation">(</span><span class="token string">'vendor/autoload.php'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Confirming Tasks Before Running</h4>
    <p>If you would like to be prompted for confirmation before running a given task on your servers, you may use the <code class=" language-php">confirm</code> directive:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'deploy'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'on'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'web'</span><span class="token punctuation">,</span> <span class="token string">'confirm'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token boolean">true</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        cd site
        git pull origin <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$branch</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>
        php artisan migrate
        @endtask</code></pre>
    <p><a name="envoy-multiple-servers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-multiple-servers">Multiple Servers</a></h2>
    <p>You may easily run a task across multiple servers. Simply list the servers in the task declaration:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">servers<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'web-1'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">,</span> <span class="token string">'web-2'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.2'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'deploy'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'on'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'web-1'</span><span class="token punctuation">,</span> <span class="token string">'web-2'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        cd site
        git pull origin <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$branch</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>
        php artisan migrate
        @endtask</code></pre>
    <p>By default, the task will be executed on each server serially. Meaning, the task will finish running on the first server before proceeding to execute on the next server.</p>
    <p><a name="envoy-parallel-execution"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-parallel-execution">Parallel Execution</a></h2>
    <p>If you would like to run a task across multiple servers in parallel, simply add the <code class=" language-php">parallel</code> option to your task declaration:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">servers<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'web-1'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">,</span> <span class="token string">'web-2'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.2'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'deploy'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'on'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'web-1'</span><span class="token punctuation">,</span> <span class="token string">'web-2'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'parallel'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token boolean">true</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        cd site
        git pull origin <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$branch</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>
        php artisan migrate
        @endtask</code></pre>
    <p><a name="envoy-task-macros"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-task-macros">Task Macros</a></h2>
    <p>Macros allow you to define a set of tasks to be run in sequence using a single command. For instance:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">servers<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'web'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>

        @<span class="token function">macro<span class="token punctuation">(</span></span><span class="token string">'deploy'</span><span class="token punctuation">)</span>
        foo
        bar
        @endmacro

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span>
        <span class="token keyword">echo</span> <span class="token string">"HELLO"</span>
        @endtask

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'bar'</span><span class="token punctuation">)</span>
        <span class="token keyword">echo</span> <span class="token string">"WORLD"</span>
        @endtask</code></pre>
    <p>The <code class=" language-php">deploy</code> macro can now be run via a single, simple command:</p>
    <pre class=" language-php"><code class=" language-php">envoy run deploy</code></pre>
    <p><a name="envoy-notifications"></a>
        <a name="envoy-hipchat-notifications"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-hipchat-notifications"><a href="http://laravel.com/docs/5.0/envoy#envoy-notifications">Notifications</a></a></h2>
    <h4>HipChat</h4>
    <p>After running a task, you may send a notification to your team's HipChat room using the simple <code class=" language-php">@hipchat</code> directive:</p>
<pre class=" language-php"><code class=" language-php">@<span class="token function">servers<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'web'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>

        @<span class="token function">task<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'on'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'web'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        ls <span class="token operator">-</span>la
        @endtask

        @after
        @<span class="token function">hipchat<span class="token punctuation">(</span></span><span class="token string">'token'</span><span class="token punctuation">,</span> <span class="token string">'room'</span><span class="token punctuation">,</span> <span class="token string">'Envoy'</span><span class="token punctuation">)</span>
        @endafter</code></pre>
    <p>You can also specify a custom message to the hipchat room. Any variables declared in <code class=" language-php">@setup</code> or included with <code class=" language-php">@<span class="token keyword">include</span></code> will be available for use in the message:</p>
<pre class=" language-php"><code class=" language-php">@after
        @<span class="token function">hipchat<span class="token punctuation">(</span></span><span class="token string">'token'</span><span class="token punctuation">,</span> <span class="token string">'room'</span><span class="token punctuation">,</span> <span class="token string">'Envoy'</span><span class="token punctuation">,</span> <span class="token string">"$task ran on [$environment]"</span><span class="token punctuation">)</span>
        @endafter</code></pre>
    <p>This is an amazingly simple way to keep your team notified of the tasks being run on the server.</p>
    <h4>Slack</h4>
    <p>The following syntax may be used to send a notification to <a href="https://slack.com/">Slack</a>:</p>
<pre class=" language-php"><code class=" language-php">@after
        @<span class="token function">slack<span class="token punctuation">(</span></span><span class="token string">'hook'</span><span class="token punctuation">,</span> <span class="token string">'channel'</span><span class="token punctuation">,</span> <span class="token string">'message'</span><span class="token punctuation">)</span>
        @endafter</code></pre>
    <p>You may retrieve your webhook URL by creating an <code class=" language-php">Incoming WebHooks</code> integration on Slack's website. The <code class=" language-php">hook</code> argument should be the entire webhook URL provided by the Incoming Webhooks Slack Integration. For example:</p>
    <pre class=" language-php"><code class=" language-php">https<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>hooks<span class="token punctuation">.</span>slack<span class="token punctuation">.</span>com<span class="token operator">/</span>services<span class="token operator">/</span><span class="token constant">ZZZZZZZZZ</span><span class="token operator">/</span><span class="token constant">YYYYYYYYY</span><span class="token operator">/</span><span class="token constant">XXXXXXXXXXXXXXX</span></code></pre>
    <p>You may provide one of the following for the channel argument:</p>
    <ul>
        <li>To send the notification to a channel: <code class=" language-php"><span class="token comment" spellcheck="true">#channel</span></code></li>
        <li>To send the notification to a user: <code class=" language-php">@user</code></li>
    </ul>
    <p>If no <code class=" language-php">channel</code> argument is provided the default channel will be used.</p>
    <blockquote>
        <p>Note: Slack notifications will only be sent if all tasks complete successfully.</p>
    </blockquote>
    <p><a name="envoy-updating-envoy"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/envoy#envoy-updating-envoy">Updating Envoy</a></h2>
    <p>To update Envoy, simply use Composer:</p>
    <pre class=" language-php"><code class=" language-php">composer <span class="token keyword">global</span> update</code></pre>
</article>
@stop