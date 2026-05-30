<?php get_header(); ?>

<main class="pt-28 min-h-screen bg-background flex items-center justify-center">
  <div class="text-center px-4 py-24">
    <div class="w-full h-3 hazard-stripe mb-12"></div>
    <span class="font-display-lg text-[120px] md:text-[200px] text-primary-container leading-none block mb-4">404</span>
    <h1 class="font-headline-lg text-headline-lg uppercase text-on-surface mb-6">PAGE NOT FOUND</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-md mx-auto">
      Looks like this page got cut. Let's get you back on solid ground.
    </p>
    <a class="inline-block bg-primary-container text-black font-headline-md text-headline-md px-8 py-3 uppercase hover:bg-surface-tint transition-colors shadow-[4px_4px_0px_0px_#333333] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px]"
       href="<?php echo esc_url( home_url( '/' ) ); ?>">BACK TO HOME</a>
    <div class="w-full h-3 hazard-stripe mt-12"></div>
  </div>
</main>

<?php get_footer(); ?>
