# Typography Weight Refinement Brief

## Objective
Refine the recently redesigned public welcome and authentication pages because the current typography feels too bold. Make the overall presentation calmer, more regular, and more professional without changing page composition, colors, content, routing, functionality, or architecture.

## Scope
Project: `F:\boilerplate`

Modify only these existing files:
- `resources/views/welcome.blade.php`
- `resources/views/layouts/guest.blade.php`
- `resources/views/auth/login.blade.php`
- `resources/views/auth/register.blade.php`
- `resources/views/auth/forgot-password.blade.php`

Do not create files, components, assets, dependencies, routes, or layouts. Do not modify Tailwind configuration or shared input/button components.

## User feedback
"The existing typography is too bold; make it regular."

Interpret this as a typography-only refinement across the newly designed public-facing experience.

## Weight system
- Body copy, descriptions, metadata, footer text: regular 400 (`font-normal` or default).
- Navigation, small labels, form labels, chips, list text: regular to medium 400–500 (`font-normal`/`font-medium`).
- Buttons and key interactive labels: medium or semibold 500–600, never black/extrabold.
- Card titles and tertiary headings: medium/semibold 500–600.
- Main hero and major section headings: semibold 600; use bold 700 only if semibold visibly loses hierarchy, and avoid black/extrabold entirely.
- Brand wordmark may remain semibold, but not black.
- Numerical data may be semibold, not black.

Remove all `font-black` and `font-extrabold` classes in the five scoped files unless there is a truly exceptional accessibility/hierarchy reason. Reduce unnecessary `font-bold` occurrences. Do not indiscriminately make everything identical weight: preserve hierarchy through size, spacing, color, and restrained 500–600 weights.

## Tracking and visual balance
- Slightly relax overly tight display tracking if the lighter weight makes headings feel cramped.
- Preserve the reference-inspired geometric SaaS aesthetic and coral/teal palette.
- Keep headings readable and confident, just less heavy.
- Do not change section dimensions or responsive structure unless a tiny text-related adjustment is required to prevent wrapping.

## Functional requirements
Preserve every existing route, form action, CSRF field, validation message, auth state, Alpine behavior, SVG, and dynamic runtime value exactly.

## Verification
- Search the five files to confirm `font-black` and `font-extrabold` have been removed.
- Run `php artisan view:cache`.
- Run relevant auth tests.
- Run `npm.cmd run build`.
- Visually inspect welcome, login, register, and forgot-password at desktop and 375px mobile. Confirm typography is clearly lighter, hierarchy remains coherent, assets load, and there is no overflow.
