<!-- -->
@extends('master')

@section('content')
<article>
<h1>Eloquent ORM</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/eloquent#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#basic-usage">Basic Usage</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#mass-assignment">Mass Assignment</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#insert-update-delete">Insert, Update, Delete</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#soft-deleting">Soft Deleting</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#timestamps">Timestamps</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#query-scopes">Query Scopes</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#global-scopes">Global Scopes</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#relationships">Relationships</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#querying-relations">Querying Relations</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#eager-loading">Eager Loading</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#inserting-related-models">Inserting Related Models</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#touching-parent-timestamps">Touching Parent Timestamps</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#working-with-pivot-tables">Working With Pivot Tables</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#collections">Collections</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#accessors-and-mutators">Accessors &amp; Mutators</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#date-mutators">Date Mutators</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#attribute-casting">Attribute Casting</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#model-events">Model Events</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#model-observers">Model Observers</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#model-url-generation">Model URL Generation</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#converting-to-arrays-or-json">Converting To Arrays / JSON</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#introduction">Introduction</a></h2>
<p>The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table.</p>
<p dir="rtl">ormکه در لاراول قرار داردمهیا کرده است پیاده سازی زیبا وساده برای کار کردن با پایگاه داده.هر جدول پایگاه داده یک مدل متناظر با خودش دارد که برای تعامل با جدول استفاده می شود .</p>
<p>Before getting started, be sure to configure a database connection in <code class=" language-php">config<span class="token operator">/</span>database<span class="token punctuation">.</span>php</code>.</p>
<p dir="rtl">قبل از اینکه شروع کنیم مطمئن شوید که پیکربندی اتصال به پایگاه داده به درستی انجام شده باشد.</p>
<p><a name="basic-usage"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#basic-usage">Basic Usage</a></h2>
<p>To get started, create an Eloquent model. Models typically live in the <code class=" language-php">app</code> directory, but you are free to place them anywhere that can be auto-loaded according to your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file. All Eloquent models extend <code class=" language-php">Illuminate\<span class="token package">Database<span class="token punctuation">\</span>Eloquent<span class="token punctuation">\</span>Model</span></code>.</p>
<p dir="rtl">برای شروع  یک مدل eloquent ایجاد کنید  مدل ها معمولا در پوشه  مدل ها معمولا در پوشه APPقرار می گیرند ولی شما ازاد هستید که انها را هر جایی که توسط auto_load composer.json  بتواند  بارگذاری شود قرار دهید.همه مدل های همه مدل های eloquent گسترش یافته Illuminate\Database\Eloquent\Model.  هستند.</p>
<h4>Defining An Eloquent Model</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span><span class="token punctuation">}</span></code></pre>
<p>You may also generate Eloquent models using the <code class=" language-php">make<span class="token punctuation">:</span>model</code> command:</p>
<p dir="rtl">شما می توانید مدل eloquent را با فرمان make:model تولید کنید.</p>
<pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>model User</code></pre>
<p>Note that we did not tell Eloquent which table to use for our <code class=" language-php">User</code> model. The "snake case", plural name of the class will be used as the table name unless another name is explicitly specified. So, in this case, Eloquent will assume the <code class=" language-php">User</code> model stores records in the <code class=" language-php">users</code> table. You may specify a custom table by defining a <code class=" language-php">table</code> property on your model:</p>
<p dir="
">بیاد داشته باشید که نیازی نیست که به مدل بگوییم از کدام جدول استفاده کند
    نام کلاس به عنوان تان جدول استفاده می شود مگر اینکه به صراحت نام جدولی تعیین شود.در این مدل فرض می شود که مدلuser  داده را در جدول user  دخیره می کند.شما می توانید نام جدول خاصی را به عنوان با استفاده از خاصیت property  مدل تعیین کنید.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$table</span> <span class="token operator">=</span> <span class="token string">'my_users'</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> Eloquent will also assume that each table has a primary key column named <code class=" language-php">id</code>. You may define a <code class=" language-php">primaryKey</code> property to override this convention. Likewise, you may define a <code class=" language-php">connection</code> property to override the name of the database connection that should be used when utilizing the model.</p>
    <p dir="rtl">بیاد داشته که aloquent  فرض می کند که در هر جدول کلید اصلی برابر با id  است.شما می توانید یک صفت primaryKey  تعریف کنید تا این قاعده را تغییر دهید.همچنین شما می توانید صفت connection   را تعریف کنید تا نام کانکشن پایگاه داده که مدل از ان استفاده می کند را  تغییر دهید.</p>
</blockquote>
<p>Once a model is defined, you are ready to start retrieving and creating records in your table. Note that you will need to place <code class=" language-php">updated_at</code> and <code class=" language-php">created_at</code> columns on your table by default. If you do not wish to have these columns automatically maintained, set the <code class=" language-php"><span class="token variable">$timestamps</span></code> property on your model to <code class=" language-php"><span class="token boolean">false</span></code>.</p>
<p dir="rtl">یک بار که مدل تعریف شد شما اماده دریافت و ذخیرهداده در جداول هستید.بیاد داشته باشید که شما نیاز به قرار دادن صفات update_at  create_at  بهصئرت پیش فرض در جدول را دارید.اگر شما نمی خواهید که این صفات به صورت خودکار نگه داری شود شما  می توانید صفت $timestamp  را false  قرار دهید.</p>
<h4>Retrieving All Models</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Retrieving A Record By Primary Key</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token function">var_dump<span class="token punctuation">(</span></span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> All methods available on the <a href="http://laravel.com/docs/queries">query builder</a> are also available when querying Eloquent models.</p>
    <p dir="rtl">بیاد داشته باشید که همه توابع query builder  در eloquent orm  نیز می تواند استفاده شود.</p>
</blockquote>
<h4>Retrieving A Model By Primary Key Or Throw An Exception</h4>
<p>Sometimes you may wish to throw an exception if a model is not found. To do this, you may use the <code class=" language-php">firstOrFail</code> method:</p>
<p dir="rtl">بعضی مواقع شما ممکن است بخواهید یک پیغام خطا را درصورت پیدا نشدن مدل نمایش دهید.به شما اجازه داده می شود که خطا ها را بوسیله app::error  بگیرید وصفحه 404 را نمایش دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$model</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">findOrFail<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$model</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">firstOrFail<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Doing this will let you catch the exception so you can log and display an error page as necessary. To catch the <code class=" language-php">ModelNotFoundException</code>, add some logic to your <code class=" language-php">app<span class="token operator">/</span>Exceptions<span class="token operator">/</span>Handler<span class="token punctuation">.</span>php</code> file.</p>
<p dir="rtl">برای ثبت کردن یک خطا  بایستی بهModelNotFoundException گوش دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Database<span class="token punctuation">\</span>Eloquent<span class="token punctuation">\</span>ModelNotFoundException</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">Handler</span> <span class="token keyword">extends</span> <span class="token class-name">ExceptionHandler</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">render<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Exception <span class="token variable">$e</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$e</span> <span class="token keyword">instanceof</span> <span class="token class-name">ModelNotFoundException</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
           <span class="token comment" spellcheck="true"> // Custom logic for model not found...
</span>        <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">render<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token variable">$e</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Querying Using Eloquent Models</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">take<span class="token punctuation">(</span></span><span class="token number">10</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$users</span> <span class="token keyword">as</span> <span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token function">var_dump<span class="token punctuation">(</span></span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<h4>Eloquent Aggregates</h4>
<p>Of course, you may also use the query builder aggregate functions.</p>
<p dir="rtl">البته شما می توانید از توابع جمع بندی query builder  نیز استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$count</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">count<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you are unable to generate the query you need via the fluent interface, feel free to use <code class=" language-php">whereRaw</code>:</p>
<p dir="rtl">اگر شما نمی توانید پرس وجو با واسطی راحت  تولید کنید 	با استفاده از whereRaw  احساس راحتی خواهید کرد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">whereRaw<span class="token punctuation">(</span></span><span class="token string">'age &gt; ? and votes = 100'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token number">25</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Chunking Results</h4>
<p>If you need to process a lot (thousands) of Eloquent records, using the <code class=" language-php">chunk</code> command will allow you to do without eating all of your RAM:</p>
<p dir="rtl">اگر شما نیاز به پردازش تعداد زیادی از رکوردهای eloquent  دارید می توانید از chunk  استفاده کنید که به شما اجازه انجام این کار را می دهد بدون اینکه بدون اینکه همه فضای رم شما را بخورد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">chunk<span class="token punctuation">(</span></span><span class="token number">200</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$users</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$users</span> <span class="token keyword">as</span> <span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The first argument passed to the method is the number of records you wish to receive per "chunk". The Closure passed as the second argument will be called for each chunk that is pulled from the database.</p>
<p dir="rtl">اولین ارگومانی که به این تابع ارسال می شود تعداد رکورد هایی است که می خواهید برای هر بسته  پردازش کنید.تابعی که به عنوان ارگومان دوم ارسال می شود برای هر بسته ای که از پایگاه داده گرفته می شود اجرا می شود.</p>
<h4>Specifying The Query Connection</h4>
<p>You may also specify which database connection should be used when running an Eloquent query. Simply use the <code class=" language-php">on</code> method:</p>
<p dir="rtl">شما می توانید اتصالی که برای اجرای پرس وجو های eloquent بکار می رود را تعیین کنیدبه سادگی و با استفاده از تابع on</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">on<span class="token punctuation">(</span></span><span class="token string">'connection-name'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you are using <a href="http://laravel.com/docs/5.0/database#read-write-connections">read / write connections</a>, you may force the query to use the "write" connection with the following method:</p>
<p dir="rtl">گر شما از دو اتصال جداگانه برای خواندن و نوشتن استفاده می کنید شما می توانید با استفاده از تابع زیر بر نوشتن تمرکز کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">onWriteConnection<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="mass-assignment"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#mass-assignment">Mass Assignment</a></h2>
<p>When creating a new model, you pass an array of attributes to the model constructor. These attributes are then assigned to the model via mass-assignment. This is convenient; however, can be a <strong>serious</strong> security concern when blindly passing user input into a model. If user input is blindly passed into a model, the user is free to modify <strong>any</strong> and <strong>all</strong> of the model's attributes. For this reason, all Eloquent models protect against mass-assignment by default.</p>
<p dir="rtl">وقتی شما یک مدل ایجاد می کنید شما می توانید یک ارایه از صفات را به ارایه ارسال کنید .این صفات بوسیله mass assignment  درمدل قرار می گیرند این کار راحتی است ولی می تواند مشکلات امنیتی جدی را وقتی ورودی های کاربر به صورت کور کورانه ای در پایگاه قرار می دهیم داشته باشد.اگر ورودی های کاربر به صورت کورکورانه ای به مدل ارسال شود کاربر زاد است که همه یا تعدادی ازاین صفات را تغییر دهد.به همین دلیل تمامی مدل های eloquent  در برابر مقدار دهی زیاد محافظت می شوند.</p>
<p>To get started, set the <code class=" language-php">fillable</code> or <code class=" language-php">guarded</code> properties on your model.</p>
<p dir="rtl">برای شروع صفات fillable guarded  را تنظیم می کنیم.</p>
<h4>Defining Fillable Attributes On A Model</h4>
<p>The <code class=" language-php">fillable</code> property specifies which attributes should be mass-assignable. This can be set at the class or instance level.</p>
<p dir="rtl">صفت fillable  تعیین می کند که کدام صفات می توانند به صورت گسترده مقدار بگیرند این ویژگی در سطح صفات یا سطح یک نمونه از شی قابل تنظیم شدن است.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$fillable</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'first_name'</span><span class="token punctuation">,</span> <span class="token string">'last_name'</span><span class="token punctuation">,</span> <span class="token string">'email'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<p>In this example, only the three listed attributes will be mass-assignable.</p>
<p dir="rtl">در مثال بالا تنها سه صفت به طور گسترده می تواند مقدار دهی شود.</p>
<h4>Defining Guarded Attributes On A Model</h4>
<p>The inverse of <code class=" language-php">fillable</code> is <code class=" language-php">guarded</code>, and serves as a "black-list" instead of a "white-list":</p>
<p dir="rtl">معکوس fillableبرابر است با guarded  وبع عنوان لیست سیاه در برابر لیست سفید به کار برده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$guarded</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token string">'password'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> When using <code class=" language-php">guarded</code>, you should still never pass <code class=" language-php"><span class="token scope">Input<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code> or any raw array of user controlled input into a <code class=" language-php">save</code> or <code class=" language-php">update</code> method, as any column that is not guarded may be updated.</p>
    <p dir="rtl">بیاد داشته باشید که وقتی از guarded  استفاده می کنید شما هرگز نبایستی input::get()  یا یک ارایه از ورودی های کاربر را به تابع save  یا update  ارسال کنید.وقتی که هیچ ستونی نیست که محافظت نشده باشد می توانید به روز رسانی کنید.</p>
</blockquote>
<h4>Blocking All Attributes From Mass Assignment</h4>
<p>In the example above, the <code class=" language-php">id</code> and <code class=" language-php">password</code> attributes may <strong>not</strong> be mass assigned. All other attributes will be mass assignable. You may also block <strong>all</strong> attributes from mass assignment using the guard property:</p>
<p dir="rtl">در مثال بالا صفات id  password  نمی توانند مقدار دهی گسترده شوند در خالی که مابقی صفات می توانند .شما می توانید تمامی صفات را در برابر مقدار دهی گسترده محافظت کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">protected</span> <span class="token variable">$guarded</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'*'</span><span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p><a name="insert-update-delete"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#insert-update-delete">Insert, Update, Delete</a></h2>
<p>To create a new record in the database from a model, simply create a new model instance and call the <code class=" language-php">save</code> method.</p>
<p dir="rtl">برای ایجاد یک رکورد جدید در پایگاه داده از طریق مدل .یک مدل ایجاد کنید وتابع save  رافراخوانی کنید.</p>
<h4>Saving A New Model</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">User</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span> <span class="token operator">=</span> <span class="token string">'John'</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> Typically, your Eloquent models will have auto-incrementing keys. However, if you wish to specify your own keys, set the <code class=" language-php">incrementing</code> property on your model to <code class=" language-php"><span class="token boolean">false</span></code>.</p>
    <p dir="rtl">اکثرا مدل های eloquent   کاید هایی دارند که به صورت خودکار مقدار انها زیاد می شود .در حالی که اگر شما بخواهید که خودتان مقدار کلید را تعیین کنید بایستی صفت incrementing  در مدل را false  کنید.</p>
</blockquote>
<p>You may also use the <code class=" language-php">create</code> method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a <code class=" language-php">fillable</code> or <code class=" language-php">guarded</code> attribute on the model, as all Eloquent models protect against mass-assignment.</p>
<p dir="rtl">ضما همچنین ممکن است از تابع از تابع create  برای ذخیره یک مدل به صورت برخط استقاده کنید.نمونه مدلی که به صورت برخط در ج شده است از طرف تابع به شما برگشت داده خواهد شد.هر چند قبل از انجام این کار شما نیاز به تعیین خر یک از صفات fillable   guareded  در مدل را دارید همه مدل های eloquent  در برابر مقدار دهی گسترده محافظت می شوند.	</p>
<p>After saving or creating a new model that uses auto-incrementing IDs, you may retrieve the ID by accessing the object's <code class=" language-php">id</code> attribute:</p>
<p dir="rtl">بعد از ذخیره یا ایجاد یک نمونه جدید که کلید auto_incrementing  دارد شما می توانید به id  شی با استفاده از صفت id  دسترسی داشته باشید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$insertedId</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">id</span><span class="token punctuation">;</span></code></pre>
<h4>Setting The Guarded Attributes On The Model</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$guarded</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token string">'account_id'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Using The Model Create Method</h4>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">// Create a new user in the database...
</span><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">create<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'John'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Retrieve the user by the attributes, or create it if it doesn't exist...
</span><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">firstOrCreate<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'John'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Retrieve the user by the attributes, or instantiate a new instance...
</span><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">firstOrNew<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'John'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Updating A Retrieved Model</h4>
<p>To update a model, you may retrieve it, change an attribute, and use the <code class=" language-php">save</code> method:</p>
<p dir="rtl">برای بروزرسانی یک مدل شما می توانید شما می توانید ان را د ریافت کنید صفات ان را تغییر دهید و با استفاده از تابع save  انها را ذخیره کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">email</span> <span class="token operator">=</span> <span class="token string">'john@foo.com'</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Saving A Model And Relationships</h4>
<p>Sometimes you may wish to save not only a model, but also all of its relationships. To do so, you may use the <code class=" language-php">push</code> method:</p>
<p dir="rtl">بعضی مواقع ممکن است شما بخواهید نه تنها یک مدل  را ذخیره کنید بلکه تمام روابط ان را هم ذخیره کنید .برای اینکار از تابع  push  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">push<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also run updates as queries against a set of models:</p>
<p dir="rtl">شما همچنین ممکن است یک پرس و جو بروز رسانی را د ر برابر یک مجموعه از مدل ها اجرا کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$affectedRows</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">update<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'status'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">2</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> No model events are fired when updating a set of models via the Eloquent query builder.</p>
    <p dir="rtl">هیچ   event  اتفاق نمی افتد  هنگامی که شما یک مجموعه از مدل ها را بوسیله query builder  بروزرسانی می کنید.</p>
</blockquote>
<h4>Deleting An Existing Model</h4>
<p>To delete a model, simply call the <code class=" language-php">delete</code> method on the instance:</p>
<p dir="rtl">برای حذف کردن یک مدل کوجود از تابع delete  برای ان مدل استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Deleting An Existing Model By Key</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">destroy<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">destroy<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">destroy<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, you may also run a delete query on a set of models:</p>
<p dir="rtl">شما همچنین ممکن است دستور delete  را برای یک مجموعه از پرس وجو ها اجرا کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$affectedRows</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Updating Only The Model's Timestamps</h4>
<p>If you wish to simply update the timestamps on a model, you may use the <code class=" language-php">touch</code> method:</p>
<p dir="rtl">برای بروزرسانی timestamps مدل از تابع touch  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">touch<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="soft-deleting"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#soft-deleting">Soft Deleting</a></h2>
<p>When soft deleting a model, it is not actually removed from your database. Instead, a <code class=" language-php">deleted_at</code> timestamp is set on the record. To enable soft deletes for a model, apply the <code class=" language-php">SoftDeletes</code> to the model:</p>
<p dir="rtl">وقتی که یک مدل را حذف نرم می کنیم.ان واقعا از پایگاه داده حذف نمی شود بجای ان فیلد delete_at  که از نوع timestamps  است برای ان تنظیم می شود.برای انجام حذف نرم از softDeletes  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Database<span class="token punctuation">\</span>Eloquent<span class="token punctuation">\</span>SoftDeletes</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">use</span> <span class="token package">SoftDeletes</span><span class="token punctuation">;</span>

        <span class="token keyword">protected</span> <span class="token variable">$dates</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'deleted_at'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<p>To add a <code class=" language-php">deleted_at</code> column to your table, you may use the <code class=" language-php">softDeletes</code> method from a migration:</p>
<p dir="rtl">برای اضافه کردن ستون delete_at برای یک جد.ل از تابع softDeletes  درmigration  ان استفاده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">softDeletes<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Now, when you call the <code class=" language-php">delete</code> method on the model, the <code class=" language-php">deleted_at</code> column will be set to the current timestamp. When querying a model that uses soft deletes, the "deleted" models will not be included in query results.</p>
<p dir="rtl">حالا وقتی شما از تابع delete  استفاده کنید فیلد delete_at  تنظیم می شودبا زمان که حذف صورت می گیرد.
    وقتی که پرس وجویی را دریک مدل اجرا می کنید که از  حذف نرم استفاده می کند در نتیجه این پرس وجو حذفی صورت نمی گیرد.
    تمرکز کردن بر حذف نرم مدل درون نتایج ان
</p>
<h4>Forcing Soft Deleted Models Into Results</h4>
<p>To force soft deleted models to appear in a result set, use the <code class=" language-php">withTrashed</code> method on the query:</p>
<p dir="rtl">برای استفده از حذف نرم از تابع از تابعwithTreshed  در پرس وجو استفاده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">withTrashed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'account_id'</span><span class="token punctuation">,</span> <span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The <code class=" language-php">withTrashed</code> method may be used on a defined relationship:</p>
<p dir="rtl">تابع withTrashed  ممکن است برای یک رابطه نیز به کار برده شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">posts<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withTrashed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you wish to <strong>only</strong> receive soft deleted models in your results, you may use the <code class=" language-php">onlyTrashed</code> method:</p>
<p dir="rtl">اگر شما تنها بخواهید نتایج حذف نرم  را در نتایج یک مدل دریافت کنید شما ممکن است از تابع onlyTrashed  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">onlyTrashed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'account_id'</span><span class="token punctuation">,</span> <span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>To restore a soft deleted model into an active state, use the <code class=" language-php">restore</code> method:</p>
<p dir="rtl">برای برگرداندن یک مدل که حذف نرم شده  از تابع restore  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">restore<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also use the <code class=" language-php">restore</code> method on a query:</p>
<p dir="rtl">شما می توانید از تابع restore برای یک پرس وجو نیز استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">withTrashed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'account_id'</span><span class="token punctuation">,</span> <span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">restore<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Like with <code class=" language-php">withTrashed</code>, the <code class=" language-php">restore</code> method may also be used on relationships:</p>
<p dir="rtl">همانند تابع withTrashed تابع restore  نیز می تواند برای روابط نیز استفاده شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">posts<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">restore<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you wish to truly remove a model from the database, you may use the <code class=" language-php">forceDelete</code> method:</p>
<p dir="rtl">اگر شما واقعا می خواهید یک مدل را از پایگاه داده حذف کنید شما می توانید از تابع forceDelete  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">forceDelete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The <code class=" language-php">forceDelete</code> method also works on relationships:</p>
<p dir="rtl">تابع forceDelete  بر روی روابط نیز کار می کند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">posts<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">forceDelete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>To determine if a given model instance has been soft deleted, you may use the <code class=" language-php">trashed</code> method:</p>
<p dir="rtl">برای اینکه تعیین کنید که ایا یک نمونه مدل حذف نرم شده است می توانید از تابع trashed  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">trashed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p><a name="timestamps"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#timestamps">Timestamps</a></h2>
<p>By default, Eloquent will maintain the <code class=" language-php">created_at</code> and <code class=" language-php">updated_at</code> columns on your database table automatically. Simply add these <code class=" language-php">timestamp</code> columns to your table and Eloquent will take care of the rest. If you do not wish for Eloquent to maintain these columns, add the following property to your model:</p>
<p dir="rtl">به صورت پیش فرض  eloquent  ستون های   create_at  update_at  را به صورت خودکار در پایگاه داده نگه می دارد   به راحتی می توان این ستون ها را اضافه کرد به جدول ومدل eloquent    اگر شما تمایلی به نگه داری این ستون ها ندارید  صفات زیر را به مدلتان اضافه کنید.</p>
<h4>Disabling Auto Timestamps</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$table</span> <span class="token operator">=</span> <span class="token string">'users'</span><span class="token punctuation">;</span>

        <span class="token keyword">public</span> <span class="token variable">$timestamps</span> <span class="token operator">=</span> <span class="token boolean">false</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Providing A Custom Timestamp Format</h4>
<p>If you wish to customize the format of your timestamps, you may override the <code class=" language-php">getDateFormat</code> method in your model:</p>
<p dir="rtl">اگر شما بخواهید قالب ثبت زمان  را تغییر دهید شما می توانید تابع getDateFormat  را برای مدلتان بازنویسی کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token keyword">function</span> <span class="token function">getDateFormat<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token string">'U'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="query-scopes"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#query-scopes">Query Scopes</a></h2>
<h4>Defining A Query Scope</h4>
<p>Scopes allow you to easily re-use query logic in your models. To define a scope, simply prefix a model method with <code class=" language-php">scope</code>:</p>
<p dir="rtl">محدوده به شما اجازه مجدد از منطق پرس و جویتان  در مدل را می دهد .برای تعریف کردن یک محدوده  به راحتی کلمه scope  را پیشوند تابع می کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">scopePopular<span class="token punctuation">(</span></span><span class="token variable">$query</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'&gt;'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">scopeWomen<span class="token punctuation">(</span></span><span class="token variable">$query</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">whereGender<span class="token punctuation">(</span></span><span class="token string">'W'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Utilizing A Query Scope</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">popular<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">women<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">orderBy<span class="token punctuation">(</span></span><span class="token string">'created_at'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Dynamic Scopes</h4>
<p>Sometimes you may wish to define a scope that accepts parameters. Just add your parameters to your scope function:</p>
<p dir="rtl">بعضی مواقع ممکن است شما بخواهید برای محدودهایتان ورودی تعیین کنید.فقط کافی است که ورودی ها را قرار دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">scopeOfType<span class="token punctuation">(</span></span><span class="token variable">$query</span><span class="token punctuation">,</span> <span class="token variable">$type</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">whereType<span class="token punctuation">(</span></span><span class="token variable">$type</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Then pass the parameter into the scope call:</p>
<p dir="rtl">سپس ورودی ها را درهنگام فراخوانی قرار می دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">ofType<span class="token punctuation">(</span></span><span class="token string">'member'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="global-scopes"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#global-scopes">Global Scopes</a></h2>
<p>Sometimes you may wish to define a scope that applies to all queries performed on a model. In essence, this is how Eloquent's own "soft delete" feature works. Global scopes are defined using a combination of PHP traits and an implementation of <code class=" language-php">Illuminate\<span class="token package">Database<span class="token punctuation">\</span>Eloquent<span class="token punctuation">\</span>ScopeInterface</span></code>.</p>
<p dir="rtl">بعضی مواقع ممکن است شما بخواهید محدوده ها را برای همه پرس وجو های مدل بکار ببرید درحقیقت  به وسیله این حذف نرم کار می کند. محدوده های سراسری به کمک به کمک ترکیب خصوصیات php  ویا نمنه از lluminate\Database\Eloquent\ScopeInterface.  تعریف می شود.</p>
<p>First, let's define a trait. For this example, we'll use the <code class=" language-php">SoftDeletes</code> that ships with Laravel:</p>
<p dir="rtl">ابتدا اجازه دهید که ویزگی ها را تعریف کنیم ما از حذف نرمی که همراه با لاراول است استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">trait</span> <span class="token class-name">SoftDeletes</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">static</span> <span class="token keyword">function</span> <span class="token function">bootSoftDeletes<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope"><span class="token keyword">static</span><span class="token punctuation">::</span></span><span class="token function">addGlobalScope<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">SoftDeletingScope</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>If an Eloquent model uses a trait that has a method matching the <code class=" language-php">bootNameOfTrait</code> naming convention, that trait method will be called when the Eloquent model is booted, giving you an opportunity to register a global scope, or do anything else you want. A scope must implement <code class=" language-php">ScopeInterface</code>, which specifies two methods: <code class=" language-php">apply</code> and <code class=" language-php">remove</code>.</p>
<p dir="rtl">در مدل eloquent  از خصوصیاتی استفاده می کنیم که توابعی دارند که با قاعده نام گذاری bootNameOfTreat  برابری می کنند که خصوسیات این تابع وقتی که یک مدل بوت می شود فراخوانی می شود  وبه شما یک فرصت ثبت محدوده سراسری را می دهد یا هر چیز دیگری که شما بخواهید.یک محدوده ممکن است اجرا کند ScopeInterfaceکه دو تابع apply و remove  را مشخص می کند.</p>
<p>The <code class=" language-php">apply</code> method receives an <code class=" language-php">Illuminate\<span class="token package">Database<span class="token punctuation">\</span>Eloquent<span class="token punctuation">\</span>Builder</span></code> query builder object and the <code class=" language-php">Model</code> it's applied to, and is responsible for adding any additional <code class=" language-php">where</code> clauses that the scope wishes to add. The <code class=" language-php">remove</code> method also receives a <code class=" language-php">Builder</code> object and <code class=" language-php">Model</code> and is responsible for reversing the action taken by <code class=" language-php">apply</code>. In other words, <code class=" language-php">remove</code> should remove the <code class=" language-php">where</code> clause (or any other clause) that was added. So, for our <code class=" language-php">SoftDeletingScope</code>, the methods look something like this:</p>
<p dir="rtl">تابع apply  یک شی query builderاز نوع Illuminate\Database\Eloquent\Builder را دریافت می کندویک مدل که بر روی ان اجرا شود.
    ومسئول اضافه کردن عبارات شرطی است که محدوده ممکن است نیاز داشته باشد.تابع remove  نیز یک شی builder  ویک مدل را دریافت می کند و مسئول ان است که معکوس کند نشانه های توابع بوسیله apply. به عبارت دیگر تابع remove  عبارات شرطی را حذف می کند که اضافه شده اند.بنابراین برایSoftDeletingScope  تابع دنبال پمچین چیزی می گردد.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Apply the scope to a given Eloquent query builder.
 *
 * @param  \Illuminate\Database\Eloquent\Builder  $builder
 * @param  \Illuminate\Database\Eloquent\Model  $model
 * @return void
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">apply<span class="token punctuation">(</span></span>Builder <span class="token variable">$builder</span><span class="token punctuation">,</span> Model <span class="token variable">$model</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$builder</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">whereNull<span class="token punctuation">(</span></span><span class="token variable">$model</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getQualifiedDeletedAtColumn<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">extend<span class="token punctuation">(</span></span><span class="token variable">$builder</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

<span class="token comment" spellcheck="true">/**
 * Remove the scope from the given Eloquent query builder.
 *
 * @param  \Illuminate\Database\Eloquent\Builder  $builder
 * @param  \Illuminate\Database\Eloquent\Model  $model
 * @return void
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">remove<span class="token punctuation">(</span></span>Builder <span class="token variable">$builder</span><span class="token punctuation">,</span> Model <span class="token variable">$model</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$column</span> <span class="token operator">=</span> <span class="token variable">$model</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getQualifiedDeletedAtColumn<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$query</span> <span class="token operator">=</span> <span class="token variable">$builder</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getQuery<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token punctuation">(</span><span class="token keyword">array</span><span class="token punctuation">)</span> <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">wheres</span> <span class="token keyword">as</span> <span class="token variable">$key</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$where</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // If the where clause is a soft delete date constraint, we will remove it from
</span>       <span class="token comment" spellcheck="true"> // the query and reset the keys on the wheres. This allows this developer to
</span>       <span class="token comment" spellcheck="true"> // include deleted model in a relationship result set that is lazy loaded.
</span>        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isSoftDeleteConstraint<span class="token punctuation">(</span></span><span class="token variable">$where</span><span class="token punctuation">,</span> <span class="token variable">$column</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token function">unset<span class="token punctuation">(</span></span><span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">wheres</span><span class="token punctuation">[</span><span class="token variable">$key</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">wheres</span> <span class="token operator">=</span> <span class="token function">array_values<span class="token punctuation">(</span></span><span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">wheres</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="relationships"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#relationships">Relationships</a></h2>
<p>Of course, your database tables are probably related to one another. For example, a blog post may have many comments, or an order could be related to the user who placed it. Eloquent makes managing and working with these relationships easy. Laravel supports many types of relationships:</p>
<p dir="rtl">البته جداول ممکن است با هم ارتباط داشته باشند برای مثال یک پست ممکن است چندین کامنت  داشته باشد  یا یک جایگاه که ممکن است چندین کاربر در ان قرار بگیرند در eloquent  این روابط را به راحتی می توان ایجاد کرد و با ان کار کرد.لاراول انواع روابط را پشتیبانی می کند.</p>
<ul>
    <li><a href="http://laravel.com/docs/5.0/eloquent#one-to-one">One To One</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#one-to-many">One To Many</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#many-to-many">Many To Many</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#has-many-through">Has Many Through</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#polymorphic-relations">Polymorphic Relations</a></li>
    <li><a href="http://laravel.com/docs/5.0/eloquent#many-to-many-polymorphic-relations">Many To Many Polymorphic Relations</a></li>
</ul>
<p><a name="one-to-one"></a></p>
<h3>One To One</h3>
<h4>Defining A One To One Relation</h4>
<p>A one-to-one relationship is a very basic relation. For example, a <code class=" language-php">User</code> model might have one <code class=" language-php">Phone</code>. We can define this relation in Eloquent:</p>
<p dir="rtl">یک رابطه یک به یک خیلی رابطه ساده ای استبرای مثال کاربر می تواند تلفن داشته باشد ما می توانیم این رابطه را در eloquent  تعریف کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">phone<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasOne<span class="token punctuation">(</span></span><span class="token string">'App\Phone'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The first argument passed to the <code class=" language-php">hasOne</code> method is the name of the related model. Once the relationship is defined, we may retrieve it using Eloquent's <a href="http://laravel.com/docs/5.0/eloquent#dynamic-properties">dynamic properties</a>:</p>
<p dir="rtl">اولین ورودی که به تابع hasOne  ارسال می شود نام مدلی است که با ان ارتباط دارد یک بار که رابطه تعریف شد شما می توانید انها را با صفات پویا eloquent  دریافت کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$phone</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">phone</span><span class="token punctuation">;</span></code></pre>
<p>The SQL performed by this statement will be as follows:</p>
<p dir="rtl">جمله sql  که با این جمله اجرا می شود به صورت زیر است.</p>
<pre class=" language-php"><code class=" language-php">select <span class="token operator">*</span> from users where id <span class="token operator">=</span> <span class="token number">1</span>

        select <span class="token operator">*</span> from phones where user_id <span class="token operator">=</span> <span class="token number">1</span></code></pre>
<p>Take note that Eloquent assumes the foreign key of the relationship based on the model name. In this case, <code class=" language-php">Phone</code> model is assumed to use a <code class=" language-php">user_id</code> foreign key. If you wish to override this convention, you may pass a second argument to the <code class=" language-php">hasOne</code> method. Furthermore, you may pass a third argument to the method to specify which local column that should be used for the association:</p>
<p dir="rtl">بیاد داشته باشید که eloquent فرض می کند که کلید خارجی رابطه  براساس نام مدل است. در این مورد مدل phone فرض می کند که user_id  کلیذ خارجی است.اگر شما بخواهید  این قاعده را تغییر دهید شما ممکن است یک ورودی دیگر نیز به تابع ارسال کنید شما ممکن است ورودی سومی را نیز به تابع اراسال کنید تا تعیین کنید که کدام ستون محلی بایستی برای ارتباط استفاده شود .</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasOne<span class="token punctuation">(</span></span><span class="token string">'App\Phone'</span><span class="token punctuation">,</span> <span class="token string">'foreign_key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasOne<span class="token punctuation">(</span></span><span class="token string">'App\Phone'</span><span class="token punctuation">,</span> <span class="token string">'foreign_key'</span><span class="token punctuation">,</span> <span class="token string">'local_key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Defining The Inverse Of A Relation</h4>
<p>To define the inverse of the relationship on the <code class=" language-php">Phone</code> model, we use the <code class=" language-php">belongsTo</code> method:</p>
<p dir="rtl">برای تعریف کردن معکوس یک رابطه در مدل phone  از تابع belongTo  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Phone</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\User'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>In the example above, Eloquent will look for a <code class=" language-php">user_id</code> column on the <code class=" language-php">phones</code> table. If you would like to define a different foreign key column, you may pass it as the second argument to the <code class=" language-php">belongsTo</code> method:</p>
<p dir="rtl">در مثال بالا eloquent  دنبال ستون user_id  در جدول phone  می گردد.اگر شما تمایل دارید که کلید خارجی دیگری را تعریف کنید شما می توانید ان را به عنوان ورودی دوم به تابع ارسال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Phone</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\User'</span><span class="token punctuation">,</span> <span class="token string">'local_key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Additionally, you pass a third parameter which specifies the name of the associated column on the parent table:</p>
<p dir="rtl">شما ممکن است حتی ورودی سومی را نیز ارسال کنید تا تعیین کنید کدام ستون در جدول والد د رارتباط شرکت کند</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Phone</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\User'</span><span class="token punctuation">,</span> <span class="token string">'local_key'</span><span class="token punctuation">,</span> <span class="token string">'parent_key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="one-to-many"></a></p>
<h3>One To Many</h3>
<p>An example of a one-to-many relation is a blog post that "has many" comments. We can model this relation like so:</p>
<p dir="rtl">یک نمونه از ارتباط یک به چند را می توان post  وcomment  راد رنظر گرفت  ما این نوع  ارتباط را اینگونه مدل می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Post</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">comments<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasMany<span class="token punctuation">(</span></span><span class="token string">'App\Comment'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Now we can access the post's comments through the <a href="http://laravel.com/docs/5.0/eloquent#dynamic-properties">dynamic property</a>:</p>
<p dir="rtl">حالا ما می توانیم به کامنت های پست از طریق صفات پویا</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$comments</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">comments</span><span class="token punctuation">;</span></code></pre>
<p>If you need to add further constraints to which comments are retrieved, you may call the <code class=" language-php">comments</code> method and continue chaining conditions:</p>
<p dir="rtl">اگر شما بخواهید محدودیت های بیشتری را بزارید که کدام  کامنت را دریافت کنید شما می توانید یک تابع comment استفاده کنید و زنجیره شرط ها را ادامه دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$comments</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">comments<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'title'</span><span class="token punctuation">,</span> <span class="token string">'='</span><span class="token punctuation">,</span> <span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Again, you may override the conventional foreign key by passing a second argument to the <code class=" language-php">hasMany</code> method. And, like the <code class=" language-php">hasOne</code> relation, the local column may also be specified:</p>
<p dir="rtl">مجدد شما می توانید قاعده کلید خارجی را بازنویسی کنید باارسال ورودی های دوم وسوم</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasMany<span class="token punctuation">(</span></span><span class="token string">'App\Comment'</span><span class="token punctuation">,</span> <span class="token string">'foreign_key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasMany<span class="token punctuation">(</span></span><span class="token string">'App\Comment'</span><span class="token punctuation">,</span> <span class="token string">'foreign_key'</span><span class="token punctuation">,</span> <span class="token string">'local_key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Defining The Inverse Of A Relation</h4>
<p>To define the inverse of the relationship on the <code class=" language-php">Comment</code> model, we use the <code class=" language-php">belongsTo</code> method:</p>
<p dir="rtl">برای تعریف کردن معکوس یک رابطه در مدل comment  ما می توانیم از تابع belongTo  استفاده کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Comment</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">post<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\Post'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="many-to-many"></a></p>
<h3>Many To Many</h3>
<p>Many-to-many relations are a more complicated relationship type. An example of such a relationship is a user with many roles, where the roles are also shared by other users. For example, many users may have the role of "Admin". Three database tables are needed for this relationship: <code class=" language-php">users</code>, <code class=" language-php">roles</code>, and <code class=" language-php">role_user</code>. The <code class=" language-php">role_user</code> table is derived from the alphabetical order of the related model names, and should have <code class=" language-php">user_id</code> and <code class=" language-php">role_id</code> columns.</p>
<p dir="rtl">رابطه چند به چند یک رابطه پیچیده است یک نمونه از رابطه چند به چند کاربری  است که چند نقش را بر عهده دارد و یک نقش نیز ممکن است به چند کارب داده شود .جدول سومی برای این ارتباط نیاز است role user role_user جدول role_user  از ترکیب حرفی نام مدل هایی که با هم ارتباط دارند تشکیل شده است و بایستی از ستون های user_id  و role_id  دراین جدول استفاده شود.</p>
<p>We can define a many-to-many relation using the <code class=" language-php">belongsToMany</code> method:</p>
<p dir="rtl">ما می توانیم رابطه چند به چند را با تابع belongsToMany  تعریف کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsToMany<span class="token punctuation">(</span></span><span class="token string">'App\Role'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Now, we can retrieve the roles through the <code class=" language-php">User</code> model:</p>
<p dir="rtl">حالا ما می توانیم نقش ها را از طریق مدل کاربر دریافت کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token punctuation">;</span></code></pre>
<p>If you would like to use an unconventional table name for your pivot table, you may pass it as the second argument to the <code class=" language-php">belongsToMany</code> method:</p>
<p dir="rtl">اگر شما تمایل به استفاده از این قوانین معمول برای جدول ترکیبی استفاده می شود ندارید می توانید نام جدول را به عنوان  ورودی دوم اراسل کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsToMany<span class="token punctuation">(</span></span><span class="token string">'App\Role'</span><span class="token punctuation">,</span> <span class="token string">'user_roles'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also override the conventional associated keys:</p>
<p dir="rtl">شما همچنین   می توانید قوانین  کلید های شرکت کننده در ارتباط را نیز تغییر دهید </p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsToMany<span class="token punctuation">(</span></span><span class="token string">'App\Role'</span><span class="token punctuation">,</span> <span class="token string">'user_roles'</span><span class="token punctuation">,</span> <span class="token string">'user_id'</span><span class="token punctuation">,</span> <span class="token string">'foo_id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, you may also define the inverse of the relationship on the <code class=" language-php">Role</code> model:</p>
<p dir="rtl">شما همچنین می توانید معکوس رابطه را برای مدل role  اجرا کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Role</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">users<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsToMany<span class="token punctuation">(</span></span><span class="token string">'App\User'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="has-many-through"></a></p>
<h3>Has Many Through</h3>
<p>The "has many through" relation provides a convenient short-cut for accessing distant relations via an intermediate relation. For example, a <code class=" language-php">Country</code> model might have many <code class=" language-php">Post</code> through a <code class=" language-php">User</code> model. The tables for this relationship would look like this:</p>
<p dir="rtl">ارتباط یک به چند با واسطه امکان دسترسی به مدل دور به واسطه یک مدل که دربین این دو قرار می گیرد را فراهم می کند.برای نمونه در  یک کشور سمت ها از طریق کاربر داشته باشد جدول برای این ارتباط شبیه زیر است.</p>
<pre class=" language-php"><code class=" language-php">countries
        id <span class="token operator">-</span> integer
        name <span class="token operator">-</span> string

        users
        id <span class="token operator">-</span> integer
        country_id <span class="token operator">-</span> integer
        name <span class="token operator">-</span> string

        posts
        id <span class="token operator">-</span> integer
        user_id <span class="token operator">-</span> integer
        title <span class="token operator">-</span> string</code></pre>
<p>Even though the <code class=" language-php">posts</code> table does not contain a <code class=" language-php">country_id</code> column, the <code class=" language-php">hasManyThrough</code> relation will allow us to access a country's posts via <code class=" language-php"><span class="token variable">$country</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">posts</span></code>. Let's define the relationship:</p>
<p dir="rtl">حتی از طریق جدول post  دسترسی به نامcountry_id  نداریم رابطه hasManyThrough  به شما اجازه دسترسی به پست ها را به وسیله $country->post  را می دهد.اجازه دهید این رابطه را تعریف کنم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Country</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">posts<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasManyThrough<span class="token punctuation">(</span></span><span class="token string">'App\Post'</span><span class="token punctuation">,</span> <span class="token string">'App\User'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>If you would like to manually specify the keys of the relationship, you may pass them as the third and fourth arguments to the method:</p>
<p dir="rtl">اگر شما تمایل دارید که به صورت دستی کلید های شرکت کننده در ارتباط را تعیین کنید شما می توانید انها را به عنوان ورودی های سوم و چهارم به تابع ارسال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Country</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">posts<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">hasManyThrough<span class="token punctuation">(</span></span><span class="token string">'App\Post'</span><span class="token punctuation">,</span> <span class="token string">'App\User'</span><span class="token punctuation">,</span> <span class="token string">'country_id'</span><span class="token punctuation">,</span> <span class="token string">'user_id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="polymorphic-relations"></a></p>
<h3>Polymorphic Relations</h3>
<p>Polymorphic relations allow a model to belong to more than one other model, on a single association. For example, you might have a photo model that belongs to either a staff model or an order model. We would define this relation like so:</p>
<p dir="rtl">ارتباط چند جمله ای به مدل اجازه می دهد که با بیش از یک مدل تعلق داشته باشد در یک ارتباط .برای نمونه شما ممکن است یک مدل photo  داشته باشید که به هر دوی مدل کارکنان ومدل  رتبه تعلق داشته باشد.شما رابطه را مانند زیر می توانید تعریف کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Photo</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">imageable<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphTo<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span>

        <span class="token keyword">class</span> <span class="token class-name">Staff</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">photos<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphMany<span class="token punctuation">(</span></span><span class="token string">'App\Photo'</span><span class="token punctuation">,</span> <span class="token string">'imageable'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span>

        <span class="token keyword">class</span> <span class="token class-name">Order</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">photos<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphMany<span class="token punctuation">(</span></span><span class="token string">'App\Photo'</span><span class="token punctuation">,</span> <span class="token string">'imageable'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Retrieving A Polymorphic Relation</h4>
<p>Now, we can retrieve the photos for either a staff member or an order:</p>
<p dir="rtl">حال می توانیم دریافت کنیم تصاویر را برای هر یک از کارکنان یابرای یک جایگاه </p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$staff</span> <span class="token operator">=</span> <span class="token scope">Staff<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$staff</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">photos</span> <span class="token keyword">as</span> <span class="token variable">$photo</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Retrieving The Owner Of A Polymorphic Relation</h4>
<p>However, the true "polymorphic" magic is when you access the staff or order from the <code class=" language-php">Photo</code> model:</p>
<p dir="rtl">هر چند هوشمندی یک رابطه چند جمله ای وقتی است که شما دسترسی پیدا می کنید به کارکنان یا جایگاه از طریق مدل photo</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$photo</span> <span class="token operator">=</span> <span class="token scope">Photo<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$imageable</span> <span class="token operator">=</span> <span class="token variable">$photo</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">imageable</span><span class="token punctuation">;</span></code></pre>
<p>The <code class=" language-php">imageable</code> relation on the <code class=" language-php">Photo</code> model will return either a <code class=" language-php">Staff</code> or <code class=" language-php">Order</code> instance, depending on which type of model owns the photo.</p>
<p dir="rtl">رابطه imageable  در مدل photo  هر یک از نمونه های کارکنان یا جایگاه را راب رمی گرداند بسته به نوع صاحب ان عکس</p>
<h4>Polymorphic Relation Table Structure</h4>
<p>To help understand how this works, let's explore the database structure for a polymorphic relation:</p>
<p dir="rtl">برای کمک به شما برای درک طرز کار  ان اجازه دهید ساختار پایگاه داده را برای ارتباط چند جمله ای نشان دهیم.</p>
<pre class=" language-php"><code class=" language-php">staff
        id <span class="token operator">-</span> integer
        name <span class="token operator">-</span> string

        orders
        id <span class="token operator">-</span> integer
        price <span class="token operator">-</span> integer

        photos
        id <span class="token operator">-</span> integer
        path <span class="token operator">-</span> string
        imageable_id <span class="token operator">-</span> integer
        imageable_type <span class="token operator">-</span> string</code></pre>
<p>The key fields to notice here are the <code class=" language-php">imageable_id</code> and <code class=" language-php">imageable_type</code> on the <code class=" language-php">photos</code> table. The ID will contain the ID value of, in this example, the owning staff or order, while the type will contain the class name of the owning model. This is what allows the ORM to determine which type of owning model to return when accessing the <code class=" language-php">imageable</code> relation.</p>
<p dir="rtl">فیلد هایی که برای اگاهی دادن در مدل photo  استفاده شده imageable_idو imageable_type  هستند id  مقدار id را دارد  در این مثال کارکنان یا   جایگاه در حالی که نوع نام کلاس صاحب مدل را نگه می دارد.این  است دلیل اینکه چگونه orm تشخبص می دهد که صاحب رکورد از کدام مدل است که ان را هنگام  دسترسی به رابطه imageable  برگداند.</p>
<p><a name="many-to-many-polymorphic-relations"></a></p>
<h3>Many To Many Polymorphic Relations</h3>
<h4>Polymorphic Many To Many Relation Table Structure</h4>
<p>In addition to traditional polymorphic relations, you may also specify many-to-many polymorphic relations. For example, a blog <code class=" language-php">Post</code> and <code class=" language-php">Video</code> model could share a polymorphic relation to a <code class=" language-php">Tag</code> model. First, let's examine the table structure:</p>
<p dir="rtl">علاوه بر ارتباط چند جمله ای ساده شما ممکن  است ارتباز چند جمله ای چند به چند نیز تعریف کنید .برای مثال مدل های postو video  یک ارتباز چند جمله ای با مدل tag  داشته باشند ابتدا اجازه دهید ساختار جدول را امتحان کنیم.</p>
<pre class=" language-php"><code class=" language-php">posts
        id <span class="token operator">-</span> integer
        name <span class="token operator">-</span> string

        videos
        id <span class="token operator">-</span> integer
        name <span class="token operator">-</span> string

        tags
        id <span class="token operator">-</span> integer
        name <span class="token operator">-</span> string

        taggables
        tag_id <span class="token operator">-</span> integer
        taggable_id <span class="token operator">-</span> integer
        taggable_type <span class="token operator">-</span> string</code></pre>
<p>Next, we're ready to setup the relationships on the model. The <code class=" language-php">Post</code> and <code class=" language-php">Video</code> model will both have a <code class=" language-php">morphToMany</code> relationship via a <code class=" language-php">tags</code> method:</p>
<p dir="rtl">بعدا ما اماده ایم تا تنظیم ارتباط ها را در مدل .مدل های post video  هر دو رابطه morphToManyدارند بوسیله تابع tags .</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Post</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">tags<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphToMany<span class="token punctuation">(</span></span><span class="token string">'App\Tag'</span><span class="token punctuation">,</span> <span class="token string">'taggable'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The <code class=" language-php">Tag</code> model may define a method for each of its relationships:</p>
<p dir="rtl">مذل tag  نیز ممکن است یک تابع را برای رابطه ها تعریف کند </p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Tag</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">posts<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphedByMany<span class="token punctuation">(</span></span><span class="token string">'App\Post'</span><span class="token punctuation">,</span> <span class="token string">'taggable'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">videos<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphedByMany<span class="token punctuation">(</span></span><span class="token string">'App\Video'</span><span class="token punctuation">,</span> <span class="token string">'taggable'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="querying-relations"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#querying-relations">Querying Relations</a></h2>
<h4>Querying Relations When Selecting</h4>
<p>When accessing the records for a model, you may wish to limit your results based on the existence of a relationship. For example, you wish to pull all blog posts that have at least one comment. To do so, you may use the <code class=" language-php">has</code> method:</p>
<p dir="rtl">وقتی که به رکورد ها برای یک مدل دسترسی داریم شما ممکن است نتایج را بر اساس وجود روابط محدود کنید.برای مثال شما ممکن است همه پست هایی که حداقل یک کامنت خورده اند را بردارید .برای این کار می توانید از تابع has  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$posts</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'comments'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also specify an operator and a count:</p>
<p dir="rtl">شما ممکن است یک عملگر ویک عدد را استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$posts</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'comments'</span><span class="token punctuation">,</span> <span class="token string">'&gt;='</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Nested <code class=" language-php">has</code> statements may also be constructed using "dot" notation:</p>
<p dir="rtl">با استفاده از عملگر "." شما  می توانید جملات  has تودر تو را ساختار دهی کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$posts</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'comments.votes'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If you need even more power, you may use the <code class=" language-php">whereHas</code> and <code class=" language-php">orWhereHas</code> methods to put "where" conditions on your <code class=" language-php">has</code> queries:</p>
<p dir="rtl">اگر شما به قدرت بیشتری نیاز داشته باشید شما می توانید از توابع whereHas  orWhereHas  برای استفاده از شرایط استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$posts</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">whereHas<span class="token punctuation">(</span></span><span class="token string">'comments'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$q</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$q</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'content'</span><span class="token punctuation">,</span> <span class="token string">'like'</span><span class="token punctuation">,</span> <span class="token string">'foo%'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="dynamic-properties"></a></p>
<h3>Dynamic Properties</h3>
<p>Eloquent allows you to access your relations via dynamic properties. Eloquent will automatically load the relationship for you, and is even smart enough to know whether to call the <code class=" language-php">get</code> (for one-to-many relationships) or <code class=" language-php">first</code> (for one-to-one relationships) method.  It will then be accessible via a dynamic property by the same name as the relation. For example, with the following model <code class=" language-php"><span class="token variable">$phone</span></code>:</p>
<p dir="rtl">Eloquent به شما اجازه دسترسی به روابط بوسیله صفات پویا را می دهد.eloquent  به صورت اتوماتیک روابط را برای شما بارگذاری می کند  وبه قدری هوشمند است که می داند کجا از first  استفاده کند کجا ازget  استفاده کند با استفاده از صفات پویایی که نام یکسانی در دو رابطه دارند می توان به ان دسترسی داشت.برای نمونه با مدل $phone</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Phone</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\User'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span>

        <span class="token variable">$phone</span> <span class="token operator">=</span> <span class="token scope">Phone<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Instead of echoing the user's email like this:</p>
<p dir="rtl">بجای این که ایمیل کاربر را اینگونه نمایش دهیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token variable">$phone</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">email</span><span class="token punctuation">;</span></code></pre>
<p>It may be shortened to simply:</p>
<p dir="rtl">این را می توان به سادگی کوتاه تر کرد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token variable">$phone</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">email</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> Relationships that return many results will return an instance of the <code class=" language-php">Illuminate\<span class="token package">Database<span class="token punctuation">\</span>Eloquent<span class="token punctuation">\</span>Collection</span></code> class.</p>
    <p dir="rtl">بیاد داشته باشید رابطه ای که نتایج زیاذی را بر می گرداند یک نمونه از کلاس Illuminate\Database\Eloquent\C  را برگرداند.</p>
</blockquote>
<p><a name="eager-loading"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#eager-loading">Eager Loading</a></h2>
<p>Eager loading exists to alleviate the N + 1 query problem. For example, consider a <code class=" language-php">Book</code> model that is related to <code class=" language-php">Author</code>. The relationship is defined like so:</p>
<p dir="rtl">Eager loading بوجود امده است تا مشکل پرس وجو های n+1  راکم کند.برای نمنه مدل book  راد رنظر بگیرید که با auther  در ارتباط است رابطه مانند زیر تعریف می شود</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Book</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">author<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\Author'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Now, consider the following code:</p>
<p dir="rtl"> حالا کد زیر را درنظر بگیرید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token scope">Book<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token keyword">as</span> <span class="token variable">$book</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">echo</span> <span class="token variable">$book</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">author</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>This loop will execute 1 query to retrieve all of the books on the table, then another query for each book to retrieve the author. So, if we have 25 books, this loop would run 26 queries.</p>
<p dir="rtl">
    این  حلقه یک پرس وجو برای دریافت همه کتاب های جدول اجرا می کند.بنابراین پرس وجوی دیگری برای هر کتاب تا نویسنده ان را پیدا کنیم.بنابراین اگر ما 25 کتاب داشته باشیم این حلقه 26 پرس وجو اجرا می کند.
</p>
<p>Thankfully, we can use eager loading to drastically reduce the number of queries. The relationships that should be eager loaded may be specified via the <code class=" language-php">with</code> method:</p>
<p dir="rtl">با تشکر ما با eager loading  تعداد پرس وجو ها را کاهش می دهیم.روابطی که از eager loading  استفاده می کنند از تابع  with  مشخص می شوند .</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token scope">Book<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'author'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token keyword">as</span> <span class="token variable">$book</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">echo</span> <span class="token variable">$book</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">author</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">name</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>In the loop above, only two queries will be executed:</p>
<p dir="rtl">در حلقه بالا فقط دو پرس وجو اجرا می شود.</p>
<pre class=" language-php"><code class=" language-php">select <span class="token operator">*</span> from books

        select <span class="token operator">*</span> from authors where id in <span class="token punctuation">(</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">,</span> <span class="token number">4</span><span class="token punctuation">,</span> <span class="token number">5</span><span class="token punctuation">,</span> <span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">)</span></code></pre>
<p>Wise use of eager loading can drastically increase the performance of your application.</p>
<p dir="rtl"> استفاده عاقلانه از eager loading   به طور فزاینده ای می تواند کارایی را افزایش دهد.</p>
<p>Of course, you may eager load multiple relationships at one time:</p>
<p dir="rtl">شما می توانید دریک زمان چند رابطه را eager loading  کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$books</span> <span class="token operator">=</span> <span class="token scope">Book<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'author'</span><span class="token punctuation">,</span> <span class="token string">'publisher'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may even eager load nested relationships:</p>
<p dir="rtl">شما حتی روابط تو در تو را می توانید eager load  کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$books</span> <span class="token operator">=</span> <span class="token scope">Book<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'author.contacts'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In the example above, the <code class=" language-php">author</code> relationship will be eager loaded, and the author's <code class=" language-php">contacts</code> relation will also be loaded.</p>
<p dir="rtl">در مثال بالا رابطه auther  eager loading  شده است .و رابطه تماس مخاطب نیز بارگذاری شده است.</p>
<h3>Eager Load Constraints</h3>
<p>Sometimes you may wish to eager load a relationship, but also specify a condition for the eager load. Here's an example:</p>
<p dir="rtl">بعضی وقت ها ممکن است بوسله eager loading  یک رابطه را بارگذاری کنید.همچنین شرطی را نیز برای eager loading  مشخص کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'posts'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$query</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'title'</span><span class="token punctuation">,</span> <span class="token string">'like'</span><span class="token punctuation">,</span> <span class="token string">'%first%'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In this example, we're eager loading the user's posts, but only if the post's title column contains the word "first".</p>
<p dir="rtl">در مثال بالا ما پست های کاربران را eager loading  می کنیم.اما تنها اگر عنوان پست دارای کلمه first  باشد.</p>
<p>Of course, eager loading Closures aren't limited to "constraints". You may also apply orders:</p>
<p dir="rtl">البته eager loading  به محدود به این قید ها نمی شود شما می توانید order  را روی ان اعمال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'posts'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$query</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">orderBy<span class="token punctuation">(</span></span><span class="token string">'created_at'</span><span class="token punctuation">,</span> <span class="token string">'desc'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>Lazy Eager Loading</h3>
<p>It is also possible to eagerly load related models directly from an already existing model collection. This may be useful when dynamically deciding whether to load related models or not, or in combination with caching.</p>
<p dir="rtl">این نیز امکان دارد که شما مدل های مرتبط را مستقیما از مجموعه مدل های موجود قبلی بار گذاری کنید.این می تواند مفید باشد وقتی که بطور پویا تصمیم می گیرید که ایا مدل های وابسته به ان را بارگذاری کنید یا نه یا ان را با caching   ترکیب کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$books</span> <span class="token operator">=</span> <span class="token scope">Book<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$books</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">load<span class="token punctuation">(</span></span><span class="token string">'author'</span><span class="token punctuation">,</span> <span class="token string">'publisher'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also pass a Closure to set constraints on the query:</p>
<p dir="rtl">شما ممکن است حتی یک تابع را به مجموعه محدودیت ها پرس وجو ارسال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$books</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">load<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'author'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$query</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$query</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">orderBy<span class="token punctuation">(</span></span><span class="token string">'published_date'</span><span class="token punctuation">,</span> <span class="token string">'asc'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="inserting-related-models"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#inserting-related-models">Inserting Related Models</a></h2>
<h4>Attaching A Related Model</h4>
<p>You will often need to insert new related models. For example, you may wish to insert a new comment for a post. Instead of manually setting the <code class=" language-php">post_id</code> foreign key on the model, you may insert the new comment from its parent <code class=" language-php">Post</code> model directly:</p>
<p dir="rtl">شما اکثرا نیاز به درج مدل های وابسته جدید دارید .برای نمونه شما ممکن است یک کامنت را برای یک پست درج کنید بجای اینکه به صورت دستی کلید خارجیpost_id   را تنظیم کنید  شما ممکن است درج کنید کامنت جدید را از طریق والد ان post مدل</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$comment</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">Comment</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'message'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'A new comment.'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$post</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$comment</span> <span class="token operator">=</span> <span class="token variable">$post</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">comments<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token variable">$comment</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In this example, the <code class=" language-php">post_id</code> field will automatically be set on the inserted comment.</p>
<p dir="rtl">در این مثال فیلد post_id  به صورت خودکار تنظیم می شود برای کامنت جدید ی که ااضافه شده است .</p>
<p>If you need to save multiple related models:</p>
<p dir="rtl">اگر شما نیاز به ذخیره کردن چندین مدل مرتبط دارید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$comments</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token keyword">new</span> <span class="token class-name">Comment</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'message'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'A new comment.'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
        <span class="token keyword">new</span> <span class="token class-name">Comment</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'message'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Another comment.'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
        <span class="token keyword">new</span> <span class="token class-name">Comment</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'message'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'The latest comment.'</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$post</span> <span class="token operator">=</span> <span class="token scope">Post<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$post</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">comments<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">saveMany<span class="token punctuation">(</span></span><span class="token variable">$comments</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>Associating Models (Belongs To)</h3>
<p>When updating a <code class=" language-php">belongsTo</code> relationship, you may use the <code class=" language-php">associate</code> method. This method will set the foreign key on the child model:</p>
<p dir="rtl">وقتی بروز رسانی می کنید یک رابطه belongTo  شما ممکن است از تابع associate استفاده کنید.این تابع کلید خارجی را برای مدل های فرزند تنظیم می کند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$account</span> <span class="token operator">=</span> <span class="token scope">Account<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">10</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">account<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">associate<span class="token punctuation">(</span></span><span class="token variable">$account</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h3>Inserting Related Models (Many To Many)</h3>
<p>You may also insert related models when working with many-to-many relations. Let's continue using our <code class=" language-php">User</code> and <code class=" language-php">Role</code> models as examples. We can easily attach new roles to a user using the <code class=" language-php">attach</code> method:</p>
<p dir="rtl">شما ممکن است مدل های وابسته ای را درج کنید که روابط چند به چند دارند.اجازه دهید از مثال user   role  استفاده کنیم ما می توانیم به سادگی ضمیمه کنیم نقش های جدید را برای یک کاربر با استفاده از تابع attach</p>
<h4>Attaching Many To Many Models</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">attach<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also pass an array of attributes that should be stored on the pivot table for the relation:</p>
<p dir="rtl">شما ممکن است یک ارایه از صفات را که بایستی در جدول محور ذخیره شوند را ارسال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">attach<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'expires'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$expires</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, the opposite of <code class=" language-php">attach</code> is <code class=" language-php">detach</code>:</p>
<p dir="rtl">البته مخالف attach  detach   است.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">detach<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Both <code class=" language-php">attach</code> and <code class=" language-php">detach</code> also take arrays of IDs as input:</p>
<p dir="rtl">هر دو attch  detach  یک ارایه از id  ها را به عنوان ورودی می گیرند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">detach<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">attach<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'attribute1'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'value1'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Using Sync To Attach Many To Many Models</h4>
<p>You may also use the <code class=" language-php">sync</code> method to attach related models. The <code class=" language-php">sync</code> method accepts an array of IDs to place on the pivot table. After this operation is complete, only the IDs in the array will be on the intermediate table for the model:</p>
<p dir="rtl">شما ممکن است از تابع sync  برای اضافه کردن به مدل های وابسته استفاده کنید  تابع sync  یک ارایه از id  را می پذیرد تا انها را در جدول محور قرار دهد.بعد از این کار کامل می شود  تنها id  های ارایه   در جدول واسط برای مدل ها قرار می گیرد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">sync<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Adding Pivot Data When Syncing</h4>
<p>You may also associate other pivot table values with the given IDs:</p>
<p dir="rtl">شما ممکن است جدول های محوری دیگر را با id  انها با هم اجتماع کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">sync<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token number">1</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'expires'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token boolean">true</span><span class="token punctuation">]</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Sometimes you may wish to create a new related model and attach it in a single command. For this operation, you may use the <code class=" language-php">save</code> method:</p>
<p dir="rtl">بعضی مواقع ممکن است شما بخواهید یک مدل وابسته جدید را ایجاد کنید وان را به کامنت اضافه کنید.برای این کار شما می توانید از تابع save  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$role</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">Role</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Editor'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token variable">$role</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In this example, the new <code class=" language-php">Role</code> model will be saved and attached to the user model. You may also pass an array of attributes to place on the joining table for this operation:</p>
<p dir="rtl">در مثال بالا مدل role  ذخیره می شود وبه مدل user  اضافه می شود . شما ممکن است یک ارایه از صفات را  ارسال کنید تا در جدول متصل شده برای این عمل قرار بگیرند .</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token variable">$role</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'expires'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$expires</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="touching-parent-timestamps"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#touching-parent-timestamps">Touching Parent Timestamps</a></h2>
<p>When a model <code class=" language-php">belongsTo</code> another model, such as a <code class=" language-php">Comment</code> which belongs to a <code class=" language-php">Post</code>, it is often helpful to update the parent's timestamp when the child model is updated. For example, when a <code class=" language-php">Comment</code> model is updated, you may want to automatically touch the <code class=" language-php">updated_at</code> timestamp of the owning <code class=" language-php">Post</code>. Eloquent makes it easy. Just add a <code class=" language-php">touches</code> property containing the names of the relationships to the child model:</p>
<p dir="rtl">وقتی یک مدل به مدل دیگری تعلق دارد مانن وقتی که مدل کامنت به مدل پست تعلق دارد این مفید است که وقتی که مدل فرزند را به روزرسانی می کنید مدل پدر  را نیز بروزرسانی کنیم.برای مثال وقتی یک کامنت اپدیت می شود ما ممکن است بخواهیم دسترسی داشته باشیم به update_at  پست ان . eloquent  این کار را راحت کرده است.فقط یک صفت $touches  را اضافه کنید که نام مدل هایی که مدل فرزند ارتباط دارند را ذخیره کند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">Comment</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$touches</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'post'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">post<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsTo<span class="token punctuation">(</span></span><span class="token string">'App\Post'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Now, when you update a <code class=" language-php">Comment</code>, the owning <code class=" language-php">Post</code> will have its <code class=" language-php">updated_at</code> column updated:</p>
<p dir="rtl">حالا وقتی یک کامنت را اپدیت می کنید ستون update_at  ان پست نیز اپدیت می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$comment</span> <span class="token operator">=</span> <span class="token scope">Comment<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$comment</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">text</span> <span class="token operator">=</span> <span class="token string">'Edit to this comment!'</span><span class="token punctuation">;</span>

        <span class="token variable">$comment</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="working-with-pivot-tables"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#working-with-pivot-tables">Working With Pivot Tables</a></h2>
<p>As you have already learned, working with many-to-many relations requires the presence of an intermediate table. Eloquent provides some very helpful ways of interacting with this table. For example, let's assume our <code class=" language-php">User</code> object has many <code class=" language-php">Role</code> objects that it is related to. After accessing this relationship, we may access the <code class=" language-php">pivot</code> table on the models:</p>
<p dir="rtl">همانطور که شما قبلا یاد گرفتید کار کردن با روابط چند به چند نیاز به یک جدول واسط دارد .eloquent  روشهای خیلی مفیدی را برای تعامل با این جدول ها فراهم کرده است .برای مثال فرض منید شی user  ما خیلی شی role  درد که با ان در ارتباط است بعد از دسترسی به این رابطه شما می توانید به جدول محور این رابطه دسترسی داشته باشید .</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span> <span class="token keyword">as</span> <span class="token variable">$role</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">echo</span> <span class="token variable">$role</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">pivot</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">created_at</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>Notice that each <code class=" language-php">Role</code> model we retrieve is automatically assigned a <code class=" language-php">pivot</code> attribute. This attribute contains a model representing the intermediate table, and may be used as any other Eloquent model.</p>
<p dir="rtl">بیاد داشته باشید که هر مدل role  دریافت می کند وقرار می دهد صفات جدول محور را.این صفات یک مدل را شامل می شوند که یک جدول واسط را حاضر می کتد و ممکن است برای سایر مدل های eloquent   استفاده شود .</p>
<p>By default, only the keys will be present on the <code class=" language-php">pivot</code> object. If your pivot table contains extra attributes, you must specify them when defining the relationship:</p>
<p dir="rtl">به صورت پیش فرض تنها کلید ها می توانند در شی محور حاضر شوند . اگر جدول محور شما صقات اضافه تری را داشته باشد شما انها را هنگام تعریف رابطه می توانید تعریف کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsToMany<span class="token punctuation">(</span></span><span class="token string">'App\Role'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withPivot<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token string">'bar'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Now the <code class=" language-php">foo</code> and <code class=" language-php">bar</code> attributes will be accessible on our <code class=" language-php">pivot</code> object for the <code class=" language-php">Role</code> model.</p>
<p dir="rtl">حالا صفات foo و  bar در شی pivot  برای مدل role  در دسترس هستند.</p>
<p>If you want your pivot table to have automatically maintained <code class=" language-php">created_at</code> and <code class=" language-php">updated_at</code> timestamps, use the <code class=" language-php">withTimestamps</code> method on the relationship definition:</p>
<p dir="rtl">اگر شما بخواهید جدول محور به صورت خودکار صفات create_at  update_at  رانگه داری کند از تابع  withTimestamps  برای تعریف مدل استفاده کنید .</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">belongsToMany<span class="token punctuation">(</span></span><span class="token string">'App\Role'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withTimestamps<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Deleting Records On A Pivot Table</h4>
<p>To delete all records on the pivot table for a model, you may use the <code class=" language-php">detach</code> method:</p>
<p dir="rtl">برای حذف همه رکورد ها از جدول محور شما می توانید از تابع detach  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">detach<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Note that this operation does not delete records from the <code class=" language-php">roles</code> table, but only from the pivot table.</p>
<p dir="rtl">بیاد داشته باشید که این تابع رکورد ها را از جدول role  حذف نمی کند .بلکه انها را از جدول محور حذف می کند.</p>
<h4>Updating A Record On A Pivot Table</h4>
<p>Sometimes you may need to update your pivot table, but not detach it. If you wish to update your pivot table in place you may use <code class=" language-php">updateExistingPivot</code> method like so:</p>
<p dir="rtl">بعضی وقتها شما نیاز به اپدیت کردن جدول محور دارید ولی نمی خواهید انها را کامل جدا کنید  اگر شما بخواهید جدول محور را درجا اپدیت کنید شما می توانید از تابع updateExistingPivot  استفده کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">roles<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">updateExistingPivot<span class="token punctuation">(</span></span><span class="token variable">$roleId</span><span class="token punctuation">,</span> <span class="token variable">$attributes</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Defining A Custom Pivot Model</h4>
<p>Laravel also allows you to define a custom Pivot model. To define a custom model, first create your own "Base" model class that extends <code class=" language-php">Eloquent</code>. In your other Eloquent models, extend this custom base model instead of the default <code class=" language-php">Eloquent</code> base. In your base model, add the following function that returns an instance of your custom Pivot model:</p>
<p dir="rtl">لاراول همچنین به شما اجازه می دهد تا یک مدل محور مطابق میلتان ایجاد کنید.برای تعریف یک مدل دلخواه ابتدا مدل پایه که از eloquent  گسترش می یابد را تعریف می کنیم.در مدل های eloquent  دیگر انها را از این مدل پایه گسترش می دهیم بجای مدل eloquent . در مدل پایه تابع زیر را برای اینکه یک نمونه بتواند برگرداند اضافه می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">newPivot<span class="token punctuation">(</span></span>Model <span class="token variable">$parent</span><span class="token punctuation">,</span> <span class="token keyword">array</span> <span class="token variable">$attributes</span><span class="token punctuation">,</span> <span class="token variable">$table</span><span class="token punctuation">,</span> <span class="token variable">$exists</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">YourCustomPivot</span><span class="token punctuation">(</span><span class="token variable">$parent</span><span class="token punctuation">,</span> <span class="token variable">$attributes</span><span class="token punctuation">,</span> <span class="token variable">$table</span><span class="token punctuation">,</span> <span class="token variable">$exists</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="collections"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#collections">Collections</a></h2>
<p>All multi-result sets returned by Eloquent, either via the <code class=" language-php">get</code> method or a <code class=" language-php">relationship</code>, will return a collection object. This object implements the <code class=" language-php">IteratorAggregate</code> PHP interface so it can be iterated over like an array. However, this object also has a variety of other helpful methods for working with result sets.</p>
<p dir="rtl">همه مجموهع های چند حاصله متوسط eloquent  قابل برگشت هستند .هریک بوسیله تابع get  یا یک رابطه  یک مجموعه از اشیا را بر می گرداند.این شی واسط php  IteratorAggregate  را فراخوانی می کند بنابراین  می تواند تکرار شود شبیه به یک ارایه.هر چند این اشیا توابع مفید دیگری برای کار کردن با مجمعه نتایج دارند.</p>
<h4>Checking If A Collection Contains A Key</h4>
<p>For example, we may determine if a result set contains a given primary key using the <code class=" language-php">contains</code> method:</p>
<p dir="rtl">برای مثال ممکن است ما تعیین کنیم که اگر یک مجموعه از نتایج شامل یک کلید پایه است با استفاده از تابع contains</p>
<p dir="rtl"></p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token punctuation">;</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">contains<span class="token punctuation">(</span></span><span class="token number">2</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p>Collections may also be converted to an array or JSON:</p>
<p dir="rtl">مجموعه ممکن است به ارایه یا json  تبدیل شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">toArray<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">toJson<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If a collection is cast to a string, it will be returned as JSON:</p>
<p dir="rtl">اگر یک مجموعه تبدیل به رشته شود ان می تواند به صورت json  برگردانده شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token punctuation">(</span>string<span class="token punctuation">)</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token punctuation">;</span></code></pre>
<h4>Iterating Collections</h4>
<p>Eloquent collections also contain a few helpful methods for looping and filtering the items they contain:</p>
<p dir="rtl">مجموعه های eloquent  شامل تعداد کمی توابع برای حلقه وفیلتر کردن اشیاعی که دارند است.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">each<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$role</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Filtering Collections</h4>
<p>When filtering collections, the callback provided will be used as callback for <a href="http://php.net/manual/en/function.array-filter.php">array_filter</a>.</p>
<p dir="rtl">وقتی مجموعه ها را فیلتر می  کنید .</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token variable">$users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">filter<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isAdmin<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> When filtering a collection and converting it to JSON, try calling the <code class=" language-php">values</code> function first to reset the array's keys.</p>
    <p dir="rtl">بیاد داشته باشید که وقتی یک مجوعه را فیلتر وتبدیل به json   می کنید سعی کنید که ابتدا تابع values  را فراخوانی کنید تا با کلید های ارایه ای راحت باشید.</p>
</blockquote>
<h4>Applying A Callback To Each Collection Object</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">roles</span><span class="token punctuation">;</span>

        <span class="token variable">$roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">each<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$role</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Sorting A Collection By A Value</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token variable">$roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">sortBy<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$role</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$role</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">created_at</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Sorting A Collection By A Value</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$roles</span> <span class="token operator">=</span> <span class="token variable">$roles</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">sortBy<span class="token punctuation">(</span></span><span class="token string">'created_at'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Returning A Custom Collection Type</h4>
<p>Sometimes, you may wish to return a custom Collection object with your own added methods. You may specify this on your Eloquent model by overriding the <code class=" language-php">newCollection</code> method:</p>
<p dir="rtl">بعضی وقت ها شما ممکن است بخواهید یک مجموعه دلخواه همراه با تابعی که اضافه کرده اید را برگردانید شما ممکن است ان را در مدل eloquent  مشخص کنید با بازنویسی کردن تابع newCollection</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">newCollection<span class="token punctuation">(</span></span><span class="token keyword">array</span> <span class="token variable">$models</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">CustomCollection</span><span class="token punctuation">(</span><span class="token variable">$models</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="accessors-and-mutators"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#accessors-and-mutators">Accessors &amp; Mutators</a></h2>
<h4>Defining An Accessor</h4>
<p>Eloquent provides a convenient way to transform your model attributes when getting or setting them. Simply define a <code class=" language-php">getFooAttribute</code> method on your model to declare an accessor. Keep in mind that the methods should follow camel-casing, even though your database columns are snake-case:</p>
<p dir="rtl">Eloquent  یک روش ساده برای   تغییر شکل صفات مدل هنگام set  get  کردن انها فراهم  می کند.بسادگی تعریف می کنیم تابع getFooAttribute  در مدلتان تا یک accessor  را اعلام کنید. بیاد داشته باشید توابع  بایستس قاعده نوشتاری کوچک وبزرگ در حالی که ستون های پایگاه داده بایستی از حروف کوچک استفاده کنند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getFirstNameAttribute<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">ucfirst<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>In the example above, the <code class=" language-php">first_name</code> column has an accessor. Note that the value of the attribute is passed to the accessor.</p>
<p dir="rtl">در مثال بالا ستون first_name  یک accessor  دارد.بیاد داشته باشید که مقدار صفت به تابع accessor  ارسال می شود.</p>
<h4>Defining A Mutator</h4>
<p>Mutators are declared in a similar fashion:</p>
<p dir="rtl">تغییر دهنده ها نیز به حالت مشابهی تعریف می شوند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">setFirstNameAttribute<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">attributes</span><span class="token punctuation">[</span><span class="token string">'first_name'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token function">strtolower<span class="token punctuation">(</span></span><span class="token variable">$value</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="date-mutators"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#date-mutators">Date Mutators</a></h2>
<p>By default, Eloquent will convert the <code class=" language-php">created_at</code> and <code class=" language-php">updated_at</code> columns to instances of <a href="https://github.com/briannesbitt/Carbon">Carbon</a>, which provides an assortment of helpful methods, and extends the native PHP <code class=" language-php">DateTime</code> class.</p>
<p dir="rtl">به صورت پیش فرض eloquent  ستون های create_at  update_at  را به یک نمونه از carbon   تبیدیل می کند که تهیه کرده است  یک مجموعه از توابع مفید وگسترش می دهد به صوورت منفی کلاس datetime</p>
<p>You may customize which fields are automatically mutated, and even completely disable this mutation, by overriding the <code class=" language-php">getDates</code> method of the model:</p>
<p dir="rtl">شما می توانید شخصی ساری کنید که کدام  فیلد ها به صورت خودکار تغییر کند یا بطور کامل تغییر را غیرفعال کنیم با بازنویسی کردن تابع getDates  درمدل.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getDates<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token punctuation">[</span><span class="token string">'created_at'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>When a column is considered a date, you may set its value to a UNIX timestamp, date string (<code class=" language-php">Y<span class="token operator">-</span>m<span class="token operator">-</span>d</code>), date-time string, and of course a <code class=" language-php">DateTime</code> / <code class=" language-php">Carbon</code> instance.</p>
<p dir="rtl">وقتی که   یک ستون زمانی را در نظر می گیرد شما ممکن است تنظیم کنید مقدار را به unix timestamps  رشته زمان(y-m-d) رشته زمان وقت یک نمونه از carbon	</p>
<p>To totally disable date mutations, simply return an empty array from the <code class=" language-php">getDates</code> method:</p>
<p dir="rtl">برای اینکه بطور کامل تغییر زمان را غیرفعال کنید یک ارایه خالی از تابع getDates  برمی گردانیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getDates<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token punctuation">[</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="attribute-casting"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#attribute-casting">Attribute Casting</a></h2>
<p>If you have some attributes that you want to always convert to another data-type, you may add the attribute to the <code class=" language-php">casts</code> property of your model. Otherwise, you will have to define a mutator for each of the attributes, which can be time consuming. Here is an example of using the <code class=" language-php">casts</code> property:</p>
<p dir="rtl">اگر شما تعدادی صفت دارید که می خواهید به نوه دیگری از زمان تبدیل شود شما ممکن است صفات را به صفت casts  مدل اضافه کنید.در غیر اینصورت  شما مجبورید یک تابع تغییر دهنده  برای هر کدام تعریف کنید که وقت شما را می گیرد در زیر نمونه از استفاده از صفت casts  ذکر شده</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * The attributes that should be casted to native types.
 *
 * @var array
 */</span>
        <span class="token keyword">protected</span> <span class="token variable">$casts</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token string">'is_admin'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'boolean'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p>Now the <code class=" language-php">is_admin</code> attribute will always be cast to a boolean when you access it, even if the underlying value is stored in the database as an integer. Other supported cast types are: <code class=" language-php">integer</code>, <code class=" language-php">real</code>, <code class=" language-php">float</code>, <code class=" language-php">double</code>, <code class=" language-php">string</code>, <code class=" language-php">boolean</code>, <code class=" language-php">object</code> and <code class=" language-php"><span class="token keyword">array</span></code>.</p>
<p dir="rtl">حالا که صفت is_admin  همیشه تبدیل به نوع داده Boolean  می شود  شما می توانید به ان دسترسی داشته باشید.هر چند که داده ای که در پایگاه داده ذخیره شده از نوع integer  باشد.سایر نوع های تبدیلی دیگر عبارتند از:integer float real double string  Boolean array</p>
<p>The <code class=" language-php"><span class="token keyword">array</span></code> cast is particularly useful for working with columns that are stored as serialized JSON. For example, if your database has a TEXT type field that contains serialized JSON, adding the <code class=" language-php"><span class="token keyword">array</span></code> cast to that attribute will automatically deserialize the attribute to a PHP array when you access it on your Eloquent model:</p>
<p dir="rtl">تبدیل ارایه خصوصا برای کار کردن با ستون ها مفید است که به صورت  json   های پشت سر هم ذخیره شده اند .برای نمونه اگر پایگاه داده شما نوع text  داشته باشد که شامل json  های پشت سرهم باشه به صورت خودکار تبدیل به ارایه می شود تا بتوان به ان در  	مدل eloquent  دسترسی داشت.</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * The attributes that should be casted to native types.
 *
 * @var array
 */</span>
        <span class="token keyword">protected</span> <span class="token variable">$casts</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token string">'options'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'array'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p>Now, when you utilize the Eloquent model:</p>
<p dir="rtl">حالا وقتی از مدل eloquent  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// $options is an array...
</span><span class="token variable">$options</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">options</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// options is automatically serialized back to JSON...
</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">options</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'foo'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'bar'</span><span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p><a name="model-events"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#model-events">Model Events</a></h2>
<p>Eloquent models fire several events, allowing you to hook into various points in the model's lifecycle using the following methods: <code class=" language-php">creating</code>, <code class=" language-php">created</code>, <code class=" language-php">updating</code>, <code class=" language-php">updated</code>, <code class=" language-php">saving</code>, <code class=" language-php">saved</code>, <code class=" language-php">deleting</code>, <code class=" language-php">deleted</code>, <code class=" language-php">restoring</code>, <code class=" language-php">restored</code>.</p>
<p dir="rtl">مدل های eloquent  چندین رخداد ایجاد می کنند.که بوسیله ان شما می توانید در چندین نقطه از چرخه اجرای مدل با استفده از این توابع رویداد هایی را به دست اورید . creating, created, updating, updated, saving, saved, deleting,
    deleted, restoring, restored.
</p>
<p>Whenever a new item is saved for the first time, the <code class=" language-php">creating</code> and <code class=" language-php">created</code> events will fire. If an item is not new and the <code class=" language-php">save</code> method is called, the <code class=" language-php">updating</code> / <code class=" language-php">updated</code> events will fire. In both cases, the <code class=" language-php">saving</code> / <code class=" language-php">saved</code> events will fire.</p>
<p dir="rtl">هر وقت یک اتم برای اولین بار ذخیره می شود رخداد های creating   created  اجرا می شوند اگر ایتمی که ذخیره می شود جدید نباشد وذخیره شده باشد رخداد های updated apdating  اجرا می شوند  در هر دو مورد رخداد های saved    saving  اجرا می شوند.</p>
<h4>Cancelling Save Operations Via Events</h4>
<p>If <code class=" language-php"><span class="token boolean">false</span></code> is returned from the <code class=" language-php">creating</code>, <code class=" language-php">updating</code>, <code class=" language-php">saving</code>, or <code class=" language-php">deleting</code> events, the action will be cancelled:</p>
<p dir="rtl">اگر مقدار false از رخدادهای creating updating saving or deletingخارج شود اجرا ی ان عمل متوقف خواهد شد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">creating<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span> <span class="token operator">!</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">isValid<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span> <span class="token keyword">return</span> <span class="token boolean">false</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Where To Register Event Listeners</h4>
<p>Your <code class=" language-php">EventServiceProvider</code> serves as a convenient place to register your model event bindings. For example:</p>
<p dir="rtl">EventServiceProvider  مکان مناسبی برای انقیاد رخدادهای مدل است برای مثال</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Register any other events for your application.
 *
 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
 * @return void
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span>DispatcherContract <span class="token variable">$events</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope"><span class="token keyword">parent</span><span class="token punctuation">::</span></span><span class="token function">boot<span class="token punctuation">(</span></span><span class="token variable">$events</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">creating<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="model-observers"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#model-observers">Model Observers</a></h2>
<p>To consolidate the handling of model events, you may register a model observer. An observer class may have methods that correspond to the various model events. For example, <code class=" language-php">creating</code>, <code class=" language-php">updating</code>, <code class=" language-php">saving</code> methods may be on an observer, in addition to any other model event name.</p>
<p dir="rtl">برای یکی کردن راه انداز  رخداد ها شما ممکن است یک ناظر مدل ثبت کنید .یک کلاس ناظر ممکن است توابعی داشته باشد که که به رخداد های مختلف مدل پاسخ دهد.برای مثال  توابع creating updating saving  ممکن است در درون ناظر وجود داشته باشد.بعلاوه تاو رخداد های مدل دیگر
    بنابراین یک ناظر مدل می تواند شبیه این باشد.
</p>
<p>So, for example, a model observer might look like this:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">UserObserver</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">saving<span class="token punctuation">(</span></span><span class="token variable">$model</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">saved<span class="token punctuation">(</span></span><span class="token variable">$model</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>You may register an observer instance using the <code class=" language-php">observe</code> method:</p>
<p dir="rtl">شما ممکن است یک ناظر را با تابع observe  ثبت کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">observe<span class="token punctuation">(</span></span><span class="token keyword">new</span> <span class="token class-name">UserObserver</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="model-url-generation"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#model-url-generation">Model URL Generation</a></h2>
<p>When you pass a model to the <code class=" language-php">route</code> or <code class=" language-php">action</code> methods, it's primary key is inserted into the generated URI. For example:</p>
<p dir="rtl">وقتی که شما یک مدل را  به یک route  یا یک تابع از کنترلر ارسال می کنید کلید اصلی برای تولید url  استفاده می شود .برای نمونه</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'user/{user}'</span><span class="token punctuation">,</span> <span class="token string">'UserController@show'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token function">action<span class="token punctuation">(</span></span><span class="token string">'UserController@show'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token variable">$user</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In this example the <code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">id</span></code> property will be inserted into the <code class=" language-php"><span class="token punctuation">{</span>user<span class="token punctuation">}</span></code> place-holder of the generated URL. However, if you would like to use another property instead of the ID, you may override the <code class=" language-php">getRouteKey</code> method on your model:</p>
<p dir="rtl">در این مثال صفت $user->id  درون{user}برای تولید url  قرار می گیرد.هر چند اگر شما تمایل داشته باشید از صفات دیگر استفاده کنید شما می توانید تابع getRouteKey را در مدل بازنویسی کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getRouteKey<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">slug</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="converting-to-arrays-or-json"></a></p>
<h2><a href="http://laravel.com/docs/5.0/eloquent#converting-to-arrays-or-json">Converting To Arrays / JSON</a></h2>
<h4>Converting A Model To An Array</h4>
<p>When building JSON APIs, you may often need to convert your models and relationships to arrays or JSON. So, Eloquent includes methods for doing so. To convert a model and its loaded relationship to an array, you may use the <code class=" language-php">toArray</code> method:</p>
<p dir="rtl">وقتی واسط json  ساخته می شود شما اغلب نیاز به تبدیل مدلتان به ارایه یا json  دارید .بنابراین eloquent  توابعی را برای انجام  این کار شامل می شود.برای تبدیل کردن یک مدل و روابط بارگذاری شده ان به یک ارایه شما می توانید از تابع toArray  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'roles'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">toArray<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Note that entire collections of models may also be converted to arrays:</p>
<p dir="rtl">بیاد داشته باشید که کل مجموعه مدول ها ممکن است به ارایه تبدیل شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">toArray<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Converting A Model To JSON</h4>
<p>To convert a model to JSON, you may use the <code class=" language-php">toJson</code> method:</p>
<p dir="rtl">برای تبدیل یک مدل به json  می توانید از تابع tojson  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">toJson<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Returning A Model From A Route</h4>
<p>Note that when a model or collection is cast to a string, it will be converted to JSON, meaning you can return Eloquent objects directly from your application's routes!</p>
<p dir="rtl">بیاد داشته باشید که یک مدل یا مجموعه تبدیل به رسته می شود ان می تواند تبدیل به json  نیز بشود .به این معنی که شما می توانید یک شی aloquent را از مستقیما از مسیریاب برنامه تان برگردانید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Hiding Attributes From Array Or JSON Conversion</h4>
<p>Sometimes you may wish to limit the attributes that are included in your model's array or JSON form, such as passwords. To do so, add a <code class=" language-php">hidden</code> property definition to your model:</p>
<p dir="rtl">بعضی مواقع ممکن است شما بخواهید محدود کنید صفاتی که در ارایه مدل یا فرم json قرار می گیرند ارجمله password  برای انجام این کار صفت $hidden  را بع تعریف مدل اضافه می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token punctuation">{</span>

        <span class="token keyword">protected</span> <span class="token variable">$hidden</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'password'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> When hiding relationships, use the relationship's <strong>method</strong> name, not the dynamic accessor name.</p>
    <p dir="rtl">
        بیاد داشته باشید که وقتی روابط را پنهان می کنید از نام توابع رابطه استفاده می کنیم  نه نام accessor  های پویا
    </p>
</blockquote>
<p>Alternatively, you may use the <code class=" language-php">visible</code> property to define a white-list:</p>
<p dir="rtl">ثانیا شما ممکن است از صفت $visible  برای تعریف کردن لیست سفید استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">protected</span> <span class="token variable">$visible</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'first_name'</span><span class="token punctuation">,</span> <span class="token string">'last_name'</span><span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p><a name="array-appends"></a>
    Occasionally, you may need to add array attributes that do not have a corresponding column in your database. To do so, simply define an accessor for the value:</p>
<p dir="rtl">بعضی وقتا شما نیاز به اضافه کردن صفاتی دارید که معادلیدر پایگاه داده ندارند برای این کار یک accessor  برای مقدار تعریف می کنیم.
    public function getIsAdminAttribute()
</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getIsAdminAttribute<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">attributes</span><span class="token punctuation">[</span><span class="token string">'admin'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'yes'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>Once you have created the accessor, just add the value to the <code class=" language-php">appends</code> property on the model:</p>
<p dir="rtl">یکبار که شما یک accesssor  تعریف کردید مقادیر را به صفت appends  مدل اضافه کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">protected</span> <span class="token variable">$appends</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'is_admin'</span><span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p>Once the attribute has been added to the <code class=" language-php">appends</code> list, it will be included in both the model's array and JSON forms. Attributes in the <code class=" language-php">appends</code> array respect the <code class=" language-php">visible</code> and <code class=" language-php">hidden</code> configuration on the model.</p>
<p dir="rtl">یکبار که صفات به  لیست  appends  اضافه شدند شامل خواهد شد هر دو ازایه های مدل و فرم های json  صفات درون ارایه appends  در نظر می گیرند پیکربندی visible   hidden  در مدل را</p>
</article>
@stop