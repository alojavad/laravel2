<!-- -->
@extends('master')

@section('content')
<article>
    <h1>HTTP Requests</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/requests#obtaining-a-request-instance">Obtaining A Request Instance</a></li>
        <li><a href="http://laravel.com/docs/5.0/requests#retrieving-input">Retrieving Input</a></li>
        <li><a href="http://laravel.com/docs/5.0/requests#old-input">Old Input</a></li>
        <li><a href="http://laravel.com/docs/5.0/requests#cookies">Cookies</a></li>
        <li><a href="http://laravel.com/docs/5.0/requests#files">Files</a></li>
        <li><a href="http://laravel.com/docs/5.0/requests#other-request-information">Other Request Information</a></li>
    </ul>
    <p><a name="obtaining-a-request-instance"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/requests#obtaining-a-request-instance">Obtaining A Request Instance</a></h2>
    <h3>Via Facade</h3>
    <p>The <code class=" language-php">Request</code> facade will grant you access to the current request that is bound in the container. For example:</p>
    <p dir="rtl">نما request  به شما دسترسی به درخواست جاری را می دهد که در CONTAINER قرار گرفته است	برای نمونه</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Remember, if you are in a namespace, you will have to import the <code class=" language-php">Request</code> facade using a <code class=" language-php"><span class="token keyword">use</span> <span class="token package">Request</span><span class="token punctuation">;</span></code> statement at the top of your class file.</p>
    <p dir="rtl">به خاطر داشته باشید که اگر شما د ریک فضای نام قرار دارید شما ممکن است مجبور شوید تا قرار دهید نما resuest  رابا استفاده از use requestدر بالای فایل کلاس</p>
    <h3>Via Dependency Injection</h3>
    <p>To obtain an instance of the current HTTP request via dependency injection, you should type-hint the class on your controller constructor or method. The current request instance will automatically be injected by the <a href="http://laravel.com/docs/5.0/container">service container</a>:</p>
    <p dir="rtl">برای اینکه یک نمونه از درخواست جاری را داشته باشید بوسیله تزریق وابستگی شما باید وارد کنید کلاس را در سازنده یا در تابع
        یک نمونه از درخواست فعلی به صورت اتوماتیک در service container  تزریق می شود.
    </p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Request</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">store<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$name</span> <span class="token operator">=</span> <span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>If your controller method is also expecting input from a route parameter, simply list your route arguments after your other dependencies:</p>
    <p dir="rtl">اگر تابع کنترلر انتظار ورودی را از مسیریاب داشته یاشد به سادگی ورودی های مسیریاب را بعد از سایر وابستگی ها قرار می دهیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Request</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Store a new user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">update<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p><a name="retrieving-input"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/requests#retrieving-input">Retrieving Input</a></h2>
    <h4>Retrieving An Input Value</h4>
    <p>Using a few simple methods, you may access all user input from your <code class=" language-php">Illuminate\<span class="token package">Http<span class="token punctuation">\</span>Request</span></code> instance. You do not need to worry about the HTTP verb used for the request, as input is accessed in the same way for all verbs.</p>
    <p dir="rtl">با استفاده از تعدادی از توابع ساده شما می توانید به تمام ورودی های کاربر از یک نمونه Illuminate\Http\Request  دسترسی داشته باشید.
        نیازی نیست که نگران توابع http  کهد ردرخواست استفاده می شود باشید.تمام ورودی ها به روش یکسانی در دسترس قرار می گیرند
    </p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving A Default Value If The Input Value Is Absent</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'Sally'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Determining If An Input Value Is Present</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Getting All Input For The Request</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$input</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Getting Only Some Of The Request Input</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$input</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">only<span class="token punctuation">(</span></span><span class="token string">'username'</span><span class="token punctuation">,</span> <span class="token string">'password'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$input</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">except<span class="token punctuation">(</span></span><span class="token string">'credit_card'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>When working on forms with "array" inputs, you may use dot notation to access the arrays:</p>
    <p dir="rtl">وقتی که دریک فرم با یک ارایه از ورودی ها کار می کنید شما می توانید از علامت "." برای دسترسی به ارایه استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$input</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">input<span class="token punctuation">(</span></span><span class="token string">'products.0.name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="old-input"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/requests#old-input">Old Input</a></h2>
    <p>Laravel also allows you to keep input from one request during the next request. For example, you may need to re-populate a form after checking it for validation errors.</p>
    <p dir="rtl">لاراول به شما اجازه می دهد که تا ورودی ها از درخواست قدیم را در درخواست جدید نگه داری کنید   برای نمونه شما ممکن است که یک فرم را ایجاد خطا ارزیابی باز تولیدکنید.</p>
    <h4>Flashing Input To The Session</h4>
    <p>The <code class=" language-php">flash</code> method will flash the current input to the <a href="http://laravel.com/docs/5.0/session">session</a> so that it is available during the user's next request to the application:</p>
    <p dir="rtl">تابع flash  ورودی های جاری در session را تازه می کند که در حین درخواست بعدی کاربر در دسترس هستند.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">flash<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Flashing Only Some Input To The Session</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">flashOnly<span class="token punctuation">(</span></span><span class="token string">'username'</span><span class="token punctuation">,</span> <span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">flashExcept<span class="token punctuation">(</span></span><span class="token string">'password'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Flash &amp; Redirect</h4>
    <p>Since you often will want to flash input in association with a redirect to the previous page, you may easily chain input flashing onto a redirect.</p>
    <p dir="rtl">از انجا که شما ممکن است بخواهید داده های  تازه شده رابه صفحه قبلی ارسال کنید شما به اسانی می توانید دادهها را به صورت زنجیره برای ارسال اماده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'form'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withInput<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'form'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withInput<span class="token punctuation">(</span></span><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">except<span class="token punctuation">(</span></span><span class="token string">'password'</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving Old Data</h4>
    <p>To retrieve flashed input from the previous request, use the <code class=" language-php">old</code> method on the <code class=" language-php">Request</code> instance.</p>
    <p dir="rtl">برای دریافت داده های تازه شده از درخواست قبلی از تایع old در یک نمونه request  استفاده می کنیم.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$username</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">old<span class="token punctuation">(</span></span><span class="token string">'username'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>If you are displaying old input within a Blade template, it is more convenient to use the <code class=" language-php">old</code> helper:</p>
    <p dir="rtl">اگربرای نمایش داده های قدیمی از  فالب blade   استفاده می کنید این کار راحت تر است با استفاده از تابع old</p>
    <pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token function">old<span class="token punctuation">(</span></span><span class="token string">'username'</span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>
    <p><a name="cookies"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/requests#cookies">Cookies</a></h2>
    <p>All cookies created by the Laravel framework are encrypted and signed with an authentication code, meaning they will be considered invalid if they have been changed by the client.</p>
    <p dir="rtl">همه کوکی های تولید شده توسط فریم ورک لاراول کد می شوند و با کد تایید هویت امضا می شود.به این معنی که انها نادرست تشخیص داده می شوند اگر توسط کاربر تغییر داده شوند.</p>
    <h4>Retrieving A Cookie Value</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">cookie<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Attaching A New Cookie To A Response</h4>
    <p>The <code class=" language-php">cookie</code> helper serves as a simple factory for generating new <code class=" language-php">Symfony\<span class="token package">Component<span class="token punctuation">\</span>HttpFoundation<span class="token punctuation">\</span>Cookie</span></code> instances. The cookies may be attached to a <code class=" language-php">Response</code> instance using the <code class=" language-php">withCookie</code> method:</p>
    <p dir="rtl">تابع cookie  استفاده می شود به عنوان یک کارخانه تولید نمونه هایی از Symfony\Component\HttpFoundation\Cookie
        کوکه ممکن به یک پاسخ با استفاده از تابع  	withCookie اضافه شود.
    </p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$response</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">Illuminate<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Response</span><span class="token punctuation">(</span><span class="token string">'Hello World'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$response</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withCookie<span class="token punctuation">(</span></span><span class="token function">cookie<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'value'</span><span class="token punctuation">,</span> <span class="token variable">$minutes</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Creating A Cookie That Lasts Forever*</h4>
    <p><em>By "forever", we really mean five years.</em></p>
    <p dir="rtl">Forever  معنی واقعی اون برای 5 سال است</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$response</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withCookie<span class="token punctuation">(</span></span><span class="token function">cookie<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">forever<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'value'</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Queueing Cookies</h4>
    <p>You may also "queue" a cookie to be added to the outgoing response, even before that response has been created:</p>
    <p dir="rtl">شما می توانید کوکی ها را صف کنید تا به پاسخ خروجی اضافه شود حتی قبل از اینکه پاسخی تولید شود .</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Cookie</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span>
        <span class="token punctuation">{</span>
    <span class="token comment" spellcheck="true">/**
     * Update a resource
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">update<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">Cookie<span class="token punctuation">::</span></span><span class="token function">queue<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'value'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token function">response<span class="token punctuation">(</span></span><span class="token string">'Hello World'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span></code></pre>
    <p><a name="files"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/requests#files">Files</a></h2>
    <h4>Retrieving An Uploaded File</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$file</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">file<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Determining If A File Was Uploaded</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">hasFile<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>The object returned by the <code class=" language-php">file</code> method is an instance of the <code class=" language-php">Symfony\<span class="token package">Component<span class="token punctuation">\</span>HttpFoundation<span class="token punctuation">\</span>File<span class="token punctuation">\</span>UploadedFile</span></code> class, which extends the PHP <code class=" language-php">SplFileInfo</code> class and provides a variety of methods for interacting with the file.</p>
    <p dir="rtl">
        شی که توسط تابع file  باز گردانده می شود  یک نمونه از کلاس Symfony\Component\HttpFoundation\File\UploadedF  است که ا کلاس sqlfileinfo  گسترش یافته است  وتوابع زیادی را برای تعامل با فایل ها فراهم می کند.
    </p>
    <h4>Determining If An Uploaded File Is Valid</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">file<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isValid<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Moving An Uploaded File</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">file<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">move<span class="token punctuation">(</span></span><span class="token variable">$destinationPath</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">file<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">move<span class="token punctuation">(</span></span><span class="token variable">$destinationPath</span><span class="token punctuation">,</span> <span class="token variable">$fileName</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>Other File Methods</h3>
    <p>There are a variety of other methods available on <code class=" language-php">UploadedFile</code> instances. Check out the <a href="http://api.symfony.com/2.5/Symfony/Component/HttpFoundation/File/UploadedFile.html">API documentation for the class</a> for more information regarding these methods.</p>
    <p dir="rtl">توابع مختلف دیگری برای یک نمونه از uploadfile در دسترس است.</p>
    <p><a name="other-request-information"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/requests#other-request-information">Other Request Information</a></h2>
    <p>The <code class=" language-php">Request</code> class provides many methods for examining the HTTP request for your application and extends the <code class=" language-php">Symfony\<span class="token package">Component<span class="token punctuation">\</span>HttpFoundation<span class="token punctuation">\</span>Request</span></code> class. Here are some of the highlights.</p>
    <p dir="rtl">کلاس request  توابع زیادی را تهیه کرده است برای امتحان کردن درخواست http برای برنامه و گسترش کلاس Symfony\Component\HttpFoundation\Request  . در اینجا چند مورد شاخص را یاد می کنم.</p>
    <h4>Retrieving The Request URI</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$uri</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">path<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Retrieving The Request Method</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$method</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">method<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">isMethod<span class="token punctuation">(</span></span><span class="token string">'post'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Determining If The Request Path Matches A Pattern</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">is<span class="token punctuation">(</span></span><span class="token string">'admin/*'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Get The Current Request URL</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token scope">Request<span class="token punctuation">::</span></span><span class="token function">url<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop