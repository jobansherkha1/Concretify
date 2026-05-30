<?php
/**
 * Template Name: Homepage
 * The front page template for Royal Concrete.
 */

get_header();

/* ─── Contact ─── */
$phone_raw = rc_mod( 'royal_phone_raw', '4372557770' );
$phone     = rc_mod( 'royal_phone',     '437-255-7770' );
$email     = rc_mod( 'royal_email',     'royalconcrete0001@gmail.com' );
$instagram = rc_mod( 'royal_instagram', '@royal_concrete_cutting' );

/* ─── Hero ─── */
$hero_bg      = rc_mod( 'royal_hero_bg',       'https://www.ieltsbid.in/wp-content/uploads/2026/05/construction-worker.jpg' );
$hero_hl      = rc_mod( 'royal_hero_headline', 'WE <span class="text-primary-container">CUT</span><br><span class="text-outline-white">THROUGH</span><br>ANYTHING' );
$hero_subcopy = rc_mod( 'royal_hero_subcopy',  'Commercial & Residential concrete specialists serving Toronto & the GTA. Built on precision, powered by diamond blades.' );
$hero_tagline = rc_mod( 'royal_hero_tagline',  '"If you can dream it, we can build it."' );
$hero_badges  = [
    rc_mod( 'royal_hero_badge_1', 'FULLY INSURED' ),
    rc_mod( 'royal_hero_badge_2', 'COMMERCIAL' ),
    rc_mod( 'royal_hero_badge_3', 'RESIDENTIAL' ),
    rc_mod( 'royal_hero_badge_4', 'FAST RESPONSE' ),
];

/* ─── Stats ─── */
$stats = [
    [ rc_mod( 'royal_stat1_value', '500' ), rc_mod( 'royal_stat1_suffix', '+' ), rc_mod( 'royal_stat1_label', 'JOBS DONE' ) ],
    [ rc_mod( 'royal_stat2_value', '10'  ), rc_mod( 'royal_stat2_suffix', '+' ), rc_mod( 'royal_stat2_label', 'YRS EXP'  ) ],
    [ rc_mod( 'royal_stat3_value', '100' ), rc_mod( 'royal_stat3_suffix', '%' ), rc_mod( 'royal_stat3_label', 'SAFETY'   ) ],
];

/* ─── About ─── */
$about_headline = rc_mod( 'royal_about_headline', 'BUILT ON STRENGTH.<br>DRIVEN BY PRECISION.' );
$about_para1    = rc_mod( 'royal_about_para1',    'Royal Concrete Cutting & Coring Inc. tackles the heavy, structural concrete work that other contractors walk away from. We specialize in precision wall cutting, legal basement entrances, and full egress window systems.' );
$about_para2    = rc_mod( 'royal_about_para2',    'Founded by <strong class="text-white">Sahil</strong>, we bring industrial-grade equipment and an uncompromising work ethic to every job—whether it\'s a massive commercial core drilling project or a residential basement upgrade in the GTA.' );
$about_video    = rc_mod( 'royal_about_video_url','https://www.ieltsbid.in/wp-content/uploads/2026/05/motion_2.0-fast_Ultra_realistic_cinematic_construction_video_in_Canada_showing_professional_inst-0.mp4' );
$about_cta      = rc_mod( 'royal_about_cta_text', 'CONTACT SAHIL DIRECTLY' );

/* ─── Services ─── */
$service_defaults = [
    [ 'EGRESS WINDOWS',           'Code-compliant emergency exit windows. We handle the digging, concrete cutting, well installation, and final fitting.',   false ],
    [ 'LEGAL BASEMENT ENTRANCES', 'Unlock rental income potential. Complete structural side-entrance cutting and permit-ready installations.',               true  ],
    [ 'WINDOW ENLARGEMENT',       'Resize existing concrete window bucks for modern, larger windows. Clean diamond cuts with zero structural compromise.',   false ],
    [ 'SIDE DOOR CUTTING',        'Adding new access points. Professional concrete cutting, framing prep, and waterproofing to code.',                       false ],
    [ 'WALL CUTTING',             'Precision structural and non-structural wall cuts for renovations, utility pass-throughs, and custom openings.',          true  ],
    [ 'ALL CONCRETE WORK',        "Core drilling, slab cutting, trenching, and demolition prep. If it's concrete, our blades will cut it.",                  false ],
];
$services = [];
foreach ( $service_defaults as $i => $svc ) {
    $n = $i + 1;
    $services[] = [
        str_pad( $n, 2, '0', STR_PAD_LEFT ),
        rc_mod( "royal_service{$n}_title", $svc[0] ),
        rc_mod( "royal_service{$n}_desc",  $svc[1] ),
        $svc[2],
        rc_mod( "royal_service{$n}_image", '' ),
    ];
}

/* ─── Egress ─── */
$egress_facts = [
    [ 'timer',                 'on-surface-variant', rc_mod( 'royal_egress_fact1', 'It takes <span class="text-primary-container font-bold">less than 1 minute</span> for a Christmas tree to set an entire room on fire.' ) ],
    [ 'local_fire_department', 'on-surface-variant', rc_mod( 'royal_egress_fact2', 'From 2016-2018, an average of <span class="text-primary-container font-bold">160 house fires</span> started from Christmas trees each year.' ) ],
    [ 'warning',               'primary-container',  rc_mod( 'royal_egress_fact3', 'These fires caused an average of <span class="text-primary-container font-bold">2 deaths, 14 injuries, and $10M</span> in direct property damage per year.' ) ],
    [ 'sensor_door',           'primary-container',  rc_mod( 'royal_egress_fact4', 'Having an Egress Window System gives your family <span class="text-primary-container font-bold">another emergency exit</span> when seconds count.' ) ],
];
$egress_benefits = [
    rc_mod( 'royal_egress_benefit1', 'GREAT FOR NATURAL LIGHT' ),
    rc_mod( 'royal_egress_benefit2', 'CREATES MORE VENTILATION' ),
    rc_mod( 'royal_egress_benefit3', 'INCREASES TOTAL HOME VALUE' ),
    rc_mod( 'royal_egress_benefit4', 'ACCESS FOR FIRST RESPONDERS' ),
    rc_mod( 'royal_egress_benefit5', 'REQUIRED FOR LEGAL BEDROOMS' ),
];

/* ─── Quote / Contact ─── */
$quote_headline = rc_mod( 'royal_quote_headline', 'READY TO<br>BREAK GROUND?' );
$quote_intro    = rc_mod( 'royal_quote_intro',    'Reach out to Sahil today. We provide fast, free, no-nonsense estimates for all commercial and residential jobs.' );

/* ─── Service Area ─── */
$service_area_intro = rc_mod( 'royal_service_area_intro', 'Serving Toronto and the Greater Toronto Area with fast turnaround, competitive pricing, and industrial-grade concrete cutting.' );
$service_areas = [
    rc_mod( 'royal_area_1',  'TORONTO'       ),
    rc_mod( 'royal_area_2',  'MISSISSAUGA'   ),
    rc_mod( 'royal_area_3',  'BRAMPTON'      ),
    rc_mod( 'royal_area_4',  'SCARBOROUGH'   ),
    rc_mod( 'royal_area_5',  'NORTH YORK'    ),
    rc_mod( 'royal_area_6',  'ETOBICOKE'     ),
    rc_mod( 'royal_area_7',  'OAKVILLE'      ),
    rc_mod( 'royal_area_8',  'RICHMOND HILL' ),
    rc_mod( 'royal_area_9',  'MARKHAM'       ),
    rc_mod( 'royal_area_10', 'VAUGHAN'       ),
];

/* ─── Testimonials ─── */
$testimonials = [
    [
        'quote' => rc_mod( 'royal_testimonial1_quote', 'Sahil and his team did an incredible job cutting our egress window. Super clean work, on time, and exactly what we wanted. Highly recommend!' ),
        'name'  => rc_mod( 'royal_testimonial1_name',  'MIKE T.' ),
        'job'   => rc_mod( 'royal_testimonial1_job',   'EGRESS WINDOW — TORONTO' ),
        'stars' => rc_mod( 'royal_testimonial1_stars', '5' ),
    ],
    [
        'quote' => rc_mod( 'royal_testimonial2_quote', 'We needed a legal basement entrance cut and Royal Concrete delivered. Professional crew, permit-ready work, and a fair price. Will call again.' ),
        'name'  => rc_mod( 'royal_testimonial2_name',  'SARAH K.' ),
        'job'   => rc_mod( 'royal_testimonial2_job',   'LEGAL BASEMENT — MISSISSAUGA' ),
        'stars' => rc_mod( 'royal_testimonial2_stars', '5' ),
    ],
    [
        'quote' => rc_mod( 'royal_testimonial3_quote', 'Fast response, competitive quote, and the wall cutting was flawless. These guys know their stuff and take pride in the work.' ),
        'name'  => rc_mod( 'royal_testimonial3_name',  'DAVID R.' ),
        'job'   => rc_mod( 'royal_testimonial3_job',   'WALL CUTTING — BRAMPTON' ),
        'stars' => rc_mod( 'royal_testimonial3_stars', '5' ),
    ],
];
?>

<!-- ══════════════════════════════
     HERO
══════════════════════════════ -->
<section id="hero" class="relative pt-24 md:pt-32 pb-16 md:pb-32 min-h-[600px] md:min-h-[921px] flex items-center border-b-[12px] border-black">

  <div class="absolute inset-0 z-0">
    <div id="hero-bg-shape" class="absolute -right-[32%] top-0 w-[80%] h-full origin-top-right transform skew-x-[-15deg] border-l-[24px] border-surface-variant overflow-hidden">
      <div class="absolute inset-[-20%] w-[140%] h-[140%] transform skew-x-[15deg] bg-cover bg-center"
           style="background-image:url('<?php echo esc_url( $hero_bg ); ?>');">
        <div class="absolute inset-0 bg-black/40"></div>
      </div>
    </div>
  </div>

  <div class="max-w-[1280px] mx-auto px-4 md:px-16 w-full relative z-10 grid grid-cols-1 md:grid-cols-2 gap-6">
    <div id="hero-content" class="flex flex-col justify-center max-w-2xl">

      <!-- Label -->
      <div class="flex items-center gap-2 mb-6">
        <div class="w-8 h-[2px] bg-primary-container"></div>
        <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">ROYAL CONCRETE CUTTING &amp; CORING INC.</span>
      </div>

      <!-- Headline -->
      <h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg uppercase leading-[0.9] mb-8">
        <?php echo wp_kses_post( $hero_hl ); ?>
      </h1>

      <!-- Sub-copy -->
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-4 max-w-lg">
        <?php echo esc_html( $hero_subcopy ); ?>
      </p>
      <p class="font-body-lg text-body-lg text-primary-container font-bold mb-10 max-w-lg">
        <?php echo esc_html( $hero_tagline ); ?>
      </p>

      <!-- CTAs -->
      <div class="flex flex-wrap items-center gap-4 mb-16">
        <a class="inline-flex items-center justify-center bg-[#FFB800] text-black font-headline-md text-headline-md px-8 py-3 uppercase shadow-[4px_4px_0px_0px_#333333] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px] transition-all duration-200 border-2 border-transparent"
           href="#quote">GET A FREE QUOTE</a>
        <a class="inline-flex items-center justify-center border-2 border-primary-container text-primary-container font-headline-md text-headline-md px-8 py-3 uppercase hover:bg-primary-container hover:text-black transition-all duration-200 shadow-[4px_4px_0px_0px_#333333] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px]"
           href="#services">VIEW SERVICES</a>
      </div>

      <!-- Trust badges -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 border-t border-surface-variant pt-8">
        <?php foreach ( $hero_badges as $badge ) : ?>
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary-container text-sm">check_box</span>
          <span class="font-label-md text-label-md text-on-surface text-xs uppercase"><?php echo esc_html( $badge ); ?></span>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<!-- Hazard stripe -->
<div class="w-full h-3 hazard-stripe"></div>

<!-- ══════════════════════════════
     STATS BAR
══════════════════════════════ -->
<section id="stats-section" class="bg-primary-container text-black py-8 border-b-8 border-black">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16">
    <div class="grid grid-cols-3 gap-0 divide-x-4 divide-black">
      <?php foreach ( $stats as $i => $stat ) :
        $class = ( $i === 0 ) ? 'px-4 md:pl-0' : 'px-4 md:px-8';
      ?>
      <div class="<?php echo esc_attr( $class ); ?> flex flex-col items-start justify-center">
        <span class="font-stat-lg text-stat-lg leading-none stat-number"
              data-value="<?php echo esc_attr( $stat[0] ); ?>"
              data-suffix="<?php echo esc_attr( $stat[1] ); ?>">
          0<?php echo esc_html( $stat[1] ); ?>
        </span>
        <span class="font-label-md text-label-md uppercase font-bold tracking-widest mt-2 stat-label">
          <?php echo esc_html( $stat[2] ); ?>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══════════════════════════════
     ABOUT
══════════════════════════════ -->
<section id="about" class="py-24 md:py-32 relative overflow-hidden" style="background-color:rgb(18,20,20);">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">
    <div>
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-[2px] bg-primary-container"></div>
        <span class="font-label-md text-label-md uppercase tracking-widest text-primary-container">THE COMPANY</span>
      </div>
      <h2 class="font-headline-lg text-headline-lg uppercase mb-8 leading-[1.05] text-white">
        <?php echo wp_kses_post( $about_headline ); ?>
      </h2>
      <div class="font-body-lg text-body-lg space-y-6 mb-10 max-w-lg text-white">
        <p><?php echo esc_html( $about_para1 ); ?></p>
        <p><?php echo wp_kses_post( $about_para2 ); ?></p>
      </div>
      <a class="inline-block font-headline-md text-headline-md px-8 py-3 uppercase shadow-[4px_4px_0px_0px_rgba(13,14,15,0.5)] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px] transition-all border-2 border-transparent bg-primary-container text-black"
         href="#quote"><?php echo esc_html( $about_cta ); ?></a>
    </div>

    <!-- About video -->
    <div id="about-media" class="relative">
      <div class="absolute -inset-4 border-[#0d0e0f] translate-x-4 translate-y-4 z-0 hidden md:block"></div>
      <div class="bg-[#0d0e0f] w-full h-full relative z-10 border-2 border-[#0d0e0f] flex items-center justify-center overflow-hidden shadow-[8px_8px_0px_0px_#1A1A1A]">
        <video class="w-full h-full object-cover" autoplay muted loop playsinline>
          <source src="<?php echo esc_url( $about_video ); ?>" type="video/mp4">
        </video>
        <div class="absolute top-0 left-0 w-8 h-8 border-t-4 border-l-4 border-primary-container pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-8 h-8 border-b-4 border-r-4 border-primary-container pointer-events-none"></div>
      </div>
    </div>
  </div>
</section>

<div class="w-full h-[1px] bg-surface-variant"></div>

<!-- ══════════════════════════════
     SERVICES
══════════════════════════════ -->
<section class="py-24 md:py-32 bg-[#0d0e0f]" id="services">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 mb-10 md:mb-16">
    <div class="flex items-center gap-2 mb-4">
      <div class="w-8 h-[2px] bg-primary-container"></div>
      <span class="font-label-md text-label-md uppercase tracking-widest text-primary-container">WHAT WE DO</span>
    </div>
    <h2 class="font-headline-lg text-headline-lg uppercase text-on-surface">OUR SERVICES</h2>
  </div>

  <div class="max-w-[1280px] mx-auto px-4 md:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ( $services as $svc ) :
      // On dark section bg: "dark" (featured) cards use gold, regular cards use dark-gray
      $dark    = $svc[3];
      $img_url = $svc[4];

      if ( $dark ) {
        // Featured card — gold background
        $card_bg = $img_url
          ? 'bg-primary-container overflow-hidden flex flex-col group'
          : 'bg-primary-container p-8 relative';
        $nBg   = 'border-t-black';
        $numCl = 'text-black/40';
        $titCl = 'text-black';
        $txtCl = 'text-black/70';
        $imgNumCl = 'text-black/70';
      } else {
        // Regular card — dark gray
        $card_bg = $img_url
          ? 'bg-surface-container border border-surface-variant hover:border-primary-container transition-colors overflow-hidden flex flex-col group'
          : 'bg-surface-container border border-surface-variant hover:border-primary-container transition-colors p-8 relative';
        $nBg   = 'border-t-primary-container';
        $numCl = 'text-primary-container/50';
        $titCl = 'text-on-surface';
        $txtCl = 'text-on-surface-variant';
        $imgNumCl = 'text-white/80';
      }
    ?>
    <div class="<?php echo esc_attr( $card_bg ); ?>">

      <?php if ( $img_url ) : ?>
      <!-- Image header -->
      <div class="relative aspect-video overflow-hidden shrink-0">
        <img src="<?php echo esc_url( $img_url ); ?>"
             alt="<?php echo esc_attr( $svc[1] ); ?>"
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
        <div class="absolute inset-0 bg-black/40"></div>
        <span class="absolute top-4 right-4 font-label-md text-label-md <?php echo esc_attr( $imgNumCl ); ?> text-4xl font-bold drop-shadow-lg">
          <?php echo esc_html( $svc[0] ); ?>
        </span>
      </div>
      <!-- Content below image -->
      <div class="p-8 flex-1">
        <h3 class="font-headline-md text-headline-md <?php echo esc_attr( $titCl ); ?> uppercase mb-4"><?php echo esc_html( $svc[1] ); ?></h3>
        <p class="font-body-md text-body-md <?php echo esc_attr( $txtCl ); ?>"><?php echo esc_html( $svc[2] ); ?></p>
      </div>

      <?php else : ?>
      <!-- No-image layout -->
      <div class="absolute top-0 right-0 w-0 h-0 border-t-[30px] border-l-[30px] <?php echo esc_attr( $nBg ); ?> border-l-transparent"></div>
      <span class="font-label-md text-label-md <?php echo esc_attr( $numCl ); ?> text-4xl block mb-6 font-bold"><?php echo esc_html( $svc[0] ); ?></span>
      <h3 class="font-headline-md text-headline-md <?php echo esc_attr( $titCl ); ?> uppercase mb-4"><?php echo esc_html( $svc[1] ); ?></h3>
      <p class="font-body-md text-body-md <?php echo esc_attr( $txtCl ); ?>"><?php echo esc_html( $svc[2] ); ?></p>
      <?php endif; ?>

    </div>
    <?php endforeach; ?>
  </div>
</section>

<div class="w-full h-[1px] bg-surface-variant"></div>

<!-- ══════════════════════════════
     SERVICE AREA
══════════════════════════════ -->
<section id="service-area" class="py-24 md:py-32 bg-background">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

    <!-- Left: heading + text -->
    <div>
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-[2px] bg-primary-container"></div>
        <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">WHERE WE WORK</span>
      </div>
      <h2 class="font-headline-lg text-headline-lg uppercase mb-8 leading-tight">TORONTO<br>&amp; THE GTA</h2>
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-md">
        <?php echo esc_html( $service_area_intro ); ?>
      </p>
      <a href="#quote"
         class="inline-block bg-primary-container text-black font-headline-md text-headline-md px-8 py-3 uppercase shadow-[4px_4px_0px_0px_rgba(0,0,0,0.5)] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px] transition-all border-2 border-transparent">
        GET A FREE QUOTE
      </a>
    </div>

    <!-- Right: area grid -->
    <div class="grid grid-cols-2 gap-3">
      <?php foreach ( $service_areas as $area ) :
        if ( ! trim( $area ) ) continue;
      ?>
      <div class="flex items-center gap-3 border border-surface-variant px-4 py-3 hover:border-primary-container hover:bg-surface-container transition-all duration-200 group cursor-default">
        <span class="material-symbols-outlined text-primary-container shrink-0" style="font-size:18px;">location_on</span>
        <span class="font-label-md text-label-md text-on-surface uppercase group-hover:text-primary-container transition-colors">
          <?php echo esc_html( $area ); ?>
        </span>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<div class="w-full h-3 hazard-stripe"></div>

<!-- ══════════════════════════════
     EGRESS
══════════════════════════════ -->
<section id="egress" class="grid grid-cols-1 lg:grid-cols-2 relative">
  <div id="egress-divider" class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-2 bg-primary-container z-10"></div>

  <!-- Left col — Safety -->
  <div class="bg-background py-16 px-4 lg:px-24 flex flex-col justify-center border-b-2 lg:border-b-0 border-surface-variant">
    <div class="inline-block bg-primary-container text-black font-label-md text-label-md px-3 py-1 uppercase font-bold self-start mb-6">SAFETY PROTOCOL</div>
    <h2 class="font-headline-lg text-headline-lg uppercase mb-6 leading-tight">WHY EGRESS<br>SAVES LIVES</h2>
    <p class="font-body-lg text-body-lg text-on-surface-variant mb-10">What is Egress and how could it protect you? During the holidays, the risk of fire spikes. Here are the facts:</p>

    <div class="space-y-4">
      <?php foreach ( $egress_facts as $i => $fact ) :
        $border = ( $i === 3 ) ? 'bg-[#1A1A1A] border-2 border-primary-container' : 'bg-[#1A1A1A] border border-[#333333]';
      ?>
      <div class="<?php echo esc_attr( $border ); ?> p-4 flex items-start gap-4">
        <span class="material-symbols-outlined text-<?php echo esc_attr( $fact[1] ); ?> mt-1"><?php echo esc_html( $fact[0] ); ?></span>
        <p class="font-body-md text-body-md text-on-surface"><?php echo wp_kses_post( $fact[2] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Right col — Benefits -->
  <div class="bg-[#1A1A1A] py-16 px-4 lg:px-24 flex flex-col justify-center">
    <div class="flex items-center gap-2 mb-6">
      <div class="w-8 h-[2px] bg-primary-container"></div>
      <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">HOME IMPROVEMENT</span>
    </div>
    <h2 class="font-headline-lg text-headline-lg uppercase mb-6 leading-tight">BEYOND<br>SAFETY</h2>
    <p class="font-body-lg text-body-lg text-on-surface-variant mb-10">An egress window doesn't just protect your family—it completely transforms a dark, dingy basement into a legal, livable space.</p>

    <ul class="space-y-6 mb-12">
      <?php foreach ( $egress_benefits as $i => $benefit ) :
        $last = ( $i === count( $egress_benefits ) - 1 );
        $num  = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
      ?>
      <li class="flex items-center gap-4 <?php echo $last ? '' : 'border-b border-[#333333]'; ?> pb-4">
        <span class="font-headline-md text-headline-md text-primary-container"><?php echo esc_html( $num ); ?></span>
        <span class="font-headline-md text-[20px] uppercase text-on-surface"><?php echo esc_html( $benefit ); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>

    <a href="#quote" class="block w-full bg-primary-container text-black font-headline-md text-[24px] px-8 py-4 uppercase hover:bg-surface-tint transition-colors border-2 border-transparent text-center">
      REQUEST EGRESS ESTIMATE
    </a>
  </div>
</section>

<!-- ══════════════════════════════
     OUR WORK
══════════════════════════════ -->
<?php
$projects = new WP_Query( [
    'post_type'      => 'rc_project',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
] );
if ( $projects->have_posts() ) :
?>
<div class="w-full h-3 hazard-stripe"></div>
<section id="our-work" class="py-24 md:py-32 bg-surface-container-low">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16">

    <div class="flex items-end justify-between mb-10 md:mb-16 flex-wrap gap-4">
      <div>
        <div class="flex items-center gap-2 mb-4">
          <div class="w-8 h-[2px] bg-primary-container"></div>
          <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">PORTFOLIO</span>
        </div>
        <h2 class="font-headline-lg text-headline-lg uppercase text-on-surface">OUR WORK</h2>
      </div>
      <a href="<?php echo esc_url( get_post_type_archive_link( 'rc_project' ) ); ?>"
         class="inline-flex items-center gap-2 font-label-md text-label-md text-primary-container uppercase tracking-widest hover:underline transition-all">
        VIEW ALL PROJECTS
        <span class="material-symbols-outlined text-sm">arrow_forward</span>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while ( $projects->have_posts() ) : $projects->the_post();
        $video_url = get_post_meta( get_the_ID(), '_rc_project_video_url', true );
        $category  = get_post_meta( get_the_ID(), '_rc_project_category', true ) ?: 'residential';
        $cat_label = ucfirst( $category );
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
              <?php echo esc_html( $cat_label ); ?>
            </span>
          </div>
        </div>

        <!-- Content -->
        <div class="p-6 flex-1 flex flex-col justify-between">
          <h3 class="font-headline-md text-[20px] uppercase text-on-surface mb-3 group-hover:text-primary-container transition-colors">
            <?php the_title(); ?>
          </h3>
          <?php if ( has_excerpt() ) : ?>
          <p class="font-body-md text-body-md text-on-surface-variant text-sm line-clamp-2">
            <?php the_excerpt(); ?>
          </p>
          <?php endif; ?>
        </div>

      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

  </div>
</section>
<?php endif; ?>

<!-- ══════════════════════════════
     TESTIMONIALS
══════════════════════════════ -->
<div class="w-full h-3 hazard-stripe"></div>
<section id="testimonials" class="py-24 md:py-32 bg-surface-container-low">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16">

    <div class="flex items-center gap-2 mb-4">
      <div class="w-8 h-[2px] bg-primary-container"></div>
      <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">REVIEWS</span>
    </div>
    <h2 class="font-headline-lg text-headline-lg uppercase mb-12 md:mb-16">WHAT CLIENTS SAY</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php foreach ( $testimonials as $t ) :
        if ( ! trim( $t['quote'] ) ) continue;
        $stars = max( 1, min( 5, (int) $t['stars'] ) );
      ?>
      <div class="bg-surface-container border border-surface-variant p-8 flex flex-col relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-primary-container"></div>

        <!-- Stars -->
        <div class="flex gap-1 mb-6 ml-4">
          <?php for ( $s = 1; $s <= 5; $s++ ) : ?>
          <span class="text-xl <?php echo $s <= $stars ? 'text-primary-container' : 'text-surface-variant'; ?>">★</span>
          <?php endfor; ?>
        </div>

        <!-- Quote -->
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 ml-4 flex-1 italic">
          "<?php echo esc_html( $t['quote'] ); ?>"
        </p>

        <!-- Person -->
        <div class="border-t border-surface-variant pt-6 ml-4">
          <span class="block font-label-md text-label-md text-primary-container uppercase font-bold tracking-widest">
            <?php echo esc_html( $t['name'] ); ?>
          </span>
          <span class="block font-label-md text-label-md text-on-surface-variant uppercase text-xs mt-1">
            <?php echo esc_html( $t['job'] ); ?>
          </span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ══════════════════════════════
     QUOTE / CONTACT
══════════════════════════════ -->
<section class="py-24 md:py-32 bg-surface border-t border-surface-variant" id="quote">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- Contact info -->
    <div>
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-[2px] bg-primary-container"></div>
        <span class="font-label-md text-label-md text-primary-container uppercase tracking-widest">DISPATCH</span>
      </div>
      <h2 class="font-headline-lg text-headline-lg uppercase mb-6 leading-tight">
        <?php echo wp_kses_post( $quote_headline ); ?>
      </h2>
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-12 max-w-md">
        <?php echo esc_html( $quote_intro ); ?>
      </p>

      <div class="space-y-8">
        <div class="flex items-start gap-4">
          <div class="bg-primary-container text-black p-3 shrink-0">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">phone</span>
          </div>
          <div>
            <span class="block font-label-md text-label-md text-primary-container uppercase mb-1">CALL DIRECT</span>
            <span class="font-headline-md text-[24px] text-on-surface"><?php echo esc_html( $phone ); ?></span>
          </div>
        </div>
        <div class="flex items-start gap-4">
          <div class="bg-primary-container text-black p-3 shrink-0">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">mail</span>
          </div>
          <div>
            <span class="block font-label-md text-label-md text-primary-container uppercase mb-1">EMAIL US</span>
            <span class="font-label-md text-label-md text-on-surface lowercase"><?php echo esc_html( $email ); ?></span>
          </div>
        </div>
        <div class="flex items-start gap-4">
          <div class="bg-primary-container text-black p-3 shrink-0">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">photo_camera</span>
          </div>
          <div>
            <span class="block font-label-md text-label-md text-primary-container uppercase mb-1">INSTAGRAM</span>
            <span class="font-label-md text-label-md text-on-surface lowercase"><?php echo esc_html( $instagram ); ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Quote form -->
    <div class="bg-[#1A1A1A] p-8 md:p-12 border-2 border-[#333333] relative">
      <div class="absolute bottom-0 right-0 w-16 h-16 border-b-8 border-r-8 border-primary-container"></div>
      <div class="absolute left-0 top-0 bottom-0 w-2 bg-primary-container"></div>
      <h3 class="font-headline-md text-headline-md uppercase mb-8 ml-4">REQUEST A QUOTE</h3>

      <form class="space-y-6 ml-4" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <?php wp_nonce_field( 'royal_quote_form', 'royal_quote_nonce' ); ?>
        <input type="hidden" name="action" value="royal_quote_submit">

        <div>
          <input class="w-full bg-[#121414] border-t-0 border-l-0 border-r-0 border-b border-[#333333] text-on-surface font-label-md text-label-md px-4 py-4 focus:ring-0 focus:border-b-2 focus:border-primary-container placeholder:text-on-surface-variant transition-all"
                 placeholder="FULL NAME" type="text" name="rc_name" required>
        </div>
        <div>
          <input class="w-full bg-[#121414] border-t-0 border-l-0 border-r-0 border-b border-[#333333] text-on-surface font-label-md text-label-md px-4 py-4 focus:ring-0 focus:border-b-2 focus:border-primary-container placeholder:text-on-surface-variant transition-all"
                 placeholder="PHONE NUMBER" type="tel" name="rc_phone">
        </div>
        <div>
          <input class="w-full bg-[#121414] border-t-0 border-l-0 border-r-0 border-b border-[#333333] text-on-surface font-label-md text-label-md px-4 py-4 focus:ring-0 focus:border-b-2 focus:border-primary-container placeholder:text-on-surface-variant transition-all"
                 placeholder="EMAIL ADDRESS" type="email" name="rc_email" required>
        </div>
        <div>
          <select class="w-full bg-[#121414] border-t-0 border-l-0 border-r-0 border-b border-[#333333] text-on-surface font-label-md text-label-md px-4 py-4 focus:ring-0 focus:border-b-2 focus:border-primary-container transition-all" name="rc_service">
            <option class="text-on-surface-variant" disabled selected value="">SELECT SERVICE NEEDED...</option>
            <option value="egress">EGRESS WINDOW</option>
            <option value="door">SIDE DOOR CUTTING</option>
            <option value="basement">LEGAL BASEMENT</option>
            <option value="other">OTHER</option>
          </select>
        </div>
        <div>
          <textarea class="w-full bg-[#121414] border-t-0 border-l-0 border-r-0 border-b border-[#333333] text-on-surface font-label-md text-label-md px-4 py-4 focus:ring-0 focus:border-b-2 focus:border-primary-container placeholder:text-on-surface-variant transition-all resize-none"
                    placeholder="PROJECT DETAILS..." rows="4" name="rc_message"></textarea>
        </div>
        <button class="w-full bg-primary-container text-black font-headline-md text-headline-md px-8 py-4 uppercase hover:bg-surface-tint transition-colors mt-4" type="submit">
          SUBMIT REQUEST
        </button>
      </form>
    </div>

  </div>
</section>

<?php get_footer(); ?>
