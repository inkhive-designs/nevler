<?php
/**
 * Enqueue scripts and styles.
 */
function nevler_scripts() {
    wp_enqueue_style( 'nevler-style', get_stylesheet_uri() );

    wp_enqueue_style('nevler-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('nevler_title_font', 'Roboto Condensed')) ).':100,300,400,700' );

    wp_enqueue_style('nevler-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('nevler_body_font', 'Lato')) ).':100,300,400,700' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'flex-image', get_template_directory_uri() . '/assets/css/jquery.flex-images.css' );

    wp_enqueue_style( 'hover', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'nevler-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/default.css' );

    wp_enqueue_script( 'nevler-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'nevler-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'nevler-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'nevler-custom-js', get_template_directory_uri() . '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'nevler_scripts' );