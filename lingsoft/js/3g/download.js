/*判断客户端*/
function judgeClient() {
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
    var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
    if (isAndroid) {
        return 'Android';
    } else if (isIOS) {
        return 'IOS';
    } else {
        return 'PC';
    }
}

function download(c_name, name, type_id, client_type) {
    $.ajax({
        type:'POST',
        url:'./ge_dl_url.html',
        data:{key:c_name, type_id:type_id, client_type:client_type},
        success:function (res) {
            //此处返回下载地址，接着跳转到下载地址即可
            if(client_type == 'Android') {
                var res = res.replace(/[(]\.\*[)]/, name);
                var res = res.replace(/\%/g,"");
                var res = res.replace(/\?/g,"");
                var res = res.replace(/\#/g,"");
                var res = res.replace(/\？/g,"");
            }

            window.location.href = res;
        }
    })
}



