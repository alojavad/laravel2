<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Views</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/views#basic-usage">Basic Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/views#view-composers">View Composers</a></li>
    </ul>
    <p><a name="basic-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/views#basic-usage">Basic Usage</a></h2>
    <p>Views contain the HTML served by your application, and serve as a convenient method of separating your controller and domain logic from your presentation logic. Views are stored in the <code class=" language-php">resources<span class="token operator">/</span>views</code> directory.</p>
    <p dir="rtl">View شامل html  است که توسط برنامه به کار گرفته میشود. و بکار گرفته می شود به عنوان  یک روش راحت برای جدا کردن کنترلر  و محدوده منطق از نمایش منطق. View  ها در پوشه resource/view ذخیره می شوند.</p>
    <p>A simple view looks like this:</p>
    <p dir="rtl">یک view  ساده شبیه به این است.</p>
<pre class=" language-php"><code class=" language-php"><span class="token markup"><span class="token comment" spellcheck="true">&lt;!-- View stored in resources/views/greeting.php --&gt;</span></span>

        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>html</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>body</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h1</span><span class="token punctuation">&gt;</span></span></span>Hello<span class="token punctuation">,</span> <span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$name</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span><span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h1</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>body</span><span class="token punctuation">&gt;</span></span></span>
        <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>html</span><span class="token punctuation">&gt;</span></span></span></code></pre>
    <p>The view may be returned to the browser like so:</p>
    <p dir="rtl">View ممکن است به صورت زیر ممکن اسن به کاربر برگردانده شود.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'/'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'greeting'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'James'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>As you can see, the first argument passed to the <code class=" language-php">view</code> helper corresponds to the name of the view file in the <code class=" language-php">resources<span class="token operator">/</span>views</code> directory. The second argument passed to helper is an array of data that should be made available to the view.</p>
    <p dir="rtl">همان طور که می بینید اولین ارگومانی که به تابع داده می شود نام view  است که در پوشه resource/view  قرار می گیرد. دومین ارگومانی که فرستاده می شود یک ارایه از داده هایی است که برای view  نیاز است.</p>
    <p>Of course, views may also be nested within sub-directories of the <code class=" language-php">resources<span class="token operator">/</span>views</code> directory. For example, if your view is stored at <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>admin<span class="token operator">/</span>profile<span class="token punctuation">.</span>php</code>, it should be returned like so:</p>
    <p dir="rtl">البته   view   ممکن است با پوشه هایی تو در تو شود برای مثال اگر view  در resources/views/admin/profile.php  ذخیره شده باشد بایستی چنین چیزی برگردانده شود.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'admin.profile'</span><span class="token punctuation">,</span> <span class="token variable">$data</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Passing Data To Views</h4>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">// Using conventional approach
</span><span class="token variable">$view</span> <span class="token operator">=</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'greeting'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'name'</span><span class="token punctuation">,</span> <span class="token string">'Victoria'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Using Magic Methods
</span><span class="token variable">$view</span> <span class="token operator">=</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'greeting'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withName<span class="token punctuation">(</span></span><span class="token string">'Victoria'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>In the example above, the variable <code class=" language-php"><span class="token variable">$name</span></code> is made accessible to the view and contains <code class=" language-php">Victoria</code>.</p>
    <p dir="rtl">در مثال بالا  متغییر $name  قابل دسترسی است و دارای مقدار Victoria  است.</p>
    <p>If you wish, you may pass an array of data as the second parameter to the <code class=" language-php">view</code> helper:</p>
    <p dir="rtl">اگر شما بخواهید می توانید یک ارایه از مقادیر به عنوان پارامتر دوم به تابع  view ارسال می کنیم.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$view</span> <span class="token operator">=</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token string">'greetings'</span><span class="token punctuation">,</span> <span class="token variable">$data</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>When passing information in this manner, <code class=" language-php"><span class="token variable">$data</span></code> should be an array with key/value pairs. Inside your view, you can then access each value using it's corresponding key, like <code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$key</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code> (assuming <code class=" language-php"><span class="token variable">$data</span><span class="token punctuation">[</span><span class="token string">'$key'</span><span class="token punctuation">]</span></code> exists).</p>
    <p dir="rtl">وقتی تابع view   فراخوانی  می شودبدون ورودی فراخوانی می شودیک نسخه از قرارداد lluminate\Contracts\View\Factory  برگردانده می <شود class=""></شود></p>
    <p dir="rtl">معمولا  شما فراخوانی به تابع share  را در داخل تابع  boot  service provider  قرار می دهید.شما ازاد هستید تا انها رابه appserviceprovider  اضافه کنید یا یک service provider جداگانه را استفاده کنید.</p>
    <h4>Sharing Data With All Views</h4>
    <p>Occasionally, you may need to share a piece of data with all views that are rendered by your application. You have several options: the <code class=" language-php">view</code> helper, the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>View<span class="token punctuation">\</span>Factory</span></code> <a href="http://laravel.com/docs/5.0/contracts">contract</a>, or a wildcard <a href="http://laravel.com/docs/5.0/views#view-composers">view composer</a>.</p>
    <p dir="rtl">گهگاهی  شما ممکن است نیاز به اشتراک گذاری قطعه ای از اطلاعات را در بین view ها داشته باشید.شما  چندین گزینه ای دارد تابع view  قرار داد Illuminate\Contracts\View\Factory  برای نمونه استفاده از تابع  view   </p>
    <p>For example, using the <code class=" language-php">view</code> helper:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token function">view<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">share<span class="token punctuation">(</span></span><span class="token string">'data'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>You may also use the <code class=" language-php">View</code> facade:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">share<span class="token punctuation">(</span></span><span class="token string">'data'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token number">1</span><span class="token punctuation">,</span> <span class="token number">2</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>Typically, you would place calls to the <code class=" language-php">share</code> method within a service provider's <code class=" language-php">boot</code> method. You are free to add them to the <code class=" language-php">AppServiceProvider</code> or generate a separate service provider to house them.</p>
    معمولا  شما فراخوانی به تابع share  را در داخل تابع  boot  service provider  قرار می دهید.شما ازاد هستید تا انها رابه appserviceprovider  اضافه کنید یا یک service provider جداگانه را استفاده کنید.
    <blockquote>
        <p><strong>Note:</strong> When the <code class=" language-php">view</code> helper is called without arguments, it returns an implementation of the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>View<span class="token punctuation">\</span>Factory</span></code> contract.</p>
        <p dir="rtl">وقتی تابع view   فراخوانی  می شودبدون ورودی فراخوانی می شودیک نسخه از قرارداد lluminate\Contracts\View\Factory  برگردانده می شود.</p>
    </blockquote>
    <h4>Determining If A View Exists</h4>
    <p>If you need to determine if a view exists, you may use the <code class=" language-php">exists</code> method:</p>
    <p dir="rtl">اگر شما نیاز به تعیین کردن در صورتی که view  وجود داشته باشدشما می تونید از تابعexists  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token function">view<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">exists<span class="token punctuation">(</span></span><span class="token string">'emails.customer'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <h4>Returning A View From A File Path</h4>
    <p>If you wish, you may generate a view from a fully-qualified file path:</p>
    <p dir="rtl">اگر شما بخواهید یک view  همرا با مسیر کامل ان را تولید کنید.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">view<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">file<span class="token punctuation">(</span></span><span class="token variable">$pathToFile</span><span class="token punctuation">,</span> <span class="token variable">$data</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="view-composers"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/views#view-composers">View Composers</a></h2>
    <p>View composers are callbacks or class methods that are called when a view is rendered. If you have data that you want to be bound to a view each time that view is rendered, a view composer organizes that logic into a single location.</p>
    <p dir="rtl">سازنده  view   یک callbackیا  یک تابع از کلاس است که وقت ترجمه view   فراخوانی می شود.اگر شما داده هایی دارید که شما می خواهید به view   اختصاص دهید هر بار که view  ترجمه می شود.یک سازنده view  سازماندهی شده است که در یک مکان قرار گیرد.</p>
    <h4>Defining A View Composer</h4>
    <p>Let's organize our view composers within a <a href="http://laravel.com/docs/5.0/providers">service provider</a>. We'll use the <code class=" language-php">View</code> facade to access the underlying <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>View<span class="token punctuation">\</span>Factory</span></code> contract implementation:</p>
    <p dir="rtl">اجازه دهید که سازنده view    را در داخل service provider  سازماندهی کنید.
        ما به خوبی از نما view استفاده خواهیم کرد تا دسترسی پیدا کنیم  به اصول قرار داد اجرایی Illuminate\Contracts\View\Factory
    </p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Providers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">View</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Support<span class="token punctuation">\</span>ServiceProvider</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">ComposerServiceProvider</span> <span class="token keyword">extends</span> <span class="token class-name">ServiceProvider</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Register bindings in the container.
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">boot<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Using class based composers...
</span>        <span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">composer<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token string">'App\Http\ViewComposers\ProfileComposer'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

       <span class="token comment" spellcheck="true"> // Using Closure based composers...
</span>        <span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">composer<span class="token punctuation">(</span></span><span class="token string">'dashboard'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>

        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Register
     *
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">register<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> //
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> Laravel does not include a default directory for view composers. You are free to organize them however you wish. For example, you could create an <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>ViewComposers</span></code> directory.</p>
        <p dir="rtl">لاراول یک پوشه پیش فرض برای سازنده view  ندارد. وشما ازاد هستید هر جا که میخواد سازمان دهی کنید.برای مثال شما می توانید پوشه App\Http\ViewComposersرا ایجاد کنید. </p>
    </blockquote>
    <p>Remember, you will need to add the service provider to the <code class=" language-php">providers</code> array in the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file.</p>
    <p dir="rtl">بخاطر داشته باشید که شما نیاز به اضافه کردن service provider به ارایه provider در config/app.php  دارید.</p>
    <p>Now that we have registered the composer, the <code class=" language-php">ProfileComposer@compose</code> method will be executed each time the <code class=" language-php">profile</code> view is being rendered. So, let's define the composer class:</p>
    <p dir="rtl">حالا که شما سازنده را ثبت کردید تابع ProfileComposer@compose  هر بار که view  profile ترجمه شود اجرا خوهد شد.
        اجازه دهید کلاس سازنده را تعریف کنیم.
    </p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>ViewComposers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>View<span class="token punctuation">\</span>View</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Users<span class="token punctuation">\</span>Repository</span> <span class="token keyword">as</span> UserRepository<span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">ProfileComposer</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * The user repository implementation.
     *
     * @var UserRepository
     */</span>
        <span class="token keyword">protected</span> <span class="token variable">$users</span><span class="token punctuation">;</span>

    <span class="token comment" spellcheck="true">/**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">__construct<span class="token punctuation">(</span></span>UserRepository <span class="token variable">$users</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Dependencies automatically resolved by service container...
</span>        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">users</span> <span class="token operator">=</span> <span class="token variable">$users</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

    <span class="token comment" spellcheck="true">/**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">compose<span class="token punctuation">(</span></span>View <span class="token variable">$view</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$view</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'count'</span><span class="token punctuation">,</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">users</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">count<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <p>Just before the view is rendered, the composer's <code class=" language-php">compose</code> method is called with the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>View<span class="token punctuation">\</span>View</span></code> instance. You may use the <code class=" language-php">with</code> method to bind data to the view.</p>
    <p dir="rtl">فقط قبل از اینکه view  ترجمه شود تابع composeاز composer  فراخوانی می شودبا یک نمونه از Illuminate\Contracts\View\Vie
        بایستی از تابعwith  برای قرار دادن دادها استفاده کنید.
    </p>
    <blockquote>
        <p><strong>Note:</strong> All view composers are resolved via the <a href="http://laravel.com/docs/5.0/container">service container</a>, so you may type-hint any dependencies you need within a composer's constructor.</p>
        <p dir="rtl">همه سازنده های view توسط service container تصمیم گیری می شود بنابراین ممکن است شما هر چیز اضافی ای که شما نیاز دارید را داخل سازنده composer قرار دهید.</p>
    </blockquote>
    <h4>Wildcard View Composers</h4>
    <p>The <code class=" language-php">composer</code> method accepts the <code class=" language-php"><span class="token operator">*</span></code> character as a wildcard, so you may attach a composer to all views like so:</p>
    <p dir="rtl">تابع composer  کارکتر "*" را به عنوان wildcard  می پذیرد بنابراین شما ممکن است سازنده را به همه view  ها اضافه کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">composer<span class="token punctuation">(</span></span><span class="token string">'*'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Attaching A Composer To Multiple Views</h4>
    <p>You may also attach a view composer to multiple views at once:</p>
    <p dir="rtl">شما ممکن است سازنده view  را به  چندین view اضافه کنید .</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">composer<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token string">'dashboard'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'App\Http\ViewComposers\MyViewComposer'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h4>Defining Multiple Composers</h4>
    <p>You may use the <code class=" language-php">composers</code> method to register a group of composers at the same time:</p>
    <p dir="rtl">شما ممکن است از تابع  سازنده برای برای ثبت یک گروه از سازنده ها در یک  زمان استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">composers<span class="token punctuation">(</span></span><span class="token punctuation">[</span>
        <span class="token string">'App\Http\ViewComposers\AdminComposer'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'admin.index'</span><span class="token punctuation">,</span> <span class="token string">'admin.profile'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token string">'App\Http\ViewComposers\UserComposer'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'user'</span><span class="token punctuation">,</span>
        <span class="token string">'App\Http\ViewComposers\ProductComposer'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'product'</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>View Creators</h3>
    <p>View <strong>creators</strong> work almost exactly like view composers; however, they are fired immediately when the view is instantiated. To register a view creator, use the <code class=" language-php">creator</code> method:</p>
    <p dir="rtl">ایجاد کننده view  اکثر مواقع شبیه سازنده view  کار می کند.هرچند که انها به محض معرفی اجرایی می شوند.

        برای ثبت کردن یک ایجاد کننده  view  از تابع creator  استفاده می کنیم.
    </p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">creator<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token string">'App\Http\ViewCreators\ProfileCreator'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop