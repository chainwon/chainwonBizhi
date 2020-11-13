var MoreisOpen = false;
var calc = $(window).height() * 0.5 - 250;
var t = calc + 'px';
function MoreShow(){
	$(".more").animate({
		opacity:'1',
		top: t,
	},250);
}
function MoreHide(){
	$(".more").animate({
		opacity:'0',
		top:'-500px',
	},250);
}
//点击非菜单区域关闭菜单
$('body').on('click',function () {
	if (MoreisOpen) {
		MoreHide();
		MoreisOpen = false;
		return;
	}
});


// 点击按钮区打开菜单
$('.morem').on('click',function (m) {
	m.stopPropagation();
	if (MoreisOpen) {
		MoreHide();
		MoreisOpen = false;
		return;
	}
	MoreisOpen = true;
	MoreShow();
});


//点击菜单区域不能关闭菜单
$(".more").on('click',function(m){
	m.stopPropagation();
	if (MoreisOpen)  return;
});


//点击close按钮关闭菜单
$(".menu-close").click(function(){
	if(MoreisOpen){
		MoreHide();
		MoreisOpen = false;
		return;
	}
});
