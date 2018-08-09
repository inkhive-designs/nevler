<?php
function nevler_customize_register_layouts($wp_customize) {
    $wp_customize->get_section('colors')->panel = 'nevler_design_panel';
    $wp_customize->get_section('background_image')->panel = 'nevler_design_panel';

    // Layout and Design
    $wp_customize->add_panel( 'nevler_design_panel', array(
        'priority'       => 50,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','nevler'),
    ) );

    $wp_customize->add_section(
        'nevler_design_options',
        array(
            'title'     => __('Blog Layout','nevler'),
            'priority'  => 0,
            'panel'     => 'nevler_design_panel'
        )
    );


    $wp_customize->add_setting(
        'nevler_blog_layout',
        array(
            'default'   => 'grid',
            'sanitize_callback' => 'nevler_sanitize_blog_layout'
        )
    );

    function nevler_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','nevler','grid_2_column','grid_3_column') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'nevler_blog_layout',array(
            'label' => __('Select Layout','nevler'),
            'settings' => 'nevler_blog_layout',
            'section'  => 'nevler_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Basic Blog Layout','nevler'),
                'nevler' => __('Nevler Default Layout','nevler'),
                'grid_2_column' => __('Grid - 2 Column Layout','nevler'),
                'grid_3_column' => __('Grid - 3 Column Layout','nevler'),
            )
        )
    );

    $wp_customize->add_section(
        'nevler_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','nevler'),
            'priority'  => 0,
            'panel'     => 'nevler_design_panel'
        )
    );

    $wp_customize->add_setting(
        'nevler_disable_sidebar',
        array( 'sanitize_callback' => 'nevler_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nevler_disable_sidebar', array(
            'settings' => 'nevler_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','nevler' ),
            'section'  => 'nevler_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'nevler_disable_sidebar_home',
        array( 'sanitize_callback' => 'nevler_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nevler_disable_sidebar_home', array(
            'settings' => 'nevler_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','nevler' ),
            'section'  => 'nevler_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'nevler_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'nevler_disable_sidebar_front',
        array( 'sanitize_callback' => 'nevler_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'nevler_disable_sidebar_front', array(
            'settings' => 'nevler_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','nevler' ),
            'section'  => 'nevler_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'nevler_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'nevler_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'nevler_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'nevler_sidebar_width', array(
            'settings' => 'nevler_sidebar_width',
            'label'    => __( 'Sidebar Width','nevler' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','nevler'),
            'section'  => 'nevler_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'nevler_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function nevler_show_sidebar_options($control) {

        $option = $control->manager->get_setting('nevler_disable_sidebar');
        return $option->value() == false ;

    }

    $wp_customize-> add_section(
        'nevler_custom_footer',
        array(
            'title'			=> __('Custom Footer Settings','nevler'),
            'priority'		=> 11,
            'panel'			=> 'nevler_design_panel'
        )
    );

    $wp_customize->add_setting(
        'nevler_fc_line_disable',
        array(
            'sanitize_callback' => 'nevler sanitize_checkbox',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'nevler_fc_line_disable',
        array(
            'settings' => 'nevler_fc_line_disable',
            'section'   => 'nevler_custom_footer',
            'label'     => __('Disable Footer Credit Line', 'nevler'),
            'type'  =>   'checkbox'
        )
    );


    $wp_customize->add_setting(
        'nevler_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'nevler_footer_text',
        array(
            'section' => 'nevler_custom_footer',
            'settings' => 'nevler_footer_text',
            'label'	=> __('Enter your Own Copyright Text.','nevler'),
            'type' => 'text'
        )
    );

}
add_action('customize_register', 'nevler_customize_register_layouts');