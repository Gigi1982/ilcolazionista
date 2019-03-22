(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		$('.slideColazionista').lightSlider({
            adaptiveHeight:true,
            item:1,
            slideMargin:0,
            loop:true
        });
        
        var feed = new Instafeed({
            get: 'user',
            accessToken: '14928922.1677ed0.2e6f112d2e254e6cb4a2fb03f34c8da5',
            userId: '1140783903',
            limit: 4,
            resolution: 'low_resolution'
        });
        feed.run();
		
	});
	
})(jQuery, this);
