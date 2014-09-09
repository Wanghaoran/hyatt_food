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
    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/pageapp/mobile/jsapi.js" charset="utf-8"></script>

    <script>

        WeiboJSBridge.trigger('bottomNavigation:info', {
            "title" : "我的分享文案，爱怎么写就怎么写，哈哈"
        }, function(){});

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
                dataType : 'json',
                success : function(ress){
                    alert(1234);
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
    <a href="#" class="zjsltp" title="最佳时令菜肴投票"></a>
    <a href="<?=$this->config->base_url()?>?key=<?=$uid?>" class="logo" title="凯悦悦享家"></a>
    <a href="hdsm.html" class="hdsm" title="活动说明"></a>
    <a href="#" class="dyjdhg" title="第一季度回顾"></a>
</div>
<div class="banner"><img src="<?=$this->config->base_url()?>/static/mobile/images/banner1.jpg"/></div>
<div class="product">
<ul>

<?php foreach($all_result as $key => $value): ?>


    <?php if($key != 21): ?>
        <li>
            <div class="divleft"><a href="#"><img src="<?=$this->config->base_url()?>/static/mobile/product/<?=$value['id']?>.jpg"/></a></div>
            <div class="divright">
                <h2><?=$value['food_name']?></h2>
                <h3><?=$value['hotel_name']?></h3>
                <h4>已有 <strong><?=$value['num']?></strong> 人投票</h4>
                <div class="btn_djtp"><a onclick="sharebutton('<?=$value['id']?>');" title="点击投票"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
            </div>
            <div class="clear"></div>
        </li>
    <?php else: ?>
        <li class="last">
            <div class="divleft"><a href="#"><img src="<?=$this->config->base_url()?>/static/mobile/product/<?=$value['id']?>.jpg"/></a></div>
            <div class="divright">
                <h2><?=$value['food_name']?></h2>
                <h3><?=$value['hotel_name']?></h3>
                <h4>已有 <strong><?=$value['num']?></strong> 人投票</h4>
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
