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
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js"></script>

    <script>
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
    </script>
</head>
<body>
<div class="container">
    <div class="top">
        <img src="<?=$this->config->base_url()?>/static/mobile/images/top2.jpg"/>
        <a href="#" class="zjsltp" title="最佳时令菜肴投票"></a>
        <a href="<?=$this->config->base_url()?>?key=<?=$uid?>" class="logo" title="凯悦悦享家"></a>
        <a href="<?=$this->config->base_url()?>terms?key=<?=$uid?>" class="hdsm" title="活动说明"></a>
        <a href="<?=$this->config->base_url()?>old?key=<?=$uid?>" class="dyjdhg" title="第一季度回顾"></a>
    </div>

    <div class="phb">
        <div class="phbcon">
            <ul>


                <?php foreach($all as $key => $value): ?>


                    <?php if($key != 21): ?>
                        <li>
                            <div class="btn_djtp"><a onclick="sharebutton('<?=$value['id']?>');"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
                            <div class="num"><img src="<?=$this->config->base_url()?>/static/mobile/num/<?=$key+1?>.png"/></div>
                            <div class="dm"><?=$value['hotel_name']?></div>
                            <div class="tp" style="font-size: 9px;">已有 <strong id="top_<?=$value['id']?>"><?=$value['num']?></strong> 人投票</div>
                            <div class="clear"></div>
                        </li>
                    <?php else: ?>
                        <li class="last">
                            <div class="btn_djtp"><a onclick="sharebutton('<?=$value['id']?>');" ><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_djtp.png"/></a></div>
                            <div class="num"><img src="<?=$this->config->base_url()?>/static/mobile/num/<?=$key+1?>.png"/></div>
                            <div class="dm"><?=$value['hotel_name']?></div>
                            <div class="tp" style="font-size: 9px;">已有 <strong id="top_<?=$value['id']?>"><?=$value['num']?></strong> 人投票</div>
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
