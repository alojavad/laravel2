<!-- -->
@extends('master')

@section('content')
<article>
    <h1>HTTP Middleware</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/middleware#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/middleware#defining-middleware">Defining Middleware</a></li>
        <li><a href="http://laravel.com/docs/5.0/middleware#registering-middleware">Registering Middleware</a></li>
        <li><a href="http://laravel.com/docs/5.0/middleware#terminable-middleware">Terminable Middleware</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/middleware#introduction">Introduction</a></h2>
    <p>HTTP middleware provide a convenient mechanism for filtering HTTP requests entering your application. For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.</p>
    <p dir="rtl">Middleware ها یک مکانیزم راحتی برای فیلتر کردن درخواست های ورودی که به برنامه می اید را فراهم می کنند.برای نمونه لاراول شامل می شود یک middleware  که تایید می کند کاربران برنامه را که تصدیق شده اند.
        اگر کاربر تصدیق نشده باشد کاربر را به صفحه ورود هدایت می کند.هر چند که اگر کاربر تصدیق شده باشد به کاربر اجازه فعالیت بیشتر می دهد.
    </p>
    <p>Of course, middleware can be written to perform a variety of tasks besides authentication. A CORS middleware might be responsible for adding the proper headers to all responses leaving your application. A logging middleware might log all incoming requests to your application.</p>
    <p dir="rtl">البته middleware ها  ممکن است که نوشته شوند تا اجرا کنند وضایف مختلفی در کنار تصدیق. یک middleware  corse ممکن است مسئول اضافه کردن هدر مناسب به به پاسخ هایی که سیستم را ترک می کنند باشد. یک middleware login ممکن است ثبت کند همه درخواست های ورودی به برنامه را</p>
    <p>There are several middleware included in the Laravel framework, including middleware for maintenance, authentication, CSRF protection, and more. All of these middleware are located in the <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Middleware</code> directory.</p>
    <p dir="rtl">فریم لاراول چندین middleware را شامل می شود از جمله middleware هایی برای نگه داری تصدیق  و محافظت csrf  و غیره . همه این middleware ها در پوشه  app/Http/Middleware  قرار می گیرد.</p>
    <p><a name="defining-middleware"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/middleware#defining-middleware">Defining Middleware</a></h2>
    <p>To create a new middleware, use the <code class=" language-php">make<span class="token punctuation">:</span>middleware</code> Artisan command:</p>
    <p dir="rtl">برای ایجاد middleware از فرمان زیر استفاده می کنیم.</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>middleware OldMiddleware</code></pre>
    <p>This command will place a new <code class=" language-php">OldMiddleware</code> class within your <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Middleware</code> directory. In this middleware, we will only allow access to the route if the supplied <code class=" language-php">age</code> is greater than 200. Otherwise, we will redirect the users back to the "home" URI.</p>
    <p dir="rtl">این فرمان قرار می دهد  یک کلاس OldMiddleware داخل پوشه app/Http/Middleware
        در این middleware   شما می توانید اجازه دسترسی را بدهید اگر تهیه کننده ان سنی بیشتر از 200 سال داشت.
        وگرنه کاربر را به صفحه خانه هدایت کند.
    </p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Middleware</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">OldMiddleware</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Closure <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'age'</span><span class="token punctuation">)</span> <span class="token operator">&lt;</span> <span class="token number">200</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'home'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>As you can see, if the given <code class=" language-php">age</code> is less than <code class=" language-php"><span class="token number">200</span></code>, the middleware will return an HTTP redirect to the client; otherwise, the request will be passed further into the application. To pass the request deeper into the application (allowing the middleware to "pass"), simply call the <code class=" language-php"><span class="token variable">$next</span></code> callback with the <code class=" language-php"><span class="token variable">$request</span></code>.</p>
    <p dir="rtl">همان طور که شما می توانید ببینید  اگر سن شما کمتر از 200 سال باشد middleware یک http بر می گرداند تا کاربر را هدایت کند.در غیر این صورت درخواست وارد برنامه می شود.برای اینکه درخواست را بیشتر درون برنامه عبور دهید به سادگی $nextرا با $request بکار می بریم.</p>
    <p>It's best to envision middleware as a series of "layers" HTTP requests must pass through before they hit your application. Each layer can examine the request and even reject it entirely.</p>
    <p dir="rtl">بهترین تصور از middleware این است که ان را به صورت مجموعه ای از لایه ها که باید از میان ان عبور کند تا به برنامه برسد.هر لایه می تواند درخواست را بررسی کند وحتی بطور کلی ان را رد کند.</p>
    <h3><em>Before</em> / <em>After</em> Middleware</h3>
    <p>Whether a middleware runs before or after a request depends on the middleware itself. This middleware would perform some task <strong>before</strong> the request is handled by the application:</p>
    <p dir="rtl">چه یک middleware اجرا شود قبل یا بعد از reduest به خود middlewarer  مربوط می شود.این middleware باید اجرا کند بخشی از وظایف را قبل از اینکه درخواست توسط برنامه اجرا شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Middleware</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">BeforeMiddleware</span> <span class="token keyword">implements</span> <span class="token class-name">Middleware</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Closure <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Perform action
</span>
        <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span></code></pre>
    <p>However, this middleware would perform its task <strong>after</strong> the request is handled by the application:</p>
    <p dir="rtl">هر چند که این middleware   باید اجرا کند  وظایفش را بعد از اینکه درخواست توسط برنامه اجرا شد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Middleware</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">AfterMiddleware</span> <span class="token keyword">implements</span> <span class="token class-name">Middleware</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Closure <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$response</span> <span class="token operator">=</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

       <span class="token comment" spellcheck="true"> // Perform action
</span>
        <span class="token keyword">return</span> <span class="token variable">$response</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span></code></pre>
    <p><a name="registering-middleware"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/middleware#registering-middleware">Registering Middleware</a></h2>
    <h3>Global Middleware</h3>
    <p>If you want a middleware to be run during every HTTP request to your application, simply list the middleware class in the <code class=" language-php"><span class="token variable">$middleware</span></code> property of your <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Kernel<span class="token punctuation">.</span>php</code> class.</p>
    <p dir="rtl">اگر شما بخواهید یک middleware برای هر درخواستی که به برنامه می اید اجرا شود به سادگی می توانید ایست کنید کلاس middleware  را در صفت $middleware  در کلاس app/Http/Kernel.php  قرار دهیم.</p>
    <h3>Assigning Middleware To Routes</h3>
    <p>If you would like to assign middleware to specific routes, you should first assign the middleware a short-hand key in your <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Kernel<span class="token punctuation">.</span>php</code> file. By default, the <code class=" language-php"><span class="token variable">$routeMiddleware</span></code> property of this class contains entries for the middleware included with Laravel. To add your own, simply append it to this list and assign it a key of your choosing.</p>
    <p dir="rtl">اگر شما تمایل دارید که middleware را در مسیر یاب خاصی قرار دهید شما ابتدا باید نام کوتاه شده ای برای middleware در app/Http/Kernel.php در نظر بگیرید .به صورت پیش فرض در در صفت $routeMiddleware  این کلاس که شامل ورودی ها برای middleware هایی که درلاراول قرار می گیرند.</p>
    <p>Once the middleware has been defined in the HTTP kernel, you may use the <code class=" language-php">middleware</code> key in the route options array:</p>
    <p dir="rtl">یکبار که میان افزار در kernel  تعریف شد شما می توانید از کلید middleware  در ارایه مسیریاب استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'admin/profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'middleware'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'auth'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="terminable-middleware"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/middleware#terminable-middleware">Terminable Middleware</a></h2>
    <p>Sometimes a middleware may need to do some work after the HTTP response has already been sent to the browser. For example, the "session" middleware included with Laravel writes the session data to storage <em>after</em> the response has been sent to the browser. To accomplish this, you may define the middleware as "terminable".</p>
    <p dir="rtl">بعضی وقت ها ممکن است یک middleware  نیاز به انجام کارهایی بعد از پاسخ دادن وقبل از اینکه به مرورگر فرستاده شود.برای نمونه middleware  session  که درلاراول قرار دارد داده های session  رادر storage  می نویسد بعد از اینکه پاسخ به مرورگر ارسال شد .برای انتشار از این نوع شما می توانید middleware را از نوع terminable تعریف کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>TerminableMiddleware</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">StartSession</span> <span class="token keyword">implements</span> <span class="token class-name">TerminableMiddleware</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">terminate<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token variable">$response</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Store the session data...
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>As you can see, in addition to defining a <code class=" language-php">handle</code> method, <code class=" language-php">TerminableMiddleware</code> define a <code class=" language-php">terminate</code> method. This method receives both the request and the response. Once you have defined a terminable middleware, you should add it to the list of global middlewares in your HTTP kernel.</p>
    <p dir="rtl">همان طور که شما می توانید ببینید علاوه بر تعریف یک تابع handle  TerminableMiddleware  یک تابع terminate  نیز تعریف می کند.
        این تابع هم درخواست وهم پاسخ را دریافت می کند.یک بار که شما muiddleware  terminable را تعریف کردید شما باید ان را به لیست middleware  های سراسری در kernel  اضافه کنید.
    </p>
</article>
@stop