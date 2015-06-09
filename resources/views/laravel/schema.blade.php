<!-- -->
@extends('master')

@section('content')
<article>
<h1>Schema Builder</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/schema#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#creating-and-dropping-tables">Creating &amp; Dropping Tables</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#adding-columns">Adding Columns</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#changing-columns">Changing Columns</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#renaming-columns">Renaming Columns</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#dropping-columns">Dropping Columns</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#checking-existence">Checking Existence</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#adding-indexes">Adding Indexes</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#foreign-keys">Foreign Keys</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#dropping-indexes">Dropping Indexes</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#dropping-timestamps">Dropping Timestamps &amp; Soft Deletes</a></li>
    <li><a href="http://laravel.com/docs/5.0/schema#storage-engines">Storage Engines</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#introduction">Introduction</a></h2>
<p>The Laravel <code class=" language-php">Schema</code> class provides a database agnostic way of manipulating tables. It works well with all of the databases supported by Laravel, and has a unified API across all of these systems.</p>
<p dir="rtl">کلاس schema  لاراول یک روش خارق العاده برای دستکاری جداول فراهم می کند .با همه پایگاه داده هایی که لاراوی پشتیبانی می کند به خوبی کار می کند .برای همه این ها  فرم یکسانی دارد.</p>
<p><a name="creating-and-dropping-tables"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#creating-and-dropping-tables">Creating &amp; Dropping Tables</a></h2>
<p>To create a new database table, the <code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span>create</code> method is used:</p>
<p dir="rtl">برای ایجاد یک جدول پایگاه داده از تابع schema::create  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">create<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">increments<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The first argument passed to the <code class=" language-php">create</code> method is the name of the table, and the second is a <code class=" language-php">Closure</code> which will receive a <code class=" language-php">Blueprint</code> object which may be used to define the new table.</p>
<p dir="rtl">
    اولین ارگومانی که به تابع create  ارسال می شود نام جدول است.و دومی یک عبارت است که یک شی اولیه را دریافت می کند که ممکن است برای تعریف یک جدول جدید استفاده شود.
</p>
<p>To rename an existing database table, the <code class=" language-php">rename</code> method may be used:</p>
<p dir="rtl">برای تغییر نام یک جدول پایگاه داده از تابع rename  استفاده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">rename<span class="token punctuation">(</span></span><span class="token variable">$from</span><span class="token punctuation">,</span> <span class="token variable">$to</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>To specify which connection the schema operation should take place on, use the <code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span>connection</code> method:</p>
<p dir="rtl">برای تعیین اتصال که عملیات schema  بر روی ان قرار بگیرد از تابع schama::connection  استفده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">connection<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">create<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">increments<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>To drop a table, you may use the <code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span>drop</code> method:</p>
<p dir="rtl">برای حذف یک جدول از تابع schema::drop  استفاده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">drop<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">dropIfExists<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="adding-columns"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#adding-columns">Adding Columns</a></h2>
<p>To update an existing table, we will use the <code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span>table</code> method:</p>
<p dir="rtl">برای اپدیت کردن جدولی که وجود دارد می توانیم از تابع  schema::table  استفاده کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The table builder contains a variety of column types that you may use when building your tables:</p>
<p dir="rtl">سازنده جدول انواه ستون ها را دارد که هنگام ساخت جدول می تواند استفاده شود .</p>
<table>
    <thead>
    <tr>
        <th>Command</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bigIncrements<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Incrementing ID using a "big integer" equivalent</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bigInteger<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>BIGINT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">binary<span class="token punctuation">(</span></span><span class="token string">'data'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>BLOB equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">boolean<span class="token punctuation">(</span></span><span class="token string">'confirmed'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>BOOLEAN equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">char<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token number">4</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>CHAR equivalent with a length</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">date<span class="token punctuation">(</span></span><span class="token string">'created_at'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>DATE equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dateTime<span class="token punctuation">(</span></span><span class="token string">'created_at'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>DATETIME equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">decimal<span class="token punctuation">(</span></span><span class="token string">'amount'</span><span class="token punctuation">,</span> <span class="token number">5</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>DECIMAL equivalent with a precision and scale</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">double<span class="token punctuation">(</span></span><span class="token string">'column'</span><span class="token punctuation">,</span> <span class="token number">15</span><span class="token punctuation">,</span> <span class="token number">8</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>DOUBLE equivalent with precision, 15 digits in total and 8 after the decimal point</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">enum<span class="token punctuation">(</span></span><span class="token string">'choices'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token string">'bar'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>ENUM equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">float<span class="token punctuation">(</span></span><span class="token string">'amount'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>FLOAT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">increments<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Incrementing ID to the table (primary key)</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">integer<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>INTEGER equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">json<span class="token punctuation">(</span></span><span class="token string">'options'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>JSON equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">jsonb<span class="token punctuation">(</span></span><span class="token string">'options'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>JSONB equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">longText<span class="token punctuation">(</span></span><span class="token string">'description'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>LONGTEXT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">mediumInteger<span class="token punctuation">(</span></span><span class="token string">'numbers'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>MEDIUMINT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">mediumText<span class="token punctuation">(</span></span><span class="token string">'description'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>MEDIUMTEXT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">morphs<span class="token punctuation">(</span></span><span class="token string">'taggable'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adds INTEGER <code class=" language-php">taggable_id</code> and STRING <code class=" language-php">taggable_type</code></td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">nullableTimestamps<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Same as <code class=" language-php"><span class="token function">timestamps<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code>, except allows NULLs</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">smallInteger<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>SMALLINT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">tinyInteger<span class="token punctuation">(</span></span><span class="token string">'numbers'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>TINYINT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">softDeletes<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adds <strong>deleted_at</strong> column for soft deletes</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>VARCHAR equivalent column</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>VARCHAR equivalent with a length</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">text<span class="token punctuation">(</span></span><span class="token string">'description'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>TEXT equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">time<span class="token punctuation">(</span></span><span class="token string">'sunrise'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>TIME equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">timestamp<span class="token punctuation">(</span></span><span class="token string">'added_on'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>TIMESTAMP equivalent to the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">timestamps<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adds <strong>created_at</strong> and <strong>updated_at</strong> columns</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">rememberToken<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adds <code class=" language-php">remember_token</code> as VARCHAR(100) NULL</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">nullable<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code></td>
        <td>Designate that the column allows NULL values</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token keyword">default</span><span class="token punctuation">(</span><span class="token variable">$value</span><span class="token punctuation">)</span></code></td>
        <td>Declare a default value for a column</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">unsigned<span class="token punctuation">(</span></span><span class="token punctuation">)</span></code></td>
        <td>Set INTEGER to UNSIGNED</td>
    </tr>
    </tbody>
</table>
<h4>Using After On MySQL</h4>
<p>If you are using the MySQL database, you may use the <code class=" language-php">after</code> method to specify the order of columns:</p>
<p dir="rtl">اگر شما از پایگاه داده  mysql  استفاده می کنید شما می توانید با تابع after  ترتیب ستون ها را مرتب کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">after<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="changing-columns"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#changing-columns">Changing Columns</a></h2>
<p>Sometimes you may need to modify an existing column. For example, you may wish to increase the size of a string column. The <code class=" language-php">change</code> method makes it easy! For example, let's increase the size of the <code class=" language-php">name</code> column from 25 to 50:</p>
<p dir="rtl">بعضی مواقع شما نیاز به تغییر دادن ستون های موجود دارید.برای مثال شما ممکن است بخواهید اندازه طول رشته ستون را تغییر دهید.تابع change  این کار را راحت کرده است.برای مثال اجازه دهید افزایش دهیم اندازه طول ستون name  از 25 به 50</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token number">50</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">change<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>We could also modify a column to be nullable:</p>
<p dir="rtl">شما ممکن است یک ستون را به nullable  تغییر دهید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token number">50</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">nullable<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">change<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="renaming-columns"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#renaming-columns">Renaming Columns</a></h2>
<p>To rename a column, you may use the <code class=" language-php">renameColumn</code> method on the Schema builder. Before renaming a column, be sure to add the <code class=" language-php">doctrine<span class="token operator">/</span>dbal</code> dependency to your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file.</p>
<p dir="rtl">برای تغییر نام ستون شما ممکن است   از تابع renameColumn در سازنده قالب استفاده کنید.قبل از تغییر نام ستون از اضافه کردنdoctrine/dbalبه فایل composer.json  مطمئن شوید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">renameColumn<span class="token punctuation">(</span></span><span class="token string">'from'</span><span class="token punctuation">,</span> <span class="token string">'to'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> Renaming columns in a table with <code class=" language-php">enum</code> column is currently not supported. </p>
    <p dir="rtl">تغییر نام ستون هایی که نوع داده  انها از نوع enum  است پشتیبانی نمی شود.</p>
</blockquote>
<p><a name="dropping-columns"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#dropping-columns">Dropping Columns</a></h2>
<p>To drop a column, you may use the <code class=" language-php">dropColumn</code> method on the Schema builder. Before dropping a column, be sure to add the <code class=" language-php">doctrine<span class="token operator">/</span>dbal</code> dependency to your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file.</p>
<p dir="rtl">برای حذف یک ستون شما ممکن است از تابع dropColumn  در سازنده قاالب استفاده کنید.قبل از حذف یک ستون از وجود doctrine/dbal   درفایل composer.json  اطمینان حاصل کنید.</p>
<h4>Dropping A Column From A Database Table</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropColumn<span class="token punctuation">(</span></span><span class="token string">'votes'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Dropping Multiple Columns From A Database Table</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropColumn<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'votes'</span><span class="token punctuation">,</span> <span class="token string">'avatar'</span><span class="token punctuation">,</span> <span class="token string">'location'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="checking-existence"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#checking-existence">Checking Existence</a></h2>
<h4>Checking For Existence Of Table</h4>
<p>You may easily check for the existence of a table or column using the <code class=" language-php">hasTable</code> and <code class=" language-php">hasColumn</code> methods:</p>
<p dir="rtl">شما به اسانی وجود داشتن جدول یا وجود داشتن ستون را بوسیله توابع hasTable  hasColumn  بررسی کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">hasTable<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Checking For Existence Of Columns</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">hasColumn<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p><a name="adding-indexes"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#adding-indexes">Adding Indexes</a></h2>
<p>The schema builder supports several types of indexes. There are two ways to add them. First, you may fluently define them on a column definition, or you may add them separately:</p>
<p dir="rtl">سازنده فالب چندین نوع index  را پشتیبانی می کند .دو روش برای اضافه کردن انها وجود دارد.یکی این که شما ان را به راحتی برای یک ستون تعریف کنید یا انکه ان را جداگانه اضافه کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">unique<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Or, you may choose to add the indexes on separate lines. Below is a list of all available index types:</p>
<p dir="rtl">یا ممکن است شما انتخاب کنید تا ایندکس را درخط جداگانه اضافه کنید.در زیر لیست همه نوع ایندکس ذکر شده است.</p>
<table>
    <thead>
    <tr>
        <th>Command</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">primary<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adding a primary key</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">primary<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'first'</span><span class="token punctuation">,</span> <span class="token string">'last'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adding composite keys</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">unique<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adding a unique index</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">index<span class="token punctuation">(</span></span><span class="token string">'state'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Adding a basic index</td>
    </tr>
    </tbody>
</table>
<p><a name="foreign-keys"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#foreign-keys">Foreign Keys</a></h2>
<p>Laravel also provides support for adding foreign key constraints to your tables:</p>
<p dir="rtl">لاراول اضافه کردن کلید خارجی را نیز پشتیبانی می کند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">integer<span class="token punctuation">(</span></span><span class="token string">'user_id'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">unsigned<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">foreign<span class="token punctuation">(</span></span><span class="token string">'user_id'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">references<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">on<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In this example, we are stating that the <code class=" language-php">user_id</code> column references the <code class=" language-php">id</code> column on the <code class=" language-php">users</code> table. Make sure to create the foreign key column first!</p>
<p dir="rtl">در این مثال ما تعیین کرده ایم که ستون user_id  به ستون id  در جدول user  اشاره می کند.</p>
<p>You may also specify options for the "on delete" and "on update" actions of the constraint:</p>
<p dir="rtl">شما ممکن است همچنین گزینه هایی را برای اعمال محدودیت بکار ببرید از جمله   on delete   on update
    $table->foreign('user_id')
</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">foreign<span class="token punctuation">(</span></span><span class="token string">'user_id'</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">references<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">on<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">onDelete<span class="token punctuation">(</span></span><span class="token string">'cascade'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>To drop a foreign key, you may use the <code class=" language-php">dropForeign</code> method. A similar naming convention is used for foreign keys as is used for other indexes:</p>
<p dir="rtl">برای حذف کلید خارجی شما می توانید از  تابع deopForeign  استفاده کنید.یک نامگذاری مشابه ای که برای کلید خارجی استفاده می شود برای سایر ایندکس ها نیز استفاده می شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropForeign<span class="token punctuation">(</span></span><span class="token string">'posts_user_id_foreign'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> When creating a foreign key that references an incrementing integer, remember to always make the foreign key column <code class=" language-php">unsigned</code>.</p>
    <p dir="rtl">بیاد داشته باشید وقتی کلید خارجی ایجاد می کنید که به یک integer    خود افزاینده اشاره می کند بیاد داشته باشید که کلید خارجی unsign  باشد.</p>
</blockquote>
<p><a name="dropping-indexes"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#dropping-indexes">Dropping Indexes</a></h2>
<p>To drop an index you must specify the index's name. Laravel assigns a reasonable name to the indexes by default. Simply concatenate the table name, the names of the column in the index, and the index type. Here are some examples:</p>
<p dir="rtl">برای حذف ایندکس  شما باید نام ایندکس را تعیین کنید .لاراول یک نام متعارف برای ایندکس ها به صورت پیش فرض در نظر می گیرد .به اسانی نام جدول را به نام ستون وبه نوع ایندکس بچسبانید . در زیر نمونه هایی از ان امده است.</p>
<table>
    <thead>
    <tr>
        <th>Command</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropPrimary<span class="token punctuation">(</span></span><span class="token string">'users_id_primary'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Dropping a primary key from the "users" table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropUnique<span class="token punctuation">(</span></span><span class="token string">'users_email_unique'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Dropping a unique index from the "users" table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropIndex<span class="token punctuation">(</span></span><span class="token string">'geo_state_index'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Dropping a basic index from the "geo" table</td>
    </tr>
    </tbody>
</table>
<p><a name="dropping-timestamps"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#dropping-timestamps">Dropping Timestamps &amp; SoftDeletes</a></h2>
<p>To drop the <code class=" language-php">timestamps</code>, <code class=" language-php">nullableTimestamps</code> or <code class=" language-php">softDeletes</code> column types, you may use the following methods:</p>
<p dir="rtl">برای حذف timestamp  nullableTimestamp  softDeleting  از توابع زیر می توانیم استفاده کنیم.</p>
<table>
    <thead>
    <tr>
        <th>Command</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropTimestamps<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Dropping the <strong>created_at</strong> and <strong>updated_at</strong> columns from the table</td>
    </tr>
    <tr>
        <td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dropSoftDeletes<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
        <td>Dropping <strong>deleted_at</strong> column from the table</td>
    </tr>
    </tbody>
</table>
<p><a name="storage-engines"></a></p>
<h2><a href="http://laravel.com/docs/5.0/schema#storage-engines">Storage Engines</a></h2>
<p>To set the storage engine for a table, set the <code class=" language-php">engine</code> property on the schema builder:</p>
<p dir="rtl">برای تنظیم کردن موتور های ذخیره سازی برای جداول  صفت engine  راد رسازنده قالب تنظیم می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Schema<span class="token punctuation">::</span></span><span class="token function">create<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$table</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">engine</span> <span class="token operator">=</span> <span class="token string">'InnoDB'</span><span class="token punctuation">;</span>

        <span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">string<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop