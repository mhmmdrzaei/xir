$(function(){
	$('.xOpen').click(function(){
		$('.xclickArtist').toggleClass('openX');
	})

	

	if ($(".page-id-51 .hidden")[0]){
    	// $("ul.menu li a").css('color','black');
    	// $("ul.menu li a").css('text-shadow','0 0 0 white');
    	$('.mobileSVG svg path').css('fill','white');
    	$('.mobileSVG svg circle').css('fill','white');
	}
	$('.mobileSVG').click(function(){
		$('#menu-menu-1').toggleClass('menuclicked');
		$('body').toggleClass('hidden');
	});

});