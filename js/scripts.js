$(function(){
	$('.xOpen').click(function(){
		$('.xclickArtist').toggleClass('openX');
		$('#menu-menu-1').removeClass('menuclicked');
	})

	

	if ($(".menuclicked")[0]){
    	// $("ul.menu li a").css('color','black');
    	// $("ul.menu li a").css('text-shadow','0 0 0 white');
    	// $('.menulicked').css('background','#4a24fe');

	}

	$('.mobileSVG').click(function(){
		$('#menu-menu-1').toggleClass('menuclicked');
		$('body').toggleClass('hidden');
	});


});