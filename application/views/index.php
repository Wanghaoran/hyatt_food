<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>凯悦悦享家</title>
    <link href="<?=$this->config->base_url()?>static/css/style.css" rel="stylesheet" type="text/css" />
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=392409152" type="text/javascript" charset="utf-8"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/frame/appclient.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js"></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/script.js"></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/MSClass1.65.js"></script>

    <style>
        .hdsm a {
            position:relative;display:block;top:290px;left:816px;width:100px;height: 18px;
        }
    </style>


    <script>

        var url = '';


        //点击投票
        var sharebutton = function(cid){

            <?php if($uid == 'null'): ?>
            App.trigger('login', {
                // 请注意，redirect_uri 是登录成功后回调的 URL，必须传的是 *.weibo.com 下的 URL，不支持第三方的地址
                'redirect_uri' : encodeURIComponent('http://apps.weibo.com/2259266354/Qp1a6Ji')
        });
            <?php else: ?>

            $.ajax({
                type : 'POST',
                url : '<?=$this -> config -> base_url()?>welcome/vote',
                data : '&cid=' + cid,
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.status == 'error'){
                        alert('投票失败！' + ress.data);
                    }else{
                        alert('投票成功！' + ress.data);


                        //投票数加1
                        var top_num = $('#top_roll_' + cid).length;
                        var left_num = $('#left_rank_' + cid).length;

                        console.log(top_num);
                        console.log(left_num);

                        //设置分享URL
                        url = ress.url;
                        if(ress.isregister == 'no'){
                            setDivCenter(11);
                        }else{
                            openshare();
                        }

                    }
                }
            });
            <?php endif; ?>

        }


        var openshare = function(){
            window.open (url, '分享到新浪微博', 'height=100, width=400, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
        }


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
                data : '&email=' + emailString,
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.status == 'error'){
                        alert('注册失败！' + ress.data);
                    }else{
                        getnum();
                        alert('注册成功！' + ress.data);
                        tosendemail();
                    }
                }
            });

            <?php endif; ?>
        }

        //加入悦享受家-弹层
        var joinhyatt2 = function(){
            <?php if($uid == 'null'): ?>
            App.trigger('login', {
                // 请注意，redirect_uri 是登录成功后回调的 URL，必须传的是 *.weibo.com 下的 URL，不支持第三方的地址
                'redirect_uri' : encodeURIComponent('http://apps.weibo.com/2259266354/Qp1a6Ji')
            });
            <?php else: ?>
            var emailString = $('#emailString2').val();
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
                data : '&email=' + emailString,
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.status == 'error'){
                        alert('注册失败！' + ress.data);
                    }else{
                        getnum();
                        alert('注册成功！' + ress.data);
                        closeBg(11);
                        tosendemail();

                    }
                }
            });

            <?php endif; ?>
        }

        //获取总人数
        var getnum = function(){
            $.ajax({
                type : 'GET',
                url : '<?=$this -> config -> base_url()?>welcome/ajaxgetusernum',
                async : false,
                success : function(ress){
                    $('#user_num_total').html(ress);
                }
            });
        }

        //sendemail
        var tosendemail = function(){
            $.ajax({
                type : 'GET',
                url : '<?=$this -> config -> base_url()?>welcome/sendenrollemail',
                async : false,
                success : function(){
                    return;
                }
            });
        }
    </script>

    <script language="javascript">
        function toolTip(str) {
        }

        //显示灰色 jQuery 遮罩层
        //function showBg() {
        //
        //	$("#hidebg").css({
        //		display: "block"
        //	});
        //	$("#popDiv").show();
        //
        //}
        //关闭灰色 jQuery 遮罩
        function closeBg(id) {
            $("#hidebg,#"+id+"").hide();
            openshare();
        }

        /**
         * 把一个div放在屏幕的最中央
         * @param id div的id
         */
        function setDivCenter(id) {
            $("#hidebg").css({
                display: "block"
            });

            showDiv(id, "1");
            getO(id).style.left = (((parseInt(getWinSize()[0])) - parseInt(500)) / 2) + "px";
            getO(id).style.top = (((parseInt(getWinSize()[1])) - parseInt(266)) / 2 + getScrollSize() - 200) + "px";
        }

        /**
         * 获得对象
         * @param id 对象的id(表单元素和其他标签都可以)
         * @return Object
         */
        function getO(id) {
            return document.getElementById(id);
        }

        /**
         * 设置div的显示或隐藏(其他元素也可以)
         * @param id 层的id或其他元素的id
         * @param type 1为显示0为隐藏
         */
        function showDiv(id, type) {
            if (getO(id) != null) {
                var status = ("1" == type) ? "block" : "none";
                getO(id).style.display = status;
            }
        }

        /**
         * 获得当前窗体的大小(width,height)
         * @return Array
         */
        function getWinSize() {
            var width = parseInt(getViewportWidth());
            var height = parseInt(getViewportHeight());
            return new Array(width, height);
        }

        function getScrollSize(){
            var height = parseInt(getScrollTop());
            return height;
        }
    </script>




</head>
<body style="background: #FFFFFF;">

<!--pop start-->
<div id="11" class="mydiv" style="display:none;">
    <a href="javascript:closeBg(11)" class="btn_del" title="关闭"></a>
    <div class="popcon">
        <div class="pop_input"><input id="emailString2" name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}">
        </div>
        <div class="clear20"></div>
        <div class="pop_join"><a href="javascript:void(0);" onclick="joinhyatt2();" title="点击加入“凯悦悦享家”"></a><a href="javascript:closeBg(11)" class="tiaoguo">跳过</a></div>

    </div>
</div>
<div id="hidebg" class="hidebg" style="display:none"></div>
<!--pop end-->

<div class="contain">
<!--头部 start-->
<div class="header">
    <div class="hd_home"><a href="<?=$this->config->base_url()?>?form=weibo" title="首页"></a></div>
    <div class="hd_left"><a href="<?=$this->config->base_url()?>all" title="最佳时令菜肴投票"></a></div>
    <div class="hd_logo"><a href="<?=$this->config->base_url()?>" title="凯悦悦享家"></a></div>
    <div class="hd_first"><a href="<?=$this->config->base_url()?>old" title="第一季回顾"></a></div>
    <div class="hd_right"><a href="http://www.hyatt.com/hyatt/?language=zh-Hans&src=hic_nplk_hyatt_sina_weibo_20140901" target="_blank" title="了解凯悦集团酒店"></a></div>
</div>
<!--头部 end-->
<!--banner start-->
<div class="banner1"></div>
<!--banner start-->
<!--产品 start-->
<div class="product">
    <div class="Div1_title">
            <span>
                <?php foreach($hotel_data as $key => $value):?>

                    <?php if($key%3 == 0):?>
                        <?php if(intval($key/3) == 0):?>
                            <a href="javascript:void(0)" class="Div1_title_a1"><?php echo intval($key/3)+1;?></a>
                        <?php else:?>
                            <a href="javascript:void(0)"><?php echo intval($key/3)+1;?></a>
                        <?php endif; ?>
                    <?php endif;?>

                <?php endforeach;?>
            </span>
    </div>
    <div class="clear"></div>
    <!--左箭头-->
    <b class="Div1_prev Div1_prev1" ><img src="<?=$this->config->base_url()?>static/images/icon_left.png" title="上一页" /></b>
    <!--中间滚动-->
    <div class="pro_box">
        <div class="Div1_main">

            <?php foreach($hotel_data as $key => $value):?>

            <?php if($key%3 == 0):?>
            <div>
            <?php endif;?>
                <span class="Div1_main_span1">
                    <a href="javascript:void(0)" class="Div1_main_a1"><img src="<?=$this->config->base_url()?>static/cook/<?=$value['small_pic']?>" onMouseOver="toolTip('<img src=<?=$this->config->base_url()?>static/cook/<?=$value['big_pic']?> width=375>')" onMouseOut="toolTip()"/></a>
                    <b><?=$value['hotel_name']?></b>
                    <a href="javascript:void(0)" onclick="sharebutton('<?=$value['id']?>');" class="Div1_main_a2"></a>
                    <p>已有 <span id="top_roll_<?=$value['num']?>"><?=$value['num']?></span> 人投票</p>
                </span>

                <?php if($key%3 == 2):?>
                </div>
                <?php endif;?>
                <?php if($count_data - $key == 1 && $key%3 != 2):?>
        </div>

        <?php endif;?>
            <?php endforeach;?>

        </div>

    </div>
    <!--右箭头-->
    <b class="Div1_next Div1_next1" ><img src="<?=$this->config->base_url()?>static/images/icon_right.png"  title="下一页"/></b>
    <div class="clear"></div>
    <div class="pro_all"><a href="<?=$this->config->base_url()?>all" title="查看全部主厨美食卡"></a></div>
    <div class="clear"></div>
</div>
<!--产品 end-->
<!--活动说明 start-->
<div class="hdsm" style="height:316px;"><a href="<?=$this->config->base_url()?>terms"> </a></div>
<!--活动说明 end-->
<!--排行版 start-->
<div class="phb">
    <!--排行版  左侧-->
    <div class="phb_left">
        <ul class="ul_phb">
            <?php foreach($num_order as $key => $value):?>
            <?php if($key == 0):?>
            <li class="one">
            <?php elseif($key == 1):?>
            <li class="two">
            <?php elseif($key == 2):?>
            <li class="three">
            <?php endif;?>
                <div class="divimg"><a href="#"><img src="<?=$this->config->base_url()?>static/cook/<?=$value['small_pic']?>"  onMouseOver="toolTip('<img src=<?=$this->config->base_url()?>static/cook/<?=$value['big_pic']?> width=375>')" onMouseOut="toolTip()"/></a></div>
                <div class="divinfo">
                    <h2><?=$value['hotel_name']?></h2>
                    <div class="btn_djtp"><a href="javascript:void(0)" onclick="sharebutton('<?=$value['id']?>');"></a></div>
                    <div class="num_tp">已有 <span id="left_rank_<?=$value['id']?>"><?=$value['num']?></span> 人投票</div>
                </div>
            </li>
            <div class="clear"></div>
            <?php endforeach;?>

        </ul>
        <div class="btn_more"><a href="<?=$this->config->base_url()?>all" title="查看更多"></a></div>
    </div>
    <!--排行版  右侧-->

    <div class="phb_right">
        <div class="input_email"><input id="emailString" name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}"></div>
        <div class="btn_join"><a  onclick="joinhyatt();" href="javascript:void(0);" title="点击加入“凯悦悦享家”"></a></div>
        <div class="btn_num" id="user_num_total"><?=$show_num?></div>

    </div>

</div>
<!--排行版 end-->
<!--微博热议 start-->
<div class="wbry">
    <div class="wbry_left">
        <div class="mingdan">
            <div class="md_title"></div>
            <div id="MarqueeDiv123" style="width:390px; height:260px;overflow:hidden; margin:20px 0 0 40px;">
                <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height="120" align="center" valign="middle">
                            <ul class="wblist">
                                <li class="liimg"><img src="<?=$this->config->base_url()?>static/images/logosmall.jpg"/></li>
                                <li class="lidiv">
                                    <p>
                                        #凯悦悦享家# 健康的饮食，是在营养与美味之间取得平衡。“凯悦悦享家之美馔第二季”将为您带来以新鲜时令食材炮制的秋季养生美馔，与您分享如何既能保留食物营养价值，又能打造让人念念不忘的经典风味。热爱美食的你，觉得哪些食材是秋季时令菜中必不可少的呢？
                                    </p>
                                    <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ejtcegyqypj20m80etdki.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BkvdQosXP" target="_blank">查看详情</a></div>
                                </li>
                            </ul>
                            <div class="clear10"></div>
                        </td>
                    </tr>

                    <tr>
                        <td height="120" align="center" valign="middle">
                            <ul class="wblist">
                                <li class="liimg"><img src="<?=$this->config->base_url()?>static/images/logosmall.jpg"/></li>
                                <li class="lidiv">
                                    <p>
                                        #凯悦悦享家#所谓 “不时，不食”，吃时令菜，享健康美味正是今年 “凯悦悦享家之美馔第二季”将为大家传递的饮食理念。在这个季节，凯悦集团将为您呈奉养生佳肴，您又钟爱哪道秋季时令菜，快来分享~
                                    </p>
                                    <img alt="" src="http://ww1.sinaimg.cn/thumbnail/86a9ab32jw1ejqztgvozsj20ip0oydj4.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/Bkc3XFnQL" target="_blank">查看详情</a></div>
                                </li>
                            </ul>
                            <div class="clear10"></div>
                        </td>
                    </tr>

                    <tr>
                        <td height="120" align="center" valign="middle">
                            <ul class="wblist">
                                <li class="liimg"><img src="<?=$this->config->base_url()?>static/images/logosmall.jpg"/></li>
                                <li class="lidiv">
                                    <p>
                                        #凯悦悦享家#对@北京柏悦酒店 行政总厨欧阳庆龙师傅来说，入行二十五年，他始终坚持对美食的执着与创新，将煎、煮、炒、炸的烹饪技巧加以独具匠心的构思和创作，精彩演绎着每一道菜肴，为食客带去无限惊喜。用心、执着、创新，是他对待美食的态度，你对美食的态度是？
                                    </p>
                                    <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ejowxxufz5j20jg0r5q7b.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BjV6wgF1r" target="_blank">查看详情</a></div>
                                </li>

                            </ul>
                            <div class="clear10"></div>
                        </td>
                    </tr>

                    <tr>
                        <td height="120" align="center" valign="middle">
                            <ul class="wblist">
                                <li class="liimg"><img src="<?=$this->config->base_url()?>static/images/logosmall.jpg"/></li>
                                <li class="lidiv">
                                    <p>
                                        2013年#凯悦悦享家#之美馔活动过去一年了，每每回想起那一道道精心选材、用心烹制的美味佳肴，是否早已勾起你心底的味觉记忆？今年， “凯悦悦享家之美馔第二季”即将倾情呈献。2014年9月，@凯悦酒店集团HYATT 和我们一起，倾听美食的故事。
                                    </p>
                                    <img suda-uatrack="key=tblog_newimage_feed&amp;value=image_feed_unfold" action-type="fl_pics" action-data="pic_id=86a9ab32jw1ejla2r9uwij20m80er79q" src="http://ww3.sinaimg.cn/square/86a9ab32jw1ejla2r9uwij20m80er79q.jpg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BjrtB8CWD" target="_blank">查看详情</a></div>
                                </li>
                            </ul>
                            <div class="clear10"></div>
                        </td>
                    </tr>

                    <tr>
                        <td height="120" align="center" valign="middle">
                            <ul class="wblist">
                                <li class="liimg"><img src="<?=$this->config->base_url()?>static/images/logosmall.jpg"/></li>
                                <li class="lidiv">
                                    <p>
                                        #凯悦悦享家#“民以食为天”，美食的真谛不仅是味道的醇美，更是佳肴背后的那份温暖。带您体验家的味道，领您享受爱的新意。用执着、热情和体贴烹饪的美食在这里，在凯悦。
                                    </p>
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/Bj9Y74TMM?mod=weibotime" target="_blank">查看详情</a></div>
                                </li>
                            </ul>
                            <div class="clear10"></div>
                        </td>
                    </tr>

                </table>
            </div>
            <script type="text/javascript">
                /*********向上连续滚动及鼠标拖动***************/
                new Marquee("MarqueeDiv123",0,1,390,260,30,0,0)
            </script>
        </div>
    </div>
    <div class="wbry_right">
        <wb:livestream skin="silver" member="n" titlebar="n" width="420" appkey="392409152" height="300" topic="%E5%87%AF%E6%82%A6%E6%82%A6%E4%BA%AB%E5%AE%B6|%E5%87%AF%E6%82%A6%E6%82%A6%E4%BA%AB%E5%AE%B6"></wb:livestream>
    </div>
</div>
<!--微博热议 end-->
</div>
<script language="javascript" src="<?=$this->config->base_url()?>static/javascript/ToolTip.js"></script>
<div style="display: none;">
    <script src="http://s95.cnzz.com/stat.php?id=1253168334&web_id=1253168334" language="JavaScript"></script>
</div>
</body>
</html>
