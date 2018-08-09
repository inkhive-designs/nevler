jQuery(document).ready( function() {
	jQuery('.flex-images').flexImages({rowHeight: 200, object: 'img', truncate: true});
	
	//For the Nevler Layout
	jQuery('.site-main').flexImages({rowHeight: 200, object: 'img'});

	jQuery('#top-menu ul.menu').mobileMenu({
		switchWidth: 767
		});
	jQuery('#top-menu div.menu ul').mobileMenu({
		switchWidth: 767
		});	

	jQuery('#site-navigation .container ul.menu').mobileMenu({
		switchWidth: 767
		});
	jQuery('#site-navigation .container div.menu ul').mobileMenu({
		switchWidth: 767
		});	

	
});//endready
