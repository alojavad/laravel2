<!-- -->

@extends('master')

@section('content')
<article>
    <h1>Laravel Homestead</h1>
    <ul>
        <li><a href="http://laravel.com/docs/5.0/homestead#introduction">Introduction</a></li>
        <li><a href="http://laravel.com/docs/5.0/homestead#included-software">Included Software</a></li>
        <li><a href="http://laravel.com/docs/5.0/homestead#installation-and-setup">Installation &amp; Setup</a></li>
        <li><a href="http://laravel.com/docs/5.0/homestead#daily-usage">Daily Usage</a></li>
        <li><a href="http://laravel.com/docs/5.0/homestead#ports">Ports</a></li>
        <li><a href="http://laravel.com/docs/5.0/homestead#blackfire-profiler">Blackfire Profiler</a></li>
    </ul>
    <p><a name="introduction"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/homestead#introduction">Introduction</a></h2>
    <p>Laravel strives to make the entire PHP development experience delightful, including your local development environment. <a href="http://vagrantup.com/">Vagrant</a> provides a simple, elegant way to manage and provision Virtual Machines.</p>
    <p dir="rtl">لاراول  می کوشد  تا کل محیط توسعه لاراول را یک تمرین لذت بخش کند از جمله محیط توسعه محلی. Vagrant  یک روش ساده وزیبا  برای مدیریت و تهیه ماشین مجازی فراهم کرده است.</p>
    <p>Laravel Homestead is an official, pre-packaged Vagrant "box" that provides you a wonderful development environment without requiring you to install PHP, HHVM, a web server, and any other server software on your local machine. No more worrying about messing up your operating system! Vagrant boxes are completely disposable. If something goes wrong, you can destroy and re-create the box in minutes!</p>
    <p dir="rtl">Homestead لاراول یک پیش بسته برای vagrant به صورت رسمی است.که برای شما یک محیط توسعه قدرتمند فراهم می کند که در این محیط شما نیازی به نصب php hhvm web server و هیچ نرم افزار سروری دیگری برای نصب بر روی ماشین محلی ندارید.در مورد سیستم عاملتان هم نگران نباشید جعبه vagrant کاملا عرضه می شود .اگر کاری را اشتباه انجام دهید در عرض چند دقیقه می توانید ان را تخریب کنید و دوباره ایجاد کنید.</p>

    <p>Homestead runs on any Windows, Mac, or Linux system, and includes the Nginx web server, PHP 5.6, MySQL, Postgres, Redis, Memcached, and all of the other goodies you need to develop amazing Laravel applications.</p>
    <p dir="rtl">Homestead بر روی ویندوز مکینتاش و لینوکس اجرا می شود وشامل وب سرور nginx   php ورژن 5.6 mysql podtgres redis  memcached  وهمه چیزهای خوب دیگری که که برای توسعه هیجان انگیز لاراول نیاز دارید را  داراست.</p>
    <blockquote>
        <p><strong>Note:</strong> If you are using Windows, you may need to enable hardware virtualization (VT-x). It can usually be enabled via your BIOS.</p>
        <p dir="rtl">اگر شما از ویندوز استفاده می کنید احتمالا شماباید قابلیت VT-x  را فعال کنید که معمولا از طریق biosفعال  می شود.</p>
    </blockquote>
    <p>Homestead is currently built and tested using Vagrant 1.7.</p>
    <p dir="rtl">Homestead اخیرا با vagrant ورژن 1.6 ساخته شده و امتحان شده است.</p>
    <p><a name="included-software"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/homestead#included-software">Included Software</a></h2>
    <ul>
        <li>Ubuntu 14.04</li>
        <li>PHP 5.6</li>
        <li>HHVM</li>
        <li>Nginx</li>
        <li>MySQL</li>
        <li>Postgres</li>
        <li>Node (With Bower, Grunt, and Gulp)</li>
        <li>Redis</li>
        <li>Memcached</li>
        <li>Beanstalkd</li>
        <li><a href="http://laravel.com/docs/5.0/envoy">Laravel Envoy</a></li>
        <li>Fabric + HipChat Extension</li>
        <li><a href="http://laravel.com/docs/5.0/homestead#blackfire-profiler">Blackfire Profiler</a></li>
    </ul>
    <p><a name="installation-and-setup"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/homestead#installation-and-setup">Installation &amp; Setup</a></h2>
    <h3>Installing VirtualBox / VMware &amp; Vagrant</h3>
    <p>Before launching your Homestead environment, you must install <a href="https://www.virtualbox.org/wiki/Downloads">VirtualBox</a> and <a href="http://www.vagrantup.com/downloads.html">Vagrant</a>. Both of these software packages provide easy-to-use visual installers for all popular operating systems.</p>
    <p dir="rtl"> قبل از راه اندازی محیط  homestead بایستی از نصب virtual box and vagrant اطمینان حاصل نمایید.
        هر دو این بسته های نرم افزاری نصب گرافیکی راحتی را برای سیستم عامل های شناخته شده فراهم اورده اند.
    </p>
    <h4>VMware</h4>
    <p>In addition to VirtualBox, Homestead also supports VMware. To use the VMware provider, you will need to purchase both VMware Fusion / Desktop and the <a href="http://www.vagrantup.com/vmware">VMware Vagrant plug-in</a>. VMware provides much faster shared folder performance out of the box.</p>
    <p dir="rtl">علاوه بر virtual box homestead  از vmware  هم پشتیبانی می کند برای استفاده از vmware  شما علاوه بر خرید vmware  برای کامپیوترتان شما بایستی vmware vagrant plugin  را هم خریداری کنید.vmware  کارایی به اشتراک گذاری پوشه ها در ان بالاتر است.</p>
    <h3>Adding The Vagrant Box</h3>
    <p>Once VirtualBox / VMware and Vagrant have been installed, you should add the <code class=" language-php">laravel<span class="token operator">/</span>homestead</code> box to your Vagrant installation using the following command in your terminal. It will take a few minutes to download the box, depending on your Internet connection speed:</p>
    <p dir="rtl">یک بار که virtual box and vagrant نصب شدند شمابایستی جعبه laravel/homestead را به واگرانتی که نصب کردید با دستور زیر اضافه کنید بسته به سرعت اینترنتتان ممکن است چند ساعت به طول بینجامد.</p>
    <pre class=" language-php"><code class=" language-php">vagrant box add laravel<span class="token operator">/</span>homestead</code></pre>
    <p>If this command fails, you may have an old version of Vagrant that requires the full URL:</p>
    <p dir="rtl">اگر این فرمان اجرا نشد احتمالا شما از نسخه های قدیمی واگرانت استفاده می کنید و بایستی از دستور زیر استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php">vagrant box add laravel<span class="token operator">/</span>homestead https<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>atlas<span class="token punctuation">.</span>hashicorp<span class="token punctuation">.</span>com<span class="token operator">/</span>laravel<span class="token operator">/</span>boxes<span class="token operator">/</span>homestead</code></pre>
    <h3>Installing Homestead</h3>
    <h4>Option 1 - Manually Via Git (No Local PHP)</h4>
    <p>If you do not want to install PHP on your local machine, you may install Homestead manually by simply cloning the repository. Consider cloning the repository into a <code class=" language-php">Homestead</code> folder within your "home" directory, as the Homestead box will serve as the host to all of your Laravel (and PHP) projects:</p>
    <p dir="rtl">اگر شما نمی خواهید که php  را بر روی سرور محلی خود نصب کنید شما ممکن است بخواهید homestead را به صورت دستی نصب کنید با استفاده از کپی کردن مخزن ان . در نظر داشته باشید که کپی کنید داخل پوشه homestead در پوشه home هنگامی که جعبه homestead در خدمت قرار گرفت می تواند همه پروزه های php  شما را میزبانی کند.</p>
    <pre class=" language-php"><code class=" language-php">git clone https<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>github<span class="token punctuation">.</span>com<span class="token operator">/</span>laravel<span class="token operator">/</span>homestead<span class="token punctuation">.</span>git Homestead</code></pre>
    <p>Once you have installed the Homestead CLI tool, run the <code class=" language-php">bash init<span class="token punctuation">.</span>sh</code> command to create the <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> configuration file:</p>
    <p dir="rtl">یک بار که شما homestead  رانصب کردید فرمان bash init.sh را اجرا کنید  تا فایل پیکربندی homestead.yaml  ایجاد گردد.</p>
    <pre class=" language-php"><code class=" language-php">bash init<span class="token punctuation">.</span>sh</code></pre>
    <p>The <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file will be placed in your <code class=" language-php"><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>homestead</code> directory.</p>
    <h4>Option 2 - With Composer + PHP Tool</h4>
    <p>Once the box has been added to your Vagrant installation, you are ready to install the Homestead CLI tool using the Composer <code class=" language-php"><span class="token keyword">global</span></code> command:</p>
    <p dir="rtl">یکبار که  جعبه به واگرانت نصب شده شما اضافه شد شما برای نصب homestead  بوسیله فرمان composer global اماده هستید.</p>
    <pre class=" language-php"><code class=" language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> <span class="token string">"laravel/homestead=~2.0"</span></code></pre>
    <p>Make sure to place the <code class=" language-php"><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>composer<span class="token operator">/</span>vendor<span class="token operator">/</span>bin</code> directory in your PATH so the <code class=" language-php">homestead</code> executable is found when you run the <code class=" language-php">homestead</code> command in your terminal.</p>
    <p dir="rtl">از قرار گرفتن ادرس کامپوزر _/.composer/vendor/bin در path اطمینان حاصل کنید حالا فرمان کامپوزر قابل تشخیص خواهد بود.</p>
    <pre class=" language-php"><code class=" language-php"><span class="token constant">PATH</span><span class="token operator">=</span><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>composer<span class="token operator">/</span>vendor<span class="token operator">/</span>bin<span class="token punctuation">:</span><span class="token variable">$PATH</span></code></pre>
    <p>Once you have installed the Homestead CLI tool, run the <code class=" language-php">init</code> command to create the <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> configuration file:</p>
    <p dir="rtl">یکبار که شما homestead را نصب کردید فرمان init برا ی ایجاد فایل homestead.yaml  را استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php">homestead init</code></pre>
    <p>The <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file will be placed in the <code class=" language-php"><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>homestead</code> directory. If you're using a Mac or Linux system, you may edit <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file by running the <code class=" language-php">homestead edit</code> command in your terminal:</p>
    <p dir="rtl">فایل homestead.yaml  در پوشه _/.homestead قرار می گیرد اگر شما از مکینتاش یا لینوکس استفاده می کنید می توانید با فرمان homestead edit این فایل را ویرایش کنید.</p>
    <pre class=" language-php"><code class=" language-php">homestead edit</code></pre>
    <h3>Configure Your Provider</h3>
    <p>The <code class=" language-php">provider</code> key in your <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file indicates which Vagrant provider should be used: <code class=" language-php">virtualbox</code> or <code class=" language-php">vmware_fusion</code>. You may set this to whichever provider you prefer.</p>
    <p dir="rtl">کلید provider  در فایل homestead.yaml  تعیین می کند که کدام تهیه کننده بایستی اجرا شود .virtual box  vmware  شما ممکن است هریک از این ها را تنظیم کنید.</p>
    <pre class=" language-php"><code class=" language-php">provider<span class="token punctuation">:</span> virtualbox</code></pre>
    <h3>Set Your SSH Key</h3>
    <p>Next, you should edit the <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file. In this file, you can configure the path to your public SSH key, as well as the folders you wish to be shared between your main machine and the Homestead virtual machine.</p>
    <p dir="rtl">بعدا شما بایستی فایل homestead.yamlرا ویرایش کنید . در این فایل شما می توانید مسیر کلید عمومی را پیکربندی کنید به همان خوبی که می توانید مسیر پوشه به اشتراک گذاشته شده بین ماشین مجازی homestead وسیستم خودتان.</p>
    <p>Don't have an SSH key? On Mac and Linux, you can generally create an SSH key pair using the following command:</p>
    <p dir="rtl">ایا شما کلید sshرا ندارید؟در مکینتاش و لینوکس شما به طور کلی  با دستور زیر می توانید کلید ssh  تولید کنید.</p>
    <pre class=" language-php"><code class=" language-php">ssh<span class="token operator">-</span>keygen <span class="token operator">-</span>t rsa <span class="token operator">-</span>C <span class="token string">"you@homestead"</span></code></pre>
    <p>On Windows, you may install <a href="http://git-scm.com/">Git</a> and use the <code class=" language-php">Git Bash</code> shell included with Git to issue the command above. Alternatively, you may use <a href="http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html">PuTTY</a> and <a href="http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html">PuTTYgen</a>.</p>
    <p dir="rtl">در ویندوز شما ممکن است git  را نصب کنید و در git bash  فرمان بالا را بکار ببرید.در غیر این صورت شما می توانید از putty and puttygen استفاده کنید.</p>
    <p>Once you have created a SSH key, specify the key's path in the <code class=" language-php">authorize</code> property of your <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file.</p>
    <p dir="rtl">یک با ر که کلید ssh  را تولید کردید مسیر این کلید را در authorizeفایل homestead.yaml  مشخص کنید</p>
    <h3>Configure Your Shared Folders</h3>
    <p>The <code class=" language-php">folders</code> property of the <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file lists all of the folders you wish to share with your Homestead environment. As files within these folders are changed, they will be kept in sync between your local machine and the Homestead environment. You may configure as many shared folders as necessary!</p>
    <p dir="rtl">Folders در فایل homestead.yaml لیست پوشه هایی که می خواهید بین سیستمتان و محیط homestead مشترک باشد را می گیرد.وقتی که فایل های درون این پوشه تغییر می کنند این تغییرات در محیط homestead  نیز اعمال می شود.شما بر اساس نیازتان ممکن اسن چند پوشه را به اشتراک بگذارید.</p>
    <p>To enable <a href="http://docs.vagrantup.com/v2/synced-folders/nfs.html">NFS</a>, just add a simple flag to your synced folder:</p>
    <p dir="rtl">برای فعال کردن nfc فقط یک فلگ ساده اضافه کنید.</p>
<pre class=" language-php"><code class=" language-php">folders<span class="token punctuation">:</span>
        <span class="token operator">-</span> map<span class="token punctuation">:</span> <span class="token operator">~</span><span class="token operator">/</span>Code
        to<span class="token punctuation">:</span> <span class="token operator">/</span>home<span class="token operator">/</span>vagrant<span class="token operator">/</span>Code
        type<span class="token punctuation">:</span> <span class="token string">"nfs"</span></code></pre>
    <h3>Configure Your Nginx Sites</h3>
    <p>Not familiar with Nginx? No problem. The <code class=" language-php">sites</code> property allows you to easily map a "domain" to a folder on your Homestead environment. A sample site configuration is included in the <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file. Again, you may add as many sites to your Homestead environment as necessary. Homestead can serve as a convenient, virtualized environment for every Laravel project you are working on!</p>
    <p dir="rtl">ایا با  nginx اشنا نیستید؟مشکلی نیست خاصیت sites به راحتی به شما این اجازه را می دهد تا یک دامین برای پوشه ای در محیط homestead قرار دهید. پیکربندی سایت در فایل homestead.yaml قرار گرفته است.
        براساس نیازتان ممکن چند سایت  دیگر را نیز اضافه کنید . homestead به عنوان یک محیط راحت و گرافیکی برای هر پروژه ای که با ان کار می کنید به کار گرفته شود.
    </p>
    <p>You can make any Homestead site use <a href="http://hhvm.com/">HHVM</a> by setting the <code class=" language-php">hhvm</code> option to <code class=" language-php"><span class="token boolean">true</span></code>:</p>
    <p dir="rtl">شما می توانید از ویژکی hhvmبا true کردن ان استفاده کنید.</p>
    <pre class=" language-php"><code class=" language-php">sites<span class="token punctuation">:</span>
        <span class="token operator">-</span> map<span class="token punctuation">:</span> homestead<span class="token punctuation">.</span>app
        to<span class="token punctuation">:</span> <span class="token operator">/</span>home<span class="token operator">/</span>vagrant<span class="token operator">/</span>Code<span class="token operator">/</span>Laravel<span class="token operator">/</span><span class="token keyword">public</span>
        hhvm<span class="token punctuation">:</span> <span class="token boolean">true</span></code></pre>
    <h3>Bash Aliases</h3>
    <p>To add Bash aliases to your Homestead box, simply add to the <code class=" language-php">aliases</code> file in the root of the <code class=" language-php"><span class="token operator">~</span><span class="token operator">/</span><span class="token punctuation">.</span>homestead</code> directory.</p>
    <p dir="rtl">برای اضافه کردن bash aliases به جعبه homestead به سادگی فایل aliases را در پوشه _/.homestead  قرار دهید.</p>
    <h3>Launch The Vagrant Box</h3>
    <p>Once you have edited the <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> to your liking, run the <code class=" language-php">homestead up</code> command from your Homestead directory.</p>
    <p dir="rtl">هنگامی که فایل homestead.yaml  را ویرایش کردید فرمان homestead up را در پوشه homestead  اجرا کنید </p>
    <p>Vagrant will boot the virtual machine, and configure your shared folders and Nginx sites automatically! To destroy the machine, you may use the <code class=" language-php">vagrant destroy <span class="token operator">--</span>force</code> command.</p>
    <p dir="rtl">Vagrant ماشین مجازی را راه اندازی می کند و پیکر بندی می کند پوشه های به اشتراک گذاشته شده و سایت های nginx را به صورت اتوماتیک برای نابود کردن ماشین نیز از فرمان  vagrant destroy –force استفاده می کنیم.</p>
    <p>Don't forget to add the "domains" for your Nginx sites to the <code class=" language-php">hosts</code> file on your machine! The <code class=" language-php">hosts</code> file will redirect your requests for the local domains into your Homestead environment. On Mac and Linux, this file is located at <code class=" language-php"><span class="token operator">/</span>etc<span class="token operator">/</span>hosts</code>. On Windows, it is located at <code class=" language-php">C<span class="token punctuation">:</span>\<span class="token package">Windows<span class="token punctuation">\</span>System32<span class="token punctuation">\</span>drivers<span class="token punctuation">\</span>etc<span class="token punctuation">\</span>hosts</span></code>. The lines you add to this file will look like the following:</p>
    <p dir="rtl">از اضافه کردن دامین برای سایت nginx در فایل host  سیستم تان فراموش نکنید.
        فایل host درخواست های شما را از ماشین محلی به محیط homestead مسیریابی می کند.در مکینتاش و لینوکس این فایل در /etc/hosts فرار می گیرد و در ویندوز در C:\Windows\System32\drivers\etc\hosts. قرار می گیرد.خطی شبیه به این را به فایل اضافه کنید.
    </p>
    <pre class=" language-php"><code class=" language-php"><span class="token number">192.168</span><span class="token punctuation">.</span><span class="token number">10.10</span>  homestead<span class="token punctuation">.</span>app</code></pre>
    <p>Make sure the IP address listed is the one you set in your <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file. Once you have added the domain to your <code class=" language-php">hosts</code> file, you can access the site via your web browser!</p>
    <p dir="rtl">مطمئن شوید که ipادرس در این فایل با فایل homestead.yamlمطابقت داشته باشد.یک بار که این را اضافه کنید سایت شما از طریق مرورگر در دسترس خواهد بود.</p>

    <pre class=" language-php"><code class=" language-php">http<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>homestead<span class="token punctuation">.</span>app</code></pre>
    <p>To learn how to connect to your databases, read on!</p>
    <p dir="rtl">برای یادگیری نحوه اتصال به پایگاه داده به خواندن ادامه دهید.</p>
    <p><a name="daily-usage"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/homestead#daily-usage">Daily Usage</a></h2>
    <h3>Connecting Via SSH</h3>
    <p>To connect to your Homestead environment via SSH, issue the <code class=" language-php">vagrant ssh</code> command from your Homestead directory.</p>
    <p dir="rtl">برای اتصال به محیط homestead بوسیله ssh فرمان vagrant ssh رادر پوشه homestead  اجرا کنید.</p>
    <p>Since you will probably need to SSH into your Homestead machine frequently, consider creating an "alias" on your host machine:</p>
    <p dir="rtl">از انجا که شمااحتمالا نیاز دارین به ssh برای اتصال متناوب به محیط homestead ایجاد یک نام مستعار  را درنظر داشته باشید.</p>
    <pre class=" language-php"><code class=" language-php">alias vm<span class="token operator">=</span><span class="token string">"ssh vagrant@127.0.0.1 -p 2222"</span></code></pre>
    <p>Once you create this alias, you can simply use the "vm" command to SSH into your Homestead machine from anywhere on your system.</p>
    <p dir="rtl">یکبار که این نام مستعار را تولید کردید شما به راحتی می توانید از vm برای اتصال به homestead از هر مکانی استفاده کنید.</p>
    <h3>Connecting To Your Databases</h3>
    <p>A <code class=" language-php">homestead</code> database is configured for both MySQL and Postgres out of the box. For even more convenience, Laravel's <code class=" language-php">local</code> database configuration is set to use this database by default.</p>
    <p dir="rtl">یک پایگاه داده homestead برای mysql and postgres پیکربندی شده است.برای راحتی بیشتر پایگاه محلی local  پیکربندی شده است تا به صورت پیش فرض استفاده شود.</p>
    <p>To connect to your MySQL or Postgres database from your main machine via Navicat or Sequel Pro, you should connect to <code class=" language-php"><span class="token number">127.0</span><span class="token punctuation">.</span><span class="token number">0.1</span></code> and port 33060 (MySQL) or 54320 (Postgres). The username and password for both databases is <code class=" language-php">homestead</code> / <code class=" language-php">secret</code>.</p>
    <p dir="rtl">برای اتصال به پایگاه داده mysql and postgres از سیستم اصلی به وسیله  navicat or sequel pro  شما بایستی به 127.0.0.1و پورت 33060برای  mysql و54320 برای postgres استفاده کنید.یوزر وپسورد برای هر دو پایگاه homestead/secret است.</p>
    <blockquote>
        <p><strong>Note:</strong> You should only use these non-standard ports when connecting to the databases from your main machine. You will use the default 3306 and 5432 ports in your Laravel database configuration file since Laravel is running <em>within</em> the Virtual Machine.</p>
        <p dir="rtl">برای اتصال به پایگاه داده mysql and postgres از سیستم اصلی به وسیله  navicat or sequel pro  شما بایستی به 127.0.0.1و پورت 33060برای  mysql و54320 برای postgres استفاده کنید.یوزر وپسورد برای هر دو پایگاه homestead/secret است.</p>
    </blockquote>
    <h3>Adding Additional Sites</h3>
    <p>Once your Homestead environment is provisioned and running, you may want to add additional Nginx sites for your Laravel applications. You can run as many Laravel installations as you wish on a single Homestead environment. There are two ways to do this: First, you may simply add the sites to your <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file and then run <code class=" language-php">homestead provision</code> or <code class=" language-php">vagrant provision</code>.</p>
    <p dir="rtl">یکبار که محیط homestead تهیه و اجرا شد شما ممکن است بخواهید سایت های بیشتری را به برنامه تان اضافه کنید .شما می توانید لاراول های نصبی زیادی را در یک محیط homestead  اجرا کنید. دو راه برای این کار وجود دارد یکی اینکه شما می توانید به سادگی سایت ر به homestead.yaml  اضافه کنید و homestead provision  یا vagrant provision را اجرا کنید.</p>

    <blockquote>
        <p><strong>Note:</strong> This process is destructive. When running the <code class=" language-php">provision</code> command, your existing databases will be destroyed and recreated.</p>
        <p dir="rtl">بیاد داشته باشید که این یک فرایند مخرب است وقتی فرمان provision   را اجرا می کنید پایگاه داده موجود خراب می شود و دوباره تولید می شود.</p>
    </blockquote>
    <p>Alternatively, you may use the <code class=" language-php">serve</code> script that is available on your Homestead environment. To use the <code class=" language-php">serve</code> script, SSH into your Homestead environment and run the following command:</p>
    <p dir="rtl">ثانیا شما می توانید از فرمان serve استفاده کنید که در محیط homestead  در دسترس است.برای استفاده از فرمان serve sshرا در محیط homestead قرار می دهیم و فرمان زیر را اجرا می کنیم.</p>
    <pre class=" language-php"><code class=" language-php">serve domain<span class="token punctuation">.</span>app <span class="token operator">/</span>home<span class="token operator">/</span>vagrant<span class="token operator">/</span>Code<span class="token operator">/</span>path<span class="token operator">/</span>to<span class="token operator">/</span><span class="token keyword">public</span><span class="token operator">/</span>directory <span class="token number">80</span></code></pre>
    <blockquote>
        <p><strong>Note:</strong> After running the <code class=" language-php">serve</code> command, do not forget to add the new site to the <code class=" language-php">hosts</code> file on your main machine!</p>
        <p dir="rtl">بعد از اجرای فرمان serve  از اضافه کردن سایت جدید به فایل hostماشین اصلی فراموش نکنید .</p>
    </blockquote>
    <p><a name="ports"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/homestead#ports">Ports</a></h2>
    <p>The following ports are forwarded to your Homestead environment:</p>
    <ul>
        <li><strong>SSH:</strong> 2222 → Forwards To 22</li>
        <li><strong>HTTP:</strong> 8000 → Forwards To 80</li>
        <li><strong>MySQL:</strong> 33060 → Forwards To 3306</li>
        <li><strong>Postgres:</strong> 54320 → Forwards To 5432</li>
    </ul>
    <h3>Adding Additional Ports</h3>
    <p>If you wish, you may forward additional ports to the Vagrant box, as well as specify their protocol:</p>
    <p dir="rtl">اگر شما بخواهید می توانید پورت های اضافی را به جعبه vagrant اضافه کنید.
        به همین خوبی که این پروتکل تعیین کرده
    </p>
<pre class=" language-php"><code class=" language-php">ports<span class="token punctuation">:</span>
        <span class="token operator">-</span> send<span class="token punctuation">:</span> <span class="token number">93000</span>
        to<span class="token punctuation">:</span> <span class="token number">9300</span>
        <span class="token operator">-</span> send<span class="token punctuation">:</span> <span class="token number">7777</span>
        to<span class="token punctuation">:</span> <span class="token number">777</span>
        protocol<span class="token punctuation">:</span> udp</code></pre>
    <p><a name="blackfire-profiler"></a></p>
    <h2><a href="http://laravel.com/docs/5.0/homestead#blackfire-profiler">Blackfire Profiler</a></h2>
    <p><a href="https://blackfire.io/">Blackfire Profiler</a> by SensioLabs automatically gathers data about your code's execution, such as RAM, CPU time, and disk I/O. Homestead makes it a breeze to use this profiler for your own applications.</p>
    <p dir="rtl">سط sensiolabs به صورت اتوماتیک داده ها در مورد اجرای کد را جمع اوری می کند از جمله  ram cpu time disk i/o. Homestead استفاده از این profiler برای برنامه را خیلی راحت می کند.</p>
    <p>All of the proper packages have already been installed on your Homestead box, you simply need to set a Blackfire <strong>Server</strong> ID and token in your <code class=" language-php">Homestead<span class="token punctuation">.</span>yaml</code> file:</p>
    <p dir="rtl">همه بسته های مناسب پیش از این در جعبه  homestead  نصب شده اند وشما به راحتی نیاز دارید که  id and token  blackfire در فایل homestead.yaml تنظیم کنید.</p>
<pre class=" language-php"><code class=" language-php">blackfire<span class="token punctuation">:</span>
        <span class="token operator">-</span> id<span class="token punctuation">:</span> your<span class="token operator">-</span>server<span class="token operator">-</span>id
        token<span class="token punctuation">:</span> your<span class="token operator">-</span>server<span class="token operator">-</span>token
        client<span class="token operator">-</span>id<span class="token punctuation">:</span> your<span class="token operator">-</span>client<span class="token operator">-</span>id
        client<span class="token operator">-</span>token<span class="token punctuation">:</span> your<span class="token operator">-</span>client<span class="token operator">-</span>token</code></pre>
    <p>Once you have configured your Blackfire credentials, re-provision the box using <code class=" language-php">homestead provision</code> or <code class=" language-php">vagrant provision</code>. Of course, be sure to review the <a href="https://blackfire.io/getting-started">Blackfire documentation</a> to learn how to install the Blackfire companion extension for your web browser.</p>
</article>

@stop