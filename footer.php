<?php
$phone_raw = rc_mod( 'royal_phone_raw', '4372557770' );
$phone     = rc_mod( 'royal_phone', '437-255-7770' );
$cta_name  = rc_mod( 'royal_cta_name', 'SAHIL' );
?>

<!-- ══════════════════════════════
     FOOTER
══════════════════════════════ -->
<footer class="bg-black py-12 border-t-8 border-primary-container">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

    <!-- Brand -->
    <div class="flex flex-col gap-2 items-center md:items-start">
      <span class="font-headline-md text-headline-md text-primary-container uppercase">ROYAL CONCRETE</span>
      <span class="font-label-md text-label-md text-surface-variant uppercase tracking-widest text-[10px]">CUTTING &amp; CORING INC.</span>
    </div>

    <!-- Desktop links -->
    <div class="footer-links-row flex flex-col items-start md:items-end gap-6">
      <div class="flex flex-wrap gap-6">
        <a class="text-on-surface-variant font-label-md text-label-md hover:text-primary-container hover:underline transition-all" href="#about">ABOUT</a>
        <a class="text-on-surface-variant font-label-md text-label-md hover:text-primary-container hover:underline transition-all" href="#services">SERVICES</a>
        <a class="text-on-surface-variant font-label-md text-label-md hover:text-primary-container hover:underline transition-all" href="#egress">EGRESS INFO</a>
        <a class="text-on-surface-variant font-label-md text-label-md hover:text-primary-container hover:underline transition-all" href="#quote">CONTACT</a>
      </div>
      <div class="font-body-md text-body-md text-surface-variant text-xs">
        &copy; <?php echo date( 'Y' ); ?> ROYAL CONCRETE CUTTING &amp; CORING INC.
      </div>
    </div>

    <!-- Mobile call button -->
    <div class="footer-call-row hidden items-center justify-center mt-4">
      <a href="tel:<?php echo esc_attr( $phone_raw ); ?>"
         class="bg-primary-container text-black font-headline-md text-[20px] px-8 py-3 uppercase text-center w-full flex items-center justify-center gap-2">
        <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">phone</span>
        CALL: <?php echo esc_html( $phone ); ?>
      </a>
    </div>

    <!-- Mobile copyright -->
    <div class="font-body-md text-body-md text-surface-variant text-xs text-center md:hidden mt-4">
      &copy; <?php echo date( 'Y' ); ?> ROYAL CONCRETE CUTTING &amp; CORING INC.
    </div>

  </div>

  <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 mt-12 border-t border-surface-variant pt-8">
    <?php dynamic_sidebar( 'footer-1' ); ?>
  </div>
  <?php endif; ?>
</footer>

<!-- Mobile sticky CTA -->
<div class="mobile-sticky-cta">
  <a href="tel:<?php echo esc_attr( $phone_raw ); ?>">
    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1; font-size:20px;">phone</span>
    CALL <?php echo esc_html( strtoupper( $cta_name ) ); ?>: <?php echo esc_html( $phone ); ?>
  </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
