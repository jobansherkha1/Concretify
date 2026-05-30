<?php
/**
 * Royal Concrete — form-handler.php
 * Handles the quote form submission via admin-post.php.
 * Include this from functions.php or keep it separate and require it.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function royal_concrete_quote_submit() {
    // Verify nonce
    if ( ! isset( $_POST['royal_quote_nonce'] ) ||
         ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['royal_quote_nonce'] ) ), 'royal_quote_form' ) ) {
        wp_die( esc_html__( 'Security check failed.', 'royal-concrete' ) );
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['rc_name']    ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['rc_phone']   ?? '' ) );
    $email   = sanitize_email(      wp_unslash( $_POST['rc_email']   ?? '' ) );
    $service = sanitize_text_field( wp_unslash( $_POST['rc_service'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['rc_message'] ?? '' ) );

    $to      = get_option( 'admin_email' );
    $subject = sprintf( '[Royal Concrete] New Quote Request from %s', $name );
    $body    = sprintf(
        "Name: %s\nPhone: %s\nEmail: %s\nService: %s\n\nMessage:\n%s",
        $name, $phone, $email, $service, $message
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf( 'Reply-To: %s <%s>', $name, $email ),
    ];

    wp_mail( $to, $subject, $body, $headers );

    wp_redirect( add_query_arg( 'quote-sent', '1', home_url( '/#quote' ) ) );
    exit;
}
add_action( 'admin_post_royal_quote_submit',        'royal_concrete_quote_submit' );
add_action( 'admin_post_nopriv_royal_quote_submit', 'royal_concrete_quote_submit' );
