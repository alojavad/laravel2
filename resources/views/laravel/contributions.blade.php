<!-- -->
@extends('master')

@section('content')
<article>
    <h1>Contribution Guide</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/contributions#bug-reports">Bug Reports</a></li>
        <li><a href="http://laravel.com/docs/5.0/contributions#core-development-discussion">Core Development Discussion</a></li>
        <li><a href="http://laravel.com/docs/5.0/contributions#which-branch">Which Branch?</a></li>
        <li><a href="http://laravel.com/docs/5.0/contributions#security-vulnerabilities">Security Vulnerabilities</a></li>
        <li><a href="http://laravel.com/docs/5.0/contributions#coding-style">Coding Style</a></li>
    </ul>
    <p><a name="bug-reports"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/contributions#bug-reports">Bug Reports</a></h2>
    <p>To encourage active collaboration, Laravel strongly encourages pull requests, not just bug reports. "Bug reports" may also be sent in the form of a pull request containing a failing unit test.</p>
    <p>However, if you file a bug report, your issue should contain a title and a clear description of the issue. You should also include as much relevant information as possible and a code sample that demonstrates the issue. The goal of a bug report is to make it easy for yourself - and others - to replicate the bug and develop a fix.</p>
    <p>Remember, bug reports are created in the hope that others with the same problem will be able to collaborate with you on solving it. Do not expect that the bug report will automatically see any activity or that others will jump to fix it. Creating a bug report serves to help yourself and others start on the path of fixing the problem.</p>
    <p>The Laravel source code is managed on Github, and there are repositories for each of the Laravel projects:</p>
    <ul>
        <li><a href="https://github.com/laravel/framework">Laravel Framework</a></li>
        <li><a href="https://github.com/laravel/laravel">Laravel Application</a></li>
        <li><a href="https://github.com/laravel/docs">Laravel Documentation</a></li>
        <li><a href="https://github.com/laravel/cashier">Laravel Cashier</a></li>
        <li><a href="https://github.com/laravel/envoy">Laravel Envoy</a></li>
        <li><a href="https://github.com/laravel/homestead">Laravel Homestead</a></li>
        <li><a href="https://github.com/laravel/settler">Laravel Homestead Build Scripts</a></li>
        <li><a href="https://github.com/laravel/laravel.com">Laravel Website</a></li>
        <li><a href="https://github.com/laravel/art">Laravel Art</a></li>
    </ul>
    <p><a name="core-development-discussion"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/contributions#core-development-discussion">Core Development Discussion</a></h2>
    <p>Discussion regarding bugs, new features, and implementation of existing features takes place in the <code class=" language-php"><span class="token comment" spellcheck="true">#laravel-dev</span></code> IRC channel (Freenode). Taylor Otwell, the maintainer of Laravel, is typically present in the channel on weekdays from 8am-5pm (UTC-06:00 or America/Chicago), and sporadically present in the channel at other times.</p>
    <p>The <code class=" language-php"><span class="token comment" spellcheck="true">#laravel-dev</span></code> IRC channel is open to all. All are welcome to join the channel either to participate or simply observe the discussions!</p>
    <p><a name="which-branch"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/contributions#which-branch">Which Branch?</a></h2>
    <p><strong>All</strong> bug fixes should be sent to the latest stable branch. Bug fixes should <strong>never</strong> be sent to the <code class=" language-php">master</code> branch unless they fix features that exist only in the upcoming release.</p>
    <p><strong>Minor</strong> features that are <strong>fully backwards compatible</strong> with the current Laravel release may be sent to the latest stable branch.</p>
    <p><strong>Major</strong> new features should always be sent to the <code class=" language-php">master</code> branch, which contains the upcoming Laravel release.</p>
    <p>If you are unsure if your feature qualifies as a major or minor, please ask Taylor Otwell in the <code class=" language-php"><span class="token comment" spellcheck="true">#laravel-dev</span></code> IRC channel (Freenode).</p>
    <p><a name="security-vulnerabilities"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/contributions#security-vulnerabilities">Security Vulnerabilities</a></h2>
    <p>If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at <a href="mailto:taylorotwell@gmail.com">taylorotwell@gmail.com</a>. All security vulnerabilities will be promptly addressed.</p>
    <p><a name="coding-style"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/contributions#coding-style">Coding Style</a></h2>
    <p>Laravel follows the <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md">PSR-4</a> and <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md">PSR-1</a> coding standards. In addition to these standards, the following coding standards should be followed:</p>
    <ul>
        <li>The class namespace declaration must be on the same line as <code class=" language-php"><span class="token delimiter">&lt;?php</span></code>.</li>
        <li>A class' opening <code class=" language-php"><span class="token punctuation">{</span></code> must be on the same line as the class name.</li>
        <li>Functions and control structures must use Allman style braces.</li>
        <li>Indent with tabs, align with spaces.</li>
    </ul>
</article>
@stop