<!-- -->
@extends('master')

@section('content')
<article>
<h1>HTTP Controllers</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/controllers#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/controllers#basic-controllers">Basic Controllers</a></li>
    <li><a href="http://laravel.com/docs/5.0/controllers#controller-middleware">Controller Middleware</a></li>
    <li><a href="http://laravel.com/docs/5.0/controllers#implicit-controllers">Implicit Controllers</a></li>
    <li><a href="http://laravel.com/docs/5.0/controllers#restful-resource-controllers">RESTful Resource Controllers</a></li>
    <li><a href="http://laravel.com/docs/5.0/controllers#dependency-injection-and-controllers">Dependency Injection &amp; Controllers</a></li>
    <li><a href="http://laravel.com/docs/5.0/controllers#route-caching">Route Caching</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#introduction">Introduction</a></h2>
<p>Instead of defining all of your request handling logic in a single <code class=" language-php">routes<span class="token punctuation">.</span>php</code> file, you may wish to organize this behavior using Controller classes. Controllers can group related HTTP request handling logic into a class. Controllers are typically stored in the <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Controllers</code> directory.</p>
<p dir="rtl">بجای تعریف کردن همه منطق راه اندازی درخواست ها در یک فایل route.php  شما ممکن است بخواهید  این رفتار را با کلاس کنترلر سازماندهی کنید.کنترلر ها می توانند گروه بندی کنند منطق راه اندازی درخواست ها را در یک کلاس
    کنترلر ها معمو لا در pp/Http/Controllers     دخیره می شوند.
</p>
<p><a name="basic-controllers"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#basic-controllers">Basic Controllers</a></h2>
<p>Here is an example of a basic controller class:</p>
<p dir="rtl">در اینجا یک نمونه از کنترلر های پایه ای را شاهد هستید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">showProfile<span class="token punctuation">(</span></span><span class="token variable">$id</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'user.profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'user'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">findOrFail<span class="token punctuation">(</span></span><span class="token variable">$id</span><span class="token punctuation">)</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>We can route to the controller action like so:</p>
<p dir="rtl">شما می توانید توابع کنترلر را شبیه به این مسیریابی کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{id}'</span><span class="token punctuation">,</span> <span class="token string">'UserController@showProfile'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> All controllers should extend the base controller class.</p>
    <p dir="rtl">همه کنترلرها باید از کنترلر پایه مشتق شوند.</p>
</blockquote>
<h4>Controllers &amp; Namespaces</h4>
<p>It is very important to note that we did not need to specify the full controller namespace, only the portion of the class name that comes after the <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> namespace "root". By default, the <code class=" language-php">RouteServiceProvider</code> will load the <code class=" language-php">routes<span class="token punctuation">.</span>php</code> file within a route group containing the root controller namespace.</p>
<p dir="rtl">این خیلی مهم است که بخاطر داشته باشید که ما نیازی به تععین کامل فضای نام کنترلر نداریم.تنها قسمتی از نام کلاس را لازم داریم که بعد از فضای نام App\Http\Controllersمی اید.به صورت پیش فرض roueServiceProvider  فایل  route.php  رادر یک
    گروه از مسیر یاب ها که فضای نام کنترلر ها را هم شامل می شود بارگزاری می کند.
</p>
<p>If you choose to nest or organize your controllers using PHP namespaces deeper into the <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> directory, simply use the specific class name relative to the <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers</span></code> root namespace. So, if your full controller class is <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers<span class="token punctuation">\</span>Photos<span class="token punctuation">\</span>AdminController</span></code>, you would register a route like so:</p>
<p dir="rtl">اگر شما انتخاب کردی که بچینید یا سازمان دهی کنید کنترلر ها را با از فضای نام عمیق تر php  درون App\Http\Controllers
    به سادگی می توانید استفاده کنید از فضای نام وابسته به فضای نام App\Http\Controllers.
    بنابراین اگر تمام کنترلر های شما درون App\Http\Controllers\Photos\AdminController  قرار داردشما باید یک مسیر یاب شبیه به این ثبت کنید.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token string">'Photos\AdminController@method'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Naming Controller Routes</h4>
<p>Like Closure routes, you may specify names on controller routes:</p>
<p dir="rtl">شبیه عبارت زیر شما می توانید نامگذاری کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'FooController@method'</span><span class="token punctuation">,</span> <span class="token string">'as'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'name'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>URLs To Controller Actions</h4>
<p>To generate a URL to a controller action, use the <code class=" language-php">action</code> helper method:</p>
<p dir="rtl">برای تولید یک url  به تابع یک کنترلر از تابع action  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">action<span class="token punctuation">(</span></span><span class="token string">'App\Http\Controllers\FooController@method'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you wish to generate a URL to a controller action while using only the portion of the class name relative to your controller namespace, register the root controller namespace with the URL generator:</p>
<p dir="rtl">اگر شما بخواهید urlای تولید کنید به یک تابع در کنترلر در حالی که بخواهید از قسمتی از نام کلاس که وابسته به فضای نام کنترلر است استفاده کنید بایستی ریشه فضای نام کنترلر را با تولید کننده url  ثبت کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">URL<span class="token punctuation">::</span></span><span class="token function">setRootControllerNamespace<span class="token punctuation">(</span></span><span class="token string">'App\Http\Controllers'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$url</span> <span class="token operator">=</span> <span class="token function">action<span class="token punctuation">(</span></span><span class="token string">'FooController@method'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may access the name of the controller action being run using the <code class=" language-php">currentRouteAction</code> method:</p>
<p dir="rtl">شما می توانید به نام تابع کنترلر با استفاده از تابع currentRouteAction  دسترسی داشته باشید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$action</span> <span class="token operator">=</span> <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">currentRouteAction<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="controller-middleware"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#controller-middleware">Controller Middleware</a></h2>
<p><a href="http://laravel.com/docs/5.0/middleware">Middleware</a> may be specified on controller routes like so:</p>
<p dir="rtl">Middleware می تواند در مسیر یاب کنترلر تعیین شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'middleware'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'auth'</span><span class="token punctuation">,</span>
        <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'UserController@showProfile'</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Additionally, you may specify middleware within your controller's constructor:</p>
<p dir="rtl">علاوه بر این شما middleware  رادرون سازنده نیز می توانید تعیین کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Instantiate a new UserController instance.
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">middleware<span class="token punctuation">(</span></span><span class="token string">'auth'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">middleware<span class="token punctuation">(</span></span><span class="token string">'log'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'only'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'fooAction'</span><span class="token punctuation">,</span> <span class="token string">'barAction'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">middleware<span class="token punctuation">(</span></span><span class="token string">'subscribed'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'except'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'fooAction'</span><span class="token punctuation">,</span> <span class="token string">'barAction'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="implicit-controllers"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#implicit-controllers">Implicit Controllers</a></h2>
<p>Laravel allows you to easily define a single route to handle every action in a controller. First, define the route using the <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>controller</code> method:</p>
<p dir="rtl">لاراول به سادگی به شما اجازه می دهد مسیر یابی برای همه توابع داخل کنترلر تعیین کنید  ابتدا با استفاده از تابع Route::countroller  تعریف می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">controller<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token string">'UserController'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The <code class=" language-php">controller</code> method accepts two arguments. The first is the base URI the controller handles, while the second is the class name of the controller. Next, just add methods to your controller, prefixed with the HTTP verb they respond to:</p>
<p dir="rtl">تابع کنترلر دو ورودی می پذیرد.اولی url  پایه ای که کنترل با ان راه اندازی می شود و دومی نام کلاس کنترلر است.سپس تابع را به کنترلر مان اضافه می کنیم. وپیشوندی متناسب با نوع فعل http که به ان پاسخ می دهد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">BaseController</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getIndex<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">postProfile<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">anyLogin<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The <code class=" language-php">index</code> methods will respond to the root URI handled by the controller, which, in this case, is <code class=" language-php">users</code>.</p>
<p dir="rtl">تابع index  پاسخ می دهد به url   پایه ای که که در این مورد users است.</p>
<p>If your controller action contains multiple words, you may access the action using "dash" syntax in the URI. For example, the following controller action on our <code class=" language-php">UserController</code> would respond to the <code class=" language-php">users<span class="token operator">/</span>admin<span class="token operator">-</span>profile</code> URI:</p>
<p dir="rtl">اگر توابع کنترلر شامل چندین کلمه باشد شما با dashمی توانید به توابع دسترسی پیدا کنید.
    برای مثال توابع کنترلر userController  را دنبال کنید که باید به url        users/admin-profile   پاسخ دهد.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getAdminProfile<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token punctuation">{</span><span class="token punctuation">}</span></code></pre>
<h4>Assigning Route Names</h4>
<p>If you would like to "name" some of the routes on the controller, you may pass a third argument to the <code class=" language-php">controller</code> method:</p>
<p dir="rtl">اگر شما تمایل داشته باشید تا برخی از مسیرهای کنترلر را نام گذاری کنید  شما می توانید یک ورودی سوم را به کنترلر  بفرستید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">controller<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token string">'UserController'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'anyLogin'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'user.login'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="restful-resource-controllers"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#restful-resource-controllers">RESTful Resource Controllers</a></h2>
<p>Resource controllers make it painless to build RESTful controllers around resources. For example, you may wish to create a controller that handles HTTP requests regarding "photos" stored by your application. Using the <code class=" language-php">make<span class="token punctuation">:</span>controller</code> Artisan command, we can quickly create such a controller:</p>
<p dir="rtl">کنترلر منابع ساخت کنترلرrestfulدر اطراف منابع را بی خطر می کند.برای مثال شما ممکن است که بخواهید که یک کنترلر ایجاد کنید که درخواست http را وابسته به photo که توسط برنامه ذخیره شده اند را راه اندازی کند.</p>
<pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>controller PhotoController</code></pre>
<p>Next, we register a resourceful route to the controller:</p>
<p dir="rtl">با استفاده از فرمان make::controller  ما به سرعت می توانیم یک کنترلر ایجاد کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">,</span> <span class="token string">'PhotoController'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This single route declaration creates multiple routes to handle a variety of RESTful actions on the photo resource. Likewise, the generated controller will already have methods stubbed for each of these actions, including notes informing you which URIs and verbs they handle.</p>
<p dir="rtl">تنها همین یک مسیریاب چندین مسیریاب که  	که توابع مختلف از منبع photo را راه اندازی کند اعلان می کند.همچنین کنترلر تولید شده قبلا توابع ای برای هریک از این مسیر ها دارد.که شامل یادداشت های اگهی دهنده url  وتوابعی که انها را راه اندازی می کند می شود.</p>
<h4>Actions Handled By Resource Controller</h4>
<table>
    <thead>
    <tr>
        <th>Verb</th>
        <th>Path</th>
        <th>Action</th>
        <th>Route Name</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>GET</td>
        <td>/photo</td>
        <td>index</td>
        <td>photo.index</td>
    </tr>
    <tr>
        <td>GET</td>
        <td>/photo/create</td>
        <td>create</td>
        <td>photo.create</td>
    </tr>
    <tr>
        <td>POST</td>
        <td>/photo</td>
        <td>store</td>
        <td>photo.store</td>
    </tr>
    <tr>
        <td>GET</td>
        <td>/photo/{photo}</td>
        <td>show</td>
        <td>photo.show</td>
    </tr>
    <tr>
        <td>GET</td>
        <td>/photo/{photo}/edit</td>
        <td>edit</td>
        <td>photo.edit</td>
    </tr>
    <tr>
        <td>PUT/PATCH</td>
        <td>/photo/{photo}</td>
        <td>update</td>
        <td>photo.update</td>
    </tr>
    <tr>
        <td>DELETE</td>
        <td>/photo/{photo}</td>
        <td>destroy</td>
        <td>photo.destroy</td>
    </tr>
    </tbody>
</table>
<h4>Customizing Resource Routes</h4>
<p>Additionally, you may specify only a subset of actions to handle on the route:</p>
<p dir="rtl">علاوه بر این شما می توانید زیر مجموعه ای از توابع که توسط کنترلر راه اندازی شوند را تعیین کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">,</span> <span class="token string">'PhotoController'</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'only'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'index'</span><span class="token punctuation">,</span> <span class="token string">'show'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">,</span> <span class="token string">'PhotoController'</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'except'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'create'</span><span class="token punctuation">,</span> <span class="token string">'store'</span><span class="token punctuation">,</span> <span class="token string">'update'</span><span class="token punctuation">,</span> <span class="token string">'destroy'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>By default, all resource controller actions have a route name; however, you can override these names by passing a <code class=" language-php">names</code> array with your options:</p>
<p dir="rtl">به صورت پیش فرض همه توابع کنترل کننده منابع نامی دارند.اگر چه که شما می توانید این نام را تغییر دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'photo'</span><span class="token punctuation">,</span> <span class="token string">'PhotoController'</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'names'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'create'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'photo.build'</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Handling Nested Resource Controllers</h4>
<p>To "nest" resource controllers, use "dot" notation in your route declaration:</p>
<p dir="rtl">کنترلر منابع تودرتو از علامت "." برای اعلان مسیریاب استفاده می کنند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'photos.comments'</span><span class="token punctuation">,</span> <span class="token string">'PhotoCommentController'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This route will register a "nested" resource that may be accessed with URLs like the following: <code class=" language-php">photos<span class="token operator">/</span><span class="token punctuation">{</span>photos<span class="token punctuation">}</span><span class="token operator">/</span>comments<span class="token operator">/</span><span class="token punctuation">{</span>comments<span class="token punctuation">}</span></code>.</p>
<p dir="rtl">این مسیریاب ثبت می کند منابع تو درتو که می تواند با url  قابل دسترسی باشد.شبیه به اینphotos/{photos}/comments/{comments}.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">PhotoCommentController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Show the specified photo comment.
     *
     * @param  int  $photoId
     * @param  int  $commentId
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">show<span class="token punctuation">(</span></span><span class="token variable">$photoId</span><span class="token punctuation">,</span> <span class="token variable">$commentId</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Adding Additional Routes To Resource Controllers</h4>
<p>If it becomes necessary to add additional routes to a resource controller beyond the default resource routes, you should define those routes before your call to <code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span>resource</code>:</p>
<p dir="rtl">اگر لازم داشته باشید که مسیریاب اضافی به کنترل کننده منابع فراتر ازا منابع پیش فرض  اضافه کنید شما باید این مسیریاب ها را قبل از فراخوانی  route::resource استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'photos/popular'</span><span class="token punctuation">,</span> <span class="token string">'PhotoController@method'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">resource<span class="token punctuation">(</span></span><span class="token string">'photos'</span><span class="token punctuation">,</span> <span class="token string">'PhotoController'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="dependency-injection-and-controllers"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#dependency-injection-and-controllers">Dependency Injection &amp; Controllers</a></h2>
<h4>Constructor Injection</h4>
<p>The Laravel <a href="http://laravel.com/docs/5.0/container">service container</a> is used to resolve all Laravel controllers. As a result, you are able to type-hint any dependencies your controller may need in its constructor:</p>
<p dir="rtl">Service container  برای حل کردن همه کنترلر های لاراول استفاده می شود.به عنوان یک نتیجه شما قادر هستید که هر وابستگی را  به سازنده کنترلرتان اضافه کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">App<span class="token punctuation">\</span>Repositories<span class="token punctuation">\</span>UserRepository</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">UserController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The user repository instance.
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$users</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>UserRepository <span class="token variable">$users</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">users</span> <span class="token operator">=</span> <span class="token variable">$users</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Of course, you may also type-hint any <a href="http://laravel.com/docs/5.0/contracts">Laravel contract</a>. If the container can resolve it, you can type-hint it.</p>
<p dir="rtl">البته    شما می توانید هر یک از تعهدات لاراول را فعال کنیداگر که container  بتواند ان را حل کند شما هم می توانید.</p>
<h4>Method Injection</h4>
<p>In addition to constructor injection, you may also type-hint dependencies on your controller's methods. For example, let's type-hint the <code class=" language-php">Request</code> instance on one of our methods:</p>
<p dir="rtl">علاوه بر تزریق سازنده  شما می توانید  وابستگی هایی رادر توابع کنترلر اجرا کنید  برای نمونه یک نمونه درخواست راد رتابع کنترلر اجرا کنیم.</p>
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
<p dir="rtl">اگر تابع کنترلر همنین انتظار ورودی از پارامتر های مسیریاب را اشته باشد به سادگی می توانید ورودی ها را لیست کنید بعد از بقیه وابستگی ها</p>
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
<blockquote>
    <p><strong>Note:</strong> Method injection is fully compatible with <a href="http://laravel.com/docs/5.0/routing#route-model-binding">model binding</a>. The container will intelligently determine which arguments are model bound and which arguments should be injected.</p>
    <p dir="rtl">تزریق تابع کاملا با انقیاد مدل سازگار است.container به صورت هوشمند تشخیص می دهد که کدام ورودی را مدل باید بپذیرد وکدام  یک را بایستی رد کند.</p>
</blockquote>
<p><a name="route-caching"></a></p>
<h2><a href="http://laravel.com/docs/5.0/controllers#route-caching">Route Caching</a></h2>
<p>If your application is exclusively using controller routes, you may take advantage of Laravel's route cache. Using the route cache will drastically decrease the amount of time it take to register all of your application's routes. In some cases, your route registration may even be up to 100x faster! To generate a route cache, just execute the <code class=" language-php">route<span class="token punctuation">:</span>cache</code> Artisan command:</p>
<p dir="rtl">اگر برنامه منحصرا از  مسیریاب  	کنترلر استفاده می کند شما می توانید از مزایای  کش کردن مسیریاب ها استفاده کنید.با استفاده کردن از کش کردن مسیریاب ها به صورت قابل ملاحظه ای  زمانی را ثبت مسیریاب های برنامه صرف می شود را کاهش داد.در بعضی موارد ثبت مسیریاب ها 100برابر سریع تر شود . برای کش کردن مسیریاب فقط فرمان route::cache را اجرا  کنید.</p>
<pre class=" language-php"><code class=" language-php">php artisan route<span class="token punctuation">:</span>cache</code></pre>
<p>That's all there is to it! Your cached routes file will now be used instead of your <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>routes<span class="token punctuation">.</span>php</code> file. Remember, if you add any new routes you will need to generate a fresh route cache. Because of this, you may wish to only run the <code class=" language-php">route<span class="token punctuation">:</span>cache</code> command during your project's deployment.</p>
<p dir="rtl">این همه  ان چیزی است که باید انجام دهید فایل کش شده مسیر یاب ها به جای فایل app/Http/routes.php استفاده خواهد شد به یاد داشته باشید که اگر شما مسیریاب جدیدی تولید کنید باید مجدد ا ز این فرمان استفاده کنید.به همین دلیل ممکن است که شما بخواهید تنها فرمان roue:cache  در حین توسعه اجرا کنید.</p>
<p>To remove the cached routes file without generating a new cache, use the <code class=" language-php">route<span class="token punctuation">:</span>clear</code> command:</p>
<p dir="rtl">برای از بین بردن فایل کش شده مسیریاب بدون تولید مجدد  ان ازفرمان route::clear  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php">php artisan route<span class="token punctuation">:</span>clear</code></pre>
</article>
@stop