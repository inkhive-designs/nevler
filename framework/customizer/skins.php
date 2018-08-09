<?php
function nevler_customize_register_skins($wp_customize) {
    //Replace Header Text Color with, separate colors for Title and Description
    //Override nevler_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->get_setting('background_color')->transport = 'postMessage';

    $wp_customize->add_setting('nevler_site_titlecolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nevler_site_titlecolor', array(
            'label' => __('Site Title Color','nevler'),
            'section' => 'colors',
            'settings' => 'nevler_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('nevler_header_desccolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nevler_header_desccolor', array(
            'label' => __('Site Tagline Color','nevler'),
            'section' => 'colors',
            'settings' => 'nevler_header_desccolor',
            'type' => 'color'
        ) )
    );

}
add_action('customize_register', 'nevler_customize_register_skins');