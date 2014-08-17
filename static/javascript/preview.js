this.preloadIm=function(){
	var b=new Array;
	$("a.preview").each(function(){
		$(this).attr("path");
	});
	return b
};
this.imagePreview=function(d,c){
	offX=25;
	offY=25;
	c=c==undefined?"a.preview":c;
	$(c).hover(function(e){
		$("body").append("<div id='preview' class='previewShowWindow'><img id='pi' src='images/loadingAnimation.gif' alt='Now Loading' /></div>");
		var m=$(this).attr("path");
		$("#pi").attr("src",m);
		var o=$("#preview").width();
		var p=$("#preview").height();


        var a;
        var l;

        App.trigger('parentInfo', function(parentWin) {

            a = parentWin.win.width + parentWin.page.scrollLeft
            l = parentWin.win.height + parentWin.page.scrollTop
//            return parentWin.win.width
//            console.log(parentWin);
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



//		var a=$(window).width()+$(window).scrollLeft();
//		var l=$(window).height()+$(window).scrollTop();
		var n;
		var b;
		if((e.pageX+offX+o)>a){
			n=e.pageX-(o+offX)+"px"
		}else{
			n=e.pageX+offX+"px"
		}if((e.pageY+offY+p)>l){
			b=l-(p+offY)+"px"
		}else{
			b=e.pageY+offY+"px"
		}
			$("#preview").css("top",b).css("left",n).fadeIn("fast")
		},function(){
			$("#preview").remove()
	});

	$(c).mousemove(function(e){

        var a;
        var k;


        App.trigger('parentInfo', function(parentWin) {

            a = parentWin.win.width + parentWin.page.scrollLeft
            k = parentWin.win.height + parentWin.page.scrollTop
//            return parentWin.win.width
//            console.log(parentWin);
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

//        console.log(aaa);


		var m=$("#preview").width();
		var n=$("#preview").height();
//		var a=$(window).width()+$(window).scrollLeft();
//		var k=$(window).height()+$(window).scrollTop();
		var l;
		var b;
		if((e.pageX+offX+m)>a){
			l=e.pageX-(m+offX)+"px"
		}else{
			l=e.pageX+offX+"px"
		}if((e.pageY+offY+n)>k){
			b=k-(n+offY)+"px"
		}else{
			b=e.pageY+offY+"px"
		}

        console.log(b + '--' + l);
		$("#preview").css("top",b).css("left",l)
	})
	
};