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

	// -- Create a MediaSource and attach it to the video (We already learned about that) --

	const videoTag = document.getElementById("videoJS");
	const myMediaSource = new MediaSource();
	const url = URL.createObjectURL(myMediaSource);
	videoTag.src = url;

	// 1. add source buffers

	const videoSourceBuffer = myMediaSource
	  .addSourceBuffer('video/webm; codecs="avc1.64001e"');

	// 2. download and add our audio/video to the SourceBuffers


	// the same for the video SourceBuffer
	fetch("https://x-ir.net/wp-content/themes/xir/images/home.webm").then(function(response) {
	  // The data has to be a JavaScript ArrayBuffer
	  return response.arrayBuffer();
	}).then(function(videoData) {
	  videoSourceBuffer.appendBuffer(videoData);
	});

});