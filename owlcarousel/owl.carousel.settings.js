
    // owl carousel 
    $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                margin:20,
                merge:true,
                nav:true, 
                navText:['&nbsp;','&nbsp;'],
                responsive:{
                    0:{
                        items:1,
                    },
                    768:{
                        items:2,
                    },
                    992:{
                        items:3,
                    },
                    1200:{
                        items:4,
                        loop:true
                }
            }
        });
    });


