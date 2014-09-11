<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>凯悦悦享家</title>
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta name="MobileOptimized" content="240">
    <meta name="apple-touch-fullscreen" content="YES">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->base_url()?>/static/mobile/css/common.css">
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/pageapp/mobile/jsapi.js" charset="utf-8"></script>

    <script>

        /* H5底导未开放
        WeiboJSBridge.trigger('bottomNavigation:info', {
            "title" : "我的分享文案，爱怎么写就怎么写，哈哈"
        }, function(){});
        */

        //点击投票
        var sharebutton = function(cid){

            <?php if($uid == 'null'): ?>

            WeiboJSBridge.invoke("login", {
                "redirect_uri" : encodeURIComponent("http://apps.weibo.com/2259266354/Qp1a6Ji")
            }, function (params, success, code) {});

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
                        var top_now_num = $('#top_' + cid).html();
                        $('#top_' + cid).html(parseInt(top_now_num) + 1);


                    }
                }
            });

            <?php endif; ?>

        }

        //加入悦享受家
        var joinhyatt = function(){
            <?php if($uid == 'null'): ?>
            WeiboJSBridge.invoke("login", {
                "redirect_uri" : encodeURIComponent("http://apps.weibo.com/2259266354/Qp1a6Ji")
            }, function (params, success, code) {});
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
                    }else{
//                        getnum();
                        alert('注册成功！' + ress.data);
//                        tosendemail();
                    }
                }
            });

            <?php endif; ?>
        }
    </script>
</head>
<body>
<div class="container">
<div class="top">
    <img src="<?=$this->config->base_url()?>/static/mobile/images/top.jpg"/>
    <a href="<?=$this->config->base_url()?>/welcome/all_mobile?key=<?=$uid?>" class="zjsltp" title="最佳时令菜肴投票"></a>
    <a href="<?=$this->config->base_url()?>?key=<?=$uid?>" class="logo" title="凯悦悦享家"></a>
    <a href="<?=$this->config->base_url()?>terms?key=<?=$uid?>" class="hdsm" title="活动说明"></a>
    <a href="<?=$this->config->base_url()?>old?key=<?=$uid?>" class="dyjdhg" title="第一季度回顾"></a>
</div>

    <div class="search">
        <img src="<?=$this->config->base_url()?>/static/mobile/images/banner5.jpg"/>
        <div class="input_search"><img src="<?=$this->config->base_url()?>/static/mobile/images/input_search.png"/><input id="emailString" class="serchclass" name="keyword" value="请输入您的邮箱" onfocus="this.value='';this.style.color='#333'" onblur="if(this.value==''){this.value='请输入您的邮箱';this.style.color='#8b8b8b'}"></div>
        <div class="btn_jiaru"><a onclick="joinhyatt();"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_jiaru.png"/></a></div>
    </div>

    <div class="num">
        <img src="<?=$this->config->base_url()?>/static/mobile/images/num.jpg"/>
        <div class="num_tj"><?=$show_num?></div>
    </div>



<div class="product">
<ul>

<?php foreach($all_result as $key => $value): ?>


    <?php if($key != 21): ?>
        <li>
            <div class="divleft"><a href="<?=$this->config->base_url()?>/welcome/mobile_content/<?=$value['id']?>?key=<?=$uid?>"><img src="<?=$this->config->base_url()?>/static/mobile/product/<?=$value['id']?>.jpg"/></a></div>
            <div class="divright">
                <h2><?=$value['food_name']?></h2>
                <h3><?=$value['hotel_name']?></h3>
                <h4>已有 <strong id="top_<?=$value['id']?>"><?=$value['num']?></strong> 人投票</h4>
                <div class="btn_djtp"><a onclick="sharebutton('<?=$value['id']?>');" title="点击投票"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
            </div>
            <div class="clear"></div>
        </li>
    <?php else: ?>
        <li class="last">
            <div class="divleft"><a href="<?=$this->config->base_url()?>/welcome/mobile_content/<?=$value['id']?>?key=<?=$uid?>"><img src="<?=$this->config->base_url()?>/static/mobile/product/<?=$value['id']?>.jpg"/></a></div>
            <div class="divright">
                <h2><?=$value['food_name']?></h2>
                <h3><?=$value['hotel_name']?></h3>
                <h4>已有 <strong id="top_<?=$value['id']?>"><?=$value['num']?></strong> 人投票</h4>
                <div class="btn_djtp"><a onclick="sharebutton('<?=$value['id']?>');" title="点击投票"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
            </div>
            <div class="clear"></div>
        </li>
    <?php endif; ?>

<?php endforeach; ?>




</ul>
</div>
<div class="bottom"><img src="<?=$this->config->base_url()?>/static/mobile/images/bottom.jpg"/></div>
</div>
</body>

</html>
