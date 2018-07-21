jQuery(document).ready(function(){
                
    jQuery("#myCarousel4").hover(function(){
        jQuery(this).carousel('pause');
    }, function(){
        jQuery(this).carousel('cycle');
    });
    
    
    jQuery("#myCarousel3").hover(function(){
        jQuery(this).carousel('pause');
    }, function(){
        jQuery(this).carousel('cycle');
    });
    
    jQuery("#myCarousel2").hover(function(){
        jQuery(this).carousel('pause');
    }, function(){
        jQuery(this).carousel('cycle');
    });
    
    jQuery("#myCarousel1").hover(function(){
        jQuery(this).carousel('pause');
    }, function(){
        jQuery(this).carousel('cycle');
    });
    
    jQuery("#myCarousel0").hover(function(){
        jQuery(this).carousel('pause');
    }, function(){
        jQuery(this).carousel('cycle');
    });
});

jQuery(window).load(function(){
    jQuery('#loader').fadeOut(1000);
    jQuery('body').css('overflow-y', 'scroll');
    jQuery('html').css('overflow-y', 'scroll');
})

jQuery(".btn-wrap > a").attr("href", "http://www.kiitelabs.com/blogs/");
jQuery(".menu-item-146 > a").removeAttr("href");
jQuery(".menu-item-146 > a").css('cursor', 'default');


