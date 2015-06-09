<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Laravel Cashier</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/billing#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#configuration">Configuration</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#subscribing-to-a-plan">Subscribing To A Plan</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#single-charges">Single Charges</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#no-card-up-front">No Card Up Front</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#swapping-subscriptions">Swapping Subscriptions</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#subscription-quantity">Subscription Quantity</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#cancelling-a-subscription">Cancelling A Subscription</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#resuming-a-subscription">Resuming A Subscription</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#checking-subscription-status">Checking Subscription Status</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#handling-failed-subscriptions">Handling Failed Subscriptions</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#handling-other-stripe-webhooks">Handling Other Stripe Webhooks</a></li>
        <li><a href="http://laravel.com/docs/5.0/billing#invoices">Invoices</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#introduction">Introduction</a></h2>
    <p>Laravel Cashier provides an expressive, fluent interface to <a href="https://stripe.com/">Stripe's</a> subscription billing services. It handles almost all of the boilerplate subscription billing code you are dreading writing. In addition to basic subscription management, Cashier can handle coupons, swapping subscription, subscription "quantities", cancellation grace periods, and even generate invoice PDFs.</p>
    <p><a name="configuration"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#configuration">Configuration</a></h2>
    <h4>Composer</h4>
    <p>First, add the Cashier package to your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">"laravel/cashier"</span><span class="token punctuation">:</span> <span class="token string">"~4.0"</span> <span class="token punctuation">(</span><span class="token keyword">For</span> Stripe APIs on <span class="token number">2015</span><span class="token operator">-</span><span class="token number">02</span><span class="token operator">-</span><span class="token number">18</span> version <span class="token keyword">and</span> later<span class="token punctuation">)</span>
        <span class="token string">"laravel/cashier"</span><span class="token punctuation">:</span> <span class="token string">"~3.0"</span> <span class="token punctuation">(</span><span class="token keyword">For</span> Stripe APIs up to <span class="token keyword">and</span> including <span class="token number">2015</span><span class="token operator">-</span><span class="token number">02</span><span class="token operator">-</span><span class="token number">16</span> version<span class="token punctuation">)</span></code></pre>
    <h4>Service Provider</h4>
    <p>Next, register the <code class=" language-php">Laravel\<span class="token package">Cashier<span class="token punctuation">\</span>CashierServiceProvider</span></code> in your <code class=" language-php">app</code> configuration file.</p>
    <h4>Migration</h4>
    <p>Before using Cashier, we'll need to add several columns to your database. Don't worry, you can use the <code class=" language-php">cashier<span class="token punctuation">:</span>table</code> Artisan command to create a migration to add the necessary column. For example, to add the column to the users table use <code class=" language-php">php artisan cashier<span class="token punctuation">:</span>table users</code>. Once the migration has been created, simply run the <code class=" language-php">migrate</code> command.</p>
    <h4>Model Setup</h4>
    <p>Next, add the <code class=" language-php">Billable</code> trait and appropriate date mutators to your model definition:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">use</span> <span class="token package">Laravel<span class="token punctuation">\</span>Cashier<span class="token punctuation">\</span>Billable</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Laravel<span class="token punctuation">\</span>Cashier<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Billable</span> <span class="token keyword">as</span> BillableContract<span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">User</span> <span class="token keyword">extends</span> <span class="token class-name">Model</span> <span class="token keyword">implements</span> <span class="token class-name">BillableContract</span> <span class="token punctuation">{</span>

        <span class="token keyword">use</span> <span class="token package">Billable</span><span class="token punctuation">;</span>

        <span class="token keyword">protected</span> <span class="token variable">$dates</span> <span class="token operator">=</span> <span class="token punctuation">[</span><span class="token string">'trial_ends_at'</span><span class="token punctuation">,</span> <span class="token string">'subscription_ends_at'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

        <span class="token punctuation">}</span></code></pre>
    <h4>Stripe Key</h4>
    <p>Finally, set your Stripe key in your <code class=" language-php">services<span class="token punctuation">.</span>php</code> config file:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'stripe'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'model'</span>  <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'User'</span><span class="token punctuation">,</span>
        <span class="token string">'secret'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token function">env<span class="token punctuation">(</span></span><span class="token string">'STRIPE_API_SECRET'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span></code></pre>
    <p>Alternatively you can store it in one of your bootstrap files or service providers, such as the <code class=" language-php">AppServiceProvider</code>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">setStripeKey<span class="token punctuation">(</span></span><span class="token string">'stripe-key'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="subscribing-to-a-plan"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#subscribing-to-a-plan">Subscribing To A Plan</a></h2>
    <p>Once you have a model instance, you can easily subscribe that user to a given Stripe plan:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token string">'monthly'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">create<span class="token punctuation">(</span></span><span class="token variable">$creditCardToken</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>If you would like to apply a coupon when creating the subscription, you may use the <code class=" language-php">withCoupon</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token string">'monthly'</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">withCoupon<span class="token punctuation">(</span></span><span class="token string">'code'</span><span class="token punctuation">)</span>
        <span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">create<span class="token punctuation">(</span></span><span class="token variable">$creditCardToken</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The <code class=" language-php">subscription</code> method will automatically create the Stripe subscription, as well as update your database with Stripe customer ID and other relevant billing information. If your plan has a trial configured in Stripe, the trial end date will also automatically be set on the user record.</p>
    <p>If your plan has a trial period that is <strong>not</strong> configured in Stripe, you must set the trial end date manually after subscribing:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">trial_ends_at</span> <span class="token operator">=</span> <span class="token scope">Carbon<span class="token punctuation">::</span></span><span class="token function">now<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">addDays<span class="token punctuation">(</span></span><span class="token number">14</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <h3>Specifying Additional User Details</h3>
    <p>If you would like to specify additional customer details, you may do so by passing them as second argument to the <code class=" language-php">create</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token string">'monthly'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">create<span class="token punctuation">(</span></span><span class="token variable">$creditCardToken</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$email</span><span class="token punctuation">,</span> <span class="token string">'description'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Our First Customer'</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>To learn more about the additional fields supported by Stripe, check out Stripe's <a href="https://stripe.com/docs/api#create_customer">documentation on customer creation</a>.</p>
    <p><a name="single-charges"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#single-charges">Single Charges</a></h2>
    <p>If you would like to make a "one off" charge against a subscribed customer's credit card, you may use the <code class=" language-php">charge</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">charge<span class="token punctuation">(</span></span><span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The <code class=" language-php">charge</code> method accepts the amount you would like to charge in the <strong>lowest denominator of the currency</strong>. So, for example, the example above will charge 100 cents, or $1.00, against the user's credit card.</p>
    <p>The <code class=" language-php">charge</code> method accepts an array as its second argument, allowing you to pass any options you wish to the underlying Stripe charge creation:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">charge<span class="token punctuation">(</span></span><span class="token number">100</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'source'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$token</span><span class="token punctuation">,</span>
        <span class="token string">'receipt_email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">email</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>The <code class=" language-php">charge</code> method will return <code class=" language-php"><span class="token boolean">false</span></code> if the charge fails. This typically indicates the charge was denied:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span> <span class="token operator">!</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">charge<span class="token punctuation">(</span></span><span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The charge was denied...
</span><span class="token punctuation">}</span></code></pre>
    <p>If the charge is successful, the full Stripe response will be returned from the method.</p>
    <p><a name="no-card-up-front"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#no-card-up-front">No Card Up Front</a></h2>
    <p>If your application offers a free-trial with no credit-card up front, set the <code class=" language-php">cardUpFront</code> property on your model to <code class=" language-php"><span class="token boolean">false</span></code>:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token keyword">protected</span> <span class="token variable">$cardUpFront</span> <span class="token operator">=</span> <span class="token boolean">false</span><span class="token punctuation">;</span></code></pre>
    <p>On account creation, be sure to set the trial end date on the model:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">trial_ends_at</span> <span class="token operator">=</span> <span class="token scope">Carbon<span class="token punctuation">::</span></span><span class="token function">now<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">addDays<span class="token punctuation">(</span></span><span class="token number">14</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">save<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="swapping-subscriptions"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#swapping-subscriptions">Swapping Subscriptions</a></h2>
    <p>To swap a user to a new subscription, use the <code class=" language-php">swap</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token string">'premium'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">swap<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>If the user is on trial, the trial will be maintained as normal. Also, if a "quantity" exists for the subscription, that quantity will also be maintained.</p>
    <p><a name="subscription-quantity"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#subscription-quantity">Subscription Quantity</a></h2>
    <p>Sometimes subscriptions are affected by "quantity". For example, your application might charge $10 per month per user on an account. To easily increment or decrement your subscription quantity, use the <code class=" language-php">increment</code> and <code class=" language-php">decrement</code> methods:</p>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">User<span class="token punctuation">::</span></span><span class="token function">find<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">increment<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Add five to the subscription's current quantity...
</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">increment<span class="token punctuation">(</span></span><span class="token number">5</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">decrement<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// Subtract five to the subscription's current quantity...
</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">decrement<span class="token punctuation">(</span></span><span class="token number">5</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p><a name="cancelling-a-subscription"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#cancelling-a-subscription">Cancelling A Subscription</a></h2>
    <p>Cancelling a subscription is a walk in the park:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">cancel<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>When a subscription is cancelled, Cashier will automatically set the <code class=" language-php">subscription_ends_at</code> column on your database. This column is used to know when the <code class=" language-php">subscribed</code> method should begin returning <code class=" language-php"><span class="token boolean">false</span></code>. For example, if a customer cancels a subscription on March 1st, but the subscription was not scheduled to end until March 5th, the <code class=" language-php">subscribed</code> method will continue to return <code class=" language-php"><span class="token boolean">true</span></code> until March 5th.</p>
    <p><a name="resuming-a-subscription"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#resuming-a-subscription">Resuming A Subscription</a></h2>
    <p>If a user has cancelled their subscription and you wish to resume it, use the <code class=" language-php">resume</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscription<span class="token punctuation">(</span></span><span class="token string">'monthly'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">resume<span class="token punctuation">(</span></span><span class="token variable">$creditCardToken</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>If the user cancels a subscription and then resumes that subscription before the subscription has fully expired, they will not be billed immediately. Their subscription will simply be re-activated, and they will be billed on the original billing cycle.</p>
    <p><a name="checking-subscription-status"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#checking-subscription-status">Checking Subscription Status</a></h2>
    <p>To verify that a user is subscribed to your application, use the <code class=" language-php">subscribed</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscribed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>The <code class=" language-php">subscribed</code> method makes a great candidate for a <a href="http://laravel.com/docs/5.0/middleware">route middleware</a>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Closure <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token operator">&amp;&amp;</span> <span class="token operator">!</span> <span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">subscribed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token string">'billing'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">return</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
    <p>You may also determine if the user is still within their trial period (if applicable) using the <code class=" language-php">onTrial</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">onTrial<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>To determine if the user was once an active subscriber, but has cancelled their subscription, you may use the <code class=" language-php">cancelled</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">cancelled<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>You may also determine if a user has cancelled their subscription, but are still on their "grace period" until the subscription fully expires. For example, if a user cancels a subscription on March 5th that was scheduled to end on March 10th, the user is on their "grace period" until March 10th. Note that the <code class=" language-php">subscribed</code> method still returns <code class=" language-php"><span class="token boolean">true</span></code> during this time.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">onGracePeriod<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>The <code class=" language-php">everSubscribed</code> method may be used to determine if the user has ever subscribed to a plan in your application:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">everSubscribed<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p>The <code class=" language-php">onPlan</code> method may be used to determine if the user is subscribed to a given plan based on its ID:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">onPlan<span class="token punctuation">(</span></span><span class="token string">'monthly'</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
    <p><a name="handling-failed-subscriptions"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#handling-failed-subscriptions">Handling Failed Subscriptions</a></h2>
    <p>What if a customer's credit card expires? No worries - Cashier includes a Webhook controller that can easily cancel the customer's subscription for you. Just point a route to the controller:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">post<span class="token punctuation">(</span></span><span class="token string">'stripe/webhook'</span><span class="token punctuation">,</span> <span class="token string">'Laravel\Cashier\WebhookController@handleWebhook'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>That's it! Failed payments will be captured and handled by the controller. The controller will cancel the customer's subscription when Stripe determines the subscription has failed (normally after three failed payment attempts). The <code class=" language-php">stripe<span class="token operator">/</span>webhook</code> URI in this example is just for example. You will need to configure the URI in your Stripe settings.</p>
    <p><a name="handling-other-stripe-webhooks"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#handling-other-stripe-webhooks">Handling Other Stripe Webhooks</a></h2>
    <p>If you have additional Stripe webhook events you would like to handle, simply extend the Webhook controller. Your method names should correspond to Cashier's expected convention, specifically, methods should be prefixed with <code class=" language-php">handle</code> and the name of the Stripe webhook you wish to handle. For example, if you wish to handle the <code class=" language-php">invoice<span class="token punctuation">.</span>payment_succeeded</code> webhook, you should add a <code class=" language-php">handleInvoicePaymentSucceeded</code> method to the controller.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">class</span> <span class="token class-name">WebhookController</span> <span class="token keyword">extends</span> <span class="token class-name">Laravel<span class="token punctuation">\</span>Cashier<span class="token punctuation">\</span>WebhookController</span> <span class="token punctuation">{</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handleInvoicePaymentSucceeded<span class="token punctuation">(</span></span><span class="token variable">$payload</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // Handle The Event
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> In addition to updating the subscription information in your database, the Webhook controller will also cancel the subscription via the Stripe API.</p>
    </blockquote>
    <p><a name="invoices"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/billing#invoices">Invoices</a></h2>
    <p>You can easily retrieve an array of a user's invoices using the <code class=" language-php">invoices</code> method:</p>
    <pre class=" language-php"><code class=" language-php"><span class="token variable">$invoices</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">invoices<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    <p>When listing the invoices for the customer, you may use these helper methods to display the relevant invoice information:</p>
<pre class=" language-php"><code class=" language-php"><span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$invoice</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">id</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>

        <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$invoice</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dateString<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span>

        <span class="token punctuation">{</span><span class="token punctuation">{</span> <span class="token variable">$invoice</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">dollars<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token punctuation">}</span><span class="token punctuation">}</span></code></pre>
    <p>Use the <code class=" language-php">downloadInvoice</code> method to generate a PDF download of the invoice. Yes, it's really this easy:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">downloadInvoice<span class="token punctuation">(</span></span><span class="token variable">$invoice</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">id</span><span class="token punctuation">,</span> <span class="token punctuation">[</span>
        <span class="token string">'vendor'</span>  <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Your Company'</span><span class="token punctuation">,</span>
        <span class="token string">'product'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Your Product'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop