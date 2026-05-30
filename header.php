<!DOCTYPE html>
<html class="dark" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-background text-on-background font-body-md antialiased overflow-x-hidden selection:bg-primary-container selection:text-black' ); ?>>
<?php wp_body_open(); ?>

<!-- ══════════════════════════════
     NAVIGATION
══════════════════════════════ -->
<nav class="flex justify-between items-center px-4 md:px-16 py-4 w-full bg-background/95 backdrop-blur-sm z-50 fixed top-0 border-b-2 border-primary dark:border-primary-container">

  <!-- Logo -->
  <div class="flex items-center gap-2 overflow-hidden pr-2">
    <?php if ( has_custom_logo() ) : ?>
      <div class="w-16 md:w-20 h-12 md:h-16 flex items-center"><?php the_custom_logo(); ?></div>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2">
        <span class="font-headline-md text-headline-md text-primary-container uppercase leading-none">ROYAL</span>
        <span class="font-label-md text-label-md text-on-surface uppercase tracking-widest text-[10px] hidden sm:block">CONCRETE</span>
      </a>
    <?php endif; ?>
  </div>

  <!-- Desktop nav -->
  <div class="hidden md:flex gap-8 items-center">
    <?php
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Royal_Concrete_Walker(),
            'depth'          => 1,
        ] );
    } else {
        // Fallback anchor links
        $links = [
            '#about'    => 'ABOUT',
            '#services' => 'SERVICES',
            '#egress'   => 'EGRESS INFO',
            '#quote'    => 'CONTACT',
        ];
        foreach ( $links as $href => $label ) {
            printf(
                '<a class="text-on-surface font-label-md text-label-md hover:text-primary transition-colors duration-200" href="%s">%s</a>',
                esc_attr( $href ),
                esc_html( $label )
            );
        }
    }
    ?>
  </div>

  <!-- Desktop CTA -->
  <?php
  $phone_raw = rc_mod( 'royal_phone_raw', '4372557770' );
  $phone     = rc_mod( 'royal_phone', '437-255-7770' );
  ?>
  <a class="hidden md:inline-block bg-primary-container text-black font-headline-md text-headline-md px-6 py-2 uppercase hover:bg-surface-tint transition-colors border-2 border-transparent hover:border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none translate-x-0 translate-y-0 hover:translate-x-[4px] hover:translate-y-[4px]"
     href="tel:<?php echo esc_attr( $phone_raw ); ?>">CALL NOW</a>

  <!-- Hamburger -->
  <button class="hamburger shrink-0" id="hamburger" aria-label="Toggle Menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobile-menu">
  <?php
  if ( has_nav_menu( 'mobile' ) ) {
      wp_nav_menu( [
          'theme_location' => 'mobile',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'walker'         => new Royal_Concrete_Mobile_Walker(),
          'depth'          => 1,
      ] );
  } else {
      $links = [
          '#about'    => 'ABOUT',
          '#services' => 'SERVICES',
          '#egress'   => 'EGRESS INFO',
          '#quote'    => 'CONTACT',
      ];
      foreach ( $links as $href => $label ) {
          printf( '<a href="%s" class="mobile-nav-link">%s</a>', esc_attr( $href ), esc_html( $label ) );
      }
  }
  ?>
  <a href="tel:<?php echo esc_attr( $phone_raw ); ?>" class="mobile-menu-call">📞 CALL: <?php echo esc_html( $phone ); ?></a>
</div>
