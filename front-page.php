<?php
/**
 * Template Name: Homepage
 * The front page template for Royal Concrete.
 */

get_header();

$phone_raw   = rc_mod( 'royal_phone_raw',   '4372557770' );
$phone       = rc_mod( 'royal_phone',       '437-255-7770' );
$email       = rc_mod( 'royal_email',       'royalconcrete0001@gmail.com' );
$instagram   = rc_mod( 'royal_instagram',   '@royal_concrete_cutting' );
$hero_bg     = rc_mod( 'royal_hero_bg',     'https://www.ieltsbid.in/wp-content/uploads/2026/05/construction-worker.jpg' );
$hero_hl     = rc_mod( 'royal_hero_headline', 'WE <span class="text-primary-container">CUT</span><br><span class="text-outline-white">THROUGH</span><br>ANYTHING' );
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
        Commercial &amp; Residential concrete specialists serving Toronto &amp; the GTA. Built on precision, powered by diamond blades.
      </p>
      <p class="font-body-lg text-body-lg text-primary-container font-bold mb-10 max-w-lg">
        "If you can dream it, we can build it."
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
        <?php
        $badges = [ 'FULLY INSURED', 'COMMERCIAL', 'RESIDENTIAL', 'FAST RESPONSE' ];
        foreach ( $badges as $badge ) : ?>
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
      <div class="px-4 md:pl-0 flex flex-col items-start justify-center">
        <span class="font-stat-lg text-stat-lg leading-none stat-number" data-value="500" data-suffix="+">0+</span>
        <span class="font-label-md text-label-md uppercase font-bold tracking-widest mt-2 stat-label">JOBS DONE</span>
      </div>
      <div class="px-4 md:px-8 flex flex-col items-start justify-center">
        <span class="font-stat-lg text-stat-lg leading-none stat-number" data-value="10" data-suffix="+">0+</span>
        <span class="font-label-md text-label-md uppercase font-bold tracking-widest mt-2 stat-label">YRS EXP</span>
      </div>
      <div class="px-4 md:px-8 flex flex-col items-start justify-center">
        <span class="font-stat-lg text-stat-lg leading-none stat-number" data-value="100" data-suffix="%">0%</span>
        <span class="font-label-md text-label-md uppercase font-bold tracking-widest mt-2 stat-label">SAFETY</span>
      </div>
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
        BUILT ON STRENGTH.<br>DRIVEN BY PRECISION.
      </h2>
      <div class="font-body-lg text-body-lg space-y-6 mb-10 max-w-lg text-white">
        <p>Royal Concrete Cutting &amp; Coring Inc. tackles the heavy, structural concrete work that other contractors walk away from. We specialize in precision wall cutting, legal basement entrances, and full egress window systems.</p>
        <p>Founded by <strong class="text-white">Sahil</strong>, we bring industrial-grade equipment and an uncompromising work ethic to every job—whether it's a massive commercial core drilling project or a residential basement upgrade in the GTA.</p>
      </div>
      <a class="inline-block font-headline-md text-headline-md px-8 py-3 uppercase shadow-[4px_4px_0px_0px_rgba(13,14,15,0.5)] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px] transition-all border-2 border-transparent bg-primary-container text-black"
         href="#quote">CONTACT SAHIL DIRECTLY</a>
    </div>

    <!-- About media / video -->
    <div id="about-media" class="relative">
      <div class="absolute -inset-4 border-[#0d0e0f] translate-x-4 translate-y-4 z-0 hidden md:block"></div>
      <div class="bg-[#0d0e0f] w-full h-full relative z-10 border-2 border-[#0d0e0f] flex items-center justify-center overflow-hidden shadow-[8px_8px_0px_0px_#1A1A1A]">
        <video class="w-full h-full object-cover" autoplay muted loop playsinline>
          <source src="https://www.ieltsbid.in/wp-content/uploads/2026/05/motion_2.0-fast_Ultra_realistic_cinematic_construction_video_in_Canada_showing_professional_inst-0.mp4" type="video/mp4">
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
<section class="py-24 md:py-32" id="services" style="background-color:#FFB800;">
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 mb-10 md:mb-16">
    <div class="flex items-center gap-2 mb-4">
      <div class="w-8 h-[2px] bg-black"></div>
      <span class="font-label-md text-label-md uppercase tracking-widest text-[#0d0e0f]">WHAT WE DO</span>
    </div>
    <h2 class="font-headline-lg text-headline-lg uppercase text-black">OUR SERVICES</h2>
  </div>

  <?php
  $services = [
    [ '01', 'EGRESS WINDOWS',           'Code-compliant emergency exit windows. We handle the digging, concrete cutting, well installation, and final fitting.',                         false ],
    [ '02', 'LEGAL BASEMENT ENTRANCES', 'Unlock rental income potential. Complete structural side-entrance cutting and permit-ready installations.',                                     true  ],
    [ '03', 'WINDOW ENLARGEMENT',       'Resize existing concrete window bucks for modern, larger windows. Clean diamond cuts with zero structural compromise.',                          false ],
    [ '04', 'SIDE DOOR CUTTING',        'Adding new access points. Professional concrete cutting, framing prep, and waterproofing to code.',                                             false ],
    [ '05', 'WALL CUTTING',             'Precision structural and non-structural wall cuts for renovations, utility pass-throughs, and custom openings.',                                true  ],
    [ '06', 'ALL CONCRETE WORK',        "Core drilling, slab cutting, trenching, and demolition prep. If it's concrete, our blades will cut it.",                                       false ],
  ];
  ?>
  <div class="max-w-[1280px] mx-auto px-4 md:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ( $services as $svc ) :
      $dark  = $svc[3];
      $bg    = $dark ? 'bg-black border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,0.3)]' : 'bg-white/40 border-2 border-black group hover:bg-white/60 transition-colors';
      $nBg   = $dark ? 'border-t-primary-container' : 'border-t-black';
      $numCl = $dark ? 'text-primary-container/60' : 'text-black/50';
      $titCl = $dark ? 'text-primary-container' : 'text-black';
      $txtCl = $dark ? 'text-on-surface-variant' : 'text-black/80';
    ?>
    <div class="<?php echo esc_attr( $bg ); ?> p-8 relative">
      <div class="absolute top-0 right-0 w-0 h-0 border-t-[30px] border-l-[30px] <?php echo esc_attr( $nBg ); ?> border-l-transparent"></div>
      <span class="font-label-md text-label-md <?php echo esc_attr( $numCl ); ?> text-4xl block mb-6 font-bold"><?php echo esc_html( $svc[0] ); ?></span>
      <h3 class="font-headline-md text-headline-md <?php echo esc_attr( $titCl ); ?> uppercase mb-4"><?php echo esc_html( $svc[1] ); ?></h3>
      <p class="font-body-md text-body-md <?php echo esc_attr( $txtCl ); ?>"><?php echo esc_html( $svc[2] ); ?></p>
    </div>
    <?php endforeach; ?>
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
      <?php
      $facts = [
        [ 'timer',                 'on-surface-variant', 'It takes <span class="text-primary-container font-bold">less than 1 minute</span> for a Christmas tree to set an entire room on fire.' ],
        [ 'local_fire_department', 'on-surface-variant', 'From 2016-2018, an average of <span class="text-primary-container font-bold">160 house fires</span> started from Christmas trees each year.' ],
        [ 'warning',               'primary-container',  'These fires caused an average of <span class="text-primary-container font-bold">2 deaths, 14 injuries, and $10M</span> in direct property damage per year.' ],
        [ 'sensor_door',           'primary-container',  'Having an Egress Window System gives your family <span class="text-primary-container font-bold">another emergency exit</span> when seconds count.' ],
      ];
      foreach ( $facts as $i => $fact ) :
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
      <?php
      $benefits = [
        'GREAT FOR NATURAL LIGHT',
        'CREATES MORE VENTILATION',
        'INCREASES TOTAL HOME VALUE',
        'ACCESS FOR FIRST RESPONDERS',
        'REQUIRED FOR LEGAL BEDROOMS',
      ];
      foreach ( $benefits as $i => $b ) :
        $num  = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
        $last = ( $i === count( $benefits ) - 1 );
      ?>
      <li class="flex items-center gap-4 <?php echo $last ? '' : 'border-b border-[#333333]'; ?> pb-4">
        <span class="font-headline-md text-headline-md text-primary-container"><?php echo esc_html( $num ); ?></span>
        <span class="font-headline-md text-[20px] uppercase text-on-surface"><?php echo esc_html( $b ); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>

    <a href="#quote" class="block w-full bg-primary-container text-black font-headline-md text-[24px] px-8 py-4 uppercase hover:bg-surface-tint transition-colors border-2 border-transparent text-center">
      REQUEST EGRESS ESTIMATE
    </a>
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
      <h2 class="font-headline-lg text-headline-lg uppercase mb-6 leading-tight">READY TO<br>BREAK GROUND?</h2>
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-12 max-w-md">Reach out to Sahil today. We provide fast, free, no-nonsense estimates for all commercial and residential jobs.</p>

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
