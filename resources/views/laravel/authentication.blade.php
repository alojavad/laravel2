<!-- -->
@extends('master')

@section('content')
<article>
<h1>Authentication</h1>
<ul>
    <li><a href="http://laravel.com/docs/5.0/authentication#introduction">Introduction</a></li>
    <li><a href="http://laravel.com/docs/5.0/authentication#authenticating-users">Authenticating Users</a></li>
    <li><a href="http://laravel.com/docs/5.0/authentication#retrieving-the-authenticated-user">Retrieving The Authenticated User</a></li>
    <li><a href="http://laravel.com/docs/5.0/authentication#protecting-routes">Protecting Routes</a></li>
    <li><a href="http://laravel.com/docs/5.0/authentication#http-basic-authentication">HTTP Basic Authentication</a></li>
    <li><a href="http://laravel.com/docs/5.0/authentication#password-reminders-and-reset">Password Reminders &amp; Reset</a></li>
    <li><a href="http://laravel.com/docs/5.0/authentication#social-authentication">Social Authentication</a></li>
</ul>
<p><a name="introduction"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#introduction">Introduction</a></h2>
<p>Laravel makes implementing authentication very simple. In fact, almost everything is configured for you out of the box. The authentication configuration file is located at <code class=" language-php">config<span class="token operator">/</span>auth<span class="token punctuation">.</span>php</code>, which contains several well documented options for tweaking the behavior of the authentication services.</p>
<p>By default, Laravel includes an <code class=" language-php">App\<span class="token package">User</span></code> model in your <code class=" language-php">app</code> directory. This model may be used with the default Eloquent authentication driver.</p>
<p>Remember: when building the database schema for this model, make the password column at least 60 characters. Also, before getting started, make sure that your <code class=" language-php">users</code> (or equivalent) table contains a nullable, string <code class=" language-php">remember_token</code> column of 100 characters. This column will be used to store a token for "remember me" sessions being maintained by your application. This can be done by using <code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">rememberToken<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code> in a migration. Of course, Laravel 5 ships migrations for these columns out of the box!</p>
<p>If your application is not using Eloquent, you may use the <code class=" language-php">database</code> authentication driver which uses the Laravel query builder.</p>
<p><a name="authenticating-users"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#authenticating-users">Authenticating Users</a></h2>
<p>Laravel ships with two authentication related controllers out of the box. The <code class=" language-php">AuthController</code> handles new user registration and "logging in", while the <code class=" language-php">PasswordController</code> contains the logic to help existing users reset their forgotten passwords.</p>
<p>Each of these controllers uses a trait to include their necessary methods. For many applications, you will not need to modify these controllers at all. The views that these controllers render are located in the <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>auth</code> directory. You are free to customize these views however you wish.</p>
<h3>The User Registrar</h3>
<p>To modify the form fields that are required when a new user registers with your application, you may modify the <code class=" language-php">App\<span class="token package">Services<span class="token punctuation">\</span>Registrar</span></code> class. This class is responsible for validating and creating new users of your application.</p>
<p>The <code class=" language-php">validator</code> method of the <code class=" language-php">Registrar</code> contains the validation rules for new users of the application, while the <code class=" language-php">create</code> method of the <code class=" language-php">Registrar</code> is responsible for creating new <code class=" language-php">User</code> records in your database. You are free to modify each of these methods as you wish. The <code class=" language-php">Registrar</code> is called by the <code class=" language-php">AuthController</code> via the methods contained in the <code class=" language-php">AuthenticatesAndRegistersUsers</code> trait.</p>
<h4>Manual Authentication</h4>
<p>If you choose not to use the provided <code class=" language-php">AuthController</code> implementation, you will need to manage the authentication of your users using the Laravel authentication classes directly. Don't worry, it's still a cinch! First, let's check out the <code class=" language-php">attempt</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Auth</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">AuthController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Handle an authentication attempt.
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">authenticate<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">attempt<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$email</span><span class="token punctuation">,</span> <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$password</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">intended<span class="token punctuation">(</span></span><span class="token string">'dashboard'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>The <code class=" language-php">attempt</code> method accepts an array of key / value pairs as its first argument. The <code class=" language-php">password</code> value will be <a href="http://laravel.com/docs/5.0/hashing">hashed</a>. The other values in the array will be used to find the user in your database table. So, in the example above, the user will be retrieved by the value of the <code class=" language-php">email</code> column. If the user is found, the hashed password stored in the database will be compared with the hashed <code class=" language-php">password</code> value passed to the method via the array. If the two hashed passwords match, a new authenticated session will be started for the user.</p>
<p>The <code class=" language-php">attempt</code> method will return <code class=" language-php"><span class="token boolean">true</span></code> if authentication was successful. Otherwise, <code class=" language-php"><span class="token boolean">false</span></code> will be returned.</p>
<blockquote>
    <p><strong>Note:</strong> In this example, <code class=" language-php">email</code> is not a required option, it is merely used as an example. You should use whatever column name corresponds to a "username" in your database.</p>
</blockquote>
<p>The <code class=" language-php">intended</code> redirect function will redirect the user to the URL they were attempting to access before being caught by the authentication filter. A fallback URI may be given to this method in case the intended destination is not available.</p>
<h4>Authenticating A User With Conditions</h4>
<p>You also may add extra conditions to the authentication query:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">attempt<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$email</span><span class="token punctuation">,</span> <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$password</span><span class="token punctuation">,</span> <span class="token string">'active'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token number">1</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The user is active, not suspended, and exists.
</span><span class="token punctuation">}</span></code></pre>
<h4>Determining If A User Is Authenticated</h4>
<p>To determine if the user is already logged into your application, you may use the <code class=" language-php">check</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">check<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The user is logged in...
</span><span class="token punctuation">}</span></code></pre>
<h4>Authenticating A User And "Remembering" Them</h4>
<p>If you would like to provide "remember me" functionality in your application, you may pass a boolean value as the second argument to the <code class=" language-php">attempt</code> method, which will keep the user authenticated indefinitely, or until they manually logout. Of course, your <code class=" language-php">users</code> table must include the string <code class=" language-php">remember_token</code> column, which will be used to store the "remember me" token.</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">attempt<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'email'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$email</span><span class="token punctuation">,</span> <span class="token string">'password'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token variable">$password</span><span class="token punctuation">]</span><span class="token punctuation">,</span> <span class="token variable">$remember</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // The user is being remembered...
</span><span class="token punctuation">}</span></code></pre>
<p>If you are "remembering" users, you may use the <code class=" language-php">viaRemember</code> method to determine if the user was authenticated using the "remember me" cookie:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">viaRemember<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Authenticating Users By ID</h4>
<p>To log a user into the application by their ID, use the <code class=" language-php">loginUsingId</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">loginUsingId<span class="token punctuation">(</span></span><span class="token number">1</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<h4>Validating User Credentials Without Login</h4>
<p>The <code class=" language-php">validate</code> method allows you to validate a user's credentials without actually logging them into the application:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">validate<span class="token punctuation">(</span></span><span class="token variable">$credentials</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Logging A User In For A Single Request</h4>
<p>You may also use the <code class=" language-php">once</code> method to log a user into the application for a single request. No sessions or cookies will be utilized:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">once<span class="token punctuation">(</span></span><span class="token variable">$credentials</span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> //
</span><span class="token punctuation">}</span></code></pre>
<h4>Manually Logging In A User</h4>
<p>If you need to log an existing user instance into your application, you may call the <code class=" language-php">login</code> method with the user instance:</p>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">login<span class="token punctuation">(</span></span><span class="token variable">$user</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>This is equivalent to logging in a user via credentials using the <code class=" language-php">attempt</code> method.</p>
<h4>Logging A User Out Of The Application</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">logout<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Of course, if you are using the built-in Laravel authentication controllers, a controller method that handles logging users out of the application is provided out of the box.</p>
<h4>Authentication Events</h4>
<p>When the <code class=" language-php">attempt</code> method is called, the <code class=" language-php">auth<span class="token punctuation">.</span>attempt</code> <a href="http://laravel.com/docs/5.0/events">event</a> will be fired. If the authentication attempt is successful and the user is logged in, the <code class=" language-php">auth<span class="token punctuation">.</span>login</code> event will be fired as well.</p>
<p><a name="retrieving-the-authenticated-user"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#retrieving-the-authenticated-user">Retrieving The Authenticated User</a></h2>
<p>Once a user is authenticated, there are several ways to obtain an instance of the User.</p>
<p>First, you may access the user from the <code class=" language-php">Auth</code> facade:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">ProfileController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Update the user's profile.
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">updateProfile<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
           <span class="token comment" spellcheck="true"> // Auth::user() returns an instance of the authenticated user...
</span>        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Second, you may access the authenticated user via an <code class=" language-php">Illuminate\<span class="token package">Http<span class="token punctuation">\</span>Request</span></code> instance:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Request</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">ProfileController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Update the user's profile.
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">updateProfile<span class="token punctuation">(</span></span>Request <span class="token variable">$request</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
           <span class="token comment" spellcheck="true"> // $request-&gt;user() returns an instance of the authenticated user...
</span>        <span class="token punctuation">}</span>
        <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p>Thirdly, you may type-hint the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Auth<span class="token punctuation">\</span>Authenticatable</span></code> contract. This type-hint may be added to a controller constructor, controller method, or any other constructor of a class resolved by the <a href="http://laravel.com/docs/5.0/container">service container</a>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token delimiter">&lt;?php</span> <span class="token keyword">namespace</span> <span class="token package">App<span class="token punctuation">\</span>Http<span class="token punctuation">\</span>Controllers</span><span class="token punctuation">;</span>

        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Routing<span class="token punctuation">\</span>Controller</span><span class="token punctuation">;</span>
        <span class="token keyword">use</span> <span class="token package">Illuminate<span class="token punctuation">\</span>Contracts<span class="token punctuation">\</span>Auth<span class="token punctuation">\</span>Authenticatable</span><span class="token punctuation">;</span>

        <span class="token keyword">class</span> <span class="token class-name">ProfileController</span> <span class="token keyword">extends</span> <span class="token class-name">Controller</span> <span class="token punctuation">{</span>

    <span class="token comment" spellcheck="true">/**
     * Update the user's profile.
     *
     * @return Response
     */</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">updateProfile<span class="token punctuation">(</span></span>Authenticatable <span class="token variable">$user</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
       <span class="token comment" spellcheck="true"> // $user is an instance of the authenticated user...
</span>    <span class="token punctuation">}</span>

        <span class="token punctuation">}</span></code></pre>
<p><a name="protecting-routes"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#protecting-routes">Protecting Routes</a></h2>
<p><a href="http://laravel.com/docs/5.0/middleware">Route middleware</a> can be used to allow only authenticated users to access a given route. Laravel provides the <code class=" language-php">auth</code> middleware by default, and it is defined in <code class=" language-php">app\<span class="token package">Http<span class="token punctuation">\</span>Middleware<span class="token punctuation">\</span>Authenticate</span><span class="token punctuation">.</span>php</code>. All you need to do is attach it to a route definition:</p>
<pre class=" language-php"><code class=" language-php"><span class="token comment" spellcheck="true">// With A Route Closure...
</span>
        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'middleware'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'auth'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Only authenticated users may enter...
</span><span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// With A Controller...
</span>
        <span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'middleware'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'auth'</span><span class="token punctuation">,</span> <span class="token string">'uses'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'ProfileController@show'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p><a name="http-basic-authentication"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#http-basic-authentication">HTTP Basic Authentication</a></h2>
<p>HTTP Basic Authentication provides a quick way to authenticate users of your application without setting up a dedicated "login" page. To get started, attach the <code class=" language-php">auth<span class="token punctuation">.</span>basic</code> middleware to your route:</p>
<h4>Protecting A Route With HTTP Basic</h4>
<pre class=" language-php"><code class=" language-php"><span class="token scope">Route<span class="token punctuation">::</span></span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">'profile'</span><span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token string">'middleware'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'auth.basic'</span><span class="token punctuation">,</span> <span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
   <span class="token comment" spellcheck="true"> // Only authenticated users may enter...
</span><span class="token punctuation">}</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>By default, the <code class=" language-php">basic</code> middleware will use the <code class=" language-php">email</code> column on the user record as the "username".</p>
<h4>Setting Up A Stateless HTTP Basic Filter</h4>
<p>You may also use HTTP Basic Authentication without setting a user identifier cookie in the session, which is particularly useful for API authentication. To do so, <a href="http://laravel.com/docs/5.0/middleware">define a middleware</a> that calls the <code class=" language-php">onceBasic</code> method:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handle<span class="token punctuation">(</span></span><span class="token variable">$request</span><span class="token punctuation">,</span> Closure <span class="token variable">$next</span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">Auth<span class="token punctuation">::</span></span><span class="token function">onceBasic<span class="token punctuation">(</span></span><span class="token punctuation">)</span> <span class="token operator">?</span><span class="token punctuation">:</span> <span class="token variable">$next</span><span class="token punctuation">(</span><span class="token variable">$request</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span></code></pre>
<p>If you are using PHP FastCGI, HTTP Basic authentication may not work correctly out of the box. The following lines should be added to your <code class=" language-php"><span class="token punctuation">.</span>htaccess</code> file:</p>
<pre class=" language-php"><code class=" language-php">RewriteCond <span class="token operator">%</span><span class="token punctuation">{</span><span class="token constant">HTTP</span><span class="token punctuation">:</span>Authorization<span class="token punctuation">}</span> <span class="token operator">^</span><span class="token punctuation">(</span><span class="token punctuation">.</span><span class="token operator">+</span><span class="token punctuation">)</span>$
        RewriteRule <span class="token punctuation">.</span><span class="token operator">*</span> <span class="token operator">-</span> <span class="token punctuation">[</span>E<span class="token operator">=</span><span class="token constant">HTTP_AUTHORIZATION</span><span class="token punctuation">:</span><span class="token operator">%</span><span class="token punctuation">{</span><span class="token constant">HTTP</span><span class="token punctuation">:</span>Authorization<span class="token punctuation">}</span><span class="token punctuation">]</span></code></pre>
<p><a name="password-reminders-and-reset"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#password-reminders-and-reset">Password Reminders &amp; Reset</a></h2>
<h3>Model &amp; Table</h3>
<p>Most web applications provide a way for users to reset their forgotten passwords. Rather than forcing you to re-implement this on each application, Laravel provides convenient methods for sending password reminders and performing password resets.</p>
<p>To get started, verify that your <code class=" language-php">User</code> model implements the <code class=" language-php">Illuminate\<span class="token package">Contracts<span class="token punctuation">\</span>Auth<span class="token punctuation">\</span>CanResetPassword</span></code> contract. Of course, the <code class=" language-php">User</code> model included with the framework already implements this interface, and uses the <code class=" language-php">Illuminate\<span class="token package">Auth<span class="token punctuation">\</span>Passwords<span class="token punctuation">\</span>CanResetPassword</span></code> trait to include the methods needed to implement the interface.</p>
<h4>Generating The Reminder Table Migration</h4>
<p>Next, a table must be created to store the password reset tokens. The migration for this table is included with Laravel out of the box, and resides in the <code class=" language-php">database<span class="token operator">/</span>migrations</code> directory. So all you need to do is migrate:</p>
<pre class=" language-php"><code class=" language-php">php artisan migrate</code></pre>
<h3>Password Reminder Controller</h3>
<p>Laravel also includes an <code class=" language-php">Auth\<span class="token package">PasswordController</span></code> that contains the logic necessary to reset user passwords. We've even provided views to get you started! The views are located in the <code class=" language-php">resources<span class="token operator">/</span>views<span class="token operator">/</span>auth</code> directory. You are free to modify these views as you wish to suit your own application's design.</p>
<p>Your user will receive an e-mail with a link that points to the <code class=" language-php">getReset</code> method of the <code class=" language-php">PasswordController</code>. This method will render the password reset form and allow users to reset their passwords. After the password is reset, the user will automatically be logged into the application and redirected to <code class=" language-php"><span class="token operator">/</span>home</code>. You can customize the post-reset redirect location by defining a <code class=" language-php">redirectTo</code> property on the <code class=" language-php">PasswordController</code>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">protected</span> <span class="token variable">$redirectTo</span> <span class="token operator">=</span> <span class="token string">'/dashboard'</span><span class="token punctuation">;</span></code></pre>
<blockquote>
    <p><strong>Note:</strong> By default, password reset tokens expire after one hour. You may change this via the <code class=" language-php">reminder<span class="token punctuation">.</span>expire</code> option in your <code class=" language-php">config<span class="token operator">/</span>auth<span class="token punctuation">.</span>php</code> file.</p>
</blockquote>
<p><a name="social-authentication"></a></p>
<h2><a href="http://laravel.com/docs/5.0/authentication#social-authentication">Social Authentication</a></h2>
<p>In addition to typical, form based authentication, Laravel also provides a simple, convenient way to authenticate with OAuth providers using <a href="https://github.com/laravel/socialite">Laravel Socialite</a>. <strong>Socialite currently supports authentication with Facebook, Twitter, Google, GitHub and Bitbucket.</strong></p>
<p>To get started with Socialite, include the package in your <code class=" language-php">composer<span class="token punctuation">.</span>json</code> file:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">"laravel/socialite"</span><span class="token punctuation">:</span> <span class="token string">"~2.0"</span></code></pre>
<p>Next, register the <code class=" language-php">Laravel\<span class="token package">Socialite<span class="token punctuation">\</span>SocialiteServiceProvider</span></code> in your <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> configuration file. You may also register a <a href="http://laravel.com/docs/5.0/facades">facade</a>:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'Socialize'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'Laravel\Socialite\Facades\Socialite'</span><span class="token punctuation">,</span></code></pre>
<p>You will need to add credentials for the OAuth services your application utilizes. These credentials should be placed in your <code class=" language-php">config<span class="token operator">/</span>services<span class="token punctuation">.</span>php</code> configuration file, and should use the key <code class=" language-php">facebook</code>, <code class=" language-php">twitter</code>, <code class=" language-php">google</code>, or <code class=" language-php">github</code>, depending on the providers your application requires. For example:</p>
<pre class=" language-php"><code class=" language-php"><span class="token string">'github'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token punctuation">[</span>
        <span class="token string">'client_id'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'your-github-app-id'</span><span class="token punctuation">,</span>
        <span class="token string">'client_secret'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'your-github-app-secret'</span><span class="token punctuation">,</span>
        <span class="token string">'redirect'</span> <span class="token operator">=</span><span class="token operator">&gt;</span> <span class="token string">'http://your-callback-url'</span><span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span></code></pre>
<p>Next, you are ready to authenticate users! You will need two routes: one for redirecting the user to the OAuth provider, and another for receiving the callback from the provider after authentication. Here's an example using the <code class=" language-php">Socialize</code> facade:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">redirectToProvider<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token keyword">return</span> <span class="token scope">Socialize<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'github'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token punctuation">}</span>

        <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">handleProviderCallback<span class="token punctuation">(</span></span><span class="token punctuation">)</span>
        <span class="token punctuation">{</span>
        <span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">Socialize<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'github'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>

   <span class="token comment" spellcheck="true"> // $user-&gt;token;
</span><span class="token punctuation">}</span></code></pre>
<p>The <code class=" language-php">redirect</code> method takes care of sending the user to the OAuth provider, while the <code class=" language-php">user</code> method will read the incoming request and retrieve the user's information from the provider. Before redirecting the user, you may also set "scopes" on the request:</p>
<pre class=" language-php"><code class=" language-php"><span class="token keyword">return</span> <span class="token scope">Socialize<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'github'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">scopes<span class="token punctuation">(</span></span><span class="token punctuation">[</span><span class="token string">'scope1'</span><span class="token punctuation">,</span> <span class="token string">'scope2'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">redirect<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
<p>Once you have a user instance, you can grab a few more details about the user:</p>
<h4>Retrieving User Details</h4>
<pre class=" language-php"><code class=" language-php"><span class="token variable">$user</span> <span class="token operator">=</span> <span class="token scope">Socialize<span class="token punctuation">::</span></span><span class="token function">with<span class="token punctuation">(</span></span><span class="token string">'github'</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">user<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// OAuth Two Providers
</span><span class="token variable">$token</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">token</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// OAuth One Providers
</span><span class="token variable">$token</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">token</span><span class="token punctuation">;</span>
        <span class="token variable">$tokenSecret</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">tokenSecret</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true">
// All Providers
</span><span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getId<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getNickname<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getName<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getEmail<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$user</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getAvatar<span class="token punctuation">(</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
</article>
@stop