<?php
/**
 * Enqueue Scripts for Admin
 */
if ( is_customize_preview() ) {
    function nevler_custom_wp_admin_style() {
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
        wp_enqueue_style( 'nevler-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
    }
    add_action( 'customize_controls_print_styles', 'nevler_custom_wp_admin_style' );
}
