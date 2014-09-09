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
        <img src="<?=$this->config->base_url()?>/static/mobile/images/top2.jpg"/>
        <a href="#" class="zjsltp" title="最佳时令菜肴投票"></a>
        <a href="<?=$this->config->base_url()?>?key=<?=$uid?>" class="logo" title="凯悦悦享家"></a>
        <a href="#" class="hdsm" title="活动说明"></a>
        <a href="#" class="dyjdhg" title="第一季度回顾"></a>
    </div>

    <div class="phb">
        <div class="phbcon">
            <ul>


                <?php foreach($all as $key => $value): ?>


                    <?php if($key != 21): ?>
                        <li>
                            <div class="btn_djtp"><a href="#"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
                            <div class="num"><img src="<?=$this->config->base_url()?>/static/mobile/num/<?=$key+1?>.png"/></div>
                            <div class="dm"><?=$value['hotel_name']?></div>
                            <div class="tp">已有 <strong><?=$value['num']?></strong> 人投票</div>
                            <div class="clear"></div>
                        </li>
                    <?php else: ?>
                        <li class="last">
                            <div class="btn_djtp"><a href="#"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
                            <div class="num"><img src="<?=$this->config->base_url()?>/static/mobile/num/<?=$key+1?>.png"/></div>
                            <div class="dm"><?=$value['hotel_name']?></div>
                            <div class="tp">已有 <strong><?=$value['num']?></strong> 人投票</div>
                            <div class="clear"></div>
                        </li>
                    <?php endif; ?>

                <?php endforeach; ?>



            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="bottom"><img src="<?=$this->config->base_url()?>/static/mobile/images/bottom2.jpg"/></div>
</div>
</body>

</html>
