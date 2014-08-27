<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>最佳时令菜肴投票-凯悦悦享家</title>
    <link href="<?=$this->config->base_url()?>static/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js"></script>

    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/frame/appclient.js" charset="utf-8"></script>



    <script>
        var sharebutton = function(){
            setDivCenter(11);
//            showBg();
//            alert('投票活动将于9月1日正式开始，敬请期待！');
        }

        var openshare = function(){
            var url = 'http://service.weibo.com/share/share.php?url=http%3A%2F%2Fopen.weibo.com%2Fsharebutton&appkey=2131282401&language=zh_cn&title=%23%E5%87%AF%E6%82%A6%E6%82%A6%E4%BA%AB%E5%AE%B6%23%E6%88%91%E5%9C%A8%E8%AF%84%E9%80%89%E2%80%9C%E6%9C%80%E4%BD%B3%E6%97%B6%E4%BB%A4%E8%8F%9C%E8%82%B4%E2%80%9D%E6%B4%BB%E5%8A%A8%E4%B8%AD%EF%BC%8C%E6%8A%8A%E7%A5%A8%E6%8A%95%E7%BB%99%E4%BA%86xxxxx%E9%85%92%E5%BA%97%E7%9A%84%E3%80%90xxxxx%E8%8F%9C%E5%90%8D%E3%80%91%E3%80%82%E5%BF%AB%E6%9D%A5%E5%92%8C%E6%88%91%E4%B8%80%E8%B5%B7%E4%B8%BA%E5%96%9C%E7%88%B1%E7%9A%84%E8%8F%9C%E8%82%B4%E6%8A%95%E7%A5%A8%EF%BC%8C%E5%B0%B1%E6%9C%89%E6%9C%BA%E4%BC%9A%E8%B5%A2%E5%8F%96%E5%8F%8C%E4%BA%BA%E5%85%8D%E8%B4%B9%E9%85%92%E5%BA%97%E9%A4%90%E5%88%B8%21&source=&sourceUrl=&ralateUid=2259266354&message=&uids=&pic=&searchPic=false&content=123';
            window.open (url, '分享到新浪微博', 'height=100, width=400, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
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
        <div class="pop_input"><input id="kw" name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}">
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
        <div class="hd_home"><a href="<?=$this->config->base_url()?>form=weibo" title="首页"></a></div>
        <div class="hd_left"><a href="#" title="最佳时令菜肴投票"></a></div>
        <div class="hd_logo"><a href="<?=$this->config->base_url()?>" title="凯悦悦享家"></a></div>
        <div class="hd_first"><a href="<?=$this->config->base_url()?>old" title="第一季回顾"></a></div>
        <div class="hd_right"><a href="http://www.hyatt.com/hyatt/?language=zh-Hans&src=hic_nplk_hyatt_sina_weibo_20140901" target="_blank" title="了解凯悦集团酒店"></a></div>
    </div>
    <!--头部 end-->
    <!--banner2 start-->
    <div class="banner2"></div>
    <!--banner2 start-->
    <!--投票产品 start-->
    <div class="toupiao">
        <div class="tp_title"></div>
        <div class="tp_con">
            <div class="tp_con_box">
                <ul class="tplist">
                    <?php foreach($hotel_data as $key => $value):?>
                    <li>
                        <dl>
                            <dt><?=$value['hotel_name']?></dt>
                            <dd class="ddimg"><img src="<?=$this->config->base_url()?>static/cook/<?=$value['big_pic']?>" onMouseOver="toolTip('<img src=<?=$this->config->base_url()?>static/cook/<?=$value['big_pic']?> width=375>')" onMouseOut="toolTip();" width="222" height="286"/></dd>
                            <dd class="ddinfo">
                                <a href="javascript:void(0);" onclick="sharebutton();" class="btn_tp"></a><span>已有 <?=$value['num']?> 人投票</span>
                            </dd>
                        </dl>
                    </li>
                    <?php endforeach;?>

                </ul>
                <div class="clear10"></div>
                <div class="page">
<!--                    <div class="meneame"><span class="disabled"> < </span><span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a><a href="#?page=4">4</a><a href="#?page=5">5</a><a href="#?page=6">6</a><a href="#?page=7">7</a>...<a href="#?page=199">199</a><a href="#?page=200">200</a><a href="#?page=2"> > </a></div>-->
                </div>
                <div class="clear"></div>
            </div>

        </div>
        <div class="tp_foot"></div>
    </div>
    <!--投票产品 end-->

</div>
<script language="javascript" src="<?=$this->config->base_url()?>static/javascript/ToolTip.js"></script>

</body>
</html>
