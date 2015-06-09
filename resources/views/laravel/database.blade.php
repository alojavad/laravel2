<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Basic Database Usage</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/database#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/database#read-write-connections">Read / Write Connections</a></li>
        <li><a href="http://laravel.com/docs/5.0/database#running-queries">Running Queries</a></li>
        <li><a href="http://laravel.com/docs/5.0/database#database-transactions">Database Transactions</a></li>
        <li><a href="http://laravel.com/docs/5.0/database#accessing-connections">Accessing Connections</a></li>
        <li><a href="http://laravel.com/docs/5.0/database#query-logging">Query Logging</a></li>
    </ul>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/database#configuration">Configuration</a></h2>
    <p>Laravel makes connecting with databases and running queries extremely simple. The database configuration file is <code class=" language-php">config<span class="token operator">/</span>database<span class="token punctuation">.</span>php</code>. In this file you may define all of your database connections, as well as specify which connection should be used by default. Examples for all of the supported database systems are provided in this file.</p>
    <p dir="rtl">لاراول اتصال به پایگاه داده  و اجرای پرس و جو را بشدت ساده کرده است  فایل پیکربندی پایگاه داده در config/database.php قرار می گیرد.در این فایل ممکن است شما تمام ارتباط ها را مشخص کنید  و به خوبی تعیین کنید که کدام ارتباط به عنوان ارتباط پیش فرض استفاده شود .نمونه هایی برای تمامی پایگاه داده هایی که پوشش داده می شود در این فایل قرار  می گیرد .</p>
    <p>Currently Laravel supports four database systems: MySQL, Postgres, SQLite, and SQL Server.</p>
    <p dir="rtl">اخیرا لاراول از 4سیستم پایگاه داده پشتیبانی می کند mysql postgres sqlite sql server</p>
    <p><a name="read-write-connections"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/database#read-write-connections">Read / Write Connections</a></h2>
    <p>Sometimes you may wish to use one database connection for SELECT statements, and another for INSERT, UPDATE, and DELETE statements. Laravel makes this a breeze, and the proper connections will always be used whether you are using raw queries, the query builder, or the Eloquent ORM.</p>
    <p dir="rtl">بعضی مواقع شما ممکن است بخواهید از یک پایگاه داده برای جملات select  استفاده کنید و از ارتباطی دیگر برای insert update delete  استفاده  کنید لاراول این کار را خیلی راحت کرده است و ارتباط مناسب استفاده خواهد شد چه اینکه شما از پرس و جو های معمولی استفاده کنید چه از query builder  چه  eloquent orm  استفاده کنید .</p>
    <p>To see how read / write connections should be configured, let's look at this example:</p>
    <p dir="rtl">ارتباط خواندن و نوشتن بایستی پیکربندی شود  نگاهی به این مثال بیندازید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'mysql'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'read'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'host'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'192.168.1.1'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token string">'write'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'host'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'196.168.1.2'</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token string">'driver'</span>    <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'mysql'</span><span class="token punctuation">,</span>
        <span class="token string">'database'</span>  <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'database'</span><span class="token punctuation">,</span>
        <span class="token string">'username'</span>  <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'root'</span><span class="token punctuation">,</span>
        <span class="token string">'password'</span>  <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">''</span><span class="token punctuation">,</span>
        <span class="token string">'charset'</span>   <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'utf8'</span><span class="token punctuation">,</span>
        <span class="token string">'collation'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'utf8_unicode_ci'</span><span class="token punctuation">,</span>
        <span class="token string">'prefix'</span>    <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">''</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span></code></pre>
    <p>Note that two keys have been added to the configuration array: <code class=" language-php">read</code> and <code class=" language-php">write</code>. Both of these keys have array values containing a single key: <code class=" language-php">host</code>. The rest of the database options for the <code class=" language-php">read</code> and <code class=" language-php">write</code> connections will be merged from the main <code class=" language-php">mysql</code> array. So, we only need to place items in the <code class=" language-php">read</code> and <code class=" language-php">write</code> arrays if we wish to override the values in the main array. So, in this case, <code class=" language-php"><span class="token number">192.168</span><span class="token punctuation">.</span><span class="token number">1.1</span></code> will be used as the "read" connection, while <code class=" language-php"><span class="token number">192.168</span><span class="token punctuation">.</span><span class="token number">1.2</span></code> will be used as the "write" connection. The database credentials, prefix, character set, and all other options in the main <code class=" language-php">mysql</code> array will be shared across both connections.</p>
    <p dir="rtl">بیاد داشته باشید که دو کلید read and write   به فایل  اضافه شده است .هر دوی این کلید ها ارایه از مقادیر می گیرند که که شامل کلید host  می شود.گزینه های باقیمانده برای ارتباط خواندن ونوشتن در ارایه اصلیmysql  ادغام می شوند.بنابراین ما فقط نیاز به قرار  دادن موارد در ارایه  خواندن ونوشتن داریم اگر بخواهیم مقدایر ارایه اصلی را بازنویسی کنیم.بنابراین در این مورد ای پی 192.168.1.1 برای ارتباط خواندن استفاده می شود و ای پی 192.168.1.2  برای نوشتن استفاده می شود . مجوز های پایگاه داده  پیشوند ها  کارکتر تنظیم  وسایر گزینه ها در ارایه اصلی قرار می گیرند وبین هر دو ارتباط به اشتراک گذاشته می شوند.</p>
    <p><a name="running-queries"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/database#running-queries">Running Queries</a></h2>
    <p>Once you have configured your database connection, you may run queries using the <code class=" language-php"><span class="token constant">DB</span></code> facade.</p>
    <p dir="rtl">یکبار که پایگاه داده را پیکربندی کردید شما پرس و جو ها را با نما  dbاجرا کنید</p>
    <h4>Running A Select Query</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$results</span> <span class="token operator">=</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">select<span class="token punctuation">(</span></span><span class="token string">'select * from users where id = ?'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The <code class=" language-php">select</code> method will always return an <code class=" language-php"><span class="token keyword">array</span></code> of results.</p>
    <p dir="rtl">تابع select  یک ارایه از مقادیر را بر می گرداند.</p>
    <p>You may also execute a query using named bindings:</p>
    <p dir="rtl">شما ممکن است یک پرس وجو را با انقیاد نام اجرا کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$results</span> <span class="token operator">=</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">select<span class="token punctuation">(</span></span><span class="token string">'select * from users where id = :id'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'id'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Running An Insert Statement</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">insert<span class="token punctuation">(</span></span><span class="token string">'insert into users (id, name) values (?, ?)'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Running An Update Statement</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">update<span class="token punctuation">(</span></span><span class="token string">'update users set votes = 100 where name = ?'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'John'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Running A Delete Statement</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token string">'delete from users'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> The <code class=" language-php">update</code> and <code class=" language-php">delete</code> statements return the number of rows affected by the operation.</p>
        <p dir="rtl">جملات delete update  تعداد سطرهایی که تاثیر می گیرد را بر می گرداند.</p>
    </blockquote>
    <h4>Running A General Statement</h4>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">statement<span class="token punctuation">(</span></span><span class="token string">'drop table users'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Listening For Query Events</h4>
    <p>You may listen for query events using the <code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span>listen</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">listen<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$sql</span><span class="token punctuation">,</span> <span class="token variable">$bindings</span><span class="token punctuation">,</span> <span class="token variable">$time</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="database-transactions"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/database#database-transactions">Database Transactions</a></h2>
    <p>To run a set of operations within a database transaction, you may use the <code class=" language-php">transaction</code> method:</p>
    <p dir="rtl">برای اجرای یک مجموعه از دستورالعمل ها بوسیله مبادلات پایگاه داده  شما می توانید از تابع transaction  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">transaction<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">update<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'votes'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'posts'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Any exception thrown within the <code class=" language-php">transaction</code> closure will cause the transaction to be rolled back automatically.</p>
        <p dir="rtl">هر گونه خطایی که داخل تابع transaction  رخ دهد باعث می شود که کل عملیات به عقب برگردد .</p>
    </blockquote>
    <p>Sometimes you may need to begin a transaction yourself:</p>
    <p dir="rtl">بعضی مواقع شما نیاز دارید که خودتان مبادلات را اغاز کنید</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">beginTransaction<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You can rollback a transaction via the <code class=" language-php">rollback</code> method:</p>
    <p dir="rtl">شما با تابع rollback  می توانید تغییرات را به حالت قبل از عملیات برگردانید .</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">rollback<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Lastly, you can commit a transaction via the <code class=" language-php">commit</code> method:</p>
    <p dir="rtl">به تازگی شما می توانید مبادلات را به وسیله    تابع   commit  تایید کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">commit<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="accessing-connections"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/database#accessing-connections">Accessing Connections</a></h2>
    <p>When using multiple connections, you may access them via the <code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span>connection</code> method:</p>
    <p dir="rtl">وقتی که شما از چندین ارتباط استفاده می کنید شما می توانید به ارتباطات دسترسی داشته باشید  </p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$users</span> <span class="token operator">=</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">connection<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">select<span class="token punctuation">(</span></span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also access the raw, underlying PDO instance:</p>
    <p dir="rtl">شما با استفاده از یک نمونه pdo  می توانید به به صورت خام دسترسی داشته باشید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$pdo</span> <span class="token operator">=</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">connection<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getPdo<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Sometimes you may need to reconnect to a given database:</p>
    <p dir="rtl">بعضی مواقع شما نیاز به اتصال مجدد دارید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">reconnect<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>If you need to disconnect from the given database due to exceeding the underlying PDO instance's <code class=" language-php">max_connections</code> limit, use the <code class=" language-php">disconnect</code> method:</p>
    <p dir="rtl">اگر نیاز شما به قطع کردن پایگاه داده منجر به تجاوز از یک max_connection  شود از تابع disconnect  استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">disconnect<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="query-logging"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/database#query-logging">Query Logging</a></h2>
    <p>Laravel can optionally log in memory all queries that have been run for the current request. Be aware that in some cases, such as when inserting a large number of rows, this can cause the application to use excess memory. To enable the log, you may use the <code class=" language-php">enableQueryLog</code> method:</p>
    <p dir="rtl">لاراول به صورت اختیاری همه پرس و جو هایی که برای درخواست جاری اجرا می شود را ضبط می کند . مراقب باشید که در بعضی از موارد که از جمله هنگامی که تعداد زیادی داده را می خواهید در پایگاه ذخیره کنید منجر به استفاده بی رویه از پایگاه داده می شود.برای فعال کردن اینکه پرس و جو ها را ذخیره کند  شما می توانید از تابع anableQueryLog استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">connection<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">enableQueryLog<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>To get an array of the executed queries, you may use the <code class=" language-php">getQueryLog</code> method:</p>
    <p dir="rtl">برای دریافت یک ارایه از پرس و جو های اجراا شده می توانید از تابع getauaryLog  استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$queries</span> <span class="token operator">=</span> <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">getQueryLog<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop