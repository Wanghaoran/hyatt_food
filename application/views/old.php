<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>第一季回顾 － 凯悦悦享家</title>
    <link href="<?=$this->config->base_url()?>static/css/style.css" rel="stylesheet" type="text/css" />
    <script src="http://tjs.sjs.sinajs.cn/open/thirdpart/js/frame/appclient.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.js" ></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/uCarousel.js"></script>
    <script type="text/javascript" src="<?=$this->config->base_url()?>static/javascript/tms-0.4.1.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.gallery')._TMS({
                show:0,
                pauseOnHover:true,
//                prevBu:'.prev',
//                nextBu:'.next',
//                playBu:'.play',
                duration:10000,
                preset:'zoomer',
                pagination:$('.img-pags').uCarousel({show:4,shift:0}),
                pagNums:false,
                slideshow:7000,
                numStatus:false,
                banners:'fromRight',// fromLeft, fromRight, fromTop, fromBottom
                waitBannerAnimation:false,
                progressBar:'<div class="progbar"></div>'
            });

        });
    </script>
</head>
<body style="background: #FFFFFF;">
<div class="contain">
    <!--头部 start-->
    <div class="header">
        <div class="hd_left"><a href="<?=$this->config->base_url()?>all" title="最佳时令菜肴投票"></a></div>
        <div class="hd_logo"><a href="<?=$this->config->base_url()?>" title="凯悦悦享家"></a></div>
        <div class="hd_first"><a href="#" title="第一季回顾"></a></div>
        <div class="hd_right"><a href="http://www.hyatt.com" target="_blank" title="了解凯悦集团酒店"></a></div>
    </div>
    <!--头部 end-->
    <!--banner2 start-->
    <div class="banner3"></div>
    <!--banner2 start-->
    <!--时间轴 start-->
    <div class="time">
        <ul class="ultime">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="last"><a href="#"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <!--时间轴 end-->
    <!--视频 start-->
    <div class="adbox">
        <div class="adtitle"></div>
        <div class="adcon">
            <embed src="http://player.youku.com/player.php/sid/XNjQ2NzE3ODU2/v.swf" quality="high" width="724" height="500" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>
        </div>
    </div>
    <!--视频 end-->
    <!--舌尖 start-->
    <div class="sjbox">
        <div class="sjtitle"></div>
        <div class="sjcon">
            <div id="slide">
                <div class="gallery">
                    <ul class="items">
                        <li><img src="<?=$this->config->base_url()?>static/images/1_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/2_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/3_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/4_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/5_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/6_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/7_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/8_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/9_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/10_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/11_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/12_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/13_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/14_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/15_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/16_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                        <li><img src="<?=$this->config->base_url()?>static/images/17_b.jpg" alt="" /><div class="banner"><span></span></div></li>
                    </ul>
                </div>
                <!--<a href="#" class="prev">&lt;</a><a href="#" class="play"><em>stop</em><span>play</span></a> <a href="#" class="next">&gt;</a>-->
            </div><!-- slider end -->
            <div class="pag">
                <div class="img-pags">
                    <ul>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/1_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/2_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/3_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/4_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/5_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/6_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/7_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/8_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/9_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/10_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/11_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/12_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/13_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/14_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/15_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/16_s.jpg" alt="" /></span></a></li>
                        <li><a><span><img src="<?=$this->config->base_url()?>static/images/17_s.jpg" alt="" /></span></a></li>
                    </ul>
                </div>
                <a href="#" class="button move_left" data-type="prevPage"></a>
                <a href="#" class="button move_right" data-type="nextPage"></a>
            </div>
        </div>
    </div>
    <!--舌尖 end-->

</div>
</body>
</html>
