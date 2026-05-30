/**
 * Royal Concrete — main.js
 * GSAP scroll animations, counter animation, hamburger menu.
 */
(function () {
  "use strict";

  /* ── GSAP setup ── */
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") return;
  gsap.registerPlugin(ScrollTrigger);

  /* ── Hero entrance ── */
  var heroContent = document.getElementById("hero-content");
  if (heroContent) {
    var hc = heroContent.children;
    var heroTl = gsap.timeline({
      defaults: { ease: "power3.out" },
      delay: 0.15,
      onComplete: function () { ScrollTrigger.refresh(); }
    });
    heroTl
      .from("nav",         { y: -80, opacity: 0, duration: 1, ease: "power4.out" })
      .from("#hero-bg-shape", { xPercent: 100, opacity: 0, duration: 1.6, ease: "power4.inOut" }, 0.1)
      .from(hc[0],         { x: -80, opacity: 0, duration: 0.8 }, 0.5)
      .fromTo(hc[1],
        { clipPath: "inset(0 0 100% 0)", y: 60 },
        { clipPath: "inset(0 0 0% 0)",   y: 0, duration: 1.2, ease: "power4.out" }, 0.7)
      .from(hc[2],         { y: 40, opacity: 0, duration: 0.8 }, 1.1)
      .from(hc[3],         { y: 40, opacity: 0, duration: 0.8 }, 1.25);

    if (hc[4]) {
      heroTl.from(hc[4].querySelectorAll("a"), {
        y: 50, stagger: 0.15, duration: 0.7, ease: "back.out(1.7)"
      }, 1.4);
    }
    if (hc[5]) {
      heroTl.from(hc[5].children, {
        scale: 0.5, opacity: 0, stagger: 0.08, duration: 0.5, ease: "back.out(2)"
      }, 1.6);
    }
  }

  /* ── Hazard stripe reveal ── */
  gsap.utils.toArray(".hazard-stripe").forEach(function (stripe, i) {
    gsap.from(stripe, {
      scaleX: 0,
      transformOrigin: i % 2 === 0 ? "left center" : "right center",
      duration: 1.2,
      ease: "power3.inOut",
      scrollTrigger: { trigger: stripe, start: "top 95%" }
    });
  });

  /* ── Stats section ── */
  gsap.from("#stats-section .grid > *", {
    y: 60, opacity: 0, stagger: 0.2, duration: 0.8, ease: "power3.out",
    scrollTrigger: { trigger: "#stats-section", start: "top 85%" }
  });

  /* ── Animated counters ── */
  document.querySelectorAll(".stat-number").forEach(function (el) {
    var endVal = parseFloat(el.dataset.value);
    var suffix = el.dataset.suffix || "";
    var obj    = { val: 0 };
    gsap.to(obj, {
      val: endVal,
      duration: 2.5,
      ease: "power1.out",
      scrollTrigger: { trigger: el, start: "top 88%" },
      onUpdate: function () { el.textContent = Math.round(obj.val) + suffix; }
    });
  });

  /* ── Service cards ── */
  var serviceCards = document.querySelectorAll("#services > div:last-child > div");
  if (serviceCards.length) {
    gsap.from(serviceCards, {
      y: 100, opacity: 0, scale: 0.92,
      stagger: { each: 0.1 },
      duration: 0.8, ease: "power3.out",
      scrollTrigger: { trigger: "#services > div:last-child", start: "top 80%" }
    });
    serviceCards.forEach(function (card) {
      card.addEventListener("mouseenter", function () {
        gsap.to(card, { y: -8, duration: 0.3, ease: "power2.out", overwrite: "auto" });
      });
      card.addEventListener("mouseleave", function () {
        gsap.to(card, { y: 0, duration: 0.5, ease: "elastic.out(1,0.5)", overwrite: "auto" });
      });
    });
  }

  /* ── Egress divider ── */
  gsap.from("#egress-divider", {
    scaleY: 0, transformOrigin: "top center", duration: 1.5, ease: "power3.inOut",
    scrollTrigger: { trigger: "#egress", start: "top 65%" }
  });

  /* ── Footer ── */
  gsap.from("footer .max-w-\\[1280px\\] > *", {
    y: 30, opacity: 0, stagger: 0.2, duration: 0.7, ease: "power2.out",
    scrollTrigger: { trigger: "footer", start: "top bottom" }
  });

  /* ══════════════════════════════
     HAMBURGER MENU
  ══════════════════════════════ */
  var hamburger    = document.getElementById("hamburger");
  var mobileMenu   = document.getElementById("mobile-menu");
  var mobileLinks  = document.querySelectorAll(".mobile-nav-link");

  if (hamburger && mobileMenu) {
    hamburger.addEventListener("click", function () {
      hamburger.classList.toggle("active");
      mobileMenu.classList.toggle("active");
      document.body.style.overflow = mobileMenu.classList.contains("active") ? "hidden" : "";
    });
    mobileLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        hamburger.classList.remove("active");
        mobileMenu.classList.remove("active");
        document.body.style.overflow = "";
      });
    });
  }
})();
