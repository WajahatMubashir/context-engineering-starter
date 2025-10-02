<?php
// File: examples/theme-sample/patterns/hero-banner.php
/**
 * Registers a "Hero Banner" block pattern.
 * Uses core blocks only for portability. Replace as needed.
 */

if ( function_exists( 'register_block_pattern' ) ) {
    register_block_pattern(
        'mytheme/hero-banner',
        array(
            'title'       => __( 'Hero Banner', 'mytheme' ),
            'description' => __( 'A large hero section with heading, text, and a call-to-action button.', 'mytheme' ),
            'categories'  => array( 'mytheme' ),
            'content'     => '
                <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}},"className":"mytheme-hero"} -->
                <div class="wp-block-group alignfull mytheme-hero" style="padding-top:80px;padding-bottom:80px">
                    <!-- wp:heading {"textAlign":"left","level":1,"className":"mytheme-hero__title"} -->
                    <h1 class="wp-block-heading has-text-align-left mytheme-hero__title">' . esc_html__( 'Build Faster with MyTheme', 'mytheme' ) . '</h1>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"className":"mytheme-hero__subtitle"} -->
                    <p class="mytheme-hero__subtitle">' . esc_html__( 'Enterprise-grade WordPress theme scaffold with accessible, performant defaults.', 'mytheme' ) . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"className":"is-style-fill mytheme-hero__cta"} -->
                        <div class="wp-block-button is-style-fill mytheme-hero__cta"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Get Started', 'mytheme' ) . '</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            ',
        )
    );
}
