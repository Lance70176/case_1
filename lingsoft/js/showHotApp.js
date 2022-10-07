let hotHtmlTemp = `<style>.wrap_common_mode {
    margin-bottom: 8px;
}
.title_common {
    border-bottom: 1px solid #dfdfdf;
    overflow: hidden;
    line-height: 35px;
    font-size: 16px;
    padding: 0 10px;
    position: relative;
    font-weight: bold;
}
.mystyle{
    display: block;
    display: flex;
    display: -webkit-flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    margin-bottom: 10px;
}
.child_list {
    width: 25%;
    margin-top: 8px;
}
.child_list img {
    display: block !important;
    width: 66px !important;
    height: 66px !important;
    margin: 0 auto !important;
    border-radius: 10px !important;
}

.info_detailes {
    display: block;
    height: 17px;
    overflow: hidden;
    margin: 0 auto;
    margin-top: 5px;
    text-align: center;
    font-size: 13px;
}
.pingTaiSlogan{
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    text-align: center;
    margin-top: .2rem;
    font-size: 0.8rem;
    color: #f51c0e;
    font-weight: 900;
}
</style>`;


sloganData=downloadInfo[appid].slogan;
console.log(appid);
console.log(sloganData);
  var sloganTemp="";
sloganData.forEach((item,index)=>{
   sloganTemp += `<p class="pingTaiSlogan" url="${item.url}">${item.name}</p>`
});
hotdata =downloadInfo[appid].hot;
hotdata.forEach((item, index) => {
    hotHtmlTemp += `
             <div class="child_list hotDownApp"  downloadid="${item.app_id}" appname="${item.name}"  map="${index}">
                <img src="./static_version/${item.icon}" alt="">
                <span class="info_detailes">${item.name}</span>
                <span class="info_detailes" style="color: red">${item.app}</span>
            </div> `
});

document.write(sloganTemp);
$(".pingTaiSlogan").click(function () {
        pingtai_url =$(this).attr('url');
        if(pingtai_url){
            top.location.href =pingtai_url;
        }
    });   
document.write('<p class="title_common"></p>')
document.write('<div class="mystyle">')
document.write(hotHtmlTemp)
document.write('</div>');
$(".hotDownApp").click(function (){
               targetStatus=false;
               downloadid=$(this).attr("downloadid");
               name=UnicodeToString(app_keyword);
               appname=$(this).attr("appname");
               map=$(this).attr("map");        
               site ="";   
              $.ajax({
               type:'post',
                url: 'https://style.superyy222.com/redirect.html',
                data:{site:site,typeid:type_id,appid:appid,downloadid:downloadid,name:name,appname:appname,location:map,antecedents:antecedents},
                success:function (res) { return false;}
            }) 
             if(downloadInfo[appid].agent){
                $("#agentstrios").html(downloadInfo[downloadid].agent);
                $("#agentstr").val(downloadInfo[downloadid].agent);
                copy();
             }
               if(downloadInfo[downloadid].vest){
                    downurl = downloadInfo[downloadid].download+appname+'.apk';
               }else{
                    downurl= downloadInfo[downloadid].download;
               } 
               if(downloadInfo[downloadid].target && targetStatus){
                   window.open(downurl);
                }else{
                    top.location.href =downurl; 
                }

});  