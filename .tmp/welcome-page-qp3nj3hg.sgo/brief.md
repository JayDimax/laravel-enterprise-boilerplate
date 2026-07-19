# Premium Public Welcome Page Brief

## Objective and audience
Replace the default Laravel welcome page with a production-quality public landing page for developers, technical leads, and teams evaluating this reusable Laravel Enterprise Boilerplate. It must communicate professionalism, scalability, and reusability immediately, without looking like the authenticated admin dashboard.

## Existing application context
- Real Laravel 12 application at `F:/boilerplate` using Blade, Tailwind CSS, Alpine.js, Vite, Heroicon-style inline SVGs.
- Existing design tokens and global styles: `F:/boilerplate/resources/css/app.css` and Tailwind configuration. Reuse the established primary navy/blue vocabulary while giving the public page a distinct marketing composition.
- Root route already renders `resources/views/welcome.blade.php` publicly. Preserve this public route.
- Dynamic information must use framework/runtime values: Laravel version, PHP version, environment, application version, and active database driver.

## Aesthetic direction
Premium architectural blueprint: bright, editorial SaaS landing page with crisp white and mist sections, deep ink typography, #0B4F9C primary, #2563EB accent, restrained blue gradient only on primary actions and one focused CTA surface. Cards use 16px radius, fine cool-gray borders, soft shadows, and subtle lift. Avoid decorative blobs, excessive pills, glassmorphism, giant empty hero typography, excessive gradients, and dashboard-like sidebar composition.

## Content structure
1. Sticky semantic header. Left: compact geometric logo and “Laravel Enterprise Boilerplate.” Right: Documentation anchor, GitHub placeholder with safe semantics, auth-aware Login or Dashboard/Profile/Logout. Mobile navigation must be keyboard accessible with Alpine.
2. Hero: headline “Build Enterprise Laravel Applications Faster,” exact supplied subheadline, Get Started and Documentation actions. Right side: an original code-native abstract application architecture/dashboard mockup, not an image URL and not an actual admin page.
3. Features: eight accessible cards for Authentication, User Management, Role & Permission, System Settings, Reusable Components, Audit Logs, Developer Tools, Modular Architecture. Each includes a relevant outline Heroicon, concise supplied meaning, and restrained hover state.
4. Architecture: elegant core-to-module visual map. Core includes Authentication, Users, Roles, Permissions, Settings, Components, Helpers, Services. Optional future examples include Modules, Inventory, Payroll, Laboratory, HR, Booking, Accounting exactly as user requested, with the note that business modules are optional and independently added. Treat these strictly as visual examples, not claims that the boilerplate contains them.
5. Why choose: three editorial columns—Rapid Development, Reusable Architecture, Enterprise Ready.
6. System information: five dynamic cards for Laravel version, PHP version, environment, application version, database driver. Do not query the database.
7. Centered CTA: “Ready to build your next application?” Auth-aware Dashboard/Login action.
8. Footer: name, version 1.0.0/config value, Laravel + Tailwind credit, dynamic year.

## Typography
Use the existing local/system sans stack. Strong 700–800 display headline with controlled max width; calm 400–500 body; compact uppercase eyebrow labels used sparingly. Use tabular numerals for system information.

## Memorable element
The hero’s architecture preview should show a luminous core rail feeding clean reusable capability tiles and optional module slots—an immediately understandable metaphor for a stable core with extensible edges.

## Interactions, responsiveness, accessibility
- Fully responsive desktop/tablet/mobile. No admin sidebar.
- Semantic landmarks, correct heading order, visible focus states, aria labels, keyboard-operable mobile menu.
- Respect `prefers-reduced-motion`; subtle entrance fade and hover lift only.
- Auth-aware navigation and CTA with a real POST logout form.
- Documentation anchors scroll to a meaningful documentation/architecture section. GitHub may be a clearly labeled placeholder without a broken external destination.

## Image needs
No raster imagery needed. Create the abstract hero preview entirely with semantic HTML/CSS and simple inline Heroicons/SVG geometry. No external images, external fonts, or image services.

## Engineering constraints
- Output in `F:/boilerplate/resources/views/welcome.blade.php`, with reusable public-page partials/components under an appropriate `resources/views` subdirectory where valuable.
- Use `@vite`, Blade auth directives, Laravel runtime helpers/constants, and existing Tailwind setup.
- Clean maintainable production Blade; no Bootstrap and no admin layout.
- Verify `php artisan view:cache` and `npm run build`.
