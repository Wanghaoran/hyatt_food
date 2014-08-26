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

    <script language="javascript">
        function toolTip(str) {
        }
    </script>

    <script>
        var sharebutton = function(){
            showBg();
//            alert('投票活动将于9月1日正式开始，敬请期待！');
//            var url = 'http://service.weibo.com/share/share.php?url=http%3A%2F%2Fopen.weibo.com%2Fsharebutton&appkey=2131282401&language=zh_cn&title=%E8%BF%99%E6%98%AF%E9%A2%84%E5%88%B6%E6%96%87%E6%A1%88&source=&sourceUrl=&ralateUid=2259266354&message=&uids=&pic=&searchPic=false&content=';
//            window.open (url, '分享到新浪微博', 'height=100, width=400, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no')
        }
    </script>

    <script language="javascript">
        function toolTip(str) {
        }

        //显示灰色 jQuery 遮罩层
        function showBg() {

            $("#hidebg").css({
                display: "block"
            });
            $("#popDiv").show();
        }
        //关闭灰色 jQuery 遮罩
        function closeBg() {
            $("#hidebg,#popDiv").hide();
        }
    </script>


</head>
<body style="background: #FFFFFF;">

<!--pop start-->
<div id="popDiv" class="mydiv" style="display:none;">
    <a href="javascript:closeBg()" class="btn_del" title="关闭"></a>
    <div class="popcon">
        <div class="pop_input"><input id="kw" name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}">
        </div>
        <div class="clear20"></div>
        <div class="pop_join"><a href="javascript:void(0);" onclick="alert('活动将于9月1日正式上线，请您届时加入凯悦悦享家！');" title="点击加入“凯悦悦享家”"></a></div>
    </div>
</div>
<div id="hidebg" class="hidebg" style="display:none"></div>
<!--pop end-->

<div class="contain">
<!--头部 start-->
<div class="header">
    <div class="hd_home"><a href="<?=$this->config->base_url()?>" title="首页"></a></div>
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
                <a href="javascript:void(0)" class="Div1_title_a1">1</a>
                <a href="javascript:void(0)">2</a>
                <a href="javascript:void(0)">3</a> 
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
                <?php if($key == 7):?>
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
        <div class="input_email"><input id="kw" name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}"></div>
        <div class="btn_join"><a  onclick="alert('活动将于9月1日正式上线，请您届时加入凯悦悦享家！');" href="javascript:void();" title="点击加入“凯悦悦享家”"></a></div>
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
