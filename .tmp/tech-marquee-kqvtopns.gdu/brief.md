# Infinite Technology Strip Brief

## Objective
Convert the existing static technology strip in the Laravel welcome page—currently `<section class="border-b py-10">`—into a smooth, seamless, infinitely looping horizontal marquee.

## Scope
Modify only `F:\boilerplate\resources\views\welcome.blade.php`. Do not create assets, components, JavaScript files, dependencies, routes, or architecture.

## Content
Retain the existing technology labels exactly: Laravel, MySQL, Tailwind, Alpine, Spatie, Vite.

## Behavior
- Continuously move labels horizontally from right to left at a calm business-like speed (roughly 22–32 seconds per complete cycle).
- Loop seamlessly with no visible reset, blank gap, or jump. Use two identical groups/tracks and correct width/translation math.
- Show enough repeated content for wide desktop screens; if necessary repeat the six-label sequence within each half so the viewport is always filled.
- Pause animation while the section is hovered or keyboard-focused (`:focus-within`).
- Respect `prefers-reduced-motion: reduce`: stop the animation and present a readable wrapping/static row.
- The duplicated copy must be `aria-hidden="true"`; screen readers should encounter one logical list only.
- Add subtle left/right gradient masks or overlay fades matching the white background so entries enter and exit gracefully.
- Preserve the section's border and approximate vertical padding.
- Keep the lighter typography direction: regular/medium, not bold/black.
- No horizontal page overflow at 375px.

## Implementation guidance
Reuse the existing inline `<style>` block in `welcome.blade.php` for keyframes and marquee utility selectors; do not create a new stylesheet for this one-off page behavior. Maintain reduced-motion rules already present and extend them cleanly. Semantic list markup is preferred.

## Verification
Run `php artisan view:cache`, `npm.cmd run build`, and inspect desktop/mobile rendering. Confirm animation is visually seamless and CSS/JS assets return correctly.
