<?php
function nevler_customize_register_googlefonts($wp_customize) {
    $wp_customize->add_section(
        'nevler_typo_options',
        array(
            'title'     => __('Google Web Fonts','nevler'),
            'priority'  => 41,
            'panel'     => 'nevler_design_panel'
        )
    );

    $font_array = array('Lato','Roboto Condensed','Open Sans','Oswald','Slabo 13px','Lora');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'nevler_title_font',
        array(
            'default'=> 'Roboto Condensed',
            'sanitize_callback' => 'nevler_sanitize_gfont',
            'transport'     => 'postMessage'
        )
    );

    function nevler_sanitize_gfont( $input ) {
        if ( in_array($input, array('Lato','Roboto Condensed','Open Sans','Oswald','Slabo 13px','Lora') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'nevler_title_font',array(
            'label' => __('Title','nevler'),
            'settings' => 'nevler_title_font',
            'section'  => 'nevler_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'nevler_body_font',
        array(
            'default'=> 'Lato',
            'sanitize_callback' => 'nevler_sanitize_gfont',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'nevler_body_font',array(
            'label' => __('Body','nevler'),
            'settings' => 'nevler_body_font',
            'section'  => 'nevler_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'nevler_customize_register_googlefonts');