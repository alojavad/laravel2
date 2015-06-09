<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Queues</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/queues#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/queues#basic-usage">Basic Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/queues#queueing-closures">Queueing Closures</a></li>
        <li><a href="http://laravel.com/docs/5.0/queues#running-the-queue-listener">Running The Queue Listener</a></li>
        <li><a href="http://laravel.com/docs/5.0/queues#daemon-queue-worker">Daemon Queue Worker</a></li>
        <li><a href="http://laravel.com/docs/5.0/queues#push-queues">Push Queues</a></li>
        <li><a href="http://laravel.com/docs/5.0/queues#failed-jobs">Failed Jobs</a></li>
    </ul>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#configuration">Configuration</a></h2>
    <p>The Laravel Queue component provides a unified API across a variety of different queue services. Queues allow you to defer the processing of a time consuming task, such as sending an e-mail, until a later time, thus drastically speeding up the web requests to your application.</p>
    <p>The queue configuration file is stored in <code class=" language-php">config<span class="token operator">/</span>queue<span class="token punctuation">.</span>php</code>. In this file you will find connection configurations for each of the queue drivers that are included with the framework, which includes a database, <a href="http://kr.github.com/beanstalkd">Beanstalkd</a>, <a href="http://iron.io/">IronMQ</a>, <a href="http://aws.amazon.com/sqs">Amazon SQS</a>, <a href="http://redis.io/">Redis</a>, null, and synchronous (for local use) driver. The <code class=" language-php"><span class="token keyword">null</span></code> queue driver simply discards queued jobs so they are never run.</p>
    <h3>Queue Database Table</h3>
    <p>In order to use the <code class=" language-php">database</code> queue driver, you will need a database table to hold the jobs. To generate a migration to create this table, run the <code class=" language-php">queue<span class="token punctuation">:</span>table</code> Artisan command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>table</code></pre>
    <h3>Other Queue Dependencies</h3>
    <p>The following dependencies are needed for the listed queue drivers:</p>
    <ul>
        <li>Amazon SQS: <code class=" language-php">aws<span class="token operator">/</span>aws<span class="token operator">-</span>sdk<span class="token operator">-</span>php</code></li>
        <li>Beanstalkd: <code class=" language-php">pda<span class="token operator">/</span>pheanstalk <span class="token operator">~</span><span class="token number">3.0</span></code></li>
        <li>IronMQ: <code class=" language-php">iron<span class="token operator">-</span>io<span class="token operator">/</span>iron_mq <span class="token operator">~</span><span class="token number">1.5</span></code></li>
        <li>Redis: <code class=" language-php">predis<span class="token operator">/</span>predis <span class="token operator">~</span><span class="token number">1.0</span></code></li>
    </ul>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#basic-usage">Basic Usage</a></h2>
    <h4>Pushing A Job Onto The Queue</h4>
    <p>All of the queueable jobs for your application are stored in the <code class=" language-php">App\<span class="token package">Commands</span></code> directory. You may generate a new queued command using the Artisan CLI:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>command SendEmail <span class="token operator">--</span>queued</code></pre>
    <p>To push a new job onto the queue, use the <code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span>push</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">push<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">SendEmail</span><span class="token punctuation">(</span><span class="token variable">$message</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> In this example, we are using the <code class=" language-php">Queue</code> facade directly; however, typically you would dispatch queued command via the <a href="http://laravel.com/docs/5.0/bus">Command Bus</a>. We will continue to use the <code class=" language-php">Queue</code> facade throughout this page; however, familiarize with the command bus as well, since it is used to dispatch both queued and synchronous commands for your application.</p>
    </blockquote>
    <p>By default, the <code class=" language-php">make<span class="token punctuation">:</span>command</code> Artisan command generates a "self-handling" command, meaning a <code class=" language-php">handle</code> method is added to the command itself. This method will be called when the job is executed by the queue. You may type-hint any dependencies you need on the <code class=" language-php">handle</code> method and the <a href="http://laravel.com/docs/5.0/container">service container</a> will automatically inject them:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>UserRepository <span class="token variable">$users</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>If you would like your command to have a separate handler class, you should add the <code class=" language-php"><span class="token operator">--</span>handler</code> flag to the <code class=" language-php">make<span class="token punctuation">:</span>command</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>command SendEmail <span class="token operator">--</span>queued <span class="token operator">--</span>handler</code></pre>
    <p>The generated handler will be placed in <code class=" language-php">App\<span class="token package">Handlers<span class="token punctuation">\</span>Commands</span></code> and will be resolved out of the IoC container.</p>
    <h4>Specifying The Queue / Tube For A Job</h4>
    <p>You may also specify the queue / tube a job should be sent to:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">pushOn<span class="token punctuation">(</span></span><span class="token string">'emails'</span><span class="token punctuation">,</span> <span class="token keyword">new</span> <span class="token class-name">SendEmail</span><span class="token punctuation">(</span><span class="token variable">$message</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Passing The Same Payload To Multiple Jobs</h4>
    <p>If you need to pass the same data to several queue jobs, you may use the <code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span>bulk</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">bulk<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token keyword">new</span> <span class="token class-name">SendEmail</span><span class="token punctuation">(</span><span class="token variable">$message</span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token keyword">new</span> <span class="token class-name">AnotherCommand</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Delaying The Execution Of A Job</h4>
    <p>Sometimes you may wish to delay the execution of a queued job. For instance, you may wish to queue a job that sends a customer an e-mail 15 minutes after sign-up. You can accomplish this using the <code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span>later</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$date</span> <span class="token operator">=</span> <span class="token scope">Carbon<span class="token punctuation">::</span></span><span class="token function">now<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">addMinutes<span class="token punctuation">(</span></span><span class="token number">15</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">later<span class="token punctuation">(</span></span><span class="token variable">$date</span><span class="token punctuation">,</span> <span class="token keyword">new</span> <span class="token class-name">SendEmail</span><span class="token punctuation">(</span><span class="token variable">$message</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>In this example, we're using the <a href="https://github.com/briannesbitt/Carbon">Carbon</a> date library to specify the delay we wish to assign to the job. Alternatively, you may pass the number of seconds you wish to delay as an integer.</p>
    <blockquote>
        <p><strong>Note:</strong> The Amazon SQS service has a delay limit of 900 seconds (15 minutes).</p>
    </blockquote>
    <h4>Queues And Eloquent Models</h4>
    <p>If your queued job accepts an Eloquent model in its constructor, only the identifier for the model will be serialized onto the queue. When the job is actually handled, the queue system will automatically re-retrieve the full model instance from the database. It's all totally transparent to your application and prevents issues that can arise from serializing full Eloquent model instances.</p>
    <h4>Deleting A Processed Job</h4>
    <p>Once you have processed a job, it must be deleted from the queue. If no exception is thrown during the execution of your job, this will be done automatically.</p>
    <p>If you would like to <code class=" language-php">delete</code> or <code class=" language-php">release</code> the job manually, the <code class=" language-php">Illuminate\<span class="token package">Queue<span class="token punctuation">\</span>InteractsWithQueue</span></code> trait provides access to the queue job <code class=" language-php">release</code> and <code class=" language-php">delete</code> methods. The <code class=" language-php">release</code> method accepts a single value: the number of seconds you wish to wait until the job is made available again.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span>SendEmail <span class="token variable">$command</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token boolean">true</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">release<span class="token punctuation">(</span></span><span class="token number">30</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span></code></pre>
    <h4>Releasing A Job Back Onto The Queue</h4>
    <p>IF an exception is thrown while the job is being processed, it will automatically be released back onto the queue so it may be attempted again. The job will continue to be released until it has been attempted the maximum number of times allowed by your application. The number of maximum attempts is defined by the <code class=" language-php"><span class="token operator">--</span>tries</code> switch used on the <code class=" language-php">queue<span class="token punctuation">:</span>listen</code> or <code class=" language-php">queue<span class="token punctuation">:</span>work</code> Artisan commands.</p>
    <h4>Checking The Number Of Run Attempts</h4>
    <p>If an exception occurs while the job is being processed, it will automatically be released back onto the queue. You may check the number of attempts that have been made to run the job using the <code class=" language-php">attempts</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">attempts<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token operator">&gt;</span> <span class="token number">3</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Your command / handler must use the <code class=" language-php">Illuminate\<span class="token package">Queue<span class="token punctuation">\</span>InteractsWithQueue</span></code> trait in order to call this method.</p>
    </blockquote>
    <p><a name="queueing-closures"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#queueing-closures">Queueing Closures</a></h2>
    <p>You may also push a Closure onto the queue. This is very convenient for quick, simple tasks that need to be queued:</p>
    <h4>Pushing A Closure Onto The Queue</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">push<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$job</span><span class="token punctuation">)</span> <span class="token keyword">use</span> <span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Account<span class="token punctuation">::</span></span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token variable">$id</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$job</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Instead of making objects available to queued Closures via the <code class=" language-php"><span class="token keyword">use</span></code> directive, consider passing primary keys and re-pulling the associated models from within your queue job. This often avoids unexpected serialization behavior.</p>
    </blockquote>
    <p>When using Iron.io <a href="http://laravel.com/docs/5.0/queues#push-queues">push queues</a>, you should take extra precaution queueing Closures. The end-point that receives your queue messages should check for a token to verify that the request is actually from Iron.io. For example, your push queue end-point should be something like: <code class=" language-php">https<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>yourapp<span class="token punctuation">.</span>com<span class="token operator">/</span>queue<span class="token operator">/</span>receive<span class="token operator">?</span>token<span class="token operator">=</span>SecretToken</code>. You may then check the value of the secret token in your application before marshalling the queue request.</p>
    <p><a name="running-the-queue-listener"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#running-the-queue-listener">Running The Queue Listener</a></h2>
    <p>Laravel includes an Artisan task that will run new jobs as they are pushed onto the queue. You may run this task using the <code class=" language-php">queue<span class="token punctuation">:</span>listen</code> command:</p>
    <h4>Starting The Queue Listener</h4>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>listen</code></pre>
    <p>You may also specify which queue connection the listener should utilize:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>listen connection</code></pre>
    <p>Note that once this task has started, it will continue to run until it is manually stopped. You may use a process monitor such as <a href="http://supervisord.org/">Supervisor</a> to ensure that the queue listener does not stop running.</p>
    <p>You may pass a comma-delimited list of queue connections to the <code class=" language-php">listen</code> command to set queue priorities:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>listen <span class="token operator">--</span>queue<span class="token operator">=</span>high<span class="token punctuation">,</span>low</code></pre>
    <p>In this example, jobs on the <code class=" language-php">high<span class="token operator">-</span>connection</code> will always be processed before moving onto jobs from the <code class=" language-php">low<span class="token operator">-</span>connection</code>.</p>
    <h4>Specifying The Job Timeout Parameter</h4>
    <p>You may also set the length of time (in seconds) each job should be allowed to run:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>listen <span class="token operator">--</span>timeout<span class="token operator">=</span><span class="token number">60</span></code></pre>
    <h4>Specifying Queue Sleep Duration</h4>
    <p>In addition, you may specify the number of seconds to wait before polling for new jobs:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>listen <span class="token operator">--</span>sleep<span class="token operator">=</span><span class="token number">5</span></code></pre>
    <p>Note that the queue only "sleeps" if no jobs are on the queue. If more jobs are available, the queue will continue to work them without sleeping.</p>
    <h4>Processing The First Job On The Queue</h4>
    <p>To process only the first job on the queue, you may use the <code class=" language-php">queue<span class="token punctuation">:</span>work</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>work</code></pre>
    <p><a name="daemon-queue-worker"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#daemon-queue-worker">Daemon Queue Worker</a></h2>
    <p>The <code class=" language-php">queue<span class="token punctuation">:</span>work</code> also includes a <code class=" language-php"><span class="token operator">--</span>daemon</code> option for forcing the queue worker to continue processing jobs without ever re-booting the framework. This results in a significant reduction of CPU usage when compared to the <code class=" language-php">queue<span class="token punctuation">:</span>listen</code> command, but at the added complexity of needing to drain the queues of currently executing jobs during your deployments.</p>
    <p>To start a queue worker in daemon mode, use the <code class=" language-php"><span class="token operator">--</span>daemon</code> flag:</p>
<pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>work connection <span class="token operator">--</span>daemon

        php artisan queue<span class="token punctuation">:</span>work connection <span class="token operator">--</span>daemon <span class="token operator">--</span>sleep<span class="token operator">=</span><span class="token number">3</span>

        php artisan queue<span class="token punctuation">:</span>work connection <span class="token operator">--</span>daemon <span class="token operator">--</span>sleep<span class="token operator">=</span><span class="token number">3</span> <span class="token operator">--</span>tries<span class="token operator">=</span><span class="token number">3</span></code></pre>
    <p>As you can see, the <code class=" language-php">queue<span class="token punctuation">:</span>work</code> command supports most of the same options available to <code class=" language-php">queue<span class="token punctuation">:</span>listen</code>. You may use the <code class=" language-php">php artisan help queue<span class="token punctuation">:</span>work</code> command to view all of the available options.</p>
    <h3>Deploying With Daemon Queue Workers</h3>
    <p>The simplest way to deploy an application using daemon queue workers is to put the application in maintenance mode at the beginning of your deployment. This can be done using the <code class=" language-php">php artisan down</code> command. Once the application is in maintenance mode, Laravel will not accept any new jobs off of the queue, but will continue to process existing jobs.</p>
    <p>The easiest way to restart your workers is to include the following command in your deployment script:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>restart</code></pre>
    <p>This command will instruct all queue workers to restart after they finish processing their current job.</p>
    <blockquote>
        <p><strong>Note:</strong> This command relies on the cache system to schedule the restart. By default, APCu does not work for CLI commands. If you are using APCu, add <code class=" language-php">apc<span class="token punctuation">.</span>enable_cli<span class="token operator">=</span><span class="token number">1</span></code> to your APCu configuration.</p>
    </blockquote>
    <h3>Coding For Daemon Queue Workers</h3>
    <p>Daemon queue workers do not restart the framework before processing each job. Therefore, you should be careful to free any heavy resources before your job finishes. For example, if you are doing image manipulation with the GD library, you should free the memory with <code class=" language-php">imagedestroy</code> when you are done.</p>
    <p>Similarly, your database connection may disconnect when being used by long-running daemon. You may use the <code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span>reconnect</code> method to ensure you have a fresh connection.</p>
    <p><a name="push-queues"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#push-queues">Push Queues</a></h2>
    <p>Push queues allow you to utilize the powerful Laravel 5 queue facilities without running any daemons or background listeners. Currently, push queues are only supported by the <a href="http://iron.io/">Iron.io</a> driver. Before getting started, create an Iron.io account, and add your Iron credentials to the <code class=" language-php">config<span class="token operator">/</span>queue<span class="token punctuation">.</span>php</code> configuration file.</p>
    <h4>Registering A Push Queue Subscriber</h4>
    <p>Next, you may use the <code class=" language-php">queue<span class="token punctuation">:</span>subscribe</code> Artisan command to register a URL end-point that will receive newly pushed queue jobs:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>subscribe queue_name http<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>foo<span class="token punctuation">.</span>com<span class="token operator">/</span>queue<span class="token operator">/</span>receive</code></pre>
    <p>Now, when you login to your Iron dashboard, you will see your new push queue, as well as the subscribed URL. You may subscribe as many URLs as you wish to a given queue. Next, create a route for your <code class=" language-php">queue<span class="token operator">/</span>receive</code> end-point and return the response from the <code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span>marshal</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">post<span class="token punctuation">(</span></span><span class="token string">'queue/receive'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">marshal<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The <code class=" language-php">marshal</code> method will take care of firing the correct job handler class. To fire jobs onto the push queue, just use the same <code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span>push</code> method used for conventional queues.</p>
    <p><a name="failed-jobs"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/queues#failed-jobs">Failed Jobs</a></h2>
    <p>Since things don't always go as planned, sometimes your queued jobs will fail. Don't worry, it happens to the best of us! Laravel includes a convenient way to specify the maximum number of times a job should be attempted. After a job has exceeded this amount of attempts, it will be inserted into a <code class=" language-php">failed_jobs</code> table. The failed jobs table name can be configured via the <code class=" language-php">config<span class="token operator">/</span>queue<span class="token punctuation">.</span>php</code> configuration file.</p>
    <p>To create a migration for the <code class=" language-php">failed_jobs</code> table, you may use the <code class=" language-php">queue<span class="token punctuation">:</span>failed<span class="token operator">-</span>table</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>failed<span class="token operator">-</span>table</code></pre>
    <p>You can specify the maximum number of times a job should be attempted using the <code class=" language-php"><span class="token operator">--</span>tries</code> switch on the <code class=" language-php">queue<span class="token punctuation">:</span>listen</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>listen connection<span class="token operator">-</span>name <span class="token operator">--</span>tries<span class="token operator">=</span><span class="token number">3</span></code></pre>
    <p>If you would like to register an event that will be called when a queue job fails, you may use the <code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span>failing</code> method. This event is a great opportunity to notify your team via e-mail or <a href="https://www.hipchat.com/">HipChat</a>.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Queue<span class="token punctuation">::</span></span><span class="token function">failing<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$connection</span><span class="token punctuation">,</span> <span class="token variable">$job</span><span class="token punctuation">,</span> <span class="token variable">$data</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also define a <code class=" language-php">failed</code> method directly on a queue job class, allowing you to perform job specific actions when a failure occurs:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">failed<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Called when the job is failing...
</span><span class="token punctuation">}</span></code></pre>
    <h3>Retrying Failed Jobs</h3>
    <p>To view all of your failed jobs, you may use the <code class=" language-php">queue<span class="token punctuation">:</span>failed</code> Artisan command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>failed</code></pre>
    <p>The <code class=" language-php">queue<span class="token punctuation">:</span>failed</code> command will list the job ID, connection, queue, and failure time. The job ID may be used to retry the failed job. For instance, to retry a failed job that has an ID of 5, the following command should be issued:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>retry <span class="token number">5</span></code></pre>
    <p>If you would like to delete a failed job, you may use the <code class=" language-php">queue<span class="token punctuation">:</span>forget</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>forget <span class="token number">5</span></code></pre>
    <p>To delete all of your failed jobs, you may use the <code class=" language-php">queue<span class="token punctuation">:</span>flush</code> command:</p>
    <pre class=" language-php"><code class=" language-php">php artisan queue<span class="token punctuation">:</span>flush</code></pre>
</article>
@stop