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
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/MSClass.js"></script>

    <style>
        .hdsm a {
            position:relative;display:block;top:290px;left:816px;width:100px;height: 18px;
        }
    </style>


    <script>


        //点击投票
        var sharebutton = function(){

            <?php if($uid == 'null'): ?>
            App.trigger('login', {
                // 请注意，redirect_uri 是登录成功后回调的 URL，必须传的是 *.weibo.com 下的 URL，不支持第三方的地址
                'redirect_uri' : encodeURIComponent('http://apps.weibo.com/2259266354/Qp1a6Ji')
        });
            <?php else: ?>
            //TODO:投票
            setDivCenter(11);
            <?php endif; ?>

        }


        var openshare = function(){
            var url = 'http://service.weibo.com/share/share.php?url=http%3A%2F%2Fopen.weibo.com%2Fsharebutton&appkey=2131282401&language=zh_cn&title=%23%E5%87%AF%E6%82%A6%E6%82%A6%E4%BA%AB%E5%AE%B6%23%E6%88%91%E5%9C%A8%E8%AF%84%E9%80%89%E2%80%9C%E6%9C%80%E4%BD%B3%E6%97%B6%E4%BB%A4%E8%8F%9C%E8%82%B4%E2%80%9D%E6%B4%BB%E5%8A%A8%E4%B8%AD%EF%BC%8C%E6%8A%8A%E7%A5%A8%E6%8A%95%E7%BB%99%E4%BA%86xxxxx%E9%85%92%E5%BA%97%E7%9A%84%E3%80%90xxxxx%E8%8F%9C%E5%90%8D%E3%80%91%E3%80%82%E5%BF%AB%E6%9D%A5%E5%92%8C%E6%88%91%E4%B8%80%E8%B5%B7%E4%B8%BA%E5%96%9C%E7%88%B1%E7%9A%84%E8%8F%9C%E8%82%B4%E6%8A%95%E7%A5%A8%EF%BC%8C%E5%B0%B1%E6%9C%89%E6%9C%BA%E4%BC%9A%E8%B5%A2%E5%8F%96%E5%8F%8C%E4%BA%BA%E5%85%8D%E8%B4%B9%E9%85%92%E5%BA%97%E9%A4%90%E5%88%B8%21&source=&sourceUrl=&ralateUid=2259266354&message=&uids=&pic=&searchPic=false&content=123';
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
            var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
            if(!reg.test(emailString)){
                alert('邮件格式不正确，请您重新输入！');
                return;
            }
            alert(emailString);

            <?php endif; ?>
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
        <div class="pop_input"><input name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}">
        </div>
        <div class="clear20"></div>
        <div class="pop_join"><a href="javascript:void(0);" onclick="alert('活动将于9月1日正式上线，请您届时加入凯悦悦享家！');" title="点击加入“凯悦悦享家”"></a><a href="javascript:closeBg(11)" class="tiaoguo">跳过</a></div>

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
                    <a href="javascript:void(0)" onclick="sharebutton();" class="Div1_main_a2"></a>
                    <p>已有 <?=$value['num']?> 人投票</p>
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
                    <div class="btn_djtp"><a href="javascript:void(0)" onclick="sharebutton();"></a></div>
                    <div class="num_tp">已有 <?=$value['num']?> 人投票</div>
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
        <div class="btn_num">00051</div>

    </div>

</div>
<!--排行版 end-->
<!--微博热议 start-->
<div class="wbry">
    <div class="wbry_left">
        <div class="mingdan">
            <div class="md_title"></div>
            <div id="MarqueeDiv" style="width:390px; height:260px;overflow:hidden; margin:20px 0 0 40px;">
                <table width="420" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height="120" align="center" valign="middle">
                            <ul class="wblist">
                                <li class="liimg"><img src="<?=$this->config->base_url()?>static/images/logosmall.jpg"/></li>
                                <li class="lidiv">
                                    <p>#凯悦悦享家#活动将于9月1日正式开启！</p>
                                </li>
                            </ul>
                            <div class="clear10"></div>
                        </td>
                    </tr>

                </table>
            </div>
            <script type="text/javascript">
                /*********向上连续滚动及鼠标拖动***************/
//                new Marquee("MarqueeDiv",0,1,390,260,30,0,0)
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
</body>
</html>
