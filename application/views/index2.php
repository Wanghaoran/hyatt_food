<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>凯悦悦享家</title>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=392409152" type="text/javascript" charset="utf-8"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/frame/appclient.js" charset="utf-8"></script>

    <link href="<?=$this->config->base_url()?>static/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var o=0;
	var timeInterval=3000000;
	var $cont=$(".tab_container div");
	var $title=$(".tabs li");
		
	$cont.hide();
	$($cont[0]).show();
	function auto(){
		o<$cont.length-1?o++:o=0;
		$cont.eq(o).show().siblings().hide(); 
		$title.eq(o).addClass("active").siblings().removeClass("active");   
	}
	set = window.setInterval(auto,timeInterval);
	
	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {

        $('#v_id').val($(this).attr('id'));
			window.clearInterval(set);
			o=$(this).index();
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).show(); //Fade in the active content
		set = window.setInterval(auto,timeInterval); 
		return false;
	});

});
</script>

    <script>
        var sendWeibo = function(){

            var cid = $('#weiboContent').val();
            var vedioID = $('#v_id').val();

            $.ajax({
                type : 'POST',
                url : '<?=$this -> config -> base_url()?>welcome/execsend',
                data : '&vedioID=' + vedioID + '&cid=' + cid +'&key=<?=$ass_token?>',
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.id){
                        alert('分享成功！感谢您的参与！');
                    }else{
                        alert('分享失败！' + ress.error);
                    }
                }
            });

        }
    </script>

    <script>
        //加入悦享受家
        var joinhyatt = function(){
            <?php if($uid == 'null'): ?>
            App.trigger('login', {
                // 请注意，redirect_uri 是登录成功后回调的 URL，必须传的是 *.weibo.com 下的 URL，不支持第三方的地址
                'redirect_uri' : encodeURIComponent('http://apps.weibo.com/2259266354/Qp1a6Ji')
            });
            <?php else: ?>
            var emailString = $('#emailString').val();
            //验证
            if(emailString == '请输入您的邮箱'){
                alert('请您输入电子邮件地址！');
                $('#emailString').focus();
                return;
            }
            var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
            if(!reg.test(emailString)){
                alert('邮件格式不正确，请您重新输入！');
                return;
            }

            $.ajax({
                type : 'POST',
                url : '<?=$this -> config -> base_url()?>welcome/enroll',
                data : '&email=' + emailString + '&key=<?=$uid?>',
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.status == 'error'){
                        alert('注册失败！' + ress.data);
                        return;
                    }else{
                        alert('注册成功！' + ress.data);
                        return;
                    }
                }
            });

            <?php endif; ?>
        }
    </script>
</head>
<body style="background: #FFFFFF;">
<div class="contain">
	<!--头部 start-->
	<div class="header hd2">

        <div class="hd_home"><a href="#" title="凯悦点评家"></a></div>
        <div class="hd_left"><a href="<?=$this->config->base_url()?>all?key=<?=$uid?>&to=<?=$ass_token?>" title="最佳时令菜肴投票"></a></div>
        <div class="hd_logo"><a href="<?=$this->config->base_url()?>?key=<?=$uid?>&to=<?=$ass_token?>" title="凯悦悦享家"></a></div>
        <div class="hd_first"><a href="<?=$this->config->base_url()?>old?key=<?=$uid?>&to=<?=$ass_token?>" title="第一季回顾"></a></div>
        <div class="hd_right"><a href="http://www.hyatt.com/hyatt/?language=zh-Hans&src=hic_nplk_hyatt_sina_weibo_20140901" target="_blank" title="了解凯悦集团酒店"></a></div>

    </div>
    <!--头部 end-->
    <!--banner start-->
    <div class="banner4"></div>
    <!--banner start-->
    <!--视频 start-->
    <div class="videobox">
        <div class="tab_container">

            <div id="tab1" class="tab_content" style="display: block; ">
                <p class="tab_title"><img src="<?=$this->config->base_url()?>static/images/text_jd1.png"/></p>
                <P class="tab_info"><embed src="http://player.youku.com/player.php/sid/XODAzODYxMzYw/v.swf" quality="high" width="754" height="408" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></P>

            </div>

            <div id="tab2" class="tab_content" style="display: none; ">
                <p class="tab_title"><img src="<?=$this->config->base_url()?>static/images/text_jd2.png"/></p>
                <P class="tab_info"><embed src="http://player.youku.com/player.php/sid/XODAzOTAwOTk2/v.swf" quality="high" width="754" height="408" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></P>
            </div>

            <div id="tab3" class="tab_content" style="display: none; ">
               <p class="tab_title"><img src="<?=$this->config->base_url()?>static/images/text_jd3.png"/></p>
              <P class="tab_info"><embed src="http://player.youku.com/player.php/sid/XODAzODY4Mzc2/v.swf" quality="high" width="754" height="408" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></P>
               
            </div>
            <div id="tab4" class="tab_content" style="display: none; ">
               <p class="tab_title"><img src="<?=$this->config->base_url()?>static/images/text_jd4.png"/></p>
              <P class="tab_info"><embed src="http://player.youku.com/player.php/sid/XODAzODYxNTky/v.swf" quality="high" width="754" height="408" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></P>
               
            </div>
            <div id="tab5" class="tab_content" style="display: none; ">
               <p class="tab_title"><img src="<?=$this->config->base_url()?>static/images/text_jd5.png"/></p>
              <P class="tab_info"><embed src="http://player.youku.com/player.php/sid/XODAzOTcxMTA4/v.swf" quality="high" width="754" height="408" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></P>
               
            </div>
        </div>
        <ul class="tabs">
            <li id="v_2" class="one active"><a href="#tab1" class="a1">&nbsp;</a></li>
            <li id="v_1" class="two"><a href="#tab2" class="a2">&nbsp;</a></li>
            <li id="v_3" class="three"><a href="#tab3" class="a3">&nbsp;</a></li>
            <li id="v_4" class="four"><a href="#tab4" class="a4">&nbsp;</a></li>
            <li id="v_5" class="five"><a href="#tab5" class="a5">&nbsp;</a></li>
        </ul>

        <input type="hidden" id="v_id" value="v_1"/>

    </div>
    <!--视频 end-->
    <!--评论 start-->
	<div class="pinglun">
    	<textarea onclick="$(this).val('#凯悦悦享家#');" id="weiboContent">写下您的点评并分享，赢取美馔线下活动入场券</textarea>
        <div class="icon_share"><a onclick="sendWeibo();" title="分享"></a></div>
    </div>
    <!--评论 end-->

    <!--邮件 start-->
    <div class="youjian">
        <div class="yjbox">
            <input type="text" value="请输入您的邮箱" id="emailString" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}"/>
            <div class="yj_btn"><a href="javascript:joinhyatt();" title="完成"></a></div>
        </div>
    </div>
    <!--邮件 end-->

    <!--讨论 start-->
    <div class="tlbox">
        <div class="taolun">

            <!--
            <div class="qx_list" id="container">
                <ul>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl1.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>十一全家来度假，自助晚餐超值哦！@天津帝旺凯悦酒店 [good][good][good] http://t.cn/RPgL6YK</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl2.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>@天津帝旺凯悦酒店 一直爱凯悦家的餐品，终于盼来了下午茶，168+15%服务费的双人下午茶，在五星级酒店中算是价位便宜的了，但品质却能排进前三，必须大赞！下午茶在添一个好去处[鼓掌]</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl3.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>#爱犬计划# 毛毛是一只金毛犬，今年十岁了。这是它第一次住酒店，充满了兴奋和好奇。毛毛入住的是@天津帝旺凯悦酒店专门为带宠物旅行的客人而准备的特色客房，也是酒店在天津市内首度引进凯悦酒店集团『爱犬计划』。http://t.cn/R7PJmMk</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl4.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>我上传了一张天津帝旺凯悦酒店的图片， http://t.cn/RvjgeKY @大众点评</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl5.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>@天津帝旺凯悦酒店 悦园中餐厅，绿意萦绕，大片大片的绿植，喜欢这里的安静惬意~旁边是露天就餐区和小酒吧~烤鸭作为特色菜，会按照客人的预定就餐
                            时间上桌，烤制后现场制作，鸭皮酥脆入口即化，鸭胸肉略酸，鸭腿肉质够细嫩，配上薄荷小黄瓜口感清爽不腻~八珍豆腐煲食材新鲜口感略酸~</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl6.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>十一全家来度假，自助晚餐超值哦！@天津帝旺凯悦酒店 [good][good][good] http://t.cn/RPgL6YK</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl1.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>十一全家来度假，自助晚餐超值哦！@天津帝旺凯悦酒店 [good][good][good] http://t.cn/RPgL6YK</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl2.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>@天津帝旺凯悦酒店 一直爱凯悦家的餐品，终于盼来了下午茶，168+15%服务费的双人下午茶，在五星级酒店中算是价位便宜的了，但品质却能排进前三，必须大赞！下午茶在添一个好去处[鼓掌]</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl3.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>#爱犬计划# 毛毛是一只金毛犬，今年十岁了。这是它第一次住酒店，充满了兴奋和好奇。毛毛入住的是@天津帝旺凯悦酒店专门为带宠物旅行的客人而准备的特色客房，也是酒店在天津市内首度引进凯悦酒店集团『爱犬计划』。http://t.cn/R7PJmMk</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl4.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>我上传了一张天津帝旺凯悦酒店的图片， http://t.cn/RvjgeKY @大众点评</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl5.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>@天津帝旺凯悦酒店 悦园中餐厅，绿意萦绕，大片大片的绿植，喜欢这里的安静惬意~旁边是露天就餐区和小酒吧~烤鸭作为特色菜，会按照客人的预定就餐
                            时间上桌，烤制后现场制作，鸭皮酥脆入口即化，鸭胸肉略酸，鸭腿肉质够细嫩，配上薄荷小黄瓜口感清爽不腻~八珍豆腐煲食材新鲜口感略酸~</p>
                    </li>
                    <li class="box">
                        <div class="qx_picBox"><img src="<?=$this->config->base_url()?>static/images/img_pbl6.jpg"/></div>
                        <h3><a href="#">评论(1)</a>&nbsp;&nbsp;<a href="#">转发(19)</a></h3>
                        <p>十一全家来度假，自助晚餐超值哦！@天津帝旺凯悦酒店 [good][good][good] http://t.cn/RPgL6YK</p>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            -->

            <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.masonry.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    var $container = $('#container');
                    $container.imagesLoaded(function(){
                        $container.masonry({
                            itemSelector: '.box',
                            columnWidth: 12 //每两列之间的间隙为5像素
                        });
                    });
                });
            </script>


        </div>
    </div>
    <!--讨论 end-->
    <!--底部 start-->
    <div class="footer"></div>

</div>
<div style="display: none;">
    <script src="http://s95.cnzz.com/stat.php?id=1253168334&web_id=1253168334" language="JavaScript"></script>
</div>
</body>
</html>
