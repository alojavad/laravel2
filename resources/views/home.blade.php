@extends('app')

@section('content')





<nav class="navbar navbar-default">
<div class="container-fluid">

<div class="navbar-header">


    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>


<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<div role="tabpanel">

<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    <ul class="nav navbar-nav">
        <li >&nbsp;</li>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li >&nbsp;</li>
        <li><a href="{{ url('/tag') }}">Tag</a></li>
        <li >&nbsp;</li>
        <li><a href="{{ url('/news/create') }}">Add News</a></li>
        <li >&nbsp;</li>
        <li><button type="button" class="btn btn-lg btn-info" onclick="location.href='{{ route("laravel1") }}'" >laravel(persian)</button></li>
        <li >&nbsp;</li>
        <li ><button type="button" class="btn btn-lg btn-info" ><a href="{{URL::to('forum')}}">Forum</a> </button></li>
        <li >&nbsp;</li>



    </ul>

    <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
        <li><a href="{{ url('/auth/login') }}">Login</a></li>
        <li><a href="{{ url('/auth/register') }}">Register</a></li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            </ul>
        </li>
        @endif
    </ul>
</ul>


<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="home">
<div  class="navbar-right">
    <img src="{{ asset('/images/entekhab_in_tic.gif')}}">
</div>
<div class="container" dir="rtl">
    <ul class="col-md-10">
        @if ($laster!="")
        <li ><a href="home" target="_blank"> <strong>{{$laster->title}}</strong></a> </li>
        @endif
    </ul>

</div>
<hr>
<div class="col-md-4">

    <!-- start of left -->


    <div class="col3"> 			 				 	<div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div> 				 				<div class="wrapper"></div> 				 				 				<div class="tab_col">				 					 	<div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div> 					<!-- Start Tabs4 -->
            <!--
            <div class="c_tabs">
                <div class="c_tabs_title title_tabs">
                    <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img">
                    <a href="#" class="c_tab1 active_tab" id="most_visited" style="width: 105px;">سخن روز</a>
                    <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
                    <div class="wrapper"></div>
                </div>
                <div class="c_tabs_content" style="display: block;padding: 7px 0px;">
                    <div style="margin-bottom: 16px;width: 230px;direction: rtl;margin-right: 4px;">
                        <a class="picLink" href="/fa/news/209621" target="_blank">
                            <img alt="در اتاق عملیات مخالفان علیه دولت این روزها چه می گذرد؟" class="fl" src="{{ asset('/images/94851_457.jpg')}}" width="219" style="margin-bottom: 5px;width: 219px;height: 124px;">
                        </a>
                        <div align="justify" dir="rtl" class="rutitr" style="margin-bottom: 4px;text-align: center;"></div>
                        <div style="margin-bottom: 5px;text-align: center;">
                            <img alt="" src="{{asset ('/images/dot.gif')}}" border="0">
                            <a class="title66" href="/fa/news/209621" title="08:30 - 1394/03/23" target="_blank">
                                در اتاق عملیات مخالفان علیه دولت این روزها چه می گذرد؟
                            </a>
                        </div>
                        <div class="lead3a"></div>
                        <div class="wrapper"></div>
                    </div>


                </div>
                <div class="b_curv" style="margin-bottom: 5px;">
                    <img alt="" src="{{ asset('/images/inn_b_r_box.gif')}}" class="fr_img">
                    <img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img">
                    <div class="wrapper"></div>
                </div>
            </div>
            -->
            <!-- End Tabs4 -->
            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;">
                    <a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank">
                        <img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div>
            </div>
            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;">
                    <a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank">
                        <img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div>
            </div>
            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;">
                    <a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank">
                        <img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div>
            </div>
            <div class="wrapper">

            </div>
            <!-- Start Poll -->
        <!--
            <div class="c_tabs">
                <div class="c_tabs_title">
                    <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img">
                    <span href="#" class="c_tab1 active_tab" id="latest">نظرسنجی</span> 		<img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img"> 	<div class="wrapper"></div> 	</div> 	<div class="c_tabs_content" style="width: 238px;"> 		<div class="c_tabs_content1 active_content" style="padding: 0px 10px; width: 218px;"> 			 	<div class="poll_title"> 		اگر به ایام انتخابات ریاست جمهوری 92 بازگردید، به چه کسی رای خواهید داد؟ 	</div>
                        <div class="poll_result_container" style="width: 195px;">
                            <div class="poll_options"> 					سعید جلیلی 				</div>
                            <div class="poll_options">    			 	 	    			 	 	<div class="poll_bar_outter" style="width:195px;">
                                    <div class="poll_bar_inner" style="width:13px;"></div>
                                </div>
                                <div style="width:195px;" class="poll_percent">                    		6.52%                    	</div> 				</div> 		 			 				 			 				<div class="poll_options"> 					محسن رضایی 				</div> 				<div class="poll_options">    			 	 	    			 	 	<div class="poll_bar_outter" style="width:195px;">
                                    <div class="poll_bar_inner" style="width:8px;"></div> 		 	 		</div>                    	<div style="width:195px;" class="poll_percent">                    		4.16%                    	</div> 				</div> 		 			 				 			 				<div class="poll_options"> 					حسن روحانی 				</div> 				<div class="poll_options">    			 	 	    			 	 	<div class="poll_bar_outter" style="width:195px;">    			 	 		<div class="poll_bar_inner" style="width:151px;"></div> 		 	 		</div>
                                <div style="width:195px;" class="poll_percent">                    		77.65%                    	</div> 				</div> 		 			 				 			 				<div class="poll_options"> 					محمد غرضی 				</div> 				<div class="poll_options">    			 	 	    			 	 	<div class="poll_bar_outter" style="width:195px;">    			 	 		<div class="poll_bar_inner" style="width:6px;"></div> 		 	 		</div>                    	<div style="width:195px;" class="poll_percent">                    		2.96%                    	</div> 				</div> 		 			 				 			 				<div class="poll_options"> 					محمدباقر قالیباف 				</div> 				<div class="poll_options">    			 	 	    			 	 	<div class="poll_bar_outter" style="width:195px;">    			 	 		<div class="poll_bar_inner" style="width:12px;"></div> 		 	 		</div>
                                <div style="width:195px;" class="poll_percent">                    		5.97%                    	</div> 				</div> 		 			 				 			 				<div class="poll_options"> 					علی اکبر ولایتی 				</div> 				<div class="poll_options">    			 	 	    			 	 	<div class="poll_bar_outter" style="width:195px;">    			 	 		<div class="poll_bar_inner" style="width:5px;"></div> 		 	 		</div>                    	<div style="width:195px;" class="poll_percent">                    		2.73%                    	</div> 				</div> 		 		       		<div class="poll_text">       			تعداد کل آراء : 26736       		</div>
                            <div class="poll_archive_c">
                                <a href="/fa/polls/archive" class="poll_text"> 					آرشیو 				</a>
                            </div>
                        </div>
                    </div> 	</div> 	<div class="b_curv" style="margin-bottom: 5px;">
                    <img alt="" src="{{ asset('images/inn_b_r_box.gif')}}" class="fr_img">
                    <img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img">
                    <div class="wrapper"></div>
                </div>
            </div>
              	-->
        <!-- End Poll -->
        <div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div>
            <div class="wrapper"> </div>
            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;">
                    <a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div>
            </div>
        <div class="wrapper"></div>
            <!-- Start Tabs4 -->

    <!--
        <div class="c_tabs">
            <div class="c_tabs_title title_tabs">
                <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img">
                <span href="#" class="c_tab_0">پربازدید ها</span>

                <a href="#" class="c_tab1 active_tab" id="most_visited_24" style="margin-left: 0px;">۸ ساعت اخیر</a>
                <a href="#" class="c_tab2" id="most_visited_48" style="margin-left: 0px;">۲۴ ساعت اخیر</a>

                <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
                <div class="wrapper"></div>
            </div>
                <div class="c_tabs_content content_tabs jquery_odd_background">
                    <div class="c_tabs_content1 active_content" id="most_visited_24_content">
                        <div class="t_l_content" style="padding-left: 4px; padding-right: 4px;">
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="/client/themes/fa/main/l_bimg/olet.gif" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209632/تصویر-جان-کری-بعد-از-خروج-از-بیمارستان" title="تصویر : جان کری بعد از خروج از بیمارستان" target="_blank"> 	        تصویر : جان کری بعد از خروج از بیمارستان 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209638/مفتي-سعودي-فتواي-جهاد-نکاح-با-محارم-را-صادر-کرد" title="مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد!" target="_blank"> 	        مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد! 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209657/تصویر-ظریف-همسر-و-دخترش-در-افتتاحیه-ارکستر-ملی" title="تصویر: ظریف، همسر و دخترش در افتتاحیه ارکستر ملی" target="_blank"> 	        تصویر: ظریف، همسر و دخترش در افتتاحیه ارکستر ملی 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209619/کمک-نظامی-ایران-به-طالبان-برای-تقابل-با-داعش" title="کمک نظامی ایران به طالبان برای تقابل با داعش!" target="_blank"> 	        کمک نظامی ایران به طالبان برای تقابل با داعش! 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209664/تصاویر-ظریف-و-جنتی-در-گالری-نیاوران" title="تصاویر : ظریف و جنتی در گالری نیاوران" target="_blank"> 	        تصاویر : ظریف و جنتی در گالری نیاوران 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209621/در-اتاق-عملیات-مخالفان-علیه-دولت-این-روزها-چه-می-گذرد" title="در اتاق عملیات مخالفان علیه دولت این روزها چه می گذرد؟" target="_blank"> 	        در اتاق عملیات مخالفان علیه دولت این روزها چه می گذرد؟ 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209620/لیبرمن-ایرانی-ها-در-دوره-ی-روحانی-لحظه-ای-بیکار-ننشسته-اند-آنها-هر-هفته-از-نابودی-اسرائیل-سخن-می-گویند-واقعا-وحشتناک-است-که-مقامات-کشورها-با-ایرانی-ها-غذا-می-خورند-و-می-خندند" title="لیبرمن: ایرانی ها در دوره ی روحانی لحظه ای بیکار ننشسته اند؛ آنها هر هفته از نابودی اسرائیل سخن می گویند / واقعا وحشتناک است که مقامات کشورها با ایرانی ها غذا می خورند و می خندند!" target="_blank"> 	        لیبرمن: ایرانی ها در دوره ی روحانی لحظه ای بیکار ننشسته اند؛ آنها هر هفته از نابودی اسرائیل سخن می گویند / واقعا وحشتناک است که مقامات کشورها با ایرانی ها غذا می خورند و می خندند! 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209670/ریابکوف-دور-کنونی-مذاکرات-در-وین-بیش-از-انتظار-پیشرفت-داشته-بر-روی-عدم-بازگشت-خودکار-تحریم-ها-توافق-کردیم" title="ریابکوف: دور کنونی مذاکرات در وین بیش از انتظار پیشرفت داشته / بر روی عدم بازگشت خودکار تحریم ها توافق کردیم" target="_blank"> 	        ریابکوف: دور کنونی مذاکرات در وین بیش از انتظار پیشرفت داشته / بر روی عدم بازگشت خودکار تحریم ها توافق کردیم 	    </a> 	</div> 	 	</div>
                    </div>
                    <div class="c_tabs_content2" id="most_visited_48_content"> 								 	<div class="t_l_content" style="padding-left: 4px; padding-right: 4px;"> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209618/مذاکرات-هسته-ای-عملا-به-بن-بست-خورده-است-احتمالا-گفتگوها-تمدید-می-شود" title="مذاکرات هسته ای عملا به بن بست خورده است؛ احتمالا گفتگوها تمدید می شود" target="_blank"> 	        مذاکرات هسته ای عملا به بن بست خورده است؛ احتمالا گفتگوها تمدید می شود 	    </a>
                            </div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209559/جزئیات-برخورد-فیزیکی-استاد-دانشگاه-تهران-با-یکی-از-دانشجویان" title="جزئیات برخورد فیزیکی استاد دانشگاه تهران با یکی از دانشجویان" target="_blank"> 	        جزئیات برخورد فیزیکی استاد دانشگاه تهران با یکی از دانشجویان 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209632/تصویر-جان-کری-بعد-از-خروج-از-بیمارستان" title="تصویر : جان کری بعد از خروج از بیمارستان" target="_blank"> 	        تصویر : جان کری بعد از خروج از بیمارستان 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209580/اینکه-بگوییم-تحریم-ها-اثری-نداشته-مثل-این-است-که-بگوییم-بمباران-صدام-اثر-نداشته-برخی-گفتند-فلانی-گفته-امام-آزادی-خواه-نبوده-یعنی-جنایت-تا-کجا" title="اینکه بگوییم تحریم ها اثری نداشته، مثل این است که بگوییم بمباران صدام اثر نداشته / برخی گفتند فلانی گفته «امام آزادی خواه نبوده»؛ یعنی جنایت تا کجا؟" target="_blank"> 	        اینکه بگوییم تحریم ها اثری نداشته، مثل این است که بگوییم بمباران صدام اثر نداشته / برخی گفتند فلانی گفته «امام آزادی خواه نبوده»؛ یعنی جنایت تا کجا؟ 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209638/مفتي-سعودي-فتواي-جهاد-نکاح-با-محارم-را-صادر-کرد" title="مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد!" target="_blank"> 	        مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد! 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209657/تصویر-ظریف-همسر-و-دخترش-در-افتتاحیه-ارکستر-ملی" title="تصویر: ظریف، همسر و دخترش در افتتاحیه ارکستر ملی" target="_blank"> 	        تصویر: ظریف، همسر و دخترش در افتتاحیه ارکستر ملی 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209575/پست-متفاوت-شهاب-حسینی-در-اینستاگرام" title="پست متفاوت شهاب حسینی در اینستاگرام" target="_blank"> 	        پست متفاوت شهاب حسینی در اینستاگرام 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 	<img alt="" src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;"> 	    <a class="title4" href="/fa/news/209619/کمک-نظامی-ایران-به-طالبان-برای-تقابل-با-داعش" title="کمک نظامی ایران به طالبان برای تقابل با داعش!" target="_blank"> 	        کمک نظامی ایران به طالبان برای تقابل با داعش! 	    </a> 	</div> 	 	</div>
                    </div>
                </div>
                <div class="b_curv" style="margin-bottom: 5px;">

                    <img alt="" src="{{ asset('/images/inn_b_r_box.gif')}}" class="fr_img">
                    <img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img">
                    <div class="wrapper"></div>
                </div>
        </div>
        -->

    <!-- End Tabs4 -->


    <!-- Mohemtarin Anavin -->



            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div> 					 	<div class="c_tabs">
        <div class="c_tabs_title title_tabs"> 			<img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img"> 			<a href="#" class="c_tab1 active_tab" id="most_visited" style="width: 105px;">مهمترین عناوین روز</a> 			<img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
                <div class="c_tabs_content content_tabs"> 			<div class="tab_p tab_page1 active_tab_p jquery_odd_background" style="display: block;"> 				<div style="width: 100%; height: 100%;">
                            @if ($best!="")
                            @foreach ($best as $db)
                            @if (($db->id %2)==0)
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;">




                                <img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt="">
                                <a class="title4" href="/news/{{$db->id}}" title="12:10 - 1394/03/23" target="_blank">{{ $db->title }} </a>

                            </div>
                            @endif
                            @if (($db->id %2)==1)
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);">
                                <img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt="">
                                <a class="title4" href="news/{{$db->id}}" title="11:22 - 1394/03/23" target="_blank">{{ $db->title }} </a>
                            </div>
                            @endif
                            @endforeach
                            @endif



                            <div class="wrapper" style="padding-left: 4px; padding-right: 4px;"></div>
                        </div>
                    </div>


                    <!--
                    <div class="cycle_nav">
                        <a href="#tab_page2" id="tab_page2">۲</a>
                        <a href="#tab_page1" class="activeSlide" id="tab_page1">۱</a>
                        <div class="wrapper"></div>
                    </div>
                    -->


                </div>
        <div class="b_curv" style="margin-bottom: 5px;">
            <img alt="" src="{{ asset('/images/inn_b_r_box.gif')}}" class="fr_img"> 			<img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img"> 			<div class="wrapper"></div> 		</div> 	</div>   					<!-- Mohemtarin Anavin --> 					 					 	<div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a>
        </div>
    </div>
    <div class="wrapper"></div>

            <!-- Start Tab1 -->
    <div class="c_tabs">
        <div class="c_tabs_title title_tabs">
            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img"> 							<a href="#" class="c_tab1 active_tab" id="latest">آخرین اخبار</a> 							<a href="#" class="c_tab2" id="most_commented">پربحث ترین عناوین</a> 							<img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>

                <div class="c_tabs_content content_tabs jquery_odd_background">
                    <div class="" id="latest_content"> <!-- c_tabs_content1 active_content  -->
                        @if ($last!="")
                        @foreach ($last as $db)
                        @if (($db->id %2)==0)

                        <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;">
                            <img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt="">
                            <a class="title4" href="news/{{$db->id}}" title="12:44 - 1394/03/23" target="_blank">{{ $db->title }}</a>
                        </div>
                        @endif
                        @if (($db->id %2)==1)

                        <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);">
                            <img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt="">
                            <a class="title4" href="news/{{$db->id}}" title="12:42 - 1394/03/23" target="_blank">{{ $db->title }}</a>
                        </div>
                        @endif
                        @endforeach
                        @endif














                    </div>
                    <!--
                    <div class="c_tabs_content2" id="most_commented_content">
                        <div class="t_l_content" style="padding-left: 4px; padding-right: 4px;">
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;">
                                <img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt="">
                                <a class="title4" href="/fa/news/209054/باز-هم-تلاش-فتوشاپی-دلواپسان-برای-توهین-به-ظریف-تصویر" title="باز هم تلاش فتوشاپی دلواپسان، برای توهین به ظریف! + تصویر" target="_blank"> 	         				باز هم تلاش فتوشاپی دلواپسان، برای توهین به ظریف! + تصویر<span>&nbsp; (۱۶۳ نظر)</span>
                                </a>
                            </div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);">
                                <img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt="">
                                <a class="title4" href="/fa/news/208646/روحانی-کسانی-که-باعث-ایجاد-تحریم&zwnj;ها-شدند-در-حق-مردم-خیانت-کردند-تا-می&zwnj;گوئیم-تحریم-ها-باید-از-بین-برود-برخی-چشم-خود-را-بی&zwnj;خود-می-چرخانند" title="روحانی: کسانی که باعث ایجاد تحریم&zwnj;ها شدند در حق مردم خیانت کردند / تا می&zwnj;گوئیم تحریم ها باید از بین برود برخی چشم خود را بی&zwnj;خود می چرخانند" target="_blank"> 	         				روحانی: کسانی که باعث ایجاد تحریم&zwnj;ها شدند در حق مردم خیانت کردند / تا می&zwnj;گوئیم تحریم ها باید از بین برود برخی چشم خود را بی&zwnj;خود می چرخانند<span>&nbsp; (۱۴۰ نظر)</span>
                                </a>
                            </div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208902/حمید-بقایی-بازداشت-شد" title="حمید بقایی بازداشت شد" target="_blank"> 	         				حمید بقایی بازداشت شد<span>&nbsp; (۱۰۵ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208866/وزیر-بهداشت-مسمومیت-زائران-عربستانی-در-مشهد-به-لحاظ-پزشکی-عمدی-بوده-این-افراد-با-سم-غیر-مجاز-مسموم-شده-اند-تکذیبیه-وزارت-بهداشت-هاشمی-نگفت-مسمومیت-عمدی-بوده" title="وزیر بهداشت: مسمومیت زائران عربستانی در مشهد به لحاظ پزشکی »عمدی» بوده / این افراد با سم غیر مجاز مسموم شده اند / تکذیبیه وزارت بهداشت: هاشمی نگفت مسمومیت «عمدی» بوده" target="_blank"> 	         				وزیر بهداشت: مسمومیت زائران عربستانی در مشهد به لحاظ پزشکی »عمدی» بوده / این افراد با سم غیر مجاز مسموم شده اند / تکذیبیه وزارت بهداشت: هاشمی نگفت مسمومیت «عمدی» بوده<span>&nbsp; (۷۳ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209212/حداد-خدایی-نکرده-نباید-مجلسی-شبیه-آنچه-قبلا-دیدیم-پدید-آید-برای-انتخابات-خبرگان-و-مجلس-برنامه-دارند" title="حداد: خدایی نکرده نباید مجلسی شبیه آنچه قبلا دیدیم پدید آید / برای انتخابات خبرگان و مجلس برنامه دارند" target="_blank"> 	         				حداد: خدایی نکرده نباید مجلسی شبیه آنچه قبلا دیدیم پدید آید / برای انتخابات خبرگان و مجلس برنامه دارند<span>&nbsp; (۷۳ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209485/کاهش-یک-درصدی-محبوبیت-حسن-روحانی-نسبت-به-سال-گذشته-رضایت-تحصیلکرده-ها-از-عملکرد-روحانی" title="کاهش یک درصدی محبوبیت حسن روحانی نسبت به سال گذشته / رضایت تحصیلکرده ها از عملکرد روحانی" target="_blank"> 	         				کاهش یک درصدی محبوبیت حسن روحانی نسبت به سال گذشته / رضایت تحصیلکرده ها از عملکرد روحانی<span>&nbsp; (۷۲ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208624/نظر-ظریف-درباره-آنقدر-قطعنامه-صادر-کنید-تا-قطعنامه&zwnj;دان&zwnj;تان-پاره-شود" title="نظر ظریف درباره " آنقدر="" قطعنامه="" صادر="" کنید="" تا="" قطعنامه&zwnj;دان&zwnj;تان="" پاره="" شود""="" target="_blank"> 	         				نظر ظریف درباره "آنقدر قطعنامه صادر کنید تا قطعنامه&zwnj;دان&zwnj;تان پاره شود"<span>&nbsp; (۶۸ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209340/حکم-دادگاه-عربستان-برای-دو-مامور-خاطی-فرودگاه-جده-4-سال-زندان-و-هزار-ضربه-شلاق-مقام-اگاه-در-وزارت-خارجه-این-خبر-صحت-ندارد" title="حکم دادگاه عربستان برای دو مامور خاطی فرودگاه جده: 4 سال زندان و هزار ضربه شلاق! / مقام اگاه در وزارت خارجه: این خبر صحت ندارد" target="_blank"> 	         				حکم دادگاه عربستان برای دو مامور خاطی فرودگاه جده: 4 سال زندان و هزار ضربه شلاق! / مقام اگاه در وزارت خارجه: این خبر صحت ندارد<span>&nbsp; (۶۳ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209119/معاون-روحانی-بانوان-می-توانند-به-ورزشگاهها-بیایند-بجز-فوتبال-کشتی-و-شنا-دولت-امیدوار-است-از-تقابل-با-تندروها-خودداری-کند" title="معاون روحانی: بانوان می توانند به ورزشگاهها بیایند، بجز فوتبال ، کشتی و شنا/ دولت امیدوار است از تقابل با تندروها خودداری کند" target="_blank"> 	         				معاون روحانی: بانوان می توانند به ورزشگاهها بیایند، بجز فوتبال ، کشتی و شنا/ دولت امیدوار است از تقابل با تندروها خودداری کند<span>&nbsp; (۶۲ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208804/پیام-اینستاگرامی-مهراب-قاسم-خانی-به-جهانگیر-الماسی-چرا-ذهن-تون-را-برای-ما-بی-سوادها-آشفته-می-کنید" title="پیام اینستاگرامی مهراب قاسم خانی به جهانگیر الماسی: چرا ذهن تون را برای ما بی سوادها آشفته می کنید!" target="_blank"> 	         				پیام اینستاگرامی مهراب قاسم خانی به جهانگیر الماسی: چرا ذهن تون را برای ما بی سوادها آشفته می کنید!<span>&nbsp; (۶۱ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209309/احمدی-نژاد-بقایی-فردی-انقلابی-و-پاک&zwnj;دست-است-تا-آخر-از-او-دفاع-خواهم-کرد" title="احمدی نژاد: بقایی فردی انقلابی و پاک&zwnj;دست است؛ تا آخر از او دفاع خواهم کرد" target="_blank"> 	         				احمدی نژاد: بقایی فردی انقلابی و پاک&zwnj;دست است؛ تا آخر از او دفاع خواهم کرد<span>&nbsp; (۵۴ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208880/امریکا-کوتاه-نمی-آمد-اما-ناگهان-ویلیام-برنز-زنگ-زد-و-گفت-جان-کری-پیشنهاد-جدیدی-دارد-سخن-قائم-مقام-کری-همه-را-به-هیجان-آورد-از-حضور-شش-وزیر-خارجه-در-کنفرانس-ساعت-4-صبح-برای-اعلام-توافق-مبهوت-شدم" title="امریکا کوتاه نمی آمد، اما ناگهان ویلیام برنز زنگ زد و گفت، جان کری پیشنهاد جدیدی دارد / سخن قائم مقام کری همه را به هیجان آورد / از حضور شش وزیر خارجه در کنفرانس ساعت 4 صبح برای اعلام توافق مبهوت شدم" target="_blank"> 	         				امریکا کوتاه نمی آمد، اما ناگهان ویلیام برنز زنگ زد و گفت، جان کری پیشنهاد جدیدی دارد / سخن قائم مقام کری همه را به هیجان آورد / از حضور شش وزیر خارجه در کنفرانس ساعت 4 صبح برای اعلام توافق مبهوت شدم<span>&nbsp; (۵۳ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208960/چرا-این-حساسیت-ها-در-مورد-حجاب-را-در-دولت-قبل-نداشتید-اگر-انتظار-دارید-همشیره-ما-با-لنگه-کفش-از-علی-لاریجانی-استقبال-کند-باید-بگویم-این-اتفاق-نخواهد-افتاد" title="چرا این حساسیت ها در مورد حجاب را در دولت قبل نداشتید؟ / اگر انتظار دارید همشیره ما با لنگه کفش از علی لاریجانی استقبال کند، باید بگویم این اتفاق نخواهد افتاد" target="_blank"> 	         				چرا این حساسیت ها در مورد حجاب را در دولت قبل نداشتید؟ / اگر انتظار دارید همشیره ما با لنگه کفش از علی لاریجانی استقبال کند، باید بگویم این اتفاق نخواهد افتاد<span>&nbsp; (۵۲ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208666/وقتی-تلویزیون-داد-تماشاگران-را-درآورد-باز-هم-ماجرای-صداوسیما-و-پخش-بازی-والیبال" title="وقتی تلویزیون داد تماشاگران را درآورد/ باز هم ماجرای صداوسیما و پخش بازی والیبال" target="_blank"> 	         				وقتی تلویزیون داد تماشاگران را درآورد/ باز هم ماجرای صداوسیما و پخش بازی والیبال<span>&nbsp; (۴۱ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209173/ماجرای-آزار-و-اذیت-دختر-بچه-3-ساله-در-پارک&zwnj;" title="ماجرای آزار و اذیت دختر بچه 3 ساله در پارک&zwnj;" target="_blank"> 	         				ماجرای آزار و اذیت دختر بچه 3 ساله در پارک&zwnj;<span>&nbsp; (۴۱ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208981/بزرگترین-فساد-دولت-احمدی-نژاد" title="بزرگترین فساد دولت احمدی نژاد" target="_blank"> 	         				بزرگترین فساد دولت احمدی نژاد<span>&nbsp; (۳۹ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208909/احمدی-نژادی-ها-منکر-بقایی-شدند-داوری-بقایی-مدتهاست-دفتر-احمدی-نژاد-نمی-آید-تمدن-درس-و-کلاس-دارم-فرصت-شنیدن-این-مسائل-را-ندارم" title="احمدی نژادی ها منکر بقایی شدند / داوری: بقایی مدتهاست دفتر احمدی نژاد نمی آید / تمدن: درس و کلاس دارم، فرصت شنیدن این مسائل را ندارم" target="_blank"> 	         				احمدی نژادی ها منکر بقایی شدند / داوری: بقایی مدتهاست دفتر احمدی نژاد نمی آید / تمدن: درس و کلاس دارم، فرصت شنیدن این مسائل را ندارم<span>&nbsp; (۳۸ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209414/فرق-روحانی-با-احمدی-نژاد-زمین-تا-آسمان-است-مجلس-استیضاح-و-احضارهای-بی-موردی-انجام-می-دهد-روحانی-مرا-نسبت-به-خیلی-ها-کمتر-تحویل-می-گیرد-اما-من-به-شدت-طرفدارش-هستم" title="فرق روحانی با احمدی نژاد زمین تا آسمان است / مجلس، استیضاح و احضارهای بی موردی انجام می دهد / روحانی مرا نسبت به خیلی ها کمتر تحویل می گیرد، اما من به شدت طرفدارش هستم" target="_blank"> 	         				فرق روحانی با احمدی نژاد زمین تا آسمان است / مجلس، استیضاح و احضارهای بی موردی انجام می دهد / روحانی مرا نسبت به خیلی ها کمتر تحویل می گیرد، اما من به شدت طرفدارش هستم<span>&nbsp; (۳۸ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209127/تصاویر-اعطای-نشان-درجه-یک-به-سینماگران" title="تصاویر : اعطای نشان درجه یک به سینماگران" target="_blank"> 	         				تصاویر : اعطای نشان درجه یک به سینماگران<span>&nbsp; (۳۷ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208783/صندلی-اردوغان-به-لرزه-افتاد-حزب-عدالت-و-توسعه-اکثریت-پارلمان-را-از-دست-داد-دولت-ترکیه-ائتلافی-خواهد-بود" title="صندلی اردوغان به لرزه افتاد؛ حزب «عدالت و توسعه» اکثریت پارلمان را از دست داد / دولت ترکیه، ائتلافی خواهد بود" target="_blank"> 	         				صندلی اردوغان به لرزه افتاد؛ حزب «عدالت و توسعه» اکثریت پارلمان را از دست داد / دولت ترکیه، ائتلافی خواهد بود<span>&nbsp; (۳۶ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209042/تلویزیون-بی-خیال-پخش-بازی-های-تیم-ملی-در-لیگ-جهانی-والیبال-شود" title="تلویزیون بی خیال پخش بازی های تیم ملی در لیگ جهانی والیبال شود!" target="_blank"> 	         				تلویزیون بی خیال پخش بازی های تیم ملی در لیگ جهانی والیبال شود!<span>&nbsp; (۳۴ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208806/اسامي-افراد-سرشناس-و-مشهور-در-فهرست-گزارش-فساد-فوتبال-188-سفر-کفاشیان-به-خارج-از-کشور-در-دو-سال" title="اسامي افراد سرشناس و مشهور در فهرست گزارش فساد فوتبال / 188 سفر کفاشیان به خارج از کشور در دو سال!" target="_blank"> 	         				اسامي افراد سرشناس و مشهور در فهرست گزارش فساد فوتبال / 188 سفر کفاشیان به خارج از کشور در دو سال!<span>&nbsp; (۳۳ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208984/توزیع-اطلاعیه-مشکوک-در-سطح-تهرانمنتظر-حضور-خونین-امت-برای-مقابله-با-حضور-زنان-در-ورزشگاه-آزادی-هستیم" title="توزیع اطلاعیه مشکوک در سطح تهران/منتظر حضور خونین امت برای مقابله با حضور زنان در ورزشگاه آزادی هستیم!" target="_blank"> 	         				توزیع اطلاعیه مشکوک در سطح تهران/منتظر حضور خونین امت برای مقابله با حضور زنان در ورزشگاه آزادی هستیم!<span>&nbsp; (۳۳ نظر)</span> 			 	    </a> 	</div>
                            <div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/208982/دومین-مقام-ارشد-دولت-احمدی-نژاد-که-دستگیر-شد-مقامات-دولت-سابق-با-اتهامات-روزافزون-فساد-اقتصادی-مواجه-هستند" title="دومین مقام ارشد دولت احمدی نژاد که دستگیر شد / مقامات دولت سابق با اتهامات روزافزون فساد اقتصادی مواجه هستند" target="_blank"> 	         				دومین مقام ارشد دولت احمدی نژاد که دستگیر شد / مقامات دولت سابق با اتهامات روزافزون فساد اقتصادی مواجه هستند<span>&nbsp; (۳۳ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="{{ asset('/images/l_bolet.gif')}}" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209200/راند-سوم-جدال-اینستاگرامی-کوچک&zwnj;زاده-و-مطهری" title="راند سوم جدال اینستاگرامی کوچک&zwnj;زاده و مطهری" target="_blank"> 	         				راند سوم جدال اینستاگرامی کوچک&zwnj;زاده و مطهری<span>&nbsp; (۳۳ نظر)</span> 			 	    </a>
                            </div>
                        </div>
                    </div>

                    -->


                </div>
        <div class="b_curv" style="margin-bottom: 5px;">
            <img alt="" src="{{ asset('/images/inn_b_r_box.gif')}}" class="fr_img">
            <img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
    </div>
    <!-- End Tab1 -->

            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank">
                        <img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a>
                </div>
            </div>
    <div class="wrapper"></div>
    </div>
        <div class="adv_col">
            <!--
            <div class="ads" style="display:block;">
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/625" target="_blank"><img alt="" style="width:130px;height:70px;border:0px;" src="{{ asset('/images/772_172.gif')}}"></a></div> </div>
            <div class="ads" style="display:block;">
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/673" target="_blank"><img alt="" style="width:130px;height:200px;border:0px;" src="/files/adv//857_677.gif"></a></div>
                <div style="padding-bottom:5px;">
                    <object data="/files/adv//840_375.swf" type="application/x-shockwave-flash" width="130" height="200">
                        <param name="movie" value="/files/adv//840_375.swf">
                        <param name="menu" value="false">

                    </object>
                </div> </div>

                                          <div class="ads" style="display:block;">
                                            <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/685" target="_blank"><img alt="" style="width:130px;height:130px;border:0px;" src="/files/adv//880_214.jpg"></a></div>
                                        </div>

            -->


            <div class="wrapper"></div>
        </div>
    </div>

    <div class="wrapper"></div>
    <!-- end of left -->





    <!-- first of titr aval -->
</div>
<div class="col-md-8">
<div class="col-md-8">
    <div class="ads" style="display:none;">
        <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank">
                <img alt="" style="width:219px;height:80px;border:0px;" src="{{ asset('images/890_775.gif')}}"></a>
        </div> </div>
    <div class="wrapper"></div>
    <div class="wrapper"></div>
    <div style="width: 100%;margin-bottom: 5px;">
        <div class="titr1_title" dir="rtl">تیتر یک</div>
        <div class="titr1_content">
            <div class="titr1_news">
                <div class="titr1_items">
                    <div style="text-align: right;">
                        @if ($one!="")
                        {{$one->refre}}
                        @endif
                    </div>

                    <div class="titr1_item">
                        <a class="picLink" href="/fa/news/209670" target="_blank" title="@if ($one!=""){{$one->title}}@endif">
                            <img alt="@if ($one!=""){{$one->title}}@endif" src="@if ($one!=""){{$one->image}}@endif" border="0" width="354" height="235" class="titr1_img">
                        </a>
                        <div class="titr1_text">
                            <div class="rutitr" style="text-align: center;"></div>
                            <div style="text-align: center;">
                                <img alt="" src="{{ asset('images/tik.gif')}}" border="0" class="fr_img">
                                <a class="title8" href="/fa/news/209670" target="_blank" title="@if ($one!=""){{$one->title}}@endif" style="font-family: nassim-bold;">
                                @if ($one!=""){{$one->title}}@endif
                                </a>
                            </div>
                            <div class="lead1">@if ($one!=""){{$one->abst}}@endif</div>
                            <div class="wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="titr1_pager">
        	<div class="titr1_btn_holder">
        	 			<a href="#" class="titr1_next"></a>
        	 										 		</div>
        	 										 		 		<img alt="" src="img/sp_b_cycle_titr1.gif" class="fr_img">
            <div class="titr1_btn_holder">
                <a href="#" class="titr1_prev"></a>
            </div>
            <div class="wrapper"></div>
        </div>
         	<img alt="" src="{{ asset('images/b_kh_v.gif')}}" class="body_img">
    </div>

    <div class="ads" style="display:none;">
        <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank">
                <img alt="" style="width:219px;height:80px;border:0px;" src="{{ asset('images/890_775.gif')}}"></a>
        </div>
    </div>

    <div class="wrapper"></div>
    <!-- end of titr aval -->
    <!-- vasate site  -->
    <div class="r_box">
        <div class="r_box_title" style="text-align: right">خبر ویژه</div>


        <div class="r_box_content">

            @foreach ($spec as $db)

            <div style="width: 100%;direction: rtl;">
                <div align="justify" class="rutitr"></div>
                <div style="margin-bottom: 5px;text-align: justify;">
                    <img alt="" src="{{ asset('images/tik.gif')}}" border="0">
                    <a class="title3" href="/fa/news/209676" title="{{ $db->title }}"target="_blank">{{ $db->title }}</a> 				</div>
                <a class="picLink" href="/fa/news/209676" target="_blank"> 					<img alt="{{ $db->abst }}" class="fl" src="{{ $db->image }}" width="101" style="margin-right: 8px;"> 				</a>
                <div class="lead1">{{ $db->abst }}</div>
                <div class="wrapper"></div>
                <div class="wrapper"></div> 			</div>
            <div class="sp_kh"></div>

            @endforeach

        </div>











        <img alt="" src="{{ asset('images/b_kh_v.gif')}}" class="body_img">
    </div>
    <div class="wrapper"></div>
    <div class="ads" style="display:none;">
        <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a>
        </div>
    </div>
    <div class="wrapper"></div>
    <!-- end of vasat -->








</div>
<div class="col-md-4">
   <!--
    <div class="box" style="position: relative;">
        <div class="box_title_container">
            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img" style="margin-left: 3px;">
            <div class="box_title">
                پیشنهاد انتخاب
            </div>
            <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
        <div class="cycle_box_content">
            <div id="pishnehad_2" class="pishnahad_news">
                <div class="pishnahad_news cycle_7" style="height: 173px; position: relative; overflow: hidden;">
                    <div class="cycle_film_item" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 2; opacity: 1;">
                        <a href="/fa/news/209666" target="_blank">
                            <img class="cycle_film_pic" alt="" src="{{ asset('/images/94878_281.jpg')}}" width="187">
                        </a>
                        <div class="title6">
                            <a href="/fa/news/209666" target="_blank" style="line-height: 150%">روایت یک منبع قضایی از دلیل بازداشت بقایی: او از مدت‌ها قبل احضار شده بود و نمی‌آمد</a>
                        </div>
                        <div class="wrapper"></div>
                    </div>
                    <div class="cycle_film_item" style="position: absolute; top: 0px; left: 197px; display: none; z-index: 1;">
                        <a href="/fa/news/209638" target="_blank">
                            <img class="cycle_film_pic" alt="" src="{{ asset('/images/94861_243.jpg')}}" width="187">
                        </a>
                        <div class="title6">
                            <a href="/fa/news/209638" target="_blank" style="line-height: 150%">مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد!</a>
                        </div>
                        <div class="wrapper"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="next_prev">
            <a href="#" class="r_cycle_prev" id="prev7"></a>
            <img alt="" src="{{ asset('/images/sp_r_cycle.gif')}}" class="fr_img" style="margin-left: 5px;">
            <a href="#" class="r_cycle_next" id="next7"></a>
        </div>

        <div class="b_curv_cycle">
            <img alt="" src="{{ asset('/images/b_r_cycle.gif')}}" class="fr_img">
            <img alt="" src="{{ asset('/images/b_l_cycle.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
    </div>
    -->
    <div class="box">
        <div class="box_title_container">
            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img" style="margin-left: 3px;">
            <div class="box_title">
                یادداشت
            </div>
            <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
        <div class="box_content">

            @foreach ($note as $db)
            <div style="margin-bottom: 10px;width: 100%;">
                <a class="picLink" href="/fa/news/209164" target="_blank">
                    <img alt="{{$db->title}}" class="fr" src="{{ $db->image}}" width="60" style="margin-left: 5px;">
                </a>
                <div class="rutitr"></div>
                <a class="title5" href="/fa/news/209164" title="08:00 - 1394/03/20" target="_blank">
                    <img src="{{ asset('/images/dot.gif')}}" border="0" alt="">{{ $db->title }}</a><br>
                <div class="wrapper"></div>
            </div>
            @endforeach

            <div class="wrapper"></div>
        </div>
    </div>
    <div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div>
    <div class="wrapper"></div>
    <div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div>
    <div class="wrapper"></div>
    <div class="box">
        <div class="box_title_container">
            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img" style="margin-left: 3px;">
            <div class="box_title">
                گزارش
            </div>
            <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
        <div class="box_content">
            @foreach ($report as $db)
            <div style="margin-bottom: 10px;width: 100%;">
                <a class="picLink" href="/fa/news/205839" target="_blank">
                    <img alt="{{$db->title}}" class="fr" src="{{ $db->image }}" width="60" style="margin-left: 5px;">
                </a>
                <div class="rutitr"></div>
                <a class="title5" href="/fa/news/205839" title="08:00 - 1394/03/02" target="_blank">
                    <img src="{{ asset('/images/dot.gif')}}" border="0" alt="">{{ $db->title }}</a><br>
                <div class="wrapper"></div>
            </div>
            @endforeach



            <div class="wrapper"></div>
        </div>
    </div>

    <div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div>
    <div class="wrapper"></div>
    <div class="box">
        <div class="box_title_container">
            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img" style="margin-left: 3px;">
            <div class="box_title">
                گفتگو
            </div>
            <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div>
        </div>
        <div class="box_content">
            @foreach ($talk as $db)
            <div style="margin-bottom: 10px;width: 100%;">
                <a class="picLink" href="/fa/news/208649" target="_blank">
                    <img alt="{{$db->title}}" class="fr" src="{{ $db->image }}" width="60" style="margin-left: 5px;">
                </a>
                <div class="rutitr"></div>
                <a class="title5" href="/fa/news/208649" title="10:08 - 1394/03/17" target="_blank">
                    <img src="{{ asset('/images/dot.gif')}}" border="0" alt="">{{ $db->title }}</a><br>
                <div class="wrapper"></div>
            </div>
            @endforeach

            <div class="wrapper"></div>
        </div>
    </div>
    <div class="ads" style="display:none;">  	<div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/534" target="_blank"><img alt="" style="width:219px;height:80px;border:0px;" src="/files/adv//890_775.gif"></a></div> </div>
    <div class="wrapper"></div>






</div>
</div>

</div>
<div role="tabpanel" class="tab-pane" id="profile">dsfdsfsdfdsfdsfdsfdsfdsfffffffff</div>
<div role="tabpanel" class="tab-pane" id="messages">fffffffffffffffffffffffffffffffffffffffffffffff</div>
<div role="tabpanel" class="tab-pane" id="settings">hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</div>
</div>

</div>



</div>
</div>
</nav>




@endsection
<!--
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
-->