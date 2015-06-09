<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Installation</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0#install-composer">Install Composer</a></li>
        <li><a href="http://laravel.com/docs/5.0#install-laravel">Install Laravel</a></li>
        <li><a href="http://laravel.com/docs/5.0#server-requirements">Server Requirements</a></li>
    </ul>
    <p><a name="install-composer"></a></p>
    <h2><a href="http://laravel.com/docs/5.0#install-composer">Install Composer</a></h2>
    <p>Laravel utilizes <a href="http://getcomposer.org/">Composer</a> to manage its dependencies. So, before using Laravel, you will need to make sure you have Composer installed on your machine.</p>
    <p dir="rtl">لاراول برای مدیریت نیازمندیهایش از کامپوزر استفاده می کند بنابراین برای استفاده از لاراول شما باید از نصب کامپوزر مطمئن شوید.
    </p>

    <p><a name="install-laravel"></a></p>
    <h2><a href="http://laravel.com/docs/5.0#install-laravel">Install Laravel</a></h2>
    <h3>Via Laravel Installer</h3>
    <p>First, download the Laravel installer using Composer.</p>
    <p dir="rtl">ابتدا laravel installer را بوسیله کامپوزر دانلود می کنید .
    </p>
    <pre class=" language-php"><code class=" language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> <span class="token string">"laravel/installer=~1.1"</span></code></pre>
    <p>Make sure to place the <code class=" language-php"><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>composer<span class="token operator">/</span>vendor<span class="token operator">/</span>bin</code> directory in your PATH so the <code class=" language-php">laravel</code> executable can be located by your system.
        <br> <p dir="rtl">از قرار گرفتن مسیر کامپوزر در path سیستم خود مطمئن شوید تا لاراول قابل اجرا در سیستمتان قرار بگیرد.</p> </p>
    <p>Once installed, the simple <code class=" language-php">laravel <span class="token keyword">new</span></code> command will create a fresh Laravel installation in the directory you specify. For instance, <code class=" language-php">laravel <span class="token keyword">new</span> <span class="token class-name">blog</span></code> would create a directory named <code class=" language-php">blog</code> containing a fresh Laravel installation with all dependencies installed. This method of installation is much faster than installing via Composer:<br> <p dir="rtl">یکبار که این را نصب کنید فرمان ساده laravel new  یک لاراول جدید در پوشه که شما مشخص کرده اید قرار می گیرد
        برای نمونه laravel new blog  ایجاد می کند یک پوشه به نام blog  که شامل یک لاراول جدید با تمام ابزار های وابسته به ان
        استفاده از این روش بسیار سریع تر از نصب از طریق کامپوزر است
    </p>        </p>
    <pre class=" language-php"><code class=" language-php">laravel <span class="token keyword">new</span> <span class="token class-name">blog</span></code></pre>
    <h3>Via Composer Create-Project</h3>
    <p>You may also install Laravel by issuing the Composer <code class=" language-php">create<span class="token operator">-</span>project</code> command in your terminal:<br> <p dir="rtl" >شما با زدن این کامنت در ترمینال  می توانید لاراول را نصب کنید </p> </p>
    <pre class=" language-php"><code class=" language-php">composer create<span class="token operator">-</span>project laravel<span class="token operator">/</span>laravel <span class="token operator">--</span>prefer<span class="token operator">-</span>dist</code></pre>
    <h3>Scaffolding</h3>
    <p>Laravel ships with scaffolding for user registration and authentication. If you would like to remove this scaffolding, use the <code class=" language-php">fresh</code> Artisan command:<br><p  dir="rtl"> لاراول همراه خود سکو بندی هایی برای اضافه کردن وتایید کاربران دارداگر تمایلی به استفاده از ان را را ندارد  در کامنت لاین دستور زیر را وارد کنید.</p> </p>
    <pre class=" language-php"><code class=" language-php">php artisan fresh</code></pre>
    <p><a name="server-requirements"></a></p>
    <h2><a href="http://laravel.com/docs/5.0#server-requirements">Server Requirements</a></h2>
    <p>The Laravel framework has a few system requirements:</p>
    <p dir="rtl">فریم ورک لاراول نیازمندیهای سیستمی زیر را لازم دارد</p>
    <ul>
        <li>PHP &gt;= 5.4</li>
        <li>Mcrypt PHP Extension</li>
        <li>OpenSSL PHP Extension</li>
        <li>Mbstring PHP Extension</li>
        <li>Tokenizer PHP Extension</li>
    </ul>
    <p>As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension. When using Ubuntu, this can be done via <code class=" language-php">apt<span class="token operator">-</span>get install php5<span class="token operator">-</span>json</code>.</p>
    <p dir="rtl">وقتی از php ورژن 5.5 استقاده می کنید بعضی از سیستم عامل ها نیاز به نصب دستی php json extention را دارند وقتی که از Ubuntu استفاده می کنید بادستور apt-get install php5-json. می توانید این کار را انجام دهید.</p>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0#configuration">Configuration</a></h2>
    <p>The first thing you should do after installing Laravel is set your application key to a random string. If you installed Laravel via Composer, this key has probably already been set for you by the <code class=" language-php">key<span class="token punctuation">:</span>generate</code> command.</p>
    <p>Typically, this string should be 32 characters long. The key can be set in the <code class=" language-php"><span class="token punctuation">.</span>env</code> environment file. <strong>If the application key is not set, your user sessions and other encrypted data will not be secure!</strong></p>
    <p dir="rtl">اولین کاری که بعد از نصب لاراول باید انجام دهید تنظیم کردن application keyبا  یک رشته تصادفی است
        اگر شما لاراول را بوسیله کامپوزر نصب کرده اید احتمالا این کلید با فرمان key:generate قبلا تنظیم شده است.
        به طور معمول طول این کلید باید 32 کارکتر باشد.این کلید در فایل .env می تواند تنظیم شود.اگر این کلید تنظیم نشده باشد sessionهای کاربران و داده های کاربران امن نخواهد بود
    </p>
    <p>Laravel needs almost no other configuration out of the box. You are free to get started developing! However, you may wish to review the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> file and its documentation. It contains several options such as <code class=" language-php">timezone</code> and <code class=" language-php">locale</code> that you may wish to change according to your application.</p>
    <p dir="rtl">لاراول به تنظیمات دیگری نیاز ندارد . شما می توانید کارتان را شروع کنید .هر چند که ممکن است شما بخواهید فاید config/app.php را ببیند ونگاهی به مستندات ان بیندازید.این فایل شامل چندین گزینه از جمله timezone  و locale است که ممکن است شما بر اساس کاری که انجام می دهید ان را تغییر دهید.وقتی که لاراول را نصب کردید شما باید تنظیمات محیط را انجام دهید.</p>
    <p>Once Laravel is installed, you should also <a href="http://laravel.com/docs/5.0/configuration#environment-configuration">configure your local environment</a>.</p>
    <blockquote>
        <p><strong>Note:</strong> You should never have the <code class=" language-php">app<span class="token punctuation">.</span>debug</code> configuration option set to <code class=" language-php"><span class="token boolean">true</span></code> for a production application.</p>
        <p dir="rtl">شما وقتی سایتتان را بر روی سرور برای اجرا  شدن قرار می دهید گزینه app.debug نبایستی true باشد.</p>
    </blockquote>
    <p><a name="permissions"></a></p>
    <h3>Permissions</h3>
    <p>Laravel may require some permissions to be configured: folders within <code class=" language-php">storage</code> and <code class=" language-php">vendor</code> require write access by the web server.</p>
    <p dir="rtl">لاراول نیاز به چند مجوز دارد تا پیکربندی شود فولدر های داخل storage بایستی مجوز نوشتن را داشته باشید.</p>
    <p><a name="pretty-urls"></a></p>
    <h2><a href="http://laravel.com/docs/5.0#pretty-urls">Pretty URLs</a></h2>
    <h3>Apache</h3>
    <p>The framework ships with a <code class=" language-php"><span class="token keyword">public</span><span class="token operator">/</span><span class="token punctuation">.</span>htaccess</code> file that is used to allow URLs without <code class=" language-php">index<span class="token punctuation">.</span>php</code>. If you use Apache to serve your Laravel application, be sure to enable the <code class=" language-php">mod_rewrite</code> module.</p>
    <p dir="rtl">لاراول همراه است با یک فایل public/.htaccess که استفاده می شود تا مجوز دهد به url ها بدون فایل index.php
        اگر شما از apache برای اجرال لاراول استفاده می کنید از فعال بودن مازول mod_rewriteمطمئن شوید.
        اگر فایل.htaccessکه همراه با لاراول است با اپاچی کار نمی کرد کد زیر را استفاده کنید:
    </p>
    <p>If the <code class=" language-php"><span class="token punctuation">.</span>htaccess</code> file that ships with Laravel does not work with your Apache installation, try this one:</p>
<pre class=" language-php"><code class=" language-php">Options <span class="token operator">+</span>FollowSymLinks
        RewriteEngine On

        RewriteCond <span class="token operator">%</span><span class="token punctuation">{</span><span class="token constant">REQUEST_FILENAME</span><span class="token punctuation">}</span> <span class="token operator">!</span><span class="token operator">-</span>d
        RewriteCond <span class="token operator">%</span><span class="token punctuation">{</span><span class="token constant">REQUEST_FILENAME</span><span class="token punctuation">}</span> <span class="token operator">!</span><span class="token operator">-</span>f
        RewriteRule <span class="token operator">^</span> index<span class="token punctuation">.</span>php <span class="token punctuation">[</span>L<span class="token punctuation">]</span></code></pre>
    <h3>Nginx</h3>
    <p>On Nginx, the following directive in your site configuration will allow "pretty" URLs:</p>
<pre class=" language-php"><code class=" language-php">location <span class="token operator">/</span> <span class="token punctuation">{</span>
        try_files <span class="token variable">$uri</span> <span class="token variable">$uri</span><span class="token operator">/</span> <span class="token operator">/</span>index<span class="token punctuation">.</span>php<span class="token operator">?</span><span class="token variable">$query_string</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>Of course, when using <a href="http://laravel.com/docs/5.0/homestead">Homestead</a>, pretty URLs will be configured automatically.</p>
</article>
@stop