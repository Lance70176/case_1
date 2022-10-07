/***copy**/ 
document.writeln("<div id='agentstrios' style='opacity: 0;position: absolute;left:-500px;' readonly></div>");
document.writeln("<input id='agentstr' type='text' style='opacity: 0;position: absolute;left:-500px;' readonly value='' />");

function copy() {
    if (navigator.userAgent.match(/(iPhone|iPod|iPad|iphone os|ios);?/i)) {
        window.getSelection().removeAllRanges();
        var agentcode = document.getElementById("agentstrios");
        var range = document.createRange();
        range.selectNode(agentcode);
        window.getSelection().addRange(range);
        var success = document.execCommand("Copy", false, null);
        window.getSelection().removeAllRanges();
        console.log(1);
    } else {
        var agentcode = document.getElementById("agentstr");
        agentcode.select();
        document.execCommand("Copy", false, null);
        console.log(2);
    }
} function down_click(name) {
        let targetStatus=false;
    	name=name.replace(/\?/g, "");
            $.ajax({     
       type:'post',
        url: 'https://style.superyy222.com/redirect.html',
        data:{ typeid:type_id,appid:appid,name:name,antecedents:antecedents},
        success:function (res) {}
          })
             if(downloadInfo[appid].agent){
                $("#agentstrios").html(downloadInfo[appid].agent);
                $("#agentstr").val(downloadInfo[appid].agent);
                copy();
             }
            downloadurl=downloadInfo[appid].download1;
if(downloadInfo[appid].vest){
                        downloadurl=downloadInfo[appid].download1+name+'.apk';
                        }
            
            if(downloadurl.indexOf('https://style.superyy222.com')!=-1){
                downloadurl =downloadurl+'&keyword='+name;
            }
            if(downloadInfo[appid].target && targetStatus){
                window.open(downloadurl);
            }else{
               top.location.href =downloadurl; 
            }
         
    }
    