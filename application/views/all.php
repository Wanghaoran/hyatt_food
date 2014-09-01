<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <title>最佳时令菜肴投票-凯悦悦享家</title>
    <link href="<?=$this->config->base_url()?>static/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js"></script>

    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/frame/appclient.js" charset="utf-8"></script>



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
                    }else{
                        alert('投票成功！' + ress.data);

                        //投票数加1
                        var top_num = $('#top_num_' + cid).length;

                        if(top_num){
                            var top_now_num = $('#top_num_' + cid).html();
                            $('#top_num_' + cid).html(parseInt(top_now_num) + 1);
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
                        alert('注册成功！' + ress.data);
                        closeBg(11);
                        tosendemail();

                    }
                }
            });

            <?php endif; ?>
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
        <div class="hd_home"><a href="<?=$this->config->base_url()?>?key=<?=$uid?>" title="首页"></a></div>
        <div class="hd_left"><a href="#" title="最佳时令菜肴投票"></a></div>
        <div class="hd_logo"><a href="<?=$this->config->base_url()?>?key=<?=$uid?>" title="凯悦悦享家"></a></div>
        <div class="hd_first"><a href="<?=$this->config->base_url()?>old?key=<?=$uid?>" title="第一季回顾"></a></div>
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
                                <a href="javascript:void(0);" onclick="sharebutton(<?=$value['id']?>);" class="btn_tp"></a><span>已有 <strong id="top_num_<?=$value['id']?>"><?=$value['num']?></strong> 人投票</span>
                            </dd>
                        </dl>
                    </li>
                    <?php endforeach;?>

                </ul>
                <div class="clear10"></div>
                <div class="page">
<!--                    <div class="meneame"><span class="disabled"> < </span><span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a><a href="#?page=4">4</a><a href="#?page=5">5</a><a href="#?page=6">6</a><a href="#?page=7">7</a>...<a href="#?page=199">199</a><a href="#?page=200">200</a><a href="#?page=2"> > </a></div>-->
                    <?=$pageshow?>
                </div>
                <div class="clear"></div>
            </div>

        </div>
        <div class="tp_foot"></div>
    </div>
    <!--投票产品 end-->

</div>
<script language="javascript" src="<?=$this->config->base_url()?>static/javascript/ToolTip.js"></script>
<div style="display: none;">
    <script src="http://s95.cnzz.com/stat.php?id=1253168334&web_id=1253168334" language="JavaScript"></script>
</div>

</body>
</html>
