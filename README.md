# Royal Concrete WordPress Theme

A bold, industrial WordPress theme for **Royal Concrete Cutting & Coring Inc.**

## Features
- Dark colour scheme with gold (#FFB800) accent
- Anton display typeface + Hanken Grotesk body + JetBrains Mono labels
- Animated hazard-stripe dividers
- GSAP ScrollTrigger scroll-entrance animations
- Animated stat counters (500+ jobs, 10+ yrs, 100% safety)
- Responsive hamburger menu with full-screen overlay
- Mobile sticky "Call Now" CTA bar
- Quote form with WordPress admin-post handler (sends email to admin)
- WordPress Customizer support: phone, email, Instagram, hero image/headline
- Custom nav walker for clean Tailwind markup
- Custom logo support

## File Structure
```
royal-concrete-theme/
├── style.css              ← Required WP theme header
├── functions.php          ← Theme setup, enqueue, walkers, customizer
├── header.php             ← Nav + mobile menu
├── footer.php             ← Footer + mobile sticky CTA
├── front-page.php         ← Full homepage (Hero→Stats→About→Services→Egress→Quote)
├── index.php              ← Blog / archive fallback
├── singular.php           ← Single post & page
├── 404.php                ← 404 error page
├── screenshot.png         ← Add your own 1200×900 PNG
├── assets/
│   ├── css/main.css       ← Custom CSS (hazard stripe, hamburger, mobile overrides)
│   └── js/main.js         ← GSAP animations + hamburger logic
└── inc/
    └── form-handler.php   ← Quote form admin-post handler
```

## Installation

1. Zip the `royal-concrete-theme` folder.
2. In WordPress admin go to **Appearance → Themes → Add New → Upload Theme**.
3. Upload the zip, then click **Activate**.
4. Go to **Appearance → Customize** to set your phone number, email, hero image, etc.
5. Go to **Settings → Reading** → set *Your homepage displays* to *A static page*, choose a page (any page — the homepage content is hard-coded in `front-page.php`).
6. Go to **Appearance → Menus** → create a *Primary Menu* and assign it to the "Primary Menu" location for a dynamic nav.

## Customizer Options

Under **Appearance → Customize**:
- **Contact Details** — phone number, email, Instagram handle, CTA name
- **Hero Section** — background image, headline HTML
- **Site Identity** — custom logo

## Quote Form

Submissions are emailed to the WordPress admin email address (`Settings → General → Email Address`). No third-party plugin required.

For advanced form handling (spam protection, AJAX, file uploads) consider integrating WPForms or Contact Form 7.

## Production Notes

The theme loads Tailwind CSS via CDN for simplicity. For production:
1. Install Node.js.
2. Run `npx tailwindcss init` in the theme directory.
3. Configure `content` in `tailwind.config.js` to scan `*.php` files.
4. Compile to `assets/css/tailwind.min.css` and update `functions.php` to load it instead of the CDN.

## Requirements
- WordPress 6.0+
- PHP 8.0+
