<?php
function nevler_customize_register_header($wp_customize) {
    $wp_customize->get_section('header_image')->panel = 'nevler_header_panel';

    $wp_customize->add_panel('nevler_header_panel', array(
            'title' => __('Header Settings', 'nevler'),
            'priority' => 20,
        )
    );

    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'nevler' ),
        'priority'   => 30,
        'panel'     => 'nevler_header_panel'
    ) );

    //Settings For Logo Area

    $wp_customize->add_setting(
        'nevler_hide_title_tagline',
        array(
            'sanitize_callback' => 'nevler_sanitize_checkbox',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'nevler_hide_title_tagline', array(
            'settings' => 'nevler_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'nevler' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'nevler_branding_below_logo',
        array(
            'sanitize_callback' => 'nevler_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'nevler_branding_below_logo', array(
            'settings' => 'nevler_branding_below_logo',
            'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'nevler' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'active_callback' => 'nevler_title_visible'
        )
    );

    function nevler_title_visible( $control ) {
        $option = $control->manager->get_setting('nevler_hide_title_tagline');
        return $option->value() == false ;
    }

    $wp_customize->add_setting(
        'nevler_center_logo',
        array(
            'sanitize_callback' => 'nevler_sanitize_checkbox',
            'default' => true,
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'nevler_center_logo', array(
            'settings' => 'nevler_center_logo',
            'label'    => __( 'Center Align.', 'nevler' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );
}
add_action('customize_register', 'nevler_customize_register_header');