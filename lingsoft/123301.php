<?php
define("DS", DIRECTORY_SEPARATOR);
require "./tools/Cache.php";
require "./tools/funs.php";
require "./tools/safe.php";
$kwKey = isset($_REQUEST['kw']) && !empty($_REQUEST['kw']) ? $_REQUEST['kw'] : '';
$kwtypeKey = isset($_REQUEST['kwtype']) && !empty($_REQUEST['kwtype']) ? $_REQUEST['kwtype'] : '';
echo '
<html lang="en" mip>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.urldecode($kwKey).'官方版-'.urldecode($kwKey).'官方app下载苹果端V3.6.0</title>
    <meta name="Keywords" content="'.urldecode($kwKey).'官方苹果版，'.urldecode($kwKey).'官方苹果端app下载" />
    <meta name="Description" content="'.urldecode($kwKey).'官方版最新版是现在苹果IOS、安卓版最最流行、速度最快的APP，'.urldecode($kwKey).'官方苹果版V3.6.0版本数据精确及时，'.urldecode($kwKey).'官方苹果版客户端官方下载安装量达到4296人次,深受大量玩家喜欢的娱乐软件！" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta name="applicable-device" content="pc,mobile">
    <link rel="stylesheet" href="./css/word.css">
    <link rel="stylesheet" href="./css/mip.css">
    <link rel="stylesheet" href="./css/header.css">
    <script src="./js/jquery-1.5.2.min.js"></script>
    <script src="./js/mip.js"></script>
    <script id="rem" src="./js/rem.js"></script>
    <script>
        var is_spider    = "";
        var app_keyword  = "&#53;&#48;&#48;&#118;&#105;&#112;&#24425;&#31080;&#32593;&#23448;&#26041;&#33529;&#26524;&#29256;";
        var area_type_id = "1";
        var type_id      = "1";
    </script>
</head>

<body>
    <div class="header_bg display_none">
        <div class="all_box">
            <div class="banner_box" id="dboxtop">
            <div class="logo"><a href="#"><img src="./images/logo.png" alt="欢迎访问0430网站库!"></a></div>
            <div class="lbanner"><h2 id="hlTitle">欢迎访问0430网站库!</h2></div>
            <div class="rbanner">
                <ul>
                    <li class="li2"><a rel="nofollow" href="#">联系我们</a></li>
                    <li class="li4"><a rel="nofollow" class="red" href="#">秀特色</a></li>
                    <li class="li3"><a href="#">English</a></li>
                </ul>
                <div class="clear0430"></div>
                <div class="selectbox" id="searchform">
                <form id="formsearch" >
                <span>
                    <input type="text" id="query" name="query" class="editbox_search" value="输入网站名称/网址按回车查询" title="输入网站名称按回车查询网站知识" maxlength="40">
                </span>
                </form>
                </div>
            </div>
            </div>
            <div class="meun_box">
                <ul id="menu">
                    <li id="ml_0"><a href="#">首页</a></li>
                    <li id="ml_1"><a href="#">亚洲网站</a></li>
                    <li id="ml_2"><a href="#">欧洲网站</a></li>
                    <li id="ml_3"><a href="#">美洲网站</a></li>
                    <li id="ml_4"><a href="#">非洲网站</a></li>
                    <li id="ml_5"><a href="#">大洋洲网站</a></li>
                    <li id="ml_6"><a href="#">网站提交</a></li>
                    <li id="ml_7"><a rel="nofollow" href="#">快速收录</a></li>
                    <li id="ml_8"><a rel="nofollow" href="#">有缘网站</a></li>
                    <li id="ml_9"><a href="#">快速直达</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wap_div" class="display_none">
        <header class="head-top">
            <a href="/"><img src="./images/logo.png" alt="欢迎访问0430网站库!" height="70%"></a>
            <span class="aside_img"><img src="./images/icon_p.png" height="50%"></span>
        </header>
        <ul id="memu2" class="display_none">
            <li><a href="#">首页</a></li>
            <li><a href="#">亚洲网站</a></li>
            <li><a href="#">欧洲网站</a></li>
            <li><a href="#">美洲网站</a></li>
            <li><a href="#">非洲网站</a></li>
            <li><a href="#">大洋洲网站</a></li>
            <li><a href="#">网站提交</a></li>
            <li><a href="#">快速收录</a></li>
            <li><a href="#">网站直达</a></li>
            <li><a href="#">有缘网站</a></li>
        </ul>
    </div>
    <script>
        var is_pc = document.documentElement.clientWidth > 768
        if(is_pc){
            $(".header_bg").show()
        }else{
            $("#wap_div").show()
        }
    </script>
    <div class="wrap-html mobile">
        <div class="home-page">
            <div class="bread-nav">
                <span>位置：</span>
                <a title="首页" href="/">首页</a> >
                <a title="游戏安装" href="javascript:void(0);">游戏安装</a> >
                <a id="download_app_category"  title="'.urldecode($kwKey).'官方版" href="#">'.urldecode($kwKey).'</a>
            </div>
            <div class="wrap-loading-details">
                <div class="wrap-child">
                    <div class="wrap-child-left">
                        <div class="loading-details">
                            <div class="loading-details-box">
                                <mip-img class="loading-img" src="./images/cr_pic/caipiao/lingaklq_1018062206_3664.jpg" id="download_app_img" alt="500vip彩票网官方苹果版"></mip-img>
                                <div class="loading-fr-details">
                                    <h1 id="download_app_name">'.urldecode($kwKey).'</h1>
                                    <p class="details-btn download">
                                        <span class="android-icon">
                                            <mip-img  src="./images/icon_xiajia.png" alt=""></mip-img>
                                        </span>
                                        <span class="ios-icon">
                                            <mip-img src="./images/ios.png" alt=""></mip-img>
                                        </span>
                                        <i class="isMobile-btn">立即下载</i>
                                    </p>
                                    
                                    <div class="context-left-details addpc-detilas">
                                        <p>
                                            大 小: 38.5MB
                                        </p>
                                        <p>
                                            版 本: v5.5.9 </p>
                                        <p>
                                            类 型: 游戏安装 </p>
                                        <p>
                                            语 言: 中文版 </p>
                                        <p>
                                            时 间: 2022-05-19 </p>
                                        <p>
                                            下载次数: 14252 </p>
                                        <mip-img class="pc-load" src="./images/xiazai.png" alt=""></mip-img>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <script src="./js/bdtongji.js?typeid=1&time='.time().'"></script>
                            <script src="./js/appconfig.js?v=1.1&t=1"></script>
                            <script src="./js/showHotApp.js?v=1.1"></script>
                            <div class="loading-fr-box">
                            <div class="loading-details-child">
                                <h5 class="main-title">
                                    <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                    相关信息
                                </h5>
                                <div class="context-left-details">
                                    <p>
                                        大 小: 38.5MB
                                    </p>
                                    <p>
                                        版 本: v5.5.9 </p>
                                    <p>
                                        类 型: 游戏安装 </p>
                                    <p>
                                        语 言: 中文版 </p>
                                    <p>
                                        时 间: 2022-05-19 </p>
                                    <p>
                                        下载次数: 14252 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conetext-details">
                        <div class="context-right">
                                                            <div class="main-details">
                                    <h5 class="main-title">
                                        <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                        游戏介绍
                                    </h5>
                                    <p>
                                        一款功能齐全的线上购彩平台，体彩应为奖金比较高而且难度系数不如双色球那么高，所以深受大家们的喜爱，500vip彩票网官方苹果版是一款非常给力的彩票预测软件，彩民朋友们通过500vip彩票网官方苹果版能够更好的进行选号，软件完全免费，快去下载试试吧！下一个大奖就是你的！。                                    </p>
                                                                        <h5 class="main-title">
                                        <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                        详情介绍
                                    </h5>
                                    <p>
                                                                                    <p>
                                                数据预测，提供专业的数据分析，让您足不出户，掌握变化动态。行业牛单解析,海量数据支持；                                            </p>
                                                                                    <p>
                                                最新最全面的功能，还有彩民们的中奖故事给你解闷；                                            </p>
                                                                                    <p>
                                                500vip彩票网官方苹果版新APP是一款非常优质的彩票软件，该APP为彩票用户提供优质的彩票服务，为用户提供在线购彩功能，同时也为大家带来彩票社区，你可以在彩票社区中与彩民好友进行互动交流，共享彩票动态等功能.，并且软件中包含的功能非常的多，让用户体验感会更好，支持查看相关的彩票信息，喜欢就下载吧。                                            </p>
                                                                            </p>
                                    <h5 class="main-title" >
                                        <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                        亮点优势
                                    </h5>
                                                                            <p>
                                            1、随时为你提醒，各种开奖信息，不再让繁忙的你错过哦；                                        </p>
                                                                            <p>
                                            2、拥有海量的人工计划，可以提供给你免费的数据参考，帮助你提高彩票的中奖率。                                        </p>
                                                                                                                <h5 class="main-title" >
                                            <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                            游戏功能
                                        </h5>
                                        <p>
                                                                                        <p>
                                                    彩种的分类非常的详细，随时随地都可以在网上购彩，还可以推荐实用的数据分析和奖励预测；                                                </p>
                                                                                                <p>
                                                    全网最大的彩票圈子，跟志趣相投的朋友畅聊，互相取经，分享乐趣。                                                </p>
                                                                                        </p>
                                        <h5 class="main-title" id="seven">
                                            <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                            游戏技巧
                                        </h5>
                                                                                            <p>
                                                    开奖直播别忘了看，在手机上即可直接观看直播并且了解开奖结果；                                                </p>
                                                                                            <p>
                                                    坐满即玩等多种比赛模式，游戏内活动多多，好礼送不停；                                                </p>
                                                                                            <p>
                                                    拥有更加完善的玩家系统，保护用户的信息安全，提供24小时的线上客服，以供咨询；                                                </p>
                                                                                            <p>
                                                    体育比赛实时直播，随时随地掌握情况，及时投入。                                                </p>
                                                                                    <h5 class="main-title">
                                            <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                            游戏说明
                                        </h5>
                                                                                    <p>
                                            1、500vip彩票网官方苹果版老虎机的介绍到这里就全部结束了，从上面的介绍中，大家可以看到这是一款爆奖率高且游戏对战安全的游戏平台，玩家将游戏下载后完全不用担心游戏开挂作弊的行为，可放心参与游戏尽享游戏对战的无限精彩与刺激；                                            </p>
                                                                                    <p>
                                            2、飞五棋牌app，大连棋牌app，喜欢的小伙伴快来下载吧；                                            </p>
                                                                                    <p>
                                            3、快乐彩月次加奖。                                            </p>
                                        
                                                                                                            <h5 class="main-title">
                                        <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                        游戏截图
                                    </h5>
                                        <div class="swiper-scroll-parent">
                                            <div class="swiper-scroll-child">
                                                                                                <mip-img class="swiper-scroll" src="./images/cr_pic/cn/caipiao/picture/lingaklq_1018071042_3115.png" alt="500vip彩票网官方苹果版"></mip-img>
                                                                                                <mip-img class="swiper-scroll" src="./images/cr_pic/cn/caipiao/picture/lingaklq_1018051754_5952.png" alt="500vip彩票网官方苹果版"></mip-img>
                                                                                                <mip-img class="swiper-scroll" src="./images/cr_pic/cn/caipiao/picture/lingaklq_1018040418_4971.png" alt="500vip彩票网官方苹果版"></mip-img>
                                                                                            </div>
                                        </div>
                                                                    </div>
                                                        <div class="showintro1 bg-actived">
                                <span>
                                <i>展开全部内容</i>
                                <img class="icon_zk" src="./images/icon_zk.png" alt="">
                                <img class="icon_sq" src="./images/icon_sq.png" alt="">
                                </span>
                            </div>
                        </div>
                        <div id="tags-main3" >
                            <div class="parent-title">
                                <div class="parent-title-fl">
                                    <h5 class="main-title">
                                        <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                        精品游戏
                                    </h5>
                                </div>
                                <div class="tab-selected">
                                    <span class="selected-child1">
                                        <i class="isbox1"></i>
                                        <mip-img src="./images/rm.png" height="70" alt=""></mip-img>
                                    </span>
                                    <span class="selected-child2" style="display: none;">
                                        <i class="isbox2"></i>
                                        <mip-img src="./images/xh.png" height="70" alt=""></mip-img>
                                    </span>
                                </div>
                            </div>
                            <div class="parent-tab isIos-game" style="clear: both;">
                                <div class="tags-main-ul iscontextOn">
                                                                        <ul class="jp_app_ul">
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1208195150_1406.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">火柴人战地</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1208201658_2420.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">雾岛之迷</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1214000203_9579.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">飞机大乱斗</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1214003206_7632.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">极速飞行</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1214003731_8591.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">星际圣斗士</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1218215206_7177.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">迪士尼足球</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1218232551_1846.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">起源火龙</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1218233643_4250.jpg" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">惊天单职业</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1219025221_7834.jpg" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">召唤无限超变</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1219081551_4780.png" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">金·卡戴珊:好莱坞</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1124012255_6150.jpg" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">人鱼沼</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <mip-img src="./dl_app/image/1125230315_9752.jpg" height="70" alt=""></mip-img>
                                                                                                                                                                <span class="spm">九牛百虎棋</span>
                                                                                                    </a>
                                            </li>
                                                                            </ul>
                                                                    </div>
                                <div class="tags-main-ul iscontextOff" style="display:none;">
                                                                        <ul class="jp_app_ul">
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1203014243_5977.jpg" height="70" alt="">
                                                                                                                                                                <span class="spm">调查</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1203023558_7324.png" height="70" alt="">
                                                                                                                                                                <span class="spm">傲魂单职业</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1203033200_1030.png" height="70" alt="">
                                                                                                                                                                <span class="spm">爸爸把我手机藏起来了全新</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205145653_3856.png" height="70" alt="">
                                                                                                                                                                <span class="spm">龙超勇士</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205153813_9564.png" height="70" alt="">
                                                                                                                                                                <span class="spm">粘性身体</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205173851_8562.png" height="70" alt="">
                                                                                                                                                                <span class="spm">疾如迅狐</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205174826_9886.png" height="70" alt="">
                                                                                                                                                                <span class="spm">极速彩色弹跳</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205182729_7413.jpeg" height="70" alt="">
                                                                                                                                                                <span class="spm">跳跃枪战</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205183112_7885.jpeg" height="70" alt="">
                                                                                                                                                                <span class="spm">倚天记之明教传说</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205184321_2253.jpeg" height="70" alt="">
                                                                                                                                                                <span class="spm">全民恋舞</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205184946_7800.png" height="70" alt="">
                                                                                                                                                                <span class="spm">八蛋的修仙之路之下山寻找三元经</span>
                                                                                                    </a>
                                            </li>
                                                                                    <li class="app_down_url">
                                                <a href="#" class="img" >
                                                                                                            <img src="./dl_app/image/1205204458_8030.png" height="70" alt="">
                                                                                                                                                                <span class="spm">单词</span>
                                                                                                    </a>
                                            </li>
                                                                            </ul>
                                                                    </div>
                            </div>
 
                        </div>
                        <div class="clear-fl"></div>
                        <div class="comment-input">
                            <h5 class="main-title">
                                <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                留言专区
                            </h5>
                            <div class="send-info">
                                <textarea class="tb" placeholder="请在此输入您的留言" style="width: 100%;height: 120px;"></textarea>
                                <div class="send-child-box">
                                    <span class="send-input1"></span>
                                    <span class="send-btn">
                                        <a href="javascript:void(0)" >发布</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="first-comment">
                            <h5 class="main-title add-title">
                                <mip-img src="./images/icon_bt.png" alt=""></mip-img>
                                最先留言
                            </h5>
                            <ul class="list-comment">
                                                                                                                                                        <li>
                                                <mip-img class="comment-img" src="./images/avatar/0209034137_7277.png" alt=""></mip-img>
                                                <div class="comment-code">
                                                    <h5>蓝天白裙少女梦</h5>
                                                    <p>不客气哦，祝你玩得愉快！^v^</p>
                                                </div>
                                                <span class="first-time">2022-05-23</span>
                                            </li>
                                                                                                                                                                <li>
                                                <mip-img class="comment-img" src="./images/avatar/0208155216_2144.png" alt=""></mip-img>
                                                <div class="comment-code">
                                                    <h5>沵留给涐得记忆</h5>
                                                    <p>大佬，我想要全套白嫖教学～</p>
                                                </div>
                                                <span class="first-time">2022-05-23</span>
                                            </li>
                                                                                                                                        </ul>
                        </div>                                
                    </div>
                </div>
            </div>
        </div>
        <div class="copy_down">
            <p>
                网站版本: 
                <a rel="nofollow" href="#">中文(简体)</a> |
                <a href="#">中文(繁體)</a> |
                <a href="#">English</a> |
                <a href="#">日本語</a> |
                <a href="#">Espa?ol</a>  
            </p>
            <p>
                <a rel="nofollow" href="#">关于我们</a> | 
                <a rel="nofollow" href="#">联系我们</a>  | 
                <a rel="nofollow" href="#">提交网站</a> | 
                <a rel="nofollow" href="#">免责声明</a> | 
                <a rel="nofollow" href="#">友情链接</a> | 
                <a rel="nofollow" href="#">意见反馈</a> | 
                <a rel="nofollow" href="#">分类目录</a> | 
                <a rel="nofollow" href="#">收录条件</a> | 
                <a rel="nofollow" href="javascript:void(0);">设为主页</a>
            </p>
            <p>
                网站声明：0430网站库所分享网站资料取之于网、用之于网，请大家参考使用时自行辨明、后果自负，0430不承担任何责任。
            </p>
            <p>
                0430网站库 - 二十四小时在线的免费顶级国内国外网站目录 - 让网站与我们的生活更近！网址收录、免费收录就上0430！
            </p>
            <p>
                0430网站库(<span class="red">本站唯一全球顶级域名：0430.com，仿冒无效，违者追责</span>)
               <br>为您提供优质高效的网站收录服务，是您值得信耐的目录网站。
            </p>
            <p>
                Copyright 2004-2021 版权所有 <a rel="nofollow" href="#" class="dba">www.0430.com</a> 
            </p>
            <p>
                <a href="https://beian.miit.gov.cn" class="dba" target="_blank">鄂ICP备13000926号-7</a>
                <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42011102003742">
                    <img src="./images/beian.png" alt="网公安备案">鄂公网安备 42011102003742号
                </a>
            </p>
        </div>
    </div>
    <div class="wrap-pupop" style="display:none;">
        <div class="wrap-pupop-btn download">
            <span class="android-icon">
                <mip-img  src="./images/icon_xiajia.png" alt=""></mip-img>
            </span>
            <span class="ios-icon">
                <mip-img src="./images/ios.png" alt=""></mip-img>
            </span>
            立即下载
        </div>
    </div>
    </div>
    <script src="./js/word.js?v=20210817"></script>
    <script src="./js/3g/download.js?1"></script>
    <script src="./js/fake_404.js?v=20201229"></script>
    <script>
        var text_arr1 = []
        $(".spm").each(function (a, s) {
            var text = $(s).text().trim()
            text_arr1.push(text)
            if (text.length > 5) {
                $(s).html($(s).html().trim().slice(0, 5))
            }
        })
        var text_arr2 = []
        $(".fr-detail-pc h5").each(function (a, s) {
            var text = $(s).text().trim()
            text_arr2.push(text)
            if (text.length > 8) {
                $(s).html($(s).html().trim().slice(0, 8))
            }
        })
        var name = "500vip彩票网官方苹果版";
        var source = 1;
        //根据客户端，修改页面内容
        var client_type = judgeClient();
        //点击下载
        $(".download").click(function ()  {
            down_click(name);
        })
        // 发布逻辑
        var is_send = true;
        $(".send-btn").click(function () {
            if(is_send){
                is_send = false;
                var content = $("textarea").val().trim();
                var title   = "500vip彩票网官方苹果版";
                var url     = document.URL;
                var website_id = "53";

                if(content == "") {
                    alert("请输入您要提交的内容");
                    return false;
                }

                $.ajax({
                    type:"POST",
                    url:"./getWebTjCode.js",
                    data:{content:content, title:title, url:url, website_id:website_id},
                    success:function (res) {
                        is_send = true;
                        if(res) {
                            $("textarea").val("");
                            alert("提交成功，需要审核才能显示")
                        } else {
                            alert("服务器繁忙，请稍后再试")
                        }
                    }
                })
            }
            setTimeout(function(){is_send = true;},1000) //防止ajax异常导致长时间无法提交
        })
    </script>
    <script>
    //baidutongji
    </script>
    <script>
    var is_spider = "";
    var browser = {
        versions: function () {
            var u = navigator.userAgent, app = navigator.appVersion;
            return {//移动终端bai浏览器版本信息
                mobile: (!!u.match(/AppleWebKit.*Mobile/) || !!u.match(/Windows Phone/) || !!u.match(/Android/) || !!u.match(/MQQBrowser/)) && !u.match(/iPad/)//是否为移动终端
            };
        }()
    }
    if (!browser.versions.mobile) {
        fake_404(is_spider);
    }


    </script>

    <script type="text/javascript">

        //取得關鍵字
        var kw = getQueryString("kw");
        var kwtype = getQueryString("kwtype");
        // alert(kwtype);


        //若為 unicode, 進行 unicode2string
        kw = eval("\'" + kw + "\'");

        $("title").html(kw);
        //替換主要 APP 分類路徑
        // var list = document.body.innerHTML = document.body.innerHTML.replace("500vip彩票网官方苹果版", kw);
        var download_app_category = document.getElementById("download_app_category");
        download_app_category.innerHTML = kw;


        //替換主要 APP 名稱
        var download_app_name = document.getElementById("download_app_name");
        download_app_name.innerHTML = kw;

        //替換主要 APP 圖片, 對應 url 的 kwtype 數字 Start
        var mainAppInfo = {
            "1": {//彩票
                "img_src":"./static_version/static/images/256x256bb.png",
                "url_src":"https://ip5156.com"
            },
			"2": {//体育
                "img_src":"./static_version/static/images/nba.jpg",
                "url_src":"https://bet365-as.org/aff/10007"
            },
			"3": {//棋牌
                "img_src":"./static_version/static/images/kyqp.png",
                "url_src":"https://dz7773.com?sign=57d25d7926eb2b8879e1cc29fdece5d6&fxm=78317485&channel_id=10000"
            },
			"4": {//真人
                "img_src":"./static_version/static/images/eo9n.png",
                "url_src":"https://www.xinhg88.com/?f=qwe88888"
            },
			"5": {//捕鱼
                "img_src":"./static_version/static/images/download.jpg",
                "url_src":"https://67799d.com?sign=965955c0deccae095b6dd012159f4046&fxm=60650213&channel_id=10000"
            }
			
        }
        var download_app_img = document.getElementById("download_app_img");
        download_app_img.setAttribute("src",mainAppInfo[kwtype].img_src);
        //点击下载
        $(".download").click(function ()  {
            top.location.href =mainAppInfo[kwtype].url_src; 
        })
        //替換主要 APP 圖片, 對應 url 的 kwtype 數字 End

        function getQueryString(paramName) { 
         
            var url = window.location.toString(); //取得當前網址
            var str = ""; //參數中等號左邊的值            

            if(window.location.search) {
                //如果網址有"?"符號
                var ary = url.split("?")[1].split("&");

                // alert(ary):

                //取得"?"右邊網址後利用"&"分割字串存入ary陣列 ["a=1","b=2","c=3"]
                for (var i in ary) {
                    //取得陣列長度去跑迴圈，如:網址有三個參數，則會跑三次
                    str = ary[i].split("=")[0];
                    //取得參數"="左邊的值存入str變數中
                    if (str == paramName) {
                        //若str等於想要抓取參數 如:b
                        channel_id = decodeURI(ary[i].split("=")[1]); //抓msg
                        //取得b等號右邊的值並經過中文轉碼後存入str_value
                    }
                }
            }

            return channel_id;

        }
    </script>


    <script src="./getArea.js"></script>
    <script src="./getWebTjCode.js?website_id=53"></script>
</body>

</html>
';