/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    //Site Identity
    wp.customize( 'nevler_hide_title_tagline', function ( value ) {
        value.bind( function ( to ) {
            $( '#text-title-desc' ).toggle();
        });
    } );

    wp.customize( 'nevler_branding_below_logo', function ( value ) {
        value.bind( function ( to ) {
            if(to == true ) {
                $( '#text-title-desc' ).css({
                    'display' : 'block',
                });
            }
            else {
                $( '#text-title-desc' ).css( {
                    'display' : 'inline-block',
                });
            }
        });
    } );

    wp.customize( 'nevler_center_logo', function ( value ) {
        value.bind( function ( to ) {
            if( to == true ) {
                $( '.site-branding' ).css('text-align', 'center' );
                $( '#text-title-desc' ).css('text-align', 'center' );
            }
            else {
                $( '.site-branding' ).css('text-align', 'left' );
                $( '#text-title-desc' ).css('text-align', 'left' );
            }
        });
    } );

    //Social Icons
    wp.customize( 'nevler_social_icon_style_set', function( value ) {
        value.bind( function( to ) {
            var	ChangeClass	=	'social-style ' + to;
            $( '#social-icons a' ).attr( 'class', ChangeClass );
        });
    });

    wp.customize( 'nevler_social_1', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'nevler_social_2', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'nevler_social_3', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'nevler_social_4', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'nevler_social_5', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'nevler_social_6', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'nevler_social_7', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(6)' ).attr( 'class', ClassNew );
        });
    });

    //Featured Area 1
	wp.customize( 'nevler_box_enable', function( value ) {
		value.bind( function( to ) {
			$( '#featured-area-1' ).toggle();
		});
	});

	wp.customize( 'nevler_box_title', function( value ) {
		value.bind( function( to ) {
			$( '#featured-area-1 .popular-articles .section-title' ).text( to );
		});
	});

	//Design & Layouts
    //Colors
    wp.customize( 'nevler_site_titlecolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    } );

    wp.customize( 'nevler_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );
    
	//Footer Settings
	wp.customize( 'nevler_fc_line_disable', function( value ) {
		value.bind( function( to ) {
			$( '.credit-line' ).toggle();
		});
	});

	wp.customize( 'nevler_footer_text', function( value ){
		value.bind( function( to ) {
			$( '.footer-text' ).text( to );
		});
	});

    //Fonts
    wp.customize( 'nevler_title_font', function( value ) {
        value.bind( function( to ) {
            $( '.title-font, h1, h2, .section-title, #top-menu a, #site-navigation a' ).css( 'font-family', to );
        } );
    } );
    wp.customize( 'nevler_body_font', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'font-family', to );
        } );
    } );

    //Sidebar
    wp.customize( 'nevler_sidebar_width', function( value ) {
        value.bind( function( to ) {
            var SidebarWidth    =   (to * 100) / 12;
            $('#secondary').css('width', SidebarWidth + '%' );
            $('#primary, #primary-mono').css('width', 100 - SidebarWidth + '%' );
        } );
    } );

} )( jQuery );
