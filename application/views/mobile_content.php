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
//                        var top_now_num = $('#top_' + cid).html();
//                        $('#top_' + cid).html(parseInt(top_now_num) + 1);


                    }
                }
            });

            <?php endif; ?>

        }
    </script>
</head>
<body>
<div class="container">
    <div class="kapian"><img src="<?=$this->config->base_url()?>/static/mobile/card/<?=$cid?>.jpg"/></div>
    <div class="bottom3">
        <img src="<?=$this->config->base_url()?>/static/mobile/images/bottom3.jpg"/>
        <div class="btn_toupiao"><a onclick="sharebutton('<?=$cid?>');" title="点击投票"><img src="<?=$this->config->base_url()?>/static/mobile/images/btn_toupiao.png"/></a></div>
    </div>
</div>
<div style="display: none;">
    <script src="http://s95.cnzz.com/stat.php?id=1253168334&web_id=1253168334" language="JavaScript"></script>
</div>
</body>

</html>
