<!-- -->
@extends('master')

@section('content')
<article>
<h1>HTTP Routing</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/routing#basic-routing">Basic Routing</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#csrf-protection">CSRF Protection</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#method-spoofing">Method Spoofing</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#route-parameters">Route Parameters</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#named-routes">Named Routes</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#route-groups">Route Groups</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#route-model-binding">Route Model Binding</a></li>
    <li><a href="http://laravel.com/docs/5.0/routing#throwing-404-errors">Throwing 404 Errors</a></li>
</ul>
<p><a name="basic-routing"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#basic-routing">Basic Routing</a></h2>
<p>You will define most of the routes for your application in the <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>routes<span class="token punctuation">.</span>php</code> file, which is loaded by the <code class=" language-php">App\<span class="token package">Providers<span class="token punctuation">\</span>RouteServiceProvider</span></code> class. The most basic Laravel routes simply accept a URI and a <code class=" language-php">Closure</code>:</p>
<p dir="rtl">شما می توانید بیشتر مسیر یابی را در فایل app/Http/routes.php  انجام دهید.که توسط کلاس App\Providers\RouteServiceProviderبار گذاری می شود.
    بیشتر مسیریاب ها ی ساده یک urlو یک تابع را می گیرند.
</p>
<h4>Basic GET Route</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">'Hello World'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Other Basic Routes</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">post<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">'Hello World'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">put<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token string">'foo/bar'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Registering A Route For Multiple Verbs</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">match<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'get'</span><span class="token punctuation">,</span> <span class="token string">'post'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">'Hello World'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Registering A Route That Responds To Any HTTP Verb</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">any<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">'Hello World'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Often, you will need to generate URLs to your routes, you may do so using the <code class=" language-php">url</code> helper:</p>
<p dir="rtl">اغلب شما نیاز به تولید urlبرای مسیریاب های خود دارید.
    و می توانید ار تابع url استفاده کنید.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">url<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="csrf-protection"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#csrf-protection">CSRF Protection</a></h2>
<p>Laravel makes it easy to protect your application from <a href="http://en.wikipedia.org/wiki/Cross-site_request_forgery">cross-site request forgeries</a>. Cross-site request forgeries are a type of malicious exploit whereby unauthorized commands are performed on behalf of the authenticated user.</p>
<p>Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>
<p dir="rtl">لاراول محافظت برنامه در برابر cross-site request forgeries را به سادگی انجام می دهد.cross-site request forgeries   یک نوع استفاده از روی دشمنی بوسیله فرمان هایی که تصدیق نشده اند در بین فرمانهای کاربر تصدیق شده.
    لاراول به صورت اتوماتیک توکن های csrf ای برای هرsession کاربر فعال که توسط برنامه می نماید که توسط برنامه برنامه مدیریت می شود.
    این توکن برای بررسی صحت تصدیق کاربر استفاده می شودکه ایا واقعا او ان کسی است که درخواست را به برنامه داده است.
</p>
<h4>Insert The CSRF Token Into A Form</h4>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>hidden<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>_token<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token function">csrf_token<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span></code></pre>
<p>Of course, using the Blade <a href="http://laravel.com/docs/5.0/templates">templating engine</a>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>hidden<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>_token<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>{{ csrf_token() }}<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span></code></pre>
<p>You do not need to manually verify the CSRF token on POST, PUT, or DELETE requests. The <code class=" language-php">VerifyCsrfToken</code> <a href="http://laravel.com/docs/5.0/middleware">HTTP middleware</a> will verify token in the request input matches the token stored in the session.</p>
<p dir="rtl">شما نیازی به تایید دستی توکن csrfدر درخواست های put post deleteندارید.
    Middleware verifycsrftoken تایید می کند که ایا توکن درخواست ورودی با توکن ذخیره شده در session با همدیگر مطابقت دارد .
</p>
<h4>X-CSRF-TOKEN</h4>
<p>In addition to looking for the CSRF token as a "POST" parameter, the middleware will also check for the <code class=" language-php">X<span class="token operator">-</span><span class="token constant">CSRF</span><span class="token operator">-</span><span class="token constant">TOKEN</span></code> request header. You could, for example, store the token in a "meta" tag and instruct jQuery to add it to all request headers:</p>
<p dir="rtl">علاوه بر جستجو توکن csrfبه عنوان پاراکتر در درخواست های post  middlewareهمچنین x-csrf-tokenرا در درخواست ورودی بررسی می کند.شما می توانید برای نمونه توکن را در تگ meta ذخیره کنید ومی توانید دستور دهید به jqueryتا این توکن را به همه درخواست ها اضافه کند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>meta</span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>csrf-token<span class="token punctuation">"</span></span> <span class="token attr-name">content</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>{{ csrf_token() }}<span class="token punctuation">"</span></span> <span class="token punctuation">/&gt;</span></span></span>

        $<span class="token punctuation">.</span><span class="token function">ajaxSetup<span class="token punctuation">(</span></span><span class="token punctuation">{</span>
        headers<span class="token punctuation">:</span> <span class="token punctuation">{</span>
        <span class="token string">'X-CSRF-TOKEN'</span><span class="token punctuation">:</span> $<span class="token punctuation">(</span><span class="token string">'meta[name="csrf-token"]'</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">attr<span class="token punctuation">(</span></span><span class="token string">'content'</span><span class="token punctuation">)</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Now all AJAX requests will automatically include the CSRF token:</p>
<p dir="rtl">حالا همه در خواست های ajax به صوزت اتوماتیک دارای توکن خواهند بود.</p>
<pre class=" language-php"><code class=" language-php">$<span class="token punctuation">.</span><span class="token function">ajax<span class="token punctuation">(</span></span><span class="token punctuation">{</span>
        url<span class="token punctuation">:</span> <span class="token string">"/foo/bar"</span><span class="token punctuation">,</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span></code></pre>
<h4>X-XSRF-TOKEN</h4>
<p>Laravel also stores the CSRF token in a <code class=" language-php"><span class="token constant">XSRF</span><span class="token operator">-</span><span class="token constant">TOKEN</span></code> cookie. You can use the cookie value to set the <code class=" language-php">X<span class="token operator">-</span><span class="token constant">XSRF</span><span class="token operator">-</span><span class="token constant">TOKEN</span></code> request header. Some Javascript frameworks, like Angular, do this automatically for you.</p>
<p dir="rtl">لاراول همچنین توکن توکن csrf را در کوکی x-xsrf-token ذخیره می کند.شما می توانید از مقدار کوکی برای تنظیم  درخواست های x-xsrf-token استفاده کنید.بعضی از فریم ورک های javascript   این کار را به صورت اتوماتیک انجام می دهند.</p>
<blockquote>
    <p>Note: The difference between the <code class=" language-php">X<span class="token operator">-</span><span class="token constant">CSRF</span><span class="token operator">-</span><span class="token constant">TOKEN</span></code> and <code class=" language-php">X<span class="token operator">-</span><span class="token constant">XSRF</span><span class="token operator">-</span><span class="token constant">TOKEN</span></code> is that the first uses a plain text value and the latter uses an encrypted value, because cookies in Laravel are always encrypted. If you use the <code class=" language-php"><span class="token function">csrf_token<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code> function to supply the token value, you probably want to use the <code class=" language-php">X<span class="token operator">-</span><span class="token constant">CSRF</span><span class="token operator">-</span><span class="token constant">TOKEN</span></code> header.</p>
    <p dir="rtl">تفاوت بین x-csrf-token  با x-xsrf-token  در این است که اولی برای ورودی تکست عادی ودومی برای ورودی های کد شده استفاده می شود.چرا که کوکی ها همیشه در لاراول کد می شوند.اگر شما از تابع csrf-tokenبرای تهیه مقدار استفاده می کنید شما احتمالا بخواهید که از توکن x-csrf-tokenاستفاده کنید.</p>
</blockquote>
<p><a name="method-spoofing"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#method-spoofing">Method Spoofing</a></h2>
<p>HTML forms do not support <code class=" language-php"><span class="token constant">PUT</span></code>, <code class=" language-php"><span class="token constant">PATCH</span></code> or <code class=" language-php"><span class="token constant">DELETE</span></code> actions. So, when defining <code class=" language-php"><span class="token constant">PUT</span></code>, <code class=" language-php"><span class="token constant">PATCH</span></code> or <code class=" language-php"><span class="token constant">DELETE</span></code> routes that are called from an HTML form, you will need to add a hidden <code class=" language-php">_method</code> field to the form.</p>
<p dir="rtl">فرم های html از put and delete پشتیبانی نمی کنند بنابراین وقتتی تعریف می کنید توابع putو delete  که فراخوانی می کنند فرم و htmlفرم شما نیاز به اضافه کردن یک فیلد مخفی –metodبه فرم دارید.</p>
<p>The value sent with the <code class=" language-php">_method</code> field will be used as the HTTP request method. For example:</p>
<p dir="rtl">مقداری که با فیلد _method   ارسال می شود به عنوان درخواست http  در نظر گرفته می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>form</span> <span class="token attr-name">action</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>/foo/bar<span class="token punctuation">"</span></span> <span class="token attr-name">method</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>POST<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>hidden<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>_method<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>PUT<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>hidden<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>_token<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token function">csrf_token<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>form</span><span class="token punctuation">&gt;</span></span></span></code></pre>
<p><a name="route-parameters"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#route-parameters">Route Parameters</a></h2>
<p>Of course, you can capture segments of the request URI within your route:</p>
<p dir="rtl">البته شما می توانید بخش هایی از urlورودی مسیریاب ها را بگیرید.</p>
<h4>Basic Route Parameter</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">'User '</span><span class="token punctuation">.</span><span class="token variable">$id</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Optional Route Parameters</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{name?}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token keyword">null</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$name</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Optional Route Parameters With Default Value</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{name?}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token string">'John'</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$name</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Regular Expression Parameter Constraints</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{name}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$name</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'[A-Za-z]+'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Passing An Array Of Constraints</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}/{name}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">,</span> <span class="token variable">$name</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'id'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">,</span> <span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'[a-z]+'</span><span class="token punctuation">]</span><span class="token punctuation">)</span></code></pre>
<h4>Defining Global Patterns</h4>
<p>If you would like a route parameter to always be constrained by a given regular expression, you may use the <code class=" language-php">pattern</code> method. You should define these patterns in the <code class=" language-php">boot</code> method of your <code class=" language-php">RouteServiceProvider</code>:</p>
<p dir="rtl">اگر شما تمایل دارید که  پارامتر های مسیریاب همیشه محدود باشد به یک عبارات منظم.شما ممکن است از تابع  pattern  استفاده کند.شما باید تعریف کنید الگو ها را در تابع bootدر RouteServiceProvider</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$router</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">pattern<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Once the pattern has been defined, it is applied to all routes using that parameter:</p>
<p dir="rtl">یک بار که الگو را تعریف کردید.واین میتواند توسط همه مسیریاب های پارامتر دار استفاده شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Only called if {id} is numeric.
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Accessing A Route Parameter Value</h4>
<p>If you need to access a route parameter value outside of a route, use the <code class=" language-php">input</code> method:</p>
<p dir="rtl">اگر شما نیاز به دسترسی به مقدار پرامتر در بیرون مسیریاب دارید از تابع input استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$route</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span> <span class="token operator">==</span> <span class="token number">1</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p>You may also access the current route parameters via the <code class=" language-php">Illuminate\<span class="token package">Http<span class="token punctuation">\</span>Request</span></code> instance. The request instance for the current request may be accessed via the <code class=" language-php">Request</code> facade, or by type-hinting the <code class=" language-php">Illuminate\<span class="token package">Http<span class="token punctuation">\</span>Request</span></code> where dependencies are injected:</p>
<p dir="rtl">شما همچنین می توانید به مقدار یک پارامتر با استفااده از یک نمونه از Illuminate\Http\Request دسترسی داشته باشید.
    یک نمونه reuest برای درخواست فعلی ممکن است دردسترس باشد بوسیله نما request یا بوسیله Illuminate\Http\Request جایی که مستقلات ان را وارد می کنیم.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Request</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span>Request <span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="named-routes"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#named-routes">Named Routes</a></h2>
<p>Named routes allow you to conveniently generate URLs or redirects for a specific route. You may specify a name for a route with the <code class=" language-php"><span class="token keyword">as</span></code> array key:</p>
<p dir="rtl">نامگذاری مسیریابها به شما اجازه می دهد که به راحتی url تولید کنید یا به مسیریاب خاصی هدایت کنید.شما ممکن است نامی رابرای مسیریاب مشخص کنید با استفاده از کلید as در ارایه</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'as'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also specify route names for controller actions:</p>
<p dir="rtl">شما ممکن است همچنین نامی را برای توابع  کنترلر در نظر بگیرید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'as'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'UserController@showProfile'</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Now, you may use the route's name when generating URLs or redirects:</p>
<p dir="rtl">حالا ممکن است استفاده کنید از نام مسیریاب برای تولید urlیا هدایت کردن استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$redirect</span> <span class="token operator">=</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The <code class=" language-php">currentRouteName</code> method returns the name of the route handling the current request:</p>
<p dir="rtl">تابع curentRouteName نام مسیریابی که در خواست اخیر را اجرا کرده است را بر می گرداند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">currentRouteName<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="route-groups"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#route-groups">Route Groups</a></h2>
<p>Sometimes many of your routes will share common requirements such as URL segments, middleware, namespaces, etc. Instead of specifying each of these options on every route individually, you may use a route group to apply attributes to many routes.</p>
<p dir="rtl">گاهی اوقات ممکن است شما نیاز داشته باشید که فیلتری را برای گروهی ار مسیریاب ها اعمال کنید  بجای تعیین کردن فیلتر برای هر یک شما می توانید از گروه بندی مسیریاب ها استفاده کنید .</p>
<p>Shared attributes are specified in an array format as the first parameter to the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>group</code> method.</p>
<p dir="rtl">صفات  به اشتراک گذاشته شده به عنوان اولین ورودی تابع route::group  استفاده می شود.</p>
<p><a name="route-group-middleware"></a></p>
<h3>Middleware</h3>
<p>Middleware is applied to all routes within the group by defining the list of middleware with the <code class=" language-php">middleware</code> parameter on the group attribute array. Middleware will be executed in the order you define this array:</p>
<p dir="rtl">میان افزار به تمام مسیریاب های درون یک گروه که با پارامتر middleware  درون ارایه صفات گروه قرار گرفته اند استفاده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'middleware'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'foo|bar'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Has Foo And Bar Middleware
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/profile'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Has Foo And Bar Middleware
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="route-group-namespace"></a></p>
<h3>Namespaces</h3>
<p>You may use the <code class=" language-php"><span class="token keyword">namespace</span></code> parameter in your group attribute array to specify the namespace for all controllers within the group:</p>
<p dir="rtl">شما ممکن است از namespace درون ارایه گروه استفاده کنید تا مشخص کنید namespace  برای همه کنترلرهای داخل گروه</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'namespace'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Admin'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Controllers Within The "App\Http\Controllers\Admin" Namespace
</span>
        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'namespace'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'User'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Controllers Within The "App\Http\Controllers\Admin\User" Namespace
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> By default, the <code class=" language-php">RouteServiceProvider</code> includes your <code class=" language-php">routes<span class="token punctuation">.</span>php</code> file within a namespace group, allowing you to register controller routes without specifying the full <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> namespace prefix.</p>
    <p dir="rtl">به صورت پیش فرض RouteServiceProvider  که فایل routes.php  را در یک گروه از فضای نام شامل می شود به شما اجازه می دهد تا ثبت کنید مسیریاب های کنترلرتان رابدون تعیین فضای نام کامل.</p>
</blockquote>
<p><a name="sub-domain-routing"></a></p>
<h3>Sub-Domain Routing</h3>
<p>Laravel routes also handle wildcard sub-domains, and will pass your wildcard parameters from the domain:</p>
<p dir="rtl">مسیریابهای لاراول همچنین   راه اندازی می کنند هر زیر محدوده ای وهر پارامتری را ار محدوده اصلی عبور می دهند.</p>
<h4>Registering Sub-Domain Routes</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'domain'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'{account}.myapp.com'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$account</span><span class="token punctuation">,</span> <span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="route-prefixing"></a></p>
<h3>Route Prefixing</h3>
<p>A group of routes may be prefixed by using the <code class=" language-php">prefix</code> option in the attributes array of a group:</p>
<p dir="rtl">یک گروه از مسیر یابها ممکن است پیشوند بگیرند با استفاده از ویزگی prefix</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'prefix'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'admin'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Matches The "/admin/users" URL
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You can also utilize the <code class=" language-php">prefix</code> parameter to pass common parameters to your routes:</p>
<p dir="rtl">شما می توانید از ویژگی prefixبرای ارسال پارامترهای مشترک به درون مسیریاب استفاده کنید.</p>
<h4>Registering a URL parameter in a route prefix</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'prefix'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'accounts/{account_id}'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'detail'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$account_id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You can even define parameter constraints for the named parameters in your prefix:</p>
<p dir="rtl">شما می توانید محدودیت های پارامتری برای نام پارامترها در پیشوند استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">group<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token string">'prefix'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'accounts/{account_id}'</span><span class="token punctuation">,</span>
        <span class="token string">'where'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'account_id'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'[0-9]+'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>

   <span class="token comment" spellcheck="true"> // Define Routes Here
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="route-model-binding"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#route-model-binding">Route Model Binding</a></h2>
<p>Laravel model binding provides a convenient way to inject class instances into your routes. For example, instead of injecting a user's ID, you can inject the entire User class instance that matches the given ID.</p>
<p dir="rtl">انقیاد مدل های لاراول یک روش راحت برای تزریق نمونه های کلاس درون مسیریاب ها فراهم می کند .برای نمونه بجای تزریق user id شما می توانید کل اطلاعات کاربر را تزریق کنید .</p>
<p>First, use the router's <code class=" language-php">model</code> method to specify the class for a given parameter. You should define your model bindings in the <code class=" language-php"><span class="token scope">RouteServiceProvider<span class="token punctuation">::</span></span>boot</code> method:</p>
<p dir="rtl">ابتدا از تابع model مسیریابها برای برای تعیین کلاس برای گرفتن پارامتر ها استفاده کنید. شما بایستی تعریف کنید انقیاد مدل تان را درتابع RouteServiceProvider::boot</p>
<h4>Binding A Parameter To A Model</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span>Router <span class="token variable">$router</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">boot<span class="token punctuation">(</span></span><span class="token variable">$router</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$router</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">model<span class="token punctuation">(</span></span><span class="token string">'user'</span><span class="token punctuation">,</span> <span class="token string">'App\User'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>Next, define a route that contains a <code class=" language-php"><span class="token punctuation">{</span>user<span class="token punctuation">}</span></code> parameter:</p>
<p dir="rtl">تعریف  یک مسیریاب که پارامتر {user} را دارا باشد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'profile/{user}'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span>App\<span class="token package">User</span> <span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Since we have bound the <code class=" language-php"><span class="token punctuation">{</span>user<span class="token punctuation">}</span></code> parameter to the <code class=" language-php">App\<span class="token package">User</span></code> model, a <code class=" language-php">User</code> instance will be injected into the route. So, for example, a request to <code class=" language-php">profile<span class="token operator">/</span><span class="token number">1</span></code> will inject the <code class=" language-php">User</code> instance which has an ID of 1.</p>
<p dir="rtl">از انجا که شما پارامتر {user} را برای مدل app/userتعین کردید.یک نمونه از user داخل مسیریاب تزریق خواهد شد.
    برای نمونه یک درخواست به profile/1تزریق می کند یک نمونه user  که id ان برابر با 1 باشد.
</p>
<blockquote>
    <p><strong>Note:</strong> If a matching model instance is not found in the database, a 404 error will be thrown.</p>
    <p dir="rtl">اگر یک نمونه از مدل پیدا نشد صفحه 404 نمایش داده خواهد شد.</p>
</blockquote>
<p>If you wish to specify your own "not found" behavior, pass a Closure as the third argument to the <code class=" language-php">model</code> method:</p>
<p dir="rtl">اگر شما می خواهید رفتار برنامه را درصورت پیدا نشدن مدل تنظیم کنید ارگومان سومی را به تابع  model انتقال دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">model<span class="token punctuation">(</span></span><span class="token string">'user'</span><span class="token punctuation">,</span> <span class="token string">'User'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">throw</span> <span class="token keyword">new</span> <span class="token class-name">NotFoundHttpException</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you wish to use your own resolution logic, you should use the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>bind</code> method. The Closure you pass to the <code class=" language-php">bind</code> method will receive the value of the URI segment, and should return an instance of the class you want to be injected into the route:</p>
<p dir="rtl">اگر شما می خواهید تا  منطق راه حل خودتان شما باید از تابع Router::bind  استفاده کنید.عبارتی که شما به تابع biind می دهید مقدار بخش url را دریافت می کند .و بایستی یک نمونه از کلاسی که می خواهید داخل مسیر یاب تزریق کنید را برگردانید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">bind<span class="token punctuation">(</span></span><span class="token string">'user'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="throwing-404-errors"></a></p>
<h2><a href="http://laravel.com/docs/5.0/routing#throwing-404-errors">Throwing 404 Errors</a></h2>
<p>There are two ways to manually trigger a 404 error from a route. First, you may use the <code class=" language-php">abort</code> helper:</p>
<p dir="rtl">دو روش برای ایجاد error 404 از یک مسیر یاب وجود دارد یکی اینکه شما می توانید  از تابع abort استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token function">abort<span class="token punctuation">(</span></span><span class="token number">404</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The <code class=" language-php">abort</code> helper simply throws a <code class=" language-php">Symfony\<span class="token package">Component<span class="token punctuation">\</span>HttpFoundation<span class="token punctuation">\</span>Exception<span class="token punctuation">\</span>HttpException</span></code> with the specified status code.</p>
<p>Secondly, you may manually throw an instance of <code class=" language-php">Symfony\<span class="token package">Component<span class="token punctuation">\</span>HttpKernel<span class="token punctuation">\</span>Exception<span class="token punctuation">\</span>NotFoundHttpException</span></code>.</p>
<p>More information on handling 404 exceptions and using custom responses for these errors may be found in the <a href="http://laravel.com/docs/5.0/errors#http-exceptions">errors</a> section of the documentation.</p>
<p dir="rtl">تابع abort ایجاد می کند یک نمونه از 	Symfony\Component\HttpFoundation\Exception\HttpException
    با کد حالت معین
    دوما که شما می توانید به صورت دستی یک نمونه از Symfony\Component\HttpKernel\Exception\NotFoundHttpExce  ایجاد کنید.
    اطلاعات بیشتر در مورد خطا 404و استفاده از پاسخ دلخواه برای این خطا  را می توانید در بخش خظا ها بیابید.
</p>
</article>
@stop