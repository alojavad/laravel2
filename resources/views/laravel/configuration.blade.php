<!-- -->

@extends('master')

@section('content')
<article>
    <h1>Configuration</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/configuration#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/configuration#after-installation">After Installation</a></li>
        <li><a href="http://laravel.com/docs/5.0/configuration#accessing-configuration-values">Accessing Configuration Values</a></li>
        <li><a href="http://laravel.com/docs/5.0/configuration#environment-configuration">Environment Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/configuration#configuration-caching">Configuration Caching</a></li>
        <li><a href="http://laravel.com/docs/5.0/configuration#maintenance-mode">Maintenance Mode</a></li>
        <li><a href="http://laravel.com/docs/5.0/configuration#pretty-urls">Pretty URLs</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#introduction">Introduction</a></h2>
    <p>All of the configuration files for the Laravel framework are stored in the <code class=" language-php">config</code> directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.</p>
    <p dir="rtl">همه فایلهای پیکربندی برای لاراول در پوشه config قرار می گیرد.همه گزینه ها مستند سازی شده بنابراین احساس راحتی داشته باشید برای جستجو ویافتن گزینه های مشابه</p>
    <p><a name="after-installation"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#after-installation">After Installation</a></h2>
    <h3>Naming Your Application</h3>
    <p>After installing Laravel, you may wish to "name" your application. By default, the <code class=" language-php">app</code> directory is namespaced under <code class=" language-php">App</code>, and autoloaded by Composer using the <a href="http://www.php-fig.org/psr/psr-4/">PSR-4 autoloading standard</a>. However, you may change the namespace to match the name of your application, which you can easily do via the <code class=" language-php">app<span class="token punctuation">:</span>name</code> Artisan command.</p>
    <p dir="rtl">بعد از نصب لاراول شما ممکن است بخواهید که برنامه خود را نامگذاری کنید. به صورت پیش فرض پوشه app فضای نام app را دارد که بوسیله کامپوزر از PSR-4 autoloading standard  استفاده می کند.هر چندکه شما ممکن است این نام را تغییر دهید تا با نام برنامه مطابقت داشته باشد.که این کار را به راحتی با فرمان app:name  می توانید انجام دهید.</p>
    <p>For example, if your application is named "Horsefly", you could run the following command from the root of your installation:</p>
    <p dir="rtl">برای نمونه اگر نام برنامه شما قرار است horsefly  باشد شما می توانید فرمان زیر را در محل برنامه تان اجرا کنید.</p>
    <pre class=" language-php"><code class=" language-php">php artisan app<span class="token punctuation">:</span>name Horsefly</code></pre>
    <p>Renaming your application is entirely optional, and you are free to keep the <code class=" language-php">App</code> namespace if you wish.</p>
    <p dir="rtl">تغییر نام برنامه کاملا اختیاریست وشما می توانید نام  app را نگه دارید.</p>
    <h3>Other Configuration</h3>
    <p>Laravel needs very little configuration out of the box. You are free to get started developing! However, you may wish to review the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> file and its documentation. It contains several options such as <code class=" language-php">timezone</code> and <code class=" language-php">locale</code> that you may wish to change according to your location.</p>
    <p dir="rtl">لاراول به تنظیمات دیگری نیاز ندارد . شما می توانید کارتان را شروع کنید .هر چند که ممکن است شما بخواهید فاید config/app.php را ببیند ونگاهی به مستندات ان بیندازید.این فایل شامل چندین گزینه از جمله timezone  و locale است که ممکن است شما بر اساس کاری که انجام می دهید ان را تغییر دهید.وقتی که لاراول را نصب کردید شما باید تنظیمات محیط را انجام دهید.</p>
    <p>Once Laravel is installed, you should also <a href="http://laravel.com/docs/5.0/configuration#environment-configuration">configure your local environment</a>.</p>
    <blockquote>
        <p><strong>Note:</strong> You should never have the <code class=" language-php">app<span class="token punctuation">.</span>debug</code> configuration option set to <code class=" language-php"><span class="token boolean">true</span></code> for a production application.</p>
    </blockquote>
    <p dir="rtl">شما وقتی سایتتان را بر روی هاست اصلی برای اجرا  شدن قرار می دهید گزینه app.debug نبایستی true باشد.</p>
    <p><a name="permissions"></a></p>
    <h3>Permissions</h3>
    <p>Laravel may require one set of permissions to be configured: folders within <code class=" language-php">storage</code> and <code class=" language-php">vendor</code> require write access by the web server.</p>
    <p><a name="accessing-configuration-values"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#accessing-configuration-values">Accessing Configuration Values</a></h2>
    <p>You may easily access your configuration values using the <code class=" language-php">Config</code> facade:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token scope">Config<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'app.timezone'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Config<span class="token punctuation">::</span></span><span class="token function">set<span class="token punctuation">(</span></span><span class="token string">'app.timezone'</span><span class="token punctuation">,</span> <span class="token string">'America/Chicago'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also use the <code class=" language-php">config</code> helper function:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$value</span> <span class="token operator">=</span> <span class="token function">config<span class="token punctuation">(</span></span><span class="token string">'app.timezone'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="environment-configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#environment-configuration">Environment Configuration</a></h2>
    <p>It is often helpful to have different configuration values based on the environment the application is running in. For example, you may wish to use a different cache driver locally than you do on your production server. It's easy using environment based configuration.</p>

    <p>To make this a cinch, Laravel utilizes the <a href="https://github.com/vlucas/phpdotenv">DotEnv</a> PHP library by Vance Lucas. In a fresh Laravel installation, the root directory of your application will contain a <code class=" language-php"><span class="token punctuation">.</span>env<span class="token punctuation">.</span>example</code> file. If you install Laravel via Composer, this file will automatically be renamed to <code class=" language-php"><span class="token punctuation">.</span>env</code>. Otherwise, you should rename the file manually.</p>
    <p dir="rtl">این می تواند مفید باشد که شما  از پیکر بندی های مختلفی با توجه به محیطی که برنامه در ان اجرا می شود استفاده کنید  برای نمونه شما ممکن است بخواهید از سیستم کش مختلفی برای حالت توسعه محلی نسبت به حالت اجرا بر روی سرور استفاده کنید.استفاده از محیط بر اساس پیکربندی کار اسانی است.برای اینکه این کار راحت شود لاراول  استفاده می کند کتابخانه php .envکه توسط vance lucasانجام شده.در لاراولهایی که تازه نصب شده  در پوشه روت فایل .env.exampleقرار دارد . اگز شما لاراول را از طریق کامپوزر نصب کنید این فایل به صورت اتوماتیک به .envتغییر نام می دهد در غیر این صورت شما باید این کار را به صورت دستی انجام دهید.</p>
    <p>All of the variables listed in this file will be loaded into the <code class=" language-php"><span class="token global">$_ENV</span></code> PHP super-global when your application receives a request. You may use the <code class=" language-php">env</code> helper to retrieve values from these variables. In fact, if you review the Laravel configuration files, you will notice several of the options already using this helper!</p>
    <p dir="rtl">همه متغییرهای لیست شده درون این فایل قرار می گیرند درون $_env  وقتتی که برنامه درخواستی را دریافت می کند .شما می توانید از تابع env برای دریافت مقادیر این متغییرها اقدام نمایید.در حقیقت اگر شما فایل های پیکربتدی لاراول را بازنگری کنید شما جند تا از انتخابهای ان را که قبلا استفاده شده است را خواهید فهمید.</p>
    <p>Feel free to modify your environment variables as needed for your own local server, as well as your production environment. However, your <code class=" language-php"><span class="token punctuation">.</span>env</code> file should not be committed to your application's source control, since each developer / server using your application could require a different environment configuration.</p>
    <p dir="rtl">برای تغییر این متغییرهای محلی متناسب با نیازتان برای سرور محلیط احساس راحتی خواهید کرد همان طور که برای سرور اجرایی می کنید.
        هرچند که فایل .env نباید بکار برده شود به عنوان  کنترل کننده منابع برنامتان.زیرا که هر توسعه دهنده و سروری که استفاده می کند ازبرنامه شما پیکربندی محیطی مختلفی را نیاز دارد.
    </p>
    <p>If you are developing with a team, you may wish to continue including a <code class=" language-php"><span class="token punctuation">.</span>env<span class="token punctuation">.</span>example</code> file with your application. By putting place-holder values in the example configuration file, other developers on your team can clearly see which environment variables are needed to run your application.</p>
    <p dir="rtl">اگر شما به صورت تیمی کار می کنید شما ممکن است بخواهید که فایل .env.example همراه برنامتان باشد.با قرار دادن مقادیر که این محل را پر کند در این فایل  پیکربندی بقیه توسعه دهندگان در تیم به طور واضح می توانند ببینند کدام متغییرها برای اجرای برنامه نیاز است.</p>
    <h4>Accessing The Current Application Environment</h4>
    <p>You may access the current application environment via the <code class=" language-php">environment</code> method on the <code class=" language-php">Application</code> instance:</p>
    <p dir="rtl">شما با تابع envirement می توانید به محیط فعلی اجرای برنامه دسترسی داشته یاشید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$environment</span> <span class="token operator">=</span> <span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">environment<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also pass arguments to the <code class=" language-php">environment</code> method to check if the environment matches a given value:</p>
    <p dir="rtl">شما حتی می توانید متغییر به این تابع بفرستید تا ببینید محیط با این متغییر برابری می کند </p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">environment<span class="token punctuation">(</span></span><span class="token string">'local'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The environment is local
</span><span class="token punctuation">}</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">environment<span class="token punctuation">(</span></span><span class="token string">'local'</span><span class="token punctuation">,</span> <span class="token string">'staging'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The environment is either local OR staging...
</span><span class="token punctuation">}</span></code></pre>
    <p>To obtain an instance of the application, resolve the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Foundation<span class="token punctuation">\</span>Application</span></code> contract via the <a href="http://laravel.com/docs/5.0/container">service container</a>. Of course, if you are within a <a href="http://laravel.com/docs/5.0/providers">service provider</a>, the application instance is available via the <code class=" language-php"><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">app</span></code> instance variable.</p>
    <p dir="rtl">برای اینکه داشته باشید یک نمونه از برنامه را  . Illuminate\Contracts\Foundation\Application  باservice containerداشته باشید.البته اگر شما داخل service containerهستید  یک نمونه از برنامه توسط $this->app در دسترس خواهد بود.</p>
    <p>An application instance may also be accessed via the <code class=" language-php">app</code> helper or the <code class=" language-php">App</code> facade:</p>
    <p dir="rtl">یک نمونه از برنامه توسط تابه app یا نما app قابل دسترسی خواهد بود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$environment</span> <span class="token operator">=</span> <span class="token function">app<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">environment<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$environment</span> <span class="token operator">=</span> <span class="token scope">App<span class="token punctuation">::</span></span><span class="token function">environment<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="configuration-caching"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#configuration-caching">Configuration Caching</a></h2>
    <p>To give your application a little speed boost, you may cache all of your configuration files into a single file using the <code class=" language-php">config<span class="token punctuation">:</span>cache</code> Artisan command. This will combine all of the configuration options for your application into a single file which can be loaded quickly by the framework.</p>
    <p dir="rtl">برای اینکه سرعت برنامه را مقداری افزایش دهید  شما ممکن است همه فایل های پیکر بندی را داخل یک فایل کش کنید بوسیله config:cache  این کار همه گزینه های پیکربندی برنامه رh درون یک فایل قرار می دهد که بار گذاری ان بوسیله فریم ورک را سریع می کند.</p>
    <p>You should typically run the <code class=" language-php">config<span class="token punctuation">:</span>cache</code> command as part of your deployment routine.</p>
    <p dir="rtl">شما  ممکن است فرمان config:cache  را به طور معمول به عنوان قسمتی از روال توسعه انجام دهید.</p>
    <p><a name="maintenance-mode"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#maintenance-mode">Maintenance Mode</a></h2>
    <p>When your application is in maintenance mode, a custom view will be displayed for all requests into your application. This makes it easy to "disable" your application while it is updating or when you are performing maintenance. A maintenance mode check is included in the default middleware stack for your application. If the application is in maintenance mode, an <code class=" language-php">HttpException</code> will be thrown with a status code of 503.</p>
    <p dir="rtl">وقتی برنامه شما در حالت نگه داری است یک صفحه خاصی برای تمام درخواست های برنامه نمایش داده می شود این کار به اسانی برنامه را غیرفعال می کند در حالی که اپدیت می شود یا حالت نگهداری اجرا می شود.بررسی حالت نگهداری در یک middleware به صورت پیش فرض قرار می گیرد.اگر برنامه در حالت نگه داری باشد یک httpexception اجرا می شود با کد حالت 503</p>

    <p>To enable maintenance mode, simply execute the <code class=" language-php">down</code> Artisan command:</p>
    <p dir="rtl">برای فعال کردن حالت نگهداری به سادگی فرمان artisan down را اجرا می کنیم.</p>
    <pre class=" language-php"><code class=" language-php">php artisan down</code></pre>
    <p>To disable maintenance mode, use the <code class=" language-php">up</code> command:</p>
    <p dir="rtl">برای غیرفعال کردن حالت نگهداری از فرمان up استفاده می کنیم.</p>
    <pre class=" language-php"><code class=" language-php">php artisan up</code></pre>
    <h3>Maintenance Mode Response Template</h3>
    <p>The default template for maintenance mode responses is located in <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>errors<span class="token operator">/</span><span class="token number">503</span><span class="token punctuation">.</span>blade<span class="token punctuation">.</span>php</code>.</p>
    <p dir="rtl">قالب پیش فرض برای حالت نگه داری در resources/views/errors/503.blade.php برای پاسخ گویی قرار می گیرد.</p>
    <h3>Maintenance Mode &amp; Queues</h3>
    <p>While your application is in maintenance mode, no <a href="http://laravel.com/docs/5.0/queues">queued jobs</a> will be handled. The jobs will continue to be handled as normal once the application is out of maintenance mode.</p>
    <p dir="rtl">وقتی که برنامه در حالت نگه داری است صف کردن کارها اجرا نخواهد شد کارها ادامه خواهند  داد تا اجرا شوند به صورت عادی وقتی که برنامه از حالت نگه داری خارج شود.</p>
    <p><a name="pretty-urls"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/configuration#pretty-urls">Pretty URLs</a></h2>
    <h3>Apache</h3>
    <p>The framework ships with a <code class=" language-php"><span class="token keyword">public</span><span class="token operator">/</span><span class="token punctuation">.</span>htaccess</code> file that is used to allow URLs without <code class=" language-php">index<span class="token punctuation">.</span>php</code>. If you use Apache to serve your Laravel application, be sure to enable the <code class=" language-php">mod_rewrite</code> module.</p>
    <p>If the <code class=" language-php"><span class="token punctuation">.</span>htaccess</code> file that ships with Laravel does not work with your Apache installation, try this one:</p>
<pre class=" language-php"><code class=" language-php">Options <span class="token operator">+</span>FollowSymLinks
        RewriteEngine On

        RewriteCond <span class="token operator">%</span><span class="token punctuation">{</span><span class="token constant">REQUEST_FILENAME</span><span class="token punctuation">}</span> <span class="token operator">!</span><span class="token operator">-</span>d
        RewriteCond <span class="token operator">%</span><span class="token punctuation">{</span><span class="token constant">REQUEST_FILENAME</span><span class="token punctuation">}</span> <span class="token operator">!</span><span class="token operator">-</span>f
        RewriteRule <span class="token operator">^</span> index<span class="token punctuation">.</span>php <span class="token punctuation">[</span>L<span class="token punctuation">]</span></code></pre>
    <p>If your web host doesn't allow the <code class=" language-php">FollowSymlinks</code> option, try replacing it with <code class=" language-php">Options <span class="token operator">+</span>SymLinksIfOwnerMatch</code>.</p>
    <h3>Nginx</h3>
    <p>On Nginx, the following directive in your site configuration will allow "pretty" URLs:</p>
<pre class=" language-php"><code class=" language-php">location <span class="token operator">/</span> <span class="token punctuation">{</span>
        try_files <span class="token variable">$uri</span> <span class="token variable">$uri</span><span class="token operator">/</span> <span class="token operator">/</span>index<span class="token punctuation">.</span>php<span class="token operator">?</span><span class="token variable">$query_string</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>Of course, when using <a href="http://laravel.com/docs/5.0/homestead">Homestead</a>, pretty URLs will be configured automatically.</p>
</article>

@stop