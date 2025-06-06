<?php
/**
 * Template Name: Request a Quote
 *
 * This is the template for displaying the "Request a Quote" page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Astra
 * @since   x.x.x (replace x.x.x with the Astra version number)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Display messages from form submission
if ( isset( $_GET['quote_status'] ) && isset( $_GET['message'] ) ) {
    $status = sanitize_key( $_GET['quote_status'] );
    // Ensure message is properly decoded and then sanitized. Allow <br> for multiple error messages.
    $message = wp_kses_post( stripslashes( urldecode( $_GET['message'] ) ) );

    if ( $status === 'success' ) {
        echo '<div class="woocommerce-message" role="alert">' . $message . '</div>';
    } elseif ( $status === 'error' ) {
        echo '<div class="woocommerce-error" role="alert">' . $message . '</div>';
    }
}

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="ast-container"> <?php // Astra specific container class ?>
            <div class="ast-row"> <?php // Astra specific row class ?>
                <div class="ast-col-lg-12 ast-col-md-12 ast-col-sm-12 ast-col-xs-12"> <?php // Full width column ?>
                    <div class="entry-content clear">
                        <?php
                        // Ensure product_id is present for displaying the form correctly after redirect
                        $product_id_display = isset( $_GET['product_id'] ) ? intval( $_GET['product_id'] ) : 0;
                        if ( ! $product_id_display && isset( $_POST['product_id'] ) ) { // Fallback for form resubmission scenarios if any
                            $product_id_display = intval( $_POST['product_id'] );
                        }

                        $product = $product_id_display ? wc_get_product( $product_id_display ) : null;

                        if ( $product && is_a( $product, 'WC_Product' ) ) :
                        ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php esc_html_e( 'Request a Quote', 'astra' ); ?></h1>
                                </header>

                                <div class="product-details-for-quote">
                                    <h2><?php echo esc_html( $product->get_name() ); ?></h2>
                                    <div class="product-image">
                                        <?php echo $product->get_image(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </div>
                                    <div class="product-price">
                                        <p><strong><?php esc_html_e( 'Current Price (excluding shipping):', 'astra' ); ?></strong> <?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                                    </div>
                                </div>

                                <form method="POST" action="" class="request-quote-form">
                                    <?php wp_nonce_field( 'request_quote_action', 'request_quote_nonce' ); ?>
                                    <input type="hidden" name="product_id" value="<?php echo esc_attr( $product_id_display ); ?>">

                                    <?php
                                    $current_user = wp_get_current_user();
                                    $user_name = '';
                                    $user_email = '';
                                    $shipping_address_1 = '';
                                    $shipping_address_2 = '';
                                    $shipping_city = '';
                                    $shipping_state = '';
                                    $shipping_postcode = '';
                                    $shipping_country = '';

                                    // Pre-fill fields if it's not a submission with errors, to avoid overriding user's re-attempt
                                    if ( ! (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ) {
                                        if ( is_user_logged_in() ) {
                                            $user_name = $current_user->user_firstname ? $current_user->user_firstname . ' ' . $current_user->user_lastname : $current_user->display_name;
                                            $user_email = $current_user->user_email;

                                            if ( class_exists( 'WooCommerce' ) ) {
                                                $customer = new WC_Customer( get_current_user_id() );
                                                $shipping_address_1 = $customer->get_shipping_address_1();
                                                $shipping_address_2 = $customer->get_shipping_address_2();
                                                $shipping_city      = $customer->get_shipping_city();
                                                $shipping_state     = $customer->get_shipping_state();
                                                $shipping_postcode  = $customer->get_shipping_postcode();
                                                $shipping_country   = $customer->get_shipping_country();
                                            }
                                        }
                                    }
                                    ?>

                                    <p class="form-row">
                                        <label for="quote_name"><?php esc_html_e( 'Name', 'astra' ); ?> <span class="required">*</span></label>
                                        <input type="text" name="quote_name" id="quote_name" value="<?php echo esc_attr( isset($_POST['quote_name']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_name'] : $user_name ); ?>" required>
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_email"><?php esc_html_e( 'Email', 'astra' ); ?> <span class="required">*</span></label>
                                        <input type="email" name="quote_email" id="quote_email" value="<?php echo esc_attr( isset($_POST['quote_email']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_email'] : $user_email ); ?>" required>
                                    </p>

                                    <h3><?php esc_html_e( 'Shipping Address', 'astra' ); ?></h3>

                                    <p class="form-row">
                                        <label for="quote_shipping_address_1"><?php esc_html_e( 'Address Line 1', 'astra' ); ?> <span class="required">*</span></label>
                                        <input type="text" name="quote_shipping_address_1" id="quote_shipping_address_1" value="<?php echo esc_attr( isset($_POST['quote_shipping_address_1']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_shipping_address_1'] : $shipping_address_1 ); ?>" required>
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_shipping_address_2"><?php esc_html_e( 'Address Line 2', 'astra' ); ?></label>
                                        <input type="text" name="quote_shipping_address_2" id="quote_shipping_address_2" value="<?php echo esc_attr( isset($_POST['quote_shipping_address_2']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_shipping_address_2'] : $shipping_address_2 ); ?>">
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_shipping_city"><?php esc_html_e( 'City', 'astra' ); ?> <span class="required">*</span></label>
                                        <input type="text" name="quote_shipping_city" id="quote_shipping_city" value="<?php echo esc_attr( isset($_POST['quote_shipping_city']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_shipping_city'] : $shipping_city ); ?>" required>
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_shipping_state"><?php esc_html_e( 'State/County', 'astra' ); ?></label>
                                        <input type="text" name="quote_shipping_state" id="quote_shipping_state" value="<?php echo esc_attr( isset($_POST['quote_shipping_state']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_shipping_state'] : $shipping_state ); ?>">
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_shipping_postcode"><?php esc_html_e( 'Postcode/Zip', 'astra' ); ?> <span class="required">*</span></label>
                                        <input type="text" name="quote_shipping_postcode" id="quote_shipping_postcode" value="<?php echo esc_attr( isset($_POST['quote_shipping_postcode']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_shipping_postcode'] : $shipping_postcode ); ?>" required>
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_shipping_country"><?php esc_html_e( 'Country', 'astra' ); ?> <span class="required">*</span></label>
                                        <input type="text" name="quote_shipping_country" id="quote_shipping_country" value="<?php echo esc_attr( isset($_POST['quote_shipping_country']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_shipping_country'] : $shipping_country ); ?>" required>
                                    </p>

                                    <p class="form-row">
                                        <label for="quote_notes"><?php esc_html_e( 'Optional Notes', 'astra' ); ?></label>
                                        <textarea name="quote_notes" id="quote_notes" rows="5"><?php echo esc_textarea( isset($_POST['quote_notes']) && (isset( $_GET['quote_status'] ) && $_GET['quote_status'] === 'error') ? $_POST['quote_notes'] : '' ); ?></textarea>
                                    </p>

                                    <p class="form-submit">
                                        <input type="submit" name="submit_quote_request" class="button alt" value="<?php esc_attr_e( 'Submit Quote Request', 'astra' ); ?>">
                                    </p>
                                </form>
                            </article>
                        <?php else : ?>
                            <p><?php esc_html_e( 'No product selected for a quote, or the selected product is invalid. Please go back to a product page and click the "Request Total with Shipping Cost" button.', 'astra' ); ?></p>
                        <?php endif; ?>
                    </div><!-- .entry-content -->
                </div><!-- .ast-col -->
            </div><!-- .ast-row -->
        </div><!-- .ast-container -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
