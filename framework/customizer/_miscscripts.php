<?php
function nevler_customize_register_miscscripts($wp_customize){
    $wp_customize->add_section(
        'nevler_sec_pro',
        array(
            'title'     => __('Important Links','nevler'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'nevler_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Nevler_WP_Customize_Upgrade_Control(
            $wp_customize,
            'nevler_pro',
            array(
                'description'	=> '<a class="nevler-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'nevler').'</a>
                                    <a class="nevler-important-links" href="https://demo.inkhive.com/nevler-plus/" target="_blank">'.__('Nevler Plus Live Demo', 'nevler').'</a>
                                    <a class="nevler-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'nevler').'</a>
                                    <a class="nevler-important-links" href="https://wordpress.org/support/theme/nevler/reviews" target="_blank">'.__('Review Nevler on WordPress', 'nevler').'</a>',
                'section' => 'nevler_sec_pro',
                'settings' => 'nevler_pro',
            )
        )
    );
}
add_action('customize_register', 'nevler_customize_register_miscscripts');