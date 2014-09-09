<!DOCTYPE html>
<html><head>
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
</head>
<body>
<div class="container">
<div class="top">
    <img src="<?=$this->config->base_url()?>/static/mobile/images/top.jpg"/>
    <a href="#" class="zjsltp" title="最佳时令菜肴投票"></a><a href="#" class="logo" title="凯悦悦享家"></a>
    <a href="hdsm.html" class="hdsm" title="活动说明"></a><a href="#" class="dyjdhg" title="第一季度回顾"></a>
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
                <h4>已有 <?=$value['num']?> 人投票</h4>
                <div class="btn_djtp"><a href="#" title="点击投票"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
            </div>
            <div class="clear"></div>
        </li>
    <?php else: ?>
        <li class="last">
            <div class="divleft"><a href="#"><img src="<?=$this->config->base_url()?>/static/mobile/product/<?=$value['id']?>.jpg"/></a></div>
            <div class="divright">
                <h2><?=$value['food_name']?></h2>
                <h3><?=$value['hotel_name']?></h3>
                <h4>已有 <?=$value['num']?> 人投票</h4>
                <div class="btn_djtp"><a href="#" title="点击投票"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
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
