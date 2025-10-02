<?php
/**
 * @group theme
 *
 * PHPUnit tests for enterprise WordPress theme setup.
 * Requires WP test suite (wp-phpunit). Typical bootstrap is via
 * tests/bootstrap.php loading the WP core test library.
 */

class ThemeSetupTest extends WP_UnitTestCase {

    public static function wpSetUpBeforeClass(): void {
        // If your theme bootstrap registers things on 'after_setup_theme',
        // ensure the hook is fired so supports/menus/etc exist for tests.
        do_action( 'after_setup_theme' );

        // Fire enqueue hook so script/style registration/enqueue can be checked.
        do_action( 'wp_enqueue_scripts' );

        // For block patterns/categories (WP 5.5+)
        if ( function_exists( 'register_block_pattern_category' ) ) {
            do_action( 'init' );
        }
    }

    public function test_theme_textdomain_is_loaded() {
        // Replace 'mytheme' with your theme text domain if different.
        $this->assertTrue(
            is_textdomain_loaded( 'mytheme' ),
            'Theme text domain should be loaded for translations.'
        );
    }

    public function test_theme_supports() {
        $this->assertTrue( current_theme_supports( 'title-tag' ), 'Theme should support title-tag.' );
        $this->assertTrue( current_theme_supports( 'post-thumbnails' ), 'Theme should support post-thumbnails.' );

        // HTML5 support (adjust to what your theme declares)
        $this->assertTrue(
            current_theme_supports( 'html5', 'search-form' ),
            'Theme should support HTML5 markup for search-form.'
        );
        $this->assertTrue(
            current_theme_supports( 'responsive-embeds' ) || current_theme_supports( 'wp-block-styles' ) || current_theme_supports( 'editor-styles' ),
            'Theme should enable modern block editor features (responsive-embeds / block styles / editor-styles).'
        );
    }

    public function test_navigation_menus_are_registered() {
        $menus = get_registered_nav_menus();
        $this->assertIsArray( $menus, 'Registered nav menus should be an array.' );

        // Common enterprise menus
        $this->assertArrayHasKey( 'primary', $menus, 'Primary menu should be registered.' );
        // Add more if you plan mega menu/footer menus:
        // $this->assertArrayHasKey( 'footer', $menus, 'Footer menu should be registered.' );
        // $this->assertArrayHasKey( 'mega', $menus, 'Mega menu should be registered.' );
    }

    public function test_sidebars_are_registered() {
        global $wp_registered_sidebars;

        $this->assertIsArray( $wp_registered_sidebars, 'Sidebars registry should be an array.' );
        // Typical ID from register_sidebar.
        $this->assertArrayHasKey(
            'sidebar-1',
            $wp_registered_sidebars,
            'Primary sidebar (sidebar-1) should be registered.'
        );
    }

    public function test_scripts_and_styles_are_enqueued() {
        // Replace handles with what your theme uses.
        $this->assertTrue(
            wp_script_is( 'mytheme-main', 'registered' ) || wp_script_is( 'mytheme-main', 'enqueued' ),
            'Main theme script (mytheme-main) should be registered or enqueued.'
        );

        $this->assertTrue(
            wp_style_is( 'mytheme-style', 'registered' ) || wp_style_is( 'mytheme-style', 'enqueued' ),
            'Main theme stylesheet (mytheme-style) should be registered or enqueued.'
        );

        // Ensure assets are versioned for cache-busting (optional: check src query string)
        $script = wp_scripts()->registered['mytheme-main'] ?? null;
        if ( $script ) {
            $this->assertNotEmpty( $script->ver, 'Main script should have a version for cache-busting.' );
        }
        $style = wp_styles()->registered['mytheme-style'] ?? null;
        if ( $style ) {
            $this->assertNotEmpty( $style->ver, 'Main style should have a version for cache-busting.' );
        }
    }

    public function test_custom_post_types_exist() {
        // Only test ones you intend to create.
        // For enterprise sites: Portfolio, Testimonials, Case Studies, etc.
        $this->assertTrue(
            post_type_exists( 'portfolio' ),
            'Custom post type "portfolio" should be registered.'
        );
        // $this->assertTrue( post_type_exists( 'testimonial' ), 'CPT "testimonial" should be registered.' );
    }

    public function test_image_sizes_registered() {
        // If you add custom sizes (e.g., for hero banners), test them here.
        // add_image_size('hero', 1600, 600, true);
        if ( function_exists( 'wp_get_additional_image_sizes' ) ) {
            $sizes = wp_get_additional_image_sizes();
            $this->assertIsArray( $sizes, 'Additional image sizes should be an array.' );
            // Adjust to your theme’s custom size handles:
            // $this->assertArrayHasKey( 'hero', $sizes, 'Custom image size "hero" should be registered.' );
        } else {
            $this->markTestSkipped( 'wp_get_additional_image_sizes() not available on this WP version.' );
        }
    }

    public function test_block_patterns_registered() {
        if ( class_exists( '\WP_Block_Patterns_Registry' ) ) {
            $registry = \WP_Block_Patterns_Registry::get_instance();

            // Example pattern handles your theme might register.
            $maybe_hero = $registry->is_registered( 'mytheme/hero-banner' );
            $maybe_cta  = $registry->is_registered( 'mytheme/cta' );

            $this->assertTrue(
                $maybe_hero || $maybe_cta,
                'At least one theme block pattern (e.g., mytheme/hero-banner or mytheme/cta) should be registered.'
            );
        } else {
            $this->markTestSkipped( 'Block Patterns registry not available on this WP version.' );
        }
    }

    public function test_rest_endpoints_or_settings_routes_optional() {
        // If your enterprise theme exposes settings via REST (e.g., theme options proxy),
        // add a smoke test to ensure the route exists.
        // $routes = rest_get_server()->get_routes();
        // $this->assertArrayHasKey( '/mytheme/v1/settings', $routes, 'Theme settings REST route should be registered.' );
        $this->assertTrue( true, 'No REST endpoints to test yet.' );
    }
}
