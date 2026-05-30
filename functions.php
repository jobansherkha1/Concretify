<?php
/**
 * Royal Concrete — functions.php
 *
 * Sets up theme supports, registers navigation menus, enqueues
 * Google Fonts, Tailwind CDN, GSAP, and the theme's own JS/CSS.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ─────────────────────────────────────────────
   1. THEME SETUP
───────────────────────────────────────────── */
function royal_concrete_setup() {
    load_theme_textdomain( 'royal-concrete', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ] );
    add_theme_support( 'custom-logo', [
        'height'      => 64,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus( [
        'primary' => esc_html__( 'Primary Menu', 'royal-concrete' ),
        'mobile'  => esc_html__( 'Mobile Menu',  'royal-concrete' ),
    ] );
}
add_action( 'after_setup_theme', 'royal_concrete_setup' );

/* ─────────────────────────────────────────────
   2. CONTENT WIDTH
───────────────────────────────────────────── */
if ( ! isset( $content_width ) ) {
    $content_width = 1280;
}

/* ─────────────────────────────────────────────
   3. ENQUEUE SCRIPTS & STYLES
───────────────────────────────────────────── */
function royal_concrete_scripts() {

    // Google Fonts
    wp_enqueue_style(
        'royal-concrete-fonts',
        'https://fonts.googleapis.com/css2?family=Anton&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap',
        [],
        null
    );

    // Google Material Symbols
    wp_enqueue_style(
        'royal-concrete-material',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        [],
        null
    );

    // Theme stylesheet (style.css — keeps WP happy)
    wp_enqueue_style( 'royal-concrete-style', get_stylesheet_uri(), [], '1.0.0' );

    // Theme custom CSS
    wp_enqueue_style(
        'royal-concrete-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'royal-concrete-style' ],
        '1.0.0'
    );

    // Tailwind CDN (development convenience — for production compile locally)
    wp_enqueue_script(
        'tailwindcss',
        'https://cdn.tailwindcss.com?plugins=forms,container-queries',
        [],
        null,
        false  // Must load in <head> so config script runs before body
    );

    // Inline Tailwind config — output right after the Tailwind script tag
    $tailwind_config = royal_concrete_tailwind_config();
    wp_add_inline_script( 'tailwindcss', $tailwind_config );

    // GSAP
    wp_enqueue_script(
        'gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js',
        [],
        '3.12.7',
        true
    );
    wp_enqueue_script(
        'gsap-scroll-trigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js',
        [ 'gsap' ],
        '3.12.7',
        true
    );

    // Theme JS
    wp_enqueue_script(
        'royal-concrete-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [ 'gsap', 'gsap-scroll-trigger' ],
        '1.0.0',
        true
    );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'royal_concrete_scripts' );

/* ─────────────────────────────────────────────
   4. TAILWIND CONFIG (returned as JS string)
───────────────────────────────────────────── */
function royal_concrete_tailwind_config() {
    return <<<'JS'
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "on-secondary": "#303030",
        "inverse-surface": "#e3e2e2",
        "on-surface": "#e3e2e2",
        "secondary-fixed-dim": "#c6c6c6",
        "inverse-on-surface": "#303031",
        "surface-container-low": "#1b1c1c",
        "secondary": "#c6c6c6",
        "on-tertiary-fixed-variant": "#474746",
        "on-error": "#690005",
        "surface-bright": "#383939",
        "on-primary": "#3d2f00",
        "primary-fixed": "#ffe08b",
        "surface-container": "#1f2020",
        "tertiary-fixed-dim": "#c8c6c5",
        "on-error-container": "#ffdad6",
        "secondary-fixed": "#e2e2e2",
        "tertiary-container": "#d4d1d1",
        "on-secondary-fixed-variant": "#474747",
        "surface-container-lowest": "#0d0e0f",
        "on-primary-fixed": "#241a00",
        "on-secondary-fixed": "#1b1b1b",
        "primary-fixed-dim": "#f1c100",
        "error-container": "#93000a",
        "primary-container": "#FFB800",
        "on-tertiary": "#313030",
        "background": "#121414",
        "primary": "#ffedc3",
        "surface-container-high": "#292a2a",
        "surface": "#121414",
        "error": "#ffb4ab",
        "on-tertiary-fixed": "#1c1b1b",
        "on-background": "#e3e2e2",
        "outline": "#9a9078",
        "surface-variant": "#343535",
        "tertiary-fixed": "#e5e2e1",
        "on-secondary-container": "#b5b5b5",
        "tertiary": "#f0eded",
        "on-primary-container": "#6f5700",
        "secondary-container": "#474747",
        "surface-tint": "#f1c100",
        "surface-container-highest": "#343535",
        "on-surface-variant": "#d2c5ab",
        "inverse-primary": "#745b00",
        "on-primary-fixed-variant": "#584400",
        "outline-variant": "#4e4632",
        "surface-dim": "#121414",
        "on-tertiary-container": "#5a5a59"
      },
      borderRadius: {
        DEFAULT: "0.25rem",
        lg: "0.5rem",
        xl: "0.75rem",
        full: "9999px"
      },
      fontFamily: {
        "body-lg": ["Hanken Grotesk"],
        "label-md": ["JetBrains Mono"],
        "headline-lg-mobile": ["Anton"],
        "headline-md": ["Anton"],
        "display-lg": ["Anton"],
        "stat-lg": ["Anton"],
        "headline-lg": ["Anton"],
        "body-md": ["Hanken Grotesk"]
      },
      fontSize: {
        "body-lg": ["18px", { lineHeight: "1.6", fontWeight: "400" }],
        "label-md": ["14px", { lineHeight: "1.2", letterSpacing: "0.05em", fontWeight: "500" }],
        "headline-lg-mobile": ["40px", { lineHeight: "1.1", fontWeight: "400" }],
        "headline-md": ["32px", { lineHeight: "1.2", fontWeight: "400" }],
        "display-lg": ["96px", { lineHeight: "1.0", letterSpacing: "0.02em", fontWeight: "400" }],
        "stat-lg": ["48px", { lineHeight: "1.0", fontWeight: "400" }],
        "headline-lg": ["64px", { lineHeight: "1.1", letterSpacing: "0.01em", fontWeight: "400" }],
        "body-md": ["16px", { lineHeight: "1.5", fontWeight: "400" }]
      }
    }
  }
};
JS;
}

/* ─────────────────────────────────────────────
   5. ADD dark CLASS TO <html>
───────────────────────────────────────────── */
function royal_concrete_add_dark_class( $classes ) {
    $classes[] = 'dark';
    return $classes;
}
// Tailwind darkMode:"class" requires class="dark" on <html>
// We handle this directly in header.php via get_language_attributes() override.

/* ─────────────────────────────────────────────
   6. CUSTOM IMAGE SIZES
───────────────────────────────────────────── */
add_image_size( 'royal-hero',    1920, 1080, true );
add_image_size( 'royal-service',  800,  600, true );
add_image_size( 'royal-thumb',    400,  300, true );

/* ─────────────────────────────────────────────
   7. REGISTER WIDGET AREAS
───────────────────────────────────────────── */
function royal_concrete_widgets_init() {
    register_sidebar( [
        'name'          => esc_html__( 'Footer Widget Area', 'royal-concrete' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here for the footer.', 'royal-concrete' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title font-label-md text-label-md uppercase text-primary-container mb-4">',
        'after_title'   => '</h3>',
    ] );
}
add_action( 'widgets_init', 'royal_concrete_widgets_init' );

/* ─────────────────────────────────────────────
   8. CUSTOM WALKER — flat nav
───────────────────────────────────────────── */
class Royal_Concrete_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = 'text-on-surface font-label-md text-label-md hover:text-primary transition-colors duration-200';
        $output .= sprintf(
            '<a class="%s" href="%s">%s</a>',
            esc_attr( $classes ),
            esc_url( $item->url ),
            esc_html( $item->title )
        );
    }
}

class Royal_Concrete_Mobile_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $output .= sprintf(
            '<a href="%s" class="mobile-nav-link">%s</a>',
            esc_url( $item->url ),
            esc_html( $item->title )
        );
    }
}

/* ─────────────────────────────────────────────
   9. THEME CUSTOMIZER
───────────────────────────────────────────── */
function royal_concrete_customize_register( $wp_customize ) {

    /* ── Contact details panel ── */
    $wp_customize->add_panel( 'royal_contact_panel', [
        'title'    => __( 'Contact Details', 'royal-concrete' ),
        'priority' => 30,
    ] );

    $fields = [
        'royal_phone'     => [ 'Phone Number',    '437-255-7770',                  'Contact Details' ],
        'royal_phone_raw' => [ 'Phone (href)',     '4372557770',                    'Contact Details' ],
        'royal_email'     => [ 'Email Address',   'royalconcrete0001@gmail.com',   'Contact Details' ],
        'royal_instagram' => [ 'Instagram Handle','@royal_concrete_cutting',        'Contact Details' ],
        'royal_cta_name'  => [ 'CTA Name (e.g. SAHIL)', 'SAHIL',                  'Contact Details' ],
    ];

    foreach ( $fields as $id => $data ) {
        $wp_customize->add_setting( $id, [ 'default' => $data[1], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $data[0], 'royal-concrete' ),
            'section' => 'royal_contact_section',
            'type'    => 'text',
        ] );
    }

    $wp_customize->add_section( 'royal_contact_section', [
        'title'    => __( 'Contact Details', 'royal-concrete' ),
        'panel'    => 'royal_contact_panel',
        'priority' => 10,
    ] );

    /* ── Hero panel ── */
    $wp_customize->add_section( 'royal_hero_section', [
        'title'    => __( 'Hero Section', 'royal-concrete' ),
        'priority' => 40,
    ] );
    $wp_customize->add_setting( 'royal_hero_bg', [
        'default'           => 'https://www.ieltsbid.in/wp-content/uploads/2026/05/construction-worker.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'royal_hero_bg', [
        'label'   => __( 'Hero Background Image', 'royal-concrete' ),
        'section' => 'royal_hero_section',
    ] ) );

    $wp_customize->add_setting( 'royal_hero_headline', [
        'default'           => 'WE <span class="text-primary-container">CUT</span><br><span class="text-outline-white">THROUGH</span><br>ANYTHING',
        'sanitize_callback' => 'wp_kses_post',
    ] );
    $wp_customize->add_control( 'royal_hero_headline', [
        'label'   => __( 'Hero Headline (HTML allowed)', 'royal-concrete' ),
        'section' => 'royal_hero_section',
        'type'    => 'textarea',
    ] );
}
add_action( 'customize_register', 'royal_concrete_customize_register' );

/* ─────────────────────────────────────────────
   10. HELPER — get theme mod with fallback
───────────────────────────────────────────── */
function rc_mod( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

/* ─────────────────────────────────────────────
   11. INCLUDES
───────────────────────────────────────────── */
require get_template_directory() . '/inc/form-handler.php';
