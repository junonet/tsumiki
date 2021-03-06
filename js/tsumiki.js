/*
 * Animating Scroll In MDL
 */
var scrollTo = function(top) {
	var content = $(".mdl-layout__content");
	var target = top ? 0 : $(".page-content").height();
	content.stop().animate({ scrollTop: target }, "slow");
};

var scrollToTop = function() {
	scrollTo(true);
};

var scrollToBottom = function() {
	scrollTo(false);
};

$(function() {
	$("#scroll-up-btn").click(scrollToTop);
	$("#scroll-down-btn").click(scrollToBottom);
});
