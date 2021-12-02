(function($){

    var initializeBlock = function( $block ) {
   //      $block.find('.slides').slick({
   //          dots: false,
   //          infinite: true,
   //          speed: 300,
   //          slidesToShow: 1,
   //          centerMode: true,
   //          variableWidth: true,
   //          adaptiveHeight: true,
			// focusOnSelect: true
   //      });    

    $block.find('.bxslider').bxSlider({
        // oneToOneTouch: true,
        controls: true,
        pagerType: 'short',
        prevText: '←',
        nextText:'→',
        adaptiveHeight: true,
        // onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
        //     $('.active-slide').removeClass('active-slide');
        //     $('.bxslider>li').eq(currentSlideHtmlObject + 1).addClass('active-slide')
        // },
        // onSliderLoad: function () {
        //     $('.bxslider>li').eq(1).addClass('active-slide')
        // },

    });

    }




    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.bxslider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider', initializeBlock );
    }




})(jQuery);


