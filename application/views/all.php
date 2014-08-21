<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>最佳时令菜肴投票-凯悦悦享家</title>
    <link href="<?=$this->config->base_url()?>static/css/style.css" rel="stylesheet" type="text/css" />
    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/frame/appclient.js" charset="utf-8"></script>
    <script>
        var sharebutton = function(){
            alert('投票活动将于9月1日正式开始，敬请期待！');
        }
    </script>
</head>
<body style="background: #FFFFFF;">
<div class="contain">
    <!--头部 start-->
    <div class="header">
        <div class="hd_home"><a href="<?=$this->config->base_url()?>" title="首页"></a></div>
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
                            <dd class="ddimg"><img src="<?=$this->config->base_url()?>static/cook/<?=$value['big_pic']?>" width="222" height="286"/></dd>
                            <dd class="ddinfo">
                                <a href="#" onclick="sharebutton();" class="btn_tp"></a><span>已有 <?=$value['num']?> 人投票</span>
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
</body>
</html>
