# Business Welcome Page Iteration

## Objective
Refine the existing public Laravel Enterprise Boilerplate welcome page into a credible business/corporate landing page and fix the unstyled runtime shown by the user. The audience is business owners, engineering managers, consultants, and teams evaluating a professional application foundation.

## Existing application and scope
- Real Laravel 12 application at `F:/boilerplate`.
- Modify only `resources/views/welcome.blade.php`.
- Preserve the public `/` route, authentication behavior, existing modules, components, and global CSS.
- Use Laravel’s standard `@vite(['resources/css/app.css', 'resources/js/app.js'])` directive. Remove the page’s custom manifest-reading/asset URL branch; it has proven brittle after asset hashes changed.
- Reuse Tailwind tokens defined in `tailwind.config.js` and `resources/js/shared/theme/tokens.js`.

## Aesthetic direction
Executive business platform: sober, precise, trustworthy, and operational. Use a structured white/navy composition with primary #0B4F9C, cool gray surfaces, fine borders, restrained shadows, and small emerald status accents. Reduce the “developer blueprint” character. Avoid playful SaaS decoration, excessive gradients, glassmorphism, oversized rounded cards, decorative blobs, and excessive pill badges.

## Page composition
1. Sticky business header: compact logo/wordmark, Overview, Capabilities, Architecture, Documentation, GitHub placeholder, and auth-aware Login or Dashboard/Profile/Logout. Accessible mobile menu.
2. Hero in a disciplined two-column grid. Left: small eyebrow, supplied enterprise headline and concise value statement, primary “Get started” and secondary “View documentation.” Add a short trust row such as Laravel 12, PHP 8.4, role-based access. Right: polished application-foundation overview panel, styled like an executive product summary rather than an admin dashboard. Show Core Platform, Security & Access, Operations, and Extensibility with compact status indicators.
3. Business-value strip with four proof points: Secure foundation, Access control, Auditable operations, Modular growth.
4. Capabilities: eight existing capabilities in a clean 4x2/2x4/1x8 responsive grid, with compact icons and consistent copy.
5. Architecture: clear core platform diagram connected to optional modules. Keep optional examples and disclaimer. Make the stable-core/extensible-edge concept understandable to non-technical decision makers.
6. Why choose: three columns emphasizing faster delivery, consistent governance, and long-term scalability.
7. Runtime/system information as a restrained technical specification table or compact cards with dynamic values.
8. Dark navy CTA and simple corporate footer.

## Typography
Use the existing system sans stack. Strong but controlled headline (roughly 48–60px desktop, 36–42px mobile), compact section headings, readable 16–18px body text, uppercase micro-labels sparingly. Avoid serif/default-browser appearance.

## Memorable element
The hero’s executive foundation panel: a clear business-facing summary of what is ready on day one, communicating stability and governance at a glance.

## Accessibility and responsiveness
- Semantic landmarks and heading hierarchy.
- Visible focus states, keyboard-accessible menu, proper ARIA state, POST logout.
- No horizontal overflow at 375px.
- Respect reduced motion and avoid required animation.
- No sidebar and no authenticated admin layout.

## Image needs
No generated images or external assets. Use simple inline Heroicons and code-native layout elements.

## Verification
- `php artisan view:cache`
- `npm.cmd run build`
- Verify through a correctly rooted `php artisan serve` instance on desktop and 375px mobile.
