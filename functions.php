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

    wp_enqueue_style(
        'royal-concrete-fonts',
        'https://fonts.googleapis.com/css2?family=Anton&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'royal-concrete-material',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        [],
        null
    );

    wp_enqueue_style( 'royal-concrete-style', get_stylesheet_uri(), [], '1.0.0' );

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
        false
    );

    wp_add_inline_script( 'tailwindcss', royal_concrete_tailwind_config() );

    wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', [], '3.12.7', true );
    wp_enqueue_script( 'gsap-scroll-trigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', [ 'gsap' ], '3.12.7', true );

    wp_enqueue_script(
        'royal-concrete-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [ 'gsap', 'gsap-scroll-trigger' ],
        '1.0.0',
        true
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'royal_concrete_scripts' );

/* ─────────────────────────────────────────────
   4. TAILWIND CONFIG (dynamic accent color)
───────────────────────────────────────────── */
function royal_concrete_tailwind_config() {
    $accent = sanitize_hex_color( get_theme_mod( 'royal_accent_color', '#FFB800' ) );
    if ( ! $accent ) {
        $accent = '#FFB800';
    }

    $js = <<<'JS'
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

    // Replace the default accent color with the Customizer value
    return str_replace( '"#FFB800"', '"' . $accent . '"', $js );
}

/* ─────────────────────────────────────────────
   5. CUSTOM IMAGE SIZES
───────────────────────────────────────────── */
add_image_size( 'royal-hero',    1920, 1080, true );
add_image_size( 'royal-service',  800,  600, true );
add_image_size( 'royal-thumb',    400,  300, true );

/* ─────────────────────────────────────────────
   6. REGISTER WIDGET AREAS
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
   7. PROJECTS CUSTOM POST TYPE
───────────────────────────────────────────── */
function royal_concrete_register_project_cpt() {
    register_post_type( 'rc_project', [
        'labels' => [
            'name'          => __( 'Projects',        'royal-concrete' ),
            'singular_name' => __( 'Project',         'royal-concrete' ),
            'add_new_item'  => __( 'Add New Project', 'royal-concrete' ),
            'edit_item'     => __( 'Edit Project',    'royal-concrete' ),
            'view_item'     => __( 'View Project',    'royal-concrete' ),
            'all_items'     => __( 'All Projects',    'royal-concrete' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => [ 'title', 'thumbnail', 'excerpt' ],
        'menu_icon'    => 'dashicons-portfolio',
        'rewrite'      => [ 'slug' => 'our-work' ],
    ] );
}
add_action( 'init', 'royal_concrete_register_project_cpt' );

function royal_concrete_project_meta_boxes() {
    add_meta_box(
        'rc_project_details',
        __( 'Project Details', 'royal-concrete' ),
        'royal_concrete_project_meta_callback',
        'rc_project',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'royal_concrete_project_meta_boxes' );

function royal_concrete_project_meta_callback( $post ) {
    wp_nonce_field( 'rc_project_meta', 'rc_project_meta_nonce' );
    $category  = get_post_meta( $post->ID, '_rc_project_category',  true ) ?: 'residential';
    $video_url = get_post_meta( $post->ID, '_rc_project_video_url', true );
    ?>
    <table class="form-table">
      <tr>
        <th><label for="rc_project_category"><?php esc_html_e( 'Category', 'royal-concrete' ); ?></label></th>
        <td>
          <select name="rc_project_category" id="rc_project_category">
            <option value="residential" <?php selected( $category, 'residential' ); ?>><?php esc_html_e( 'Residential', 'royal-concrete' ); ?></option>
            <option value="commercial"  <?php selected( $category, 'commercial'  ); ?>><?php esc_html_e( 'Commercial',  'royal-concrete' ); ?></option>
          </select>
        </td>
      </tr>
      <tr>
        <th><label for="rc_project_video_url"><?php esc_html_e( 'Video URL (.mp4)', 'royal-concrete' ); ?></label></th>
        <td>
          <input type="url" name="rc_project_video_url" id="rc_project_video_url"
                 value="<?php echo esc_attr( $video_url ); ?>" class="large-text">
          <p class="description"><?php esc_html_e( 'Leave blank to use the Featured Image instead.', 'royal-concrete' ); ?></p>
        </td>
      </tr>
    </table>
    <?php
}

function royal_concrete_save_project_meta( $post_id ) {
    if ( ! isset( $_POST['rc_project_meta_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['rc_project_meta_nonce'], 'rc_project_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['rc_project_category'] ) ) {
        update_post_meta( $post_id, '_rc_project_category', sanitize_text_field( $_POST['rc_project_category'] ) );
    }
    if ( isset( $_POST['rc_project_video_url'] ) ) {
        update_post_meta( $post_id, '_rc_project_video_url', esc_url_raw( $_POST['rc_project_video_url'] ) );
    }
}
add_action( 'save_post_rc_project', 'royal_concrete_save_project_meta' );

/* ─────────────────────────────────────────────
   8. CUSTOM WALKERS — flat nav
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
   8. THEME CUSTOMIZER
───────────────────────────────────────────── */
function royal_concrete_customize_register( $wp_customize ) {

    /* ══ Brand Colors ══ */
    $wp_customize->add_section( 'royal_brand_section', [
        'title'    => __( 'Brand Colors', 'royal-concrete' ),
        'priority' => 20,
    ] );
    $wp_customize->add_setting( 'royal_accent_color', [
        'default'           => '#FFB800',
        'sanitize_callback' => 'sanitize_hex_color',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'royal_accent_color', [
        'label'   => __( 'Accent Color', 'royal-concrete' ),
        'section' => 'royal_brand_section',
    ] ) );

    /* ══ Contact Details ══ */
    $wp_customize->add_panel( 'royal_contact_panel', [
        'title'    => __( 'Contact Details', 'royal-concrete' ),
        'priority' => 30,
    ] );
    $wp_customize->add_section( 'royal_contact_section', [
        'title'    => __( 'Contact Details', 'royal-concrete' ),
        'panel'    => 'royal_contact_panel',
        'priority' => 10,
    ] );
    $contact_fields = [
        'royal_phone'     => [ 'Phone Number (display)',     '437-255-7770',               'text' ],
        'royal_phone_raw' => [ 'Phone (digits only, for href)', '4372557770',              'text' ],
        'royal_email'     => [ 'Email Address',              'royalconcrete0001@gmail.com', 'text' ],
        'royal_instagram' => [ 'Instagram Handle',           '@royal_concrete_cutting',     'text' ],
        'royal_cta_name'  => [ 'CTA / Founder Name',         'SAHIL',                       'text' ],
        'royal_facebook_url' => [ 'Facebook URL',            '',                            'url'  ],
        'royal_linkedin_url' => [ 'LinkedIn URL',            '',                            'url'  ],
    ];
    foreach ( $contact_fields as $id => $data ) {
        $san = ( $data[2] === 'url' ) ? 'esc_url_raw' : 'sanitize_text_field';
        $wp_customize->add_setting( $id, [ 'default' => $data[1], 'sanitize_callback' => $san ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $data[0], 'royal-concrete' ),
            'section' => 'royal_contact_section',
            'type'    => $data[2],
        ] );
    }

    /* ══ Hero Section ══ */
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
        'label'   => __( 'Headline (HTML allowed)', 'royal-concrete' ),
        'section' => 'royal_hero_section',
        'type'    => 'textarea',
    ] );
    $wp_customize->add_setting( 'royal_hero_subcopy', [
        'default'           => 'Commercial & Residential concrete specialists serving Toronto & the GTA. Built on precision, powered by diamond blades.',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'royal_hero_subcopy', [
        'label'   => __( 'Sub-copy', 'royal-concrete' ),
        'section' => 'royal_hero_section',
        'type'    => 'textarea',
    ] );
    $wp_customize->add_setting( 'royal_hero_tagline', [
        'default'           => '"If you can dream it, we can build it."',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'royal_hero_tagline', [
        'label'   => __( 'Tagline / Quote', 'royal-concrete' ),
        'section' => 'royal_hero_section',
        'type'    => 'text',
    ] );
    $badge_defaults = [ 1 => 'FULLY INSURED', 2 => 'COMMERCIAL', 3 => 'RESIDENTIAL', 4 => 'FAST RESPONSE' ];
    foreach ( $badge_defaults as $i => $default ) {
        $wp_customize->add_setting( "royal_hero_badge_{$i}", [ 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "royal_hero_badge_{$i}", [
            'label'   => sprintf( __( 'Trust Badge %d', 'royal-concrete' ), $i ),
            'section' => 'royal_hero_section',
            'type'    => 'text',
        ] );
    }

    /* ══ Stats Bar ══ */
    $wp_customize->add_section( 'royal_stats_section', [
        'title'    => __( 'Stats Bar', 'royal-concrete' ),
        'priority' => 50,
    ] );
    $stats_defaults = [
        1 => [ '500', '+', 'JOBS DONE' ],
        2 => [ '10',  '+', 'YRS EXP'  ],
        3 => [ '100', '%', 'SAFETY'   ],
    ];
    foreach ( $stats_defaults as $i => $s ) {
        foreach ( [
            [ 'value',  $s[0], 'Number'           ],
            [ 'suffix', $s[1], 'Suffix (+, %, …)' ],
            [ 'label',  $s[2], 'Label'             ],
        ] as $f ) {
            $wp_customize->add_setting( "royal_stat{$i}_{$f[0]}", [ 'default' => $f[1], 'sanitize_callback' => 'sanitize_text_field' ] );
            $wp_customize->add_control( "royal_stat{$i}_{$f[0]}", [
                'label'   => sprintf( __( 'Stat %d — %s', 'royal-concrete' ), $i, $f[2] ),
                'section' => 'royal_stats_section',
                'type'    => 'text',
            ] );
        }
    }

    /* ══ About Section ══ */
    $wp_customize->add_section( 'royal_about_section', [
        'title'    => __( 'About Section', 'royal-concrete' ),
        'priority' => 60,
    ] );
    $about_fields = [
        'royal_about_headline'  => [ 'Headline (HTML allowed)',  'BUILT ON STRENGTH.<br>DRIVEN BY PRECISION.',                                                                                                                                                                'textarea', 'wp_kses_post'          ],
        'royal_about_para1'     => [ 'Paragraph 1',              'Royal Concrete Cutting & Coring Inc. tackles the heavy, structural concrete work that other contractors walk away from. We specialize in precision wall cutting, legal basement entrances, and full egress window systems.', 'textarea', 'sanitize_text_field' ],
        'royal_about_para2'     => [ 'Paragraph 2 (HTML allowed)', 'Founded by <strong class="text-white">Sahil</strong>, we bring industrial-grade equipment and an uncompromising work ethic to every job—whether it\'s a massive commercial core drilling project or a residential basement upgrade in the GTA.', 'textarea', 'wp_kses_post' ],
        'royal_about_video_url' => [ 'About Video URL (.mp4)',   'https://www.ieltsbid.in/wp-content/uploads/2026/05/motion_2.0-fast_Ultra_realistic_cinematic_construction_video_in_Canada_showing_professional_inst-0.mp4', 'url', 'esc_url_raw' ],
        'royal_about_cta_text'  => [ 'CTA Button Text',          'CONTACT SAHIL DIRECTLY',                                                                                                                                                                                    'text',     'sanitize_text_field' ],
    ];
    foreach ( $about_fields as $id => $f ) {
        $wp_customize->add_setting( $id, [ 'default' => $f[1], 'sanitize_callback' => $f[3] ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $f[0], 'royal-concrete' ),
            'section' => 'royal_about_section',
            'type'    => $f[2],
        ] );
    }

    /* ══ Services ══ */
    $wp_customize->add_section( 'royal_services_section', [
        'title'    => __( 'Services', 'royal-concrete' ),
        'priority' => 70,
    ] );
    $service_defaults = [
        1 => [ 'EGRESS WINDOWS',           'Code-compliant emergency exit windows. We handle the digging, concrete cutting, well installation, and final fitting.' ],
        2 => [ 'LEGAL BASEMENT ENTRANCES', 'Unlock rental income potential. Complete structural side-entrance cutting and permit-ready installations.' ],
        3 => [ 'WINDOW ENLARGEMENT',       'Resize existing concrete window bucks for modern, larger windows. Clean diamond cuts with zero structural compromise.' ],
        4 => [ 'SIDE DOOR CUTTING',        'Adding new access points. Professional concrete cutting, framing prep, and waterproofing to code.' ],
        5 => [ 'WALL CUTTING',             'Precision structural and non-structural wall cuts for renovations, utility pass-throughs, and custom openings.' ],
        6 => [ 'ALL CONCRETE WORK',        "Core drilling, slab cutting, trenching, and demolition prep. If it's concrete, our blades will cut it." ],
    ];
    foreach ( $service_defaults as $i => $svc ) {
        $wp_customize->add_setting( "royal_service{$i}_title", [ 'default' => $svc[0], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "royal_service{$i}_title", [
            'label'   => sprintf( __( 'Service %d — Title', 'royal-concrete' ), $i ),
            'section' => 'royal_services_section',
            'type'    => 'text',
        ] );
        $wp_customize->add_setting( "royal_service{$i}_desc", [ 'default' => $svc[1], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "royal_service{$i}_desc", [
            'label'   => sprintf( __( 'Service %d — Description', 'royal-concrete' ), $i ),
            'section' => 'royal_services_section',
            'type'    => 'textarea',
        ] );
        $wp_customize->add_setting( "royal_service{$i}_image", [ 'default' => '', 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "royal_service{$i}_image", [
            'label'   => sprintf( __( 'Service %d — Image (optional)', 'royal-concrete' ), $i ),
            'section' => 'royal_services_section',
        ] ) );
    }

    /* ══ Egress Section ══ */
    $wp_customize->add_section( 'royal_egress_section', [
        'title'    => __( 'Egress Section', 'royal-concrete' ),
        'priority' => 80,
    ] );
    $fact_defaults = [
        1 => 'It takes <span class="text-primary-container font-bold">less than 1 minute</span> for a Christmas tree to set an entire room on fire.',
        2 => 'From 2016-2018, an average of <span class="text-primary-container font-bold">160 house fires</span> started from Christmas trees each year.',
        3 => 'These fires caused an average of <span class="text-primary-container font-bold">2 deaths, 14 injuries, and $10M</span> in direct property damage per year.',
        4 => 'Having an Egress Window System gives your family <span class="text-primary-container font-bold">another emergency exit</span> when seconds count.',
    ];
    foreach ( $fact_defaults as $i => $default ) {
        $wp_customize->add_setting( "royal_egress_fact{$i}", [ 'default' => $default, 'sanitize_callback' => 'wp_kses_post' ] );
        $wp_customize->add_control( "royal_egress_fact{$i}", [
            'label'   => sprintf( __( 'Safety Fact %d (HTML allowed)', 'royal-concrete' ), $i ),
            'section' => 'royal_egress_section',
            'type'    => 'textarea',
        ] );
    }
    $benefit_defaults = [
        1 => 'GREAT FOR NATURAL LIGHT',
        2 => 'CREATES MORE VENTILATION',
        3 => 'INCREASES TOTAL HOME VALUE',
        4 => 'ACCESS FOR FIRST RESPONDERS',
        5 => 'REQUIRED FOR LEGAL BEDROOMS',
    ];
    foreach ( $benefit_defaults as $i => $default ) {
        $wp_customize->add_setting( "royal_egress_benefit{$i}", [ 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "royal_egress_benefit{$i}", [
            'label'   => sprintf( __( 'Egress Benefit %d', 'royal-concrete' ), $i ),
            'section' => 'royal_egress_section',
            'type'    => 'text',
        ] );
    }

    /* ══ Quote / Contact Section ══ */
    $wp_customize->add_section( 'royal_quote_section', [
        'title'    => __( 'Quote / Contact Section', 'royal-concrete' ),
        'priority' => 90,
    ] );
    $wp_customize->add_setting( 'royal_quote_headline', [
        'default'           => 'READY TO<br>BREAK GROUND?',
        'sanitize_callback' => 'wp_kses_post',
    ] );
    $wp_customize->add_control( 'royal_quote_headline', [
        'label'   => __( 'Section Headline (HTML allowed)', 'royal-concrete' ),
        'section' => 'royal_quote_section',
        'type'    => 'textarea',
    ] );
    $wp_customize->add_setting( 'royal_quote_intro', [
        'default'           => 'Reach out to Sahil today. We provide fast, free, no-nonsense estimates for all commercial and residential jobs.',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'royal_quote_intro', [
        'label'   => __( 'Contact Intro Text', 'royal-concrete' ),
        'section' => 'royal_quote_section',
        'type'    => 'textarea',
    ] );

    /* ══ Footer ══ */
    $wp_customize->add_section( 'royal_footer_section', [
        'title'    => __( 'Footer', 'royal-concrete' ),
        'priority' => 100,
    ] );
    $wp_customize->add_setting( 'royal_footer_tagline', [
        'default'           => 'CUTTING & CORING INC.',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'royal_footer_tagline', [
        'label'   => __( 'Footer Tagline', 'royal-concrete' ),
        'section' => 'royal_footer_section',
        'type'    => 'text',
    ] );
}
add_action( 'customize_register', 'royal_concrete_customize_register' );

/* ─────────────────────────────────────────────
   9. HELPER — get theme mod with fallback
───────────────────────────────────────────── */
function rc_mod( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

/* ─────────────────────────────────────────────
   10. INCLUDES
───────────────────────────────────────────── */
require get_template_directory() . '/inc/form-handler.php';
