<!-- -->
@extends('master')

@section('content')
<article>
<h1>Validation</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/validation#basic-usage">Basic Usage</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#controller-validation">Controller Validation</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#form-request-validation">Form Request Validation</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#working-with-error-messages">Working With Error Messages</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#error-messages-and-views">Error Messages &amp; Views</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#available-validation-rules">Available Validation Rules</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#conditionally-adding-rules">Conditionally Adding Rules</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#custom-error-messages">Custom Error Messages</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#custom-validation-rules">Custom Validation Rules</a></li>
</ul>
<p><a name="basic-usage"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#basic-usage">Basic Usage</a></h2>
<p>Laravel ships with a simple, convenient facility for validating data and retrieving validation error messages via the <code class=" language-php">Validation</code> class.</p>
<p dir="rtl">لاراول همراه با خود  فابلیت های راpت وساده ای را برای اعتبار سنجی داده ها و پیام هایی که توسط کلاس VALIDATION نمایش داده می شود.</p>
<h4>Basic Validation Example</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span>
        <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|min:5'</span><span class="token punctuation">]</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The first argument passed to the <code class=" language-php">make</code> method is the data under validation. The second argument is the validation rules that should be applied to the data.</p>
<p dir="rtl">اولین ورودی که به تابع MAKE  فرستاده می شود داده ای است که باید اعتبار ان سنجیده شود دومین ورودی نقش اعتبار سنجی است که باید برای داده به کار گرفته شود</p>
<h4>Using Arrays To Specify Rules</h4>
<p>Multiple rules may be delimited using either a "pipe" character, or as separate elements of an array.</p>
<p dir="rtl">چندین نقش ممکن است تعیین شود با استفاده از کارکتر pipe به عنوان جدا کننده داده  در ارایه</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span>
        <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span><span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span><span class="token string">'required'</span><span class="token punctuation">,</span> <span class="token string">'min:5'</span><span class="token punctuation">]</span><span class="token punctuation">]</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Validating Multiple Fields</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span>
        <span class="token punctuation">[</span>
        <span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Dayle'</span><span class="token punctuation">,</span>
        <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'lamepassword'</span><span class="token punctuation">,</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'email@example.com'</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">[</span>
        <span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required'</span><span class="token punctuation">,</span>
        <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|min:8'</span><span class="token punctuation">,</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|email|unique:users'</span>
        <span class="token punctuation">]</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Once a <code class=" language-php">Validator</code> instance has been created, the <code class=" language-php">fails</code> (or <code class=" language-php">passes</code>) method may be used to perform the validation.</p>
<p dir="rtl">یکبار که یک نمونه از validator  ایجاد شد تابعfailsبرای اعتبار سنجی ممکن است استفاده شود </p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">fails<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The given data did not pass validation
</span><span class="token punctuation">}</span></code></pre>
<p>If validation has failed, you may retrieve the error messages from the validator.</p>
<p dir="rtl">اگر اعتبار سنجی خطایی راتشخیص دهد  شما یک پیام خطا از validator  دریافت می کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$messages</span> <span class="token operator">=</span> <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">messages<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may also access an array of the failed validation rules, without messages. To do so, use the <code class=" language-php">failed</code> method:</p>
<p dir="rtl">شما ممکن است به یک ارایه از نقش هایی که خطا تولید کرده اند دسترسی داشته باشید بدون  	پیامی برای این کار شما بایستی از تابع failed  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$failed</span> <span class="token operator">=</span> <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">failed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Validating Files</h4>
<p>The <code class=" language-php">Validator</code> class provides several rules for validating files, such as <code class=" language-php">size</code>, <code class=" language-php">mimes</code>, and others. When validating files, you may simply pass them into the validator with your other data.</p>
<p dir="rtl">تابع validator  چندین نقش یرای اعتبار سنجی فایل ها از جمله اندازه   و mimes  فراهم می کند .وقتی فایل اعتبار سنجی می شود  شما می توانید ان را به سادگی وهمرا ه باسایر داده ها به تابع validator  ارسال کنید.</p>
<h3>After Validation Hook</h3>
<p>The validator also allows you to attach callbacks to be run after validation is completed. This allows you to easily perform further validation, and even add more error messages to the message collection. To get started, use the <code class=" language-php">after</code> method on a validator instance:</p>
<p dir="rtl">Validator   به شما اجازه می دهد که فراخوانی مجددی را بعد از کامل شدن اعتبار سنجی داشته باشید.این با اسانی به شما اجازه اعتبار سنجی بیشتر را می دهد و اجازه اضافه کردن پیام های خطای بیشتری به مجموع پیام های خطا می دهد. برای شروع     از تابع after  برای یک نمونه از validator  استفاده می کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">after<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$validator</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">somethingElseIsInvalid<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">errors<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">add<span class="token punctuation">(</span></span><span class="token string">'field'</span><span class="token punctuation">,</span> <span class="token string">'Something is wrong with this field!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">fails<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p>You may add as many <code class=" language-php">after</code> callbacks to a validator as needed.</p>
<p dir="rtl">شما متناسب با نیازتان می توانین توابع after  بیشتری را فراخوانی کنید.</p>
<p><a name="controller-validation"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#controller-validation">Controller Validation</a></h2>
<p>Of course, manually creating and checking a <code class=" language-php">Validator</code> instance each time you do validation is a headache. Don't worry, you have other options! The base <code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Controllers<span class="token punctuation">\</span>Controller</span></code> class included with Laravel uses a <code class=" language-php">ValidatesRequests</code> trait. This trait provides a single, convenient method for validating incoming HTTP requests. Here's what it looks like:</p>
<p dir="
">البته  به صورت دستی ایجا یک نمونه validator برای هر اعتبار سنجی   یک کار مشکل است .نگران نباشید شما گزینه های دیگری نیز دارید  کلاس پایه ای 	App\Http\Controllers\Controller که در لاراول قرار دارد  از ویژگی validationrequest  استفاده می کند این ویزگی یک تابع راحت وتنها برای اعتبار سنجی درخواست های ورودی دارد</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Store the incoming blog post.
 *
 * @param  Request  $request
 * @return Response
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">store<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">validate<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'title'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|unique|max:255'</span><span class="token punctuation">,</span>
        <span class="token string">'body'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p>If validation passes, your code will keep executing normally. However, if validation fails, an <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Validation<span class="token punctuation">\</span>ValidationException</span></code> will be thrown. This exception is automatically caught and a redirect is generated to the user's previous location. The validation errors are even automatically flashed to the session!</p>
<p dir="rtl">اگر از اعتبار سنجی عبور کند  اجرای عادی برنامه ادامه پیدا می کند. در حالی که اگر اعتبار سنجی خطا دهد  یک نمونه از Illuminate\Contracts\Validation\ValidationException اجرا خواهد شد. با اتفاق افتادن این خطا به صورت خودکار کاربر به صفحه قبلی هدایت می شود خطاهای اعتبار سنجی نیز به صورت خودکار در session  جدید خواهند شد.</p>
<p>If the incoming request was an AJAX request, no redirect will be generated. Instead, an HTTP response with a 422 status code will be returned to the browser containing a JSON representation of the validation errors.</p>
<p dir="rtl">اگر درخواست ورودی یک درخواست ajaxباشد مسیردهی اتفاق نخواهد افتاد . در عوض یک پاسخ http  با کد 422به مرورگر که شامل نماش json برای خطاهای اعتبار سنجی است.</p>
<p>For example, here is the equivalent code written manually:</p>
<p dir="rtl">برای مثال کد زیر معادل کدی که به صورت دستی نوشته شد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Store the incoming blog post.
 *
 * @param  Request  $request
 * @return Response
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">store<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$v</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'title'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|unique|max:255'</span><span class="token punctuation">,</span>
        <span class="token string">'body'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$v</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">fails<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">back<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withErrors<span class="token punctuation">(</span></span><span class="token variable">$v</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">errors<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h3>Customizing The Flashed Error Format</h3>
<p>If you wish to customize the format of the validation errors that are flashed to the session when validation fails, override the <code class=" language-php">formatValidationErrors</code> on your base controller. Don't forget to import the <code class=" language-php">Illuminate\<span class="token package">Validation<span class="token punctuation">\</span>Validator</span></code> class at the top of the file:</p>
<p dir="rtl">اگر شما بخواهید شخصی سازی کنید قالب خطایی که داده های درون session درهنگام خطا تازه می کند شما بایستی  تابع formatValidationErrors را د رکنترلر اصلی قرار دارد را با زنویسی کنید از اضافه کردن فایل Illuminate\Validation\Validator  در ابتدا فایل فراموش نکنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * {@inheritdoc}
 */</span>
        <span class="token keyword">protected</span> <span class="token keyword">function</span> <span class="token function">formatValidationErrors<span class="token punctuation">(</span></span>Validator <span class="token variable">$validator</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">errors<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="form-request-validation"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#form-request-validation">Form Request Validation</a></h2>
<p>For more complex validation scenarios, you may wish to create a "form request". Form requests are custom request classes that contain validation logic. To create a form request class, use the <code class=" language-php">make<span class="token punctuation">:</span>request</code> Artisan CLI command:</p>
<p dir="rtl">برای سناریو های اعتبار سنجی خیلی پیشرفته  شما ممکن است بخواهید form request  ایجاد کنید.با form request شما کلاس erquestکه شامل منطق اعتبار سنجی است راتغییر می دهید.برای تولید فرمrequest   از فرمان زیراستفاده می کنید.</p>
<pre class=" language-php"><code class=" language-php">php artisan make<span class="token punctuation">:</span>request StoreBlogPostRequest</code></pre>
<p>The generated class will be placed in the <code class=" language-php">app<span class="token operator">/</span>Http<span class="token operator">/</span>Requests</code> directory. Let's add a few validation rules to the <code class=" language-php">rules</code> method:</p>
<p dir="rtl">کلاس تولید شده در پوشه app/Http/Requests  قرار می گیرد اجازه دهید تعدادی از نقش های اعتیار سنجی به تابع rule  اضافه کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">rules<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token punctuation">[</span>
        <span class="token string">'title'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|unique|max:255'</span><span class="token punctuation">,</span>
        <span class="token string">'body'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>So, how are the validation rules executed? All you need to do is type-hint the request on your controller method:</p>
<p dir="rtl">نقش های اعتبار سنجی چگونه اجرا می شوند؟هر انچه کهشما برای اجرا نیازدارید در تابع کنترلر قرار دارد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Store the incoming blog post.
 *
 * @param  StoreBlogPostRequest  $request
 * @return Response
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">store<span class="token punctuation">(</span></span>StoreBlogPostRequest <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The incoming request is valid...
</span><span class="token punctuation">}</span></code></pre>
<p>The incoming form request is validated before the controller method is called, meaning you do not need to clutter your controller with any validation logic. It has already been validated!</p>
<p dir="rtl">فرم درخواستی اعتبار سنجی می شود قبل از اینکه توابع کنترلر فراخوانی شود  بنابراین کنترلر های شما هیچ منطق اضافی برای اعتبار سنجی نیاز ندارند. درخواست ها قبلا اعتبار سنجی شده اند.</p>
<p>If validation fails, a redirect response will be generated to send the user back to their previous location. The errors will also be flashed to the session so they are available for display. If the request was an AJAX request, a HTTP response with a 422 status code will be returned to the user including a JSON representation of the validation errors.</p>
<p dir="rtl">اگر در اعتبار سنجی خطایی رخ دهد شما به صفحه قبلی خود ارجاع داده خواهید شد  خطا ها در session  قرار می گیرد و اماده نمایش دادن هستند.اگر درخواست از نوع ajax  باشد یک پاسخ با کد 422 حالته به کاربری که نمایش jsin برای نمایش خطا دارد.</p>
<h3>Authorizing Form Requests</h3>
<p>The form request class also contains an <code class=" language-php">authorize</code> method. Within this method, you may check if the authenticated user actually has the authority to update a given resource. For example, if a user is attempting to update a blog post comment, do they actually own that comment? For example:</p>
<p dir="rtl">کلاس  فرم درخواستی شامل یک تابع authorize  می شود  درون این تابع شما بررسی کنید که ایا کاربر واقعا تایید شده است  تا برای دراختیار گرفتن منابع  ان را به روز رسانی کنید  برای نمونه اگر یک کاربر در تلاش باشد یک کامنت که به پست او داده شد ه  باید بررسی شود که ایا او واقعا صاحب ان کامنت هست  برای نمونه</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Determine if the user is authorized to make this request.
 *
 * @return bool
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">authorize<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$commentId</span> <span class="token operator">=</span> <span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">route<span class="token punctuation">(</span></span><span class="token string">'comment'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">return</span> <span class="token scope">Comment<span class="token punctuation">::</span></span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'id'</span><span class="token punctuation">,</span> <span class="token variable">$commentId</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">where<span class="token punctuation">(</span></span><span class="token string">'user_id'</span><span class="token punctuation">,</span> <span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">id<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">exists<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>Note the call to the <code class=" language-php">route</code> method in the example above. This method grants you access to the URI parameters defined on the route being called, such as the <code class=" language-php"><span class="token punctuation">{</span>comment<span class="token punctuation">}</span></code> parameter in the example below:</p>
<p dir="rtl">فراخوانی تابع route درمثال بالا را به یاد داشته باشید . این تابع به شما اجازه دسترسی به مقدار ارسالی با url را می دهد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">post<span class="token punctuation">(</span></span><span class="token string">'comment/{comment}'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>If the <code class=" language-php">authorize</code> method returns <code class=" language-php"><span class="token boolean">false</span></code>, a HTTP response with a 403 status code will automatically be returned and your controller method will not execute.</p>
<p dir="rtl">اگر تابع authorize  مقدار false  را برگشت دهد یک پاسخ با کد حالت 403 به صورت خودکار  برگشت داده می شود  وتابع کنترلر اجرا نخواهد شد.
    اگر شما تمایل دارید که منطق تایید هویت را در جای دیگری از برنامه اجرا کنید   به راحتی می توانید مقدار true  را از این تابع برگردانید.
</p>
<p>If you plan to have authorization logic in another part of your application, simply return <code class=" language-php"><span class="token boolean">true</span></code> from the <code class=" language-php">authorize</code> method:</p>

<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * Determine if the user is authorized to make this request.
 *
 * @return bool
 */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">authorize<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token boolean">true</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<h3>Customizing The Flashed Error Format</h3>
<p>If you wish to customize the format of the validation errors that are flashed to the session when validation fails, override the <code class=" language-php">formatErrors</code> on your base request (<code class=" language-php">App\<span class="token package">Http<span class="token punctuation">\</span>Requests<span class="token punctuation">\</span>Request</span></code>). Don't forget to import the <code class=" language-php">Illuminate\<span class="token package">Validation<span class="token punctuation">\</span>Validator</span></code> class at the top of the file:</p>
<p dir="rtl">اگر شما تمایل دارید قالب خطا ی اعتبار سنجی که در  session  ها هنگامی که اعتبار سنجی خطایی راتشخیص می دهد تابع formatValidationErrors  در کلاس request  پایه که درApp\Http\Requests\Request  قرار دارد را بازنویسی کنید.از قرار دادن کلاس Illuminate\Validation\Validator  دربالای فایل فراموش نکنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">/**
 * {@inheritdoc}
 */</span>
        <span class="token keyword">protected</span> <span class="token keyword">function</span> <span class="token function">formatErrors<span class="token punctuation">(</span></span>Validator <span class="token variable">$validator</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">errors<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p><a name="working-with-error-messages"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#working-with-error-messages">Working With Error Messages</a></h2>
<p>After calling the <code class=" language-php">messages</code> method on a <code class=" language-php">Validator</code> instance, you will receive a <code class=" language-php">MessageBag</code> instance, which has a variety of convenient methods for working with error messages.</p>
<p dir="rtl">بعداز فراخوانی تابع message  بر روی یک نمونه از validator  یک نمونه از messageBag  را دریافت خواهید کرد.</p>
<h4>Retrieving The First Error Message For A Field</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token variable">$messages</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Retrieving All Error Messages For A Field</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$messages</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span> <span class="token keyword">as</span> <span class="token variable">$message</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Retrieving All Error Messages For All Fields</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$messages</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token keyword">as</span> <span class="token variable">$message</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Determining If Messages Exist For A Field</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$messages</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">has<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Retrieving An Error Message With A Format</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">echo</span> <span class="token variable">$messages</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">,</span> '<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span></span><span class="token punctuation">:</span>message<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></span>'<span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> By default, messages are formatted using Bootstrap compatible syntax.</p>
    <p dir="rtl">به صورت پیش فرض  پیام ها بوسیله نماش سازگار bootstrap  شکل دهی می شوند.</p>
</blockquote>
<h4>Retrieving All Error Messages With A Format</h4>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">foreach</span> <span class="token punctuation">(</span><span class="token variable">$messages</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">all<span class="token punctuation">(</span></span>'<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>li</span><span class="token punctuation">&gt;</span></span></span><span class="token punctuation">:</span>message<span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>li</span><span class="token punctuation">&gt;</span></span></span>'<span class="token punctuation">)</span> <span class="token keyword">as</span> <span class="token variable">$message</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<p><a name="error-messages-and-views"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#error-messages-and-views">Error Messages &amp; Views</a></h2>
<p>Once you have performed validation, you will need an easy way to get the error messages back to your views. This is conveniently handled by Laravel. Consider the following routes as an example:</p>
<p dir="rtl">یک بار که اعتبار سنجی اجرا شود شما ممکن است به یک روش ساده تر برای برگرداندن پیغام های خطا به view
    به راحتی این کار توسط لاراول راه اندازی می شود مسیرهای زیر را به عنوان نمونه درنظر بگیرید.
</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'register'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">View<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token string">'user.register'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">post<span class="token punctuation">(</span></span><span class="token string">'register'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$rules</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token scope">Input<span class="token punctuation">::</span></span><span class="token function">all<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token variable">$rules</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">fails<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'register'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withErrors<span class="token punctuation">(</span></span><span class="token variable">$validator</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Note that when validation fails, we pass the <code class=" language-php">Validator</code> instance to the Redirect using the <code class=" language-php">withErrors</code> method. This method will flash the error messages to the session so that they are available on the next request.</p>
<p dir="rtl">بیا داشته باشید وقتی در هنگام اعتبار سنجی مشکلی تشخیص داده می شود یک نمونه از validator  را همراه با تابع  withErrors ارسال می کنیم.این تابع پیغم های خطا را د رsession بازنویسی می کند  بنابراین انها در درخواست بعدی در دسترس خواهند بود .</p>
<p>However, notice that we do not have to explicitly bind the error messages to the view in our GET route. This is because Laravel will always check for errors in the session data, and automatically bind them to the view if they are available. <strong>So, it is important to note that an <code class=" language-php"><span class="token variable">$errors</span></code> variable will always be available in all of your views, on every request</strong>, allowing you to conveniently assume the <code class=" language-php"><span class="token variable">$errors</span></code> variable is always defined and can be safely used. The <code class=" language-php"><span class="token variable">$errors</span></code> variable will be an instance of <code class=" language-php">MessageBag</code>.</p>
<p dir="rtl">هر چند بیاد داشته باشید که ما مجبور نیستیم پیغام ها را به طور واضح به view  ها در  مدل ارسال  get  اختصاص دهیم.
    به این دلیل است که خود لاراول به صورت اتوماتیک پیغام هی خطا در session   ها را چک می کند
</p>
<p>So, after redirection, you may utilize the automatically bound <code class=" language-php"><span class="token variable">$errors</span></code> variable in your view:</p>
<p dir="rtl">بنابراین این خیلی مهم است که بیاد داشته باشید که متغییر $errors برای هر درخواستی در  view  ها قرار دارد.و به راحتی می توانید  متغییر $errors  رافرض کنید  و به راحتی از ان استفاده کنید  متغییر $errors  یک نمونه از messageBag  است.

    بنابراین بعد از مسیر دهی شما به صورت خودکار می توانید از متغییر $errors  در view  ها بهره ببرید .
</p>
<pre class=" language-php"><code class=" language-php"><span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$errors</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span></code></pre>
<h3>Named Error Bags</h3>
<p>If you have multiple forms on a single page, you may wish to name the <code class=" language-php">MessageBag</code> of errors. This will allow you to retrieve the error messages for a specific form. Simply pass a name as the second argument to <code class=" language-php">withErrors</code>:</p>
<p dir="rtl">اگر چندین فرم دریک صفحه داشته باشید شما ممکن است بخواهید نامی برای messagebag خطاها در نظر بگیرید. این به شما اجازهدریافت خطاها برای فرم خاصی را می دهد شما به سادگی می توانید نام را به عنوان ارگومان دوم به تابه witherrors  ارسال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'register'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withErrors<span class="token punctuation">(</span></span><span class="token variable">$validator</span><span class="token punctuation">,</span> <span class="token string">'login'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>You may then access the named <code class=" language-php">MessageBag</code> instance from the <code class=" language-php"><span class="token variable">$errors</span></code> variable:</p>
<p dir="rtl">شما ممکن است به نام یک نمونه از messagebag  ازطریق متغییر $errors  دسترسی داشته باشید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">echo</span> <span class="token variable">$errors</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">login</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">first<span class="token punctuation">(</span></span><span class="token string">'email'</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span></code></pre>
<p><a name="available-validation-rules"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#available-validation-rules">Available Validation Rules</a></h2>
<p>Below is a list of all available validation rules and their function:</p>
<p dir="rtl">در زیر نقش های اعتبار سنجی وعملکرد انها ذکر شده است</p>
<ul>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-accepted">Accepted</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-active-url">Active URL</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-after">After (Date)</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-alpha">Alpha</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-alpha-dash">Alpha Dash</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-alpha-num">Alpha Numeric</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-array">Array</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-before">Before (Date)</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-between">Between</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-boolean">Boolean</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-confirmed">Confirmed</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-date">Date</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-date-format">Date Format</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-different">Different</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-digits">Digits</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-digits-between">Digits Between</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-email">E-Mail</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-exists">Exists (Database)</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-image">Image (File)</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-in">In</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-integer">Integer</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-ip">IP Address</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-max">Max</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-mimes">MIME Types</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-min">Min</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-not-in">Not In</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-numeric">Numeric</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-regex">Regular Expression</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-required">Required</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-required-if">Required If</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-required-with">Required With</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-required-with-all">Required With All</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-required-without">Required Without</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-required-without-all">Required Without All</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-same">Same</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-size">Size</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-string">String</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-timezone">Timezone</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-unique">Unique (Database)</a></li>
    <li><a href="http://laravel.com/docs/5.0/validation#rule-url">URL</a></li>
</ul>
<p><a name="rule-accepted"></a></p>
<h4>accepted</h4>
<p>The field under validation must be <em>yes</em>, <em>on</em>, <em>1</em>, or <em>true</em>. This is useful for validating "Terms of Service" acceptance.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی مقدار yes یا on یا 1  داشته باشد  این نقش برای بررسی قوانین توسط کاربر مفید است.</p>
<p><a name="rule-active-url"></a></p>
<h4>active_url</h4>
<p>The field under validation must be a valid URL according to the <code class=" language-php">checkdnsrr</code> PHP function.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی یک url  صحیح بر اساس تابع checkdnsrr  باشد </p>
<p><a name="rule-after"></a></p>
<h4>after:<em>date</em></h4>
<p>The field under validation must be a value after a given date. The dates will be passed into the PHP <code class=" language-php">strtotime</code> function.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی  مقداری باشد بعد از یک نوع داده زمان از کاربر گرفته می شود.</p>
<p><a name="rule-alpha"></a></p>
<h4>alpha</h4>
<p>The field under validation must be entirely alphabetic characters.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی از نوع کارکتری باشد.</p>
<p><a name="rule-alpha-dash"></a></p>
<h4>alpha_dash</h4>
<p>The field under validation may have alpha-numeric characters, as well as dashes and underscores.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود می تواند کارکتری عددی   خط یا زیر خط باشد.</p>
<p><a name="rule-alpha-num"></a></p>
<h4>alpha_num</h4>
<p>The field under validation must be entirely alpha-numeric characters.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی کارکتری یا عددی باشد.</p>
<p><a name="rule-array"></a></p>
<h4>array</h4>
<p>The field under validation must be of type array.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی از نوع ارایه باشد.</p>
<p><a name="rule-before"></a></p>
<h4>before:<em>date</em></h4>
<p>The field under validation must be a value preceding the given date. The dates will be passed into the PHP <code class=" language-php">strtotime</code> function.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی مقداری باشد که که قبل از نوع داده زمان گرفته می شود زمان با استفاده از تابع strtotime  استفاده می کنیم.</p>
<p><a name="rule-between"></a></p>
<h4>between:<em>min</em>,<em>max</em></h4>
<p>The field under validation must have a size between the given <em>min</em> and <em>max</em>. Strings, numerics, and files are evaluated in the same fashion as the <code class=" language-php">size</code> rule.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی مقداری بین حداقا و حداکثر باشد  رشته عدد و فایل   به یک شکل  بر اساس اندازه ارزیابی می شوند.</p>
<p><a name="rule-boolean"></a></p>
<h4>boolean</h4>
<p>The field under validation must be able to be cast as a boolean. Accepted input are <code class=" language-php"><span class="token boolean">true</span></code>, <code class=" language-php"><span class="token boolean">false</span></code>, <code class=" language-php"><span class="token number">1</span></code>, <code class=" language-php"><span class="token number">0</span></code>, <code class=" language-php"><span class="token string">"1"</span></code> and <code class=" language-php"><span class="token string">"0"</span></code>.</p>
<p dir="rtl"> فیلدی که اعتبار سنجی می شود بایستی قادر به تبدیل شدن به نوع داده bolean  باشد.ورودی true  false  و 0 1     می پذیرد.</p>
<p><a name="rule-confirmed"></a></p>
<h4>confirmed</h4>
<p>The field under validation must have a matching field of <code class=" language-php">foo_confirmation</code>. For example, if the field under validation is <code class=" language-php">password</code>, a matching <code class=" language-php">password_confirmation</code> field must be present in the input.</p>
<p dir="rtl"> فیلدی که اعتبار سنجی می شود بایستی با فیلد foo_confirmation برابر باشد.</p>
<p><a name="rule-date"></a></p>
<h4>date</h4>
<p>The field under validation must be a valid date according to the <code class=" language-php">strtotime</code> PHP function.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی مقدار صحیح بر اساس تابع strtotime داشته باشد.</p>
<p><a name="rule-date-format"></a></p>
<h4>date_format:<em>format</em></h4>
<p>The field under validation must match the <em>format</em> defined according to the <code class=" language-php">date_parse_from_format</code> PHP function.</p>
<p dir="rtl">فیلدی که اعتبارسنجی می شود بایستی شکل ضاهذی اش با شکلی تابع data_parse_from_format   برابر باشد.</p>
<p><a name="rule-different"></a></p>
<h4>different:<em>field</em></h4>
<p>The given <em>field</em> must be different than the field under validation.</p>
<p dir="rtl">فیلد که گرفته شده بایستی با فیلدی که اعتبار سنجی می شود متفاوت باشد</p>
<p><a name="rule-digits"></a></p>
<h4>digits:<em>value</em></h4>
<p>The field under validation must be <em>numeric</em> and must have an exact length of <em>value</em>.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی عددی باشد و اندازه طولش با value برابر باشد.</p>
<p><a name="rule-digits-between"></a></p>
<h4>digits_between:<em>min</em>,<em>max</em></h4>
<p>The field under validation must have a length between the given <em>min</em> and <em>max</em>.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی طولش بین حداقل و حداکثز باشد</p>
<p><a name="rule-email"></a></p>
<h4>email</h4>
<p>The field under validation must be formatted as an e-mail address.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی شکل ادرس ایمیل را داشته باشد</p>
<p><a name="rule-exists"></a></p>
<h4>exists:<em>table</em>,<em>column</em></h4>
<p>The field under validation must exist on a given database table.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی مقداری برابر با ان در جدول پایگاه داده وجود داشته باشد.</p>
<h4>Basic Usage Of Exists Rule</h4>
<pre class=" language-php"><code class=" language-php"><span class="token string">'state'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'exists:states'</span></code></pre>
<h4>Specifying A Custom Column Name</h4>
<pre class=" language-php"><code class=" language-php"><span class="token string">'state'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'exists:states,abbreviation'</span></code></pre>
<p>You may also specify more conditions that will be added as "where" clauses to the query:</p>
<p dir="rtl">شما می توانید شرط های بیشتری را که با عبارت where  به پرس وجو افزوده می شود افزود</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'exists:staff,email,account_id,1'</span></code></pre>
<p>Passing <code class=" language-php"><span class="token keyword">NULL</span></code> as a "where" clause value will add a check for a <code class=" language-php"><span class="token keyword">NULL</span></code> database value:</p>
<p dir="rtl">با ارسال NULL  به where  شما می توانید برای بررسی NULL  بودن برررسی کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'exists:staff,email,deleted_at,NULL'</span></code></pre>
<p><a name="rule-image"></a></p>
<h4>image</h4>
<p>The file under validation must be an image (jpeg, png, bmp, gif, or svg)</p>
<p dir="rtl">فایلی  که اعتبار سنجی می شود بایستی تصویری با یکی  از فرمت های  jpeg png bmp gif svg	</p>
<p><a name="rule-in"></a></p>
<h4>in:<em>foo</em>,<em>bar</em>,...</h4>
<p>The field under validation must be included in the given list of values.</p>
<p dir="rtl">فایلی که اعتبار سنجی می شود بایستی شامل یکی از در لیست قرار گرفته باشد.</p>
<p><a name="rule-integer"></a></p>
<h4>integer</h4>
<p>The field under validation must have an integer value.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی از نوع integer  باشد.</p>
<p><a name="rule-ip"></a></p>
<h4>ip</h4>
<p>The field under validation must be formatted as an IP address.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی به شکل ادرس های ip باسد.</p>
<p><a name="rule-max"></a></p>
<h4>max:<em>value</em></h4>
<p>The field under validation must be less than or equal to a maximum <em>value</em>. Strings, numerics, and files are evaluated in the same fashion as the <a href="http://laravel.com/docs/5.0/validation#rule-size"><code class=" language-php">size</code></a> rule.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی کمتر یا مساوی مقدار value باشد.رشته عدد فایل به  روش مشابهی با استفاده از اندازه  انها ارزیابی می شوند .</p>
<p><a name="rule-mimes"></a></p>
<h4>mimes:<em>foo</em>,<em>bar</em>,...</h4>
<p>The file under validation must have a MIME type corresponding to one of the listed extensions.</p>
<p dir="rtl">فیلد یکه اعتبار سنجی می شود بایستی نوع داده ان شامل یکی از نوع داده های درون لیست باشد.</p>
<h4>Basic Usage Of MIME Rule</h4>
<pre class=" language-php"><code class=" language-php"><span class="token string">'photo'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'mimes:jpeg,bmp,png'</span></code></pre>
<p><a name="rule-min"></a></p>
<h4>min:<em>value</em></h4>
<p>The field under validation must have a minimum <em>value</em>. Strings, numerics, and files are evaluated in the same fashion as the <a href="http://laravel.com/docs/5.0/validation#rule-size"><code class=" language-php">size</code></a> rule.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی حداقل مقدارش برابر با value باشد رشته فایل عددمتناسب با اندازه شان  ارزیابی می شوند </p>
<p><a name="rule-not-in"></a></p>
<h4>not_in:<em>foo</em>,<em>bar</em>,...</h4>
<p>The field under validation must not be included in the given list of values.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی شامل نوع داده های ذکر شده نباشد.</p>
<p><a name="rule-numeric"></a></p>
<h4>numeric</h4>
<p>The field under validation must have a numeric value.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی از نوع عددی باشد.</p>
<p><a name="rule-regex"></a></p>
<h4>regex:<em>pattern</em></h4>
<p>The field under validation must match the given regular expression.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی با  عبارت منظم مطابقت داشته باشد.</p>
<p><strong>Note:</strong> When using the <code class=" language-php">regex</code> pattern, it may be necessary to specify rules in an array instead of using pipe delimiters, especially if the regular expression contains a pipe character.</p>
<p dir="rtl">وقتی از الگوی regex  استفاده می کنید  این لازم است که که نقش ها داخل ارایه تعیین شود  بجای استفاده از جدا کننده pipe  بخصوص اگر عبارت منظم شامل pipe باشد </p>
<p><a name="rule-required"></a></p>
<h4>required</h4>
<p>The field under validation must be present in the input data.</p>
<p dir="rtl">این فیلد بایستی در داده های  ورودی وجود داشته باشد.</p>
<p><a name="rule-required-if"></a></p>
<h4>required_if:<em>field</em>,<em>value</em>,...</h4>
<p>The field under validation must be present if the <em>field</em> field is equal to any <em>value</em>.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود اگر مقدارfield  با یکی از  value ها برابر باشد.</p>
<p><a name="rule-required-with"></a></p>
<h4>required_with:<em>foo</em>,<em>bar</em>,...</h4>
<p>The field under validation must be present <em>only if</em> any of the other specified fields are present.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی حضور داشته باشد تنها اگر یکی از فیلد ها حضور داشته باشد.</p>
<p><a name="rule-required-with-all"></a></p>
<h4>required_with_all:<em>foo</em>,<em>bar</em>,...</h4>
<p>The field under validation must be present <em>only if</em> all of the other specified fields are present.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی حضور داشته باشد اگر همه فیلدهای دیگر حضور داشته باشند.</p>
<p><a name="rule-required-without"></a></p>
<h4>required_without:<em>foo</em>,<em>bar</em>,...</h4>
<p>The field under validation must be present <em>only when</em> any of the other specified fields are not present.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی وجود داشنه باشد اگر که یکی از فیلدهای دیگر حضور نداشته باشد.</p>
<p><a name="rule-required-without-all"></a></p>
<h4>required_without_all:<em>foo</em>,<em>bar</em>,...</h4>
<p>The field under validation must be present <em>only when</em> all of the other specified fields are not present.</p>
<p dir="rtl">فیلدی که اعتباز سنجی می شود بایستی حضور داشته باشد درصورتی که سایر فیلدها حضور نداشته باشند.</p>
<p><a name="rule-same"></a></p>
<h4>same:<em>field</em></h4>
<p>The given <em>field</em> must match the field under validation.</p>
<p dir="rtl"<>مقداری که گرفته شده با مقداری که اعتبار سنجی می شود بایستی با هم مطابقت داشته باشند.</p>
<p><a name="rule-size"></a></p>
<h4>size:<em>value</em></h4>
<p>The field under validation must have a size matching the given <em>value</em>. For string data, <em>value</em> corresponds to the number of characters. For numeric data, <em>value</em> corresponds to a given integer value. For files, <em>size</em> corresponds to the file size in kilobytes.</p>
<p dir="rtl">
    فیلدی که اعتبار سنجی می شود بایستی مقداری برابر با مقدار گرفته شده داشته باشد برای داده های رشته مقدار برابر طول رشته است  برای داده های عددی مقدار برابر داده ان عدد می باشد برای فایل ها برابر  حجم فایل بر حسب کیلو بایت است.
</p>
<p><a name="rule-string"></a></p>
<h4>string:<em>value</em></h4>
<p>The field under validation must be a string type.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی از یک نوع زشته باشد.</p>
<p><a name="rule-timezone"></a></p>
<h4>timezone</h4>
<p>The field under validation must be a valid timezone identifier according to the <code class=" language-php">timezone_identifiers_list</code> PHP function.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی یک زمان درست براساس تابع timezone_identifiers_zone  داشته باشد.</p>
<p><a name="rule-unique"></a></p>
<h4>unique:<em>table</em>,<em>column</em>,<em>except</em>,<em>idColumn</em></h4>
<p>The field under validation must be unique on a given database table. If the <code class=" language-php">column</code> option is not specified, the field name will be used.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی  بایستی یک مقدار منحصر به فرد در جدول پایگاه داده داشته باشد اگر شتون خاصی تعیین نشود از نام فیلد به این منظور استفاده می شود.</p>
<p>Occasionally, you may need to set a custom connection for database queries made by the Validator. As seen above, setting <code class=" language-php">unique<span class="token punctuation">:</span>users</code> as a validation rule will use the default database connection to query the database. To override this, do the following:</p>
<p dir="rtl">بعضی مواقع شما ممکن است نیاز داشته باشید تنظیم کنید اتصال دلخواهی را برای پرس وجو های پایگاه داده که بایستی اعتبار سنجی شوند همان طور که در بالا می بینید تنظیمات unique:users  برای اعتبار سنجی به عنوان اتصال پیش قزض برای پرس وجو های پایگاه داده در نظر گرفته می شود.اگز قصد بازنویسی دارید به صورت زیر عمل کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$verifier</span> <span class="token operator">=</span> <span class="token scope">App<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token string">'validation.presence'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$verifier</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">setConnection<span class="token punctuation">(</span></span><span class="token string">'connectionName'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token variable">$input</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'name'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required'</span><span class="token punctuation">,</span>
        <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|min:8'</span><span class="token punctuation">,</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|email|unique:users'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$validator</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">setPresenceVerifier<span class="token punctuation">(</span></span><span class="token variable">$verifier</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Basic Usage Of Unique Rule</h4>
<pre class=" language-php"><code class=" language-php"><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'unique:users'</span></code></pre>
<h4>Specifying A Custom Column Name</h4>
<pre class=" language-php"><code class=" language-php"><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'unique:users,email_address'</span></code></pre>
<h4>Forcing A Unique Rule To Ignore A Given ID</h4>
<pre class=" language-php"><code class=" language-php"><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'unique:users,email_address,10'</span></code></pre>
<h4>Adding Additional Where Clauses</h4>
<p>You may also specify more conditions that will be added as "where" clauses to the query:</p>
<p dir="rtl">شما ممکن است شرط هایی که با where  تعیین می شوند را تعیین کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'unique:users,email_address,NULL,id,account_id,1'</span></code></pre>
<p>In the rule above, only rows with an <code class=" language-php">account_id</code> of <code class=" language-php"><span class="token number">1</span></code> would be included in the unique check.</p>
<p dir="rtl">در نقش بالا تنها سطری که id  ان برابر مقدار1  باشد در بررسی منحصر به فرد بودن بررسی خواهد شد</p>
<p><a name="rule-url"></a></p>
<h4>url</h4>
<p>The field under validation must be formatted as an URL.</p>
<p dir="rtl">فیلدی که اعتبار سنجی می شود بایستی شکل url  را داشته باشد.</p>
<blockquote>
    <p><strong>Note:</strong> This function uses PHP's <code class=" language-php">filter_var</code> method.</p>
    <p dir="rtl">برای انجام این کار از تابع filter_var  استفاده می کنیم.</p>
</blockquote>
<p><a name="conditionally-adding-rules"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#conditionally-adding-rules">Conditionally Adding Rules</a></h2>
<p>In some situations, you may wish to run validation checks against a field <strong>only</strong> if that field is present in the input array. To quickly accomplish this, add the <code class=" language-php">sometimes</code> rule to your rule list:</p>
<p dir="rtl">در بعضی از مواقع شما ممکن است بخواهید که اعتبار سنجی را اجرا کنید در صورتی که ان فیلد وجود داشته باشد برای این کار از نقش sometimes  استفاده خواهیم کرد.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$v</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token variable">$data</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'sometimes|required|email'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>In the example above, the <code class=" language-php">email</code> field will only be validated if it is present in the <code class=" language-php"><span class="token variable">$data</span></code> array.</p>
<p dir="rtl">در مثال بالا  فیلد ایمیل  در صورتی اعتبا رسنجی می شود که در ارایه$data  قرار داشته باشد.</p>
<h4>Complex Conditional Validation</h4>
<p>Sometimes you may wish to require a given field only if another field has a greater value than 100. Or you may need two fields to have a given value only when another field is present. Adding these validation rules doesn't have to be a pain. First, create a <code class=" language-php">Validator</code> instance with your <em>static rules</em> that never change:</p>
<p dir="rtl">بعضی مواقع ممکن است شما بخواهید اعتبار سنجی کنید در صورتی که  بقیه فیلد ها مقداری بالاتر از 100 را  داشته باشند.یا ممکن است شما دو فیلد داشته باشید  که مقدار بگیرند درصورتی که یکی دیگر هم مقدار داشته باشد . اضافه کردن این نقش های اعتبار سنجی هیچ سختی ندارد . ابتدا یک نمونه از validator ایجاد می کنیم بانقش هایی ثابت که هیچ گاه نغییر نمی کنند.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$v</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token variable">$data</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|email'</span><span class="token punctuation">,</span>
        <span class="token string">'games'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'required|numeric'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Let's assume our web application is for game collectors. If a game collector registers with our application and they own more than 100 games, we want them to explain why they own so many games. For example, perhaps they run a game re-sell shop, or maybe they just enjoy collecting. To conditionally add this requirement, we can use the <code class=" language-php">sometimes</code> method on the <code class=" language-php">Validator</code> instance.</p>
<p dir="rtl">اجازه دهید فرض کنیم یک برنامه اینترنتی برای جمع اوری بازی داریم.اگر یک جمع کننده بازی با برنامه اش ثبت کند وانها بیشتر از 100 برنامه ثبت کرده باشد ما می خواهیم از انها که چرا بازی هی زیادی جمع کرده اند . برای مثال شاید انها اجرا می کنند یک بازی فروشگاه را برای خرید مجدد  یا ممکن است انها  فقط از جمع اوری لذت می برند .برای اضافه کردن شرط به این به این نیاز ها می توانیم از تابع sometimes برای یک نمونه از validator  استفاده کنیم.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$v</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">sometimes<span class="token punctuation">(</span></span><span class="token string">'reason'</span><span class="token punctuation">,</span> <span class="token string">'required|max:500'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$input</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$input</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">games</span> <span class="token operator">&gt;=</span> <span class="token number">100</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The first argument passed to the <code class=" language-php">sometimes</code> method is the name of the field we are conditionally validating. The second argument is the rules we want to add. If the <code class=" language-php">Closure</code> passed as the third argument returns <code class=" language-php"><span class="token boolean">true</span></code>, the rules will be added. This method makes it a breeze to build complex conditional validations. You may even add conditional validations for several fields at once:</p>
<p dir="rtl">اولین فیلدی که به تابع sometimes  ارسال می شود  نام فیلدی است که بایستی به صورت شرطی اعتبار سنجی شود  دومین ارگومان نقشی است که ما می خواهیم به ان اضافه کنیم اگر عبارتی که به عنوان ارگومان سوم استفاده می شود مقدار true برگرداند ان نقش افزوده خواهد شد.این تابع ساختن اعتبارسنجی پیچیده را خیلی ساده می کند  . شما ممکن است شرط های اعتبار سنجی را برای چندین فیلد در یک زمان اضافه کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$v</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">sometimes<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'reason'</span><span class="token punctuation">,</span> <span class="token string">'cost'</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token string">'required'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$input</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$input</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">games</span> <span class="token operator">&gt;=</span> <span class="token number">100</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> The <code class=" language-php"><span class="token variable">$input</span></code> parameter passed to your <code class=" language-php">Closure</code> will be an instance of <code class=" language-php">Illuminate\<span class="token package">Support<span class="token punctuation">\</span>Fluent</span></code> and may be used as an object to access your input and files.</p>
    <p dir="rtl">ورودی $input  یه این عبارت به عنوان از Illuminate\Support\Fluent  ارسال می شود  و می تواند به عنوان یک شی که به ورودی ها وفایل ها دسترسی دارد استفاده شود .</p>
</blockquote>
<p><a name="custom-error-messages"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#custom-error-messages">Custom Error Messages</a></h2>
<p>If needed, you may use custom error messages for validation instead of the defaults. There are several ways to specify custom messages.</p>
<p dir="rtl">اگر شما نیاز داشته باشید می توانید از یک پیغام نغییر داده شده به جای استفاده از پیام پیش فرض استفاده کنید.</p>
<h4>Passing Custom Messages Into Validator</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$messages</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token string">'required'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'The :attribute field is required.'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token variable">$validator</span> <span class="token operator">=</span> <span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">make<span class="token punctuation">(</span></span><span class="token variable">$input</span><span class="token punctuation">,</span> <span class="token variable">$rules</span><span class="token punctuation">,</span> <span class="token variable">$messages</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><em>Note:</em> The <code class=" language-php"><span class="token punctuation">:</span>attribute</code> place-holder will be replaced by the actual name of the field under validation. You may also utilize other place-holders in validation messages.</p>
    <p dir="rtl"> Attribute  بایستی با یک نام وااقعی جایگزین شود شما باز هم می توانید شکل پیام را تغییر دهید.</p>
</blockquote>
<h4>Other Validation Place-Holders</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$messages</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token string">'same'</span>    <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'The :attribute and :other must match.'</span><span class="token punctuation">,</span>
        <span class="token string">'size'</span>    <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'The :attribute must be exactly :size.'</span><span class="token punctuation">,</span>
        <span class="token string">'between'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'The :attribute must be between :min - :max.'</span><span class="token punctuation">,</span>
        <span class="token string">'in'</span>      <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'The :attribute must be one of the following types: :values'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<h4>Specifying A Custom Message For A Given Attribute</h4>
<p>Sometimes you may wish to specify a custom error messages only for a specific field:</p>
<p dir="rtl">بعضی وقت ها ممکن است شما پیام خطای را برای فیلد خواصی در نظر بگیرید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$messages</span> <span class="token operator">=</span> <span class="token punctuation">[</span>
        <span class="token string">'email.required'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'We need to know your e-mail address!'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
<p><a name="localization"></a></p>
<h4>Specifying Custom Messages In Language Files</h4>
<p>In some cases, you may wish to specify your custom messages in a language file instead of passing them directly to the <code class=" language-php">Validator</code>. To do so, add your messages to <code class=" language-php">custom</code> array in the <code class=" language-php">resources<span class="token operator">/</span>lang<span class="token operator">/</span>xx<span class="token operator">/</span>validation<span class="token punctuation">.</span>php</code> language file.</p>
<p dir="rtl">در بعضی موارد شما ممکن است نعیین کنید پیام خاصی را در یک فایل زبان بجای ارسال مستقیم ان  به فایل validator  برای انجام اینکار پیام دلخواهتان را به ارایه customدر فایل زبانresources/lang/xx/validation.php  اضافه می کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'custom'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'required'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'We need to know your e-mail address!'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span></code></pre>
<p><a name="custom-validation-rules"></a></p>
<h2><a href="http://laravel.com/docs/5.0/validation#custom-validation-rules">Custom Validation Rules</a></h2>
<h4>Registering A Custom Validation Rule</h4>
<p>Laravel provides a variety of helpful validation rules; however, you may wish to specify some of your own. One method of registering custom validation rules is using the <code class=" language-php"><span class="token scope">Validator<span class="token punctuation">::</span></span>extend</code> method:</p>
<p dir="rtl">لاراول نقش های اعتبار سنجی زیادی تهیه می کند هر چند ممکن است شما بخواهید برخی از انها را خودتان تعیین کنید تنها تابع برای ثبت این نقش ها استفاده از تابع Validator::extend است.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">extend<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$attribute</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$value</span> <span class="token operator">==</span> <span class="token string">'foo'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>The custom validator Closure receives three arguments: the name of the <code class=" language-php"><span class="token variable">$attribute</span></code> being validated, the <code class=" language-php"><span class="token variable">$value</span></code> of the attribute, and an array of <code class=" language-php"><span class="token variable">$parameters</span></code> passed to the rule.</p>
<p dir="rtl">تابع برای تعیین اعتبار سنجی  سه ورودی می گیرد نام $attribute  که بایستی اعتبار سنجی شود $value  ان $attribute  و یک ارایه از پاراکتر هایی که باید برای نقش ارسال شود.</p>
<p>You may also pass a class and method to the <code class=" language-php">extend</code> method instead of a Closure:</p>
<p dir="rtl">شما ممکن است یک کلاس ویک تابع در عوض ارسال تابع ارسال کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">extend<span class="token punctuation">(</span></span><span class="token string">'foo'</span><span class="token punctuation">,</span> <span class="token string">'FooValidator@validate'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Note that you will also need to define an error message for your custom rules. You can do so either using an inline custom message array or by adding an entry in the validation language file.</p>
<p dir="rtl">بیاد داشته باشید که شما همیشه نیاز به تعریف پیامخطا برای نقشی که تعریف کرده اید دارید. شما می توانید این کار را انجام دهید با هر یک از استفاده از ازایه ای از پیام های بر خط  یا با اضافه کردن فایل اعتبار سنجی زبان </p>
<h4>Extending The Validator Class</h4>
<p>Instead of using Closure callbacks to extend the Validator, you may also extend the Validator class itself. To do so, write a Validator class that extends <code class=" language-php">Illuminate\<span class="token package">Validation<span class="token punctuation">\</span>Validator</span></code>. You may add validation methods to the class by prefixing them with <code class=" language-php">validate</code>:</p>
<p dir="rtl"> بجای استفاده از تابع برا ی گسترش اعتبار سنج شما ممکن است خود کلاس  را گسترش دهید . برای انجام این کار یک کلاس validator  بنویسید که از کلاس Illuminate\Validation\Validator.  استفاده کند.شما ممکن است توابع اعتبار سنجی را با پیشوند کردن انها با validate  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span>

        <span class="token keyword">class</span> <span class="token class-name">CustomValidator</span> <span class="token keyword">extends</span> <span class="token class-name">Illuminate<span class="token punctuation">\</span>Validation<span class="token punctuation">\</span>Validator</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">validateFoo<span class="token punctuation">(</span></span><span class="token variable">$attribute</span><span class="token punctuation">,</span> <span class="token variable">$value</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token variable">$value</span> <span class="token operator">==</span> <span class="token string">'foo'</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<h4>Registering A Custom Validator Resolver</h4>
<p>Next, you need to register your custom Validator extension:</p>
<p dir="rtl">بعد از این شما ممکن است نیاز داشته باشید به یک اعتبار سنج دلخواه</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">resolver<span class="token punctuation">(</span></span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$translator</span><span class="token punctuation">,</span> <span class="token variable">$data</span><span class="token punctuation">,</span> <span class="token variable">$rules</span><span class="token punctuation">,</span> <span class="token variable">$messages</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token keyword">new</span> <span class="token class-name">CustomValidator</span><span class="token punctuation">(</span><span class="token variable">$translator</span><span class="token punctuation">,</span> <span class="token variable">$data</span><span class="token punctuation">,</span> <span class="token variable">$rules</span><span class="token punctuation">,</span> <span class="token variable">$messages</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>When creating a custom validation rule, you may sometimes need to define custom place-holder replacements for error messages. You may do so by creating a custom Validator as described above, and adding a <code class=" language-php">replaceXXX</code> function to the validator.</p>
<p dir="rtl">وقتی یک نقش اعتبار سنجی دلخواه ایجاد می کنید شما ممکن است بعضی از اوقات نیاز به تعریف جاهایی در پیام خطا برای تغییر دادن داشته باشید شما این کار را می توانید با با ایجاد یک اعتبار سنج دلخواه همان طور که در بالا شرح داده شد و افزودن تابع replacexxxبه validator</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">protected</span> <span class="token keyword">function</span> <span class="token function">replaceFoo<span class="token punctuation">(</span></span><span class="token variable">$message</span><span class="token punctuation">,</span> <span class="token variable">$attribute</span><span class="token punctuation">,</span> <span class="token variable">$rule</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">str_replace<span class="token punctuation">(</span></span><span class="token string">':foo'</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span><span class="token punctuation">[</span><span class="token number">0</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token variable">$message</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>If you would like to add a custom message "replacer" without extending the <code class=" language-php">Validator</code> class, you may use the <code class=" language-php"><span class="token scope">Validator<span class="token punctuation">::</span></span>replacer</code> method:</p>
<p dir="rtl">اگر شما تمایل دارید پیام دلخواه را اضافه کنید بدون اینکه از کلاس validator  استفاده کنید شما ممکن است از تابع validator::replacer  استفاده کنید.</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Validator<span class="token punctuation">::</span></span><span class="token function">replacer<span class="token punctuation">(</span></span><span class="token string">'rule'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token variable">$message</span><span class="token punctuation">,</span> <span class="token variable">$attribute</span><span class="token punctuation">,</span> <span class="token variable">$rule</span><span class="token punctuation">,</span> <span class="token variable">$parameters</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop