<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.11.2' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.11.1' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * ToDo: Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

// Child Theme Specific Functions to Remove Add to Cart
if ( ! function_exists( 'my_astra_remove_shop_add_to_cart' ) ) {
    function my_astra_remove_shop_add_to_cart( $structure ) {
        if ( is_array( $structure ) ) {
            $structure = array_diff( $structure, array( 'add_cart' ) );
        }
        return $structure;
    }
}
add_filter( 'astra_woo_shop_product_structure', 'my_astra_remove_shop_add_to_cart', 20 );

if ( ! function_exists( 'my_astra_remove_single_product_add_to_cart' ) ) {
    function my_astra_remove_single_product_add_to_cart( $structure ) {
        if ( is_array( $structure ) ) {
            $structure = array_diff( $structure, array( 'add_cart' ) );
        }
        return $structure;
    }
}
add_filter( 'astra_woo_single_product_structure', 'my_astra_remove_single_product_add_to_cart', 20 );

// Add 'Request Total with Shipping Cost' button
if ( ! function_exists( 'display_request_total_button' ) ) {
    function display_request_total_button() {
        global $product;

        if ( $product && is_a( $product, 'WC_Product' ) ) { // Ensure $product is a valid WC_Product object
            $product_id = $product->get_id();
            $request_url = home_url('/request-a-quote/?product_id=' . $product_id);

            echo '<a href="' . esc_url( $request_url ) . '" class="button request-total-button">' . esc_html__( 'Request Total with Shipping Cost', 'astra' ) . '</a>';
        }
    }
}

// Add button to Shop/Archive pages
add_action( 'woocommerce_after_shop_loop_item', 'display_request_total_button', 10 );

// Add button to Single Product pages
add_action( 'woocommerce_single_product_summary', 'display_request_total_button', 30 );

// Handle Quote Request Submission
if ( ! function_exists( 'handle_quote_request_submission' ) ) {
    function handle_quote_request_submission() {
        if ( isset( $_POST['submit_quote_request'] ) && isset( $_POST['request_quote_nonce'] ) ) {
            if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['request_quote_nonce'] ) ), 'request_quote_action' ) ) {
                // Nonce verification failed
                $redirect_url = add_query_arg( array(
                    'quote_status' => 'error',
                    'message' => urlencode( __( 'Security check failed. Please try again.', 'astra' ) ),
                    'product_id' => isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : ''
                ), home_url( '/request-a-quote/' ) );
                wp_safe_redirect( $redirect_url );
                exit;
            }

            // Sanitize and retrieve form data
            $product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : 0;
            $name = isset( $_POST['quote_name'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_name'] ) ) : '';
            $email = isset( $_POST['quote_email'] ) ? sanitize_email( wp_unslash( $_POST['quote_email'] ) ) : '';
            $address_1 = isset( $_POST['quote_shipping_address_1'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_shipping_address_1'] ) ) : '';
            $address_2 = isset( $_POST['quote_shipping_address_2'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_shipping_address_2'] ) ) : '';
            $city = isset( $_POST['quote_shipping_city'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_shipping_city'] ) ) : '';
            $state = isset( $_POST['quote_shipping_state'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_shipping_state'] ) ) : '';
            $postcode = isset( $_POST['quote_shipping_postcode'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_shipping_postcode'] ) ) : '';
            $country = isset( $_POST['quote_shipping_country'] ) ? sanitize_text_field( wp_unslash( $_POST['quote_shipping_country'] ) ) : '';
            $notes = isset( $_POST['quote_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['quote_notes'] ) ) : '';

            // Basic Validation
            $errors = array();
            if ( empty( $name ) ) { $errors[] = __( 'Name is required.', 'astra' ); }
            if ( empty( $email ) || ! is_email( $email ) ) { $errors[] = __( 'A valid email is required.', 'astra' ); }
            if ( empty( $address_1 ) ) { $errors[] = __( 'Shipping Address Line 1 is required.', 'astra' ); }
            if ( empty( $city ) ) { $errors[] = __( 'Shipping City is required.', 'astra' ); }
            if ( empty( $postcode ) ) { $errors[] = __( 'Shipping Postcode/Zip is required.', 'astra' ); }
            if ( empty( $country ) ) { $errors[] = __( 'Shipping Country is required.', 'astra' ); }
            if ( ! $product_id ) { $errors[] = __( 'Product ID is missing.', 'astra' ); }


            if ( ! empty( $errors ) ) {
                // Redirect back with error messages
                $redirect_url = add_query_arg( array(
                    'quote_status' => 'error',
                    'message' => urlencode( implode( '<br>', $errors ) ),
                    'product_id' => $product_id
                ), home_url( '/request-a-quote/' ) );
                wp_safe_redirect( $redirect_url );
                exit;
            }

            // Validation passed, proceed with email
            $product = wc_get_product( $product_id );
            if ( ! $product ) {
                $redirect_url = add_query_arg( array(
                    'quote_status' => 'error',
                    'message' => urlencode( __( 'Invalid Product ID.', 'astra' ) ),
                     'product_id' => $product_id
                ), home_url( '/request-a-quote/' ) );
                wp_safe_redirect( $redirect_url );
                exit;
            }

            $admin_email = get_option( 'admin_email' ); // Using WordPress admin email
            $subject = sprintf( __( 'New Quote Request for %s', 'astra' ), $product->get_name() );

            $email_body = "A new quote request has been submitted.\n\n";
            $email_body .= "Product: " . $product->get_name() . " (ID: " . $product_id . ")\n";
            $email_body .= "Product Price (excluding shipping): " . $product->get_price_html() . "\n\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            $email_body .= "Customer Details:\n";
            $email_body .= "Name: " . $name . "\n";
            $email_body .= "Email: " . $email . "\n\n";
            $email_body .= "Shipping Address:\n";
            $email_body .= $address_1 . "\n";
            if ( ! empty( $address_2 ) ) { $email_body .= $address_2 . "\n"; }
            $email_body .= $city . ", " . $state . " " . $postcode . "\n";
            $email_body .= $country . "\n\n";
            if ( ! empty( $notes ) ) {
                $email_body .= "Optional Notes:\n" . $notes . "\n";
            }

            $headers = array( 'Content-Type: text/plain; charset=UTF-8' );
            $headers[] = 'From: ' . $name . ' <' . $email . '>';
            $headers[] = 'Reply-To: ' . $email;


            if ( wp_mail( $admin_email, $subject, $email_body, $headers ) ) {
                // Email sent successfully
                $redirect_url = add_query_arg( array(
                    'quote_status' => 'success',
                    'message' => urlencode( __( 'Your quote request has been submitted successfully! We will get back to you soon.', 'astra' ) ),
                    'product_id' => $product_id
                ), home_url( '/request-a-quote/' ) );
            } else {
                // Email sending failed
                $redirect_url = add_query_arg( array(
                    'quote_status' => 'error',
                    'message' => urlencode( __( 'There was a problem sending your quote request. Please try again later.', 'astra' ) ),
                    'product_id' => $product_id
                ), home_url( '/request-a-quote/' ) );
            }
            wp_safe_redirect( $redirect_url );
            exit;
        }
    }
}
add_action( 'init', 'handle_quote_request_submission' );

?>
