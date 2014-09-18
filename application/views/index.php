<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7">
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
                data : '&cid=' + cid + '&key=<?=$uid?>',
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.status == 'error'){
                        alert('投票失败！' + ress.data);
                        return;
                    }else{
                        alert('投票成功！' + ress.data);


                        //投票数加1
                        var top_num = $('#top_roll_' + cid).length;
                        var left_num = $('#left_rank_' + cid).length;

                        if(top_num){
                            var top_now_num = $('#top_roll_' + cid).html();
                            $('#top_roll_' + cid).html(parseInt(top_now_num) + 1);
                        }

                        if(left_num){
                            var left_now_num = $('#left_rank_' + cid).html();
                            $('#left_rank_' + cid).html(parseInt(left_now_num) + 1)

                        }

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
            window.open (url, '分享到新浪微博', 'height=200, width=400, top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=n o, status=no');
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
                data : '&email=' + emailString + '&key=<?=$uid?>',
                async : false,
                dataType : 'json',
                success : function(ress){
                    if(ress.status == 'error'){
                        alert('注册失败！' + ress.data);
                        return;
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
                data : '&email=' + emailString + '&key=<?=$uid?>',
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
                type : 'POST',
                url : '<?=$this -> config -> base_url()?>welcome/sendenrollemail',
                data : '&key=<?=$uid?>',
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
    <div class="hd_home"><a href="#" title="首页"></a></div>
    <div class="hd_left"><a href="<?=$this->config->base_url()?>all?key=<?=$uid?>" title="最佳时令菜肴投票"></a></div>
    <div class="hd_logo"><a href="<?=$this->config->base_url()?>?key=<?=$uid?>" title="凯悦悦享家"></a></div>
    <div class="hd_first"><a href="<?=$this->config->base_url()?>old?key=<?=$uid?>" title="第一季回顾"></a></div>
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
                    <p>已有 <strong id="top_roll_<?=$value['id']?>"><?=$value['num']?></strong> 人投票</p>
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
    <div class="pro_all"><a href="<?=$this->config->base_url()?>all?key=<?=$uid?>" title="查看全部主厨美食卡"></a></div>
    <div class="clear"></div>
</div>
<!--产品 end-->
<!--活动说明 start-->
<div class="hdsm" style="height:316px;"><a href="<?=$this->config->base_url()?>terms?key=<?=$uid?>"> </a></div>
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
        <div class="btn_more"><a href="<?=$this->config->base_url()?>all?key=<?=$uid?>" title="查看更多"></a></div>
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
                                    #凯悦悦享家#温暖明媚的秋日，@京津新城凯悦酒店 张昭君师傅，向您推荐一道特色佳肴：酸辣菊花茄子。菜品的原材料采摘于酒店的阳光菜园，吃起来清香可口，仿佛踏上一场味蕾与心灵的清新旅行。现在点击凯悦悦享家 为它投票，还有机会赢双人酒店餐券哦！
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ekgfmb5ly8j20ci0g4diy.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BnxvexOAH" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#截止到今晚12点，“最佳时令菜肴”投票活动就要结束了。最受欢迎的时令菜肴究竟花落谁家？让我们拭目以待~同时，我们也将在9月23日公布幸运获奖名单。抓紧这最后几小时，为喜爱的菜肴投票吧，也许中奖的人就！是！你！
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ekgmv00533j20j30q6jye.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/Bnz8WlUSD" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#又到了海鲜最肥美的季节，@上海金茂君悦大酒店 厨师长简伟鹗为您推介宫府龙虾汤泡饭，软糯松滑的口感,使游走于舌尖的美味发挥到极致。现在为这道菜肴投票，就有机会赢双人酒店餐券，你还在等什么？
                                </p>
                                <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ekfjmjaoe3j20ci0g4q67.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BnqfX6Cxy" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#本季，@上海崇明金茂凯悦酒店 出品的黑毛猪煨鲜鲍，精选黑毛猪五花肉，邂逅崇明江边时鲜小鲍鱼，融入黄豆酱油入罐煨制数小时；辅以秘制浓汁有机南瓜饼，香糯酥烂，清香解腻。又是一道让人垂涎的崇明美味，快来为它投票吧！
                                </p>
                                <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1ekf9rdhih5j20ci0g441w.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/Bno1thm0I" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#奉化芋艿个大皮薄，口感绵密。@宁波柏悦酒店 钱湖渔港俞师傅，将这道淳朴食材打造出了软滑香糯的质朴风味。搭配秘制海鲜酱、糖桂花食用，再嘬上一口地道陈酿黄酒，“才下舌头，便上心头”的美好感觉油然而生。喜欢这道菜品？快来投票支持它吧~
                                </p>
                                <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ekec4112s9j20ci0g477n.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BngoYcIEV" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#在许多食客的心中，重庆是中国美食地图中最“麻辣“的存在。正如@重庆富力凯悦酒店 侯师傅推荐的这道双椒兔丁，将青红辣椒与细嫩兔肉搭配烹炒，色彩绚丽，麻辣喷香，绝对是视觉与味觉上的双重诱惑。喜欢重庆美食的朋友，快来为它投上一票~
                                </p>
                                <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1eke3vcnqujj20ci0g4jv1.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BnexdBn1F" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#还有几天，“最佳时令菜肴”评选活动就要结束啦！各位热爱美食的达人们，你最欣赏哪家酒店的创意菜肴？哪道菜品又令你念念不忘？抓紧时间为喜爱的菜肴投票，就有机会赢取双人免费餐券！还等什么，快来参加~
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ekd6qurg6lj209g0t60wp.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/Bn71X5ixH" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#金秋九月，@上海柏悦酒店 李伟民师傅将美食赋予秋意，打造出“秋之意，沪之味”的别致韵味。此次，他选用富含膳食纤维的五谷，再配以产自阳澄湖的母蟹蟹粉，烹制出香浓味美的黄金蟹粉五谷饭。即刻为它投上一票，双人餐券等你来赢！
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ekcyou51pqj20ci0g4goh.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/Bn5cPzhO9" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#美味不在于豪华盛大，只在于贴心贴胃；有时一粥一饭，胜过一燕一鲍。在本季评选“最佳时令菜肴”的活动中，多家酒店的厨师团队，将看似简单的食材，烹调出不平凡的人间美味。这其中，你最欣赏哪家酒店出品的菜肴？现在参与投票活动，还有机会赢取双人餐券！
                                </p>
                                <img alt="" src="http://ww1.sinaimg.cn/thumbnail/86a9ab32jw1ek9rpyey9lj209g0t6773.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmFadDMSI" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#@北京柏悦酒店 欧阳总厨倾情奉上历经十年才创作而出的冬瓜盅。汤中不仅加入阿拉斯加帝王蟹腿肉、海螺、花胶，还有香菇和枸杞将鲜味调至更佳。一盅一人份的冬瓜汤，不仅味美健康，更灌入厨师对烹饪的一份热爱与坚持。赶快为它投上宝贵的一票吧~
                                </p>
                                <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1ek9jyi0ik0j20ci0g4778.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmDpeDuna" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#本季，@济南万达凯悦酒店 王长亮师傅别具匠心，将传统地锅菜与新颖的秋葵合烹，打造出此道秋葵地锅斗鸡。王师傅的精湛厨艺，更好的将齐韵鲁味演绎成“每一道菜，都是一个故事”。热爱美食的朋友，快来点击图片，了解更多美食背后的故事。
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ek8mz2ebafj20ci0g4adm.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmvWdhm0A" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#秋日进补，营养美味的滋补汤必不可少。@天津帝旺凯悦酒店 打造的这款靓汤，用料极为丰富。其中有劲道爽口的特色独面筋，混合肉馅和鳕鱼的狮子头，以及野生鲜松茸，为慢炖八小时之久的靓汤注入更多营养，口感鲜美加倍。你会给这道菜投票吗？
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ek8c65qf5ej20ci0g4adk.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmtujmvNG" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#品尝过不少滋补营养的汤品，但你喝过特有男女之分的汤吗？@深圳君悦酒店 徐师傅打造的主厨功夫汤，便分为男汤、女汤两款，因放入不同食材而使得汤效各异。想知道这味醇香浓的汤里包含了哪些食材？答案就藏在图片里哦~
                                </p>
                                <img alt="" src="http://ww1.sinaimg.cn/thumbnail/86a9ab32jw1ek7f2rx2ibj20ci0g4goj.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmlZuBgFC" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#作为杭帮菜系中的经典之作，你了解叫花鸡的由来吗？如今，@上海外滩茂悦大酒店 杜才清主厨另辟蹊径，将多种秋季食材纳入童子鸡肚，荷叶包裹后封裹陶泥，置炭火烘烤而成。鸡肉入口板酥肉嫩，透着荷叶的清香，令人唇齿回味~喜欢就请为它投上一票！
                                </p>
                                <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1ek76rckzctj20ci0g4tbo.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/Bmk6T6RCO" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#精致的美味，不仅能带给食客舌尖上的享受，更能引起情感上的共鸣。@北京东方君悦大酒店 佟歆师傅以鸡鸭肘等熬制的高汤为基础，煲出味道浓郁、营养丰富的白菜豆腐汤，用平凡经典表达心意，简单却有家的味道。喜欢这道菜的朋友，别忘了投票支持它哦~
                                </p>
                                <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ek69vtd8vej20ci0g4whg.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmcEY1ivo" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#夏末渐秋，正是润养之季。哪些食物能起到健脾养胃的调理功效？@三亚太阳湾柏悦酒店Park_Hyatt 欧雪锋主厨给出了答案。一道扁豆炒虾球，不仅简单易学，营养价值高，口感更令人称赞。即刻点击大图，来学学这道菜肴的做法，回家试着做做看吧！
                                </p>
                                <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ek618jri6kj20ci0g4q5r.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BmaI2u7dE" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#秉承“珍馐百味不及原生之选”的粤菜精髓，@沈阳君悦酒店GrandHyattShenyang 罗贤园厨师长特采云南鲜松茸，精选大连活海参，打造出秋日进补的养生佳肴。想知道这道菜品有哪些神奇功效？不妨点击图片了解下吧~
                                </p>
                                <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32tw1ek54uafph7j20ci0g4n0c.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://www.weibo.com/2259266354/Bm3my27T9" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#每个季节都有健康美味的时令菜肴，在今年入秋之际，凯悦集团旗下22家酒店的大厨们各显身手，以应季食材打造佳肴美馔。活动期间，为您喜爱的菜肴投票，即有机会赢取双人免费餐券，赶快来参加吧！PS：投票次数越多，中奖几率越大噢~
                                </p>
                                <img alt="" src="http://ww1.sinaimg.cn/thumbnail/86a9ab32tw1ek3xl2mtp1j209g0t6jvg.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/Bm1t26hPI" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#每一道美食背后，往往隐藏着厨师们天马星空的创意，正如@杭州凯悦酒店 程郁师傅手下的这道橙香核桃脆虾球。将新鲜对虾油炸成圆润球形，淋上带有淡淡橙香的勾芡，口感清新，层次丰富。当橙子的果香在舌尖蔓延开来，幸福感岂不瞬间爆棚？
                                </p>
                                <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ek1n244inlj20ci0g4gqf.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BlASgFJtf?mod=weibotime" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#秋风起，蟹脚痒！又是一年吃蟹时，@广州富力君悦大酒店 司徒师傅，将岭南别具风味的“蟹中贵妃”黄油蟹肉与新鲜蛋白完美融合，烹制出比芙蓉更嫩滑的美馔佳肴。现在为您喜爱的菜肴投票，就有可能赢取双人免费餐券。快快行动起来吧！
                                </p>
                                <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1ek1ebq14h3j20ci0g4djt.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BlyTI61pG" target="_blank">查看详情</a></div>
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
                                    #凯悦悦享家#鸭皮酥脆，肉质鲜嫩，不少食客对香酥鸭的味道赞不绝口。可是你知道吗？这道菜品竟与清朝光绪皇帝颇有渊源。@上海新天地安达仕酒店 “海派”中餐厅的向师傅，以南京金陵散养小米鸭入菜，烹饪出喷香四溢的香酥小米鸭。喜欢的朋友快来为它投上一票~
                                </p>
                                <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1ek0spc664vj20ci0g4aec.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                <div class="btn_wb"><a href="http://weibo.com/2259266354/BltZYojpg" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#“最佳时令菜肴”评选正在火热进行中，快来点击链接http://t.cn/Rh2cxrb ，为您喜欢的菜品投上一票！参与投票更有机会嬴免费双人酒店餐券，还等什么，即刻开启“悦享家”之旅！
                                    </p>
                                    <img alt="" src="http://ww4.sinaimg.cn/thumbnail/86a9ab32jw1ek0hdb14mnj20j30q67b4.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BlrqEEPHe" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#吃松茸的最佳季节在于秋季，一旦错过，只有等明年秋风再起了。@青岛鲁商凯悦酒店 于东辉师傅选用上等鲜松茸，搭配芦笋和虾球，并融入日式料理的独特风味，营养均衡，味道鲜美。特别是进入口齿间的那一瞬，松茸的"鲜"味便定格在唇齿间，让人回味无穷~
                                    </p>
                                    <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ejzd82vrh0j20ci0g441k.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BlikWtdTy" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#在东北，人参是闻名遐迩的“三宝”之一。来到长白山脚下，我们的@长白山柏悦酒店 刘林生厨师长，极力推荐一道当地创新菜肴——拔丝人参。采用拔丝烹调方法烹制的人参，其菜肴色泽金黄，减弱了人参的苦味，味道香甜，是食疗养生的上佳菜肴。你会给这道菜投出一票吗？
                                    </p>
                                    <img alt="" src="http://ww1.sinaimg.cn/thumbnail/86a9ab32jw1ejz3c2c9krj20ci0g4n07.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/Blg5YdxhX" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#适逢养生之季，@长白山凯悦酒店 蒲凡超厨师长为您献上悦庭四宝汤。将飞龙、水鱼、野猪赤肉、竹丝鸡搁置茶壶中，加入石斛、海马、人参等珍贵药材，入清鸡汤文火慢炖3小时。炖出的野猪赤肉肉质肉嫩，入口细腻；汤味浓郁鲜美，充斥着淡淡香气。快来为您喜爱的菜品投票！
                                    </p>
                                    <img alt="" src="http://ww1.sinaimg.cn/thumbnail/86a9ab32jw1ejy7kautfgj20ci0g441q.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/Bl8TTmvU5" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#今日,为大家介绍一道@东莞松山湖凯悦酒店 松山茶居出品的特色菜——虎门港蒸水蟹饼，喜欢的朋友请记得为它投票哦！手工剁好肉饼，将水蟹处理好放在肉饼上蒸，任由蟹汁流入肉饼，而橘红色的蟹黄就镶嵌在肉饼里，吃起来清甜滑嫩，齿颊留香。搭配姜茶食用,味道更加惊艳。
                                    </p>
                                    <img alt="" src="http://ww3.sinaimg.cn/thumbnail/86a9ab32jw1ejxy380d3gj20ci0g4780.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/Bl6KLEbJH" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#由@贵阳中天凯悦酒店 出品的贵式香糯辣子鸡，烹饪手法颇具地方特色。干炒的方式让整个菜肴干香入味，经过小火焖至成熟的鸡肉香糯可口。尤其是当特制的秘方糍粑辣椒渗透到每一块鸡肉中时，便会看上去油色通红，闻起来香飘四溢,油而不腻，辣而不拒。即刻点击,为它投票！
                                    </p>
                                    <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ejx103439dj20ci0g4q6c.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BkZg1D3AI" target="_blank">查看详情</a></div>
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
                                        #凯悦悦享家#初秋养生，贵在滋阴润燥。今年，“凯悦悦享家之美馔第二季”主推应季时令菜肴，以独具匠心的创意搭配，为您带来温润滋养的秋日美味。秋季养生第一招即合理平衡膳食，饮食调养上应以防燥、润肺为主，宜食红枣、芝麻、蜂蜜、银耳、萝卜等食物。现在不妨和我们说说，您的秋季饮食会注意什么？
                                    </p>
                                    <img alt="" src="http://ww2.sinaimg.cn/thumbnail/86a9ab32jw1ejts3idccmj20hs0m8dmr.jpg" node-type="feed_list_media_bgimg" class="bigcursor">
                                    <div class="btn_wb"><a href="http://weibo.com/2259266354/BkEH1AzLi?mod=weibotime" target="_blank">查看详情</a></div>
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
