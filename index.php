<?php get_header(); ?>

<main class="pt-28 min-h-screen bg-background">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 py-16">

    <?php if ( have_posts() ) : ?>
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-[2px] bg-primary-container"></div>
        <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">
          <?php the_archive_title(); ?>
        </span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-surface-container border border-surface-variant p-8 flex flex-col' ); ?>>
          <?php if ( has_post_thumbnail() ) : ?>
          <div class="mb-4 overflow-hidden">
            <?php the_post_thumbnail( 'royal-thumb', [ 'class' => 'w-full h-48 object-cover' ] ); ?>
          </div>
          <?php endif; ?>

          <span class="font-label-md text-label-md text-primary-container uppercase text-xs mb-2">
            <?php echo get_the_date(); ?>
          </span>
          <h2 class="font-headline-md text-headline-md uppercase mb-4 text-on-surface leading-tight">
            <a class="hover:text-primary-container transition-colors" href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>
          <div class="font-body-md text-body-md text-on-surface-variant flex-1 mb-6">
            <?php the_excerpt(); ?>
          </div>
          <a class="inline-block bg-primary-container text-black font-label-md text-label-md px-6 py-3 uppercase hover:bg-surface-tint transition-colors self-start"
             href="<?php the_permalink(); ?>">READ MORE</a>
        </article>
        <?php endwhile; ?>
      </div>

      <div class="mt-16 flex justify-center gap-4">
        <?php
        the_posts_pagination( [
          'prev_text' => '← PREV',
          'next_text' => 'NEXT →',
          'class'     => 'font-label-md text-label-md text-primary-container uppercase',
        ] );
        ?>
      </div>

    <?php else : ?>
      <p class="font-body-lg text-body-lg text-on-surface-variant">No posts found.</p>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
