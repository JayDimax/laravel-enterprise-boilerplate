# Business Welcome Page Design Brief

## Objective
Redesign the existing Laravel Enterprise Boilerplate welcome page as a polished business/SaaS landing page closely matching the composition and visual language of the user-provided Loxcy reference screenshots, while using original implementation and content. This is a real Laravel application page, not a standalone mockup.

## Target audience
Engineering leaders, enterprise teams, agencies, and businesses evaluating a reusable Laravel foundation for secure internal or customer-facing applications.

## Existing project and output
- Project: `F:\boilerplate`
- Modify only: `F:\boilerplate\resources\views\welcome.blade.php`
- Keep the page standalone; do not move it into the admin or guest layouts.
- Reuse the existing Vite/Tailwind/Alpine setup.
- Do not add routes, controllers, layouts, components, dependencies, or architectural layers.
- Preserve current dynamic Laravel/PHP/environment/database/version data and real authentication route behavior.

## Reference-driven aesthetic
Closely reproduce the screenshots' visual system: deep petrol teal navigation and hero, vivid coral-orange accents, warm off-white/very pale peach section backgrounds, clean white cards, broad desktop whitespace, crisp rounded geometric sans typography, subtle peach highlight bars behind emphasized heading words, delicate shadows, and thin-line business icons. Avoid copying the Loxcy name, logo, people photos, wording, or proprietary artwork.

## Content structure
1. Sticky/full-width teal navigation with an original `LE`/Laravel Enterprise identity, anchor links for Home, About, Services, Architecture, and a coral login/dashboard CTA. Include an accessible mobile menu.
2. Full-width teal hero in a balanced two-column layout. Left: small proof statement, large business-oriented headline with orange highlighted words, explanatory copy, primary/secondary CTA, and two compact trust notes. Right: create an original code-native SaaS/enterprise visual composed of a large white analytics/dashboard panel, charts, module chips, notification bubbles, and subtle curved/dotted decoration. Do not use a human photo.
3. Muted technology/integration wordmark strip using text labels relevant to the platform (Laravel, MySQL, Tailwind, Alpine, Spatie, Vite); these are typographic labels, not trademark logo reproductions.
4. Capabilities section matching the reference's asymmetrical heading plus six pale cards. Use existing `$capabilities`, icons, and content.
5. About/architecture split section on pale peach: left platform positioning and bullet list; right layered original analytics card/diagram.
6. Performance/outcomes split section with an original dashboard/chart card and business benefits/statistics.
7. Dark teal metrics band using credible boilerplate-centric facts rather than invented customer counts (e.g. core modules, capabilities, runtime values, authorization layers).
8. Pricing-style section should be adapted into three adoption paths (`Starter foundation`, `Production`, `Enterprise extension`) without asserting actual paid prices. CTAs should use login/register/dashboard routes as appropriate. Preserve honesty.
9. FAQ/support section with relevant questions about database, modules, access control, and customization.
10. Contact-style information band and large dark footer containing navigation, platform details, runtime data, and a final CTA. No fake address/telephone.

## Typography
Use the project's existing font stack and Tailwind configuration. Achieve the rounded, contemporary SaaS feel through heavy weights, tight display tracking, moderate body tracking, and generous line height. Do not add external font requests.

## Color direction
- Primary deep teal: around `#083b40` / `#07383d`
- Dark footer teal: around `#03282c`
- Coral orange: around `#ff7f45`
- Pale peach canvas: around `#fff8f3`
- Mint utility accents: around `#d9eee7`
- White cards and muted blue-gray body copy
Maintain accessible contrast, focus states, and reduced-motion support.

## Memorable element
The hero's original enterprise-control dashboard illustration: layered analytics panels, module status cards, and floating operational messages should create the same visual energy as the reference's person-and-chat composition without copying its imagery.

## Responsive and functional requirements
- No horizontal overflow at 375px.
- Navigation must collapse and work with Alpine already bundled.
- All section anchors and auth buttons must work.
- Guest state: Login and Register/Get Started routes.
- Authenticated state: Dashboard, Profile, and POST Logout behavior.
- Semantic headings, skip link, accessible names, visible keyboard focus, and decorative graphics hidden from assistive technology.
- Preserve `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
- Avoid external images/assets and external network dependencies.

## Verification
Run Blade view compilation and the Vite production build. Visually evaluate desktop and 375px mobile views in a browser.
