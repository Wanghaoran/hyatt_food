// JavaScript Document

var ViewportHeights;
var ViewportWidths;
var ScrollTops;
var ScrollLefts;
var check = false;


function getViewportHeight() {

    App.trigger('parentInfo', function(parentWin) {
        if(parentWin){
            check = true;
        }
    });

    if(check){
        App.trigger('parentInfo', function(parentWin) {
            ViewportHeights = parentWin.win.height;

//        console.log(parentWin);
            // parentWin.iframe.width 获得iframe宽度
            // parentWin.iframe.height 获得iframe高度
            // parentWin.iframe.left 获得iframe距离父页面左端的距离
            // parentWin.iframe.top 获得iframe距离父页面顶端的距离
            // parentWin.page.height 父页面高度
            // parentWin.page.width 父页面宽度
            // parentWin.page.scrollTop 父页面的滚动条scrollTop
            // parentWin.page.scrollLeft 父页面的滚动条scrollLeft
            // parentWin.page.url 父页面url
            // parentWin.win.width 父页面窗口宽度
            // parentWin.win.height 父页面窗口高度
        });
        return ViewportHeights;
    }


	if (window.innerHeight!=window.undefined) return window.innerHeight;
	if (document.compatMode=='CSS1Compat') return document.documentElement.clientHeight;
	if (document.body) return document.body.clientHeight; 

	return window.undefined; 
}
function getViewportWidth() {

    /*
    App.trigger('parentInfo', function(parentWin) {
        ViewportWidths = parentWin.win.width;

//        console.log(parentWin);
        // parentWin.iframe.width 获得iframe宽度
        // parentWin.iframe.height 获得iframe高度
        // parentWin.iframe.left 获得iframe距离父页面左端的距离
        // parentWin.iframe.top 获得iframe距离父页面顶端的距离
        // parentWin.page.height 父页面高度
        // parentWin.page.width 父页面宽度
        // parentWin.page.scrollTop 父页面的滚动条scrollTop
        // parentWin.page.scrollLeft 父页面的滚动条scrollLeft
        // parentWin.page.url 父页面url
        // parentWin.win.width 父页面窗口宽度
        // parentWin.win.height 父页面窗口高度
    });
    return ViewportWidths;
*/


	if (window.innerWidth!=window.undefined) return window.innerWidth;
	if (document.compatMode=='CSS1Compat') return document.documentElement.clientWidth;
	if (document.body) return document.body.clientWidth; 

	return window.undefined; 
}

/**
 * Gets the real scroll top
 */
function getScrollTop() {

    App.trigger('parentInfo', function(parentWin) {
        if(parentWin){
            check = true;
        }
    });

    if(check){
        App.trigger('parentInfo', function(parentWin) {
            ScrollTops = parentWin.page.scrollTop;

//        console.log(parentWin);
            // parentWin.iframe.width 获得iframe宽度
            // parentWin.iframe.height 获得iframe高度
            // parentWin.iframe.left 获得iframe距离父页面左端的距离
            // parentWin.iframe.top 获得iframe距离父页面顶端的距离
            // parentWin.page.height 父页面高度
            // parentWin.page.width 父页面宽度
            // parentWin.page.scrollTop 父页面的滚动条scrollTop
            // parentWin.page.scrollLeft 父页面的滚动条scrollLeft
            // parentWin.page.url 父页面url
            // parentWin.win.width 父页面窗口宽度
            // parentWin.win.height 父页面窗口高度
        });

        return ScrollTops;
    }





	if (self.pageYOffset) // all except Explorer
	{
		return self.pageYOffset;
	}
	else if (document.documentElement && document.documentElement.scrollTop)
		// Explorer 6 Strict
	{
		return document.documentElement.scrollTop;
	}
	else if (document.body) // all other Explorers
	{
		return document.body.scrollTop;
	}



}
function getScrollLeft() {

    /*

    App.trigger('parentInfo', function(parentWin) {
        ScrollLefts = parentWin.page.scrollLeft;

//        console.log(parentWin);
        // parentWin.iframe.width 获得iframe宽度
        // parentWin.iframe.height 获得iframe高度
        // parentWin.iframe.left 获得iframe距离父页面左端的距离
        // parentWin.iframe.top 获得iframe距离父页面顶端的距离
        // parentWin.page.height 父页面高度
        // parentWin.page.width 父页面宽度
        // parentWin.page.scrollTop 父页面的滚动条scrollTop
        // parentWin.page.scrollLeft 父页面的滚动条scrollLeft
        // parentWin.page.url 父页面url
        // parentWin.win.width 父页面窗口宽度
        // parentWin.win.height 父页面窗口高度
    });

    return ScrollLefts;
    */

	if (self.pageXOffset) // all except Explorer
	{
		return self.pageXOffset;
	}
	else if (document.documentElement && document.documentElement.scrollLeft)
		// Explorer 6 Strict
	{
		return document.documentElement.scrollLeft;
	}
	else if (document.body) // all other Explorers
	{
		return document.body.scrollLeft;
	}
}
/*
渐变的弹出图片
使用方法：
将ToolTip.js包含在网页body的结束标签后
调用方法：
<a href="pages.jpg" target='_blank' onMouseOver="toolTip('<img src=http://zhouzh:90/templet/T_yestem_channel/pages_small.jpg>')" onMouseOut="toolTip()"><img src='pages_small.jpg' border=0 width=30 height=20 align="absmiddle" title="点击看大图"></a>

必须CSS样式
.trans_msg
{
	filter:alpha(opacity=100,enabled=1) revealTrans(duration=.2,transition=1) blendtrans(duration=.2);
}
*/
//--初始化变量--
var rT=false;//允许图像过渡
var bT=false;//允许图像淡入淡出
var tw=150;//提示框宽度
var endaction=false;//结束动画
var ns4 = document.layers;
var ns6 = document.getElementById && !document.all;
var ie4 = document.all;
offsetX = 10;
offsetY = 20;
var toolTipSTYLE="";
function initToolTips()
{
	tempDiv = document.createElement("div");
	tempDiv.id = "toolTipLayer";
	tempDiv.style.position = "absolute";
	tempDiv.style.display = "none";
	document.body.appendChild(tempDiv);
	if(ns4||ns6||ie4)
	{
		if(ns4) toolTipSTYLE = document.toolTipLayer;
		else if(ns6) toolTipSTYLE = document.getElementById("toolTipLayer").style;
		else if(ie4) toolTipSTYLE = document.all.toolTipLayer.style;
		if(ns4) document.captureEvents(Event.MOUSEMOVE);
		else
		{
		  toolTipSTYLE.visibility = "visible";
		  toolTipSTYLE.display = "none";
		}
		document.onmousemove = moveToMouseLoc;
	}
}
function toolTip(msg, fg, bg)
{
	try {
	  if(toolTip.arguments.length < 1) // hide
	  {
		if(ns4) 
		{
		toolTipSTYLE.visibility = "hidden";
		}
		else 
		{
		  //--图象过渡，淡出处理--
		  if (!endaction) {toolTipSTYLE.display = "none";}
            /*
		  if (rT) document.all("msg1").filters[1].Apply();
		  if (bT) document.all("msg1").filters[2].Apply();
		  document.all("msg1").filters[0].opacity=0;
		  if (rT) document.all("msg1").filters[1].Play();
		  if (bT) document.all("msg1").filters[2].Play();
		  */
		  if (rT){ 
		  if (document.getElementById("msg1").filters[1].status==1 || document.getElementById("msg1").filters[1].status==0){
		  toolTipSTYLE.display = "none";}
		  }
		  if (bT){
		  if (document.getElementById("msg1").filters[2].status==1 || document.getElementById("msg1").filters[2].status==0){
		  toolTipSTYLE.display = "none";}
		  }
		  if (!rT && !bT) toolTipSTYLE.display = "none";
		  //----------------------
		}
	  }
	  else // show
	  {
		if(!fg) fg = "#ffffff";
		if(!bg) bg = "#ffffff";
		var content =
		'<table id="msg1" name="msg1" border="0" cellspacing="0" cellpadding="1" bgcolor="' + fg + '" class="trans_msg"><td>' +
		'<table border="0" cellspacing="2" cellpadding="3" bgcolor="' + bg +
		'"><td><font face="Arial" color="' + fg +
		'" size="-2">' + msg +
		'</font></td></table></td></table>';
	
		if(ns4)
		{
		  toolTipSTYLE.document.write(content);
		  toolTipSTYLE.document.close();
		  toolTipSTYLE.visibility = "visible";
		}
		if(ns6)
		{
		  document.getElementById("toolTipLayer").innerHTML = content;
		  toolTipSTYLE.display='block'
		}
		if(ie4)
		{
		  document.all("toolTipLayer").innerHTML=content;
		  toolTipSTYLE.display='block'
		  //--图象过渡，淡入处理--
         /*
		  var cssopaction=document.all("msg1").filters[0].opacity
		  document.all("msg1").filters[0].opacity=0;
		  if (rT) document.all("msg1").filters[1].Apply();
		  if (bT) document.all("msg1").filters[2].Apply();
		  document.all("msg1").filters[0].opacity=cssopaction;
		  if (rT) document.all("msg1").filters[1].Play();
		  if (bT) document.all("msg1").filters[2].Play();
		  //----------------------
		  */
		}
	  }
	} catch(e) {}
}
function moveToMouseLoc(e)
{
  var scrollTop = getScrollTop();
  var scrollLeft = getScrollLeft();
  if(ns4||ns6)
  {
    x = e.pageX + scrollLeft;
    y = e.pageY - scrollTop;
  }
  else
  {
    x = event.clientX + scrollLeft;
    y = event.clientY;
  }
  
  if (x-scrollLeft > getViewportWidth() / 2) {
  	x = x - document.getElementById("toolTipLayer").offsetWidth - 2 * offsetX;
  }
  
  if ((y+document.getElementById("toolTipLayer").offsetHeight+offsetY)>getViewportHeight()) {
	y = getViewportHeight()-document.getElementById("toolTipLayer").offsetHeight-offsetY;
  }

  toolTipSTYLE.left = (x + offsetX)+'px';
    if(check){
        toolTipSTYLE.top = (y + offsetY + scrollTop - 212)+'px';
    }else{
        toolTipSTYLE.top = (y + offsetY + scrollTop)+'px';
    }
  return true;
}
initToolTips();