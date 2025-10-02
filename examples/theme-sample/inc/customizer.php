<?php
/**
 * Customizer example.
 */

function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_setting(
        'header_color',
        array(
            'default'   => '#000000',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_color',
            array(
                'label'    => __( 'Header Color', 'mytheme' ),
                'section'  => 'colors',
                'settings' => 'header_color',
            )
        )
    );
}
add_action( 'customize_register', 'mytheme_customize_register' );
