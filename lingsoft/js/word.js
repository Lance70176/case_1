var browser = {
    versions: function () {
        var u = navigator.userAgent, app = navigator.appVersion;
        return {
            mobile: (!!u.match(/AppleWebKit.*Mobile/) || !!u.match(/Windows Phone/) || !!u.match(/Android/) || !!u.match(/MQQBrowser/)) && !u.match(/iPad/)//是否为移动终端
        };
    }()
}
if (browser.versions.mobile) {
    //文本超出 添加查看详细按钮
    $("meta[name=viewport]").attr('content','width=device-width,initial-scale=1.0,minimum- scale=1.0,maximum-scale=1.0,user-scalable=no')
    $('a').removeAttr('title');
    $(window).scroll(function(){
        if($(window).scrollTop()>400){
            $(".wrap-pupop").show();
            $('.details-btn').hide();
        }else{
            $(".wrap-pupop").hide();
            $('.details-btn').show()
        }
    });
    $('.details-btn').show();
    $('.loading-fr-box').show();
    $('.addpc-detilas').hide();
    $('.isIos-game').show();
    $('.ispc-game').hide();
    $('.tab-selected').removeClass('addCursor');

} else {
    $("meta[name=viewport]").attr('content','width=device-width, initial-scale=1.0')
    $('#rem').remove();
    $("meta[name=Keywords]").remove();
    $("meta[name=Description]").remove();
    $(".wrap-pupop").hide();
    $('.details-btn').css({'background':'rgb(111 108 108)'});
    $('.mobile .footer').css({'margin-bottom':'0'});
    $('.details-btn').hide();
    $('.loading-fr-box').hide();
    $('.addpc-detilas').show();
    $('.conetext-details').css({'border-top':'10px solid #f6f6f6'});
    $('.isIos-game').hide();
    $('.ispc-game').show();
    $('.main-details p').css({'font-size':'14px','line-height':'22px'})
    $('.tab-selected').addClass('addCursor');
}

$(window).scroll(function(){ 
    if($(window).scrollTop()>100){
        $('#tophead').hide();
    }else {
        $('#tophead').show();
    }
});

// 判断 ios or android    
var u = navigator.userAgent;
var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
if (isIOS) {
    $('.ios-icon').show();
    $('.android-icon').hide();
} else {
    $('.ios-icon').hide();
    $('.android-icon').show();
}

//判断出现三张图片出现滚动条
let swiperNumber = document.getElementsByClassName('swiper-scroll');
if (swiperNumber.length > 3) {
    $('.swiper-scroll-parent').css({ 'overflow-x': 'scroll', 'overflow-y': 'hidden' })
}
// 侧边栏
var count = true;
$('.aside_img').click(function () {
    $('#memu2').toggle()
})
$('#mcate').click(function () {
    $('.menu').show()
    $('.menu').css({ 'display': 'block' })
    $('.mask').show();
    $('body,html').css({'overflow':'hidden'});
})
$('.mask').click(function () {
    $(this).hide();
    $('.menu').hide()
    $('body,html').css({'overflow':''});
})

$('.search-aside').click(function () {
    $('.search-box').toggle();
    $('body,html').css({'overflow':'hidden'});
})
$('.slose-page').click(function () {
    $('.search-box').toggle();
    $('body,html').css({'overflow':''});
})
$('.closex').click(function () {
    $('.mask').hide();
    $('.menu').toggle();
    $('body,html').css({'overflow':''});
})


$('.tab-selected .isbox1').click(function () {
    $('.selected-child1').hide();
    $('.selected-child2').show();
    $('.iscontextOn').hide();
    $('.iscontextOff').show();
})
$('.tab-selected .isbox2').click(function () {
    $('.selected-child1').show();
    $('.selected-child2').hide();
    $('.iscontextOn').show();
    $('.iscontextOff').hide();
})

let getWh = $(window).height();
let getLoading = $('.loading-details-child').height();
$('.main-details').css({'height':(getWh-getLoading-48)+'px'});
let target = true;
$('.showintro1 span').click(function(){
    if(target){
        $('.icon_zk').hide();
        $('.icon_sq').show();
        $('.showintro1 ').removeClass('bg-actived');
        $('.showintro1 span i').text('收起全部内容');
        $('.main-details').css({'height':'auto'});
        target = false;
    }else {
        target = true;
        $('.icon_zk').show();
        $('.icon_sq').hide();
        $('.showintro1 ').addClass('bg-actived');
        $('.showintro1 span i').text('展开全部内容');
        $('.main-details').css({'height':(getWh-getLoading-48)+'px'});
    }
})

var text_arr3 = []
$(".pc-details").each(function (a, s) {
    var text = $(s).text().trim()
    text_arr3.push(text)
    if (text.length > 15) {
        $(s).html($(s).html().trim().slice(0, 15))
    }
})

