<?php get_header(); ?>

<main class="pt-28 min-h-screen bg-background">
  <div class="max-w-[900px] mx-auto px-4 md:px-8 py-16">
    <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-[2px] bg-primary-container"></div>
        <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">
          <?php echo get_the_date(); ?>
        </span>
      </div>

      <h1 class="font-headline-lg text-headline-lg uppercase mb-8 leading-tight text-on-surface">
        <?php the_title(); ?>
      </h1>

      <?php if ( has_post_thumbnail() ) : ?>
      <div class="mb-10 border-2 border-surface-variant">
        <?php the_post_thumbnail( 'royal-hero', [ 'class' => 'w-full h-auto' ] ); ?>
      </div>
      <?php endif; ?>

      <div class="font-body-lg text-body-lg text-on-surface-variant space-y-6 prose max-w-none
                  prose-headings:font-headline-md prose-headings:text-on-surface prose-headings:uppercase
                  prose-a:text-primary-container prose-strong:text-on-surface">
        <?php the_content(); ?>
      </div>

      <?php
      wp_link_pages( [
        'before' => '<nav class="mt-8 font-label-md text-label-md text-primary-container uppercase">',
        'after'  => '</nav>',
      ] );
      ?>
    </article>

    <?php if ( comments_open() || get_comments_number() ) : ?>
    <div class="mt-16 border-t border-surface-variant pt-16">
      <?php comments_template(); ?>
    </div>
    <?php endif; ?>

    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
