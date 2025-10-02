<?php
// File: examples/theme-sample/patterns/cta.php
/**
 * Registers a "Simple CTA" block pattern.
 */

if ( function_exists( 'register_block_pattern' ) ) {
    register_block_pattern(
        'mytheme/cta',
        array(
            'title'       => __( 'Simple CTA', 'mytheme' ),
            'description' => __( 'A centered call-to-action with heading and button.', 'mytheme' ),
            'categories'  => array( 'mytheme' ),
            'content'     => '
                <!-- wp:group {"align":"wide","className":"mytheme-cta","style":{"spacing":{"padding":{"top":"48px","bottom":"48px"}}}} -->
                <div class="wp-block-group alignwide mytheme-cta" style="padding-top:48px;padding-bottom:48px">
                    <!-- wp:heading {"textAlign":"center","level":2,"className":"mytheme-cta__title"} -->
                    <h2 class="wp-block-heading has-text-align-center mytheme-cta__title">' . esc_html__( 'Ready to Ship Enterprise UI', 'mytheme' ) . '</h2>
                    <!-- /wp:heading -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"className":"is-style-outline mytheme-cta__button"} -->
                        <div class="wp-block-button is-style-outline mytheme-cta__button"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Contact Sales', 'mytheme' ) . '</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            ',
        )
    );
}
