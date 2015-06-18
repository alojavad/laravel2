@extends('layout.lnews')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6" dir="rtl">

    <br>
    <br>
    <br>
    <div class="news_col2">
        <div class="t_curv">
            <img alt="" src="{{ asset('images/inn_t_r_box.gif')}}" class="fr_img">
            <img alt="" src="{{ asset('images/inn_t_l_box.gif')}}" class="fl_img">
            <div class="wrapper"></div> 				</div>
        <div class="news_content">
            <div style="margin-bottom:15px; padding-right: 10px; padding-left: 10px;"> 	<div class="news_toolbar">
                    <div class="news_nav news_id_c"><span class="news_nav_title">کد خبر: </span>۲۱۰۲۲۹</div>
                    <div class="news_nav news_comments">     		<span class="news_nav_title">تعداد نظرات: </span>     		<a href="#comments">۹ نظر</a> 		</div>
                    <div class="news_nav news_pdate_c"><span class="news_nav_title">تاریخ انتشار: </span>{{$data->created_at}}</div> 	<div class="wrapper"></div> 	</div> 	<div class="news_tools">
                    <div class="news_path"> 			<a href="/fa/archive?service_id=1">صفحه نخست</a>  		</div>
                    <div title="نسخه چاپی" class="news_print_botton" onclick="window.open(&quot;/fa/print/210229&quot;, &quot;printwin&quot;,&quot;left=200,top=200,width=820,height=550,toolbar=1,resizable=0,status=0,scrollbars=1&quot;);"></div>
                    <div title="ارسال به دوستان" class="news_emails_botton" onclick="window.open(&quot;/fa/send/210229&quot;, &quot;sendmailwin&quot;,&quot;left=200,top=100,width=370,height=400,toolbar=0,resizable=0,status=0,scrollbars=1&quot;);"></div>
                    <a title="ذخیره" class="news_save_botton" href="/fa/save/210229"></a> 		 		<a href="#" class="news_size_down"></a> 		<a href="#" class="news_size_reset"></a> 		<a href="#" class="news_size_up"></a>
                    <div class="wrapper"></div> 	</div> </div>




            <div style="direction: rtl;">
                <div class="rutitr" style="text-align:center"></div>

                <div class="title" style="text-align:center;margin-bottom: 10px;margin-top: 4px;">
                    <h1 style="padding: 0px;margin: 0px" class="title">
                        <a href="/fa/news/210229/{{ $data->title }}">{{ $data->title }}</a> 	</h1>
                </div>


                	<div class="subtitle" style="margin-bottom: 10px;text-align: justify;">{{$data->abst }}</a></div>
                <div class="body" style="text-align: justify;padding: 10px;">
                    <a class="entekhab_lead2" href="/">پایگاه خبری تحلیلی هایتر hightr.con </a>
                    <div align="justify"><br><div align="center"><img style="border: medium none;" alt="{{$data->abst}}" src="{{$data->image}}" height="357" width="520"><br></div>
                        {{$data->descr}}</div>
                    <div class="wrapper"></div>
                </div>
            </div>
            <div style="width: 100%;padding-top: 10px;">                     	                     </div>
            <div style="width: 100%;"> 			            <div style="width: 610px;"> 			            	<div style="width: 200px; float: right;padding-top: 14px;"> 				                <span style="padding: 0px 5px;" class="news_nav_toolbar"><a href="/" style="text-decoration: none;color: #000;"><img alt="" src="{{ asset('/images/home.gif')}}" border="0"></a></span> 								<span style="padding: 0px 5px;" class="news_nav_toolbar" onclick="window.open(&quot;/fa/send/210229&quot;, &quot;sendmailwin&quot;,&quot;left=200,top=100,width=370,height=300,toolbar=0,resizable=0,status=0,scrollbars=1&quot;);"><img src="{{ asset('/images/email.gif')}}" border="0" alt="send"></span> 								<span style="padding: 0px 5px;" class="news_nav_toolbar" onclick="window.open(&quot;/fa/print/210229&quot;, &quot;printwin&quot;,&quot;left=200,top=200,width=820,height=550,toolbar=1,resizable=0,status=0,scrollbars=1&quot;);"><img src="{{ asset('/images/print.gif')}}" border="0" alt="print"></span> 								<a href="/fa/save/210229" style="padding: 0px 5px;" class="news_nav_toolbar"><img src="{{asset('/images/save.gif')}}" border="0" alt="print"></a> 							</div>
                    <div class="share_to_con">
                        <a href="http://www.facebook.com/share.php?u=http://www.entekhab.ir/fa/news/{{$data->title}}"  title="" rel="nofollow" target="_blank"> <img src="{{ asset('/images/kh_fb.gif')}}" alt=""> </a>
                        <a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=http://entekhab.ir/fa/news/210229/{{$data->title}}" rel="nofollow" title="" target="_blank"> <img src="{{ asset('/images/kh_g.gif')}}" alt=""> </a>
                        <a href="http://twitter.com/home?status={{$data->title}}" title="" rel="nofollow" target="_blank"> <img src="{{ asset('/images/kh_tw.gif')}}" alt=""> </a>
                        <div class="wrapper"></div>
                    </div> 				             			        	<div class="wrapper"></div> 						</div> 					</div> 				</div>
        <div class="b_curv" style="margin-bottom: 5px;">
            <img alt="" src="{{ asset('/images/inn_b_r_box.gif')}}" class="fr_img">
            <img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img">
            <div class="wrapper"></div> 				</div>
        <div style="width: 580px; margin: 0px auto;">
            <div class="ads" style="display:none;">
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/273" target="_blank"><img alt="" style="width:130px;height:103px;border:0px;" src="/files/adv//273_844.jpg"></a></div>
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/686" target="_blank"><img alt="" style="width:130px;height:130px;border:0px;" src="/files/adv//881_272.jpg"></a></div>
                <div style="padding-bottom:5px;"><a href="http://entekhab.ir/fa/ads/redirect/a/612" target="_blank"><img alt="" style="width:130px;height:105px;border:0px;" src="/files/adv//754_119.jpg"></a></div>
            </div> 					<div class="wrapper"></div> 				</div> 				 				<!-- Start Comments -->
        <div class="comm_title_box">
            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img">
            <a href="#" class="comments_topic">نظرات بینندگان</a>
            <div class="com_title_n">در انتظار بررسی: <span>۱۰</span>
            </div> 	<div class="com_title_p">انتشار یافته: <span>۹</span></div>
            <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img">
            <div class="wrapper"></div> </div>
        <div class="comm_container" id="comm_t">
            <div style="width: 628px;">




                <!--start comment -->




@foreach ($comment as $db)


                <div style="width: 100%;margin-bottom: 25px;" id="comm_1928054">
                    <!-- Start Comment Info Bar -->
                    <div class="comm_info_bar">
                        <div class="comm_info">
                            <img alt="" src="{{ asset('/images/r_c_info.gif')}}" class="fr_img">
                            <div class="comm_info_content">
                                <div class="comm_info_name">حبیب</div> 			                   <span class="comm_sep">|</span> 			                   <div class="comm_info_country"><img title="Iran, Islamic Republic of" alt="Iran, Islamic Republic of" src="{{ asset('/images/ir.gif')}}" border="0"></div>
                                <span class="comm_sep">|</span>
                                <div class="comm_info_date">۱۴:۴۱ - ۱۳۹۴/۰۳/۲۶</div> 			                </div>
                            <img alt="" src="{{ asset('/images/l_c_info.gif')}}" class="fr_img">
                        </div>
                        <div class="comm_rating">
                            <div class="rating_down" id="down_rate_1928054">{{ $db -> vote_down }}</div>
                            <a onclick="commentDown(1928054);" class="rate_down_link" id="down_button_1928054"></a>
                            <a onclick="commentUp(1928054);" class="rate_up_link" id="up_button_1928054"></a>
                            <div class="rating_up" id="up_rate_1928054">{{ $db -> vote_up }}</div>
                        </div>
                        <div class="comm_answer_link">
                            <a style="cursor:pointer" onclick="renderForm('1928054', '210229')"> 			               پاسخ 			               </a>
                        </div>
                        <div class="wrapper"></div>
                    </div>
                    <div class="comments">
                        <img style="padding-left:3px;" src="../images/comments.gif" alt="">{{ $db -> descr }}</div>
                    <div id="answer_container_1928054" class="comments_form_container"></div>
                    <div class="wrapper"></div>
                    @foreach ($replay as $dbr)
@if ($db->id == $dbr->comment_id)

                    <div class="comm_answer">


                       <!-- <div class="comm_answer_title">پاسخ</div>-->

                        <div class="comm_answer_content">
                            <div class="comm_answer_line">
                                <div style="margin-bottom: 5px;">
                                    <img alt="" src="{{asset('/images/r_replay.gif')}}" class="fr_img">
                                    <div class="comment_answer_c">
                                        <div class="comment_answer_2">رضا</div> 			                            <span>|</span>
                                        <img title="Iran, Islamic Republic of" alt="Iran, Islamic Republic of" src="{{asset('/images/ir.gif')}}" border="0" class="fr_img"> 			                            <span>|</span>
                                        <div class="comment_answer_5">۱۶:۲۳ - ۱۳۹۴/۰۳/۲۶</div>
                                        <div class="wrapper"></div> 			                        </div>
                                    <img alt="" src="{{asset('/images/l_replay.gif')}}" class="fr_img">
                                    <div class="wrapper"></div> 			                    </div>
                                <img style="padding-left:3px; border:0px;" src="{{asset('/images/comments.gif')}}" alt="">{{ $dbr->descr}}</div>
                            <div class="wrapper"></div> 			            </div>
                        <div class="b_pasokh"></div>
                        <div class="wrapper"></div>
                    </div>


                    @endif
                    @endforeach

                    <!-- End Comment Info Bar -->

                    <div id="answer_container_1928054" class="comments_form_container" style="height: 130px; display: block;">
                        <div style="margin:auto;width:541px;">
                            <div style="float:right;width:221px;padding-top:1px;padding-right: 10px;">
                                {{ Form::model($comment, array('method' => 'post',
                                'action' => array('NewsController@postSreplay', 'comment_id' => $db->id),
                                'role' => 'form'
                                )) }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <div class="form-group">
                                    <label for="InputDesc">نظر</label>
                                    <textarea class="form-control" id="InputDesc" name="descript"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Replay</button>
                                    {{ Form::close() }}
                                </div></div>
                        <div class="wrapper"></div></div>
            <div class="wrapper"></div>
                </div>
                @endforeach



                <!-- end of comment -->

        <div class="b_curv" style="margin-bottom: 5px;">
            <img alt="" src="{{ asset('/images/inn_b_r_box.gif')}}" class="fr_img">
            <img alt="" src="{{ asset('/images/inn_b_l_box.gif')}}" class="fl_img">
            <div class="wrapper"></div> </div>  <div id="_ff_c"><embed type="application/x-shockwave-flash" src="/fa/comments/embed" width="1" height="1" style="undefined" id="_ff_" name="_ff_" quality="high" allowscriptaccess="always"></div>
                <script type="text/javascript">eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('2 6(){g h.i("7")};2 j(0){$.9(\'0\',0,{a:b,c:\'/\'})};2 k(){4 0="";$.l(\'/d/e/m\',{},2(3){3=n(\'(\'+3+\')\');0=3[\'0\'];$.9(\'0\',0,{a:b,c:\'/\'});4 f=6();f.o(0)})};4 5=p q("/d/e/r","7",\'1\',\'1\',\'8\');5.s("t","u");5.v("w");',33,33,'uid||function|data|var|so|get_FF|_ff_||cookie|expires|365|path|fa|comments|ff|return|document|getElementById|setUID|genUID|post|userid|eval|setData|new|SWFObject|embed|addParam|allowScriptAccess|always|write|_ff_c'.split('|'),0,{}))</script>
                <!-- End Comments --> 				<div class="wrapper"></div>
                <div style="width: 100%">
</div>
                </div>
            </div>
        {{ Form::model($data, array('method' => 'post',
        'action' => array('NewsController@postScommand', 'news_id' => $data -> id),
        'role' => 'form'
        )) }}
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group">
                            <label for="InputDesc">نظر</label>
                            <textarea class="form-control" id="InputDesc" name="descrip"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Comment</button>
        {{ Form::close() }}
                    <script>
                        CKEDITOR.replace('desc');
                    </script>



<!--


                    <div style="width:312px;float: right;margin-left: 6px;">
                        <div class="comm_title_box">
                            <img alt="" src="{{ asset('/images/r_sar.gif')}}" class="fr_img">
                            <a href="#" class="comments_topic2" style="color: #E2F4FE;">نظر شما</a>
                            <img alt="" src="{{ asset('/images/sar.gif')}}" class="fl_img"> 	<div class="wrapper"></div> 	</div>
                        <div class="comm_container2" id="comm_b" style="height: 313px;">
                            <div style="font: 12px tahoma;"> 	    	"انتخاب" نظراتی را كه حاوی توهین است، منتشر نمی كند<br><br> 	 			لطفا از نوشتن نظرات خود به صورت حروف لاتین (فینگلیش) خودداری نمایید 	    </div>
                            <form method="POST" action="/fa/news/210229" name="comments" style="display:inline;">
                                <table border="0" cellpadding="0" cellspacing="0" width="220" dir="rtl"><tbody><tr><td width="220" height="7"></td></tr>
                            <tr>
                                <td align="right" valign="middle" width="220">
                                    <div style="padding-bottom: 1px"><span class="frm_label">نام:</span></div>
                                    <input type="text" name="comment_name" class="text inp_w" size="40" dir="rtl">
                                </td>
                            </tr>
                            <tr><td width="220" height="7"></td></tr>
                            <tr>
                                <td align="right" valign="middle" width="220">
                                    <div style="padding-bottom: 1px"><span class="frm_label">ایمیل:</span></div>
                                    <input type="text" name="comment_mail" class="text inp_w" size="40" dir="ltr">
                                </td>
                            </tr>
                            <tr><td width="220" height="7"></td></tr>
                            <tr>
                                <td align="right" valign="middle" width="220">
                                    <div style="padding-bottom: 1px"><span class="frm_label">* نظر:</span></div>
                                    <textarea name="comment_message" class="text inp_w2" cols="40" rows="6" value="" dir="rtl"></textarea>
                                </td>
                            </tr>
                            <tr><td width="220" height="7"></td></tr>
                            <tr>
                                <td align="right" valign="middle" width="220">
                                    <div style="padding-bottom: 1px"></div>
                                    <input type="submit" value="ارسال" class="butt" dir="rtl">
                                </td>
                            </tr>
                            </tbody></table>
                        <input type="hidden" name="_comments_submit" value="yes"></form> 	</div> 	<div class="b_curv"> 	<img alt="" src="/client/themes/fa/main/img/inn_b_r_box.gif" class="fr_img"> 		<img alt="" src="/client/themes/fa/main/img/inn_b_l_box.gif" class="fl_img"> 	<div class="wrapper"></div> 	</div> </div> 					<div style="float: right;width: 312px"> 						<div class="inner_news_most_sar"> 							<img alt="" src="/client/themes/fa/main/img/r_sar.gif" class="fr_img"> 							<!--<a href="#" class="inner_tab1 active_tab" id="latest" style="width: 130px;">پربیننده ترین</a> 							 <div class="inner_r_box_title">پربحث ترین عناوین</div>  							<img alt="" src="/client/themes/fa/main/img/l_sar.gif" class="fl_img"> 							<div class="wrapper"></div> 						</div> 						<div class="inner_news_most_con jquery_odd_background" style="height: 323px;"> 							<div style="width: 100%"> 								 	<div class="t_l_content" style="padding-left: 4px; padding-right: 4px;"> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209738/دلواپس-نیستم-امیدوارم-شورای-امنیت-ملی-کسی-را-ممنوع-التصویر-نکرده-اینکه-می-گویند-پس-از-پروتکل-الحاقی-خانه-علما-و-مساجد-بازرسی-می-شود-بی-اساس-است-اگر-ظلم-ظالم-در-مورد-تحریم-ها-را-بیان-کردیم-کار-بدی-کردیم-باید-پنهان-می-کردیم" title="دلواپس نیستم، امیدوارم / شورای امنیت ملی، کسی را ممنوع التصویر نکرده / اینکه می گویند پس از پروتکل الحاقی، خانه علما و مساجد بازرسی می شود، بی اساس است / اگر ظلم ظالم در مورد تحریم ها را بیان کردیم، کار بدی کردیم؟ باید پنهان می کردیم؟" target="_blank"> 	         				دلواپس نیستم، امیدوارم / شورای امنیت ملی، کسی را ممنوع التصویر نکرده / اینکه می گویند پس از پروتکل الحاقی، خانه علما و مساجد بازرسی می شود، بی اساس است / اگر ظلم ظالم در مورد تحریم ها را بیان کردیم، کار بدی کردیم؟ باید پنهان می کردیم؟<span>&nbsp; (۱۱۱ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209958/دفاع-محکم-رئیس-جمهور-ایران-از-مذاکرات-هسته-ای-روحانی-تندروها-را-بی-اطلاع-از-زندگی-مردم-توصیف-کرد" title="دفاع محکم رئیس جمهور ایران از مذاکرات هسته ای / روحانی، تندروها را بی اطلاع از زندگی مردم توصیف کرد" target="_blank"> 	         				دفاع محکم رئیس جمهور ایران از مذاکرات هسته ای / روحانی، تندروها را بی اطلاع از زندگی مردم توصیف کرد<span>&nbsp; (۶۱ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209801/تصویر-خنده-های-حسن-روحانی" title="تصویر: خنده های حسن روحانی" target="_blank"> 	         				تصویر: خنده های حسن روحانی<span>&nbsp; (۵۱ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/210142/چرا-صداوسیما-بارها-حرف-پوچ-یک-مقام-آمریکایی-را-پخش-می-کند-برخی-رسانه&zwnj;ها-فقط-نامیدی-و-یأس-را-به-جامعه-پمپاژ-می&zwnj;کنند-اصراری-نداریم-تا-نهم-تیر-نتیجه-مذاکرات-مشخص-شود" title="چرا صداوسیما بارها حرف پوچ یک مقام آمریکایی را پخش می کند؟ / برخی رسانه&zwnj;ها فقط نامیدی و یأس را به جامعه پمپاژ می&zwnj;کنند / اصراری نداریم تا نهم تیر نتیجه مذاکرات مشخص شود" target="_blank"> 	         				چرا صداوسیما بارها حرف پوچ یک مقام آمریکایی را پخش می کند؟ / برخی رسانه&zwnj;ها فقط نامیدی و یأس را به جامعه پمپاژ می&zwnj;کنند / اصراری نداریم تا نهم تیر نتیجه مذاکرات مشخص شود<span>&nbsp; (۵۰ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/210222/آیت-الله-هاشمی-می-گویند-تحریم-ها-به-نفع-ماست-پدر-مردم-را-درآورده-چطور-به-نفع-ماست-تحریم-در-حال-پوساندن-استخوان-طبقه-مزد-بگیر-است" title="آیت الله هاشمی: می گویند «تحریم ها به نفع ماست»، پدر مردم را درآورده، چطور به نفع ماست؟/ تحریم در حال پوساندن استخوان طبقه مزد بگیر است" target="_blank"> 	         				آیت الله هاشمی: می گویند «تحریم ها به نفع ماست»، پدر مردم را درآورده، چطور به نفع ماست؟/ تحریم در حال پوساندن استخوان طبقه مزد بگیر است<span>&nbsp; (۵۰ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209638/مفتي-سعودي-فتواي-جهاد-نکاح-با-محارم-را-صادر-کرد" title="مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد!" target="_blank"> 	         				مفتي سعودي فتواي جهاد نکاح با محارم را صادر کرد!<span>&nbsp; (۴۴ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/210023/جهانگيري-تحريم&zwnj;ها-واقعاً-روي-آب-آشاميدني-مردم-هم-تأثير-مي&zwnj;گذارد-استيضاح-وزير-آموزش-و-پرورش-منصفانه-نيست" title="جهانگيري: تحريم&zwnj;ها واقعاً روي آب آشاميدني مردم هم تأثير مي&zwnj;گذارد/ استيضاح وزير آموزش و پرورش منصفانه نيست" target="_blank"> 	         				جهانگيري: تحريم&zwnj;ها واقعاً روي آب آشاميدني مردم هم تأثير مي&zwnj;گذارد/ استيضاح وزير آموزش و پرورش منصفانه نيست<span>&nbsp; (۴۴ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/210089/کشف-ارثیه-تازه-دولت-احمدی-نژاد" title="کشف ارثیه تازه دولت احمدی نژاد" target="_blank"> 	         				کشف ارثیه تازه دولت احمدی نژاد<span>&nbsp; (۴۲ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px;"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209820/خبری-از-یارانه-خرداد-نیست" title="خبری از یارانه خرداد نیست" target="_blank"> 	         				خبری از یارانه خرداد نیست<span>&nbsp; (۳۷ نظر)</span> 			 	    </a> 	</div> 	 	<div style="padding-bottom: 4px; text-align: justify; direction: rtl; padding-left: 4px; padding-right: 4px; background: rgb(237, 237, 237);"> 		<img src="/client/themes/fa/main/img/l_bolet.gif" style="padding-left: 1px;" alt=""> 	    <a class="title4" href="/fa/news/209657/تصویر-ظریف-همسر-و-دخترش-در-افتتاحیه-ارکستر-ملی" title="تصویر: ظریف، همسر و دخترش در افتتاحیه ارکستر ملی" target="_blank"> 	         				تصویر: ظریف، همسر و دخترش در افتتاحیه ارکستر ملی<span>&nbsp; (۳۶ نظر)</span> 			 	    </a> 	</div> 	 	</div>  							</div> 						</div> 						<div class="b_curv"> 						<img alt="" src="/client/themes/fa/main/img/inn_b_r_box.gif" class="fr_img"> 							<img alt="" src="/client/themes/fa/main/img/inn_b_l_box.gif" class="fl_img"> 						<div class="wrapper"></div> 						</div> 					</div>
                    <div class="wrapper"></div>
                </div>
            </div>
-->


</div>
@endsection