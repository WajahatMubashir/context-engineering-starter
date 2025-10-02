<?php
/**
 * Example theme setup.
 */

function mytheme_setup() {
    // Enable featured images
    add_theme_support( 'post-thumbnails' );

    // Let WP manage the document title
    add_theme_support( 'title-tag' );

    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'mytheme' ),
            'footer'  => __( 'Footer Menu', 'mytheme' ),
        )
    );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Enqueue theme styles and scripts.
 */
function mytheme_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), $theme_version );
    wp_enqueue_script( 'mytheme-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_assets' );

/**
 * Ensure block patterns are loaded from inc/patterns.php.
 */
require_once get_template_directory() . '/inc/patterns.php';