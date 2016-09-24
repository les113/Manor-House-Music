/* colorbox settings */
		jQuery(document).ready(function($) {
			$('.colorbox').colorbox(); //for image lightbox
			$('.cv').colorbox({width:800, height:1000});  // for cv
		});
		// touch not working!
		jQuery('.colorbox').touchwipe( {
            wipeLeft:function($) {
               $('.portfolioimg').colorbox("prev");
            },
            wipeRight:function($) {
               $('.portfolioimg').colorbox("next");
            },
        });