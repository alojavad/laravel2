<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Migrations &amp; Seeding</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/migrations#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/migrations#creating-migrations">Creating Migrations</a></li>
        <li><a href="http://laravel.com/docs/5.0/migrations#running-migrations">Running Migrations</a></li>
        <li><a href="http://laravel.com/docs/5.0/migrations#rolling-back-migrations">Rolling Back Migrations</a></li>
        <li><a href="http://laravel.com/docs/5.0/migrations#database-seeding">Database Seeding</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/migrations#introduction">Introduction</a></h2>
    <p>Migrations are a type of version control for your database. They allow a team to modify the database schema and stay up to date on the current schema state. Migrations are typically paired with the <a href="http://laravel.com/docs/5.0/schema">Schema Builder</a> to easily manage your application's schema.</p>
    <p dir="rtl">Migration یک نوع کنترل نگارش برای پایگاه داده شماست انها به تیم اجازه می دهند تا قالب پایگاه داده را تغییر دهند وحالت قالب را به روز نگاه دارند.migration نوعا با  سازنده قالب جفت می شود تا به اسانی قالب شما را مدیریت کند .</p>
    <p><a name="creating-migrations"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/migrations#creating-migrations">Creating Migrations</a></h2>
    <p>To create a migration, you may use the <code class=" language-php">make<span class="token punctuation">:</span>migration</code> command on the Artisan CLI:</p>
    <p dir="rtl">برای ایجاد کردن migration   می توانید از فرمان زیر استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>migration create_users_table</code></pre>
    <p>The migration will be placed in your <code class=" language-php">database<span class="token operator">/</span>migrations</code> folder, and will contain a timestamp which allows the framework to determine the order of the migrations.</p>
    <p dir="rtl">migration  درفولدر  database/migration   قرار می گیرد ویک timestamp   را نگه میدارد تا به فریم ورک اجازه دهد تا مرتبه migration   را مشخص کند.</p>
    <p>The <code class=" language-php"><span class="token operator">--</span>table</code> and <code class=" language-php"><span class="token operator">--</span>create</code> options may also be used to indicate the name of the table, and whether the migration will be creating a new table:</p>
    <p dir="rtl">گزینه –table   --create  ممکن است استفاده شود تا نشان دهد نام جدول  وایا migration  جدول جدیدی ایجاد کند.</p>
<pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>migration add_votes_to_users_table <span class="token operator">--</span>table<span class="token operator">=</span>users

        php artisan make<span class="token punctuation">:</span>migration create_users_table <span class="token operator">--</span>create<span class="token operator">=</span>users</code></pre>
    <p><a name="running-migrations"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/migrations#running-migrations">Running Migrations</a></h2>
    <h4>Running All Outstanding Migrations</h4>
    <pre class=" language-php"><code class=" language-php">php artisan migrate</code></pre>
    <blockquote>
        <p><strong>Note:</strong> If you receive a "class not found" error when running migrations, try running the <code class=" language-php">composer dump<span class="token operator">-</span>autoload</code> command.</p>
        <p dir="rtl">بیاد داشته باشید اگر شما خطای class not found  وقتی که migration  را اجرا می کنید دریافت کردید فرمان composer dump-autoload  را اجرا کنید.</p>
    </blockquote>
    <h3>Forcing Migrations In Production</h3>
    <p>Some migration operations are destructive, meaning they may cause you to lose data. In order to protect you from running these commands against your production database, you will prompted for confirmation before these commands are executed. To force the commands to run without a prompt, use the <code class=" language-php"><span class="token operator">--</span>force</code> flag:</p>
    <p dir="rtl">برخی از اعمال migration  مخرب هستند معنیش این است که ممکن است داده ها از بین برود .به منظور محافظت  شما در برابر اینجور دستورات بر روی پایگاه داده های تولید شده با شما تعامل می شود تا ان را تایید کنید برای اینکه  فرمان را مجبور کنید که بدون تعامل کار را انجام دهد از فلگ –force استفاده می کنیم.</p>
    <pre class=" language-php"><code class=" language-php">php artisan migrate <span class="token operator">--</span>force</code></pre>
    <p><a name="rolling-back-migrations"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/migrations#rolling-back-migrations">Rolling Back Migrations</a></h2>
    <h4>Rollback The Last Migration Operation</h4>
    <pre class=" language-php"><code class=" language-php">php artisan migrate<span class="token punctuation">:</span>rollback</code></pre>
    <h4>Rollback all migrations</h4>
    <pre class=" language-php"><code class=" language-php">php artisan migrate<span class="token punctuation">:</span>reset</code></pre>
    <h4>Rollback all migrations and run them all again</h4>
<pre class=" language-php"><code class=" language-php">php artisan migrate<span class="token punctuation">:</span>refresh

        php artisan migrate<span class="token punctuation">:</span>refresh <span class="token operator">--</span>seed</code></pre>
    <p><a name="database-seeding"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/migrations#database-seeding">Database Seeding</a></h2>
    <p>Laravel also includes a simple way to seed your database with test data using seed classes. All seed classes are stored in <code class=" language-php">database<span class="token operator">/</span>seeds</code>. Seed classes may have any name you wish, but probably should follow some sensible convention, such as <code class=" language-php">UserTableSeeder</code>, etc. By default, a <code class=" language-php">DatabaseSeeder</code> class is defined for you. From this class, you may use the <code class=" language-php">call</code> method to run other seed classes, allowing you to control the seeding order.</p>
    <p dir="rtl">لاراول همچنین یک روش ساده برای پر کردن  پایگاه داده با داده های تست با استفاده از کلاس seed
        همه کلاس های seed  در database/seed ذخیره می شوند.
        کلاس seed  ممکن است هر نامی که شما می خواهید داشته باشد اما احتمالا بایستی قواهد قابل تشخیصی را رعایت کند از قبیل useTableSeeder  وغیره
    </p>
    <h4>Example Database Seed Class</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">DatabaseSeeder</span> <span class="token keyword">extends</span> <span class="token class-name">Seeder</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">run<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">call<span class="token punctuation">(</span></span><span class="token string">'UserTableSeeder'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">command</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">info<span class="token punctuation">(</span></span><span class="token string">'User table seeded!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span>

        <span class="token keyword">class</span> <span class="token class-name">UserTableSeeder</span> <span class="token keyword">extends</span> <span class="token class-name">Seeder</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">run<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token scope">DB<span class="token punctuation">::</span></span><span class="token function">table<span class="token punctuation">(</span></span><span class="token string">'users'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">delete<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">create<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'foo@bar.com'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>To seed your database, you may use the <code class=" language-php">db<span class="token punctuation">:</span>seed</code> command on the Artisan CLI:</p>
    <p dir="rtl">برای پر کردن پایگاه داده می توانید از فرمان زیر استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php">php artisan db<span class="token punctuation">:</span>seed</code></pre>
    <p>By default, the <code class=" language-php">db<span class="token punctuation">:</span>seed</code> command runs the <code class=" language-php">DatabaseSeeder</code> class, which may be used to call other seed classes. However, you may use the <code class=" language-php"><span class="token operator">--</span><span class="token keyword">class</span></code> option to specify a specific seeder class to run individually:</p>
    <p dir="rtl">به صورت پیش فرض یک کلاس DataBaseSeeder برای شما تعریف شده است.از این کلاس شما می توانید تابع call  را استفاده کنید تا بقیه کلاس ها را فراحوانی کنید به شما اجازه می دهد تا کنترل کنید مرتبه seeding  را</p>
    <pre class=" language-php"><code class=" language-php">php artisan db<span class="token punctuation">:</span>seed <span class="token operator">--</span><span class="token keyword">class</span><span class="token operator">=</span>UserTableSeeder</code></pre>
    <p>You may also seed your database using the <code class=" language-php">migrate<span class="token punctuation">:</span>refresh</code> command, which will also rollback and re-run all of your migrations:</p>

    <p dir="rtl">شما ممکن است پایگاه داده را با فرمان migrate:refresh پر کنید که migrationها را برمی گرداند و دوباره اجرا می کند.</p>
    <pre class=" language-php"><code class=" language-php">php artisan migrate<span class="token punctuation">:</span>refresh <span class="token operator">--</span>seed</code></pre>
</article>
@stop