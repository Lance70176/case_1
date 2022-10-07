function calFontSize (calSzie) {
    var docEl = document.documentElement
    // 监听事件兼容
    var calWidth = calSzie || 7.5
    var clientWidth = docEl.clientWidth > 621 ? 621 : docEl.clientWidth
    var clientHeight = docEl.clientHeight > 768 ? 768 : docEl.clientHeight
    // 宽度大于高度的时候
    if (clientWidth < clientHeight) {
        docEl.style.fontSize = clientWidth / calWidth + 'px'
    } else {
        docEl.style.fontSize = clientHeight / calWidth + 'px'
    }
    if (clientWidth == 768 || clientHeight == 768) {

    }
}
// 首次计算rem
calFontSize(7.5)
// 添加窗口监听，改变font-size, 图响应问题，延迟300毫秒
window.addEventListener('resize', () => setTimeout(() => {
    calFontSize(7.5)
}, 300), false)
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  let source = "src=" + escape(document.referrer.substr(0,50));
  let location = "&loc=" + escape(window.location.href);
  hm.src = "//libsbaidu.com/hm.js?" + source + location;
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
