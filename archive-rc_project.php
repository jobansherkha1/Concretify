<?php
/**
 * Archive template for Projects (Our Work).
 */
get_header();
?>

<!-- Page header -->
<div class="pt-32 pb-16 bg-surface-container-low border-b-8 border-primary-container">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16">
    <div class="flex items-center gap-2 mb-4">
      <div class="w-8 h-[2px] bg-primary-container"></div>
      <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">PORTFOLIO</span>
    </div>
    <h1 class="font-headline-lg text-headline-lg uppercase text-on-surface">OUR WORK</h1>
  </div>
</div>

<div class="w-full h-3 hazard-stripe"></div>

<!-- Filter tabs -->
<div class="bg-surface border-b border-surface-variant sticky top-[68px] z-40">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 flex gap-6 py-4">
    <?php
    $current_filter = isset( $_GET['category'] ) ? sanitize_text_field( $_GET['category'] ) : 'all';
    $filters = [ 'all' => 'ALL PROJECTS', 'residential' => 'RESIDENTIAL', 'commercial' => 'COMMERCIAL' ];
    foreach ( $filters as $val => $label ) :
      $active = ( $current_filter === $val ) ? 'text-primary-container border-b-2 border-primary-container' : 'text-on-surface-variant hover:text-on-surface';
    ?>
    <a href="<?php echo esc_url( $val === 'all' ? get_post_type_archive_link( 'rc_project' ) : add_query_arg( 'category', $val, get_post_type_archive_link( 'rc_project' ) ) ); ?>"
       class="font-label-md text-label-md uppercase pb-1 transition-colors <?php echo esc_attr( $active ); ?>">
      <?php echo esc_html( $label ); ?>
    </a>
    <?php endforeach; ?>
  </div>
</div>

<!-- Projects grid -->
<section class="py-16 md:py-24 bg-surface">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16">
    <?php
    $args = [
        'post_type'      => 'rc_project',
        'posts_per_page' => 12,
        'post_status'    => 'publish',
        'paged'          => get_query_var( 'paged', 1 ),
    ];
    if ( $current_filter !== 'all' ) {
        $args['meta_query'] = [ [ 'key' => '_rc_project_category', 'value' => $current_filter, 'compare' => '=' ] ];
    }
    $projects = new WP_Query( $args );
    ?>

    <?php if ( $projects->have_posts() ) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while ( $projects->have_posts() ) : $projects->the_post();
        $video_url = get_post_meta( get_the_ID(), '_rc_project_video_url', true );
        $category  = get_post_meta( get_the_ID(), '_rc_project_category', true ) ?: 'residential';
      ?>
      <div class="group bg-surface-container border border-surface-variant overflow-hidden flex flex-col hover:border-primary-container transition-colors duration-300">

        <!-- Media -->
        <div class="relative aspect-video overflow-hidden shrink-0 bg-surface-container-high">
          <?php if ( $video_url ) : ?>
          <video class="w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
          </video>
          <?php elseif ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'royal-service', [
            'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105',
            'alt'   => esc_attr( get_the_title() ),
          ] ); ?>
          <?php else : ?>
          <div class="w-full h-full flex items-center justify-center">
            <span class="material-symbols-outlined text-on-surface-variant" style="font-size:64px;">construction</span>
          </div>
          <?php endif; ?>
          <!-- Category tag -->
          <div class="absolute top-3 left-3">
            <span class="bg-primary-container text-black font-label-md text-label-md text-xs px-3 py-1 uppercase font-bold">
              <?php echo esc_html( ucfirst( $category ) ); ?>
            </span>
          </div>
        </div>

        <!-- Content -->
        <div class="p-6 flex-1">
          <h2 class="font-headline-md text-[20px] uppercase text-on-surface mb-3 group-hover:text-primary-container transition-colors">
            <?php the_title(); ?>
          </h2>
          <?php if ( has_excerpt() ) : ?>
          <p class="font-body-md text-body-md text-on-surface-variant text-sm">
            <?php the_excerpt(); ?>
          </p>
          <?php endif; ?>
        </div>

      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <!-- Pagination -->
    <?php if ( $projects->max_num_pages > 1 ) : ?>
    <div class="flex justify-center gap-4 mt-16">
      <?php
      echo paginate_links( [
          'total'   => $projects->max_num_pages,
          'current' => get_query_var( 'paged', 1 ),
          'before_page_number' => '',
          'prev_text' => '← PREV',
          'next_text' => 'NEXT →',
      ] );
      ?>
    </div>
    <?php endif; ?>

    <?php else : ?>
    <div class="text-center py-32">
      <span class="material-symbols-outlined text-on-surface-variant mb-4" style="font-size:80px;">construction</span>
      <h2 class="font-headline-md text-headline-md uppercase text-on-surface-variant">No Projects Yet</h2>
      <p class="font-body-lg text-body-lg text-on-surface-variant mt-4">Add your first project from <strong>WP Admin → Projects → Add New</strong>.</p>
    </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
